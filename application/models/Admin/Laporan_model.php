<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {
    /* laporan bulanan */
    function get_laporan_bulanan($bulan, $tahun){
        return [
            'jenis_laporan'  => 'Bulanan',
            'periode'        => periode_bulanan_indo($bulan, $tahun),
            'waktu_download' => format_datetime_indo(date('Y-m-d H:i:s')),
            /* ringkasan */
            'ringkasan' => [
                'Kategori' => $this->db->count_all('kategori'),
                'Unit'     => $this->db->count_all('unit'),
                'Petugas'  => $this->db->count_all('petugas'),
                'Arsip'    => $this->jumlah_arsip_bulanan($bulan,$tahun),
                'Kode QR'  => $this->jumlah_qr_bulanan($bulan,$tahun),
            ],
            /* detail */
            'kategori'           => $this->data_kategori(),
            'pengajuan_kategori' => $this->data_pengajuan_kategori(),
            'unit'               => $this->data_unit(),
            'petugas'            => $this->data_petugas(),

            /* arsip */
            'arsip_detail' => $this->detail_arsip_bulanan($bulan,$tahun),
            'arsip_per_kategori' => $this->arsip_per_kategori_bulanan($bulan,$tahun),
            'arsip_per_unit'     => $this->arsip_per_unit_bulanan($bulan,$tahun),
            'arsip_per_petugas'  => $this->arsip_per_petugas_bulanan($bulan,$tahun),

            /* qr */
            'qr_per_unit'        => $this->qr_per_unit_bulanan($bulan,$tahun)
        ];
    }
    /* laporan tahunan */
    function get_laporan_tahunan($tahun){
        return [
            'jenis_laporan'  => 'Tahunan',
            'periode'        => periode_tahunan_indo($tahun),
            'waktu_download' => format_datetime_indo(date('Y-m-d H:i:s')),

            'ringkasan' => [
                'Kategori' => $this->db->count_all('kategori'),
                'Unit'     => $this->db->count_all('unit'),
                'Petugas'  => $this->db->count_all('petugas'),
                'Arsip'    => $this->jumlah_arsip_tahunan($tahun),
                'Kode QR'  => $this->jumlah_qr_tahunan($tahun),
            ],

            'kategori'           => $this->data_kategori(),
            'pengajuan_kategori' => $this->data_pengajuan_kategori(),
            'unit'               => $this->data_unit(),
            'petugas'            => $this->data_petugas(),

            'arsip_detail' => $this->detail_arsip_tahunan($tahun),
            'arsip_per_kategori' => $this->arsip_per_kategori_tahunan($tahun),
            'arsip_per_unit'     => $this->arsip_per_unit_tahunan($tahun),
            'arsip_per_petugas'  => $this->arsip_per_petugas_tahunan($tahun),

            'qr_per_unit'        => $this->qr_per_unit_tahunan($tahun)
        ];
    }

    /* statis */
    function data_kategori(){
        return $this->db->get('kategori')->result_array();
    }
    function data_pengajuan_kategori(){
        return $this->db->get('pengajuan_kategori')->result_array();
    }
    function data_unit(){
        return $this->db->get('unit')->result_array();
    }
    function data_petugas(){
        return $this->db->join('unit','petugas.id_unit = unit.id_unit','left')->get('petugas')->result_array();
    }
    /* arsip (waktu_upload) */
    function jumlah_arsip_bulanan($bulan,$tahun){
        return $this->db->where('MONTH(waktu_upload)', $bulan)->where('YEAR(waktu_upload)', $tahun)->count_all_results('arsip');
    }
    function jumlah_arsip_tahunan($tahun){
        return $this->db->where('YEAR(waktu_upload)', $tahun)->count_all_results('arsip');
    }
    function detail_arsip_bulanan($bulan,$tahun){
        return $this->db->join('unit','arsip.id_unit = unit.id_unit','left')->join('kategori','arsip.id_kategori = kategori.id_kategori','left')
            ->where('MONTH(arsip.waktu_upload)', $bulan)->where('YEAR(arsip.waktu_upload)', $tahun)->get('arsip')->result_array();
    }
    function detail_arsip_tahunan($tahun){
        return $this->db->join('unit','arsip.id_unit = unit.id_unit','left')->join('kategori','arsip.id_kategori = kategori.id_kategori','left')
            ->where('YEAR(arsip.waktu_upload)', $tahun)->get('arsip')->result_array();
    }
    function arsip_per_kategori_bulanan($bulan,$tahun){
        return $this->db->query("
            SELECT kategori.nama_kategori, COUNT(arsip.id_arsip) AS jumlah
            FROM arsip
            JOIN kategori ON arsip.id_kategori = kategori.id_kategori
            WHERE MONTH(arsip.waktu_upload) = $bulan
            AND YEAR(arsip.waktu_upload) = $tahun
            GROUP BY kategori.id_kategori")->result_array();
    }
    function arsip_per_kategori_tahunan($tahun){
        return $this->db->query("
            SELECT kategori.nama_kategori, COUNT(arsip.id_arsip) AS jumlah
            FROM arsip
            JOIN kategori ON arsip.id_kategori = kategori.id_kategori
            WHERE YEAR(arsip.waktu_upload) = $tahun
            GROUP BY kategori.id_kategori")->result_array();
    }

    function arsip_per_unit_bulanan($bulan,$tahun){
        return $this->db->query("
            SELECT unit.nama_unit, COUNT(arsip.id_arsip) AS jumlah
            FROM arsip
            JOIN unit ON arsip.id_unit = unit.id_unit
            WHERE MONTH(arsip.waktu_upload) = $bulan
            AND YEAR(arsip.waktu_upload) = $tahun
            GROUP BY unit.id_unit")->result_array();
    }
    function arsip_per_unit_tahunan($tahun){
        return $this->db->query("
            SELECT unit.nama_unit, COUNT(arsip.id_arsip) AS jumlah
            FROM arsip
            JOIN unit ON arsip.id_unit = unit.id_unit
            WHERE YEAR(arsip.waktu_upload) = $tahun
            GROUP BY unit.id_unit")->result_array();
    }
    function arsip_per_petugas_bulanan($bulan,$tahun){
        return $this->db->query("
            SELECT petugas.nama_petugas, COUNT(arsip.id_arsip) AS jumlah
            FROM arsip
            JOIN petugas ON arsip.id_petugas = petugas.id_petugas
            WHERE MONTH(arsip.waktu_upload) = $bulan
            AND YEAR(arsip.waktu_upload) = $tahun
            GROUP BY petugas.id_petugas")->result_array();
    }
    function arsip_per_petugas_tahunan($tahun){
        return $this->db->query("
            SELECT petugas.nama_petugas, COUNT(arsip.id_arsip) AS jumlah
            FROM arsip
            JOIN petugas ON arsip.id_petugas = petugas.id_petugas
            WHERE YEAR(arsip.waktu_upload) = $tahun
            GROUP BY petugas.id_petugas")->result_array();
    }
    /* kode qr (waktu_generate) */
    function jumlah_qr_bulanan($bulan,$tahun){
        return $this->db->where('MONTH(waktu_generate)', $bulan)->where('YEAR(waktu_generate)', $tahun)->count_all_results('kode_qr');
    }

    function jumlah_qr_tahunan($tahun){
        return $this->db->where('YEAR(waktu_generate)', $tahun)->count_all_results('kode_qr');
    }
    function qr_per_unit_bulanan($bulan,$tahun){
        return $this->db->query("
            SELECT unit.nama_unit, COUNT(kode_qr.kode_qr) AS jumlah
            FROM kode_qr
            JOIN unit ON kode_qr.id_unit = unit.id_unit
            WHERE MONTH(kode_qr.waktu_generate) = $bulan
            AND YEAR(kode_qr.waktu_generate) = $tahun
            GROUP BY unit.id_unit")->result_array();
    }
    function qr_per_unit_tahunan($tahun){
        return $this->db->query("
            SELECT unit.nama_unit, COUNT(kode_qr.kode_qr) AS jumlah
            FROM kode_qr
            JOIN unit ON kode_qr.id_unit = unit.id_unit
            WHERE YEAR(kode_qr.waktu_generate) = $tahun
            GROUP BY unit.id_unit")->result_array();
    }
}