<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properti extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Model_properti');
		$this->load->database();
    }

	public function index()
	{
		$this->load->model('Model_properti');
		$id = $_SESSION['ID'];
		if($_SESSION['role'] == "administrator"){
			$data['data'] = $this->Model_properti->data_semua_properti();
		} else {
			$data['data'] = $this->Model_properti->data_properti($id);
		}
		$data['folder'] = "properti";
		$data['side'] = "semua";
		$this->load->view('index',$data);
	}

    public function harga_modal()
    {
        $id = $_SESSION['ID'];
        $data['data'] = $this->Model_properti->data_modal_properti($id);
        $data['folder'] = "properti";
        $data['side'] = "modal";
        $this->load->view('index',$data);
    }

	public function modal_kamar(){
        $id = $_SESSION['ID'];
        $prop = $this->input->post('prop');
        $data = $this->Model_properti->data_modal_kamar($id, $prop);
        echo json_encode($data);
    }

    public function atur_harga()
    {
        $data['data'] = $this->Model_properti->data_semua_properti();
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
        $data['data'] = $this->Model_properti->data_tipe_properti();
        $data['folder'] = "properti";
        $data['side'] = "tipe_properti";
        $this->load->view('index',$data);
    }

    public function fasilitas()
    {
        $data['data'] = $this->Model_properti->data_fasilitas();
        $data['folder'] = "properti";
        $data['side'] = "fasilitas";
        $this->load->view('index',$data);
    }

    public function tipe_kamar()
    {
        $id = $_SESSION['ID'];
        if($_SESSION['role'] == "administrator"){
            $data['prpti'] = $this->Model_properti->data_semua_properti();
        } else {
            $data['prpti'] = $this->Model_properti->data_properti($id);
        }
        $data['data'] = $this->Model_properti->data_tipe_kamar($id);
        $data['folder'] = "properti";
        $data['side'] = "tipe_kamar";
        $this->load->view('index',$data);
    }

    public function modal_tipe_kamar()
    {
        $id = $_SESSION['ID'];
        $post = $this->input->post('id');
        $data['data'] = $this->Model_properti->data_detail_tipe_kamar($id,$post);
        $filter_view = $this->load->view('properti/modal_tipe_kamar', $data, TRUE);

        echo json_encode($filter_view);
    }

    public function save_type_kamar() {
        $id = $_SESSION['ID'];
        date_default_timezone_set('Asia/Jakarta');
        $time = date("Y-m-d h:i:s");
        $propert = $this->input->post('properti');
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');
        $remaja = $this->input->post('remaja');
        $anak = $this->input->post('anak');
        $fasilitas = $this->input->post('amenity');
        $this->Model_properti->save_type_kamar($id,$time,$propert,$judul,$deskripsi,$remaja,$anak,$fasilitas);
        redirect(base_url('properti/tipe_kamar'));
    }

    public function pesan()
    {
        $data['data'] = $this->Model_properti->data_pesan();
        $data['folder'] = "properti";
        $data['side'] = "pesan";
        $this->load->view('index',$data);
    }

    public function sukses(){
        $id = $this->uri->segment(3);
        $this->Model_properti->get_pemesan($id);
        redirect(base_url('properti/pesan'));
    }
}
