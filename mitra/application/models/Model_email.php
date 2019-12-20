<?php

class Model_email extends CI_Model
{
    public function data_email($booking_no)
    {
        $query = $this->db->query("select ab.id as id,
			ab.booking_no as booking_no,
			ab.first_name as nama_awal,
			ab.email as cust_email,
			ab.phone as cust_phone,
			ab.last_name as nama_akhir,
			ab.date_from as check_in,
			ab.date_to as check_out,
			ab.tgl_dari as tglcheckin,
			ab.tgl_ke as tglcheckout,
			ab.bank as bank,
			ab.email as email,
			ab.rooms as jum_kamar,
			ab.adults as dewasa,
			ab.kids as kecil,
			ab.pin_code as pin,
			ab.nama_bank as nama_bank,
			ab.phone as phone,
			ab.no_rekening as nomor_rek,
			ab.valid_until as batas_waktu,
			ab.special_requirements as pesan_tambahan,
			p_prop.post_title as nama_properti,
			ab.total_price as harga_total,
			ab.created as tgl_pesan,
			pmalamat.meta_value as alamat,
			pmcheckin.meta_value as checkin,
			pmcheckout.meta_value as checkout,
			(select t.name from wpwj_terms t left join wpwj_postmeta pm on t.term_id = pm.meta_value where pm.meta_value = pmkota.meta_value group by p_prop.ID) as kota,
			(select t.name from wpwj_terms t left join wpwj_postmeta pm on t.term_id = pm.meta_value where pm.meta_value = pmnegara.meta_value group by p_prop.ID) as negara,
			pmtelepon.meta_value as telepon,
			(select p.guid from wpwj_posts p left join wpwj_postmeta pm on p.ID = pm.meta_value where pm.meta_value = pmthumbnail.meta_value group by p_prop.ID) as thumbnail,
			pkamar.post_title as kamar,
			pmcancel.meta_value as cancel,
			pmextra.meta_value as extra,
			pmpets.meta_value as pets
			from wpwj_trav_accommodation_bookings ab
			left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
			left join wpwj_postmeta pmalamat on (ab.accommodation_id = pmalamat.post_id and pmalamat.meta_key = 'trav_accommodation_address')
			left join wpwj_postmeta pmcheckin on (ab.accommodation_id = pmcheckin.post_id and pmcheckin.meta_key = 'trav_accommodation_check_in')
			left join wpwj_postmeta pmcheckout on (ab.accommodation_id = pmcheckout.post_id and pmcheckout.meta_key = 'trav_accommodation_check_out')
			left join wpwj_postmeta pmkota on (ab.accommodation_id = pmkota.post_id and pmkota.meta_key = 'trav_accommodation_city')
			left join wpwj_postmeta pmnegara on (ab.accommodation_id = pmnegara.post_id and pmnegara.meta_key = 'trav_accommodation_country')
			left join wpwj_postmeta pmtelepon on (ab.accommodation_id = pmtelepon.post_id and pmtelepon.meta_key = 'trav_accommodation_phone')
			left join wpwj_postmeta pmthumbnail on (ab.accommodation_id = pmthumbnail.post_id and pmthumbnail.meta_key = '_thumbnail_id')
			left join wpwj_postmeta pmcancel on (ab.accommodation_id = pmcancel.post_id and pmcancel.meta_key = 'trav_accommodation_cancellation')
			left join wpwj_postmeta pmextra on (ab.accommodation_id = pmextra.post_id and pmextra.meta_key = 'trav_accommodation_extra_beds_detail')
			left join wpwj_postmeta pmpets on (ab.accommodation_id = pmpets.post_id and pmpets.meta_key = 'trav_accommodation_pets')
			left join wpwj_posts pkamar on ab.room_type_id = pkamar.id
			where ab.booking_no = '$booking_no'
			and pkamar.post_type = 'room_type'
			order by tgl_pesan desc");
        return $query->result();
    }

    public function get_sukses($booking_no)
    {
        $this->db->select('status');
        $this->db->where('booking_no = ', $booking_no);
        $rslt = $this->db->get('wpwj_trav_accommodation_bookings');
        foreach ($rslt->result() as $r) {
            $new = array(
                'status' => '2'
            );
            $this->db->where('booking_no', $booking_no);
            $this->db->update('wpwj_trav_accommodation_bookings', $new);
        }
    }

    public function get_cancel($id)
    {
        $this->db->select('status');
        $this->db->where('id = ', $id);
        $rslt = $this->db->get('wpwj_trav_accommodation_bookings');
        foreach ($rslt->result() as $r) {
            $new = array(
                'status' => '0'
            );
            $this->db->where('id', $id);
            $this->db->update('wpwj_trav_accommodation_bookings', $new);
        }
    }

    public function email_custowner($booking_no)
    {
        $query = $this->db->query("select ab.id as id,
			ab.booking_no as booking_no,
			ab.first_name as nama_awal,
			ab.last_name as nama_akhir,
			ab.created as tgl_pesan,
			ab.email as email
			from wpwj_trav_accommodation_bookings ab
			where ab.booking_no = '$booking_no'
			order by tgl_pesan desc");
        foreach ($query->result() as $row) {
            $email = $row->email;
            return $email;
        }
    }

    public function email_owner($booking_no)
    {
        $query = $this->db->query("select u.user_email
		from wpwj_users u
		left join wpwj_posts p on u.ID = p.post_author
		left join wpwj_trav_accommodation_bookings ab on p.ID = ab.accommodation_id
		where ab.booking_no = '$booking_no'");
        foreach ($query->result() as $row) {
            $email = $row->user_email;
            return $email;
        }
    }
}
