<?php


class Model_Profil extends CI_Model
{

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
		$query = $this->db->get();
		return $query->result();
	}
}
