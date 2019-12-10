<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Margin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $data['data'] = '';
        $data['folder'] = "Admin/margin";
        $data['side'] = "margin";
        $this->load->view('Admin/index', $data);
    }

}