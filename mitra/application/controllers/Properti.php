<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properti extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('model_properti');
		$this->load->database();
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('model_properti');
		$data['data'] = $this->model_properti->data_semua_properti();
		$data['folder'] = "Properti";
		$data['side'] = "semua";
		$this->load->view('index',$data);
	}

    public function atur_harga()
    {
        $data['data'] = $this->model_properti->data_semua_properti();
        $data['folder'] = "Properti";
        $data['side'] = "harga";
        $this->load->view('index',$data);
    }

    public function tipe_properti()
    {
    	$data['data'] = $this->model_properti->data_tipe_properti();
        $data['folder'] = "Properti";
        $data['side'] = "tipe_properti";
        $this->load->view('index',$data);
    }

    public function fasilitas()
    {
    	$data['data'] = $this->model_properti->data_fasilitas();
        $data['folder'] = "Properti";
        $data['side'] = "fasilitas";
        $this->load->view('index',$data);
    }

    public function tipe_kamar()
    {
    	$data['data'] = $this->model_properti->data_tipe_kamar();
        $data['folder'] = "Properti";
        $data['side'] = "tipe_kamar";
        $this->load->view('index',$data);
    }

    public function pesan()
    {
    	$data['data'] = $this->model_properti->data_pesan();
        $data['folder'] = "Properti";
        $data['side'] = "pesan";
        $this->load->view('index',$data);
    }
}
