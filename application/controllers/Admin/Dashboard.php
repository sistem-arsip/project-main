<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    // Halaman dashboard
    function index() {
        // model kategori
        $this->load->model('admin/Kategori_model');

        // model unit
        $this->load->model('admin/Unit_model');

        // data
        $data['total_unit'] = $this->Unit_model->total_unit();
        $data['total_kategori'] = $this->Kategori_model->total_kategori();
        // Menampilkan halaman dashboard
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
    }
}