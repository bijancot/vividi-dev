<?php
class Model_message extends CI_Model
{
    function penggunaan()
    {
        $this->db->select('kalimat');
        $this->db->where('jenis', 'penggunaan');
        $rslt = $this->db->get('message');
        foreach ($rslt->result() as $r) {
            return $r->kalimat;
        }
    }

    function syarat_ketentuan()
    {
        $this->db->select('kalimat');
        $this->db->where('jenis = ', 'syarat_ketentuan');
        $rslt = $this->db->get('message');
        foreach ($rslt->result() as $r) {
            return $r->kalimat;
        }
    }

    function hubungi()
    {
        $this->db->select('kalimat');
        $this->db->where('jenis', 'hubungi');
        $rslt = $this->db->get('message');
        foreach ($rslt->result() as $r) {
            return $r->kalimat;
        }
    }

    function tentang()
    {
        $this->db->select('kalimat');
        $this->db->where('jenis', 'tentang');
        $rslt = $this->db->get('message');
        foreach ($rslt->result() as $r) {
            return $r->kalimat;
        }
    }

    function save_penggunaan($text)
    {
        $data = array(
            'kalimat' => $text
        );
        $this->db->where('jenis', 'penggunaan');
        $this->db->update('message', $data);
    }

    function save_syarat_ketentuan($text)
    {
        $data = array(
            'kalimat' => $text
        );
        $this->db->where('jenis', 'syarat_ketentuan');
        $this->db->update('message', $data);
    }

    function save_hubungi($text)
    {
        $data = array(
            'kalimat' => $text
        );
        $this->db->where('jenis', 'hubungi');
        $this->db->update('message', $data);
    }

    function save_tentang($text)
    {
        $data = array(
            'kalimat' => $text
        );
        $this->db->where('jenis', 'tentang');
        $this->db->update('message', $data);
    }
}