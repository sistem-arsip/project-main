<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_model extends CI_Model {
    function tampil_by_petugas($id_petugas) {
        $this->db->where('id_petugas', $id_petugas);
        $this->db->order_by('waktu_generate', 'ASC');
        $query = $this->db->get('kode_qr');
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
    function unit_by_qr($kode_qr){
		$this->db->join('unit', 'kode_qr.id_unit = unit.id_unit', 'left');
		$this->db->where('kode_qr.kode_qr', $kode_qr);
		$query = $this->db->get('kode_qr');
		return $query->row_array();
	}
    function qr_by_kode($kode_qr) {
        return $this->db->get_where('kode_qr', ['kode_qr' => $kode_qr])->row_array();
    }
    function update_qr($kode_qr, $data) {
        $this->db->where('kode_qr', $kode_qr);
        $this->db->update('kode_qr', $data);
    }
    function cek_nomor_dokumen($nomor, $kode_qr){
        $this->db->where('nomor_dokumen', $nomor);
        $this->db->where('kode_qr !=', $kode_qr);
        $query = $this->db->get('kode_qr');
        return $query->num_rows() > 0;
    }
    function hapus_qr($kode_qr) {
        $this->db->where('kode_qr', $kode_qr);
        return $this->db->delete('kode_qr');
    }

}
