<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    // Halaman dashboard
    function index() {
        // model kategori
        $this->load->model('petugas/Kategori_model');

        //data
        $data['total_kategori'] = $this->Kategori_model->total_kategori();
        // Menampilkan halaman dashboard
        $this->load->view('petugas/header');
        $this->load->view('petugas/dashboard', $data);
        $this->load->view('petugas/footer');
    }
}