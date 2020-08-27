<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratMasuk_m extends CI_Model
{
    var $table = "surat_masuk";
    var $primaryKey = "id_surat_masuk";

    public function getAll()
    {
        $this->db->select('*, klasifikasi.kode as kode')
            ->from('surat_masuk')
            ->join('klasifikasi', 'klasifikasi.id_klasifikasi = surat_masuk.klasifikasi_id')
            ->order_by('tgl_terima', 'desc');
        return $this->db->get()->result();
    }

    public function getPrimaryKey($id)
    {
        $this->db->select('*, klasifikasi.kode as kode')
            ->from('surat_masuk')
            ->join('klasifikasi', 'klasifikasi.id_klasifikasi = surat_masuk.klasifikasi_id')
            ->where($this->primaryKey, $id);
        return $this->db->get()->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getUser($id)
    {
        $this->db->where($this->user, $id);
        return $this->db->get($this->table)->row_array();
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
