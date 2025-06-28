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
        return $this->db->count_all('kategori'); 
    }
}
