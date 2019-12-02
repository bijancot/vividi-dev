<?php


class Akun extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_email');
		$this->load->model('Model_properti');
		$this->load->model('Model_pesan');
		$this->load->model('Model_register');
		$this->load->library('session');
		$this->load->database();
	}

	public function email_verifikasi($id)
	{
		$mitra = $this->Model_register->verification_cust($id);
		// Konfigurasi email
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'mail.vividi.id',
			'smtp_user' => 'info@vividi.id',  // Email gmail
			'smtp_pass' => 'devano2019',  // Password gmail
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		];

		// Load library email dan konfigurasinya
		$this->load->library('email', $config);

		// Email dan nama pengirim
		$this->email->from('info@vividi.id', 'E-mail Konfirmasi Akun');

//		$list = array($mitra, $admin);
		// Email penerima
		$this->email->to($mitra); // Ganti dengan email tujuan

		// Subject email
		$this->email->subject('E-mail Konfirmasi Akun');
		$data['data'] = $this->Model_register->confirm_verification($id);
		// Isi email
		$body = $this->load->view('Test/email_verification.php',$data,  TRUE);
		$this->email->message($body);

		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
//			redirect('http://localhost/vividi-dev/halaman-member/?ihc_ap_menu=orders');
			echo 'Sukses';
		} else {
			echo 'Error! email tidak dapat dikirim.';
		}
	}

	public function verifikasi(){
		$id = $this->uri->segment(4);
		$this->Model_register->get_verifikasi($id);
		$this->email_verifikasi($id);
//		$this->email_receipt($booking_no);
		redirect(base_url('Admin/Akun/akun'));
	}

	public function gagal(){
		$id = $this->uri->segment(3);
		$this->Model_email->get_cancel($id);
		redirect(base_url('Admin/Pesan/pesan'));
	}

	public function akun(){
		$data['data'] = $this->Model_register->verifikasi();
		$data['data_semua'] = $this->Model_register->semua_verifikasi();
		$data['folder'] = "Admin/verifikasi";
		$data['side'] = "verifikasi";
		$this->load->view('Admin/index', $data);
	}
}
