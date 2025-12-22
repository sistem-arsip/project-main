<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Laporan_model');
        $this->load->library('pdf');

        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); 
        }
    }
    function bulanan($bulan, $tahun){
        $data = $this->Laporan_model->get_laporan_bulanan($bulan, $tahun);
        $nama_file = 'Laporan Bulanan - Bulan '.$data['periode'].'.pdf';
        $this->pdf->load_view('admin/laporan_pdf', $data, $nama_file);
    }

    function tahunan($tahun){
        $data = $this->Laporan_model->get_laporan_tahunan($tahun);
        $nama_file = 'Laporan Tahunan - Tahun '.$tahun.'.pdf';
        $this->pdf->load_view('admin/laporan_pdf', $data, $nama_file);
    }

}
