<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validation extends CI_Controller
{
    public function cekKodeKlasifikasi()
    {
        $id = ifNull($this->input->post("id", true), 0);
        $kode = $this->input->post("kode", true);
        $query = "select id_klasifikasi "
            . "from klasifikasi "
            . "where kode='$kode'";
        $result = $this->db->query($query)->row();
        // var_dump($result);
        if ($result != NULL) {
            // var_dump($id);
            if ("" . $result->id_klasifikasi == $id) {
                echo "true";
            } else {
                echo "false";
            }
        } else {
            echo "true";
        }
    }

    public function cekPassword()
    {
        $this->load->model(array("User_m"));
        $id = ifNull($this->input->post("id", true), 0);
        $password = md5($this->input->post("password", true));
        $hasil = $this->User_m->getPassword($password, $id);
        // var_dump($hasil['password']);
        if ($hasil['password'] != $password) {
            //      var_dump($result->id_denominasi, $id);
            if ("" . $hasil['id_user'] == $id) {
                echo "true";
            } else {
                echo "false";
            }
        } else {
            echo "true";
        }
    }
}
