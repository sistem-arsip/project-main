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

    function index() {
    $id_petugas = $this->session->userdata('id_petugas');
    $id_unit = $this->Dashboard_model->unit_by_petugas($id_petugas);

    // Data untuk card
    $data['total_arsip_unit'] = $this->Dashboard_model->total_arsip_unit($id_unit);
    $data['total_arsip_saya'] = $this->Dashboard_model->total_arsip_saya($id_petugas);
    $data['total_kategori'] = $this->Dashboard_model->total_kategori();

    // Ambil tahun dari database
    $tahunListResult = $this->Dashboard_model->get_tahun_arsip_unit($id_unit);
    $tahunList = [];
    foreach ($tahunListResult as $row) {
        $tahunList[] = $row->tahun;
    }

    // Siapkan data grafik arsip per tahun
    $arsipData = [];
    foreach ($tahunList as $tahun) {
        $arsipData[$tahun] = $this->Dashboard_model->arsip_per_bulan_per_tahun($id_unit, $tahun);
    }

    // Kirim ke view
    $data['tahunList'] = $tahunList;
    $data['arsipDataPerTahunJson'] = json_encode($arsipData);

    $this->load->view('petugas/header');
    $this->load->view('petugas/dashboard', $data);
    $this->load->view('petugas/footer');
    }





}
