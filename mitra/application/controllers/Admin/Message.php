<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Model_pesan');
    }

    public function syarat_ketentuan()
    {
        $data['data'] = $this->Model_pesan->data_pesan_menunggu();
        $data['data_batal'] = $this->Model_pesan->data_pesan_batal();
        $data['data_sukses'] = $this->Model_pesan->data_pesan_sukses();
        $data['data_semua'] = $this->Model_pesan->data_pesan();
        $data['folder'] = "Admin/message";
        $data['side'] = "syarat_ketentuan";
        $this->load->view('Admin/index', $data);
    }

    public function save_syarat_ketentuan()
    {
        $text = $this->input->post('editor1');
        echo $text;
    }

}