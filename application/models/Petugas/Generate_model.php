<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_model extends CI_Model {
    function tampil_by_petugas($id_petugas) {
		$query = $this->db->get_where('kode_qr', ['id_petugas' => $id_petugas]);
		return $query->result_array();
	}
    function unit_by_petugas($id_petugas){
        $query = $this->db->get_where('petugas', ['id_petugas' => $id_petugas]);
        $data = $query->row_array();
        return $data ? $data['id_unit'] : null;
    }
    function cek_kode_qr($kode_qr) {
        return $this->db->get_where('kode_qr', ['kode_qr' => $kode_qr])->num_rows() > 0;
    }
    function simpan_qr($data) {
        return $this->db->insert('kode_qr', $data);
    }
    function qr_by_kode($kode_qr) {
    return $this->db->get_where('kode_qr', ['kode_qr' => $kode_qr])->row_array();
}

}
