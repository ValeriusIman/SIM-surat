<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratKeluar_m extends CI_Model
{
    var $table = "surat_keluar";
    var $primaryKey = "id_surat_keluar";

    public function getAll()
    {
        $this->db->select('*, klasifikasi.kode as kode')
            ->from('surat_keluar')
            ->join('klasifikasi', 'klasifikasi.id_klasifikasi = surat_keluar.klasifikasi_id')
            ->order_by('tgl_catat', 'desc');
        return $this->db->get()->result();
    }

    public function getPrimaryKey($id)
    {
        $this->db->where($this->primaryKey, $id);
        return $this->db->get($this->table)->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where($this->primaryKey, $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where($this->primaryKey, $id);
        return $this->db->delete($this->table);
    }
}
