<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properti extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_properti');
		$this->load->database();
		if ($_SESSION['ID'] == null) {
			redirect(base_url('Login'));
		}
	}

	public function index()
	{
		$id = $_SESSION['ID'];
		$data['data'] = $this->Model_properti->data_properti($id);
		$data['folder'] = "properti";
		$data['side'] = "semua";
		$this->load->view('index', $data);
	}

	public function tambah_properti()
	{
		$data['tipe'] = $this->Model_properti->combo_tipe_properti();
		$data['country'] = $this->Model_properti->combo_country();
//		$data['fasilitas'] = $this->Model_properti->data_fasilitas();
		$this->db->select_max('term_id');
		$fasilitas = $this->db->get('wpwj_terms');
		$keyTransaksi = "";
		$i = 1;
		foreach ($fasilitas->result() as $row) {
			$keyTransaksi = $row->term_id + $i;
		}
		$data['fasilitas'] = $keyTransaksi;
		$data['folder'] = "properti";
		$data['side'] = "insert_properti";
		$data['view'] = "insert_properti";
		$this->load->view('index', $data);
	}

	public function modal_city()
	{
		$id = $this->input->post('country');
		$data = $this->Model_properti->combo_city($id);
		echo json_encode($data);
	}

	public function modal_properti()
	{
		$id = $_SESSION['ID'];
		$post = $this->input->post('id');
		$data['data'] = $this->Model_properti->data_detail_properti($id, $post);
		$amenity = $this->db->query("select t.name as amenity
			from wpwj_terms t
			left join wpwj_term_taxonomy tt on t.term_id = tt.term_id
			left join wpwj_term_relationships tr on (tt.term_id = tr.term_taxonomy_id and tt.taxonomy = 'amenity')
			where tr.object_id = " . $post);
		$foto = $this->db->query("select pm.meta_value as foto
			from wpwj_posts p
			left join wpwj_postmeta pm on (p.ID = pm.post_id and pm.meta_key = '_wp_attached_file')
			where p.post_type = 'attachment'
			and p.post_parent = " . $post);
		$data['amenity'] = $amenity->result();
		$data['foto'] = $foto->result();
		$filter_view = $this->load->view('properti/modal_properti', $data, TRUE);
		echo json_encode($filter_view);
	}

	public function upload_foto_properti1()
	{
		$config['upload_path'] = './assets/images/hotel/';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size'] = 10000;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('foto1')) {
			$result = ['Status' => 'success', 'file' => $this->upload->data()];
		} else {
			$result = ['Status' => 'error', 'file' => $this->upload->display_errors()];
			echo $result['file'];
			print_r($config);
		}
		return $result;
	}

	public function upload_foto_properti2()
	{
		$config['upload_path'] = './assets/images/hotel/';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size'] = 10000;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('foto2')) {
			$result = ['Status' => 'success', 'file' => $this->upload->data()];
		} else {
			$result = ['Status' => 'error', 'file' => $this->upload->display_errors()];
			echo $result['file'];
			print_r($config);
		}
		return $result;
	}

	public function upload_foto_properti3()
	{
		$config['upload_path'] = './assets/images/hotel/';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size'] = 10000;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('foto3')) {
			$result = ['Status' => 'success', 'file' => $this->upload->data()];
		} else {
			$result = ['Status' => 'error', 'file' => $this->upload->display_errors()];
			echo $result['file'];
			print_r($config);
		}
		return $result;
	}

	public function upload_logo_properti()
	{
		$config['upload_path'] = './assets/images/hotel/';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size'] = 10000;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('logo')) {
			$result = ['Status' => 'success', 'file' => $this->upload->data()];
		} else {
			$result = ['Status' => 'error', 'file' => $this->upload->display_errors()];
			echo $result['file'];
			print_r($config);
		}
		return $result;
	}

	public function save_properti()
	{
		$id = $_SESSION['ID'];
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y-m-d h:i:s");
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$tipe_properti = $this->input->post('tipe_properti');
		$fasilitas = $this->input->post('fasilitas');
		$bintang = $this->input->post('bintang');
		$stay = $this->input->post('stay');
		$deskripsi_singkat = $this->input->post('deskripsi_singkat');
		$country = $this->input->post('country');
		$ci = $this->input->post('city');
		$c = explode("_", $ci);
		$city = $c[0];
		$kota = $c[1];
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$checkin = $this->input->post('checkin');
		$checkout = $this->input->post('checkout');
		$cancel = $this->input->post('cancel');
		$bed = $this->input->post('bed');
		$pet = $this->input->post('pet');
		$hargaawal = $this->input->post('harga');
		$hargaproses = $hargaawal * 0.05;
		$harga = $hargaawal + $hargaproses;
		$acc_name = $this->input->post('acc_name');
		$acc_no = $this->input->post('acc_no');
		$bank_name = $this->input->post('bank_name');
		$cabang = $this->input->post('cabang');
		$swift = $this->input->post('swift');
		$payment = $this->input->post('payment');
		$upload1 = $this->upload_foto_properti1();
		$upload2 = $this->upload_foto_properti2();
		$upload3 = $this->upload_foto_properti3();
		$upload4 = $this->upload_logo_properti();
		if ($upload1['Status'] == 'success' && $upload2['Status'] == 'success' && $upload3['Status'] == 'success' && $upload4['Status'] == 'success') {
			$this->Model_properti->save_properti($id, $time, $deskripsi, $judul, $tipe_properti, $fasilitas, $bintang, $stay,
				$deskripsi_singkat, $country, $city, $telepon, $email, $alamat, $upload1, $upload2, $upload3, $upload4, $lat, $lng,
				$checkin, $checkout, $cancel, $bed, $pet, $kota, $harga, $acc_name, $acc_no, $bank_name, $cabang, $swift, $payment);
			$total_fasilitas = $this->input->post('total_fasilitas');
			for ($i=1; $i <= $total_fasilitas; $i++) {
				$fasilitas = $this->input->post('fasilitas_'.$i);
//                echo $fasilitas.'-';
				$this->Model_properti->new_fasilitas($fasilitas);
			}
			redirect(base_url('properti'));
		} else {
			echo "<script type='text/javascript'>alert('Foto Yang Anda Masukkan Tidak Sesuai Format');</script>";
		}
	}
}
