<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_model extends CI_Model {
    // NEW
    function tampil_aktif (){
        $this->db->where('status_unit', 'aktif');
        $this->db->order_by("id_unit","desc");
		$query = $this->db->get("unit");
		$data = $query->result_array();
		return $data;
	}
    function tampil_nonaktif (){
        $this->db->where('status_unit', 'nonaktif');
        $this->db->order_by("id_unit","desc");
		$query = $this->db->get("unit");
		$data = $query->result_array();
		return $data;
	}
    function tambah($data) {
        $this->db->insert('unit', $data); 
    }

    function detail($id_unit){
		$this->db->where('id_unit', $id_unit);
		$q = $this->db->get('unit');
		$d = $q->row_array();

		return $d;
	}
    function cek_nama_unit($nama_unit, $id_unit){
        $this->db->where('nama_unit', $nama_unit);
        $this->db->where('id_unit !=', $id_unit);
        $query = $this->db->get('unit');

        return $query->num_rows() > 0 ? TRUE : FALSE;
    }

    function edit($input, $id_unit){
        $this->db->where('id_unit', $id_unit);
		$this->db->update('unit', $input);
    }
    // NEW
     function update_status($id_unit, $status) {
        $this->db->where('id_unit', $id_unit);
        $this->db->update('unit', ['status_unit' => $status]);
    }

    function hapus($id_unit){
        $this->db->where('id_unit', $id_unit);
        $this->db->delete('unit');

        // Cek error dari query delete
        $error = $this->db->error(); // ['code' => 1451, 'message' => 'Cannot delete ...']
        return $error['code']; // return 0 jika berhasil, 1451 jika gagal karena FK
    }
}