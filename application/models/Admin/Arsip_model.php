<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip_model extends CI_Model {

	function tampil_by_unit(){
		$query = $this->db->get("unit");
		$data = $query->result_array();
		return $data;
	}

	function jumlah_arsip_perunit($id_unit){
		return $this->db->where('id_unit', $id_unit)->count_all_results('arsip');
	}

	function get_arsip_by_unit($id_unit) {
		$this->db->join('kategori', 'arsip.id_kategori = kategori.id_kategori', 'left');
		$this->db->join('unit', 'arsip.id_unit = unit.id_unit', 'left');
		$this->db->join('petugas', 'arsip.id_petugas = petugas.id_petugas', 'left');
		$this->db->where('arsip.id_unit', $id_unit);
		$query = $this->db->get('arsip');
		return $query->result_array();
	}

	function get_unit_by_id($id_unit) {
		return $this->db->get_where('unit', ['id_unit' => $id_unit])->row_array();
	}

    function tampil (){
		$this->db->join('kategori', 'arsip.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('unit', 'arsip.id_unit = unit.id_unit', 'left');
        $this->db->join('petugas', 'arsip.id_petugas = petugas.id_petugas', 'left');
		$query = $this->db->get("arsip");
		$data = $query->result_array();
		return $data;
	}

	function detail($id_arsip){
		$this->db->join('kategori', 'arsip.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('unit', 'arsip.id_unit = unit.id_unit', 'left');
        $this->db->join('petugas', 'arsip.id_petugas = petugas.id_petugas', 'left');
		$this->db->where('arsip.id_arsip', $id_arsip);
		$query = $this->db->get("arsip");
		$data = $query->row_array();
		return $data;
	}

	function hapus($id_arsip){
		$this->db->where('id_arsip', $id_arsip);
		$this->db->delete('arsip');
}

}