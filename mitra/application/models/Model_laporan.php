<?php

class Model_laporan extends CI_Model
{
    function data_laporan_mitra($id){
        $query = $this->db->query("select ab.id as id,
			 ab.booking_no as booking_no,
			 ab.first_name as nama_awal,
			 ab.last_name as nama_akhir,
			 ab.date_from as check_in,
			 ab.date_to as check_out,
			 p_prop.post_title as properti,
			 p_kamar.post_title as tipe_kamar,
			 ab.rooms as jumlah,
			 ab.room_price as harga,
			 ab.created as pesan,
			 ab.pembayaran as pembayaran,
			 CASE
			 WHEN ab.status = 0 THEN 'Batal'
			 WHEN ab.status = 1 THEN 'Menunggu'
			 WHEN ab.status = 2 THEN 'Sukses'
			 END as status
			 from wpwj_trav_accommodation_bookings ab
			 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
			 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
			 where p_prop.post_author = $id
			 order by pesan desc");
        return $query->result();
    }

    function data_laporan_mitra_terbayar($id){
        $query = $this->db->query("select ab.id as id,
			 ab.booking_no as booking_no,
			 ab.first_name as nama_awal,
			 ab.last_name as nama_akhir,
			 ab.date_from as check_in,
			 ab.date_to as check_out,
			 p_prop.post_title as properti,
			 p_kamar.post_title as tipe_kamar,
			 ab.rooms as jumlah,
			 ab.room_price as harga,
			 ab.created as pesan,
			 ab.pembayaran as pembayaran,
			 CASE
			 WHEN ab.status = 0 THEN 'Batal'
			 WHEN ab.status = 1 THEN 'Menunggu'
			 WHEN ab.status = 2 THEN 'Sukses'
			 END as status
			 from wpwj_trav_accommodation_bookings ab
			 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
			 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
			 where p_prop.post_author = $id
			 and ab.pembayaran = 'paid'
			 order by pesan desc");
        return $query->result();
    }

    function data_laporan_mitra_belum($id){
        $query = $this->db->query("select ab.id as id,
			 ab.booking_no as booking_no,
			 ab.first_name as nama_awal,
			 ab.last_name as nama_akhir,
			 ab.date_from as check_in,
			 ab.date_to as check_out,
			 p_prop.post_title as properti,
			 p_kamar.post_title as tipe_kamar,
			 ab.rooms as jumlah,
			 ab.room_price as harga,
			 ab.created as pesan,
			 ab.pembayaran as pembayaran,
			 CASE
			 WHEN ab.status = 0 THEN 'Batal'
			 WHEN ab.status = 1 THEN 'Menunggu'
			 WHEN ab.status = 2 THEN 'Sukses'
			 END as status
			 from wpwj_trav_accommodation_bookings ab
			 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
			 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
			 where p_prop.post_author = $id
			 and ab.pembayaran = 'unpaid'
			 order by pesan desc");
        return $query->result();
    }

    function data_laporan(){
        $query = $this->db->query("select ab.id as id,
			 ab.booking_no as booking_no,
			 ab.first_name as nama_awal,
			 ab.last_name as nama_akhir,
			 ab.date_from as check_in,
			 ab.date_to as check_out,
			 p_prop.post_title as properti,
			 p_kamar.post_title as tipe_kamar,
			 ab.rooms as jumlah,
			 ab.room_price as harga,
			 ab.created as pesan,
			 ab.pembayaran as pembayaran,
			 CASE
			 WHEN ab.status = 0 THEN 'Batal'
			 WHEN ab.status = 1 THEN 'Menunggu'
			 WHEN ab.status = 2 THEN 'Sukses'
			 END as status
			 from wpwj_trav_accommodation_bookings ab
			 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
			 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
			 order by pesan desc");
        return $query->result();
    }

    function data_laporan_terbayar(){
        $query = $this->db->query("select ab.id as id,
			 ab.booking_no as booking_no,
			 ab.first_name as nama_awal,
			 ab.last_name as nama_akhir,
			 ab.date_from as check_in,
			 ab.date_to as check_out,
			 p_prop.post_title as properti,
			 p_kamar.post_title as tipe_kamar,
			 ab.rooms as jumlah,
			 ab.room_price as harga,
			 ab.created as pesan,
			 ab.pembayaran as pembayaran,
			 CASE
			 WHEN ab.status = 0 THEN 'Batal'
			 WHEN ab.status = 1 THEN 'Menunggu'
			 WHEN ab.status = 2 THEN 'Sukses'
			 END as status
			 from wpwj_trav_accommodation_bookings ab
			 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
			 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
			 where ab.pembayaran = 'paid'
			 order by pesan desc");
        return $query->result();
    }

    function data_laporan_belum(){
        $query = $this->db->query("select ab.id as id,
			 ab.booking_no as booking_no,
			 ab.first_name as nama_awal,
			 ab.last_name as nama_akhir,
			 ab.date_from as check_in,
			 ab.date_to as check_out,
			 p_prop.post_title as properti,
			 p_kamar.post_title as tipe_kamar,
			 ab.rooms as jumlah,
			 ab.room_price as harga,
			 ab.created as pesan,
			 ab.pembayaran as pembayaran,
			 pai.payment_system as waktu,
			 CASE
			 WHEN ab.status = 0 THEN 'Batal'
			 WHEN ab.status = 1 THEN 'Menunggu'
			 WHEN ab.status = 2 THEN 'Sukses'
			 END as status
			 from wpwj_trav_accommodation_bookings ab
			 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
			 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
			 left join payment_accommodation_info pai on pai.acc_id = ab.accommodation_id
			 where ab.pembayaran = 'unpaid'
			 order by pesan desc");
        return $query->result();
    }

    function data_modal($id){
        $query = $this->db->query("select ab.id as id,
			 ab.booking_no as booking_no,
			 ab.first_name as nama_awal,
			 ab.last_name as nama_akhir,
			 ab.date_from as check_in,
			 ab.date_to as check_out,
			 p_prop.post_title as properti,
			 p_kamar.post_title as tipe_kamar,
			 ab.rooms as jumlah,
			 ab.room_price as harga,
			 ab.created as pesan,
			 ab.pembayaran as pembayaran,
			 pai.account_name as name,
			 pai.bank_name as bank,
			 CASE
			 WHEN ab.status = 0 THEN 'Batal'
			 WHEN ab.status = 1 THEN 'Menunggu'
			 WHEN ab.status = 2 THEN 'Sukses'
			 END as status
			 from wpwj_trav_accommodation_bookings ab
			 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
			 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
			 left join payment_accommodation_info pai on pai.acc_id = ab.accommodation_id
			 where ab.booking_no = '$id'");
        return $query->result();
    }

    function data_modal_info($id){
        $query = $this->db->query("select ab.id as id,
			 ab.booking_no as booking_no,
			 ab.first_name as nama_awal,
			 ab.last_name as nama_akhir,
			 ab.date_from as check_in,
			 ab.date_to as check_out,
			 p_prop.post_title as properti,
			 p_kamar.post_title as tipe_kamar,
			 ab.rooms as jumlah,
			 ab.room_price as harga,
			 ab.created as pesan,
			 ab.pembayaran as pembayaran,
			 pai.account_name as name,
			 pai.bank_name as bank,
			 pc.kode_referensi as kode,
			 CASE
			 WHEN ab.status = 0 THEN 'Batal'
			 WHEN ab.status = 1 THEN 'Menunggu'
			 WHEN ab.status = 2 THEN 'Sukses'
			 END as status
			 from wpwj_trav_accommodation_bookings ab
			 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
			 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
			 left join payment_accommodation_info pai on pai.acc_id = ab.accommodation_id
			 left join payment_confirmation pc on pc.booking_no = ab.booking_no
			 where ab.booking_no = '$id'");
        return $query->result();
    }

    function save_pembayaran($no, $kode, $time)
    {
        $data = array(
            'booking_no' => $no,
            'tanggal' => $time,
            'kode_referensi' => $kode,
        );
        $this->db->insert('payment_confirmation', $data);

        $data_new = array(
            'pembayaran' => 'paid'
        );
        $this->db->where('booking_no', $no);
        $this->db->update('wpwj_trav_accommodation_bookings', $data_new);
    }

    function bulan1 ()
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date("m");
        $this->db->where('MONTH(created)', $time);
        $cek = $this->db->get('wpwj_trav_accommodation_bookings')->num_rows();
        return $cek;
    }

    function bulan2 ()
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date("m")-1;
        $this->db->where('MONTH(created)', $time);
        $cek = $this->db->get('wpwj_trav_accommodation_bookings')->num_rows();
        return $cek;
    }

    function bulan3 ()
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date("m")-2;
        $this->db->where('MONTH(created)', $time);
        $cek = $this->db->get('wpwj_trav_accommodation_bookings')->num_rows();
        return $cek;
    }

    function bulan4 ()
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date("m")-3;
        $this->db->where('MONTH(created)', $time);
        $cek = $this->db->get('wpwj_trav_accommodation_bookings')->num_rows();
        return $cek;
    }

    function bulan_mitra1($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date("m");
        $this->db->from('wpwj_trav_accommodation_bookings b');
        $this->db->where('MONTH(b.created)', $time);
        $this->db->join('wpwj_posts p', 'b.accommodation_id = p.id', 'left');
        $this->db->where('p.post_author', $id);
        $cek = $this->db->get()->num_rows();
        return $cek;
    }

    function bulan_mitra2($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date("m")-1;
        $this->db->from('wpwj_trav_accommodation_bookings b');
        $this->db->where('MONTH(b.created)', $time);
        $this->db->join('wpwj_posts p', 'b.accommodation_id = p.id', 'left');
        $this->db->where('p.post_author', $id);
        $cek = $this->db->get()->num_rows();
        return $cek;
    }

    function bulan_mitra3($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date("m")-2;
        $this->db->from('wpwj_trav_accommodation_bookings b');
        $this->db->where('MONTH(b.created)', $time);
        $this->db->join('wpwj_posts p', 'b.accommodation_id = p.id', 'left');
        $this->db->where('p.post_author', $id);
        $cek = $this->db->get()->num_rows();
        return $cek;
    }

    function bulan_mitra4($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date("m")-3;
        $this->db->from('wpwj_trav_accommodation_bookings b');
        $this->db->where('MONTH(b.created)', $time);
        $this->db->join('wpwj_posts p', 'b.accommodation_id = p.id', 'left');
        $this->db->where('p.post_author', $id);
        $cek = $this->db->get()->num_rows();
        return $cek;
    }
}