<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('petugas/Kategori_model');
        
        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'petugas_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }
    }

    function index() {

        $data["kategori"] = $this->Kategori_model->tampil();
        $this->load->view("petugas/header");
        $this->load->view("petugas/kategori_tampil",$data);
        $this->load->view("petugas/footer");
    }


    function tambah(){
    $inputan = $this->input->post();

        if (!empty($inputan)) {
            $id_petugas = $this->session->userdata('id');
            $id_unit = $this->Kategori_model->unit_by_petugas($id_petugas); 

            $data = [
                'nama_pengajuan' => $inputan['nama_kategori'],
                'keterangan_pengajuan' => $inputan['keterangan_kategori'],
                'status_pengajuan' => 'pending', // Default
                'id_petugas' => $id_petugas,
                'id_unit' => $id_unit
            ];

            $this->Kategori_model->simpan($data); 

            $this->session->set_flashdata('sukses', 'Kategori berhasil diajukan');
            redirect('petugas/kategori', 'refresh');
        }

        $this->load->view("petugas/header");
        $this->load->view("petugas/kategori_tambah");
        $this->load->view("petugas/footer");
    }
}
