<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_profil');
        $this->load->library('session');
        $this->load->database();
    }

    public function reset_pass()
    {
        $id = $_SESSION['ID'];
        $data['data'] = $this->Model_profil->data_profile($id);
        $data['folder'] = "profile";
        $data['side'] = "reset_pass";
        $this->load->view('index', $data);
    }

    public function edit_password()
    {
        $id = $_SESSION['ID'];
        $pass = $this->input->post('password');
        $con = $this->input->post('confirm');
        $lama = $this->input->post('lama');
        $pass_lama = $this->Model_profil->pass_lama($id);
        if ($pass == $con && $pass_lama == $lama){
            $this->Model_profil->save_new_pass($id, $pass, $lama);
            redirect(base_url('home/profile'));
        }
        redirect(base_url('Profile/reset_pass'));
    }
}