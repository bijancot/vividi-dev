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
        $data['folder'] = "Admin/message";
        $data['side'] = "penggunaan";
        $this->load->view('Admin/index', $data);
    }

    public function syarat_ketentuan()
    {
        $data['data'] = $this->Model_message->syarat_ketentuan();
        $data['folder'] = "Admin/message";
        $data['side'] = "syarat_ketentuan";
        $this->load->view('Admin/index', $data);
    }

    public function hubungi()
    {
        $data['data'] = $this->Model_message->hubungi();
        $data['folder'] = "Admin/message";
        $data['side'] = "hubungi";
        $this->load->view('Admin/index', $data);
    }

    public function tentang()
    {
        $data['data'] = $this->Model_message->tentang();
        $data['folder'] = "Admin/message";
        $data['side'] = "tentang";
        $this->load->view('Admin/index', $data);
    }

    public function save_penggunaan()
    {
        $text = $this->input->post('editor1');
        $this->Model_message->save_penggunaan($text);
        redirect(base_url('Admin/Message/penggunaan'));
    }

    public function save_syarat_ketentuan()
    {
        $text = $this->input->post('editor1');
        $this->Model_message->save_syarat_ketentuan($text);
        redirect(base_url('Admin/Message/syarat_ketentuan'));
    }

    public function save_hubungi()
    {
        $text = $this->input->post('editor1');
        $this->Model_message->save_hubungi($text);
        redirect(base_url('Admin/Message/hubungi'));
    }

    public function save_tentang()
    {
        $text = $this->input->post('editor1');
        $this->Model_message->save_tentang($text);
        redirect(base_url('Admin/Message/tentang'));
    }

}