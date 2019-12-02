<?php


class Model_profil extends CI_Model
{

    public function data_profile($id)
    {
        $this->db->select('u.id as id, 
        u.user_email as email,
        u.telepon as telepon,
        umfirst.meta_value as awal,
        umlast.meta_value as akhir');
        $this->db->from('wpwj_users u');
        $this->db->join('wpwj_usermeta umfirst', '(u.ID = umfirst.user_id and umfirst.meta_key = "first_name")');
        $this->db->join('wpwj_usermeta umlast', '(u.ID = umlast.user_id and umlast.meta_key = "last_name")');
        $this->db->where('u.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function data_user($id){
    	$this->db->select('u.id as id,
    	u.user_login as user,
    	u.user_email as email,
    	u.display_name as nama,
    	u.telepon as telepon,
    	u.jabatan as jabatan');
		$this->db->from('wpwj_users u');
		$this->db->where('u.id', $id);
		$query = $this->db->get();
		return $query->result();
	}

    function save_new_pass($id, $pass)
    {

        $data = array(
            'user_pass' => $pass
        );
        $this->db->where('ID', $id);
        $this->db->update('wpwj_users', $data);

    }

    function pass_lama($id)
    {
        $this->db->select('user_pass');
        $this->db->where('ID = ', $id);
        $rslt = $this->db->get('wpwj_users');
        foreach ($rslt->result() as $r) {
            return $r->user_pass;
        }
    }
}
