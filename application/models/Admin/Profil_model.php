<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {
    function tampil() {
        $id_admin = $this->session->userdata('id_admin'); // Ambil ID dari session
    
        $this->db->where("id_admin", $id_admin);
        $query = $this->db->get("admin");
    
        return $query->row_array(); // Mengembalikan hanya satu baris data
    }

	function ubah($id_admin, $data) {
        // Jika password diisi, enkripsi sebelum disimpan
        if (!empty($data["password_admin"])) {
            $data["password_admin"] = md5($data["password_admin"]);
        } else {
            unset($data["password_admin"]); // Jika password kosong, hapus dari array update
        }

        $this->db->where("id_admin", $id_admin);
        return $this->db->update("admin", $data);
    }
}