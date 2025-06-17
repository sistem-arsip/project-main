<?php
$riwayat['ekstensi_file_arsip'] = pathinfo($riwayat['file_arsip'], PATHINFO_EXTENSION);
?>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light p-3 rounded shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Preview Arsip</h4>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container-fluid">
    <div class="row justify-content">
        <div class="col-lg-11">
            <div class="bg-light rounded shadow-sm p-3">
                <div class="mb-3">
                    <a href="<?php echo base_url('petugas/riwayat'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="row">
                    <!-- Informasi Arsip -->
                    <div class="col-lg-4">
                        <div class="table-responsive mb-4">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Kode Arsip</th>
                                    <td><?php echo $riwayat['kode_arsip']; ?></td>
                                </tr>
                                <tr>
                                    <th>Waktu</th>
                                    <td><?php echo date('d-m-Y', strtotime($riwayat['waktu_upload'])); ?></td>
                                </tr>
                                <tr>
                                    <th>Nama File</th>
                                    <td><?php echo $riwayat['nama_arsip']; ?></td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td><?php echo $riwayat['nama_kategori']; ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis File</th>
                                    <td><?php echo strtoupper($riwayat['ekstensi_file_arsip']); ?></td>
                                </tr>
                                <tr>
                                    <th>Petugas Pengupload</th>
                                    <td>Bagian <?php echo $riwayat['nama_unit']; ?></td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td><?php echo $riwayat['keterangan_arsip']; ?></td>
                                </tr>
                            </table>
                        </div>

                        <div class="text-center">
                            <img src="<?php echo $qrcode; ?>" class="img-fluid mb-2">
                            <br>
                            <a href="<?= $qrcode ?>" download="<?php echo date("YmHis") ?>_qrcode.png" class="btn btn-success btn-sm">
                                <i class="fa fa-download"></i> Unduh QR Code
                            </a>
                        </div>
                    </div>

                    <!-- Preview Arsip -->
                    <div class="col-lg-8">
                        <?php if ($riwayat['ekstensi_file_arsip'] === "pdf"): ?>
                            <iframe src="<?php echo base_url("assets/arsip/" . $riwayat['file_arsip']) ?>" width="100%" height="500" style="border: none;"></iframe>
                        <?php elseif (in_array($riwayat['ekstensi_file_arsip'], ['png', 'jpg', 'jpeg'])): ?>
                            <img src="<?php echo base_url("assets/arsip/" . $riwayat['file_arsip']) ?>" class="img-fluid w-100">
                        <?php elseif (in_array($riwayat['ekstensi_file_arsip'], ['doc', 'docx'])): ?>
                            <iframe src="https://docs.google.com/gview?url=<?php echo base_url("assets/arsip/" . $riwayat['file_arsip']) ?>&embedded=true" width="100%" height="500" style="border: none;"></iframe>
                        <?php else: ?>
                            <div class="alert alert-warning">File tidak dapat ditampilkan dalam pratinjau.</div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>