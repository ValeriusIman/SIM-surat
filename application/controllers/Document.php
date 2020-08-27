<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Document extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            "SuratMasuk_m",
            "SuratKeluar_m"
        ));
        not_login(); //jika belum login akan di kembalikan ke halaman login
    }

    public function pdfSuratMasuk($id)
    {
        $suratMasuk = $this->SuratMasuk_m->getPrimaryKey($id);
        header("Content-length: " . $suratMasuk->file_size);
        header("Content-type: " . $suratMasuk->conten_type);
        ob_clean();
        flush();
        echo $suratMasuk->document;
        exit;
    }

    public function pdfSuratKeluar($id)
    {
        $suratKeluar = $this->SuratKeluar_m->getPrimaryKey($id);
        header("Content-length: " . $suratKeluar->file_size);
        header("Content-type: " . $suratKeluar->conten_type);
        ob_clean();
        flush();
        echo $suratKeluar->document;
        exit;
    }
}
