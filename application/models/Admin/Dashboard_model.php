<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_model extends CI_Model {
    function tampil_unit(){
        $query = $this->db->get('unit');
        return $query->result_array();
    }
    function jumlah_arsip_perunit($id_unit){
        return $this->db->where('id_unit', $id_unit)->count_all_results('arsip');
    }
    function total_petugas() {
        return $this->db->where('status_petugas', 'aktif')->count_all_results('petugas');
    }
    function total_unit() {
        return $this->db->where('status_unit', 'aktif')->count_all_results('unit');
    }
    function total_arsip() {
        return $this->db->count_all('arsip');
    }
    function total_kategori() {
        return $this->db->where('status_kategori', 'aktif')->count_all_results('kategori');    

    }
    function get_tahun_arsip(){
        return $this->db->select('YEAR(waktu_upload) AS tahun')->from('arsip')->group_by('YEAR(waktu_upload)')->order_by('tahun', 'DESC')->get()->result_array();
    }
    function get_bulan_arsip($tahun){
        return $this->db->select('MONTH(waktu_upload) AS bulan')->from('arsip')->where('YEAR(waktu_upload)', $tahun)->group_by('MONTH(waktu_upload)')->order_by('bulan', 'ASC')->get()->result_array();
    }

}