<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pesan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_pesan');
		$this->load->database();
		if ($_SESSION['ID'] == null){
			redirect(base_url('Login'));
		}
	}

	public function view_pesan()
	{
		$id = $_SESSION['ID'];
		$data['data'] = $this->Model_pesan->data_pesan_menunggu_mitra($id);
		$data['data_batal'] = $this->Model_pesan->data_pesan_batal_mitra($id);
		$data['data_sukses'] = $this->Model_pesan->data_pesan_sukses_mitra($id);
		$data['data_semua'] = $this->Model_pesan->data_pesan_mitra($id);
		$data['folder'] = "pesan";
		$data['side'] = "pesan";
		$this->load->view('index',$data);
	}

	public function sukses($booking_no){
		$id = $this->uri->segment(3);
		$this->Model_pesan->get_sukses($booking_no);
		$this->send_email($booking_no);
		redirect(base_url('pesan'));
	}

	public function gagal(){
		$id = $this->uri->segment(3);
		$this->Model_pesan->get_cancel($id);
		redirect(base_url('pesan'));
	}

	public function data_booking($booking_no){
		$data['data'] = $this->Model_pesan->data_email($booking_no);
		$data['folder'] = "Test";
		$this->load->view('Test/booking', $data);
	}
}
