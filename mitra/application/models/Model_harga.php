<?php


class Model_harga extends CI_Model
{

	function data_atur_harga($prop, $kamar)
	{
		$query = $this->db->query("select av.id as id, 
            pproperti.post_title as properti, 
            pkamar.post_title as kamar, 
            av.date_from as dari, 
            av.date_to as sampai, 
            av.rooms as allotment ,
            av.price_normal as harga
            from wpwj_trav_accommodation_vacancies av
            left join wpwj_posts pproperti on av.accommodation_id = pproperti.ID
            left join wpwj_posts pkamar on av.room_type_id = pkamar.ID
            where pproperti.post_type = 'accommodation'
            and pkamar.post_type = 'room_type'
            and pproperti.post_status = 'publish'
            and pkamar.post_status = 'publish'
            and av.accommodation_id = " . $prop . "
            and av.room_type_id = " . $kamar);
		return $query->result();
	}

	function data_modal_properti($id)
	{
		$query = $this->db->query("select p.id, p.post_title as properti
			from wpwj_posts p 
			left join wpwj_users u on p.post_author = u.ID
			where p.post_type = 'accommodation'
			AND p.post_status = 'publish'
			AND p.post_author = " . $id . "
            order by p.id desc");
		return $query->result();
	}

	function semua_harga($id)
	{
		$query = $this->db->query("select av.id as id, 
            pproperti.post_title as properti, 
            pkamar.post_title as kamar, 
            av.date_from as dari, 
            av.date_to as sampai, 
            av.rooms as allotment ,
            av.price_normal as harga
            from wpwj_trav_accommodation_vacancies av
            left join wpwj_posts pproperti on av.accommodation_id = pproperti.ID
            left join wpwj_posts pkamar on av.room_type_id = pkamar.ID
            left join wpwj_users u on u.ID = pproperti.post_author
            where pproperti.post_type = 'accommodation'
            and pkamar.post_type = 'room_type'
            and pproperti.post_status = 'publish'
            and pkamar.post_status = 'publish'
            and u.ID = " . $id."
            order by av.ID desc");
		return $query->result();
	}

	function modal_ubah_harga($id, $post)
	{
		$query = $this->db->query("select av.id as id, 
            pproperti.post_title as properti, 
            pkamar.post_title as kamar, 
            av.date_from as dari, 
            av.date_to as sampai, 
            av.rooms as allotment,
            av.price_normal as harga
            from wpwj_trav_accommodation_vacancies av
            left join wpwj_posts pproperti on av.accommodation_id = pproperti.ID
            left join wpwj_posts pkamar on av.room_type_id = pkamar.ID
            left join wpwj_users u on u.ID = pproperti.post_author
            where pproperti.post_type = 'accommodation'
            and pkamar.post_type = 'room_type'
            and pproperti.post_status = 'publish'
            and pkamar.post_status = 'publish'
            and av.id = " . $post . "
            and u.ID = " . $id);
		return $query->result();
	}

	public function save_atur_harga($tgl_1, $tgl_2, $allotment, $harga, $id_properti, $id_type_kamar)
	{
        $m = $this->db->get('margin');
        foreach ($m->result() as $row) {
            $margin = $row->margin;
        }
		$this->db->select_max('id');
		$data = $this->db->get('wpwj_trav_accommodation_vacancies');
		$keyTransaksi = "";
		foreach ($data->result() as $row) {
			$keyTransaksi = $row->id + 1;
		}
		$this->db->where('accommodation_id =', $id_properti);
		$this->db->where('room_type_id =', $id_type_kamar);
		$sql = $this->db->get('wpwj_trav_accommodation_vacancies');
		$this->db->where('date_from <=', $tgl_1);
		$this->db->where('date_to >', $tgl_1);
		$this->db->where('accommodation_id =', $id_properti);
		$this->db->where('room_type_id =', $id_type_kamar);
		$cek = $this->db->get('wpwj_trav_accommodation_vacancies');
		if ($cek->num_rows() > 0) {
			foreach ($sql->result() as $row) {
				if ($tgl_1 == $row->date_from) {
					if ($tgl_2 == $row->date_to) {
						$data_new = array(
							'rooms' => $allotment,
							'price_normal' => $harga,
							'price_per_room' => $harga + ($harga*$margin/100)
						);
						$this->db->where('id', $row->id);
						$this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
						break;
					} else if ($tgl_2 < $row->date_to) {
						$data = array(
							'id' => $keyTransaksi,
							'date_from' => $tgl_1,
							'date_to' => $tgl_2,
							'accommodation_id' => $id_properti,
							'room_type_id' => $id_type_kamar,
							'rooms' => $allotment,
							'price_normal' => $harga,
							'price_per_room' => $harga + ($harga*$margin/100),
							'price_per_person' => '',
							'child_price' => ''
						);
						$this->db->insert('wpwj_trav_accommodation_vacancies', $data);
						foreach ($sql->result() as $r) {
							if ($tgl_2 >= $r->date_from && $tgl_2 < $r->date_to) {
								$data_new = array(
									'date_from' => $tgl_2
								);
								$this->db->where('id', $r->id);
								$this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
							}
						}
						break;
					} else if ($tgl_2 > $row->date_to) {
						foreach ($sql->result() as $r) {
							if ($tgl_1 >= $r->date_from && $tgl_1 < $r->date_to) {
								$data_new = array(
									'date_to' => $tgl_2,
									'rooms' => $allotment,
									'price_normal' => $harga,
									'price_per_room' => $harga + ($harga*$margin/100)
								);
								$this->db->where('id', $r->id);
								$this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
							}
							if ($tgl_2 >= $r->date_from && $tgl_2 < $r->date_to) {
								$data_new = array(
									'date_from' => $tgl_2
								);
								$this->db->where('id', $r->id);
								$this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
							}
							if ($tgl_1 < $r->date_from && $tgl_2 >= $r->date_to) {
								$this->db->where('id', $r->id);
								$this->db->delete('wpwj_trav_accommodation_vacancies');
							}
						}
						break;
					}
				} else if ($tgl_1 > $row->date_from && $tgl_1 < $row->date_to) {
					if ($tgl_2 < $row->date_to) {
						foreach ($sql->result() as $r) {
							if ($tgl_1 > $r->date_from && $tgl_1 <= $r->date_to) {
								$data_new = array(
									'date_to' => $tgl_1
								);
								$this->db->where('id', $r->id);
								$this->db->update('wpwj_trav_accommodation_vacancies', $data_new);

								$data = array(
									'id' => $keyTransaksi,
									'date_from' => $tgl_1,
									'date_to' => $tgl_2,
									'accommodation_id' => $id_properti,
									'room_type_id' => $id_type_kamar,
									'rooms' => $allotment,
									'price_normal' => $harga,
									'price_per_room' => $harga + ($harga*$margin/100),
									'price_per_person' => '',
									'child_price' => ''
								);
								$this->db->insert('wpwj_trav_accommodation_vacancies', $data);

								$data = array(
									'id' => $keyTransaksi + 1,
									'date_from' => $tgl_2,
									'date_to' => $row->date_to,
									'accommodation_id' => $id_properti,
									'room_type_id' => $id_type_kamar,
									'rooms' => $row->rooms,
									'price_normal' => $row->price_normal,
									'price_per_room' => $row->price_normal + ($row->price_normal*$margin/100),
									'price_per_person' => '',
									'child_price' => ''
								);
								$this->db->insert('wpwj_trav_accommodation_vacancies', $data);
							}
						}
						break;
					} else if ($tgl_2 > $row->date_to) {
						foreach ($sql->result() as $r) {
							if ($tgl_1 >= $r->date_from && $tgl_1 <= $r->date_to) {
								$data_new = array(
									'date_to' => $tgl_1
								);
								$this->db->where('id', $r->id);
								$this->db->update('wpwj_trav_accommodation_vacancies', $data_new);

								$data = array(
									'id' => $keyTransaksi,
									'date_from' => $tgl_1,
									'date_to' => $tgl_2,
									'accommodation_id' => $id_properti,
									'room_type_id' => $id_type_kamar,
									'rooms' => $allotment,
									'price_normal' => $harga,
									'price_per_room' => $harga + ($harga*$margin/100),
									'price_per_person' => '',
									'child_price' => ''
								);
								$this->db->insert('wpwj_trav_accommodation_vacancies', $data);
							}
							if ($tgl_2 >= $r->date_from && $tgl_2 <= $r->date_to) {
								$data_new = array(
									'date_from' => $tgl_2
								);
								$this->db->where('id', $r->id);
								$this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
							}
							if ($tgl_1 < $r->date_from && $tgl_2 >= $r->date_to) {
								$this->db->where('id', $r->id);
								$this->db->delete('wpwj_trav_accommodation_vacancies');
							}
						}
						break;
					} else if ($tgl_2 == $row->date_to) {
						$data_new = array(
							'date_to' => $tgl_1
						);
						$this->db->where('id', $row->id);
						$this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
						$data = array(
							'id' => $keyTransaksi,
							'date_from' => $tgl_1,
							'date_to' => $tgl_2,
							'accommodation_id' => $id_properti,
							'room_type_id' => $id_type_kamar,
							'rooms' => $allotment,
							'price_normal' => $harga,
							'price_per_room' => $harga + ($harga*$margin/100),
							'price_per_person' => '',
							'child_price' => ''
						);
						$this->db->insert('wpwj_trav_accommodation_vacancies', $data);
						break;
					}
				}
			}
		} else {
			$data = array(
				'id' => $keyTransaksi,
				'date_from' => $tgl_1,
				'date_to' => $tgl_2,
				'accommodation_id' => $id_properti,
				'room_type_id' => $id_type_kamar,
				'rooms' => $allotment,
				'price_normal' => $harga,
				'price_per_room' => $harga + ($harga*$margin/100),
				'price_per_person' => '',
				'child_price' => ''
			);
			$this->db->insert('wpwj_trav_accommodation_vacancies', $data);
			foreach ($sql->result() as $r) {
				if ($tgl_2 < $r->date_to) {
					if ($tgl_2 >= $r->date_from && $tgl_2 < $r->date_to) {
						$data_new = array(
							'date_from' => $tgl_2
						);
						$this->db->where('id', $r->id);
						$this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
					}
				} else if ($tgl_2 > $r->date_to) {
					foreach ($sql->result() as $r) {
						if ($tgl_1 >= $r->date_from && $tgl_1 < $r->date_to) {
							$data_new = array(
								'date_to' => $tgl_2
							);
							$this->db->where('id', $r->id);
							$this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
						}
						if ($tgl_2 >= $r->date_from && $tgl_2 <= $r->date_to) {
							$data_new = array(
								'date_from' => $tgl_2
							);
							$this->db->where('id', $r->id);
							$this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
						}
						if ($tgl_1 < $r->date_from && $tgl_2 >= $r->date_to) {
							$this->db->where('id', $r->id);
							$this->db->delete('wpwj_trav_accommodation_vacancies');
						}
					}
				} else if ($tgl_2 == $r->date_to) {
					$this->db->where('id', $r->id);
					$this->db->delete('wpwj_trav_accommodation_vacancies');
				}
			}
		}
	}

	public function save_harga_baru($id, $harga)
	{
        $m = $this->db->get('margin');
        foreach ($m->result() as $row) {
            $margin = $row->margin;
        }
		$data_new = array(
			'price_normal' => $harga,
			'price_per_room' => $harga + ($harga*$margin/100)
		);
		$this->db->where('id', $id);
		$this->db->update('wpwj_trav_accommodation_vacancies', $data_new);
	}

    public function save_harga($id, $weekday, $weekend, $high, $peek)
    {
        $this->db->where('id_rooms =', $id);
        $cek = $this->db->get('price');
        if ($cek->num_rows() != 1) {
            $this->db->select_max('id');
            $data = $this->db->get('price');
            $keyTransaksi = "";
            foreach ($data->result() as $row) {
                $keyTransaksi = $row->id + 1;
            }
            $data_new = array(
                'id' => $keyTransaksi,
                'id_rooms' => $id,
                'weekday' => $weekday,
                'weekend' => $weekend,
                'high' => $high,
                'peek' => $peek
            );
            $this->db->insert('price', $data_new);
        } else {
            $data_new = array(
                'weekday' => $weekday,
                'weekend' => $weekend,
                'high' => $high,
                'peek' => $peek
            );
            $this->db->where('id_rooms', $id);
            $this->db->update('price', $data_new);
        }
    }

    public function modal_harga($id){
        $this->db->where('id_rooms =', $id);
        $sql = $this->db->get('price');
        return $sql->result();
    }

}
