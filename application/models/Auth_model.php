<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    function check_admin($username, $password) {
        return $this->db->get_where('admin', [
            'username_admin' => $username,
            'password_admin' => $password
        ])->row();
    }

    function check_petugas($username, $password) {
        return $this->db->get_where('petugas', [
            'username_petugas' => $username,
            'password_petugas' => $password
        ])->row();
    }
}
