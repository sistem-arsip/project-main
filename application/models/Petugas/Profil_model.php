<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {
    function tampil() {
        $id_petugas = $this->session->userdata('id_petugas'); // Ambil ID dari session
    
        $this->db->join('unit', 'petugas.id_unit = unit.id_unit', 'left');
        $this->db->where("id_petugas", $id_petugas);
        $query = $this->db->get("petugas");
        return $query->row_array();
    }
    function cek_username_petugas($username_petugas, $id_petugas){
        $this->db->where("username_petugas", $username_petugas);
        $this->db->where("id_petugas !=", $id_petugas);
        $query = $this->db->get("petugas");

        return $query->num_rows() > 0 ? TRUE : FALSE;
    }
	function ubah($id_petugas, $data) {
        $this->db->where("id_petugas", $id_petugas);
        return $this->db->update("petugas", $data);
    }

}