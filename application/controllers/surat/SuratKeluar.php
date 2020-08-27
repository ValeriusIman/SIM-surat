<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratKeluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("SuratKeluar_m", "Klasifikasi_m", "Lembaga_m"));
        not_login();
    }

    public function index()
    {
        $userData = userData();
        $lembaga = $this->Lembaga_m->getPrimaryKey(1);
        $list = $this->SuratKeluar_m->getAll();
        $klasifikasi = $this->Klasifikasi_m->getAll();
        $data = array(
            "title" => "Surat Keluar",
            "lembaga" => $lembaga,
            "userData" => $userData['user'],
            "topbar" => "template/topbar",
            "sidebar" => "template/sidebar",
            "modal" => "template/modal",
            "page" => "surat/keluar/v_surat_keluar",
            "suratKeluar" => $list,
            "klasifikasi" => $klasifikasi,
        );
        $this->load->view('template/main', $data);
    }

    public function prosesTambah()
    {
        if (count($_FILES) > 0) {

            $data = array(
                "klasifikasi_id" => $this->input->post("kode"),
                "no_agenda" => $this->input->post("no_agenda"),
                "no_surat" => $this->input->post("no_surat"),
                "isi" => $this->input->post("isi"),
                "tgl_surat" => $this->input->post("tanggal"),
                "tgl_catat" => date('Ymd'),
                "tujuan" => $this->input->post("tujuan_surat"),
                "keterangan" => $this->input->post("keterangan"),
                "user_id" => $this->input->post("id_user"),
                "file_name" => $this->input->post("no_surat"),
            );
            if (is_uploaded_file($_FILES['document']['tmp_name'])) {
                $data['document'] = file_get_contents($_FILES['document']['tmp_name']);
                $data['conten_type'] = mime_content_type($_FILES['document']['tmp_name']);
                $data['file_size'] = $_FILES['document']['size'];
            }
            $this->SuratKeluar_m->insert($data);
        }
    }

    public function prosesEdit()
    {
        if (count($_FILES) > 0) {
            $id = $this->input->post("edit_id_surat");
            $data = array(
                "klasifikasi_id" => $this->input->post("edit_kode"),
                "no_agenda" => $this->input->post("edit_no_agenda"),
                "no_surat" => $this->input->post("edit_no_surat"),
                "isi" => $this->input->post("edit_isi"),
                "tgl_surat" => $this->input->post("edit_tanggal"),
                "tujuan" => $this->input->post("edit_tujuan_surat"),
                "keterangan" => $this->input->post("edit_keterangan"),
                "user_id" => $this->input->post("edit_id_user"),
                "file_name" => $this->input->post("edit_no_surat"),
            );
            if (!file_exists($_FILES['edit_document']['tmp_name']) || !is_uploaded_file($_FILES['edit_document']['tmp_name'])) {
            } else {
                $data["document"] = file_get_contents($_FILES['edit_document']['tmp_name']);
                $data["conten_type"] = mime_content_type($_FILES['edit_document']['tmp_name']);
                $data["file_size"] = $_FILES['edit_document']['size'];
            }
            $this->SuratKeluar_m->update($id, $data);
        }
    }

    public function prosesHapus()
    {
        $id = $this->input->post("id");
        $this->SuratKeluar_m->delete($id);
    }
}
