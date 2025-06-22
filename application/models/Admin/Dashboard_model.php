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
}