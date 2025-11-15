<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Riwayat extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        // Pastikan user sudah login
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'petugas_login') {
            redirect('auth/login', 'refresh'); 
        }

        //load model
        $this->load->model('petugas/Riwayat_model');
        $this->load->model('petugas/Kategori_model');
    }

    public function periksa_html($str){
        $clean = strip_tags($str);
        if ($str !== $clean) {
            $this->form_validation->set_message('periksa_html', 'Input tidak boleh mengandung tag HTML.');
            return FALSE;
        }
        return TRUE;
    }

    function index() {
        $id_petugas = $this->session->userdata('id_petugas'); 

        $data['riwayat'] = $this->Riwayat_model->tampil_by_petugas($id_petugas);
        $this->load->view("petugas/header");
        $this->load->view("petugas/riwayat_tampil",$data);
        $this->load->view("petugas/footer");
    }

    function detail($id_arsip){
        $data["riwayat"] = $this->Riwayat_model->detail($id_arsip);

        $this->load->view("petugas/header");
        $this->load->view("petugas/riwayat_detail",$data);
        $this->load->view("petugas/footer");
    }

     function nomor_dokumen_cek($nomor) {
        $id_arsip = $this->uri->segment(4); 
        if ($this->Riwayat_model->cek_nomor_dokumen($nomor, $id_arsip)) {
            $this->form_validation->set_message('nomor_dokumen_cek', 'Nomor Dokumen sudah digunakan!');
            return FALSE;
        }
        return TRUE;
    }

    function edit($id_arsip) {
        $data["riwayat"] = $this->Riwayat_model->detail_ubah($id_arsip);
        $id_petugas = $this->session->userdata('id_petugas');
        $id_unit = $this->Riwayat_model->unit_by_petugas($id_petugas);
        $nama_unit = $this->Riwayat_model->get_nama_unit($id_unit);

        $kategori = $this->Kategori_model->tampil();

        if (strtolower($nama_unit) !== 'unit c') {
            $kategori = array_filter($kategori, function($k) {
                return strtolower($k['nama_kategori']) !== 'kategori c';
            });
        }

        $data["kategori"] = $kategori;

        $inputan = $this->input->post();

        if (!empty($inputan)) {
            $this->form_validation->set_rules("keterangan_arsip","Keterangan Arsip","required|trim|callback_periksa_html");

            // validasi nomor dokumen jika riwayat tidak punya kode_qr
            if (empty($data['riwayat']['kode_qr'])) {
                $this->form_validation->set_rules("nomor_dokumen","Nomor Dokumen","required|trim|callback_periksa_html|callback_nomor_dokumen_cek");
            }

            $this->form_validation->set_message("required", "%s wajib diisi");

            if ($this->form_validation->run() === TRUE) {
            
                $inputan['id_petugas'] = $this->session->userdata('id_petugas');
                $inputan['id_unit'] = $this->Riwayat_model->unit_by_petugas(
                    $this->session->userdata('id_petugas')
                );

                // kode QR
                if (!empty($data['riwayat']['kode_qr'])) {
                    //  arsip punya QR : tetap pakai data lama
                    $inputan['kode_qr'] = $data['riwayat']['kode_qr'];
                    $inputan['nomor_dokumen'] = $data['riwayat']['nomor_dokumen'];
                } else {
                    // tidak punya QR : ambil nomor dokumen dari input
                    $inputan['kode_qr'] = null;
                    $inputan['nomor_dokumen'] = $this->input->post("nomor_dokumen");
                }

                if (!empty($_FILES['file']['name'])) {
                    $config['upload_path']   = './assets/arsip/';
                    $config['allowed_types'] = 'pdf|doc|docx|jpg|png';
                    $config['max_size']      = 10000;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('file')) {
                        $inputan['file_arsip'] = $this->upload->data('file_name');
                    } else {
                        $this->session->set_flashdata(
                            'gagal',
                            'Gagal upload file arsip: ' . $this->upload->display_errors('', '')
                        );
                        redirect('petugas/riwayat/edit/' . $id_arsip);
                        return;
                    }
                } else {
                    //pakai file lama
                    $inputan['file_arsip'] = $data['riwayat']['file_arsip'];
                }

                $this->Riwayat_model->ubah($id_arsip, $inputan);

                $this->session->set_flashdata('sukses', 'Arsip berhasil diubah');
                redirect('petugas/riwayat', 'refresh');
            }
        }

        $this->load->view('petugas/header');
        $this->load->view('petugas/riwayat_edit', $data);
        $this->load->view('petugas/footer');
    }

    function hapus($id_arsip){

        $this->Riwayat_model->hapus($id_arsip);

        //redirect ke kategori 
        $this->session->set_flashdata('sukses', 'Riwayat Arsip berhasil dihapus');
        redirect('petugas/riwayat', 'refresh');
    }
}
