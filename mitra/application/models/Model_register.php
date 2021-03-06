<?php

class Model_register extends CI_Model
{
	function save_mitra($user, $pass, $email, $n_depan, $n_belakang, $telepon, $time, $jabatan, $properti, $status, $mitra, $id)
	{
		$this->db->select_max('ID');
		$data = $this->db->get('wpwj_users');
		$ai = "";
		foreach ($data->result() as $row) {
			$ai = $row->ID + 1;
		}
		$this->db->select_max('umeta_id');
		$meta = $this->db->get('wpwj_usermeta');
		$ai_meta = "";
		foreach ($meta->result() as $row) {
			$ai_meta = $row->umeta_id + 1;
		}
		$data = array(
			'ID' => $ai,
			'user_login' => $user,
			'user_pass' => $pass,
			'user_nicename' => strtolower($user),
			'user_email' => $email,
			'user_url' => '',
			'user_registered' => $time,
			'user_activation_key' => '',
			'user_status' => '0',
			'telepon' => $telepon,
			'jabatan' => $jabatan,
			'name_hotel' => $properti,
			'status' => $status,
			'mitra' => $mitra,
			'display_name' => $n_depan . ' ' . $n_belakang,
			'parent_id' => $id
		);
		$this->db->insert('wpwj_users', $data);
		$meta1 = array(
			'umeta_id' => $ai_meta,
			'user_id' => $ai,
			'meta_key' => 'nickname',
			'meta_value' => $user
		);
		$this->db->insert('wpwj_usermeta', $meta1);
		$meta2 = array(
			'umeta_id' => $ai_meta + 1,
			'user_id' => $ai,
			'meta_key' => 'first_name',
			'meta_value' => $n_depan
		);
		$this->db->insert('wpwj_usermeta', $meta2);
		$meta3 = array(
			'umeta_id' => $ai_meta + 2,
			'user_id' => $ai,
			'meta_key' => 'last_name',
			'meta_value' => $n_belakang
		);
		$this->db->insert('wpwj_usermeta', $meta3);
		$meta4 = array(
			'umeta_id' => $ai_meta + 3,
			'user_id' => $ai,
			'meta_key' => 'description',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_usermeta', $meta4);
		$meta5 = array(
			'umeta_id' => $ai_meta + 4,
			'user_id' => $ai,
			'meta_key' => 'rich_editing',
			'meta_value' => 'true'
		);
		$this->db->insert('wpwj_usermeta', $meta5);
		$meta6 = array(
			'umeta_id' => $ai_meta + 5,
			'user_id' => $ai,
			'meta_key' => 'syntax_highlighting',
			'meta_value' => 'true'
		);
		$this->db->insert('wpwj_usermeta', $meta6);
		$meta7 = array(
			'umeta_id' => $ai_meta + 6,
			'user_id' => $ai,
			'meta_key' => 'comment_shortcuts',
			'meta_value' => 'false'
		);
		$this->db->insert('wpwj_usermeta', $meta7);
		$meta8 = array(
			'umeta_id' => $ai_meta + 7,
			'user_id' => $ai,
			'meta_key' => 'admin_color',
			'meta_value' => 'fresh'
		);
		$this->db->insert('wpwj_usermeta', $meta8);
		$meta9 = array(
			'umeta_id' => $ai_meta + 8,
			'user_id' => $ai,
			'meta_key' => 'use_ssl',
			'meta_value' => '0'
		);
		$this->db->insert('wpwj_usermeta', $meta9);
		$meta10 = array(
			'umeta_id' => $ai_meta + 9,
			'user_id' => $ai,
			'meta_key' => 'show_admin_bar_front',
			'meta_value' => 'true'
		);
		$this->db->insert('wpwj_usermeta', $meta10);
		$meta11 = array(
			'umeta_id' => $ai_meta + 10,
			'user_id' => $ai,
			'meta_key' => 'locale',
			'meta_value' => ''
		);
		$this->db->insert('wpwj_usermeta', $meta11);
		$meta12 = array(
			'umeta_id' => $ai_meta + 11,
			'user_id' => $ai,
			'meta_key' => 'wpwj_capabilities',
			'meta_value' => 'a:1:{s:13:"trav_busowner";b:1;}'
		);
		$this->db->insert('wpwj_usermeta', $meta12);
		$meta13 = array(
			'umeta_id' => $ai_meta + 12,
			'user_id' => $ai,
			'meta_key' => 'wpwj_user_level',
			'meta_value' => '0'
		);
		$this->db->insert('wpwj_usermeta', $meta13);
	}

	function cek_email($email)
	{
		$this->db->select('user_email');
		$this->db->where('user_email', $email);
		$email_valid = $this->db->get('wpwj_users');
		if ($email_valid->num_rows() == 0) {
			$cek = true;
			return $cek;
		}
	}

	function save_profile($id, $depan, $belakang, $telepon)
	{
		$data = array(
		    'telepon' => $telepon,
			'display_name' => $depan . ' ' . $belakang
		);
		$this->db->where('ID', $id);
		$this->db->update('wpwj_users', $data);

		$data_depan = array(
			'meta_value' => $depan
		);
		$array = array('user_id =' => $id, 'meta_key =' => 'first_name');
		$this->db->where($array);
		$this->db->update('wpwj_usermeta', $data_depan);

		$data_belakang = array(
			'meta_value' => $belakang
		);
		$array = array('user_id =' => $id, 'meta_key =' => 'last_name');
		$this->db->where($array);
		$this->db->update('wpwj_usermeta', $data_belakang);
	}

	function save_new_email($id, $email)
	{
		$data = array(
			'user_email' => $email
		);
		$this->db->where('ID', $id);
		$this->db->update('wpwj_users', $data);
	}

	function verifikasi()
	{
		$this->db->select('wpwj_users.ID, wpwj_users.user_login, wpwj_users.user_pass, wpwj_users.user_email, 
		wpwj_users.user_registered, wpwj_users.display_name, wpwj_users.name_hotel, 
		wpwj_users.jabatan, wpwj_users.status, wpwj_users.telepon');
		$this->db->where('status', 0);
		return $this->db->get('wpwj_users')->result();
	}

	function semua_verifikasi()
	{
		$this->db->select('wpwj_users.ID, wpwj_users.user_login, wpwj_users.user_email, 
		wpwj_users.user_registered, wpwj_users.display_name, wpwj_users.name_hotel, 
		wpwj_users.jabatan, wpwj_users.status, wpwj_users.telepon');
		$this->db->where('mitra', 'Hotel');
		$this->db->where('status', 1);
		return $this->db->get('wpwj_users')->result();
	}

	function semua_user()
	{
		$this->db->select('wpwj_users.ID, wpwj_users.user_login, wpwj_users.user_email, 
		wpwj_users.user_registered, wpwj_users.display_name, wpwj_users.name_hotel, 
		wpwj_users.jabatan, wpwj_users.status, wpwj_users.telepon');
//		$this->db->where('mitra', 'Hotel');
		$this->db->where('status', 1);
//		$this->db->set('price_per_room', 'price_normal' + ('price_per_room')*$d/100);
		$this->db->from('wpwj_users');
		return $this->db->get();

		$result = [];
		$data = $query->result_array();
		foreach ($data as $dt) {
//            $host = gethostbyname(gethostname());
//            $dt['Img'] = 'http://' . $host . '/tempat.in/' . $dt['Logo'];
			$result[] = $dt;
		}

		return $result;
	}

	public function get_verifikasi($id)
	{
		$this->db->select('status');
		$this->db->where('ID = ', $id);
		$rslt = $this->db->get('wpwj_users');
		foreach ($rslt->result() as $r) {
			$new = array(
				'status' => '1'
			);
			$this->db->where('ID', $id);
			$this->db->update('wpwj_users', $new);
		}
	}

	function confirm_verification($id)
	{
		$this->db->select('wpwj_users.ID, wpwj_users.user_login, wpwj_users.user_pass, wpwj_users.user_email, 
		wpwj_users.user_registered, wpwj_users.display_name, wpwj_users.name_hotel, 
		wpwj_users.jabatan, wpwj_users.status, wpwj_users.telepon');
		$this->db->where('ID', $id);
		return $this->db->get('wpwj_users')->result();
	}

	public function verification_cust($id)
	{
		$query = $this->db->query("select us.ID as id,
			us.user_email as email
			from wpwj_users us
			where us.ID = '$id'
			");
		foreach ($query->result() as $row) {
			$email = $row->email;
			return $email;
		}
	}
}
