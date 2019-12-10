<?php

class Model_margin extends CI_Model
{
    function save_margin($margin)
    {
        $data = array(
            'margin' => $margin
        );
        $this->db->update('margin', $data);
        $this->db->query("UPDATE wpwj_trav_accommodation_vacancies SET price_per_room = price_normal + (price_per_room*$margin/100)");
    }

    function margin(){
        $data = $this->db->get('margin');
        foreach ($data->result() as $row) {
            $margin = $row->margin;
            return $margin;
        }
    }
}