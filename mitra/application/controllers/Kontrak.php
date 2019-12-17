<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_kamar');
        if ($_SESSION['ID'] == null){
            redirect(base_url('Login'));
        }
    }

    public function index()
    {
        $id = $_SESSION['ID'];
        $data['prpti'] = $this->Model_kamar->data_properti($id);
        $data['data'] = $this->Model_kamar->data_tipe_kamar($id);
        $data['folder'] = "Kontrak";
        $data['side'] = "kontrak";
        $this->load->view('index', $data);
    }

    public function send()
    {
        $subject = 'Upload Kontrak Akomodasi  - ' . $this->input->post("properti");
        $file_data = $this->upload_file();
        if(is_array($file_data))
        {
            $message = '
                
   ';

            $config = [
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'protocol' => 'smtp',
                'smtp_host' => 'mail.vividi.id',
                'smtp_user' => 'info@vividi.id',  // Email gmail
                'smtp_pass' => 'devano2019',  // Password gmail
                'smtp_crypto' => 'ssl',
                'smtp_port' => 465,
                'crlf' => "\r\n",
                'newline' => "\r\n"
            ];
            //$file_path = 'uploads/' . $file_name;
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('info@vividi.id');
            $this->email->to('hotel@vividi.id');
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->attach($file_data['full_path']);
            if($this->email->send())
            {
                if(delete_files($file_data['file_path']))
                {
                    $this->session->set_flashdata('message', 'Kontrak Berhasil Terkirim');
                    redirect('Kontrak');
                }
            }
            else
            {
                if(delete_files($file_data['file_path']))
                {
                    $this->session->set_flashdata('message', 'Error di Pengiriman E-Mail');
                    redirect('Kontrak');
                }
            }
        }
        else
        {
            $this->session->set_flashdata('message', 'Error di Attachment File');
            redirect('Kontrak');
        }
    }



    function upload_file()
    {
        $config['upload_path'] = './assets/';
        $config['allowed_types'] = 'doc|docx|pdf';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('kontrak'))
        {
            return $this->upload->data();
        }
        else
        {
            return $this->upload->display_errors();
        }
    }
}