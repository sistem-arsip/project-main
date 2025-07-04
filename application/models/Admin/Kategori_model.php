<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
    function tampil (){
        $this->db->order_by("id_kategori","asc");
		$query = $this->db->get("kategori");
		$data = $query->result_array();
		return $data;
	}

    function simpan($data) {
        $this->db->insert('kategori', $data);
    }

    function detail($id_kategori){
		$this->db->where('id_kategori', $id_kategori);
		$q = $this->db->get('kategori');
		$d = $q->row_array();

		return $d;
	}
    function cek_nama_kategori($nama_kategori, $id_kategori){
        $this->db->where('nama_kategori', $nama_kategori);
        $this->db->where('id_kategori !=', $id_kategori);
        $query = $this->db->get('kategori');

        return $query->num_rows() > 0 ? TRUE : FALSE;
    }
    function edit($input, $id_kategori){
        $this->db->where('id_kategori', $id_kategori);
		$this->db->update('kategori', $input);
    }
    function hapus($id_kategori){
        $this->db->where('id_kategori', $id_kategori);
		$this->db->delete('kategori');

		// Cek error MySQL
        $error = $this->db->error(); // error = Cannot delete or update
        return $error['code']; // 0 jika tidak ada error
    }
}