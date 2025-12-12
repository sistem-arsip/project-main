<?php
$arsip['ekstensi_file_arsip'] = pathinfo($arsip['file_arsip'], PATHINFO_EXTENSION);
?>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Preview Arsip</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="bg-light rounded shadow-sm p-3">
                <?php
                    $unit_id = $this->input->get('unit_id');

                    if ($unit_id) {
                        $back_url = base_url('admin/arsip/arsip_perunit/' . $unit_id);
                    } else {
                        $back_url = base_url('admin/arsip/all_arsip');
                    }
                ?>


                <a href="<?php echo $back_url; ?>" class="btn btn-sm mb-3 btn-outline-dark">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>


                <div class="row">
                    <div class="col-lg-4">
                        <div class="table-responsive mb-4">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Waktu</th>
                                    <td><?php echo date('H:i:s  d-m-Y', strtotime($arsip['waktu_upload'])) ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Surat</th>
                                    <td><?php echo $arsip['nomor_dokumen']; ?></td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td><?php echo $arsip['nama_kategori']; ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis File</th>
                                    <td><?php echo strtoupper($arsip['ekstensi_file_arsip']); ?></td>
                                </tr>
                                <tr>
                                    <th>Petugas Pengupload</th>
                                    <td>Bagian <?php echo $arsip['nama_unit']; ?></td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td><?php echo $arsip['keterangan_arsip']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <?php
                        $file_url = base_url("assets/arsip/" . $arsip['file_arsip']);
                        ?>
                        <a href="<?php echo $file_url; ?>" download class="btn btn-sm btn-success mt-3">
                            <i class="fa fa-download"></i> Download File
                        </a>
                    </div>

                    


                    <div class="col-lg-8">
                        <?php if ($arsip['ekstensi_file_arsip'] == "pdf"): ?>
                            <iframe src="<?php echo base_url("assets/arsip/" . $arsip['file_arsip']) ?>" width="100%" height="500"></iframe>
                        <?php endif; ?>

                        <?php if (in_array($arsip['ekstensi_file_arsip'], ['png', 'jpg', 'jpeg'])): ?>
                            <img src="<?php echo base_url("assets/arsip/" . $arsip['file_arsip']) ?>" class="w-100 img-fluid">
                        <?php endif; ?>

                        <?php if (in_array($arsip['ekstensi_file_arsip'], ['doc', 'docx'])): ?>
                            <iframe src="https://docs.google.com/gview?url=<?php echo base_url("assets/arsip/" . $arsip['file_arsip']) ?>&embedded=true" width="100%" height="500"></iframe>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<br>