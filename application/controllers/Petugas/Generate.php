<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include 'vendor/autoload.php';
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class Generate extends CI_Controller {
    function __construct() {
        parent::__construct();
        // load model
         $this->load->model('petugas/Generate_model');

        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'petugas_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }
    }

    function index() {
        $id_petugas = $this->session->userdata('id_petugas'); 
        $data["generate"] = $this->Generate_model->tampil_by_petugas($id_petugas);

        $this->load->view("petugas/header");
        $this->load->view("petugas/qr_tampil", $data);
        $this->load->view("petugas/footer");
    }

    
    function tambah() {

        $this->form_validation->set_rules("nomor_dokumen","Masukkan Nomor Surat/Dokumen","required|is_unique[kode_qr.nomor_dokumen]");
        $this->form_validation->set_message("required", "%s wajib diisi!");
        $this->form_validation->set_message("is_unique", "%s yang sama sudah digunakan!");

        if ($this->form_validation->run() == TRUE) {

            $nomor_dokumen = $this->input->post('nomor_dokumen');
            $id_petugas = $this->session->userdata('id_petugas');
            $id_unit = $this->Generate_model->unit_by_petugas($id_petugas);

            // Generate kode_qr acak
            function generateKodeQR($length = 8) {
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, strlen($characters) - 1)];
                }
                return 'QR-' . $randomString;
            }

            // Pastikan kode unik
            do {
                $kode_qr = generateKodeQR();
            } while ($this->Generate_model->cek_kode_qr($kode_qr));

            // Buat isi QR dari nomor dokumen
            $isi_qr = $nomor_dokumen;

            $options = new QROptions([
                'outputType' => QRCode::OUTPUT_IMAGE_PNG,
                'eccLevel' => QRCode::ECC_L,
                'scale' => 8,
            ]);

            $qrcode = new QRCode($options);

            $nama_file = $kode_qr . '.png';
            $lokasi_file = FCPATH . 'assets/kode_qr/' . $nama_file;
            $qrcode->render($isi_qr, $lokasi_file);

            // Simpan ke database melalui model
            $data = [
                'kode_qr' => $kode_qr,
                'nomor_dokumen' => $nomor_dokumen,
                'foto_qr' => $nama_file,
                'id_petugas' => $id_petugas,
                'id_unit' => $id_unit,
            ];

            $this->Generate_model->simpan_qr($data);

            $this->session->set_flashdata('sukses', 'QR Code berhasil dibuat, silahkan download qr pada halaman detail.');
            redirect('petugas/generate/detail/' . $kode_qr);
        }

        $this->load->view("petugas/header");
        $this->load->view("petugas/qr_tambah");
        $this->load->view("petugas/footer");
    }

    function detail($kode_qr) {
        $data['qr'] = $this->Generate_model->qr_by_kode($kode_qr);

        if (!$data['qr']) {
            show_404();
        }

        $this->load->view('petugas/header');
        $this->load->view('petugas/qr_detail', $data);
        $this->load->view('petugas/footer');
    }
}