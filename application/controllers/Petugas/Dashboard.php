<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('petugas/Dashboard_model');

        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'petugas_login') {
            redirect('auth/login', 'refresh');
        }
    }

    function index(){
        $id_petugas = $this->session->userdata('id_petugas');
        $id_unit = $this->Dashboard_model->unit_by_petugas($id_petugas);

        // arsip unit
        $data['total_arsip_unit'] = $this->Dashboard_model->total_arsip_unit($id_unit);
        // arsip saya
        $data['total_arsip_saya'] = $this->Dashboard_model->total_arsip_saya($id_petugas);
        // total kategori
        $data['total_kategori'] = $this->Dashboard_model->total_kategori();

        $this->load->view('petugas/header');
        $this->load->view('petugas/dashboard', $data);
        $this->load->view('petugas/footer');
    }
}
