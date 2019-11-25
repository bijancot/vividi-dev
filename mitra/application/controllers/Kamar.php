<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Kamar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_kamar');
		$this->load->library('session');
		$this->load->database();
	}

	public function index()
	{
		$id = $_SESSION['ID'];
		$data['prpti'] = $this->Model_kamar->data_properti($id);
		$data['data'] = $this->Model_kamar->data_tipe_kamar($id);
		$data['folder'] = "kamar";
		$data['side'] = "tipe_kamar";
		$this->load->view('index',$data);
	}

	public function modal_kamar(){
		$id = $_SESSION['ID'];
		$prop = $this->input->post('prop');
		$p = explode("_", $prop);
		$data = $this->Model_kamar->data_modal_kamar($id, $p[0]);
		echo json_encode($data);
	}

	public function modal_tipe_kamar()
	{
		$id = $_SESSION['ID'];
		$post = $this->input->post('id');
		$data['data'] = $this->Model_kamar->data_detail_tipe_kamar($id,$post);
		$amenity = $this->db->query("select t.name as amenity
			from wpwj_terms t
			left join wpwj_term_taxonomy tt on t.term_id = tt.term_id
			left join wpwj_term_relationships tr on (tt.term_id = tr.term_taxonomy_id and tt.taxonomy = 'amenity')
			where tr.object_id = ".$post);
		$data['amenity'] = $amenity->result();
		$foto = $this->db->query("select pm.meta_value as foto
			from wpwj_posts p
			left join wpwj_postmeta pm on (p.ID = pm.post_id and pm.meta_key = '_wp_attached_file')
			where p.post_type = 'attachment'
			and p.post_parent = ".$post);
		$data['foto'] = $foto->result();
		$filter_view = $this->load->view('kamar/modal_tipe_kamar', $data, TRUE);

		echo json_encode($filter_view);
	}

	public function upload_foto1() {
		$config['upload_path']          = './assets/images/hotel/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 10000;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto1')) {
			$result = ['Status' => 'success', 'file' => $this->upload->data()];
		} else {
			$result = ['Status' => 'error', 'file' => $this->upload->display_errors()];
		}
		return $result;
	}

    public function upload_foto2() {
        $config['upload_path']          = './assets/images/hotel/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto2')) {
            $result = ['Status' => 'success', 'file' => $this->upload->data()];
        } else {
            $result = ['Status' => 'error', 'file' => $this->upload->display_errors()];
        }
        return $result;
    }

    public function upload_foto3() {
        $config['upload_path']          = './assets/images/hotel/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto3')) {
            $result = ['Status' => 'success', 'file' => $this->upload->data()];
        } else {
            $result = ['Status' => 'error', 'file' => $this->upload->display_errors()];
        }
        return $result;
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
		$upload1 = $this->upload_foto1();
		$upload2 = $this->upload_foto2();
		$upload3 = $this->upload_foto3();
		if ($upload1['Status'] == 'success' || $upload2['Status'] == 'success' || $upload3['Status'] == 'success') {
			$this->Model_kamar->save_type_kamar($id,$time,$propert,$judul,$deskripsi,$remaja,$anak,$fasilitas,$upload1,$upload2,$upload3);
		} else {
			echo "<script type='text/javascript'>alert('Foto Yang Anda Masukkan Tidak Sesuai Format');</script>";
		}
		redirect(base_url('kamar'));
	}

}
