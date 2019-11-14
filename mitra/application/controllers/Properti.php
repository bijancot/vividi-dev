<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properti extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_properti');
		$this->load->library('session');
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

	public function tambah_properti(){
		$data['tipe'] = $this->Model_properti->combo_tipe_properti();
		$data['country'] = $this->Model_properti->combo_country();
		$data['folder'] = "properti";
		$data['side'] = "properti";
		$data['view'] = "insert";
		$this->load->view('index',$data);
	}

	public function modal_city(){
		$id = $this->input->post('country');
		$data = $this->Model_properti->combo_city($id);
		echo json_encode($data);
	}

	public function harga_modal()
	{
		$id = $_SESSION['ID'];
		$data['data'] = $this->Model_properti->data_modal_properti($id);
        $data['harga'] = $this->Model_properti->semua_harga($id);
		$data['folder'] = "properti";
		$data['side'] = "modal";
		$this->load->view('index',$data);
	}

	public function send_email($booking_no)
	{
		$mitra = $_SESSION['email'];
		$admin = 'omibalola@gmail.com';
		// Konfigurasi email
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => 'omibalola@gmail.com',  // Email gmail
			'smtp_pass'   => 'naninandatokorewa',  // Password gmail
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		];

		// Load library email dan konfigurasinya
		$this->load->library('email', $config);

		// Email dan nama pengirim
		$this->email->from('omibalola@gmail.com', 'Testing Email');

		$list = array($mitra, $admin);
		// Email penerima
		$this->email->to($list); // Ganti dengan email tujuan

		// Lampiran email, isi dengan url/path file
//		$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

		// Subject email
		$this->email->subject('Testing VIVIDI & Email');
		$data['data'] = $this->Model_properti->data_email($booking_no);
		// Isi email
		$body = $this->load->view('Test/real.php',$data,  TRUE);
		$this->email->message($body);

		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
			echo 'Sukses! email berhasil dikirim.';
		} else {
			echo 'Error! email tidak dapat dikirim.';
		}
	}

	public function email_confirm($booking_no)
	{
//		$mitra = $_SESSION['email'];
		$admin = 'omibalola@gmail.com';
		// Konfigurasi email
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'mail.vividi.id',
			'smtp_user' => 'info@vividi.id',  // Email gmail
			'smtp_pass' => 'hafiz110118',  // Password gmail
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		];

		// Load library email dan konfigurasinya
		$this->load->library('email', $config);

		// Email dan nama pengirim
		$this->email->from('info@vividi.id', 'Email Konfirmasi Pembayaran');

//		$list = array($mitra, $admin);
		// Email penerima
		$this->email->to($admin); // Ganti dengan email tujuan

		// Lampiran email, isi dengan url/path file
//		$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

		// Subject email
		$this->email->subject('Email Konfirmasi Pembayaran');
		$data['data'] = $this->Model_properti->data_email($booking_no);
		// Isi email
		$body = $this->load->view('Test/confirm.php',$data,  TRUE);
		$this->email->message($body);

		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
