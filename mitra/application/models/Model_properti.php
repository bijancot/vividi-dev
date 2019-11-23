<?php

class Model_properti extends CI_Model
{
    function data_semua_properti()
    {
        $query = $this->db->query("select posts.ID as id, posts.post_title as Judul,
			 t.name AS Tipe_Properti,
			 (select t.name from wpwj_terms t left join wpwj_postmeta pm on t.term_id = pm.meta_value where pm.meta_value = pmkota.meta_value group by posts.ID) as Kota,
			 (select t.name from wpwj_terms t left join wpwj_postmeta pm on t.term_id = pm.meta_value where pm.meta_value = pmnegara.meta_value group by posts.ID) as Negara,
			 users.display_name as Penulis,
			 posts.post_date as Tanggal
			 from wpwj_posts posts 
			 LEFT JOIN wpwj_term_relationships tr on posts.id = tr.object_id
			 LEFT JOIN wpwj_terms t on t.term_id = tr.term_taxonomy_id
			 LEFT JOIN wpwj_term_taxonomy tt on tt.term_id = t.term_id
			 LEFT JOIN wpwj_users users on users.ID = posts.post_author
			 LEFT JOIN wpwj_postmeta pmkota on (posts.id = pmkota.post_id AND pmkota.meta_key = 'trav_accommodation_city')
			 LEFT JOIN wpwj_postmeta pmnegara on (posts.id = pmnegara.post_id AND pmnegara.meta_key = 'trav_accommodation_country')
			 WHERE posts.post_status = 'publish' 
			 AND posts.post_type = 'accommodation' 
			 AND tt.taxonomy = 'accommodation_type'
			 GROUP BY posts.ID");
        return $query->result();
    }

    function data_properti($id)
    {
        $query = $this->db->query("select posts.ID as id, posts.post_title as Judul,
			 t.name AS Tipe_Properti,
			 (select t.name from wpwj_terms t left join wpwj_postmeta pm on t.term_id = pm.meta_value where pm.meta_value = pmkota.meta_value group by posts.ID) as Kota,
			 (select t.name from wpwj_terms t left join wpwj_postmeta pm on t.term_id = pm.meta_value where pm.meta_value = pmnegara.meta_value group by posts.ID) as Negara,
			 users.display_name as Penulis,
			 posts.post_date as Tanggal
			 from wpwj_posts posts 
			 LEFT JOIN wpwj_term_relationships tr on posts.id = tr.object_id
			 LEFT JOIN wpwj_terms t on t.term_id = tr.term_taxonomy_id
			 LEFT JOIN wpwj_term_taxonomy tt on tt.term_id = t.term_id
			 LEFT JOIN wpwj_users users on users.ID = posts.post_author
			 LEFT JOIN wpwj_postmeta pmkota on (posts.id = pmkota.post_id AND pmkota.meta_key = 'trav_accommodation_city')
			 LEFT JOIN wpwj_postmeta pmnegara on (posts.id = pmnegara.post_id AND pmnegara.meta_key = 'trav_accommodation_country')
			 WHERE posts.post_status = 'publish' 
			 AND posts.post_type = 'accommodation' 
			 AND tt.taxonomy = 'accommodation_type'
			 AND posts.post_author = ".$id."
			 GROUP BY posts.ID
       order by posts.post_date desc");
		return $query->result();
	}

	function data_detail_properti($id,$post){
		$query = $this->db->query("select p.ID as id,
			p.post_title as judul,
			p.post_content as deskripsi,
			t.name as tipe_properti,
			pmstar.meta_value as star,
			pmstay.meta_value as stay,
			pmbrief.meta_value as brief,
			(select t.name from wpwj_terms t left join wpwj_postmeta pm on t.term_id = pm.meta_value where pm.meta_value = pmcountry.meta_value group by p.ID) as country,
			(select t.name from wpwj_terms t left join wpwj_postmeta pm on t.term_id = pm.meta_value where pm.meta_value = pmcity.meta_value group by p.ID) as city,
			pmphone.meta_value as phone,
			pmemail.meta_value as email,
			pmalamat.meta_value as alamat,
			pmlokasi.meta_value as lokasi
			from wpwj_posts p
			left join wpwj_term_relationships tr on p.ID = tr.object_id
			left join wpwj_term_taxonomy tt on tt.term_id = tr.term_taxonomy_id
			left join wpwj_terms t on t.term_id = tt.term_id
			left join wpwj_postmeta pmstar on (pmstar.post_id = p.ID and pmstar.meta_key = 'trav_accommodation_star_rating')
			left join wpwj_postmeta pmstay on (pmstay.post_id = p.ID and pmstay.meta_key = 'trav_accommodation_minimum_stay')
			left join wpwj_postmeta pmbrief on (pmbrief.post_id = p.ID and pmbrief.meta_key = 'trav_accommodation_brief')
			left join wpwj_postmeta pmcountry on (pmcountry.post_id = p.ID and pmcountry.meta_key = 'trav_accommodation_country')
			left join wpwj_postmeta pmcity on (pmcity.post_id = p.ID and pmcity.meta_key = 'trav_accommodation_city')
			left join wpwj_postmeta pmphone on (pmphone.post_id = p.ID and pmphone.meta_key = 'trav_accommodation_phone')
			left join wpwj_postmeta pmemail on (pmemail.post_id = p.ID and pmemail.meta_key = 'trav_accommodation_email')
			left join wpwj_postmeta pmalamat on (pmalamat.post_id = p.ID and pmalamat.meta_key = 'trav_accommodation_address')
			left join wpwj_postmeta pmlokasi on (pmlokasi.post_id = p.ID and pmlokasi.meta_key = 'trav_accommodation_loc')
			where tt.taxonomy = 'accommodation_type'
			and p.id = ".$post."
			group by p.id");
		return $query->result();
	}

    function combo_tipe_properti()
    {
        $query = $this->db->query("select t.term_id as id_tipe, t.name as tipe
			from wpwj_terms t
			left join wpwj_term_taxonomy tt on t.term_id = tt.term_id
			where tt.taxonomy = 'accommodation_type'");
        return $query->result();
    }

    function combo_country()
    {
        $query = $this->db->query("select t.term_id as id_country, t.name as country
			from wpwj_terms t
			left join wpwj_term_taxonomy tt on t.term_id = tt.term_id
			where tt.taxonomy = 'location'
			and tt.parent = '0'");
        return $query->result();
    }

    function combo_city($id)
    {
        $query = $this->db->query("select t.term_id as id_city, t.name as city
			from wpwj_terms t
			left join wpwj_term_taxonomy tt on t.term_id = tt.term_id
			where tt.taxonomy = 'location'
			and tt.parent = $id");
        return $query->result();
    }

    function data_tipe_properti()
    {
        $query = $this->db->query("select t.term_id as id, t.name as nama, tt.description as deskripsi, t.slug as slug, tt.count as jumlah 
			from wpwj_terms t
			left join wpwj_term_taxonomy tt
			on t.term_id = tt.term_id
			where tt.taxonomy = 'accommodation_type'
			order by t.name ASC");
        return $query->result();
    }

    function data_fasilitas()
    {
        $query = $this->db->query("select t.term_id as id, t.name as nama, tt.description as deskripsi, t.slug as slug, tt.count as jumlah 
			from wpwj_terms t
			left join wpwj_term_taxonomy tt
			on t.term_id = tt.term_id
			where tt.taxonomy = 'amenity'
			order by t.name ASC");
        return $query->result();
    }

    function data_tipe_kamar($id)
    {
        $query = $this->db->query("select p.ID as id, p.post_title as judul, 
             post.post_title as properti, 
             pmdewasa.meta_value as dewasa,
             pmanak.meta_value as anak,
             users.display_name as penulis,
             p.post_date as tanggal
             from wpwj_posts p
             left join wpwj_postmeta pmroom on (p.id = pmroom.post_id and pmroom.meta_key = 'trav_room_accommodation')
             left join wpwj_posts post on post.id = pmroom.meta_value
             left join wpwj_postmeta pmdewasa on (p.id = pmdewasa.post_id and pmdewasa.meta_key = 'trav_room_max_adults')
             left join wpwj_postmeta pmanak on (p.id = pmanak.post_id and pmanak.meta_key = 'trav_room_max_kids')
             LEFT JOIN wpwj_users users on users.ID = p.post_author
             where p.post_type = 'room_type'
             AND post.post_type = 'accommodation'
             AND p.post_status = 'publish'
             AND p.post_author = ".$id."
             group by p.id
             order by tanggal desc");
        return $query->result();
    }

    function data_detail_tipe_kamar($id, $post){
        $query = $this->db->query("select pkamar.id as id,
			pkamar.post_title as nama_kamar,
			pprop.post_title as nama_prop,
			pkamar.post_content as deskripsi,
			pmdewasa.meta_value as dewasa,
			pmanak.meta_value as anak
			from wpwj_posts pkamar
			left join wpwj_postmeta pmprop on (pkamar.id = pmprop.post_id and pmprop.meta_key = 'trav_room_accommodation')
			left join wpwj_posts pprop on pprop.id = pmprop.meta_value
			left join wpwj_postmeta pmdewasa on (pkamar.id = pmdewasa.post_id and pmdewasa.meta_key = 'trav_room_max_adults')
			left join wpwj_postmeta pmanak on (pkamar.id = pmanak.post_id and pmanak.meta_key = 'trav_room_max_kids')
			where pkamar.post_type = 'room_type'
			and pprop .post_type = 'accommodation'
			and pkamar.id = ".$post);
        return $query->result();
    }

	function data_pesan($id){
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
			 CASE
			 WHEN ab.status = 0 THEN 'Batal'
			 WHEN ab.status = 1 THEN 'Menunggu'
			 WHEN ab.status = 2 THEN 'Sukses'
			 END as status
			 from wpwj_trav_accommodation_bookings ab
			 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
			 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
			 where p_prop.post_author = ".$id."
			 order by pesan desc");
		return $query->result();
	}

    function data_pesan_batal($id){
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
			 CASE
			 WHEN ab.status = 0 THEN 'Batal'
			 END as status
			 from wpwj_trav_accommodation_bookings ab
			 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
			 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
			 where ab.status = '0'
			 and p_prop.post_author = ".$id."
			 order by pesan desc");
        return $query->result();
    }

    function data_pesan_menunggu($id){
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
			 CASE
			 WHEN ab.status = 1 THEN 'Menunggu'
			 END as status
			 from wpwj_trav_accommodation_bookings ab
			 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
			 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
			 where ab.status = '1'
			 and p_prop.post_author = ".$id."
			 order by pesan desc");
        return $query->result();
    }

    function data_pesan_sukses($id){
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
			 CASE
			 WHEN ab.status = 2 THEN 'Sukses'
			 END as status
			 from wpwj_trav_accommodation_bookings ab
			 left join wpwj_posts p_prop on ab.accommodation_id = p_prop.id
			 left join wpwj_posts p_kamar on ab.room_type_id = p_kamar.id
			 where ab.status = '2'
			 and p_prop.post_author = ".$id."
			 order by pesan desc");
        return $query->result();
    }

    function data_modal_properti($id)
    {
        $query = $this->db->query("select p.id, p.post_title as properti
			from wpwj_posts p 
			left join wpwj_users u on p.post_author = u.ID
			where p.post_type = 'accommodation'
			AND p.post_status = 'publish'
			AND p.post_author = " . $id . "
            order by p.id desc");
        return $query->result();
    }

    function data_modal_kamar($id, $prop)
    {
        $query = $this->db->query("select p.ID as id, p.post_title as kamar
             from wpwj_posts p
             left join wpwj_postmeta pmroom on p.id = pmroom.post_id
             left join wpwj_posts post on post.id = pmroom.meta_value
             LEFT JOIN wpwj_users users on users.ID = p.post_author
             where pmroom.meta_key = 'trav_room_accommodation'
             AND p.post_type = 'room_type'
             AND post.post_type = 'accommodation'
             AND p.post_status = 'publish'
             AND p.post_author = " . $id . "
             AND pmroom.meta_value = " . $prop . "
             group by p.id
             order by p.id desc");
        return $query->result();
    }

    function data_atur_harga($prop, $kamar)
    {
        $query = $this->db->query("select av.id as id, 
            pproperti.post_title as properti, 
            pkamar.post_title as kamar, 
            av.date_from as dari, 
            av.date_to as sampai, 
            av.rooms as allotment ,
            av.price_per_room as harga
            from wpwj_trav_accommodation_vacancies av
            left join wpwj_posts pproperti on av.accommodation_id = pproperti.ID
            left join wpwj_posts pkamar on av.room_type_id = pkamar.ID
            where pproperti.post_type = 'accommodation'
            and pkamar.post_type = 'room_type'
            and pproperti.post_status = 'publish'
            and pkamar.post_status = 'publish'
            and av.accommodation_id = " . $prop . "
            and av.room_type_id = " . $kamar);
        return $query->result();
    }

    function semua_harga($id)
    {
        $query = $this->db->query("select av.id as id, 
            pproperti.post_title as properti, 
            pkamar.post_title as kamar, 
            av.date_from as dari, 
            av.date_to as sampai, 
            av.rooms as allotment ,
            av.price_per_room as harga
            from wpwj_trav_accommodation_vacancies av
            left join wpwj_posts pproperti on av.accommodation_id = pproperti.ID
            left join wpwj_posts pkamar on av.room_type_id = pkamar.ID
            left join wpwj_users u on u.ID = pproperti.post_author
            where pproperti.post_type = 'accommodation'
            and pkamar.post_type = 'room_type'
            and pproperti.post_status = 'publish'
            and pkamar.post_status = 'publish'
            and u.ID = " . $id."
            order by av.ID desc");
        return $query->result();
    }

    function modal_ubah_harga($id, $post)
    {
        $query = $this->db->query("select av.id as id, 
            pproperti.post_title as properti, 
            pkamar.post_title as kamar, 
            av.date_from as dari, 
            av.date_to as sampai, 
            av.rooms as allotment ,
            av.price_per_room as harga
            from wpwj_trav_accommodation_vacancies av
            left join wpwj_posts pproperti on av.accommodation_id = pproperti.ID
            left join wpwj_posts pkamar on av.room_type_id = pkamar.ID
            left join wpwj_users u on u.ID = pproperti.post_author
            where pproperti.post_type = 'accommodation'
            and pkamar.post_type = 'room_type'
            and pproperti.post_status = 'publish'
            and pkamar.post_status = 'publish'
            and av.id = " . $post . "
            and u.ID = " . $id);
        return $query->result();
    }

	public function save_properti($id,$time,$deskripsi,$judul,$tipe_properti,$fasilitas,$bintang,$stay,$deskripsi_singkat,$country,$city,$telepon,$email,$alamat,$upload1,$upload2,$upload3,$upload4,$lat,$lng){
		$this->db->select_max('ID');
		$data = $this->db->get('wpwj_posts');
		$keyTransaksi ="";
		$i = 1;
		foreach ($data->result() as $row) {
			$keyTransaksi = $row->ID + $i;
		}
		$data = array(
			'ID' => $keyTransaksi,
			'post_author' => $id,
			'post_date' => $time,
			'post_date_gmt' => $time,
			'post_content' => $deskripsi,
			'post_title' => $judul,
			'post_excerpt' => '',
			'post_status' => 'publish',
			'comment_status' => 'closed',
			'ping_status' => 'closed',
			'post_password' => '',
			'post_name' => $judul,
			'to_ping' => '',
			'pinged' => '',
			'post_modified' => $time,
			'post_modified_gmt' => $time,
			'post_content_filtered' => '',
			'post_parent' => '0',
			'guid' => 'https://vividi.id/?post_type=room_type&#038;p=' . $keyTransaksi,
			'menu_order' => '0',
			'post_type' => 'accommodation',
			'post_mime_type' => '',
			'comment_count' => '0'
		);
		$this->db->insert('wpwj_posts', $data);
		$i++;
		$j = 1;

		$fotoid = '';
			$data_image1 = array(
				'ID' => $keyTransaksi + $i,
				'post_author' => $id,
				'post_date' => $time,
				'post_date_gmt' => $time,
				'post_content' => '',
				'post_title' => $judul." ".$j,
				'post_excerpt' => '',
				'post_status' => 'inherit',
				'comment_status' => 'open',
				'ping_status' => 'closed',
				'post_password' => '',
				'post_title' => $judul." ".$j,
				'to_ping' => '',
				'pinged' => '',
				'post_modified' => $time,
				'post_modified_gmt' => $time,
				'post_content_filtered' => '',
				'post_parent' => $keyTransaksi,
				'guid' => 'https://vividi.id/mitra/assets/images/hotel/'.$upload1['file']['file_name'],
				'menu_order' => '0',
				'post_type' => 'attachment',
				'post_mime_type' => 'image/jpeg',
				'comment_count' => '0'
			);
			$this->db->insert('wpwj_posts', $data_image1);
			$fotoid[0] = $keyTransaksi + $i;
			$i++;
			$j++;

			$data_image2 = array(
				'ID' => $keyTransaksi + $i,
				'post_author' => $id,
				'post_date' => $time,
				'post_date_gmt' => $time,
				'post_content' => '',
				'post_title' => $judul." ".$j,
				'post_excerpt' => '',
				'post_status' => 'inherit',
				'comment_status' => 'open',
				'ping_status' => 'closed',
				'post_password' => '',
				'post_title' => $judul." ".$j,
				'to_ping' => '',
				'pinged' => '',
				'post_modified' => $time,
				'post_modified_gmt' => $time,
				'post_content_filtered' => '',
				'post_parent' => $keyTransaksi,
				'guid' => 'https://vividi.id/mitra/assets/images/hotel/'.$upload2['file']['file_name'],
				'menu_order' => '0',
				'post_type' => 'attachment',
				'post_mime_type' => 'image/jpeg',
				'comment_count' => '0'
			);
			$this->db->insert('wpwj_posts', $data_image2);
			$fotoid[1] = $keyTransaksi + $i;
			$i++;
			$j++;

			$data_image3 = array(
				'ID' => $keyTransaksi + $i,
				'post_author' => $id,
				'post_date' => $time,
				'post_date_gmt' => $time,
				'post_content' => '',
				'post_title' => $judul." ".$j,
				'post_excerpt' => '',
				'post_status' => 'inherit',
				'comment_status' => 'open',
				'ping_status' => 'closed',
				'post_password' => '',
				'post_title' => $judul." ".$j,
				'to_ping' => '',
				'pinged' => '',
				'post_modified' => $time,
				'post_modified_gmt' => $time,
				'post_content_filtered' => '',
				'post_parent' => $keyTransaksi,
				'guid' => 'https://vividi.id/mitra/assets/images/hotel/'.$upload3['file']['file_name'],
				'menu_order' => '0',
				'post_type' => 'attachment',
				'post_mime_type' => 'image/jpeg',
				'comment_count' => '0'
			);
			$this->db->insert('wpwj_posts', $data_image3);
			$fotoid[2] = $keyTransaksi + $i;
			$i++;
			$j++;

		$data_image_logo = array(
			'ID' => $keyTransaksi + $i,
			'post_author' => $id,
			'post_date' => $time,
			'post_date_gmt' => $time,
			'post_content' => '',
			'post_title' => $judul + " " + $j,
			'post_excerpt' => '',
			'post_status' => 'inherit',
			'comment_status' => 'open',
			'ping_status' => 'closed',
			'post_password' => '',
			'post_title' => $judul." ".$j,
			'to_ping' => '',
			'pinged' => '',
			'post_modified' => $time,
			'post_modified_gmt' => $time,
			'post_content_filtered' => '',
			'post_parent' => $keyTransaksi,
			'guid' => 'https://vividi.id/mitra/assets/images/hotel/'.$upload4['file']['file_name'],
			'menu_order' => '0',
			'post_type' => 'attachment',
			'post_mime_type' => 'image/jpeg',
			'comment_count' => '0'
		);
		$this->db->insert('wpwj_posts', $data_image_logo);
		$logoid = $keyTransaksi + $i;
		$i++;

		$this->db->select_max('meta_id');
		$data = $this->db->get('wpwj_postmeta');
		$key = "";
		$k = 1;
		foreach ($data->result() as $row) {
			$key = $row->meta_id + $k;
		}

		$data1 = array(
			'meta_id' => $key,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_avg_price',
			'meta_value' => '0'
		);
		$this->db->insert('wpwj_postmeta', $data1);
		$k++;

		$data2 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'review',
			'meta_value' => '0'
		);
		$this->db->insert('wpwj_postmeta', $data2);
		$k++;

		$data3 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => '_edit_lock',
			'meta_value' => '0'
		);
		$this->db->insert('wpwj_postmeta', $data3);
		$k++;

		$data4 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => '_edit_last',
			'meta_value' => '20'
		);
		$this->db->insert('wpwj_postmeta', $data4);
		$k++;

		$data5 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'wpms_validate_analysis',
			'meta_value' => '0'
		);
		$this->db->insert('wpwj_postmeta', $data5);
		$k++;

		$data6 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => '_thumbnail_id',
			'meta_value' => $logoid
		);
		$this->db->insert('wpwj_postmeta', $data6);
		$k++;

		$data7 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'sbg_selected_sidebar_replacement',
			'meta_value' => 'a:1:{i:0;s:1:"0";}'
		);
		$this->db->insert('wpwj_postmeta', $data7);
		$k++;

		$data8 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'sbg_selected_sidebar',
			'meta_value' => 'a:1:{i:0;s:1:"0";}'
		);
		$this->db->insert('wpwj_postmeta', $data8);
		$k++;

		$data9 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_star_rating',
			'meta_value' => $bintang
		);
		$this->db->insert('wpwj_postmeta', $data9);
		$k++;

		$data10 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_minimum_stay',
			'meta_value' => $stay
		);
		$this->db->insert('wpwj_postmeta', $data10);
		$k++;

		$data11 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_minimum_stay',
			'meta_value' => $stay
		);
		$this->db->insert('wpwj_postmeta', $data11);
		$k++;

		for($i=0;$i<3;$i++){
			$data_foto = array(
				'meta_id' => $key + $k,
				'post_id' => $keyTransaksi,
				'meta_key' => 'trav_gallery_imgs',
				'meta_value' => $fotoid[$i]
			);
			$this->db->insert('wpwj_postmeta', $data_foto);
			$k++;
		}

		$data12 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_logo',
			'meta_value' => $logoid
		);
		$this->db->insert('wpwj_postmeta', $data12);
		$k++;

		$data13 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_brief',
			'meta_value' => $deskripsi_singkat
		);
		$this->db->insert('wpwj_postmeta', $data13);
		$k++;

		$data14 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_country',
			'meta_value' => $country
		);
		$this->db->insert('wpwj_postmeta', $data14);
		$k++;

		$data66 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_city',
			'meta_value' => $city
		);
		$this->db->insert('wpwj_postmeta', $data66);
		$k++;

		$data15 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_address',
			'meta_value' => $alamat
		);
		$this->db->insert('wpwj_postmeta', $data15);
		$k++;

		$data16 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_loc',
			'meta_value' => $lat.",".$lng
		);
		$this->db->insert('wpwj_postmeta', $data16);
		$k++;

