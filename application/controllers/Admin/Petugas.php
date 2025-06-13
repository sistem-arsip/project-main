<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('admin/Petugas_model');
        $this->load->model('admin/Unit_model');
        
        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }
    }

    function index() {

        $data["petugas"] = $this->Petugas_model->tampil();
        $this->load->view("admin/header");
        $this->load->view("admin/petugas_tampil",$data);
        $this->load->view("admin/footer");
    }

    function tambah(){

        $data['unit'] = $this->Unit_model->tampil();

        // tambah 
        $inputan = $this->input->post();

        //jika ada inputan
		if (!empty($inputan)) {

            // hash
            if (!empty($inputan['password_petugas'])) {
                $inputan['password_petugas'] = md5($inputan['password_petugas']);
            }
			
			//jalankan fungsi simpan()
			$this->Petugas_model->simpan($inputan);

			//redirect 
            $this->session->set_flashdata('sukses', 'Petugas berhasil ditambahkan');
			redirect('admin/petugas', 'refresh');
		}
        $this->load->view("admin/header");
        $this->load->view("admin/petugas_tambah", $data);
        $this->load->view("admin/footer");
    }

    function edit($id_petugas){

        $data['petugas'] = $this->Petugas_model->detail($id_petugas);
        $data['unit'] = $this->Unit_model->tampil();

        $input = $this->input->post();

            // Jika ada inputan dari form
    if (!empty($input)) {
        // Simpan data yang diperbarui
        $update_data = [
            'nama_petugas' => $input['nama_petugas'],
            'username_petugas' => $input['username_petugas'],
            'id_unit' => $input['id_unit']
        ];

        // Jika password diisi, hash dengan MD5 dan update
        if (!empty($input['password_petugas'])) {
            $update_data['password_petugas'] = md5($input['password_petugas']);
        }

        // Jalankan update
        $this->Petugas_model->edit($update_data, $id_petugas);

        // Redirect ke halaman petugas
        $this->session->set_flashdata('sukses', 'Petugas berhasil diubah');
        redirect('admin/petugas', 'refresh');
    }
    
        $this->load->view("admin/header");
        $this->load->view("admin/petugas_edit",$data);
        $this->load->view("admin/footer");
    }

    function hapus($id_petugas) {

		//jalankan fungsi hapus()
		$this->Petugas_model->hapus($id_petugas);

		//redirect 
        $this->session->set_flashdata('sukses', 'Petugas berhasil dihapus');
		redirect('admin/petugas', 'refresh');
	}
}
