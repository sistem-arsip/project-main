<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kode_qr_model extends CI_Model {
    
	function tampil_by_unit(){
		$query = $this->db->get("unit");
		$data = $query->result_array();
		return $data;
	}

	function jumlah_qr_perunit($id_unit){
		return $this->db->where('id_unit', $id_unit)->count_all_results('kode_qr');
	}
	function get_unit_by_id($id_unit) {
		return $this->db->get_where('unit', ['id_unit' => $id_unit])->row_array();
	}

    function get_qr_by_unit($id_unit) {
        $this->db->join('unit', 'kode_qr.id_unit = unit.id_unit', 'left');
        $this->db->join('petugas', 'kode_qr.id_petugas = petugas.id_petugas', 'left');
        $this->db->order_by('waktu_generate', 'desc');
        $this->db->where('kode_qr.id_unit', $id_unit);
        $query = $this->db->get('kode_qr');
        return $query->result_array();
    }

    function qr_by_kode($kode_qr) {
        $this->db->join('unit', 'kode_qr.id_unit = unit.id_unit', 'left');
        $this->db->join('petugas', 'kode_qr.id_petugas = petugas.id_petugas', 'left');
        return $this->db->get_where('kode_qr', ['kode_qr.kode_qr' => $kode_qr])->row_array();
    }

}