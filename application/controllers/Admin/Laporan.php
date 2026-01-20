<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include FCPATH . 'vendor/autoload.php';
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class Laporan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Laporan_model');
        $this->load->library('pdf');

        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); 
        }
    }
    function bulanan($bulan, $tahun){
        $data = $this->Laporan_model->get_laporan_bulanan($bulan, $tahun);

        // ====== ISI QR ======
        $isi_qr =
            'Dicetak oleh ' . $this->session->userdata('nama_admin') . "\n" .
            'Pada ' . format_datetime_indo(date('Y-m-d H:i'));

        // ====== FOLDER TEMP ======
        $folder = FCPATH . 'assets/temp_qr/';
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $file_qr = $folder . 'laporan_qr.png';

        // ====== GENERATE QR (CHILLERLAN) ======
        $options = new QROptions([
            'eccLevel' => QRCode::ECC_L,
            'scale'    => 6,
        ]);

        $qrcode = new QRCode($options);
        $qrcode->render($isi_qr, $file_qr); // ⬅️ PAKSA KE FILE

        // ====== FILE → BASE64 ======
        $data['qr_base64'] = base64_encode(file_get_contents($file_qr));

        $nama_file = 'Laporan Bulanan - Bulan '.$data['periode'].'.pdf';
        $this->pdf->load_view('admin/laporan_pdf', $data, $nama_file);
    }

    function tahunan($tahun){
        $data = $this->Laporan_model->get_laporan_tahunan($tahun);

        $isi_qr =
            'Dicetak oleh ' . $this->session->userdata('nama_admin') . "\n" .
            'Pada ' . format_datetime_indo(date('Y-m-d H:i'));

        $folder = FCPATH . 'assets/temp_qr/';
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $file_qr = $folder . 'laporan_qr.png';

        $options = new QROptions([
            'eccLevel' => QRCode::ECC_L,
            'scale'    => 6,
        ]);

        $qrcode = new QRCode($options);
        $qrcode->render($isi_qr, $file_qr);

        $data['qr_base64'] = base64_encode(file_get_contents($file_qr));

        $nama_file = 'Laporan Tahunan - Tahun '.$tahun.'.pdf';
        $this->pdf->load_view('admin/laporan_pdf', $data, $nama_file);
    }
}
