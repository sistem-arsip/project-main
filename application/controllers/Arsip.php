<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller {

    function cek($unik_arsip){

        $this->load->model('Arsip_model');
        $data["arsip"] = $this->Arsip_model->get_unik($unik_arsip);
        $this->load->view("arsip_cek",$data);
    }
}