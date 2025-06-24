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
        <div class="col-lg-10">
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
                                    <th>Kode Arsip</th>
                                    <td><?php echo $arsip['kode_arsip']; ?></td>
                                </tr>
                                <tr>
                                    <th>Waktu</th>
                                    <td><?php echo date('d-m-Y H:i:s', strtotime($arsip['waktu_upload'])); ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Surat</th>
                                    <td><?php echo $arsip['nomor_surat']; ?></td>
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

                        
                        <?php if ($arsip['kode_qr'] == "ya"): ?>
                            <div class="text-center">
                                <img src="<?php echo $qrcode; ?>" class="img-fluid mb-2">
                                <br>
                                <a href="<?= $qrcode ?>" download="<?php echo date("YmHis") ?>_qrcode.png" class="btn btn-success btn-sm">
                                    <i class="fa fa-download"></i> Unduh QR Code
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Kolom Preview Arsip -->
                    <div class="col-lg-8">
                        <?php if ($arsip['ekstensi_file_arsip'] === 'pdf'): ?>
                            <iframe src="<?php echo base_url("assets/arsip/" . $arsip['file_arsip']) ?>" width="100%" height="500" style="border: none;"></iframe>
                        <?php elseif (in_array($arsip['ekstensi_file_arsip'], ['png', 'jpg', 'jpeg'])): ?>
                            <img src="<?php echo base_url("assets/arsip/" . $arsip['file_arsip']) ?>" class="w-100 img-fluid rounded shadow-sm" alt="Preview Gambar">
                        <?php elseif (in_array($arsip['ekstensi_file_arsip'], ['doc', 'docx'])): ?>
                            <iframe src="https://docs.google.com/gview?url=<?php echo base_url("assets/arsip/" . $arsip['file_arsip']) ?>&embedded=true" width="100%" height="500" style="border: none;"></iframe>
                        <?php else: ?>
                            <div class="alert alert-warning">Preview untuk tipe file ini tidak tersedia.</div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<br>