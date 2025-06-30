<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include 'vendor/autoload.php';
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
class Riwayat extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'petugas_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }

        //load model
        $this->load->model('petugas/Riwayat_model');
        $this->load->model('petugas/Kategori_model');
    }

    function index() {
        $id_petugas = $this->session->userdata('id_petugas'); 

        $data['riwayat'] = $this->Riwayat_model->tampil_by_petugas($id_petugas);
        $this->load->view("petugas/header");
        $this->load->view("petugas/riwayat_tampil",$data);
        $this->load->view("petugas/footer");
    }

    function detail($id_arsip){
        $data["riwayat"] = $this->Riwayat_model->detail($id_arsip);

        $this->load->view("petugas/header");
        $this->load->view("petugas/riwayat_detail",$data);
        $this->load->view("petugas/footer");
    }

    function edit($id_arsip) {
        $data["arsip"] = $this->Riwayat_model->detail_ubah($id_arsip);
        $data["kategori"] = $this->Kategori_model->tampil();
        $inputan = $this->input->post();
    
        if (!empty($inputan)) {
            // Tambahkan data tetap
            $inputan['id_petugas'] = $this->session->userdata('id_petugas');
            $inputan['id_unit'] = $this->Riwayat_model->unit_by_petugas($this->session->userdata('id_petugas'));
    
            // Proses upload file jika ada
            if (!empty($_FILES['file']['name'])) {
                $config['upload_path']   = './assets/arsip/';
                $config['allowed_types'] = 'pdf|doc|docx|jpg|png';
                $config['max_size']      = 10000;
    
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('file')) {
                    $inputan['file_arsip'] = $this->upload->data('file_name');
                }
            }
    
            // Jalankan update data
            $this->Riwayat_model->ubah($id_arsip, $inputan);
    
            $this->session->set_flashdata('sukses', 'Riwayat Arsip berhasil diubah');
            redirect('petugas/riwayat', 'refresh');
        }
    
    
        $this->load->view('petugas/header');
        $this->load->view('petugas/riwayat_edit', $data);
        $this->load->view('petugas/footer');
    }

    function hapus($id_arsip){

        //jalankan fungsi hapus()
        $this->Riwayat_model->hapus($id_arsip);

        //redirect ke kategori 
        $this->session->set_flashdata('sukses', 'Riwayat Arsip berhasil dihapus');
        redirect('petugas/riwayat', 'refresh');
    }
}
