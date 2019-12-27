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
        $id = $_SESSION['ID'];
        $data['data'] = $this->Model_laporan->data_laporan_mitra($id);
        $data['data_terbayar'] = $this->Model_laporan->data_laporan_mitra_terbayar($id);
        $data['data_belum'] = $this->Model_laporan->data_laporan_mitra_belum($id);
        $data['folder'] = "laporan";
        $data['side'] = "transaksi";
        $this->load->view('index',$data);
    }

    public function penjualan()
    {
        $data['data'] = "";
        $data['folder'] = "laporan";
        $data['side'] = "penjualan";
        $this->load->view('index', $data);
    }

    public function modal_info()
    {
        $id = $this->input->post('booking_no');
        $data['data'] = $this->Model_laporan->data_modal_info($id);
        $filter_view = $this->load->view('laporan/modal_info', $data, TRUE);
        echo json_encode($filter_view);
    }
}