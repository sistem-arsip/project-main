<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_kategori extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('petugas/Pengajuan_kategori_model');
        
        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'petugas_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }
    }
    function index(){
        $id_petugas = $this->session->userdata('id_petugas'); 
        $data["pengajuan"] = $this->Pengajuan_kategori_model->tampil_by_petugas($id_petugas);
        $this->load->view("petugas/header");
        $this->load->view("petugas/pengajuan_kategori",$data);
        $this->load->view("petugas/footer");
    }
}
