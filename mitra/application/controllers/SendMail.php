<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendMail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_properti');
		$this->load->database();
	}

	public function send_email()
	{
//		$mitra = $_SESSION['email'];
		$admin = 'omibalola@gmail.com';
		// Konfigurasi email
		$config = [
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'protocol' => 'smtp',
			'smtp_host' => 'mail.vividi.id',
			'smtp_user' => 'info@vividi.id',  // Email gmail
			'smtp_pass' => 'hafiz110118',  // Password gmail
			'smtp_crypto' => 'ssl',
			'smtp_port' => 465,
			'crlf' => "\r\n",
			'newline' => "\r\n"
		];

		// Load library email dan konfigurasinya
		$this->load->library('email', $config);

		// Email dan nama pengirim
		$this->email->from('info@vividi.id', 'Testing Email');

//		$list = array($mitra, $admin);
		// Email penerima
		$this->email->to($admin); // Ganti dengan email tujuan

		// Lampiran email, isi dengan url/path file
//		$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

		// Subject email
		$this->email->subject('Testing VIVIDI & Email');
//		$data['data'] = $this->Model_properti->data_email($booking_no);
		// Isi email
//		$body = $this->load->view('Test/real.php', '', TRUE);
		$this->email->message('halo');

		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
			echo 'Email sukses di kirim';
		} else {
			echo 'Error! email tidak dapat dikirim.';
		}
	}
}
