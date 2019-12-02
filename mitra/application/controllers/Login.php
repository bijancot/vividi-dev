<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_login');
		$this->load->library('session');
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function ceklogin()
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
