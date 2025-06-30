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

        $nama_unit = $data['arsip']['nama_unit'];

        if (!empty($nomor_surat)) {
            $isi = "Surat ini resmi dikeluarkan oleh bagian $nama_unit Pondok Pesantren Wali Songo Ngabar dengan nomor surat dan kode.";
        } else {
            $isi = "Surat ini resmi dikeluarkan oleh bagian $nama_unit Pondok Pesantren Wali Songo Ngabar dengan kode.";
        }
        // Konfigurasi QR Code
        $options = new QROptions([
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel' => QRCode::ECC_L,
        ]);

        $data['qrcode'] =  (new QRCode($options))->render($isi);

        $this->load->view("petugas/header");
        $this->load->view("petugas/arsip_detail",$data);
        $this->load->view("petugas/footer");
    }

    function tambah() {
        $data["kategori"] = $this->Kategori_model->tampil();

        // Validasi form dasar
        $this->form_validation->set_rules("id_kategori", "Kategori", "required");
        $this->form_validation->set_rules("keterangan_arsip", "Keterangan Arsip", "required");
        $this->form_validation->set_rules("kode_qr_status", "Status QR Code", "required");

        $qr_status = $this->input->post("kode_qr_status");

        if ($qr_status === "ya") {
            $this->form_validation->set_rules("kode_qr", "Kode QR", "required|is_unique[arsip.kode_qr]");
        } else {
            $this->form_validation->set_rules("nomor_dokumen", "Nomor Dokumen", "required|is_unique[arsip.nomor_dokumen]");
        }

        // Pesan error
        $this->form_validation->set_message("required", "%s wajib diisi");
        $this->form_validation->set_message("is_unique", "%s sudah digunakan!");

        if ($this->form_validation->run() === TRUE) {
            if (empty($_FILES['file_arsip']['name'])) {
                $data['error_file'] = "<div class='text-danger small'>File Arsip wajib diisi</div>";
            } else {
                $inputan = [
                    'id_petugas'        => $this->session->userdata('id_petugas'),
                    'id_unit'           => $this->Arsip_model->unit_by_petugas($this->session->userdata('id_petugas')),
                    'id_kategori'       => $this->input->post("id_kategori"),
                    'keterangan_arsip'  => $this->input->post("keterangan_arsip"),
                    'nomor_dokumen'     => $this->input->post("nomor_dokumen"), 
                    'kode_qr'           => null,
                ];

                $qr_status = $this->input->post("kode_qr_status");

                if ($qr_status === "ya") {
                    $kode_qr = $this->input->post("kode_qr");
                    $qr_data = $this->Arsip_model->get_nomor_by_kode_qr($kode_qr);

                    if ($qr_data) {
                        $inputan['nomor_dokumen'] = $qr_data['nomor_dokumen'];
                        $inputan['kode_qr'] = $kode_qr;
                    } else {
                        $this->session->set_flashdata('gagal', 'Kode QR tidak ditemukan atau belum tersedia.');
                        redirect('petugas/arsip/tambah');
                        return;
                    }
                } else {
                    $inputan['nomor_dokumen'] = $this->input->post("nomor_dokumen");
                    $inputan['kode_qr'] = null;
                }

                // Upload file
                $config['upload_path']   = './assets/arsip/';
                $config['allowed_types'] = 'pdf|doc|docx|jpg|png';
                $config['max_size']      = 10000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_arsip')) {
                    $inputan['file_arsip'] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('gagal', 'Gagal upload file arsip: ' . $this->upload->display_errors('', ''));
                    redirect('petugas/arsip/tambah');
                    return;
                }

                $hasil = $this->Arsip_model->simpan($inputan);

                if ($hasil == "sukses") {
                    $this->session->set_flashdata('sukses', 'Arsip berhasil ditambahkan');
                    redirect('petugas/arsip');
                } else {
                    $this->session->set_flashdata('gagal', 'Gagal menyimpan arsip');
                    redirect('petugas/arsip/tambah');
                }
            }
        }
        


        // Jika gagal validasi atau belum submit
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
