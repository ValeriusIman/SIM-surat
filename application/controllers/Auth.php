<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_m");
        // login();
    }

    public function index()
    {
        login();
        $data = array(
            "title" => "Login",
            "page" => "auth/login"
        );
        $this->load->view('auth/mainLogin', $data);
    }

    public function login()
    {

        $username = $this->input->post('userName');
        $password = $this->input->post('password');

        $user = $this->User_m->getUser($username);
        //jika user ada
        if ($user) {
            //cek password
            if (md5($password) == $user['password']) {
                $data = [
                    'user_name' => $user['user_name'],
                    'level' => $user['level'],
                    'user_id' => $user['id_user'],
                    'nama' => $user['nama'],
                    'nip' => $user['nip']
                ];
                $this->session->set_userdata($data);
                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Kata sandi salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            User Tidak Terdaftar!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda telah keluar dari akun!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/error404');
    }
}
