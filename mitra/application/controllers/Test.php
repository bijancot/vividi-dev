<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model("Model_email");
	}

	public function index()
	{
		$data['folder'] = "Test";
//		$data['side'] = "dashboard";
		$this->load->view('Test/index', $data);
	}

	public function real()
	{
		$data['folder'] = "Test";
//		$data['side'] = "dashboard";
		$this->load->view('Test/real', $data);
	}

	public function confirm()
	{
		$data['folder'] = "Test";
//		$data['side'] = "dashboard";
		$data['data'] = $this->Model_email->data_email('MK6S1F');
		$this->load->view('Test/confirm', $data);
	}

	public function timer()
	{
		$data['folder'] = "Test";
		$this->load->view('Test/timer', $data);
	}

	public function booking()
	{
		$data['data'] = $this->Model_email->data_email('MK6S1F');
		$data['folder'] = "Test";
		$this->load->view('Test/booking', $data);
	}

	public function payment()
	{
		$data['folder'] = "Test";
		$this->load->view('Test/payment', $data);
	}

	public function receipt()
	{
		$data['data'] = $this->Model_email->data_email('MK6S1F');
		$data['folder'] = "Test";
		$this->load->view('Test/receipt', $data);
	}

	public function voucher()
	{
		$data['data'] = $this->Model_email->data_email('INHY0Z');
		$data['folder'] = "Test";
		$this->load->view('Test/voucher', $data);
	}

	public function map1()
	{
		$data['folder'] = "Map";
		$this->load->view('Map/map1', $data);
	}

	public function map2()
	{
		$data['folder'] = "Map";
		$this->load->view('Map/map2', $data);
	}

	public function map3()
	{
		$data['folder'] = "Map";
		$this->load->view('Map/map3', $data);
	}
}
