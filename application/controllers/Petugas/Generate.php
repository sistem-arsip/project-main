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

        // Pastikan user sudah login
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'petugas_login') {
            redirect('auth/login', 'refresh'); 
        }
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
        $data["generate"] = $this->Generate_model->tampil_by_petugas($id_petugas);

        $this->load->view("petugas/header");
        $this->load->view("petugas/qr_tampil", $data);
        $this->load->view("petugas/footer");
    }

    
    function tambah() {
        $this->form_validation->set_rules("nomor_dokumen","Masukkan Nomor Surat/Dokumen","required|is_unique[kode_qr.nomor_dokumen]|trim|callback_periksa_html");
        $this->form_validation->set_message("required", "%s wajib diisi!");
        $this->form_validation->set_message("is_unique", "%s yang sama sudah digunakan!");

        if ($this->form_validation->run() == TRUE) {
            $nomor_dokumen = $this->input->post('nomor_dokumen');
            $id_petugas = $this->session->userdata('id_petugas');
            $id_unit = $this->Generate_model->unit_by_petugas($id_petugas);

            // Fungsi generate kode QR unik
            function generateKodeQR($length = 8) {
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, strlen($characters) - 1)];
                }
                return 'QR-' . $randomString;
            }

            do {
                $kode_qr = generateKodeQR();
            } while ($this->Generate_model->cek_kode_qr($kode_qr));

            // Insert tanpa foto untk get waktu
            $data_insert = [
                'kode_qr' => $kode_qr,
                'nomor_dokumen' => $nomor_dokumen,
                'foto_qr' => '', 
                'id_petugas' => $id_petugas,
                'id_unit' => $id_unit,
            ];
            $this->Generate_model->simpan_qr($data_insert);

            // get nama_unit dan waktu_generate
            $data_qr = $this->Generate_model->unit_by_qr($kode_qr);

            // Format waktu_generate
            $tanggal = format_tanggal_indo($data_qr['waktu_generate']);

            // Format isi QR
            $isi_qr = "{$data_qr['nama_unit']} membuat {$nomor_dokumen} pada {$tanggal}";

            // Generate QR image
            $options = new QROptions([
                'outputType' => QRCode::OUTPUT_IMAGE_PNG,
                'eccLevel' => QRCode::ECC_L,
                'scale' => 8,
            ]);
            $qrcode = new QRCode($options);

            $nama_file = $kode_qr . '.png';
            $lokasi_file = FCPATH . 'assets/kode_qr/' . $nama_file;
            $qrcode->render($isi_qr, $lokasi_file);

            // Update foto_qr di database
            $this->Generate_model->update_qr($kode_qr, ['foto_qr' => $nama_file]);

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
    function nomor_dokumen_cek($nomor, $kode_qr) {
        if ($this->Generate_model->cek_nomor_dokumen($nomor, $kode_qr)) {
            $this->form_validation->set_message('nomor_dokumen_cek', 'Nomor Dokumen sudah digunakan!');
            return FALSE;
        }
        return TRUE;
    }
    function edit($kode_qr) {
        $data['qr'] = $this->Generate_model->qr_by_kode($kode_qr);

        if (!$data['qr']) {
            show_404();
        }

        $this->form_validation->set_rules("nomor_dokumen", "Nomor Dokumen", "required|callback_nomor_dokumen_cek[".$kode_qr."]|trim|callback_periksa_html");
        $this->form_validation->set_message("required", "%s wajib diisi!");
        $this->form_validation->set_message("is_unique", "%s sudah digunakan!");

        if ($this->form_validation->run() == TRUE) {
            $nomor_dokumen_baru = $this->input->post('nomor_dokumen');

            // Ambil data unit & waktu generate
            $data_qr = $this->Generate_model->unit_by_qr($kode_qr);
            $tanggal = format_tanggal_indo($data_qr['waktu_generate']);

            // Buat isi QR baru
            $isi_qr_baru = "{$data_qr['nama_unit']} membuat {$nomor_dokumen_baru} pada {$tanggal}";

            // Lokasi file QR lama
            $lokasi_file_lama = FCPATH . 'assets/kode_qr/' . $data['kode_qr']['foto_qr'];

            // Hapus file lama jika ada
            if (file_exists($lokasi_file_lama)) {
                unlink($lokasi_file_lama);
            }

            // Generate QR baru
            $options = new \chillerlan\QRCode\QROptions([
                'outputType' => QRCode::OUTPUT_IMAGE_PNG,
                'eccLevel' => QRCode::ECC_L,
                'scale' => 8,
            ]);
            $qrcode = new QRCode($options);
            $nama_file_baru = $kode_qr . '.png';
            $lokasi_file_baru = FCPATH . 'assets/kode_qr/' . $nama_file_baru;
            $qrcode->render($isi_qr_baru, $lokasi_file_baru);

            // Update database
            $update_data = [
                'nomor_dokumen' => $nomor_dokumen_baru,
                'foto_qr' => $nama_file_baru
            ];
            $this->Generate_model->update_qr($kode_qr, $update_data);

            $this->session->set_flashdata('sukses', 'QR Code berhasil diperbarui.');
            redirect('petugas/generate/detail/' . $kode_qr);
        }

        $this->load->view("petugas/header");
        $this->load->view("petugas/qr_edit", $data);
        $this->load->view("petugas/footer");
    }

    function hapus($kode_qr) {
        $data_qr = $this->Generate_model->qr_by_kode($kode_qr);

        if (!$data_qr) {
            show_404();
        }
        // Hapus file QR dari folder
        $lokasi_file = FCPATH . 'assets/kode_qr/' . $data_qr['foto_qr'];
        if (file_exists($lokasi_file)) {
            unlink($lokasi_file);
        }

        $this->Generate_model->hapus_qr($kode_qr);

        $this->session->set_flashdata('sukses', 'QR Code berhasil dihapus.');
        redirect('petugas/generate');
    }



}