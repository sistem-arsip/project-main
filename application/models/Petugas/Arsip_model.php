<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Arsip_model extends CI_Model {
    function unit_by_petugas($id_petugas){
        $query = $this->db->get_where('petugas', ['id_petugas' => $id_petugas]);
        $data = $query->row_array();
        return $data['id_unit'];
    }

    function tampil_by_unit($id_unit) {
        $this->db->join('kategori', 'arsip.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('unit', 'arsip.id_unit = unit.id_unit', 'left');
        $this->db->join('petugas', 'arsip.id_petugas = petugas.id_petugas', 'left');
        $this->db->where('arsip.id_unit', $id_unit);
        $query = $this->db->get("arsip");
        return $query->result_array();
    }

    function detail($id_arsip){
		$this->db->join('kategori', 'arsip.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('unit', 'arsip.id_unit = unit.id_unit', 'left');
        $this->db->join('petugas', 'arsip.id_petugas = petugas.id_petugas', 'left');
		$this->db->where('arsip.id_arsip', $id_arsip);
		$query = $this->db->get("arsip");
		$data = $query->row_array();
		return $data;
	}

    function simpan($inputan) {
        // Konfigurasi upload file arsip
        $config['upload_path']   = './assets/arsip/';
        $config['allowed_types'] = 'pdf|doc|docx|jpg|png';
        $config['max_size']      = 10000;
    
        $this->load->library('upload', $config);
    
        // Lakukan upload file (dari input name="file")
        $ngupload = $this->upload->do_upload('file_arsip');
    
        // Jika berhasil, simpan nama file ke array inputan
        if ($ngupload) {
            $inputan['file_arsip'] = $this->upload->data('file_name');
            // Simpan ke tabel arsip
            $this->db->insert('arsip', $inputan);
            return "sukses";
        } else {
            return "gagal";
        }
    }

    function detail_ubah($id_arsip){
		$this->db->where('arsip.id_arsip', $id_arsip);
		$query = $this->db->get("arsip");
		$data = $query->row_array();
		return $data;
	}

    function ubah($id_arsip, $data) {
        $this->db->where('id_arsip', $id_arsip);
        $this->db->update('arsip', $data);
    }
    
    function hapus($id_arsip){
            $this->db->where('id_arsip', $id_arsip);
            $this->db->delete('arsip');
    }
    

    
    
}
?>
