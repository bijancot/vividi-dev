<?php

class model_login extends CI_Model
{
    function cek_login($user, $pass)
    {
        $this->db->where('user_login', $user);
        $this->db->where('user_pass', $pass);
        return $this->db->get('wpwj_users')->num_rows();;
    }

    function proses_login($user, $pass)
    {
        $this->db->select('wpwj_users.user_login, wpwj_users.user_pass, wpwj_usermeta.meta_value, wpwj_users.display_name');
        $this->db->from('wpwj_users');
        $this->db->join('wpwj_usermeta', 'wpwj_users.ID = wpwj_usermeta.user_id');
        $this->db->where('wpwj_users.user_login', $user);
        $this->db->where('wpwj_users.user_pass', $pass);
        $this->db->where('wpwj_usermeta.meta_key', 'wpwj_capabilities');
        $query = $this->db->get()->row();
        return $query;
    }
}