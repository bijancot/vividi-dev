<?php


class Model_kamar extends CI_Model
{
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

	public function save_type_kamar($id,$time,$properti,$judul,$deskripsi,$remaja,$anak,$fasilitas,$upload1,$upload2,$upload3) {
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

		$data_image1 = array(
			'ID' => $keyTransaksi + 1,
			'post_author' => $id,
			'post_date' => $time,
			'post_date_gmt' => $time,
			'post_content' => '',
			'post_title' => $judul.' 1',
			'post_excerpt' => '',
			'post_status' => 'inherit',
			'comment_status' => 'open',
			'ping_status' => 'closed',
			'post_password' => '',
			'post_name' => str_replace(" ", "-", $judul)."-1",
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

        $data_image2 = array(
            'ID' => $keyTransaksi + 2,
            'post_author' => $id,
            'post_date' => $time,
            'post_date_gmt' => $time,
            'post_content' => '',
            'post_title' => $judul.' 2',
            'post_excerpt' => '',
            'post_status' => 'inherit',
            'comment_status' => 'open',
            'ping_status' => 'closed',
            'post_password' => '',
            'post_name' => str_replace(" ", "-", $judul)."-2",
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

        $data_image3 = array(
            'ID' => $keyTransaksi + 3,
            'post_author' => $id,
            'post_date' => $time,
            'post_date_gmt' => $time,
            'post_content' => '',
            'post_title' => $judul.' 3',
            'post_excerpt' => '',
            'post_status' => 'inherit',
            'comment_status' => 'open',
            'ping_status' => 'closed',
            'post_password' => '',
            'post_name' => str_replace(" ", "-", $judul)."-3",
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
			'meta_value' => 'sld'
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
            'meta_key' => 'trav_gallery_imgs',
            'meta_value' => $keyTransaksi + 2
        );
        $this->db->insert('wpwj_postmeta', $data10);
        $data11 = array(
            'meta_id' => $key + 10,
            'post_id' => $keyTransaksi,
            'meta_key' => 'trav_gallery_imgs',
            'meta_value' => $keyTransaksi + 3
        );
        $this->db->insert('wpwj_postmeta', $data11);
		$data12 = array(
			'meta_id' => $key + 11,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_post_gallery_type',
			'meta_value' => 'sld_1'
		);
		$this->db->insert('wpwj_postmeta', $data12);
		$data13 = array(
			'meta_id' => $key + 12,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_post_direction_nav',
			'meta_value' => '1'
		);
		$this->db->insert('wpwj_postmeta', $data13);
		$data14 = array(
			'meta_id' => $key + 13,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_post_video_width',
			'meta_value' => '0'
		);
		$this->db->insert('wpwj_postmeta', $data14);
		$data15 = array(
			'meta_id' => $key + 14,
			'post_id' => $keyTransaksi,
			'meta_key' => 'sbg_selected_sidebar',
			'meta_value' => 'a:1:{i:0;s:1:"0";}'
		);
		$this->db->insert('wpwj_postmeta', $data15);
		$data16 = array(
			'meta_id' => $key + 15,
			'post_id' => $keyTransaksi,
			'meta_key' => '_wpb_vc_js_status',
			'meta_value' => 'false'
		);
		$this->db->insert('wpwj_postmeta', $data16);
		$data17 = array(
			'meta_id' => $key + 16,
			'post_id' => $keyTransaksi,
			'meta_key' => 'trav_count_post_views',
			'meta_value' => '0'
		);
		$this->db->insert('wpwj_postmeta', $data17);
		$data18 = array(
			'meta_id' => $key + 17,
			'post_id' => $keyTransaksi + 1,
			'meta_key' => '_wp_attached_file',
			'meta_value' => '../../mitra/assets/images/hotel/' . $upload1['file']['file_name']
		);
		$this->db->insert('wpwj_postmeta', $data18);
        $data19 = array(
            'meta_id' => $key + 18,
            'post_id' => $keyTransaksi + 2,
            'meta_key' => '_wp_attached_file',
            'meta_value' => '../../mitra/assets/images/hotel/' . $upload2['file']['file_name']
        );
        $this->db->insert('wpwj_postmeta', $data19);
        $data20 = array(
            'meta_id' => $key + 19,
            'post_id' => $keyTransaksi + 3,
            'meta_key' => '_wp_attached_file',
            'meta_value' => '../../mitra/assets/images/hotel/' . $upload3['file']['file_name']
        );
        $this->db->insert('wpwj_postmeta', $data20);

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

	function data_amenity()
    {
        $this->db->select('term_id, name');
        $this->db->where('type = ', 'default');
        return $rslt = $this->db->get('wpwj_terms')->result();
    }
}
