<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/Unit_model');
        
        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }
    }

    function index() {

        $data["unit"] = $this->Unit_model->tampil();
        $this->load->view("admin/header");
        $this->load->view("admin/unit_tampil", $data);
        $this->load->view("admin/footer");
    }

    function tambah(){

        $inputan = $this->input->post();

        //jika ada inputan
		if (!empty($inputan)) {
			
			//jalankan fungsi simpan()
			$this->Unit_model->tambah($inputan);

			//redirect 
            $this->session->set_flashdata('sukses', 'Unit berhasil ditambahkan');
			redirect('admin/unit', 'refresh');
		}
        
        $this->load->view("admin/header");
        $this->load->view("admin/unit_tambah");
        $this->load->view("admin/footer");
    }

    function edit($id_unit){

        $data['unit'] = $this->Unit_model->detail($id_unit);

        $input = $this->input->post();

        //jika ada inputan
		if (!empty($input)) {
			
			//jalankan fungsi simpan()
			$this->Unit_model->edit($input,$id_unit);

			//redirect ke fitur kategori untuk tampil kategori
            $this->session->set_flashdata('sukses', 'Unit berhasil diubah');
			redirect('admin/unit', 'refresh');
		}
        $this->load->view("admin/header");
        $this->load->view("admin/unit_edit",$data);
        $this->load->view("admin/footer");
    }

    function hapus($id_unit) {

		//jalankan fungsi hapus()
		$this->Unit_model->hapus($id_unit);

		//redirect ke kategori 
        $this->session->set_flashdata('sukses', 'Unit berhasil dihapus');
		redirect('admin/unit', 'refresh');
	}
}
