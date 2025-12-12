<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('admin/Kategori_model');

        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
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

    function index(){
        $data["kategori"] = $this->Kategori_model->tampil_aktif();
        $data["kategori_nonaktif"] = $this->Kategori_model->tampil_nonaktif();

        $this->load->view("admin/header");
        $this->load->view("admin/kategori_tampil", $data);
        $this->load->view("admin/footer");
    }
    
    function tambah(){

        $inputan = $this->input->post();
        $this->form_validation->set_rules("nama_kategori","Nama Kategori","required|is_unique[kategori.nama_kategori]|trim|callback_periksa_html");
        $this->form_validation->set_rules("keterangan_kategori","Keterangan ","required|trim|callback_periksa_html");
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

    function cek_nama_kategori($nama_kategori, $id_kategori){
        $result = $this->Kategori_model->cek_nama_kategori($nama_kategori, $id_kategori);
        if ($result) {
            $this->form_validation->set_message('cek_nama_kategori', 'Nama Kategori yang sama sudah ada!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function edit($id_kategori){
        $data['kategori'] = $this->Kategori_model->detail($id_kategori);

        $input = $this->input->post();

        if (!empty($input)) {
            $this->form_validation->set_rules('nama_kategori','Nama Kategori','required|trim|callback_cek_nama_kategori['.$id_kategori.']|callback_periksa_html');
            $this->form_validation->set_rules('keterangan_kategori','Keterangan','required|trim|callback_periksa_html');
            $this->form_validation->set_message("required", " %s wajib diisi!");

            if ($this->form_validation->run() == TRUE) {
                $this->Kategori_model->edit($input, $id_kategori);

                $this->session->set_flashdata('sukses', 'Kategori berhasil diubah');
                redirect('admin/kategori', 'refresh');
            }
        }

        $this->load->view("admin/header");
        $this->load->view("admin/kategori_edit", $data);
        $this->load->view("admin/footer");
    }

    function nonaktif($id_kategori) {
        $this->Kategori_model->update_status($id_kategori, 'nonaktif');
        $this->session->set_flashdata('sukses', 'Kategori berhasil dinonaktifkan');
        redirect('admin/kategori','refresh');
    }
    function nonaktif_list() {
    $this->load->model('admin/Kategori_model');

    $data['kategori_nonaktif'] = $this->Kategori_model->tampil_nonaktif();

    $this->load->view("admin/header");
    $this->load->view("admin/kategori_nonaktif", $data);  // HALAMAN BARU
    $this->load->view("admin/footer");
}


    function aktifkan($id_kategori) {
        $this->Kategori_model->update_status($id_kategori, 'aktif');
        $this->session->set_flashdata('sukses', 'Kategori berhasil diaktifkan kembali');
        redirect('admin/kategori','refresh');
    }

    function hapus($id_kategori){

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
