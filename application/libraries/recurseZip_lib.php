<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class recurseZip_lib {

    private $src; // Lokasi sumber file/folder
    private $dst; // Lokasi tujuan penyimpanan ZIP

    /** Konstruktor, menerima array $opt dari controller*/
    public function __construct($opt) {
        $this->src = $opt['src'];
        $this->dst = $opt['dst'];
    }

    /** Fungsi rekursif untuk menambahkan file dan folder ke dalam ZIP.*/
    private function recurse_zip($src, &$zip, $path) {
        $dir = opendir($src);
        while (false !== ($file = readdir($dir))) {
            if ($file != '.' && $file != '..') {
                $fullPath = $src . '/' . $file;

                if (is_dir($fullPath)) {
                    // Proses subfolder secara rekursif
                    $this->recurse_zip($fullPath, $zip, $path);
                } else {
                    // Tambahkan file ke ZIP dengan path relatif
                    $zip->addFile($fullPath, substr($fullPath, $path));
                }
            }
        }
        closedir($dir);
    }

    /* Fungsi proses kompresi.*/
    private function run($src, $dst = '') {
        // Hapus trailing slash jika ada
        $src = rtrim($src, '/');
        $dst = rtrim($dst, '/');

        $path = strlen(dirname($src) . '/'); // Digunakan untuk membuat path relatif dalam ZIP
        $filename = basename($src) . '.zip'; 
        $dst = empty($dst) ? $filename : $dst . '/' . $filename;

        // Hapus ZIP lama jika ada
        @unlink($dst);

        $zip = new ZipArchive;
        $res = $zip->open($dst, ZipArchive::CREATE);

        if ($res !== TRUE) {
            // Gagal membuat file ZIP
            echo 'Kesalahan: Tidak dapat membuat file ZIP.';
            exit;
        }

        if (is_file($src)) {
            // Jika sumber adalah file tunggal
            $zip->addFile($src, substr($src, $path));
        } else {
            if (!is_dir($src)) {
                // Jika folder tidak ditemukan
                $zip->close();
                @unlink($dst);
                echo 'Kesalahan: Folder atau file tidak ditemukan.';
                exit;
            }

            // Tambahkan isi folder ke ZIP secara rekursif
            $this->recurse_zip($src, $zip, $path);
        }

        $zip->close();
        return $dst;
    }

    /** Fungsi publik untuk memulai kompresi.*/
    public function compress() {
        return $this->run($this->src, $this->dst);
    }
}
