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

    public function pembayaran()
    {
        $no = $this->input->post('no');
        $kode = $this->input->post('kode');
        date_default_timezone_set('Asia/Jakarta');
        $time = date("Y-m-d");
        $this->Model_laporan->save_pembayaran($no, $kode, $time);
        redirect(base_url('Admin/laporan/transaksi/tab_2'));
    }

    public function modal_laporan()
    {
        $id = $this->input->post('booking_no');
        $data['data'] = $this->Model_laporan->data_modal($id);
        $filter_view = $this->load->view('Admin/laporan/modal_laporan', $data, TRUE);
        echo json_encode($filter_view);
    }

    public function modal_info()
    {
        $id = $this->input->post('booking_no');
        $data['data'] = $this->Model_laporan->data_modal_info($id);
        $filter_view = $this->load->view('Admin/laporan/modal_info', $data, TRUE);
        echo json_encode($filter_view);
    }
}