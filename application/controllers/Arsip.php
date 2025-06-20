<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include 'vendor/autoload.php';
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
class Arsip extends CI_Controller {

    function cek($unik_arsip){

        $this->load->model('Arsip_model');
        $data["arsip"] = $this->Arsip_model->get_unik($unik_arsip);

        // Konfigurasi QR Code
        $options = new QROptions([
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel' => QRCode::ECC_L,
        ]);

        $isi = base_url("arsip/cek/".$data['arsip']['unik_arsip']);
        $data['qrcode'] =  (new QRCode($options))->render($isi);
        
        $this->load->view("arsip_cek",$data);
    }
}