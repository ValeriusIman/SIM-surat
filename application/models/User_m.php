<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    var $table = "user";
    var $primaryKey = "id_user";
    var $user = "user_name";

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function getPrimaryKey($id)
    {
        $this->db->select("*,DATE_FORMAT(date_created, '%d %M %Y') as bergabung")
            ->where($this->primaryKey, $id);
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

    public function getPassword($password, $id)
    {
        $this->db->where("password", $password);
        $this->db->where($this->primaryKey, $id);
        return $this->db->get($this->table)->row_array();
    }
}
