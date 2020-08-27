<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("User_m", "Lembaga_m"));
        not_login();
        check_admin();
    }

    public function index()
    {
        $userData = userData();
        $lembaga = $this->Lembaga_m->getPrimaryKey(1);
        $list = $this->User_m->getAll();
        $data = array(
            "title" => "User",
            "lembaga" => $lembaga,
            "userData" => $userData['user'],
            "topbar" => "template/topbar",
            "sidebar" => "template/sidebar",
            "modal" => "template/modal",
            "page" => "master/user/v_user",
            "user" => $list,
        );
        $this->load->view('template/main', $data);
    }

    public function tambah()
    {
        $data = array(
            "nip" => $this->input->post("nip"),
            "nama" => $this->input->post("nama"),
            "user_name" => $this->input->post("user_name"),
            "password" => md5($this->input->post("password")),
            "level" => $this->input->post("level"),
            "date_created" => date('Ymd'),
        );
        $this->User_m->insert($data);
    }

    public function prosesEdit()
    {
        $id = $this->input->post("edit_id_user");
        $data = array(
            "nip" => $this->input->post("edit_nip"),
            "nama" => $this->input->post("edit_nama"),
            "level" => $this->input->post("edit_level"),
        );
        $this->User_m->update($id, $data);
    }

    public function prosesEditProfil()
    {
        $id = $this->input->post("edit_id_user");
        $data = array(
            "nip" => $this->input->post("edit_nip"),
            "nama" => $this->input->post("edit_nama"),
        );
        $this->User_m->update($id, $data);
    }

    public function prosesEditPassword()
    {
        $id = $this->input->post('id');
        $data = array(
            "password" => md5($this->input->post("password1")),
        );
        $this->User_m->update($id, $data);
    }

    public function delete()
    {
        $id = $this->input->post("id");
        $this->User_m->delete($id);
    }
}
