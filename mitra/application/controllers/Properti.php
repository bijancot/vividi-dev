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
		$data['side'] = "Semua";
		$this->load->view('index',$data);
	}

    public function harga_modal()
    {
        $data['data'] = $this->input->post('jenis_kamar');
        $data['folder'] = "Properti";
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
        $data['folder'] = "Properti";
        $data['side'] = "harga";
        $this->load->view('index',$data);
    }
}
