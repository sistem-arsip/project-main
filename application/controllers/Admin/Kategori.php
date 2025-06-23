<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('admin/Kategori_model');

        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }
    }

    function index(){

        $data["kategori"] = $this->Kategori_model->tampil();
        $this->load->view("admin/header");
        $this->load->view("admin/kategori_tampil", $data);
        $this->load->view("admin/footer");
    }
    
    function tambah(){

        $inputan = $this->input->post();
        $this->form_validation->set_rules("nama_kategori","Nama Kategori","required|is_unique[kategori.nama_kategori]");
        $this->form_validation->set_rules("keterangan_kategori","Keterangan ","required");
        $this->form_validation->set_message("required"," %s wajib diisi");
        $this->form_validation->set_message("is_unique", "%s yang sama sudah ada");

        //jika ada inputan
        if ($this->form_validation->run() == TRUE) {

            //jalankan fungsi simpan()
            $this->Kategori_model->simpan($inputan);

            //redirect 
            $this->session->set_flashdata('sukses', 'Kategori berhasil ditambahkan');
            redirect('admin/kategori', 'refresh');
        }

        $this->load->view("admin/header");
        $this->load->view("admin/kategori_tambah");
        $this->load->view("admin/footer");
    }

    function edit($id_kategori){

        $data['kategori'] = $this->Kategori_model->detail($id_kategori);

        $input = $this->input->post();

        //jika ada inputan
        if (!empty($input)) {

            //jalankan fungsi simpan()
            $this->Kategori_model->edit($input, $id_kategori);

            //redirect ke fitur kategori untuk tampil kategori
            $this->session->set_flashdata('sukses', 'Kategori berhasil diubah');
            redirect('admin/kategori', 'refresh');
        }
        $this->load->view("admin/header");
        $this->load->view("admin/kategori_edit", $data);
        $this->load->view("admin/footer");
    }

    function hapus($id_kategori){

        //jalankan fungsi hapus()
        $error_code = $this->Kategori_model->hapus($id_kategori);

        if ($error_code == 0) {
            $this->session->set_flashdata('sukses', 'Kategori berhasil dihapus.');
        } else if ($error_code == 1451) {
            $this->session->set_flashdata('gagal', 'Tidak dapat menghapus karena kategori masih digunakan di data lain.');
        } else {
            $this->session->set_flashdata('gagal', 'Terjadi kesalahan saat menghapus data.');
        }

        redirect('admin/kategori', 'refresh');
    }
}
