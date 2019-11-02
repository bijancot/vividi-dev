<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->database();
    }

	public function index()
	{
		$data['folder'] = "Dashboard";
		$data['side'] = "dashboard";
		$this->load->view('index',$data);
	}
}
