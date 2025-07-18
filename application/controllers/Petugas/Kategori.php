<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('petugas/Kategori_model');
        
        // Pastikan user sudah login
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'petugas_login') {
            redirect('auth/login', 'refresh'); 
        }
    }
    public function periksa_html($str){
        $clean = strip_tags($str);
        if ($str !== $clean) {
            $this->form_validation->set_message('periksa_html', 'Input tidak boleh mengandung tag HTML.');
            return FALSE;
        }
        return TRUE;
    }

    function index() {

        $data["kategori"] = $this->Kategori_model->tampil();
        $this->load->view("petugas/header");
        $this->load->view("petugas/kategori_tampil",$data);
        $this->load->view("petugas/footer");
    }


    function tambah(){
        $inputan = $this->input->post();

        $this->form_validation->set_rules("nama_kategori","Nama Kategori","required|is_unique[kategori.nama_kategori]|trim|callback_periksa_html");
        $this->form_validation->set_rules("keterangan_kategori","Keterangan ","required|trim|callback_periksa_html");
        $this->form_validation->set_message("required"," %s wajib diisi");
        $this->form_validation->set_message("is_unique", "%s yang sama sudah ada");

        if ($this->form_validation->run() == TRUE) {
            $id_petugas = $this->session->userdata('id_petugas');
            $id_unit = $this->Kategori_model->unit_by_petugas($id_petugas); 

            $data = [
                'nama_pengajuan' => $inputan['nama_kategori'],
                'keterangan_pengajuan' => $inputan['keterangan_kategori'],
                'status_pengajuan' => 'pending', // default
                'id_petugas' => $id_petugas,
                'id_unit' => $id_unit
            ];

            $this->Kategori_model->simpan($data); 

            $this->session->set_flashdata('sukses', 'Kategori berhasil diajukan');
            redirect('petugas/pengajuan_kategori', 'refresh');
        }

        $this->load->view("petugas/header");
        $this->load->view("petugas/kategori_tambah");
        $this->load->view("petugas/footer");
    }
}
