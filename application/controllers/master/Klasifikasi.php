<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasifikasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("Klasifikasi_m", "Lembaga_m"));
        not_login();
    }

    public function index()
    {
        $userData = userData();
        $lembaga = $this->Lembaga_m->getPrimaryKey(1);
        $list = $this->Klasifikasi_m->getAll();
        $data = array(
            "title" => "Klasifikasi",
            "lembaga" => $lembaga,
            "userData" => $userData['user'],
            "topbar" => "template/topbar",
            "sidebar" => "template/sidebar",
            "modal" => "template/modal",
            "page" => "master/klasifikasi/v_klasifikasi",
            "klasifikasi" => $list,
        );
        $this->load->view('template/main', $data);
    }

    public function tambah()
    {
        $data = array(
            "kode" => $this->input->post("kode"),
            "nama" => $this->input->post("nama"),
            "uraian" => $this->input->post("uraian"),
        );
        $this->Klasifikasi_m->insert($data);
    }

    public function prosesEdit()
    {
        $id = $this->input->post("edit_id_klasifikasi");
        $data = array(
            "kode" => $this->input->post("kode"),
            "nama" => $this->input->post("edit_nama"),
            "uraian" => $this->input->post("edit_uraian"),
        );
        $this->Klasifikasi_m->update($id, $data);
    }

    public function delete()
    {
        $id = $this->input->post("id");
        $this->Klasifikasi_m->delete($id);
    }
}
