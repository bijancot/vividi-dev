<?php 
 
class model_properti extends CI_Model{
	function data_semua_properti(){
		// $this->db->select('posts.post_title as Judul,
		// 	 t.name AS Tipe_Properti,
		// 	 (select t.name from wpwj_terms t left join wpwj_postmeta pm on t.term_id = pm.meta_value where pm.meta_value = pmkota.meta_value group by posts.ID) as Kota,
		// 	 (select t.name from wpwj_terms t left join wpwj_postmeta pm on t.term_id = pm.meta_value where pm.meta_value = pmnegara.meta_value group by posts.ID) as Negara,
		// 	 users.display_name as Penulis,
		// 	 posts.post_date as Tanggal');
		// $this->db->from('wpwj_posts posts');
		// $this->db->join('wpwj_term_relationships tr','posts.id = tr.object_id','left');
		// $this->db->join('wpwj_terms t','t.term_id = tr.term_taxonomy_id','left');
		// $this->db->join('wpwj_users users','users.ID = posts.post_author','left');
		// $this->db->join('wpwj_postmeta pmkota','posts.id = pmkota.post_id','left');
		// $this->db->join('wpwj_postmeta pmnegara','posts.id = pmnegara.post_id','left');
		// $this->db->where('posts.post_status','publish');
		// $this->db->where('posts.post_type','accommodation');
		// $this->db->where('posts.post_type','accommodation');
		// $query = $this->db->get();
		// return $query->result();
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

	function data_tipe_kamar(){
		$query = $this->db->query("select p.ID as id, p.post_title as judul, 
			 post.post_title as properti, 
			 pmdewasa.meta_value as dewasa,
			 pmanak.meta_value as anak,
			 users.display_name as penulis,
			 p.post_date as tanggal
			 from wpwj_posts p
			 left join wpwj_trav_accommodation_vacancies av on p.id = av.room_type_id
			 left join wpwj_posts post on post.id = av.accommodation_id
			 left join wpwj_postmeta pmdewasa on p.id = pmdewasa.post_id
			 left join wpwj_postmeta pmanak on p.id = pmanak.post_id
			 LEFT JOIN wpwj_users users on users.ID = p.post_author
			 where pmdewasa.meta_key = 'trav_room_max_adults'
			 AND pmanak.meta_key = 'trav_room_max_kids'
			 AND p.post_type = 'room_type'
			 AND post.post_type = 'accommodation'
			 AND p.post_status = 'publish'
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
}