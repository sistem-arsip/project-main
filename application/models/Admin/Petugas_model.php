<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_Model {
    public function tampil() {
        $this->db->from("petugas");
        $this->db->join("unit", "petugas.id_unit = unit.id_unit", "left"); // LEFT JOIN
        
        $query = $this->db->get();
        return $query->result_array();
    }

    function detail($id_petugas){
		//select * from petugas where id_petugas = x
		$this->db->where('id_petugas', $id_petugas);
		$q = $this->db->get('petugas');
		$d = $q->row_array();

		return $d;
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