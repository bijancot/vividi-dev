<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        $this->load->model('Model_properti');
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
        $profile = $this->Model_properti->data_profile($id);
        $pemail = $profile->email;
        $pawal = $profile->awal;
        $pakhir = $profile->akhir;
		$datax = array('awal' => $pawal, 'akhir' => $pakhir);
		$this->session->set_userdata($datax);
		$data['folder'] = "dashboard";
		$data['side'] = "dashboard";
		$this->load->view('index',$data);
	}

	public function edit_profile()
    {

    }
}
