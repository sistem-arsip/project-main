<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
    function tampil (){
        $this->db->where('status_kategori', 'aktif');
        $this->db->order_by("id_kategori","desc");
		$query = $this->db->get("kategori");
		$data = $query->result_array();
		return $data;
	}
    function tampil_semua(){
        $this->db->order_by("id_kategori","desc");
		$query = $this->db->get("kategori");
		$data = $query->result_array();
		return $data;
    }

    function unit_by_petugas($id_petugas) {
        $query = $this->db->get_where('petugas', ['id_petugas' => $id_petugas]);
        $data = $query->row_array();
        return $data['id_unit'];
    }

    function simpan($data) {
        $this->db->insert('pengajuan_kategori', $data);
        $id_pengajuan = $this->db->insert_id();

        // get nama petugas dan unit
        $this->db->where('id_petugas', $data['id_petugas']);
        $petugas = $this->db->get('petugas')->row();

        $this->db->where('id_unit', $data['id_unit']);
        $unit = $this->db->get('unit')->row();

        // insert tabel notif admin
        $notif['id_petugas'] = $data["id_petugas"];
        $notif['id_pengajuan'] = $id_pengajuan;
        $notif['isi_notif_admin'] = "Terdapat pengajuan kategori baru dari <b>" .$petugas->nama_petugas." (".$unit->nama_unit.")</b> dengan nama <b>" .$data['nama_pengajuan']. "</b>" ;
        $this->db->insert('notifikasi_admin', $notif);
    }
}