<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Cek login user
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'petugas_login') {
            redirect('auth/login', 'refresh'); 
        }
    
        // Load model
        $this->load->model('petugas/Arsip_model');
        $this->load->model('petugas/Kategori_model');
    }

    public function periksa_html($str){
        $clean = strip_tags($str);
        if ($str !== $clean) {
            $this->form_validation->set_message('periksa_html', 'Input tidak boleh mengandung tag HTML.');
            return FALSE;
        }
        return TRUE;
    }

    function index() {
        $id_kategori = $this->input->get('kategori');
        $bulan       = $this->input->get('bulan');

        $id_petugas = $this->session->userdata('id_petugas'); 
        $id_unit = $this->Arsip_model->unit_by_petugas($id_petugas);
        $data["arsip"] = $this->Arsip_model->tampil_by_unit($id_unit, $id_kategori, $bulan);

        $data["kategori"] = $this->Kategori_model->tampil_semua();

        // kirim filter aktif ke view
        $data['kategori_aktif'] = $id_kategori;
        $data['bulan_aktif']   = $bulan;
        
        $this->load->view("petugas/header");
        $this->load->view("petugas/arsip_tampil",$data);
        $this->load->view("petugas/footer");
    }

    function detail($id_arsip){
        $data["arsip"] = $this->Arsip_model->detail($id_arsip);

        
        $this->load->view("petugas/header");
        $this->load->view("petugas/arsip_detail",$data);
        $this->load->view("petugas/footer");
    }

    function tambah() {

        $id_petugas = $this->session->userdata('id_petugas');
        $id_unit = $this->Arsip_model->unit_by_petugas($id_petugas);

        $kategori = $this->Kategori_model->tampil();
        
        //cek unit
        $nama_unit = $this->Arsip_model->get_nama_unit($id_unit);

        if (strtolower($nama_unit) !== 'unit c') {
            // Filter agar kategori "Warta Tahunan" tidak muncul
            $kategori = array_filter($kategori, function($k) {
                        $nama = strtolower($k['nama_kategori']);
                        return $nama !== 'warta tahunan' && $nama !== 'warta ngabar';
            });
        }

        $data["kategori"] = $kategori;

        $this->form_validation->set_rules("id_kategori", "Kategori", "required");
        $this->form_validation->set_rules("keterangan_arsip", "Keterangan Arsip", "required|trim|callback_periksa_html");
        $this->form_validation->set_rules("kode_qr_status", "Status Kode QR", "required");

        $qr_status = $this->input->post("kode_qr_status");

        if ($qr_status === "ya") {
            $this->form_validation->set_rules("kode_qr", "Kode QR", "required|is_unique[arsip.kode_qr]|trim|callback_periksa_html");
        } else {
            $this->form_validation->set_rules("nomor_dokumen", "Nomor Dokumen", "required|is_unique[arsip.nomor_dokumen]|trim|callback_periksa_html");
        }

        $this->form_validation->set_message("required", "%s wajib diisi");
        $this->form_validation->set_message("is_unique", "%s sudah digunakan!");

        if ($this->form_validation->run() === TRUE) {
            if (empty($_FILES['file_arsip']['name'])) {
                $data['error_file'] = "<div class='text-danger small'>File Arsip wajib diisi</div>";
            } else {
                $inputan = [
                    'id_petugas'        => $this->session->userdata('id_petugas'),
                    'id_unit'           => $this->Arsip_model->unit_by_petugas($this->session->userdata('id_petugas')),
                    'id_kategori'       => $this->input->post("id_kategori"),
                    'keterangan_arsip'  => $this->input->post("keterangan_arsip"),
                    'nomor_dokumen'     => $this->input->post("nomor_dokumen"), 
                    'kode_qr'           => null,
                ];

                $qr_status = $this->input->post("kode_qr_status");

                if ($qr_status === "ya") {
                    $kode_qr = $this->input->post("kode_qr");
                    $qr_data = $this->Arsip_model->get_nomor_by_kode_qr($kode_qr);

                    if ($qr_data) {
                        $inputan['nomor_dokumen'] = $qr_data['nomor_dokumen'];
                        $inputan['kode_qr'] = $kode_qr;
                    } else {
                        $this->session->set_flashdata('gagal', 'Kode QR tidak ditemukan atau belum tersedia.');
                        redirect('petugas/arsip/tambah');
                        return;
                    }
                } else {
                    $inputan['nomor_dokumen'] = $this->input->post("nomor_dokumen");
                    $inputan['kode_qr'] = null;
                }

                // Upload file
                $config['upload_path']   = './assets/arsip/';
                $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|jpeg|png|ppt|pptx|zip';
                $config['max_size']      = 20000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_arsip')) {
                    $inputan['file_arsip'] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('gagal', 'Gagal upload file arsip: ' . $this->upload->display_errors('', ''));
                    redirect('petugas/arsip/tambah');
                    return;
                }

                $hasil = $this->Arsip_model->simpan($inputan);

                if ($hasil == "sukses") {
                    $this->session->set_flashdata('sukses', 'Arsip berhasil ditambahkan');
                    redirect('petugas/arsip');
                } else {
                    $this->session->set_flashdata('gagal', 'Gagal menyimpan arsip');
                    redirect('petugas/arsip/tambah');
                }
            }
        }
        
        $this->load->view('petugas/header');
        $this->load->view('petugas/arsip_tambah', $data);
        $this->load->view('petugas/footer');
    }
    
    function nomor_dokumen_cek($nomor) {
        $id_arsip = $this->uri->segment(4); 
        if ($this->Arsip_model->cek_nomor_dokumen($nomor, $id_arsip)) {
            $this->form_validation->set_message('nomor_dokumen_cek', 'Nomor Dokumen sudah digunakan!');
            return FALSE;
        }
        return TRUE;
    }

    function edit($id_arsip) {
        $data["arsip"] = $this->Arsip_model->detail_ubah($id_arsip);
        
        $id_petugas = $this->session->userdata('id_petugas');
        $id_unit = $this->Arsip_model->unit_by_petugas($id_petugas);
        $nama_unit = $this->Arsip_model->get_nama_unit($id_unit);

        $kategori = $this->Kategori_model->tampil();

        if (strtolower($nama_unit) !== 'unit c') {
            $kategori = array_filter($kategori, function($k) {
                return strtolower($k['nama_kategori']) !== 'kategori c';
            });
        }

        $data["kategori"] = $kategori;

        $inputan = $this->input->post();

        if (!empty($inputan)) {
            $this->form_validation->set_rules("keterangan_arsip","Keterangan Arsip","required|trim|callback_periksa_html");

            // validasi nomor dokumen  kalau arsip TIDAK punya kode_qr
            if (empty($data['arsip']['kode_qr'])) {
                $this->form_validation->set_rules("nomor_dokumen","Nomor Dokumen","required|trim|callback_periksa_html|callback_nomor_dokumen_cek");
            }

            $this->form_validation->set_message("required", "%s wajib diisi");

            if ($this->form_validation->run() === TRUE) {
            
                $inputan['id_petugas'] = $this->session->userdata('id_petugas');
                $inputan['id_unit'] = $this->Arsip_model->unit_by_petugas(
                    $this->session->userdata('id_petugas')
                );

                // kode QR
                if (!empty($data['arsip']['kode_qr'])) {
                    //  arsip punya QR : tetap pakai data lama
                    $inputan['kode_qr'] = $data['arsip']['kode_qr'];
                    $inputan['nomor_dokumen'] = $data['arsip']['nomor_dokumen'];
                } else {
                    // tidak punya QR : ambil nomor dokumen dari input
                    $inputan['kode_qr'] = null;
                    $inputan['nomor_dokumen'] = $this->input->post("nomor_dokumen");
                }

                if (!empty($_FILES['file']['name'])) {
                    $config['upload_path']   = './assets/arsip/';
                    $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|jpeg|png|ppt|pptx|zip';
                    $config['max_size']      = 10000;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('file')) {
                        $inputan['file_arsip'] = $this->upload->data('file_name');
                    } else {
                        $this->session->set_flashdata(
                            'gagal',
                            'Gagal upload file arsip: ' . $this->upload->display_errors('', '')
                        );
                        redirect('petugas/arsip/edit/' . $id_arsip);
                        return;
                    }
                } else {
                    //pakai file lama
                    $inputan['file_arsip'] = $data['arsip']['file_arsip'];
                }

                $this->Arsip_model->ubah($id_arsip, $inputan);

                $this->session->set_flashdata('sukses', 'Arsip berhasil diubah');
                redirect('petugas/arsip', 'refresh');
            }
        }

        $this->load->view('petugas/header');
        $this->load->view('petugas/arsip_edit', $data);
        $this->load->view('petugas/footer');
    }


    function hapus($id_arsip){

        $arsip = $this->Arsip_model->detail($id_arsip);

        
        // if(!empty($arsip['file_arsip']))
        // {
        //     if (file_exists("assets/arsip/".$arsip['file_arsip'])) {
        //         unlink(""assets/arsip/".$arsip['file_arsip']");
        //     }
        // }
        
        $this->Arsip_model->hapus($id_arsip);

        $this->session->set_flashdata('sukses', 'Arsip berhasil dihapus');
        redirect('petugas/arsip', 'refresh');
    }
 
}
