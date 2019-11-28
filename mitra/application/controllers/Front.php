<?php
class Front extends CI_Controller {
	function __construct() {
		parent::__construct();

	}
	public function index(){

//		$this->theme->front("front/v_index",$data);
		$this->theme->front("front/v_index");
	}

//	public function search($page=0){
	public function search(){
//		$data["active_menu"] = "home";
//		$data['page_heading'] = 'Pencarian Barang';
//
//		if (isset($_GET["q"])){
//			@$q = ($_GET["q"]=="")?"all":urlencode($_GET["q"]);
//		}
//
//		$data["cari"]   = array("q" => urldecode(@$q));
//
//		$where = array();
//		//Filter for company name
//		if ($data["cari"]["q"] != "") {
//			if ($data["cari"]["q"] == "all") $data["cari"]["q"] = "";
//			$where = "(
//                        f_nama_mesin like '%".$this->db->escape_like_str($data["cari"]["q"])."%' or
//                        f_nama_spare_part like '%".$this->db->escape_like_str($data["cari"]["q"])."%'
//						) ";
//		}
//		$querysearch = @$q;
//		$this->db->where($where);
//		$this->load->library('pagination');
//		$config = $this->my_config->pagination();
//		$config['base_url']     = site_url("index/search/");
//		$config['per_page']     = 10;
//		$config["uri_segment"]  = 3;
//		$config["suffix"]       = "?q=$querysearch";
//		$config['total_rows']   = $this->db->join('tb_mesin','tb_mesin.f_kode_mesin=tb_produk.f_mesin','left')
//			->join('tb_kategori_mesin','tb_kategori_mesin.f_id_kategori_mesin=tb_mesin.f_kategori_mesin','left')
//			->join('tb_spare_part','tb_spare_part.f_kode_spare_part=tb_produk.f_spare_part','left')
//			->join('tb_kategori_spare_part','tb_kategori_spare_part.f_id_kategori_spare_part=tb_spare_part.f_kategori_spare_part','left')
//			->where('f_status_mesin','1')
//			->or_where('f_status_spare_part','1')
//			->get('tb_produk')->num_rows();
//
//		$config["num_links"]    = round($config["total_rows"] / $config["per_page"]);
//		$this->pagination->initialize($config);
//		//--
//		$this->db->where($where)->limit($config['per_page'], $page);
//
//		$data["srch"] = $this->db->join("tb_mesin","tb_mesin.f_kode_mesin=tb_produk.f_mesin",'left')
//			->join('tb_kategori_mesin','tb_kategori_mesin.f_id_kategori_mesin=tb_mesin.f_kategori_mesin','left')
//			->join('tb_spare_part','tb_spare_part.f_kode_spare_part=tb_produk.f_spare_part','left')
//			->join('tb_kategori_spare_part','tb_kategori_spare_part.f_id_kategori_spare_part=tb_spare_part.f_kategori_spare_part','left')
//			->where('f_status_mesin','1')
//			->or_where('f_status_spare_part','1')
//			->get('tb_produk')->result_array();

//		$this->theme->front("front/v_search",$data);
		$this->theme->search("front/v_search");
	}

//	public function detail($id){
	public function detail(){
//		$data["active_menu"] = "home";
//		$data['page_heading'] = 'Detail Mesin';
//
//		$data["mesin"] = $this->db->join("tb_gambar","tb_gambar.f_id_gambar=tb_mesin.f_gambar_mesin","left")
//			->join("tb_kategori_mesin","tb_kategori_mesin.f_id_kategori_mesin=tb_mesin.f_kategori_mesin","left")
//			->join("tb_tag_mesin","tb_tag_mesin.f_id_tag_mesin=tb_mesin.f_tag_mesin","left")
//			->where("f_kode_mesin",$id)
//			->get("tb_mesin")->row_array();

//		$this->theme->front("front/v_produk",$data);
		$this->theme->search("front/v_single_post");
	}

	public function spare_part($id){
		$data["active_menu"] = "home";
		$data['page_heading'] = 'Detail Spare Part';

		$data["spr"] = $this->db->join("tb_gambar","tb_gambar.f_id_gambar=tb_spare_part.f_gambar_spare_part","left")
			->join("tb_kategori_spare_part","tb_kategori_spare_part.f_id_kategori_spare_part=tb_spare_part.f_kategori_spare_part","left")
			->join("tb_tag_spare_part","tb_tag_spare_part.f_id_tag_spare_part=tb_spare_part.f_tag_sparepart","left")
			->where("f_kode_spare_part",$id)
			->get("tb_spare_part")->row_array();

		$data["tag"] = $this->db->join("tb_tag_spare_part","tb_tag_spare_part.f_id_tag_spare_part=tb_spare_part.f_tag_sparepart","left")
			->where("f_kode_spare_part",$id)
			->get("tb_spare_part")->result_array();

		$this->theme->front("front/v_sparepart",$data);
	}

	public function json_search()
	{
		$keyword = $this->uri->segment(3);
		$select = $this->db->join('tb_mesin','tb_mesin.f_kode_mesin=tb_produk.f_mesin','left')
			->join('tb_spare_part','tb_spare_part.f_kode_spare_part=tb_produk.f_spare_part','left')
			->where("f_status_mesin","1")
			->or_where("f_status_spare_part","1")
			->like('f_nama_mesin',$keyword)
			->or_like('f_nama_spare_part',$keyword)
			->get('tb_produk')->result_array();
		// var_dump($select);
		foreach($select as $row)
		{
			$gambar = $this->db->where("f_id_gambar",$row["f_gambar_mesin"])->or_where("f_id_gambar",$row["f_gambar_spare_part"])->get('tb_gambar')->result_array();
			$datagam = @$gambar["0"]["f_gambar"];
			$datagam2 = @$gambar["1"]["f_gambar"];

			$data['query'] = $keyword;
			if ($row["f_jenis_produk"]=="1") {
				$label = "<div style='color:#000;'><img src=".base_url("webimages/profilpict/$datagam")." width='80px' height='80px'>&nbsp;&nbsp;<span style='font-weight: 500; font-size: 18px;'>".strtoupper($row['f_nama_mesin'])."</span> ( Rp. ".idr_format($row['f_harga_mesin']).")</div>";
			}else{
				$label = "<div style='color:#000;'><img src=".base_url("webimages/profilpict/$datagam2")." width='80px' height='80px'>&nbsp;&nbsp;<span style='font-weight: 500; font-size: 18px;'>".strtoupper($row['f_nama_spare_part'])."</span> ( Rp. ".idr_format($row['f_harga_spare_part']).")</div>";
			}

			$data['suggestions'][] = array(
				'value' =>$row["f_nama_mesin"],
				'label' =>$label
			);
		}
		echo json_encode($data);
	}
}
?>
