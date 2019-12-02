<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Model_message');
    }

    public function penggunaan()
    {
        $data['data'] = $this->Model_message->penggunaan();
        $data['folder'] = "message";
        $data['side'] = "penggunaan";
        $this->load->view('index', $data);
    }

    public function syarat_ketentuan()
    {
        $data['data'] = $this->Model_message->syarat_ketentuan();
        $data['folder'] = "message";
        $data['side'] = "syarat_ketentuan";
        $this->load->view('index', $data);
    }

    public function hubungi()
    {
        $data['data'] = $this->Model_message->hubungi();
        $data['folder'] = "message";
        $data['side'] = "hubungi";
        $this->load->view('index', $data);
    }

    public function tentang()
    {
        $data['data'] = $this->Model_message->tentang();
        $data['folder'] = "message";
        $data['side'] = "tentang";
        $this->load->view('index', $data);
    }
}