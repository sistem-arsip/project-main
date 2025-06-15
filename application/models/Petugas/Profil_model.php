<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {
    function tampil() {
        $id_petugas = $this->session->userdata('id'); // Ambil ID dari session
    
        $this->db->join('unit', 'petugas.id_unit = unit.id_unit', 'left');
        $this->db->where("id_petugas", $id_petugas);
        $query = $this->db->get("petugas");
        return $query->row_array();
    }
    

	function ubah($id_petugas, $data) {
        // Jika password diisi, enkripsi sebelum disimpan
        if (!empty($data["password_petugas"])) {
            $data["password_petugas"] = md5($data["password_petugas"]);
        } else {
            unset($data["password_petugas"]); // Jika password kosong, hapus dari array update
        }

        $this->db->where("id_petugas", $id_petugas);
        return $this->db->update("petugas", $data);
    }
}