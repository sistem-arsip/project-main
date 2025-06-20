<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_kategori extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/Pengajuan_kategori_model');
        
        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }
    }
    function index(){
        $data["pengajuan"] = $this->Pengajuan_kategori_model->tampil();
        $this->load->view("admin/header");
        $this->load->view("admin/pengajuan_kategori",$data);
        $this->load->view("admin/footer");
    }

    function terima($id_pengajuan) {
        // get data pengajuan
        $pengajuan = $this->Pengajuan_kategori_model->get_pengajuan_by_id($id_pengajuan);

        if ($pengajuan) {
            $data_kategori = [
                'nama_kategori' => $pengajuan['nama_pengajuan'],
                'keterangan_kategori' => $pengajuan['keterangan_pengajuan']
            ];

            // insert dan update status
            $this->Pengajuan_kategori_model->insert_kategori($data_kategori);
            $this->Pengajuan_kategori_model->terima_status_pengajuan($id_pengajuan, 'accepted');

            $this->session->set_flashdata('sukses', 'Pengajuan berhasil diterima dan dimasukkan ke kategori.');
        } 

        redirect('admin/pengajuan_kategori', 'refresh');
    }

    function tolak(){
        $id_pengajuan = $this->input->post("id_pengajuan");
        $alasan = $this->input->post("alasan");
        // update status pengajuan
        $this->Pengajuan_kategori_model->tolak_status_pengajuan($id_pengajuan, $alasan, 'rejected');

        $this->session->set_flashdata('sukses', 'Pengajuan kategori berhasil ditolak.');

        redirect('admin/pengajuan_kategori', 'refresh');
    }
}
