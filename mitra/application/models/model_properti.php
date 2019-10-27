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
}