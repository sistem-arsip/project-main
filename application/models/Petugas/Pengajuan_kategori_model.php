<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_kategori_model extends CI_Model {

	function tampil_by_petugas($id_petugas) {
		$this->db->order_by("id_pengajuan","asc");
		$query = $this->db->get_where('pengajuan_kategori', ['id_petugas' => $id_petugas]);
		return $query->result_array();
	}

}