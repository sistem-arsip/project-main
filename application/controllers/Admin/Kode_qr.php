<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kode_qr extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Kode_qr_model');

        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh');
        }
    }

    function index() {
        $unit_list = $this->Kode_qr_model->tampil_by_unit();

        // jumlah arsip per unit
        foreach ($unit_list as &$unit) {
            $unit['jumlah_qr'] = $this->Kode_qr_model->jumlah_qr_perunit($unit['id_unit']);
        }

        $data["qr_unit"] = $unit_list;

        $this->load->view("admin/header");
        $this->load->view("admin/qr_tampil", $data);
        $this->load->view("admin/footer");
    }

    function qr_perunit($id_unit) {
        $data['unit'] = $this->Kode_qr_model->get_unit_by_id($id_unit);
        $data['data_qr'] = $this->Kode_qr_model->get_qr_by_unit($id_unit);

        $this->load->view('admin/header');
        $this->load->view('admin/qr_perunit', $data);
        $this->load->view('admin/footer');
    }
    function detail($kode_qr) {
        $data['qr'] = $this->Kode_qr_model->qr_by_kode($kode_qr);

        if (!$data['qr']) {
            show_404();
        }

        $data['id_unit'] = $data['qr']['id_unit'];

        $this->load->view('admin/header');
        $this->load->view('admin/qr_detail', $data);
        $this->load->view('admin/footer');
    }

}