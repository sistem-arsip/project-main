<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    function check_admin($username, $password) {
        
        $sql = "SELECT * FROM admin WHERE BINARY username_admin = ? AND password_admin = ?";
        $query = $this->db->query($sql, [$username, $password]);
        return $query->row();
    }

    function check_petugas($username, $password) {

        $sql = "SELECT * FROM petugas WHERE BINARY username_petugas = ? AND password_petugas = ?";
        $query = $this->db->query($sql, [$username, $password]);
        return $query->row();
    }
}
