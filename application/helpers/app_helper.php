<?php
function tampil_notifikasi($id_petugas){
    $ci =& get_instance();
    $ci->db->where("id_petugas", $id_petugas);
    $ci->db->where("MONTH(waktu_notifikasi)", date('m'));
    $ci->db->where("YEAR(waktu_notifikasi)", date('Y'));
    $ci->db->order_by("waktu_notifikasi", "DESC");
    $notifikasi = $ci->db->get("notifikasi")->result_array();
    
    return $notifikasi;
}

function tampil_notif_admin(){
    $ci =& get_instance();
    $ci->db->where("MONTH(waktu_notif_admin)", date('m'));
    $ci->db->where("YEAR(waktu_notif_admin)", date('Y'));
    $ci->db->order_by("waktu_notif_admin", "DESC");
    $notifikasi = $ci->db->get("notifikasi_admin")->result_array();
    
    return $notifikasi;
}

function status_notifikasi_admin(){
    $notifikasi = tampil_notif_admin();
    $notif_belum_dibaca = false;

    foreach ($notifikasi as $n) {
        if ($n['status_notif_admin'] == 'belum') {
            $notif_belum_dibaca = true;
            break;
        }
    }

    return [
        'notifikasi' => $notifikasi,
        'notif_belum_dibaca' => $notif_belum_dibaca
    ];
}

function status_notifikasi_petugas($id_petugas) {
    $notifikasi = tampil_notifikasi($id_petugas);
    $notif_belum_dibaca = false;

    foreach ($notifikasi as $n) {
        if ($n['status_notifikasi'] == 'belum') {
            $notif_belum_dibaca = true;
            break;
        }
    }

    return [
        'notifikasi' => $notifikasi,
        'notif_belum_dibaca' => $notif_belum_dibaca
    ];
}

function format_tanggal_indo($datetime) {
    $bulanIndo = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    $timestamp = strtotime($datetime);
    $tanggal = date('d', $timestamp);
    $bulan = $bulanIndo[(int)date('m', $timestamp)];
    $tahun = date('Y', $timestamp);

    return "{$tanggal} {$bulan} {$tahun}";
}

/* FORMAT TANGGAL + JAM WIB */
function format_datetime_indo($datetime){
    $bulanIndo = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    $timestamp = strtotime($datetime);
    $tanggal = date('d', $timestamp);
    $bulan   = $bulanIndo[(int)date('m', $timestamp)];
    $tahun   = date('Y', $timestamp);
    $jam     = date('H:i', $timestamp);

    return $tanggal.' '.$bulan.' '.$tahun.' '.$jam.' WIB';
}

/* PERIODE LAPORAN BULANAN */
function periode_bulanan_indo($bulan, $tahun){
    $bulanIndo = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    return $bulanIndo[(int)$bulan].' '.$tahun;
}

/* PERIODE LAPORAN TAHUNAN */
function periode_tahunan_indo($tahun){
    return 'Tahun '.$tahun;
}

?>
