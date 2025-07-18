<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Auth_model');
    }

    // halaman login
    function login() {
        $this->load->view('login');
    }
    public function periksa_html($str)
    {
        $clean = strip_tags($str);
        if ($str !== $clean) {
            $this->form_validation->set_message('periksa_html', 'Input tidak boleh mengandung tag HTML.');
            return FALSE;
        }
        return TRUE;
    }

    function proses_login(){

        $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_periksa_html', [
            'required' => 'Username wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|callback_periksa_html', [
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
            $nama_session = 'nama_admin';
            $username_session = 'username_admin';
            $redirect_url = 'admin/dashboard'; //  admin/dashboard
        } else {
            $user = $this->Auth_model->check_petugas($username, $password);
            $id_session = 'id_petugas';
            $nama_session = 'nama_petugas';
            $username_session = 'username_petugas';
            $redirect_url = 'petugas/dashboard'; // petugas/dashboard
        }

        if ($user) {
            $this->session->set_userdata([
            $id_session => $user->$id_session,
            $nama_session => $user->$nama_session,
            $username_session => $user->$username_session,
            'status' => $akses . '_login'
        ]);

            $this->session->set_flashdata('login_success', 'Login berhasil, selamat datang, ' . $user->$nama_session . '!');
            redirect($redirect_url);
        } else {
            redirect('auth/login?alert=gagal');
        }
    }

    function logout() {
        //  status login pengguna
         $status = $this->session->userdata('status');

    if ($status == "admin_login") {
        $this->session->unset_userdata('id_admin');
        $this->session->unset_userdata('nama_admin');
        $this->session->unset_userdata('username_admin');
    } elseif ($status == "petugas_login") {
        $this->session->unset_userdata('id_petugas');
        $this->session->unset_userdata('nama_petugas');
        $this->session->unset_userdata('username_petugas');
    }

    $this->session->unset_userdata('status');
    $this->session->set_flashdata('logout_success', 'Anda telah berhasil logout.');

    redirect('auth/login');
    }
}
