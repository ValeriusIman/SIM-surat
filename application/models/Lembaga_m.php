<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lembaga_m extends CI_Model
{
    var $table = "lembaga";
    var $primaryKey = "id_lembaga";

    public function getAll()
    {
        return $this->db->get($this->table)->result();
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
