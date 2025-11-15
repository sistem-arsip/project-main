<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('admin/Dashboard_model');
        
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); 
        }
    }
    function index() {
        $units = $this->Dashboard_model->tampil_unit();
        $data_chart = [];
        foreach ($units as $unit) {
            $jumlah = $this->Dashboard_model->jumlah_arsip_perunit($unit['id_unit']);
            $data_chart[] = [
                'unit' => $unit['nama_unit'],  
                'jumlah' => $jumlah
            ];
        }
        $data['data_arsip_per_unit'] = $data_chart;

        $data['total_petugas']  = $this->Dashboard_model->total_petugas();
        $data['total_unit']     = $this->Dashboard_model->total_unit();
        $data['total_arsip']    = $this->Dashboard_model->total_arsip();
        $data['total_kategori'] = $this->Dashboard_model->total_kategori();

        $this->load->view('admin/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
    }
}
