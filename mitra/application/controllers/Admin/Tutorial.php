<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Model_register');

	}

//	public function index()
//	{
//		$data = array();
//		if ($this->input->post('submit') != NULL) {
//
//			$content = $this->input->post('content');
//			$data['content'] = $content;
//
//		}
//		$data['data'] = $this->Model_register->verifikasi();
//		$data['folder'] = "Admin/tutorial";
//		$data['side'] = "tutorial";
//		$this->load->view('Admin/index', $data);
//	}
}
