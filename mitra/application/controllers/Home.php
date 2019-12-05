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
        $this->load->database();
		if ($_SESSION['ID'] == null){
			redirect(base_url('Login'));
		}
    }

    public function index()
    {
        $id = $_SESSION['ID'];
		$data['data'] = $this->Model_pesan->data_pesan_menunggu_mitra($id);
		$data['data_batal'] = $this->Model_pesan->data_pesan_batal_mitra($id);
		$data['data_sukses'] = $this->Model_pesan->data_pesan_sukses_mitra($id);
		$data['data_semua'] = $this->Model_pesan->data_pesan_mitra($id);
        $data['folder'] = "dashboard";
        $data['side'] = "dashboard";
        $this->load->view('index', $data);
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

    public function daftar(){
    	$id = $_SESSION['ID'];
		$data['data'] = $this->Model_profil->data_user($id);
		$data['folder'] = "profile";
		$data['side'] = "daftar";
		$this->load->view('index', $data);
	}
}
