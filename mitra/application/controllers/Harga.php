<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Harga extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_harga');
		$this->load->database();
		if ($_SESSION['ID'] == null){
			redirect(base_url('Login'));
		}
	}

	public function index()
	{
		$id = $_SESSION['ID'];
		$data['data'] = $this->Model_harga->data_modal_properti($id);
		$data['harga'] = $this->Model_harga->semua_harga($id);
		$data['folder'] = "harga";
		$data['side'] = "modal";
		$this->load->view('index',$data);
	}

	public function ubah_harga()
	{
		$id = $_SESSION['ID'];
		$data['data'] = $this->Model_harga->data_modal_properti($id);
		$data['harga'] = $this->Model_harga->semua_harga($id);
		$data['folder'] = "harga";
		$data['side'] = "ubah_harga";
		$this->load->view('index',$data);
	}

	public function atur_harga()
	{
		$properti = $this->input->post('properti');
		$kamar = $this->input->post('jenis_kamar');
		$prop = explode("_",$properti);
		$ka = explode("_",$kamar);
		$data['properti'] = $prop[1];
		$data['kamar'] = $ka[1];
		$data['id_properti'] = $prop[0];
		$data['id_kamar'] = $ka[0];
		$data['data'] = $this->Model_harga->data_atur_harga($prop[0], $ka[0]);
		$data['weekday'] = $this->input->post('weekday');
		$data['weekend'] = $this->input->post('weekend');
		$data['hseasion'] = $this->input->post('hseasion');
		$data['psseason'] = $this->input->post('psseason');
		$data['kosong'] = $this->input->post('0');
		$data['folder'] = "harga";
		$data['side'] = "harga";
		$this->form_validation->set_rules('weekday', 'a', 'required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');
		$this->form_validation->set_rules('weekend', 'a', 'required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');
		$this->form_validation->set_rules('hseasion', 'a', 'required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');
		$this->form_validation->set_rules('psseason', 'a', 'required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');
		$this->form_validation->set_error_delimiters('<br><div class="alert alert-danger" role="alert">', '</div>');
		if ($this->form_validation->run() == FALSE) {
            redirect(base_url('harga'));
        } else {
            $this->Model_harga->save_harga($ka[0], $data['weekday'], $data['weekend'], $data['hseasion'], $data['psseason']);
            $this->load->view('index',$data);
		}
	}

	public function save_harga(){
		$properti = $this->input->post('properti');
		$kamar = $this->input->post('jenis_kamar');
		$prop = explode("_",$properti);
		$ka = explode("_",$kamar);
		$data['properti'] = $prop[1];
		$data['kamar'] = $ka[1];
		$data['id_properti'] = $prop[0];
		$data['id_kamar'] = $ka[0];

		$harga = $this->input->post('optradio');
		if($harga == 0){
			$allotment = 0;
		} else {
			$allotment = $this->input->post('allotment');
		}
		$tgl_1 = $this->input->post('tgl_1');
		$date1 = str_replace('/', '-', $tgl_1);
		$newDate1 = date("Y-m-d", strtotime($date1));
		$tgl_2 = $this->input->post('tgl_2');
		$date2 = str_replace('/', '-', $tgl_2);
		$newDate2 = date("Y-m-d", strtotime($date2));
		if ($tgl_1 != '' && $tgl_2 != ''){
            $this->Model_harga->save_atur_harga($newDate1, $newDate2, $allotment, $harga, $prop[0], $ka[0]);
        }
		$data['data'] = $this->Model_harga->data_atur_harga($prop[0], $ka[0]);
		$data['weekday'] = $this->input->post('weekday');
		$data['weekend'] = $this->input->post('weekend');
		$data['hseasion'] = $this->input->post('hseasion');
		$data['psseason'] = $this->input->post('psseason');
		$data['folder'] = "harga";
		$data['side'] = "harga";

		$this->load->view('index',$data);
	}

	public function save_ubah_harga() {
		$id = $this->input->post('id');
		$harga = $this->input->post('harga');
		$this->form_validation->set_rules('harga', 'a', 'required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');
		if ($this->form_validation->run() == FALSE) {
			$this->Model_harga->save_harga_baru($id, $harga);
		}
		redirect(base_url('harga'));
	}

	public function modal_ubah_harga()
	{
		$id = $_SESSION['ID'];
		$post = $this->input->post('id');
		$data['data'] = $this->Model_harga->modal_ubah_harga($id,$post);
		$filter_view = $this->load->view('harga/modal_ubah_harga', $data, TRUE);

		echo json_encode($filter_view);
	}

    public function modal_harga()
    {
        $id = $this->input->post('id');
        $new_id = explode("_", $id);
        $data = $this->Model_harga->modal_harga($new_id[0]);
        echo json_encode($data);
    }

}
