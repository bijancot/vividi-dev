<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_properti');
        $this->load->model('Model_pesan');
        $this->load->model('Model_register');
		$this->load->model('Model_profil');
        $this->load->library('session');
        $this->load->database();
    }

    public function index()
    {
        $id = $_SESSION['ID'];
        $data['data'] = $this->Model_properti->data_properti($id);
        $data['data_batal'] = $this->Model_pesan->data_pesan_batal($id);
        $data['data_menunggu'] = $this->Model_pesan->data_pesan_menunggu($id);
        $data['data_sukses'] = $this->Model_pesan->data_pesan_sukses($id);
        $data['data_batal'] = $this->Model_pesan->data_pesan_batal($id);
        $data['data_menunggu'] = $this->Model_pesan->data_pesan_menunggu($id);
        $data['data_sukses'] = $this->Model_pesan->data_pesan_sukses($id);
        $data['folder'] = "dashboard";
        $data['side'] = "dashboard";
        $this->load->view('index', $data);
    }

    public function edit_profile()
    {
        $id = $this->input->post('id');
        $email = $this->input->post('email');
        $cek = $this->input->post('cek');
        $depan = $this->input->post('depan');
        $belakang = $this->input->post('belakang');
        $pass = $this->input->post('password');
        $confirm = $this->input->post('confirm');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() != FALSE) {
            if ($pass != '') {
                if ($pass == $confirm) {
                    $this->Model_register->save_new_pass($id, $pass);
                }
            }
            if ($email != $cek) {
                $cek_email = $this->Model_register->cek_email($email);
                if ($cek_email == true){
                    $this->Model_register->save_new_email($id, $email);
                }
            }
            $this->Model_register->save_profile($id, $depan, $belakang);
            $_SESSION['nama'] = $depan . ' ' . $belakang;
        }
        redirect(base_url('home/profile'));
    }

    public function profile()
    {
        $id = $_SESSION['ID'];
        $data['data'] = $this->Model_profil->data_profile($id);
        $data['folder'] = "profile";
        $data['side'] = "profile";
        $this->load->view('index', $data);
    }
}
