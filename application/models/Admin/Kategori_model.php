<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
    function tampil (){

		$query = $this->db->get("kategori");
		$data = $query->result_array();

		return $data;
	}

    function simpan($data) {
        $this->db->insert('kategori', $data); // Menambah data
    }

    function detail($id_kategori){
		//select * from kategori where id_kategori = x
		$this->db->where('id_kategori', $id_kategori);
		$q = $this->db->get('kategori');
		$d = $q->row_array();

		return $d;
	}

    function edit($input, $id_kategori){
        $this->db->where('id_kategori', $id_kategori);
		$this->db->update('kategori', $input);
    }
    function hapus($id_kategori){
        $this->db->where('id_kategori', $id_kategori);
		$this->db->delete('kategori');
    }

	 // fungsi untuk dashboard
	 function total_kategori() {
        return $this->db->count_all('kategori'); 
    }
}