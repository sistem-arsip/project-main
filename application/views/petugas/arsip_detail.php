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
    <div class="row justify-content">
        <div class="col-lg-12">
            <div class="bg-light rounded shadow-sm p-3">
                <div class="mb-3">
                    <a href="<?php echo base_url('petugas/arsip'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Waktu</th>
                                    <td><?php echo date('d-m-Y H:i:s', strtotime($arsip['waktu_upload'])); ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Surat / Dokumen</th>
                                    <td><?php echo $arsip['nomor_dokumen']; ?></td>
                                </tr>
                                <?php if (!empty($arsip['kode_qr'])): ?>
                                <tr>
                                    <th>Kode QR</th>
                                    <td><?php echo $arsip['kode_qr']; ?></td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th>Kategori</th>
                                    <td><?php echo $arsip['nama_kategori']; ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis File</th>
                                    <td><?php echo strtoupper($arsip['ekstensi_file_arsip']); ?></td>
                                </tr>
                                <tr>
                                    <th>Unit</th>
                                    <td><?php echo $arsip['nama_unit']; ?></td>
                                </tr>
                                <tr>
                                    <th>Petugas</th>
                                    <td><?php echo $arsip['nama_petugas']; ?></td>
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
                        <a href="<?php echo $file_url; ?>" download class="btn btn-success mt-3">
                            <i class="fa fa-download"></i> Download File
                        </a>
                    </div>

                    <!-- Kolom Preview Arsip -->
                    <div class="col-lg-8">
                        <?php if ($arsip['ekstensi_file_arsip'] === 'pdf'): ?>
                            <iframe src="<?= $file_url ?>" width="100%" height="500" style="border: none;"></iframe>
                    
                        <?php elseif (in_array($arsip['ekstensi_file_arsip'], ['png', 'jpg', 'jpeg'])): ?>
                            <img src="<?= $file_url ?>" class="w-100 img-fluid rounded shadow-sm" alt="Preview Gambar">
                    
                        <?php elseif (in_array($arsip['ekstensi_file_arsip'], ['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'])): ?>
                                <iframe src="https://view.officeapps.live.com/op/embed.aspx?src=<?= urlencode($file_url) ?>" width="100%" height="500" frameborder="0"></iframe>

                        <?php elseif ($arsip['ekstensi_file_arsip'] === 'zip'): ?>
                            <div class="alert alert-info">
                                File <strong>ZIP</strong> tidak dapat dipreview di browser.<br>Silakan <strong>Download</strong> untuk membuka file.
                            </div>
                    
                        <?php else: ?>
                            <div class="alert alert-warning">
                                Preview tidak tersedia untuk tipe file <strong><?= strtoupper($arsip['ekstensi_file_arsip']) ?></strong>.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<br>