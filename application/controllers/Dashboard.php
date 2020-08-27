<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        not_login();
        $this->load->model(array("Dashboard_m", "Lembaga_m"));
    }

    public function index()
    {
        $userData = userData();
        $lembaga = $this->Lembaga_m->getPrimaryKey(1);
        $karyawan = $this->Dashboard_m->karyawan();
        $klasifikasi = $this->Dashboard_m->klasifikasi();
        $suratMasuk = $this->Dashboard_m->suratMasuk();
        $suratKeluar = $this->Dashboard_m->suratKeluar();
        $data = array(
            "title" => "Dashboard",
            "lembaga" => $lembaga,
            "userData" => $userData['user'],
            "topbar" => "template/topbar",
            "sidebar" => "template/sidebar",
            "modal" => "template/modal",
            "page" => "template/dashboard",
            "karyawan" => $karyawan,
            "klasifikasi" => $klasifikasi,
            "suratMasuk" => $suratMasuk,
            "suratKeluar" => $suratKeluar,
        );
        $this->load->view('template/main', $data);
    }
}
