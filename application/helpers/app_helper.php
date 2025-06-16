<?php
function tampil_notifikasi($id_petugas)
{
    $ci =& get_instance();
    $ci->db->where("id_petugas", $id_petugas);
    $ci->db->where("WEEK(waktu_notifikasi) = WEEK(CURDATE())");
    $ci->db->order_by("waktu_notifikasi","DESC");
    $notifikasi = $ci->db->get("notifikasi")->result_array();
    
    return $notifikasi;
}

?>