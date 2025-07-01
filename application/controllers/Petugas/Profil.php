<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('petugas/Profil_model');
        
        // Pastikan user sudah login
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'petugas_login') {
            redirect('auth/login', 'refresh'); 
        }
    }

    function index() {

        $data["profil"] = $this->Profil_model->tampil();
        $this->load->view("petugas/header");
        $this->load->view("petugas/profil_tampil", $data);
        $this->load->view("petugas/footer");
    }
    public function periksa_html($str){
        $clean = strip_tags($str);
        if ($str !== $clean) {
            $this->form_validation->set_message('periksa_html', 'Input tidak boleh mengandung tag HTML.');
            return FALSE;
        }
        return TRUE;
    }
    function cek_username_petugas($username_admin){
        $id_admin = $this->session->userdata('id_admin');
        $result = $this->Profil_model->cek_username_petugas($username_admin, $id_admin);
        if ($result) {
            $this->form_validation->set_message('cek_username_petugas', 'Username sudah digunakan!');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    function update() {
        $id_petugas = $this->session->userdata('id_petugas'); 

        $this->form_validation->set_rules("nama_petugas", "Nama", "required|trim|callback_periksa_html");
        $this->form_validation->set_rules("username_petugas","Username","required|trim|callback_cek_username_petugas|callback_periksa_html");
        $this->form_validation->set_rules("password_petugas", "Password", "trim|callback_periksa_html");

        $this->form_validation->set_message("required", "%s wajib diisi");

        if ($this->form_validation->run() == TRUE) {

            $data = [
                "nama_petugas" => $this->input->post("nama_petugas", TRUE),
                "username_petugas" => $this->input->post("username_petugas", TRUE),
                "password_petugas" => $this->input->post("password_petugas", TRUE)
            ];

            if ($this->Profil_model->ubah($id_petugas, $data)) {
                // Update session
                $this->session->set_userdata("nama_petugas", $data["nama_petugas"]);
                $this->session->set_userdata("username_petugas", $data["username_petugas"]);

                $this->session->set_flashdata('sukses', 'Profil berhasil diubah');
                redirect("petugas/dashboard");
            } else {
                $this->session->set_flashdata('gagal', 'Profil gagal diubah');
                redirect("petugas/dashboard");
            }

        } else {
            $data["profil"] = $this->Profil_model->tampil();
            $this->load->view("petugas/header");
            $this->load->view("petugas/profil_tampil", $data);
            $this->load->view("petugas/footer");
        }
    }

}
