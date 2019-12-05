<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_login');
		$this->load->model('Model_register');
		$this->load->library('session');
		$this->load->database();
	}

	public function index_get()
	{
		$data = $this->Model_register->semua_user();
		if ($data) {
			$result = [
				'error'  => false,
				'restos' => $data
			];
			// Set the response and exit
			$this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		} else {
			// Set the response and exit
			$this->response([
				'status'  => REST_Controller::HTTP_INTERNAL_SERVER_ERROR,
				'message' => 'No uses were found'
			], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // NOT_FOUND (404) being the HTTP response code
		}
	}

	public function ceklogin_post()
	{
		if (isset($_POST['submit'])) {
//            $pass = md5($this->input->post('password', true));
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$cek = $this->Model_login->cek_login($user, $pass);
			if ($cek->num_rows() > 0) {
				$cek_status = $cek->row_array();
				if ($cek_status['status'] == 1) {
					$pelogin = $this->Model_login->proses_login($user, $pass);
					$level = $pelogin->meta_value;
					$role = explode('"', $level);
					$nama = $pelogin->display_name;
					$id = $pelogin->ID;
					$email = $pelogin->user_email;
					$hotel = $pelogin->name_hotel;
					$data = array('role' => $role[1], 'username' => $user, 'nama' => $nama, 'ID' => $id, 'email' => $email, 'hotel' => $hotel);
					$this->session->set_userdata($data);
					if ($role[1] == "administrator") {
						redirect(base_url('Admin/home'));
					} else if ($role[1] == "trav_busowner") {
						redirect(base_url('home'));
					} else {

					}
				} else {
					$message = "Akun anda belum tervalidasi, mohon tunggu validasi dari pihak Vividi.";
					echo "<script type='text/javascript'>alert('$message');</script>";
					$this->load->view('login');
				}
			} else {
				$message = "Username atau Password anda Salah.\\nSilahkan Coba Lagi.";
				echo "<script type='text/javascript'>alert('$message');</script>";
				$this->load->view('login');
			}
		}

	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
