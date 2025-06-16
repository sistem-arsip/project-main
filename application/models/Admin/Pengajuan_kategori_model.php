<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_kategori_model extends CI_Model {
    function tampil (){
        $this->db->join('unit', 'pengajuan_kategori.id_unit = unit.id_unit', 'left');
        $this->db->join('petugas', 'pengajuan_kategori.id_petugas = petugas.id_petugas', 'left');
		$query = $this->db->get("pengajuan_kategori");
		$data = $query->result_array();
		return $data;
	}

	function get_pengajuan_by_id($id_pengajuan) {
		$query = $this->db->get_where('pengajuan_kategori', ['id_pengajuan' => $id_pengajuan]);
		return $query->row_array();
	}

	function insert_kategori($data) {
		$this->db->insert('kategori', $data);
	}

	function terima_status_pengajuan($id_pengajuan, $status) {
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('pengajuan_kategori', ['status_pengajuan' => $status]);

		$pengajuan = $this->get_pengajuan_by_id($id_pengajuan);

		//query insert ke tabel notifikasi
		$masuk['id_admin'] = $this->session->userdata("id_admin");
		$masuk['id_petugas'] = $pengajuan["id_petugas"];
		$masuk['isi_notifikasi'] = "Pengajuan kategori dengan nama <b> ".$pengajuan['nama_pengajuan']."</b> dengan keterangan <b> ".$pengajuan["keterangan_pengajuan"]."</b> telah kami terima";
		$this->db->insert("notifikasi", $masuk);
	}

	function tolak_status_pengajuan($id_pengajuan, $status) {
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('pengajuan_kategori', ['status_pengajuan' => $status]);
	}

}