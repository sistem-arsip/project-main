<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {
    function tampil() {
        $id_admin = $this->session->userdata('id_admin');
    
        $this->db->where("id_admin", $id_admin);
        $query = $this->db->get("admin");
    
        return $query->row_array(); 
    }
    function cek_username_admin($username_admin, $id_admin){
        $this->db->where("username_admin", $username_admin);
        $this->db->where("id_admin !=", $id_admin);
        $query = $this->db->get("admin");

        return $query->num_rows() > 0 ? TRUE : FALSE;
    }

	function ubah($id_admin, $data) {
        // enkripsi pw sebelum disimpan
        if (!empty($data["password_admin"])) {
            $data["password_admin"] = md5($data["password_admin"]);
        } else {
            unset($data["password_admin"]); 
        }

        $this->db->where("id_admin", $id_admin);
        return $this->db->update("admin", $data);
    }
}