<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->database();
    }

	public function index()
	{
		$data['folder'] = "Test";
//		$data['side'] = "dashboard";
		$this->load->view('Test/index',$data);
	}

	public function real()
	{
		$data['folder'] = "Test";
//		$data['side'] = "dashboard";
		$this->load->view('Test/real',$data);
	}

	public function timer()
	{
		$data['folder'] = "Test";
		$this->load->view('Test/timer', $data);
	}

	public function booking()
	{
		$data['folder'] = "Test";
		$this->load->view('Test/booking', $data);
	}

	public function payment()
	{
		$data['folder'] = "Test";
		$this->load->view('Test/payment', $data);
	}
}
