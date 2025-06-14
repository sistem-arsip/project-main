<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Auth_model');
    }

    // Halaman login
    function login() {
        $this->load->view('login');
    }

    function proses_login(){

        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password wajib diisi!'
        ]);
        $this->form_validation->set_rules('akses', 'Role', 'required', [
            'required' => 'Silakan pilih role terlebih dahulu!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
            return;
        }
        
        $username = $this->input->post('username', TRUE);
        $password = md5($this->input->post('password', TRUE));
        $akses = $this->input->post('akses', TRUE);


        if ($akses == "admin") {
            $user = $this->Auth_model->check_admin($username, $password);
            $id_session = 'id_admin';
            $nama_session = 'admin_nama';
            $username_session = 'admin_username';
            $redirect_url = 'admin/dashboard'; // Ubah arah ke admin/dashboard
        } else {
            $user = $this->Auth_model->check_petugas($username, $password);
            $id_session = 'id_petugas';
            $nama_session = 'nama_petugas';
            $username_session = 'username_petugas';
            $redirect_url = 'petugas/dashboard'; // Ubah arah ke petugas/dashboard
        }

        if ($user) {
            $this->session->set_userdata([
                'id' => $user->$id_session,
                'nama' => $user->$nama_session,
                'username' => $user->$username_session,
                'status' => $akses . '_login'
            ]);

            $this->session->set_flashdata('login_success', 'Login berhasil, selamat datang!');
            redirect($redirect_url);
        } else {
            redirect('auth/login?alert=gagal');
        }
    }

    function logout() {
        // Cek status login pengguna
        $status = $this->session->userdata('status');

        if ($status == "admin_login" || $status == "petugas_login") {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('nama');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('status');
        }

        $this->session->set_flashdata('logout_success', 'Anda telah logout.');
        redirect('auth/login');
    }
}
