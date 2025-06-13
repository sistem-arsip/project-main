<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Arsip_model extends CI_Model {

    function get_unik($unik_arsip){
        $query = $this->db->get_where('arsip', ['unik_arsip' => $unik_arsip]);
        $data = $query->row_array();
        return $data;
    }
}