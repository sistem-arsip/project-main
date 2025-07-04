<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi_model extends CI_Model {
    function get_notifikasi_by_id($id_notif_admin){
		$query = $this->db->get_where('notifikasi_admin', ['id_notif_admin' => $id_notif_admin]);
		$data = $query->row_array();
		return $data;
	}

	function tandaiBaca($id_notif_admin){
		$this->db->where('id_notif_admin', $id_notif_admin);
		$this->db->update('notifikasi_admin', ['status_notif_admin' => 'sudah']);
	}

	function baca_semua(){
		$this->db->where('status_notif_admin', 'belum');
		$this->db->update('notifikasi_admin', ['status_notif_admin' => 'sudah']);
	}
}