//			redirect('http://localhost/vividi-dev/halaman-member/?ihc_ap_menu=orders');
			echo 'Sukses';
		} else {
			echo 'Error! email tidak dapat dikirim.';
		}
	}

	public function modal_kamar(){
        $id = $_SESSION['ID'];
        $prop = $this->input->post('prop');
        $p = explode("_", $prop);
        $data = $this->Model_properti->data_modal_kamar($id, $p[0]);
        echo json_encode($data);
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
        $data['data'] = $this->Model_properti->data_atur_harga($prop[0], $ka[0]);
        $data['weekday'] = $this->input->post('weekday');
        $data['weekend'] = $this->input->post('weekend');
        $data['hseasion'] = $this->input->post('hseasion');
        $data['psseason'] = $this->input->post('psseason');
        $data['folder'] = "properti";
        $data['side'] = "harga";
        $this->form_validation->set_rules('weekday', 'a', 'required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');
        $this->form_validation->set_rules('weekend', 'a', 'required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');
        $this->form_validation->set_rules('hseasion', 'a', 'required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');
        $this->form_validation->set_rules('psseason', 'a', 'required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');
        $this->form_validation->set_error_delimiters('<br><div class="alert alert-danger" role="alert">', '</div>');
        if ($this->form_validation->run() == FALSE) {
            redirect(base_url('properti/harga_modal'));
        } else {
            $this->load->view('index',$data);
        }
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

    public function upload_foto() {
        $config['upload_path']          = './assets/images/hotel/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $result = ['Status' => 'success', 'file' => $this->upload->data()];
        } else {
            $result = ['Status' => 'error', 'file' => $this->upload->display_errors()];
        }
        return $result;
    }

    public function upload_foto_properti() {
        $config['upload_path']          = './assets/images/hotel/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $result = ['Status' => 'success', 'file' => $this->upload->data()];
        } else {
            $result = ['Status' => 'error', 'file' => $this->upload->display_errors()];
        }
        return $result;
    }

    public function upload_logo_properti() {
        $config['upload_path']          = './assets/images/hotel/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo')) {
            $result = ['Status' => 'success', 'file' => $this->upload->data()];
        } else {
            $result = ['Status' => 'error', 'file' => $this->upload->display_errors()];
        }
        return $result;
    }

	public function save_properti() {
		$id = $_SESSION['ID'];
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$tipe_properti = $this->input->post('tipe_properti');
		$fasilitas = $this->input->post('fasilitas');
		$bintang = $this->input->post('bintang');
		$stay = $this->input->post('stay');
		$foto = $this->input->post('foto');
		$logo = $this->input->post('logo');
		$deskripsi_singkat = $this->input->post('deskripsi_singkat');
		$country = $this->input->post('country');
		$city = $this->input->post('city');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$lokasi = $this->input->post('lokasi');
		$upload = $this->upload_foto();
		if ($upload['Status'] == 'success') {
			$this->Model_properti->save_type_kamar($id,$time,$propert,$judul,$deskripsi,$remaja,$anak,$fasilitas,$upload);
		} else {
			echo "<script type='text/javascript'>alert('Foto Yang Anda Masukkan Tidak Sesuai Format');</script>";
		}
		redirect(base_url('properti/tipe_kamar'));
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
		$upload = $this->upload_foto();
		if ($upload['Status'] == 'success') {
			$this->Model_properti->save_type_kamar($id,$time,$propert,$judul,$deskripsi,$remaja,$anak,$fasilitas,$upload);
		} else {
			echo "<script type='text/javascript'>alert('Foto Yang Anda Masukkan Tidak Sesuai Format');</script>";
		}
        redirect(base_url('Properti/tipe_kamar'));
    }

    public function save_harga() {
        $properti = $this->input->post('properti');
        $kamar = $this->input->post('jenis_kamar');
        $prop = explode("_",$properti);
        $ka = explode("_",$kamar);
        $data['properti'] = $prop[1];
        $data['kamar'] = $ka[1];
        $data['id_properti'] = $prop[0];
        $data['id_kamar'] = $ka[0];

        $allotment = $this->input->post('allotment');
        $harga = $this->input->post('optradio');
        $tgl_1 = $this->input->post('tgl_1');
        $date1 = str_replace('/', '-', $tgl_1);
        $newDate1 = date("Y-m-d", strtotime($date1));
        $tgl_2 = $this->input->post('tgl_2');
        $date2 = str_replace('/', '-', $tgl_2);
        $newDate2 = date("Y-m-d", strtotime($date2));
        $this->Model_properti->save_atur_harga($newDate1, $newDate2, $allotment, $harga, $prop[0], $ka[0]);

        $data['data'] = $this->Model_properti->data_atur_harga($prop[0], $ka[0]);
        $data['weekday'] = $this->input->post('weekday');
        $data['weekend'] = $this->input->post('weekend');
        $data['hseasion'] = $this->input->post('hseasion');
        $data['psseason'] = $this->input->post('psseason');
        $data['folder'] = "properti";
        $data['side'] = "harga";

        $this->load->view('index',$data);
    }

    public function pesan()
    {
        $data['data'] = $this->Model_properti->data_pesan();
        $data['folder'] = "properti";
        $data['side'] = "pesan";
        $this->load->view('index',$data);
    }

    public function sukses($booking_no){
        $id = $this->uri->segment(3);
        $this->Model_properti->get_sukses($booking_no);
		$this->send_email($booking_no);
		redirect(base_url('Properti/pesan'));
    }

	public function gagal(){
		$id = $this->uri->segment(3);
		$this->Model_properti->get_cancel($id);
		redirect(base_url('Properti/pesan'));
	}

	public function data_booking($booking_no){
		$data['data'] = $this->Model_properti->data_email($booking_no);
		$data['folder'] = "Test";
		$this->load->view('Test/booking', $data);
	}
}
