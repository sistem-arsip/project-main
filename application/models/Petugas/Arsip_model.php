<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Arsip_model extends CI_Model {
    function unit_by_petugas($id_petugas){
        $query = $this->db->get_where('petugas', ['id_petugas' => $id_petugas]);
        $data = $query->row_array();
        return $data['id_unit'];
    }

    function tampil_by_unit($id_unit, $id_kategori = null, $bulan = null) {

        $this->db->join('kategori', 'arsip.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('unit', 'arsip.id_unit = unit.id_unit', 'left');
        $this->db->join('petugas', 'arsip.id_petugas = petugas.id_petugas', 'left');
        $this->db->where('arsip.id_unit', $id_unit);

        // FILTER KATEGORI
        if (!empty($id_kategori)) {
            $this->db->where('arsip.id_kategori', $id_kategori);
        }
    
        // FILTER BULAN & TAHUN (YYYY-MM)
        if (!empty($bulan)) {
            $this->db->where('DATE_FORMAT(arsip.waktu_upload, "%Y-%m") =', $bulan);
        }
        $this->db->order_by('arsip.id_arsip', 'desc');
        $query = $this->db->get("arsip");
        return $query->result_array();
    
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

    function simpan($inputan) {
        $this->db->insert('arsip', $inputan);
        return $this->db->affected_rows() > 0 ? "sukses" : "gagal";
    }

    function get_nomor_by_kode_qr($kode_qr) {
        return $this->db->get_where('kode_qr', ['kode_qr' => $kode_qr])->row_array();
    }

    function detail_ubah($id_arsip){
		$this->db->where('arsip.id_arsip', $id_arsip);
		$query = $this->db->get("arsip");
		$data = $query->row_array();
		return $data;
	}

    function cek_nomor_dokumen($nomor, $id_arsip = null) {
        $this->db->where('nomor_dokumen', $nomor);
        if ($id_arsip !== null) {
            $this->db->where('id_arsip !=', $id_arsip);
        }
        $query = $this->db->get('arsip');
        return $query->num_rows() > 0 ? TRUE : FALSE;
    }
    function ubah($id_arsip, $data) {
        $this->db->where('id_arsip', $id_arsip);
        return $this->db->update('arsip', $data);
    }
    
    function hapus($id_arsip){
        $this->db->where('id_arsip', $id_arsip);
        return $this->db->delete('arsip');
    }

    function get_nama_unit($id_unit) {
        $this->db->where('id_unit', $id_unit);
        $query = $this->db->get('unit');
        $data = $query->row_array();
        return $data ? $data['nama_unit'] : null;
    }
    function update_by_kode_qr($kode_qr, $data){
        $this->db->where('kode_qr', $kode_qr);
        return $this->db->update('arsip', $data);
    }

}
?>
