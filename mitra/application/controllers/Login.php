<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_login');
        $this->load->library('session');
        $this->load->database();
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function ceklogin()
    {
        if (isset($_POST['submit'])) {
//            $pass = md5($this->input->post('password', true));
            $user = $this->input->post('username');
            $pass = $this->input->post('password');
            $cek = $this->model_login->cek_login($user, $pass);
            if ($cek > 0) {
                $pelogin = $this->model_login->proses_login($user, $pass);
                $level = $pelogin->meta_value;
                $role = explode('"',$level);
                $data = array('role' => $role[1], 'username' => $user);
                $this->session->set_userdata($data);
                if ($role[1] == "administrator") {

                } else if ($role[1] == "trav_busowner") {
                    redirect(base_url('home'));
                } else {

                }
            } else {
                redirect("/");
            }
        }

    }
}
