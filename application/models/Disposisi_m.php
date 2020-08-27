<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi_m extends CI_Model
{
    var $table = "disposisi";
    var $primaryKey = "id_disposisi";

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function getPrimaryKey($id)
    {
        $this->db->where($this->primaryKey, $id);
        return $this->db->get($this->table)->row();
    }

    public function getByIdSurat($id)
    {
        $this->db->where("surat_id", $id);
        return $this->db->get($this->table)->result();
    }

    public function getJoinBySurat($id)
    {
        $this->db->select('*, klasifikasi.kode as kode')
            ->from('disposisi')
            ->join('surat_masuk', 'surat_masuk.id_surat_masuk=disposisi.surat_id')
            ->join('klasifikasi', 'klasifikasi.id_klasifikasi=surat_masuk.klasifikasi_id')
            ->where("surat_id", $id);
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
        $this->db->where("surat_id", $id);
        return $this->db->delete($this->table);
    }
}
