<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_properti');
        $this->load->model('Model_register');
        $this->load->library('session');
        $this->load->database();
    }

    public function index()
    {
        $id = $_SESSION['ID'];
        $data['data'] = $this->Model_properti->data_properti($id);
        $data['data_batal'] = $this->Model_properti->data_pesan_batal($id);
        $data['data_menunggu'] = $this->Model_properti->data_pesan_menunggu($id);
        $data['data_sukses'] = $this->Model_properti->data_pesan_sukses($id);
        $data['data_batal'] = $this->Model_properti->data_pesan_batal($id);
        $data['data_menunggu'] = $this->Model_properti->data_pesan_menunggu($id);
        $data['data_sukses'] = $this->Model_properti->data_pesan_sukses($id);
        $data['folder'] = "dashboard";
        $data['side'] = "dashboard";
        $this->load->view('index', $data);
    }

    public function edit_profile()
    {
        $id = $this->input->post('id');
        $email = $this->input->post('email');
        $depan = $this->input->post('depan');
        $belakang = $this->input->post('belakang');
        $pass = $this->input->post('password');
        $confirm = $this->input->post('confirm');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() != FALSE) {
            if ($pass == '') {
                $this->Model_register->save_profile($id, $email, $depan, $belakang);
            } else {
                if ($pass == $confirm) {
                    $this->Model_register->save_profile_pass($id, $email, $depan, $belakang, $pass);
                } else {
                    $this->Model_register->save_profile($id, $email, $depan, $belakang);
                }
            }
            $_SESSION['nama'] = $depan . ' ' . $belakang;
        }
        redirect(base_url('home/profile'));
    }

    public function profile()
    {
        $id = $_SESSION['ID'];
        $data['data'] = $this->Model_properti->data_profile($id);
        $data['folder'] = "profile";
        $data['side'] = "profile";
        $this->load->view('index', $data);
    }
}
