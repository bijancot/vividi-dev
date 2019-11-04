<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properti extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('model_properti');
		$this->load->database();
    }

	public function index()
	{
		$this->load->model('model_properti');
		$id = $_SESSION['ID'];
		if($_SESSION['role'] == "administrator"){
			$data['data'] = $this->model_properti->data_semua_properti();
		}
		else{
			$data['data'] = $this->model_properti->data_properti($id);
		}
		$data['folder'] = "properti";
		$data['side'] = "Semua";
		$this->load->view('index',$data);
	}

    public function harga_modal()
    {
        $data['data'] = $this->input->post('jenis_kamar');
        $data['folder'] = "properti";
        $data['side'] = "modal";
        $this->load->view('index',$data);
    }

    public function atur_harga()
    {
        $data['data'] = $this->model_properti->data_semua_properti();
        $data['weekday'] = $this->input->post('weekday');
        $data['weekend'] = $this->input->post('weekend');
        $data['hseasion'] = $this->input->post('hseasion');
        $data['psseason'] = $this->input->post('psseason');
        $data['folder'] = "properti";
        $data['side'] = "harga";
        $this->load->view('index',$data);
    }
    public function tipe_properti()
    {
        $data['data'] = $this->model_properti->data_tipe_properti();
        $data['folder'] = "properti";
        $data['side'] = "tipe_properti";
        $this->load->view('index',$data);
    }

    public function fasilitas()
    {
        $data['data'] = $this->model_properti->data_fasilitas();
        $data['folder'] = "properti";
        $data['side'] = "fasilitas";
        $this->load->view('index',$data);
    }

    public function tipe_kamar()
    {
        $data['data'] = $this->model_properti->data_tipe_kamar();
        $data['folder'] = "properti";
        $data['side'] = "tipe_kamar";
        $this->load->view('index',$data);
    }

    public function pesan()
    {
        $data['data'] = $this->model_properti->data_pesan();
        $data['folder'] = "properti";
        $data['side'] = "pesan";
        $this->load->view('index',$data);
    }
}
