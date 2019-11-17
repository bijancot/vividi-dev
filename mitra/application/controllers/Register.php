<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_register');
        $this->load->library('session');
        $this->load->database();
    }

    public function index()
    {
        $this->load->view('register');
    }

    public function cek_register()
    {
        $user = $this->input->post('username');
        $pass = random_string('alnum', 16);
        $email = $this->input->post('email');
        $n_depan = $this->input->post('depan');
        $n_belakang = $this->input->post('belakang');
        $telepon = $this->input->post('telp');
        $terms = $this->input->post('terms');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('telp', 'Telephone', 'trim|required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]|max_length[12]');
        date_default_timezone_set('Asia/Jakarta');
        $time = date("Y-m-d h:i:s");
        if ($this->form_validation->run() == FALSE || $terms != "ok") {
            redirect('Register');
        } else {
            echo $pass;
            $this->Model_register->save_mitra($user, $pass, $email, $n_depan, $n_belakang, $telepon, $time);
            redirect('');
        }
    }
}