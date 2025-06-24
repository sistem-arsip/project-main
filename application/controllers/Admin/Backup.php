<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backup extends CI_Controller {

    function __construct(){
        parent::__construct();

        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }
    }

    function index(){

        $this->load->view("admin/header");
        $this->load->view("admin/backup");
        $this->load->view("admin/footer");
    }
}