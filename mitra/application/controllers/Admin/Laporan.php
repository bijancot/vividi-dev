<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Model_laporan');
    }

    public function transaksi()
    {
        $data['data'] = $this->Model_laporan->data_laporan();
        $data['data_terbayar'] = $this->Model_laporan->data_laporan_terbayar();
        $data['data_belum'] = $this->Model_laporan->data_laporan_belum();
        $data['folder'] = "Admin/laporan";
        $data['side'] = "transaksi";
        $this->load->view('Admin/index',$data);
    }

    public function penjualan()
    {
        $data['data'] = "";
        $data['folder'] = "Admin/laporan";
        $data['side'] = "penjualan";
        $this->load->view('Admin/index', $data);
    }

    public function modal_laporan()
    {
        $id = $this->input->post('id');
        $data['data'] = $this->Model_laporan->data_modal($id);
        $filter_view = $this->load->view('Admin/laporan/modal_laporan', $data, TRUE);
        echo json_encode($filter_view);
    }
}