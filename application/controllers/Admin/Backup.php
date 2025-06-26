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
    function files() {
        $src = FCPATH . 'assets/arsip';
        $dst = FCPATH . 'backup/files';

        // Cek apakah folder kosong
        $files = array_diff(scandir($src), array('.', '..'));
        if (empty($files)) {
            $this->session->set_flashdata('gagal', 'Tidak ada file arsip yang dapat di-backup.');
            redirect('admin/backup');
            return;
        }

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
    function db() {
        $this->load->dbutil();

        $prefs = array(
            'format' => 'txt', 
            'filename' => 'backup-database.sql'
        );

        $raw_backup = $this->dbutil->backup($prefs);

        // Bungkus dengan disable foreign key
        $safe_backup = "SET FOREIGN_KEY_CHECKS=0;\n" . $raw_backup . "\nSET FOREIGN_KEY_CHECKS=1;";

        $filename_sql = 'arsip_database_backup_' . date("Y-m-d") . '.sql';
        $save_path_sql = FCPATH . 'backup/db/' . $filename_sql;

        // Simpan file sql
        $this->load->helper('file');
        write_file($save_path_sql, $safe_backup);

        // --- buat file ZIP yang berisi file .sql tadi ---
        $zip = new ZipArchive();
        $filename_zip = 'arsip_database_backup_' . date("Y-m-d") . '.zip';
        $save_path_zip = FCPATH . 'backup/db/' . $filename_zip;

        if ($zip->open($save_path_zip, ZipArchive::CREATE) === TRUE) {
            // Tambahkan file sql ke zip
            $zip->addFile($save_path_sql, $filename_sql);
            $zip->close();

            // Hapus file .sql asli agar tidak berantakan (optional)
            @unlink($save_path_sql);

            // Download file zip
            $this->load->helper('download');
            force_download($filename_zip, file_get_contents($save_path_zip));

            // Jika ingin hapus file zip setelah download, bisa di uncomment:
            // @unlink($save_path_zip);

        } else {
            echo "Gagal membuat file ZIP backup database.";
            exit;
        }
    }



    function restore_db() {
        if (isset($_FILES['sql_file']['tmp_name'])) {
            $sql_path = $_FILES['sql_file']['tmp_name'];
            $sql = file_get_contents($sql_path);

            // Jalankan query satu per satu (jika dipisah dengan ;)
            $queries = explode(";", $sql);
            foreach ($queries as $query) {
                $query = trim($query);
                if (!empty($query)) {
                    $this->db->query($query);
                }
            }

            $this->session->set_flashdata('sukses', 'Database berhasil di-restore.');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal, file SQL tidak ditemukan.');
        }

        redirect('admin/backup');
    }

    function restore_files() {
        $target = FCPATH . 'assets/';

        if (!empty($_FILES['zip_file']['name'])) {
            $tmpPath = $_FILES['zip_file']['tmp_name'];
            $zip = new ZipArchive;

            if ($zip->open($tmpPath) === TRUE) {
                $zip->extractTo($target);
                $zip->close();
                $this->session->set_flashdata('sukses', 'File arsip berhasil di-restore.');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal membuka file ZIP.');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Tidak ada file ZIP diunggah.');
        }

        redirect('admin/backup');
    }

}
