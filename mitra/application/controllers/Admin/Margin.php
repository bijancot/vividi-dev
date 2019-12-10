<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Margin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Model_margin');
    }

    public function index()
    {
        $data['data'] = $this->Model_margin->margin();
        $data['folder'] = "Admin/margin";
        $data['side'] = "margin";
        $this->load->view('Admin/index', $data);
    }

    public function ubah_margin()
    {
        $margin = $this->input->post('margin');
        $this->Model_margin->save_margin($margin);
        redirect(base_url('Admin/margin'));
    }

}