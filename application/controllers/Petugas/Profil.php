<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('petugas/Profil_model');
        
        // Pastikan user sudah login sebagai petugas
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'petugas_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }
    }

    function index() {

        $data["profil"] = $this->Profil_model->tampil();
        $this->load->view("petugas/header");
        $this->load->view("petugas/profil_tampil", $data);
        $this->load->view("petugas/footer");
    }

    function update() {
        $id_petugas = $this->session->userdata('id'); // Ambil ID petugas yang sedang login

        // Ambil data dari form
        $data = [
            "nama_petugas" => $this->input->post("nama_petugas", TRUE),
            "username_petugas" => $this->input->post("username_petugas", TRUE),
            "password_petugas" => $this->input->post("password_petugas", TRUE)
        ];

        // Lakukan update melalui model
        if ($this->Profil_model->ubah($id_petugas, $data)) {
            // Update session dengan data baru
            $this->session->set_userdata("nama", $data["nama_petugas"]);
            $this->session->set_userdata("username", $data["username_petugas"]);

            $this->session->set_flashdata('sukses', 'Profil berhasil diubah');
            redirect("petugas/dashboard"); // Kembali ke halaman profil setelah update
        } else {
            echo "Gagal memperbarui data"; // Bisa diganti dengan notifikasi atau log
        }
    }
}
