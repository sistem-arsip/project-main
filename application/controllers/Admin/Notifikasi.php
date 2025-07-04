<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Notifikasi_model');
        
        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); 
        }
    }

    // fungsi notif
    function baca_notif($id_notif_admin) {
        $notif = $this->Notifikasi_model->get_notifikasi_by_id($id_notif_admin);

        if ($notif) {
            $this->Notifikasi_model->tandaiBaca($id_notif_admin);
            redirect('admin/pengajuan_kategori?id_pengajuan=' . $notif['id_pengajuan']);
        } else {
            redirect('admin/pengajuan_kategori');
        }
    }

    function baca_semua() {
        $this->Notifikasi_model->baca_semua();

        if ($this->input->is_ajax_request()) {
            // dipanggil via AJAX
            echo json_encode(['status' => 'success']);
        }
    }
}