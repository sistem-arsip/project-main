<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backup extends CI_Controller {

    function __construct(){
        parent::__construct();

        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); // Redirect ke halaman login
        }
    }

    function index(){

        $this->load->view("admin/header");
        $this->load->view("admin/backup");
        $this->load->view("admin/footer");
    }

    // backup file
    public function files() {
        $src = FCPATH . 'assets/arsip';
        $dst = FCPATH . 'backup/files';

        $opt = array(
            'src' => $src,
            'dst' => $dst
        );

        $this->load->library('recurseZip_lib', $opt);
        $download = $this->recursezip_lib->compress();

        $relative_path = str_replace(FCPATH, '', $download);
        redirect(base_url($relative_path));
    }


    // backup database.sql
    public function db() {
        $this->load->dbutil();

        $prefs = array(
            'format' => 'zip',
            'filename' => 'backup-database.sql'
        );

        $backup =& $this->dbutil->backup($prefs);

        $filename = 'backup-db-on-' . date("Y-m-d-H-i-s") . '.zip';
        $save_path = FCPATH . 'backup/db/' . $filename;

        $this->load->helper('file');
        write_file($save_path, $backup);

        $this->load->helper('download');
        force_download($filename, $backup);
    }

    

}