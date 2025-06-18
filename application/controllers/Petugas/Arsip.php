<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include 'vendor/autoload.php';
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
class Arsip extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Cek login user
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'petugas_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }
    
        // Load model
        $this->load->model('petugas/Arsip_model');
        $this->load->model('petugas/Kategori_model');
    }

    function index() {

        $id_petugas = $this->session->userdata('id_petugas'); 
        $id_unit = $this->Arsip_model->unit_by_petugas($id_petugas);
        $data["arsip"] = $this->Arsip_model->tampil_by_unit($id_unit);
        $this->load->view("petugas/header");
        $this->load->view("petugas/arsip_tampil",$data);
        $this->load->view("petugas/footer");
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

        $this->load->view("petugas/header");
        $this->load->view("petugas/arsip_detail",$data);
        $this->load->view("petugas/footer");
    }

    function tambah()
    {
        $this->load->model('Kategori_model');
        $data["kategori"] = $this->Kategori_model->tampil();

        // Aturan validasi
        $this->form_validation->set_rules("kode_arsip", "Kode Arsip", "required|is_unique[arsip.kode_arsip]");
        $this->form_validation->set_rules("nama_arsip", "Nama Arsip", "required");
        $this->form_validation->set_rules("keterangan_arsip", "Keterangan Arsip", "required");
        $this->form_validation->set_rules("id_kategori", "Kategori", "required");

        // Pesan error khusus
        $this->form_validation->set_message("required", "%s wajib diisi");
        $this->form_validation->set_message("is_unique", "%s sudah digunakan, silakan gunakan kode lain");

        if ($this->form_validation->run() === TRUE) {
            $inputan = $this->input->post();
            $inputan['id_petugas'] = $this->session->userdata('id_petugas');
            $inputan['id_unit'] = $this->Arsip_model->unit_by_petugas($this->session->userdata('id_petugas'));
            $inputan['waktu_upload'] = date('Y-m-d');

            $hasil = $this->Arsip_model->simpan($inputan);

            if ($hasil == "sukses") {
                $this->session->set_flashdata('sukses', 'Arsip berhasil ditambahkan');
                redirect('petugas/arsip', 'refresh');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal menyimpan arsip');
                redirect('petugas/arsip/tambah', 'refresh');
            }
        }

        // Jika belum submit atau validasi gagal
        $this->load->view('petugas/header');
        $this->load->view('petugas/arsip_tambah', $data);
        $this->load->view('petugas/footer');
    }

    

    function edit($id_arsip) {
        $data["arsip"] = $this->Arsip_model->detail_ubah($id_arsip);
        $data["kategori"] = $this->Kategori_model->tampil();
        $inputan = $this->input->post();
    
        if (!empty($inputan)) {
            // Tambahkan data tetap
            $inputan['id_petugas'] = $this->session->userdata('id_petugas');
            $inputan['id_unit'] = $this->Arsip_model->unit_by_petugas($this->session->userdata('id_petugas'));
            $inputan['waktu_upload'] = date('Y-m-d');
    
            // Proses upload file jika ada
            if (!empty($_FILES['file']['name'])) {
                $config['upload_path']   = './assets/arsip/';
                $config['allowed_types'] = 'pdf|doc|docx|jpg|png';
                $config['max_size']      = 10000;
    
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('file')) {
                    $inputan['file_arsip'] = $this->upload->data('file_name');
                }
            }
    
            // Jalankan update data
            $this->Arsip_model->ubah($id_arsip, $inputan);
    
            $this->session->set_flashdata('sukses', 'Arsip berhasil diubah');
            redirect('petugas/arsip', 'refresh');
        }
    
    
        $this->load->view('petugas/header');
        $this->load->view('petugas/arsip_edit', $data);
        $this->load->view('petugas/footer');
    }
    function hapus($id_arsip){

        //jalankan fungsi hapus()
        $this->Arsip_model->hapus($id_arsip);

        //redirect ke kategori 
        $this->session->set_flashdata('sukses', 'Arsip berhasil dihapus');
        redirect('petugas/arsip', 'refresh');
    }

}
