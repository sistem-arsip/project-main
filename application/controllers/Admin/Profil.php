<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/Profil_model');
        
        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); 
        }
    }
    function periksa_html($str){
        $clean = strip_tags($str);
        if ($str !== $clean) {
            $this->form_validation->set_message('periksa_html', 'Input tidak boleh mengandung tag HTML.');
            return FALSE;
        }
        return TRUE;
    }
    function inputan_nama($nama_admin){
        if (!preg_match("/^[a-zA-Z0-9 ._-]+$/", $nama_admin)) {
            $this->form_validation->set_message(
                'inputan_nama',
                'Nama tidak boleh mengandung karakter khusus!'
            );
            return FALSE;
        }
        return TRUE;
    }
    function inputan_username($username_admin){
        if (!preg_match("/^[a-zA-Z0-9._-]+$/", $username_admin)) {
            $this->form_validation->set_message(
                'inputan_username',
                'Username tidak boleh mengandung karakter khusus!'
            );
            return FALSE;
        }
        return TRUE;
    }

    function index() {

        $data["profil"] = $this->Profil_model->tampil();
        $this->load->view("admin/header");
        $this->load->view("admin/profil_tampil", $data);
        $this->load->view("admin/footer");
    }
    function cek_username_admin($username_admin){
        $id_admin = $this->session->userdata('id_admin');
        $result = $this->Profil_model->cek_username_admin($username_admin, $id_admin);
        if ($result) {
            $this->form_validation->set_message('cek_username_admin', 'Username sudah digunakan!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function update() {
        $id_admin = $this->session->userdata('id_admin'); 

        $this->form_validation->set_rules("nama_admin", "Nama", "required|trim|callback_periksa_html|callback_inputan_nama");
        $this->form_validation->set_rules("username_admin","Username","required|trim|callback_cek_username_admin|callback_periksa_html|callback_inputan_username");
        $this->form_validation->set_rules("password_admin", "Password", "trim|callback_periksa_html");

        $this->form_validation->set_message("required", "%s wajib diisi");
        if ($this->form_validation->run() == TRUE) {

            $data = [
                "nama_admin" => $this->input->post("nama_admin", TRUE),
                "username_admin" => $this->input->post("username_admin", TRUE),
                "password_admin" => $this->input->post("password_admin", TRUE)
            ];

            // jalankan update
            if ($this->Profil_model->ubah($id_admin, $data)) {

                // perbarui session
                $this->session->set_userdata("nama_admin", $data["nama_admin"]);
                $this->session->set_userdata("username_admin", $data["username_admin"]);

                $this->session->set_flashdata('sukses', 'Profil berhasil diubah');
                redirect("admin/dashboard", 'refresh'); 

            } else {
                $this->session->set_flashdata('gagal', 'Profil gagal diubah');
                redirect("admin/dashboard", 'refresh'); 
            }

        } else {
            
            $data["profil"] = $this->Profil_model->tampil();
            $this->load->view("admin/header");
            $this->load->view("admin/profil_tampil", $data);
            $this->load->view("admin/footer");
        }
    }

    
}
