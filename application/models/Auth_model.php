<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function check_admin($username, $password) {
        return $this->db->get_where('admin', [
            'admin_username' => $username,
            'admin_password' => $password
        ])->row();
    }

    public function check_petugas($username, $password) {
        return $this->db->get_where('petugas', [
            'username_petugas' => $username,
            'password_petugas' => $password
        ])->row();
    }
}
