<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    /* =========================================================
     * LAPORAN BULANAN
     * ========================================================= */
    function get_laporan_bulanan($bulan, $tahun){

        $arsip_detail       = $this->detail_arsip_bulanan($bulan,$tahun);
        $arsip_per_kategori = $this->arsip_per_kategori_bulanan($bulan,$tahun);
        $arsip_per_unit     = $this->arsip_per_unit_bulanan($bulan,$tahun);
        $arsip_per_petugas  = $this->arsip_per_petugas_bulanan($bulan,$tahun);

        return [
            'jenis_laporan'  => 'Bulanan',
            'periode'        => periode_bulanan_indo($bulan, $tahun),
            'waktu_download' => format_datetime_indo(date('Y-m-d H:i:s')),

            /* ===== RINGKASAN (SEMUA JUMLAH ARSIP) ===== */
            'ringkasan' => [
                'Arsip'             => count($arsip_detail),
                'ArsipKategori'     => array_sum(array_column($arsip_per_kategori, 'jumlah')),
                'ArsipUnit'         => array_sum(array_column($arsip_per_unit, 'jumlah')),
                'ArsipPetugas'      => array_sum(array_column($arsip_per_petugas, 'jumlah')),
                'Kode QR'           => $this->jumlah_qr_bulanan($bulan,$tahun),
            ],

            /* ===== DETAIL ===== */
            'arsip_detail'       => $arsip_detail,
            'arsip_per_kategori' => $arsip_per_kategori,
            'arsip_per_unit'     => $arsip_per_unit,
            'arsip_per_petugas'  => $arsip_per_petugas,
            'qr_per_unit'        => $this->qr_per_unit_bulanan($bulan,$tahun),
        ];
    }

    /* =========================================================
     * LAPORAN TAHUNAN
     * ========================================================= */
    function get_laporan_tahunan($tahun){

        $arsip_detail       = $this->detail_arsip_tahunan($tahun);
        $arsip_per_kategori = $this->arsip_per_kategori_tahunan($tahun);
        $arsip_per_unit     = $this->arsip_per_unit_tahunan($tahun);
        $arsip_per_petugas  = $this->arsip_per_petugas_tahunan($tahun);

        return [
            'jenis_laporan'  => 'Tahunan',
            'periode'        => periode_tahunan_indo($tahun),
            'waktu_download' => format_datetime_indo(date('Y-m-d H:i:s')),

            'ringkasan' => [
                'Arsip'             => count($arsip_detail),
                'ArsipKategori'     => array_sum(array_column($arsip_per_kategori, 'jumlah')),
                'ArsipUnit'         => array_sum(array_column($arsip_per_unit, 'jumlah')),
                'ArsipPetugas'      => array_sum(array_column($arsip_per_petugas, 'jumlah')),
                'Kode QR'           => $this->jumlah_qr_tahunan($tahun),
            ],

            'arsip_detail'       => $arsip_detail,
            'arsip_per_kategori' => $arsip_per_kategori,
            'arsip_per_unit'     => $arsip_per_unit,
            'arsip_per_petugas'  => $arsip_per_petugas,
            'qr_per_unit'        => $this->qr_per_unit_tahunan($tahun),
        ];
    }

    /* =========================================================
     * QUERY ARSIP (TIDAK DIUBAH)
     * ========================================================= */

    function detail_arsip_bulanan($bulan,$tahun){
        return $this->db
            ->join('unit','arsip.id_unit = unit.id_unit','left')
            ->join('kategori','arsip.id_kategori = kategori.id_kategori','left')
            ->where('MONTH(arsip.waktu_upload)', $bulan)
            ->where('YEAR(arsip.waktu_upload)', $tahun)
            ->get('arsip')->result_array();
    }

    function detail_arsip_tahunan($tahun){
        return $this->db
            ->join('unit','arsip.id_unit = unit.id_unit','left')
            ->join('kategori','arsip.id_kategori = kategori.id_kategori','left')
            ->where('YEAR(arsip.waktu_upload)', $tahun)
            ->get('arsip')->result_array();
    }

    function arsip_per_kategori_bulanan($bulan,$tahun){
        return $this->db->query("
            SELECT kategori.nama_kategori, COUNT(*) AS jumlah
            FROM arsip
            JOIN kategori ON arsip.id_kategori = kategori.id_kategori
            WHERE MONTH(arsip.waktu_upload) = $bulan
            AND YEAR(arsip.waktu_upload) = $tahun
            GROUP BY arsip.id_kategori
        ")->result_array();
    }

    function arsip_per_kategori_tahunan($tahun){
        return $this->db->query("
            SELECT kategori.nama_kategori, COUNT(*) AS jumlah
            FROM arsip
            JOIN kategori ON arsip.id_kategori = kategori.id_kategori
            WHERE YEAR(arsip.waktu_upload) = $tahun
            GROUP BY arsip.id_kategori
        ")->result_array();
    }

    function arsip_per_unit_bulanan($bulan,$tahun){
        return $this->db->query("
            SELECT unit.nama_unit, COUNT(*) AS jumlah
            FROM arsip
            JOIN unit ON arsip.id_unit = unit.id_unit
            WHERE MONTH(arsip.waktu_upload) = $bulan
            AND YEAR(arsip.waktu_upload) = $tahun
            GROUP BY arsip.id_unit
        ")->result_array();
    }

    function arsip_per_unit_tahunan($tahun){
        return $this->db->query("
            SELECT unit.nama_unit, COUNT(*) AS jumlah
            FROM arsip
            JOIN unit ON arsip.id_unit = unit.id_unit
            WHERE YEAR(arsip.waktu_upload) = $tahun
            GROUP BY arsip.id_unit
        ")->result_array();
    }

    function arsip_per_petugas_bulanan($bulan,$tahun){
        return $this->db->query("
            SELECT petugas.nama_petugas, COUNT(*) AS jumlah
            FROM arsip
            JOIN petugas ON arsip.id_petugas = petugas.id_petugas
            WHERE MONTH(arsip.waktu_upload) = $bulan
            AND YEAR(arsip.waktu_upload) = $tahun
            GROUP BY arsip.id_petugas
        ")->result_array();
    }

    function arsip_per_petugas_tahunan($tahun){
        return $this->db->query("
            SELECT petugas.nama_petugas, COUNT(*) AS jumlah
            FROM arsip
            JOIN petugas ON arsip.id_petugas = petugas.id_petugas
            WHERE YEAR(arsip.waktu_upload) = $tahun
            GROUP BY arsip.id_petugas
        ")->result_array();
    }

    /* =========================================================
     * QR
     * ========================================================= */
    function jumlah_qr_bulanan($bulan,$tahun){
        return $this->db
            ->where('MONTH(waktu_generate)', $bulan)
            ->where('YEAR(waktu_generate)', $tahun)
            ->count_all_results('kode_qr');
    }

    function jumlah_qr_tahunan($tahun){
        return $this->db
            ->where('YEAR(waktu_generate)', $tahun)
            ->count_all_results('kode_qr');
    }

    function qr_per_unit_bulanan($bulan,$tahun){
        return $this->db->query("
            SELECT unit.nama_unit, COUNT(*) AS jumlah
            FROM kode_qr
            JOIN unit ON kode_qr.id_unit = unit.id_unit
            WHERE MONTH(kode_qr.waktu_generate) = $bulan
            AND YEAR(kode_qr.waktu_generate) = $tahun
            GROUP BY kode_qr.id_unit
        ")->result_array();
    }

    function qr_per_unit_tahunan($tahun){
        return $this->db->query("
            SELECT unit.nama_unit, COUNT(*) AS jumlah
            FROM kode_qr
            JOIN unit ON kode_qr.id_unit = unit.id_unit
            WHERE YEAR(kode_qr.waktu_generate) = $tahun
            GROUP BY kode_qr.id_unit
        ")->result_array();
    }
}
