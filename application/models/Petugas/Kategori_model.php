<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
    function tampil (){

		$query = $this->db->get("kategori");
		$data = $query->result_array();
		return $data;
	}

    function unit_by_petugas($id_petugas) {
        $query = $this->db->get_where('petugas', ['id_petugas' => $id_petugas]);
        $data = $query->row_array();
        return $data['id_unit'];
    }

    function simpan($data) {
        $this->db->insert('pengajuan_kategori', $data);
    }

    

     // fungsi untuk dashboard
	 function total_kategori() {
        return $this->db->count_all('kategori'); 
    }
}