<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notifikasi_model extends CI_Model {
    
    function baca_notif($id_notifikasi){
        $this->db->where('id_notifikasi', $id_notifikasi);
        $this->db->update('notifikasi', ['status_notifikasi' => 'sudah']);
    }
    function baca_semua($id_petugas){
        $this->db->where('id_petugas', $id_petugas);
        $this->db->where('status_notifikasi', 'belum');
        $this->db->update('notifikasi', ['status_notifikasi' => 'sudah']);
    } 
}