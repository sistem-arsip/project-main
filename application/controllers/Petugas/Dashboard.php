<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        // $this->load->model('petugas/Dashboard_model');
        $this->load->model('petugas/Kategori_model');
        
        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'petugas_login') {
            redirect('auth/login', 'refresh'); 
        }
    }

    // Halaman dashboard
    function index() {
    

        //data
        $data['total_kategori'] = $this->Kategori_model->total_kategori();
        // Menampilkan halaman dashboard
        $this->load->view('petugas/header');
        $this->load->view('petugas/dashboard', $data);
        $this->load->view('petugas/footer');
    }
}