		$data17 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_phone',
			'meta_value' => $telepon
		);
		$this->db->insert('wpwj_postmeta', $data17);
		$k++;

		$data18 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_email',
			'meta_value' => $email
		);
		$this->db->insert('wpwj_postmeta', $data18);
		$k++;

		$data19 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_check_in',
			'meta_value' => '2 PM'
		);
		$this->db->insert('wpwj_postmeta', $data19);
		$k++;

		$data20 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_check_out',
			'meta_value' => '11 AM'
		);
		$this->db->insert('wpwj_postmeta', $data20);
		$k++;

		$data21 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_cancellation',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data21);
		$k++;

		$data22 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_extra_beds_detail',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data22);
		$k++;

		$data23 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_pets',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data23);
		$k++;

		$data24 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_main_top',
			'meta_value' => 'gallery'
		);
		$this->db->insert('wpwj_postmeta', $data24);
		$k++;

		$data25 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_main_top',
			'meta_value' => 'map'
		);
		$this->db->insert('wpwj_postmeta', $data25);
		$k++;

		$data26 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_main_top',
			'meta_value' => 'street'
		);
		$this->db->insert('wpwj_postmeta', $data26);
		$k++;

		$data27 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_def_tab',
			'meta_value' => 'rooms'
		);
		$this->db->insert('wpwj_postmeta', $data27);
		$k++;

		$data28 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_featured',
			'meta_value' => '1'
		);
		$this->db->insert('wpwj_postmeta', $data28);
		$k++;

		$data29 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_hot',
			'meta_value' => '0'
		);
		$this->db->insert('wpwj_postmeta', $data29);
		$k++;

		$data30 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_discount_rate',
			'meta_value' => '0'
		);
		$this->db->insert('wpwj_postmeta', $data30);
		$k++;

		$data31 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_d_edit_booking',
			'meta_value' => '1'
		);
		$this->db->insert('wpwj_postmeta', $data31);
		$k++;

		$data32 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_d_cancel_booking',
			'meta_value' => '1'
		);
		$this->db->insert('wpwj_postmeta', $data32);
		$k++;

		$data33 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_tm_style',
			'meta_value' => 'style1'
		);
		$this->db->insert('wpwj_postmeta', $data33);
		$k++;

		$data34 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_accommodation_tm_testimonial',
			'meta_value' => 'a:1:{i:0;a:4:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}}'
		);
		$this->db->insert('wpwj_postmeta', $data34);
		$k++;

		$data35 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'ihc_mb_type',
			'meta_value' => 'show'
		);
		$this->db->insert('wpwj_postmeta', $data35);
		$k++;

		$data36 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'ihc_mb_who',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data36);
		$k++;

		$data37 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'ihc_mb_block_type',
			'meta_value' => 'redirect'
		);
		$this->db->insert('wpwj_postmeta', $data37);
		$k++;

		$data38 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'ihc_mb_redirect_to',
			'meta_value' => '1506'
		);
		$this->db->insert('wpwj_postmeta', $data38);
		$k++;

		$data39 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'ihc_replace_content',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data39);
		$k++;

		$data40 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'ihc_drip_content',
			'meta_value' => '0'
		);
		$this->db->insert('wpwj_postmeta', $data40);
		$k++;

		$data41 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'ihc_drip_start_type',
			'meta_value' => '1'
		);
		$this->db->insert('wpwj_postmeta', $data41);
		$k++;

		$data42 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'ihc_drip_end_type',
			'meta_value' => '1'
		);
		$this->db->insert('wpwj_postmeta', $data42);
		$k++;

		$data43 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'ihc_drip_start_numeric_type',
			'meta_value' => 'days'
		);
		$this->db->insert('wpwj_postmeta', $data43);
		$k++;

		$data44 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'ihc_drip_start_numeric_value',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data44);
		$k++;

		$data45 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'ihc_drip_end_numeric_type',
			'meta_value' => 'days'
		);
		$this->db->insert('wpwj_postmeta', $data45);
		$k++;

		$data46 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'ihc_drip_end_numeric_value',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data46);
		$k++;

		$data47 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'ihc_drip_start_certain_date',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data47);
		$k++;

		$data48 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'ihc_drip_end_certain_date',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data48);
		$k++;

		$data49 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => '_metaseo_metatitle',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data49);
		$k++;

		$data50 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => '_metaseo_metadesc',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data50);
		$k++;

		$data51 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => '_metaseo_metakeywords',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data51);
		$k++;

		$data52 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => '_metaseo_metaopengraph-title',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data52);
		$k++;

		$data53 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => '_metaseo_metaopengraph-desc',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data53);
		$k++;

		$data54 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => '_metaseo_metaopengraph-image',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data54);
		$k++;

		$data55 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => '_metaseo_metatwitter-title',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data55);
		$k++;

		$data56 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => '_metaseo_metatwitter-desc',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data56);
		$k++;

		$data57 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => '_metaseo_metatwitter-image',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data57);
		$k++;

		$data58 = array(
			'meta_id' => $key + $k,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_count_post_views',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_postmeta', $data58);
		$k++;

		$data59 = array(
			'meta_id' => $key + $k,
			'post_id' => $fotoid[0],
			'meta_key' => '_wp_attached_file',
			'meta_value' => '../../mitra/assets/images/hotel/' . $upload1['file']['file_name']
		);
		$this->db->insert('wpwj_postmeta', $data59);
		$k++;

		$data60 = array(
			'meta_id' => $key + $k,
			'post_id' => $fotoid[1],
			'meta_key' => '_wp_attached_file',
			'meta_value' => '../../mitra/assets/images/hotel/' . $upload2['file']['file_name']
		);
		$this->db->insert('wpwj_postmeta', $data60);
		$k++;

		$data61 = array(
			'meta_id' => $key + $k,
			'post_id' => $fotoid[2],
			'meta_key' => '_wp_attached_file',
			'meta_value' => '../../mitra/assets/images/hotel/' . $upload3['file']['file_name']
		);
		$this->db->insert('wpwj_postmeta', $data61);
		$k++;

		$data62 = array(
			'meta_id' => $key + $k,
			'post_id' => $logoid,
			'meta_key' => '_wp_attached_file',
			'meta_value' => '../../mitra/assets/images/hotel/' . $upload4['file']['file_name']
		);
		$this->db->insert('wpwj_postmeta', $data62);
		$k++;

		foreach ($fasilitas as $amenity) {
			$list = array(
				'object_id' => $keyTransaksi,
				'term_taxonomy_id' => $amenity,
				'term_order' => '0'
			);
			$this->db->insert('wpwj_term_relationships', $list);

			$this->db->select('count');
			$this->db->where('term_taxonomy_id = ', $amenity);
			$rslt = $this->db->get('wpwj_term_taxonomy');
			foreach ($rslt->result() as $r) {
				$new = array(
					'count' => $r->count + 1
				);
				$this->db->where('term_taxonomy_id', $amenity);
				$this->db->update('wpwj_term_taxonomy', $new);
			}
		}

		$tipe = array(
			'object_id' => $keyTransaksi,
			'term_taxonomy_id' => $tipe_properti,
			'term_order' => '0'
		);
		$this->db->insert('wpwj_term_relationships', $tipe);

		$this->db->select('count');
		$this->db->where('term_taxonomy_id = ', $tipe_properti);
		$res = $this->db->get('wpwj_term_taxonomy');
		foreach ($res->result() as $re) {
			$new = array(
				'count' => $re->count + 1
			);
			$this->db->where('term_taxonomy_id', $tipe_properti);
			$this->db->update('wpwj_term_taxonomy', $new);
		}

	}

    public function save_type_kamar($id,$time,$properti,$judul,$deskripsi,$remaja,$anak,$fasilitas,$upload) {
        $this->db->select_max('ID');
        $data = $this->db->get('wpwj_posts');
        $keyTransaksi = "";
        foreach ($data->result() as $row) {
            $keyTransaksi = $row->ID + 1;
        }
        $data = array(
            'ID' => $keyTransaksi,
            'post_author' => $id,
            'post_date' => $time,
            'post_date_gmt' => $time,
            'post_content' => $deskripsi,
            'post_title' => $judul,
            'post_excerpt' => '',
            'post_status' => 'publish',
            'comment_status' => 'closed',
            'ping_status' => 'closed',
            'post_password' => '',
            'post_name' => $judul,
            'to_ping' => '',
            'pinged' => '',
            'post_modified' => $time,
            'post_modified_gmt' => $time,
            'post_content_filtered' => '',
            'post_parent' => '0',
            'guid' => 'https://vividi.id/?post_type=room_type&#038;p=' . $keyTransaksi,
            'menu_order' => '0',
            'post_type' => 'room_type',
            'post_mime_type' => '',
            'comment_count' => '0'
        );
        $this->db->insert('wpwj_posts', $data);

        $data_image = array(
            'ID' => $keyTransaksi + 1,
            'post_author' => $id,
            'post_date' => $time,
            'post_date_gmt' => $time,
            'post_content' => '',
            'post_title' => $judul,
            'post_excerpt' => '',
            'post_status' => 'inherit',
            'comment_status' => 'open',
            'ping_status' => 'closed',
            'post_password' => '',
            'post_name' => $judul,
            'to_ping' => '',
            'pinged' => '',
            'post_modified' => $time,
            'post_modified_gmt' => $time,
            'post_content_filtered' => '',
            'post_parent' => $keyTransaksi,
            'guid' => 'https://vividi.id/mitra/assets/images/hotel/'.$upload['file']['file_name'],
            'menu_order' => '0',
            'post_type' => 'attachment',
            'post_mime_type' => 'image/jpeg',
            'comment_count' => '0'
        );
        $this->db->insert('wpwj_posts', $data_image);

        $this->db->select_max('meta_id');
        $data = $this->db->get('wpwj_postmeta');
        $key = "";
        foreach ($data->result() as $row) {
            $key = $row->meta_id + 1;
        }
        $data1 = array(
            'meta_id' => $key,
            'post_id' => $keyTransaksi,
            'meta_key' => '_edit_lock',
            'meta_value' => '1568702113:2'
        );
        $this->db->insert('wpwj_postmeta', $data1);
        $data2 = array(
            'meta_id' => $key + 1,
            'post_id' => $keyTransaksi,
            'meta_key' => '_edit_last',
            'meta_value' => $id
        );
        $this->db->insert('wpwj_postmeta', $data2);
        $data3 = array(
            'meta_id' => $key + 2,
            'post_id' => $keyTransaksi,
            'meta_key' => '_thumbnail_id',
            'meta_value' => $keyTransaksi + 1
        );
        $this->db->insert('wpwj_postmeta', $data3);
        $data4 = array(
            'meta_id' => $key + 3,
            'post_id' => $keyTransaksi,
            'meta_key' => 'sbg_selected_sidebar_replacement',
            'meta_value' => 'a:1:{i:0;s:1:"0";}'
        );
        $this->db->insert('wpwj_postmeta', $data4);
        $data5 = array(
            'meta_id' => $key + 4,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_room_accommodation',
            'meta_value' => $properti
        );
        $this->db->insert('wpwj_postmeta', $data5);
        $data6 = array(
            'meta_id' => $key + 5,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_room_max_adults',
            'meta_value' => $remaja
        );
        $this->db->insert('wpwj_postmeta', $data6);
        $data7 = array(
            'meta_id' => $key + 6,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_room_max_kids',
            'meta_value' => $anak
        );
        $this->db->insert('wpwj_postmeta', $data7);
        $data8 = array(
            'meta_id' => $key + 7,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_post_media_type',
            'meta_value' => 'img'
        );
        $this->db->insert('wpwj_postmeta', $data8);
        $data9 = array(
            'meta_id' => $key + 8,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_gallery_imgs',
            'meta_value' => $keyTransaksi + 1
        );
        $this->db->insert('wpwj_postmeta', $data9);
        $data10 = array(
            'meta_id' => $key + 9,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_post_gallery_type',
            'meta_value' => 'sld_1'
        );
        $this->db->insert('wpwj_postmeta', $data10);
        $data11 = array(
            'meta_id' => $key + 10,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_post_direction_nav',
            'meta_value' => '1'
        );
        $this->db->insert('wpwj_postmeta', $data11);
        $data12 = array(
            'meta_id' => $key + 11,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_post_video_width',
            'meta_value' => '0'
        );
        $this->db->insert('wpwj_postmeta', $data12);
        $data13 = array(
            'meta_id' => $key + 12,
            'post_id' => $keyTransaksi,
            'meta_key' => 'sbg_selected_sidebar',
            'meta_value' => 'a:1:{i:0;s:1:"0";}'
        );
        $this->db->insert('wpwj_postmeta', $data13);
        $data14 = array(
            'meta_id' => $key + 13,
            'post_id' => $keyTransaksi,
            'meta_key' => '_wpb_vc_js_status',
            'meta_value' => 'false'
        );
        $this->db->insert('wpwj_postmeta', $data14);
        $data15 = array(
            'meta_id' => $key + 14,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_count_post_views',
            'meta_value' => '0'
        );
        $this->db->insert('wpwj_postmeta', $data15);
        $data16 = array(
            'meta_id' => $key + 15,
            'post_id' => $keyTransaksi + 1,
            'meta_key' => '_wp_attached_file',
            'meta_value' => '../../mitra/assets/images/hotel/' . $upload['file']['file_name']
        );
        $this->db->insert('wpwj_postmeta', $data16);

        foreach ($fasilitas as $amenity) {
            $list = array(
                'object_id' => $keyTransaksi,
                'term_taxonomy_id' => $amenity,
                'term_order' => '0'
            );
            $this->db->insert('wpwj_term_relationships', $list);

            $this->db->select('count');
            $this->db->where('term_taxonomy_id = ', $amenity);
            $rslt = $this->db->get('wpwj_term_taxonomy');
            foreach ($rslt->result() as $r) {
                $new = array(
                    'count' => $r->count + 1
                );
                $this->db->where('term_taxonomy_id', $amenity);
                $this->db->update('wpwj_term_taxonomy', $new);
            }
        }
    }

    public function save_atur_harga($tgl_1, $tgl_2, $allotment, $harga, $id_properti, $id_type_kamar)
    {
        $this->db->select_max('id');
        $data = $this->db->get('wpwj_trav_accommodation_vacancies');
        $keyTransaksi = "";
        foreach ($data->result() as $row) {
            $keyTransaksi = $row->id + 1;
        }
        $this->db->where('accommodation_id =', $id_properti);
        $this->db->where('room_type_id =', $id_type_kamar);
        $sql = $this->db->get('wpwj_trav_accommodation_vacancies');
        $this->db->where('date_from <=', $tgl_1);
        $this->db->where('date_to >', $tgl_1);
        $this->db->where('accommodation_id =', $id_properti);
        $this->db->where('room_type_id =', $id_type_kamar);
        $cek = $this->db->get('wpwj_trav_accommodation_vacancies');
        if ($cek->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                if ($tgl_1 == $row->date_from) {
                    if ($tgl_2 == $row->date_to) {
                        $data_new = array(
                            'rooms' => $allotment,
                            'price_per_room' => $harga
                        );
                        $this->db->where('id', $row->id);
                        $this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
                        break;
                    } else if ($tgl_2 < $row->date_to) {
                        $data = array(
                            'id' => $keyTransaksi,
                            'date_from' => $tgl_1,
                            'date_to' => $tgl_2,
                            'accommodation_id' => $id_properti,
                            'room_type_id' => $id_type_kamar,
                            'rooms' => $allotment,
                            'price_per_room' => $harga,
                            'price_per_person' => '',
                            'child_price' => ''
                        );
                        $this->db->insert('wpwj_trav_accommodation_vacancies', $data);
                        foreach ($sql->result() as $r) {
                            if ($tgl_2 >= $r->date_from && $tgl_2 < $r->date_to) {
                                $data_new = array(
                                    'date_from' => $tgl_2
                                );
                                $this->db->where('id', $r->id);
                                $this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
                            }
                        }
                        break;
                    } else if ($tgl_2 > $row->date_to) {
                        foreach ($sql->result() as $r) {
                            if ($tgl_1 >= $r->date_from && $tgl_1 < $r->date_to) {
                                $data_new = array(
                                    'date_to' => $tgl_2,
                                    'rooms' => $allotment,
                                    'price_per_room' => $harga
                                );
                                $this->db->where('id', $r->id);
                                $this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
                            }
                            if ($tgl_2 >= $r->date_from && $tgl_2 < $r->date_to) {
                                $data_new = array(
                                    'date_from' => $tgl_2
                                );
                                $this->db->where('id', $r->id);
                                $this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
                            }
                            if ($tgl_1 < $r->date_from && $tgl_2 >= $r->date_to) {
                                $this->db->where('id', $r->id);
                                $this->db->delete('wpwj_trav_accommodation_vacancies');
                            }
                        }
                        break;
                    }
                } else if ($tgl_1 > $row->date_from && $tgl_1 <= $row->date_to) {
                    if ($tgl_2 < $row->date_to) {
                        foreach ($sql->result() as $r) {
                            if ($tgl_1 > $r->date_from && $tgl_1 <= $r->date_to) {
                                $data_new = array(
                                    'date_to' => $tgl_1
                                );
                                $this->db->where('id', $r->id);
                                $this->db->update('wpwj_trav_accommodation_vacancies', $data_new);

                                $data = array(
                                    'id' => $keyTransaksi,
                                    'date_from' => $tgl_1,
                                    'date_to' => $tgl_2,
                                    'accommodation_id' => $id_properti,
                                    'room_type_id' => $id_type_kamar,
                                    'rooms' => $allotment,
                                    'price_per_room' => $harga,
                                    'price_per_person' => '',
                                    'child_price' => ''
                                );
                                $this->db->insert('wpwj_trav_accommodation_vacancies', $data);

                                $data = array(
                                    'id' => $keyTransaksi + 1,
                                    'date_from' => $tgl_2,
                                    'date_to' => $row->date_to,
                                    'accommodation_id' => $id_properti,
                                    'room_type_id' => $id_type_kamar,
                                    'rooms' => $row->rooms,
                                    'price_per_room' => $row->price_per_room,
                                    'price_per_person' => '',
                                    'child_price' => ''
                                );
                                $this->db->insert('wpwj_trav_accommodation_vacancies', $data);
                            }
                        }
                        break;
                    } else if ($tgl_2 > $row->date_to) {
                        foreach ($sql->result() as $r) {
                            if ($tgl_1 >= $r->date_from && $tgl_1 <= $r->date_to) {
                                $data_new = array(
                                    'date_to' => $tgl_1
                                );
                                $this->db->where('id', $r->id);
                                $this->db->update('wpwj_trav_accommodation_vacancies', $data_new);

                                $data = array(
                                    'id' => $keyTransaksi,
                                    'date_from' => $tgl_1,
                                    'date_to' => $tgl_2,
                                    'accommodation_id' => $id_properti,
                                    'room_type_id' => $id_type_kamar,
                                    'rooms' => $allotment,
                                    'price_per_room' => $harga,
                                    'price_per_person' => '',
                                    'child_price' => ''
                                );
                                $this->db->insert('wpwj_trav_accommodation_vacancies', $data);
                            }
                            if ($tgl_2 >= $r->date_from && $tgl_2 <= $r->date_to) {
                                $data_new = array(
                                    'date_from' => $tgl_2
                                );
                                $this->db->where('id', $r->id);
                                $this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
                            }
                            if ($tgl_1 < $r->date_from && $tgl_2 >= $r->date_to) {
                                $this->db->where('id', $r->id);
                                $this->db->delete('wpwj_trav_accommodation_vacancies');
                            }
                        }
                        break;
                    } else if ($tgl_2 == $row->date_to) {
                        $data_new = array(
                            'date_to' => $tgl_1
                        );
                        $this->db->where('id', $row->id);
                        $this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
                        $data = array(
                            'id' => $keyTransaksi,
                            'date_from' => $tgl_1,
                            'date_to' => $tgl_2,
                            'accommodation_id' => $id_properti,
                            'room_type_id' => $id_type_kamar,
                            'rooms' => $allotment,
                            'price_per_room' => $harga,
                            'price_per_person' => '',
                            'child_price' => ''
                        );
                        $this->db->insert('wpwj_trav_accommodation_vacancies', $data);
                        break;
                    }
                }
            }
        } else {
            $data = array(
                'id' => $keyTransaksi,
                'date_from' => $tgl_1,
                'date_to' => $tgl_2,
                'accommodation_id' => $id_properti,
                'room_type_id' => $id_type_kamar,
                'rooms' => $allotment,
                'price_per_room' => $harga,
                'price_per_person' => '',
                'child_price' => ''
            );
            $this->db->insert('wpwj_trav_accommodation_vacancies', $data);
            foreach ($sql->result() as $r) {
                if ($tgl_2 < $r->date_to) {
                    if ($tgl_2 >= $r->date_from && $tgl_2 < $r->date_to) {
                        $data_new = array(
                            'date_from' => $tgl_2
                        );
                        $this->db->where('id', $r->id);
                        $this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
                    }
                } else if ($tgl_2 > $r->date_to) {
                    foreach ($sql->result() as $r) {
                        if ($tgl_1 >= $r->date_from && $tgl_1 < $r->date_to) {
                            $data_new = array(
                                'date_to' => $tgl_2
                            );
                            $this->db->where('id', $r->id);
                            $this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
                        }
                        if ($tgl_2 >= $r->date_from && $tgl_2 <= $r->date_to) {
                            $data_new = array(
                                'date_from' => $tgl_2
                            );
                            $this->db->where('id', $r->id);
                            $this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
                        }
                        if ($tgl_1 < $r->date_from && $tgl_2 >= $r->date_to) {
                            $this->db->where('id', $r->id);
                            $this->db->delete('wpwj_trav_accommodation_vacancies');
                        }
                    }
                } else if ($tgl_2 == $r->date_to) {
                    $this->db->where('id', $r->id);
                    $this->db->delete('wpwj_trav_accommodation_vacancies');
                }
            }
        }
    }

    public function save_harga_baru($id, $harga)
    {
        $data_new = array(
            'price_per_room' => $harga
        );
        $this->db->where('id', $id);
        $this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
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

    public function data_email($booking_no)
    {
        $query = $this->db->query("select ab.id as id,
			ab.booking_no as booking_no,
			ab.first_name as nama_awal,
			ab.email as cust_email,
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
        Foreach ($query->result() as $row) {
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
        Foreach ($query->result() as $row) {
            $email = $row->user_email;
            return $email;
        }
    }

    public function data_profile($id)
    {
		$this->db->select('u.id as id, 
        u.user_email as email,
        umfirst.meta_value as awal,
        umlast.meta_value as akhir');
		$this->db->from('wpwj_users u');
		$this->db->join('wpwj_usermeta umfirst', '(u.ID = umfirst.user_id and umfirst.meta_key = "first_name")');
		$this->db->join('wpwj_usermeta umlast', '(u.ID = umlast.user_id and umlast.meta_key = "last_name")');
		$this->db->where('u.id', $id);
		$query = $this->db->get()->row();
        return $query;
    }
}
