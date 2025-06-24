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


function status_notif_admin(){
    $ci =& get_instance();
    $ci->db->where("status_notif", 0);
    $ci->db->limit(1);
    $query = $ci->db->get("notifikasi_admin");
    return $query->num_rows() > 0;
}
?>
