<?php 
 
class model_properti extends CI_Model{
	function data_semua_properti(){
		$query = $this->db->query("select posts.ID as id, posts.post_title as Judul,
			 t.name AS Tipe_Properti,
			 (select t.name from wpwj_terms t left join wpwj_postmeta pm on t.term_id = pm.meta_value where pm.meta_value = pmkota.meta_value group by posts.ID) as Kota,
			 (select t.name from wpwj_terms t left join wpwj_postmeta pm on t.term_id = pm.meta_value where pm.meta_value = pmnegara.meta_value group by posts.ID) as Negara,
			 users.display_name as Penulis,
			 posts.post_date as Tanggal
			 from wpwj_posts posts 
			 LEFT JOIN wpwj_term_relationships tr on posts.id = tr.object_id
			 LEFT JOIN wpwj_terms t on t.term_id = tr.term_taxonomy_id
			 LEFT JOIN wpwj_users users on users.ID = posts.post_author
			 LEFT JOIN wpwj_postmeta pmkota on posts.id = pmkota.post_id
			 LEFT JOIN wpwj_postmeta pmnegara on posts.id = pmnegara.post_id
			 WHERE posts.post_status = 'publish' 
			 AND posts.post_type = 'accommodation' 
			 AND (term_taxonomy_id = 58 OR term_taxonomy_id = 102 OR term_taxonomy_id = 183 OR term_taxonomy_id = 184)
			 AND pmkota.meta_key = 'trav_accommodation_city'
			 AND pmnegara.meta_key = 'trav_accommodation_country'
			 GROUP BY posts.ID");
		return $query->result();
	}

	function data_properti($id){
		$query = $this->db->query("select posts.ID as id, posts.post_title as Judul,
			 t.name AS Tipe_Properti,
			 (select t.name from wpwj_terms t left join wpwj_postmeta pm on t.term_id = pm.meta_value where pm.meta_value = pmkota.meta_value group by posts.ID) as Kota,
			 (select t.name from wpwj_terms t left join wpwj_postmeta pm on t.term_id = pm.meta_value where pm.meta_value = pmnegara.meta_value group by posts.ID) as Negara,
			 users.display_name as Penulis,
			 posts.post_date as Tanggal
			 from wpwj_posts posts 
			 LEFT JOIN wpwj_term_relationships tr on posts.id = tr.object_id
			 LEFT JOIN wpwj_terms t on t.term_id = tr.term_taxonomy_id
			 LEFT JOIN wpwj_users users on users.ID = posts.post_author
			 LEFT JOIN wpwj_postmeta pmkota on posts.id = pmkota.post_id
			 LEFT JOIN wpwj_postmeta pmnegara on posts.id = pmnegara.post_id
			 WHERE posts.post_status = 'publish' 
			 AND posts.post_type = 'accommodation' 
			 AND (term_taxonomy_id = 58 OR term_taxonomy_id = 102 OR term_taxonomy_id = 183 OR term_taxonomy_id = 184)
			 AND pmkota.meta_key = 'trav_accommodation_city'
			 AND pmnegara.meta_key = 'trav_accommodation_country'
			 AND posts.post_author = ".$id."
			 GROUP BY posts.ID
             order by posts.post_date desc");
		return $query->result();
	}

	function data_tipe_properti(){
		$query = $this->db->query("select t.term_id as id, t.name as nama, tt.description as deskripsi, t.slug as slug, tt.count as jumlah 
			from wpwj_terms t
			left join wpwj_term_taxonomy tt
			on t.term_id = tt.term_id
			where tt.taxonomy = 'accommodation_type'
			order by t.name ASC");
		return $query->result();
	}

	function data_fasilitas(){
		$query = $this->db->query("select t.term_id as id, t.name as nama, tt.description as deskripsi, t.slug as slug, tt.count as jumlah 
			from wpwj_terms t
			left join wpwj_term_taxonomy tt
			on t.term_id = tt.term_id
			where tt.taxonomy = 'amenity'
			order by t.name ASC");
		return $query->result();
	}

	function data_tipe_kamar($id){
        $query = $this->db->query("select p.ID as id, p.post_title as judul, 
             post.post_title as properti, 
             pmdewasa.meta_value as dewasa,
             pmanak.meta_value as anak,
             users.display_name as penulis,
             p.post_date as tanggal
             from wpwj_posts p
             left join wpwj_postmeta pmroom on p.id = pmroom.post_id
             left join wpwj_posts post on post.id = pmroom.meta_value
             left join wpwj_postmeta pmdewasa on p.id = pmdewasa.post_id
             left join wpwj_postmeta pmanak on p.id = pmanak.post_id
             LEFT JOIN wpwj_users users on users.ID = p.post_author
             where pmdewasa.meta_key = 'trav_room_max_adults'
             AND pmanak.meta_key = 'trav_room_max_kids'
             AND pmroom.meta_key = 'trav_room_accommodation'
             AND p.post_type = 'room_type'
             AND post.post_type = 'accommodation'
             AND p.post_status = 'publish'
             AND p.post_author = ".$id."
             group by p.id
             order by tanggal desc");
        return $query->result();
    }

	function data_pesan(){
		$query = $this->db->query("select ab.id as id,
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
			 order by pesan desc");
		return $query->result();
	}

	function data_modal_properti($id){
		$query = $this->db->query("select p.id, p.post_title as properti
			from wpwj_posts p 
			left join wpwj_users u on p.post_author = u.ID
			where p.post_type = 'accommodation'
			AND p.post_status = 'publish'
			AND p.post_author = ".$id);
		return $query->result();
	}

	function data_modal_kamar($id, $prop){
		$query = $this->db->query("select ta.room_type_id as ID, p.post_title as kamar
			from wpwj_posts p
			left join wpwj_users u on p.post_author = u.ID
			left join wpwj_trav_accommodation_vacancies ta on p.ID = ta.room_type_id
			where p.post_type = 'room_type'
			AND p.post_status = 'publish'
			AND p.post_author = ".$id."
			AND ta.accommodation_id = ".$prop);
		return $query->result();
	}

    public function save_type_kamar($id,$time,$properti,$judul,$deskripsi,$remaja,$anak,$fasilitas) {
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
            'guid' => 'https://vividi.id/?post_type=room_type&#038;p='.$keyTransaksi,
            'menu_order' => '0',
            'post_type' => 'room_type',
            'post_mime_type' => '',
            'comment_count' => '0'
        );
        $this->db->insert('wpwj_posts', $data);

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
            'meta_id' => $key+1,
            'post_id' => $keyTransaksi,
            'meta_key' => '_edit_last',
            'meta_value' => '2'
        );
        $this->db->insert('wpwj_postmeta', $data2);
        $data3 = array(
            'meta_id' => $key+2,
            'post_id' => $keyTransaksi,
            'meta_key' => '_thumbnail_id',
            'meta_value' => '3362'
        );
        $this->db->insert('wpwj_postmeta', $data3);
        $data4 = array(
            'meta_id' => $key+3,
            'post_id' => $keyTransaksi,
            'meta_key' => 'sbg_selected_sidebar_replacement',
            'meta_value' => 'a:1:{i:0;s:1:"0";}'
        );
        $this->db->insert('wpwj_postmeta', $data4);
        $data5 = array(
            'meta_id' => $key+4,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_room_accommodation',
            'meta_value' => $properti
        );
        $this->db->insert('wpwj_postmeta', $data5);
        $data6 = array(
            'meta_id' => $key+5,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_room_max_adults',
            'meta_value' => $remaja
        );
        $this->db->insert('wpwj_postmeta', $data6);
        $data7 = array(
            'meta_id' => $key+6,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_room_max_kids',
            'meta_value' => $anak
        );
        $this->db->insert('wpwj_postmeta', $data7);
        $data8 = array(
            'meta_id' => $key+7,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_post_media_type',
            'meta_value' => 'img'
        );
        $this->db->insert('wpwj_postmeta', $data8);
        $data9 = array(
            'meta_id' => $key+8,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_gallery_imgs',
            'meta_value' => '3357'
        );
        $this->db->insert('wpwj_postmeta', $data9);
        $data10 = array(
            'meta_id' => $key+9,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_post_gallery_type',
            'meta_value' => 'sld_1'
        );
        $this->db->insert('wpwj_postmeta', $data10);
        $data11 = array(
            'meta_id' => $key+10,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_post_direction_nav',
            'meta_value' => '1'
        );
        $this->db->insert('wpwj_postmeta', $data11);
        $data12 = array(
            'meta_id' => $key+11,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_post_video_width',
            'meta_value' => '0'
        );
        $this->db->insert('wpwj_postmeta', $data12);
        $data13 = array(
            'meta_id' => $key+12,
            'post_id' => $keyTransaksi,
            'meta_key' => 'sbg_selected_sidebar',
            'meta_value' => 'a:1:{i:0;s:1:"0";}'
        );
        $this->db->insert('wpwj_postmeta', $data13);
        $data14 = array(
            'meta_id' => $key+13,
            'post_id' => $keyTransaksi,
            'meta_key' => '_wpb_vc_js_status',
            'meta_value' => 'false'
        );
        $this->db->insert('wpwj_postmeta', $data14);
        $data15 = array(
            'meta_id' => $key+14,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_count_post_views',
            'meta_value' => '0'
        );
        $this->db->insert('wpwj_postmeta', $data15);

        foreach($fasilitas as $amenity) {
            $list = array(
                'object_id' => $keyTransaksi,
                'term_taxonomy_id' => $amenity,
                'term_order' => '0'
            );
            $this->db->insert('wpwj_term_relationships', $list);
//            $this->db->select('*');
//            $this->db->from('wpwj_term_taxonomy');
//            $this->db->where('term_taxonomy_id = ',$amenity);
//            $result = $this->db->get();
//            foreach($result as $r) {
//                $new = array(
//                    'count' => (($r->count)+1),
//                );
//                $this->db->where('term_taxonomy_id', $amenity);
//                $this->db->update('wpwj_term_taxonomy',$new);
//            }
        }
    }
}