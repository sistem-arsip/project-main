<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/Profil_model');
        
        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }
    }

    function index() {

        $data["profil"] = $this->Profil_model->tampil();
        $this->load->view("admin/header");
        $this->load->view("admin/profil_tampil", $data);
        $this->load->view("admin/footer");
    }

    function update() {
        $id_admin = $this->session->userdata('id'); // Ambil ID admin yang sedang login

        // Ambil data dari form
        $data = [
            "admin_nama" => $this->input->post("admin_nama", TRUE),
            "admin_username" => $this->input->post("admin_username", TRUE),
            "admin_password" => $this->input->post("admin_password", TRUE)
        ];

        // Lakukan update melalui model
        if ($this->Profil_model->ubah($id_admin, $data)) {
            // Update session dengan data baru
            $this->session->set_userdata("nama", $data["admin_nama"]);
            $this->session->set_userdata("username", $data["admin_username"]);

            $this->session->set_flashdata('sukses', 'Profil berhasil diubah');
            redirect("admin/dashboard", 'refresh'); // Kembali ke halaman profil setelah update
        } else {
            echo "Gagal memperbarui data"; // Bisa diganti dengan notifikasi atau log
        }
    }
    
}
