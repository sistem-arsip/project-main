<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Backup extends CI_Controller {
    function __construct(){
        parent::__construct();

        // Pastikan user sudah login sebagai admin
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'admin_login') {
            redirect('auth/login', 'refresh'); 
        }
    }
    function index(){

        $this->load->view("admin/header");
        $this->load->view("admin/backup");
        $this->load->view("admin/footer");
    }

    // backup file
    function files() {
        $this->_backup_files(true);
    }
    private function _backup_files($force_download = true) {
        $src = FCPATH . 'assets/arsip';
        $dst = FCPATH . 'backup/files';
    
        $files = array_diff(scandir($src), array('.', '..'));
        if (empty($files)) {
            $this->session->set_flashdata('gagal', 'Tidak ada file arsip yang dapat di-backup.');
            redirect('admin/backup');
            return;
        }
    
        $tanggal = date('d-m-Y');
        $nama_folder_dalam_zip = 'arsip_file_backup_' . $tanggal;
        $temp_folder = FCPATH . 'temp_backup/' . $nama_folder_dalam_zip;
    
        $this->load->helper('file');
        if (is_dir($temp_folder)) {
            delete_files($temp_folder, true);
            rmdir($temp_folder);
        }
    
        mkdir($temp_folder, 0755, true);
        $this->load->helper('directory');
        $this->copy_recursive($src, $temp_folder);
    
        $opt = array(
            'src' => $temp_folder,
            'dst' => $dst
        );
        $this->load->library('recurseZip_lib', $opt);
        $zipPath = $this->recursezip_lib->compress();
    
        $finalZipPath = $dst . '/arsip_file_backup.zip';
        @unlink($finalZipPath);
        rename($zipPath, $finalZipPath);
    
        delete_files($temp_folder, true);
        rmdir($temp_folder);
    
        if ($force_download) {
            $this->load->helper('download');
            force_download($finalZipPath, NULL);
        }
    }
    private function copy_recursive($src, $dst) {
        $dir = opendir($src);
        @mkdir($dst);

        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                $srcPath = $src . '/' . $file;
                $dstPath = $dst . '/' . $file;

                if (is_dir($srcPath)) {
                    $this->copy_recursive($srcPath, $dstPath);
                } else {
                    copy($srcPath, $dstPath);
                }
            }
        }
        closedir($dir);
    }
    // backup database.sql
    function db() {
        $this->_backup_db(true);
    }
    
    private function _backup_db($force_download = false) {
        $this->load->dbutil();
    
        $prefs = array(
            'format' => 'txt', 
            'filename' => 'backup-database.sql'
        );
    
        $raw_backup = $this->dbutil->backup($prefs);
        $safe_backup = "SET FOREIGN_KEY_CHECKS=0;\n" . $raw_backup . "\nSET FOREIGN_KEY_CHECKS=1;";
    
        $filename_sql = 'arsip_database_backup_' . date("Y-m-d") . '.sql';
        $save_path_sql = FCPATH . 'backup/db/' . $filename_sql;
    
        $this->load->helper('file');
        write_file($save_path_sql, $safe_backup);
    
        $zip = new ZipArchive();
        $filename_zip = 'arsip_database_backup.zip';
        $save_path_zip = FCPATH . 'backup/db/' . $filename_zip;
        // hapus file ZIP lama
        if (file_exists($save_path_zip)) {
            @unlink($save_path_zip);
        }
    
        if ($zip->open($save_path_zip, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($save_path_sql, $filename_sql);
            $zip->close();
    
            @unlink($save_path_sql);
    
            if ($force_download) {
                $this->load->helper('download');
                force_download($save_path_zip, NULL); // file zip terdownload
            }
    
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

            $this->session->set_flashdata('sukses', 'Database berhasil dipulihkan.');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal, file SQL tidak ditemukan.');
        }

        redirect('admin/backup');
    }

    function restore_files() {
        $target_folder = FCPATH . 'assets/arsip/';
        $temp_extract_folder = FCPATH . 'temp_restore/';

        if (!empty($_FILES['zip_file']['name'])) {
            $tmpPath = $_FILES['zip_file']['tmp_name'];
            $zip = new ZipArchive;

            if ($zip->open($tmpPath) === TRUE) {
                // bersihkan folder sementara
                $this->load->helper('file');
                if (is_dir($temp_extract_folder)) {
                    delete_files($temp_extract_folder, true);
                    rmdir($temp_extract_folder);
                }
                mkdir($temp_extract_folder, 0755, true);

                // ekstrak ke temp folder
                $zip->extractTo($temp_extract_folder);
                $zip->close();

                // ambil folder pertama di dalam ZIP
                $subfolders = scandir($temp_extract_folder);
                foreach ($subfolders as $folder) {
                    if ($folder != '.' && $folder != '..' && is_dir($temp_extract_folder . $folder)) {
                        $fullTempPath = $temp_extract_folder . $folder;

                        // hapus isi /assets/arsip/ dulu 
                        delete_files($target_folder, true);

                        // salin isi folder backup ke assets/arsip/
                        $this->copy_recursive($fullTempPath, $target_folder);
                        break;
                    }
                }

                // hapus folder temp
                delete_files($temp_extract_folder, true);
                rmdir($temp_extract_folder);

                $this->session->set_flashdata('sukses', 'File arsip berhasil dipulihkan.');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal membuka file ZIP.');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Tidak ada file ZIP diunggah.');
        }

        redirect('admin/backup');
    }
}