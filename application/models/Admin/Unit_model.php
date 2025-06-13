<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_model extends CI_Model {
    function tampil (){

		$query = $this->db->get("unit");
		$data = $query->result_array();

		return $data;
	}
    function tambah($data) {
        $this->db->insert('unit', $data); 
    }

    function detail($id_unit){
		//select * from kategori where id_kategori = x
		$this->db->where('id_unit', $id_unit);
		$q = $this->db->get('unit');
		$d = $q->row_array();

		return $d;
	}

    function edit($input, $id_unit){
        $this->db->where('id_unit', $id_unit);
		$this->db->update('unit', $input);
    }

    function hapus($id_unit){
        $this->db->where('id_unit', $id_unit);
		$this->db->delete('unit');
    }

    // fungsi untuk dashboard
    function total_unit() {
        return $this->db->count_all('unit'); 
    }
}