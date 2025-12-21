<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/Unit_model');
        
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

    function index() {
        $data["unit"] = $this->Unit_model->tampil_aktif();

        $this->load->view("admin/header");
        $this->load->view("admin/unit_tampil", $data);
        $this->load->view("admin/footer");
    }

    function tambah(){
        $this->form_validation->set_rules("nama_unit", "Nama Unit", "required|is_unique[unit.nama_unit]|trim|callback_periksa_html");
        $this->form_validation->set_rules("keterangan_unit", "Keterangan", "required|trim|callback_periksa_html");

        $this->form_validation->set_message("required", "%s wajib diisi");
        $this->form_validation->set_message("is_unique", "%s sudah digunakan");

        // validasi sukses
        if ($this->form_validation->run() == TRUE) {
            $inputan = $this->input->post();

            // simpan database
            $this->Unit_model->tambah($inputan);

            $this->session->set_flashdata('sukses', 'Unit berhasil ditambahkan');
            redirect('admin/unit', 'refresh');
        }

        $this->load->view("admin/header");
        $this->load->view("admin/unit_tambah");
        $this->load->view("admin/footer");
    }
    function cek_nama_unit($nama_unit, $id_unit){
        $result = $this->Unit_model->cek_nama_unit($nama_unit, $id_unit);
        if ($result) {
            $this->form_validation->set_message('cek_nama_unit', 'Nama Unit yang sama sudah ada!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function edit($id_unit){
        $data['unit'] = $this->Unit_model->detail($id_unit);

        $input = $this->input->post();

        if (!empty($input)) {
            $this->form_validation->set_rules('nama_unit','Nama Unit','required|trim|callback_cek_nama_unit['.$id_unit.']|callback_periksa_html');
            $this->form_validation->set_rules('keterangan_unit','Keterangan','required|trim|callback_periksa_html');

            $this->form_validation->set_message('required', '%s wajib diisi');

            if ($this->form_validation->run() == TRUE) {
                $this->Unit_model->edit($input, $id_unit);

                $this->session->set_flashdata('sukses', 'Unit berhasil diubah');
                redirect('admin/unit', 'refresh');
            }
        }

        $this->load->view("admin/header");
        $this->load->view("admin/unit_edit", $data);
        $this->load->view("admin/footer");
    }

    function nonaktif($id_unit) {
        $this->Unit_model->update_status($id_unit, 'nonaktif');
        $this->session->set_flashdata('sukses', 'Unit berhasil dinonaktifkan');
        redirect('admin/unit','refresh');
    }
    function nonaktif_list() {
        $this->load->model('admin/Unit_model');
        $data["unit_nonaktif"] = $this->Unit_model->tampil_nonaktif();

        $this->load->view("admin/header");
        $this->load->view("admin/unit_nonaktif", $data);
        $this->load->view("admin/footer");
    }


    function aktifkan($id_unit) {
        $this->Unit_model->update_status($id_unit, 'aktif');
        $this->session->set_flashdata('sukses', 'Unit berhasil diaktifkan kembali');
        redirect('admin/unit','refresh');
    }

    function hapus($id_unit) {
        $error_code = $this->Unit_model->hapus($id_unit);

        if ($error_code == 0) {
            $this->session->set_flashdata('sukses', 'Unit berhasil dihapus.');
        } else if ($error_code == 1451) {
            $this->session->set_flashdata('gagal', 'Tidak dapat menghapus karena unit masih digunakan di data lain.');
        } else {
            $this->session->set_flashdata('gagal', 'Terjadi kesalahan saat menghapus unit.');
        }

        redirect('admin/unit', 'refresh');
    }

}
