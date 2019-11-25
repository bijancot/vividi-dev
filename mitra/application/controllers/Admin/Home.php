<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        $this->load->model('Model_pesan');
        $this->load->model('Model_properti');
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
		$data['folder'] = "Admin";
		$data['side'] = "dashboard";
		$this->load->view('Admin/index',$data);
	}

	public function edit_profile()
    {

    }
}
