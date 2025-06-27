<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('petugas/Notifikasi_model');
        
        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'petugas_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }
    }

    function baca_notif($id_notifikasi){
        $this->Notifikasi_model->baca_notif($id_notifikasi);
        echo json_encode(['status' => 'success']);
    }
    
    function baca_semua(){
        $id_petugas = $this->session->userdata('id_petugas');
        $this->Notifikasi_model->baca_semua($id_petugas);
        echo json_encode(['status' => 'success']);
    }
}