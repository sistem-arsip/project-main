<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include 'vendor/autoload.php';
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
class Arsip extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Arsip_model');
        
        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }
    }

    function index() {

        $data["arsip"] = $this->Arsip_model->tampil();
        $this->load->view("admin/header");
        $this->load->view("admin/arsip_tampil",$data);
        $this->load->view("admin/footer");
    }

    function detail($id_arsip){
        $data["arsip"] = $this->Arsip_model->detail($id_arsip);

        // Konfigurasi QR Code
        $options = new QROptions([
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel' => QRCode::ECC_L,
        ]);

        $isi = base_url("arsip/cek/".$data['arsip']['unik_arsip']);
        $data['qrcode'] =  (new QRCode($options))->render($isi);


        $this->load->view("admin/header");
        $this->load->view("admin/arsip_detail",$data);
        $this->load->view("admin/footer");
    }

    function hapus($id_arsip)
    {

        //jalankan fungsi hapus()
        $this->Arsip_model->hapus($id_arsip);

        //redirect ke kategori 
        $this->session->set_flashdata('sukses', 'Arsip berhasil dihapus');
        redirect('admin/arsip', 'refresh');
    }

}
