<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/Petugas_model');
        $this->load->model('admin/Unit_model');
        
        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }
    }

    function index() {

        $data["petugas"] = $this->Petugas_model->tampil();
        $this->load->view("admin/header");
        $this->load->view("admin/petugas_tampil",$data);
        $this->load->view("admin/footer");
    }

    function tambah()
    {
        $data['unit'] = $this->Unit_model->tampil();

        // Aturan validasi
        $this->form_validation->set_rules("nama_petugas", "Nama Petugas", "required");
        $this->form_validation->set_rules("username_petugas", "Username", "required|is_unique[petugas.username_petugas]");
        $this->form_validation->set_rules("password_petugas", "Password", "required");
        $this->form_validation->set_rules("id_unit", "Unit", "required");

        // Pesan error
        $this->form_validation->set_message("required", "%s wajib diisi");
        $this->form_validation->set_message("is_unique", "%s sudah digunakan");

        // Jika validasi sukses
        if ($this->form_validation->run() == TRUE) {
            $inputan = $this->input->post();

            // Hash password jika diisi
            if (!empty($inputan['password_petugas'])) {
                $inputan['password_petugas'] = md5($inputan['password_petugas']);
            }

            // Simpan ke database
            $this->Petugas_model->simpan($inputan);

            // Tampilkan notifikasi sukses dan redirect
            $this->session->set_flashdata('sukses', 'Petugas berhasil ditambahkan');
            redirect('admin/petugas', 'refresh');
        }

        // Jika validasi gagal atau form belum disubmit
        $this->load->view("admin/header");
        $this->load->view("admin/petugas_tambah", $data);
        $this->load->view("admin/footer");
    }

    function edit($id_petugas){

        $data['petugas'] = $this->Petugas_model->detail($id_petugas);
        $data['unit'] = $this->Unit_model->tampil();

        $input = $this->input->post();

            // Jika ada inputan dari form
    if (!empty($input)) {
        // Simpan data yang diperbarui
        $update_data = [
            'nama_petugas' => $input['nama_petugas'],
            'username_petugas' => $input['username_petugas'],
            'id_unit' => $input['id_unit']
        ];

        // Jika password diisi, hash dengan MD5 dan update
        if (!empty($input['password_petugas'])) {
            $update_data['password_petugas'] = md5($input['password_petugas']);
        }

        // Jalankan update
        $this->Petugas_model->edit($update_data, $id_petugas);

        // Redirect ke halaman petugas
        $this->session->set_flashdata('sukses', 'Petugas berhasil diubah');
        redirect('admin/petugas', 'refresh');
    }
    
        $this->load->view("admin/header");
        $this->load->view("admin/petugas_edit",$data);
        $this->load->view("admin/footer");
    }

    function hapus($id_petugas) {

		//jalankan fungsi hapus()
		$this->Petugas_model->hapus($id_petugas);

		//redirect 
        $this->session->set_flashdata('sukses', 'Petugas berhasil dihapus');
		redirect('admin/petugas', 'refresh');
	}
}
