<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("SuratMasuk_m", "Disposisi_m", "Lembaga_m"));
        not_login();
        check_disposisi();
    }

    public function tambahDisposisi($id)
    {
        $userData = userData();
        $lembaga = $this->Lembaga_m->getPrimaryKey(1);
        $suratMasuk = $this->SuratMasuk_m->getPrimaryKey($id);
        $disposisi = $this->Disposisi_m->getByIdSurat($id);
        $data = array(
            "title" => "Disposisi",
            "lembaga" => $lembaga,
            "userData" => $userData['user'],
            "topbar" => "template/topbar",
            "sidebar" => "template/sidebar",
            "modal" => "template/modal",
            "page" => "surat/disposisi/v_disposisi",
            "suratMasuk" => $suratMasuk,
            "disposisi" => $disposisi,
        );
        $this->load->view('template/main', $data);
    }

    public function prosesTambah()
    {
        $data = array(
            "tujuan" => $this->input->post("tujuan"),
            "isi_disposisi" => $this->input->post("isi"),
            "sifat" => $this->input->post("sifat"),
            "batas_waktu" => $this->input->post("batas_waktu"),
            "catatan" => $this->input->post("catatan"),
            "user_id" => $this->input->post("user_id"),
            "surat_id" => $this->input->post("surat_id"),
        );
        $this->Disposisi_m->insert($data);
    }

    public function prosesEdit()
    {
        $id = $this->input->post("edit_id_disposisi");
        $data = array(
            "tujuan" => $this->input->post("edit_tujuan"),
            "isi_disposisi" => $this->input->post("edit_isi"),
            "sifat" => $this->input->post("edit_sifat"),
            "batas_waktu" => $this->input->post("edit_batas_waktu"),
            "catatan" => $this->input->post("edit_catatan"),
        );
        $this->Disposisi_m->update($id, $data);
    }

    public function print($id)
    {
        $lembaga = $this->Lembaga_m->getPrimaryKey(1);
        $suratMasuk = $this->Disposisi_m->getJoinBySurat($id);
        $data = array(
            "lembaga" => $lembaga,
            "suratMasuk" => $suratMasuk,
        );
        $html = $this->load->view('surat/disposisi/print_disposisi', $data, true);
        $this->fungsi->pdf($html, 'Disposisi ', 'A4', 'potrait');
    }
}
