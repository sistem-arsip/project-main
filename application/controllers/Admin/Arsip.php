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
            redirect('auth/login', 'refresh'); 
        }
    }

    function index() {
        $unit_list = $this->Arsip_model->tampil_by_unit();

        // Tambahkan jumlah arsip per unit
        foreach ($unit_list as &$unit) {
            $unit['jumlah_arsip'] = $this->Arsip_model->jumlah_arsip_perunit($unit['id_unit']);
        }

        $data["unit_arsip"] = $unit_list;

        $this->load->view("admin/header");
        $this->load->view("admin/arsip_tampil", $data);
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

    function hapus($id_arsip){
        $this->Arsip_model->hapus($id_arsip);
        $this->session->set_flashdata('sukses', 'Arsip berhasil dihapus');

        //  redirect dari query string
        $redirect = $this->input->get('redirect');

        // default ke 'admin/arsip'
        if (!$redirect) {
            $redirect = 'admin/arsip';
        }
        redirect($redirect, 'refresh');
    }


    function all_arsip() {
        $data["arsip"] = $this->Arsip_model->tampil();
        $this->load->view("admin/header");
        $this->load->view("admin/arsip_semua",$data);
        $this->load->view("admin/footer");
    }

    function arsip_perunit($id_unit) {
        $data['arsip'] = $this->Arsip_model->get_arsip_by_unit($id_unit);
        $data['unit'] = $this->Arsip_model->get_unit_by_id($id_unit);

        $this->load->view('admin/header');
        $this->load->view('admin/arsip_perunit', $data);
        $this->load->view('admin/footer');
    }

}
