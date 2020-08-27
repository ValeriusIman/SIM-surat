<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lembaga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Lembaga_m");
        not_login();
    }

    public function lembaga($id)
    {
        $lembaga = $this->Lembaga_m->getPrimaryKey($id);
        $userData = userData();
        $data = array(
            "title" => "Lembaga",
            "lembaga" => $lembaga,
            "userData" => $userData['user'],
            "topbar" => "template/topbar",
            "sidebar" => "template/sidebar",
            "modal" => "template/modal",
            "page" => "master/lembaga/v_lembaga",
            "lembaga" => $lembaga
        );
        $this->load->view('template/main', $data);
    }

    public function prosesUbah()
    {
        if (count($_FILES) > 0) {
            $id = $this->input->post("id");
            $data = array(
                "lembaga" => $this->input->post("lembaga"),
                "bidang" => $this->input->post("bidang"),
                "alamat" => $this->input->post("alamat"),
                "nama_atasan" => $this->input->post("nama_atasan"),
                "nip" => $this->input->post("nip"),
                "telp" => $this->input->post("telp"),
                "email" => $this->input->post("email"),
                "website" => $this->input->post("website"),
            );
            if (!file_exists($_FILES['logo']['tmp_name']) || !is_uploaded_file($_FILES['logo']['tmp_name'])) {
            } else {
                $data["logo"] = file_get_contents($_FILES['logo']['tmp_name']);
                $data["conten_type"] = mime_content_type($_FILES['logo']['tmp_name']);
                $data["file_size"] = $_FILES['logo']['size'];
                $data["file_name"] = $_FILES['logo']['tmp_name'];
            }
            $this->Lembaga_m->update($id, $data);
        }
    }
}
