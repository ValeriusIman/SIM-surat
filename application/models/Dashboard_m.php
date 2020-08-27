<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{
    public function karyawan()
    {
        return $this->db->get("user")->num_rows();
    }

    public function klasifikasi()
    {
        return $this->db->get("klasifikasi")->num_rows();
    }

    public function suratMasuk()
    {
        $this->db->where('DATE(tgl_terima)=DATE(NOW())');
        return $this->db->get('surat_masuk')->num_rows();
    }

    public function suratKeluar()
    {
        $this->db->where('DATE(tgl_catat)=DATE(NOW())');
        return $this->db->get('surat_keluar')->num_rows();
    }
}
