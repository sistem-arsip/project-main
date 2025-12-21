<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Arsip_model');
        $this->load->model('admin/Kategori_model');
        
        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); 
        }
    }

    function index() {
        $unit_list = $this->Arsip_model->tampil_by_unit();

        // jumlah arsip per unit
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


    function all_arsip(){
        $id_kategori = $this->input->get('kategori');
        $bulan       = $this->input->get('bulan');
    
        $data['arsip'] = $this->Arsip_model
            ->tampil($id_kategori, $bulan);
    
        $data['kategori'] = $this->Kategori_model->tampil();
    
        // kirim filter aktif ke view
        $data['kategori_aktif'] = $id_kategori;
        $data['bulan_aktif']   = $bulan;
    
        $this->load->view('admin/header');
        $this->load->view('admin/arsip_semua', $data);
        $this->load->view('admin/footer');
    }


    function arsip_perunit($id_unit){
        $id_kategori = $this->input->get('kategori'); 
        $bulan       = $this->input->get('bulan');   
    
        $data['arsip'] = $this->Arsip_model->get_arsip_by_unit($id_unit, $id_kategori, $bulan);
    
        $data['unit'] = $this->Arsip_model->get_unit_by_id($id_unit);
        $data['kategori'] = $this->Kategori_model->tampil();
    
        // kirim filter aktif ke view
        $data['kategori_aktif'] = $id_kategori;
        $data['bulan_aktif']   = $bulan;
    
        $this->load->view('admin/header');
        $this->load->view('admin/arsip_perunit', $data);
        $this->load->view('admin/footer');
    }



}
