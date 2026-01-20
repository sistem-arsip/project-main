<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

function unit_by_petugas($id_petugas){
    $query = $this->db->get_where('petugas', ['id_petugas' => $id_petugas]);
    $data = $query->row_array();
    return $data ? $data['id_unit'] : null;
}

function total_arsip_unit($id_unit) {
    return $this->db->where('id_unit', $id_unit)->count_all_results('arsip');
}

function total_arsip_saya($id_petugas) {
    return $this->db->where('id_petugas', $id_petugas)->count_all_results('arsip');
}

function total_kategori() {
    return $this->db->where('status_kategori', 'aktif')->count_all_results('kategori');
}

function arsip_per_bulan_per_tahun($id_unit, $tahun) {
    $hasil = [];

    for ($bulan = 1; $bulan <= 12; $bulan++) {
        $start_date = sprintf('%s-%02d-01', $tahun, $bulan);
        $end_date = date("Y-m-t", strtotime($start_date));

        $this->db->where('waktu_upload >=', $start_date);
        $this->db->where('waktu_upload <=', $end_date);
        $this->db->where('id_unit', $id_unit);

        $jumlah = $this->db->count_all_results('arsip');
        $hasil[] = $jumlah;
    }

    return $hasil;
}

function get_tahun_arsip_unit($id_unit) {
    $this->db->select('YEAR(waktu_upload) as tahun');
    $this->db->from('arsip');
    $this->db->where('id_unit', $id_unit);
    $this->db->group_by('tahun');
    $this->db->order_by('tahun', 'ASC');
    return $this->db->get()->result();
}

function total_qr_saya($id_petugas) {
    return $this->db->where('id_petugas', $id_petugas)->count_all_results('kode_qr');
}

}
