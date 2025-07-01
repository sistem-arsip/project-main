<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_Model {
    public function tampil() {
        $this->db->from("petugas");
        $this->db->join("unit", "petugas.id_unit = unit.id_unit", "left"); 
        
        $query = $this->db->get();
        return $query->result_array();
    }

    function detail($id_petugas){
		$this->db->where('id_petugas', $id_petugas);
		$q = $this->db->get('petugas');
		$d = $q->row_array();

		return $d;
	}
    function cek_username($username_petugas, $id_petugas){
        $this->db->where('username_petugas', $username_petugas);
        $this->db->where('id_petugas !=', $id_petugas);
        $query = $this->db->get('petugas');

        return $query->num_rows() > 0 ? TRUE : FALSE;
    }

    function edit($input, $id_petugas){
        $this->db->where('id_petugas', $id_petugas);
		$this->db->update('petugas', $input);
    }

    function simpan($data) {
        $this->db->insert('petugas', $data); 
    }

    function hapus($id_petugas) {
        $this->db->where('id_petugas', $id_petugas);
        $this->db->delete('petugas');

        // Cek error MySQL
        $error = $this->db->error(); // array('code' => 1451, 'message' => 'Cannot delete or update ...')
        return $error['code']; // 0 jika tidak ada error
    }
}