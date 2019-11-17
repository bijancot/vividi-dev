<?php

class model_register extends CI_Model
{
    function save_mitra($user, $pass, $email, $n_depan, $n_belakang, $telepon, $time)
    {
        $this->db->select_max('ID');
        $data = $this->db->get('wpwj_users');
        $ai = "";
        foreach ($data->result() as $row) {
            $ai = $row->ID + 1;
        }
        $data = array(
            'ID' => $ai,
            'user_login' => $user,
            'user_pass' => $pass,
            'user_nicename' => strtolower($user),
            'user_email' => $email,
            'user_url' => '',
            'user_registered' => $time,
            'user_activation_key' => '',
            'user_status' => '0',
            'display_name' => $n_depan.' '.$n_belakang,
        );
        $this->db->insert('wpwj_users', $data);
    }
}