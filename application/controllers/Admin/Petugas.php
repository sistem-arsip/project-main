<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/Petugas_model');
        $this->load->model('admin/Unit_model');
        
        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); 
        }
    }
    function periksa_html($str){
        if ($str === '') return TRUE; // req
        $clean = strip_tags($str);
        if ($str !== $clean) {
            $this->form_validation->set_message(
                'periksa_html',
                'Input tidak boleh mengandung tag HTML.'
            );
            return FALSE;
        }
        return TRUE;
    }
    function inputan_nama($nama_petugas){
        if ($nama_petugas === '') return TRUE; // required

        if (!preg_match("/^[a-zA-Z0-9 ._-]+$/", $nama_petugas)) {
            $this->form_validation->set_message(
                'inputan_nama',
                'Nama petugas tidak boleh mengandung karakter khusus!'
            );
            return FALSE;
        }
        return TRUE;
    }
    function inputan_username($username_petugas){
        if ($username_petugas === '') return TRUE;
        if (!preg_match("/^[a-zA-Z0-9._-]+$/", $username_petugas)) {
            $this->form_validation->set_message(
                'inputan_username',
                'Username petugas tidak boleh mengandung karakter khusus!'
            );
            return FALSE;
        }
        return TRUE;
    }
    function index() {
        $data["petugas"] = $this->Petugas_model->tampil_aktif();
        
        $this->load->view("admin/header");
        $this->load->view("admin/petugas_tampil",$data);
        $this->load->view("admin/footer");
    }

    function tambah(){
        $data['unit'] = $this->Unit_model->tampil_aktif();

        $this->form_validation->set_rules("nama_petugas", "Nama Petugas", "required|trim|callback_periksa_html|callback_inputan_nama");
        $this->form_validation->set_rules("username_petugas", "Username", "required|is_unique[petugas.username_petugas]|trim|callback_periksa_html|callback_inputan_username");
        $this->form_validation->set_rules("password_petugas", "Password", "required|min_length[8]|callback_periksa_html");
        $this->form_validation->set_rules("id_unit", "Unit", "required");

        $this->form_validation->set_message("required", "%s wajib diisi");
        $this->form_validation->set_message("is_unique", "%s sudah digunakan");
        $this->form_validation->set_message("min_length", "%s harus berisi minimal 8 karakter");

        // validasi sukses
        if ($this->form_validation->run() == TRUE) {
            $inputan = $this->input->post();

            // hash password jika diisi
            if (!empty($inputan['password_petugas'])) {
                $inputan['password_petugas'] = md5($inputan['password_petugas']);
            }
            // simpan ke database
            $this->Petugas_model->simpan($inputan);

            $this->session->set_flashdata('sukses', 'Petugas berhasil ditambahkan');
            redirect('admin/petugas', 'refresh');
        }
        $this->load->view("admin/header");
        $this->load->view("admin/petugas_tambah", $data);
        $this->load->view("admin/footer");
    }
    function cek_username($username_petugas, $id_petugas){
        $result = $this->Petugas_model->cek_username($username_petugas, $id_petugas);
        if ($result) {
            $this->form_validation->set_message('cek_username', 'Username sudah digunakan!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function edit($id_petugas){
        $data['petugas'] = $this->Petugas_model->detail($id_petugas);
        $data['unit'] = $this->Unit_model->tampil_aktif();

        $input = $this->input->post();

        if (!empty($input)) {
            $this->form_validation->set_rules("nama_petugas", "Nama Petugas", "required|trim|callback_periksa_html|callback_inputan_nama");
            $this->form_validation->set_rules("username_petugas","Username", "required|trim|callback_periksa_html|callback_cek_username[".$id_petugas."]|callback_inputan_username");
            $this->form_validation->set_rules("password_petugas", "Password", "trim|min_length[8]|callback_periksa_html");

            $this->form_validation->set_message("required", "%s wajib diisi");
            $this->form_validation->set_message("min_length", "%s harus berisi minimal 8 karakter");

            if ($this->form_validation->run() == TRUE) {
                $update_data = [
                    'nama_petugas' => $input['nama_petugas'],
                    'username_petugas' => $input['username_petugas'],
                    'id_unit' => $input['id_unit']
                ];

                // hash password jika diisi
                if (!empty($input['password_petugas'])) {
                    $update_data['password_petugas'] = md5($input['password_petugas']);
                }

                $this->Petugas_model->edit($update_data, $id_petugas);
                // jika update unit
                if ($update_data['id_unit'] != $data['petugas']['id_unit']) {
                    $this->Petugas_model->update_unit($id_petugas, $update_data['id_unit']);
                }

                $this->session->set_flashdata('sukses', 'Petugas berhasil diubah');
                redirect('admin/petugas', 'refresh');
            }
        }

        $this->load->view("admin/header");
        $this->load->view("admin/petugas_edit", $data);
        $this->load->view("admin/footer");
    }

    function nonaktif($id_petugas) {
        $this->Petugas_model->update_status($id_petugas, 'nonaktif');
        $this->session->set_flashdata('sukses', 'Petugas berhasil dinonaktifkan');
        redirect('admin/petugas','refresh');
    }
    function nonaktif_list() {
        $data['petugas_nonaktif'] = $this->Petugas_model->tampil_nonaktif();

        $this->load->view("admin/header");
        $this->load->view("admin/petugas_nonaktif", $data);
        $this->load->view("admin/footer");
    }


    function aktifkan($id_petugas) {
        $this->Petugas_model->update_status($id_petugas, 'aktif');
        $this->session->set_flashdata('sukses', 'Petugas berhasil diaktifkan kembali');
        redirect('admin/petugas','refresh');
    }


    function hapus($id_petugas) {
        $error_code = $this->Petugas_model->hapus($id_petugas);

        if ($error_code == 0) {
            $this->session->set_flashdata('sukses', 'Petugas berhasil dihapus.');
        } else if ($error_code == 1451) {
            $this->session->set_flashdata('gagal', 'Tidak dapat menghapus karena petugas masih digunakan di data lain.');
        } else {
            $this->session->set_flashdata('gagal', 'Terjadi kesalahan saat menghapus data.');
        }

        redirect('admin/petugas', 'refresh');
    }

}
