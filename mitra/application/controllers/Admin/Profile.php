<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_profil');
        $this->load->model('Model_register');
        $this->load->database();
    }

    public function index()
    {
        $id = $_SESSION['ID'];
        $data['data'] = $this->Model_profil->data_profile($id);
        $data['folder'] = "Admin/profile";
        $data['side'] = "profile";
        $this->load->view('Admin/index', $data);
    }

    public function ubah_profile()
    {
        $id = $_SESSION['ID'];
        $data['data'] = $this->Model_profil->data_profile($id);
        $data['folder'] = "Admin/profile";
        $data['side'] = "ubah_profile";
        $this->load->view('Admin/index', $data);
    }

    public function reset_pass()
    {
        $id = $_SESSION['ID'];
        $data['data'] = $this->Model_profil->data_profile($id);
        $data['folder'] = "Admin/profile";
        $data['side'] = "reset_pass";
        $this->load->view('Admin/index', $data);
    }

    public function edit_profile()
    {
        $id = $this->input->post('id');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $cek = $this->input->post('cek');
        $depan = $this->input->post('depan');
        $belakang = $this->input->post('belakang');
        $this->form_validation->set_rules('telepon', 'Telephone', 'trim|required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() != FALSE) {
            if ($email != $cek) {
                $cek_email = $this->Model_register->cek_email($email);
                if ($cek_email == true){
                    $this->Model_register->save_new_email($id, $email);
                }
            }
            $this->Model_register->save_profile($id, $depan, $belakang, $telepon);
            $_SESSION['nama'] = $depan . ' ' . $belakang;
        }
        redirect(base_url('Admin/profile'));
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
            redirect(base_url('Admin/profile'));
        }
        redirect(base_url('Admin/Profile/reset_pass'));
    }
}