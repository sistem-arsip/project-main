<?php
// cek file QR fisik
$file_path  = FCPATH . 'assets/kode_qr/' . $qr['foto_qr'];
$file_exist = (!empty($qr['foto_qr']) && file_exists($file_path));

$file_url = base_url('assets/kode_qr/' . $qr['foto_qr']);
?>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-2">
                <h4 class="m-0 fw-bold text-dark">Detail Kode QR</h4>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-2">
                <div class="mb-3">
                    <a href="<?= base_url('petugas/generate'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card shadow-sm">

                            <!-- CARD HEADER -->
                            <div class="card-header bg-light fw-bold">
                                Informasi Kode QR
                            </div>

                            <!-- CARD BODY -->
                            <div class="card-body">
                                <div class="row">

                                    <!-- INFORMASI QR -->
                                    <div class="col-md-6 mb-3">
                                        <p><strong>Kode QR:</strong> <?= $qr['kode_qr']; ?></p>
                                        <p><strong>Nomor Dokumen:</strong> <?= $qr['nomor_dokumen']; ?></p>
                                        <p><strong>Waktu Generate:</strong> <?= $qr['waktu_generate']; ?></p>
                                        <p><strong>Petugas:</strong> <?= $qr['nama_petugas']; ?></p>
                                        <p><strong>Unit:</strong> <?= $qr['nama_unit']; ?></p>
                                    </div>

                                    <!-- PREVIEW QR -->
                                    <div class="col-md-6 text-center">
                                        <?php if ($file_exist): ?>
                                            <img src="<?= $file_url; ?>"
                                                alt="QR Code"
                                                class="img-thumbnail mb-3"
                                                style="max-width: 250px;">

                                            <br>

                                            <a href="<?= $file_url; ?>"
                                                download
                                                class="btn btn-sm btn-success">
                                                <i class="fa fa-download"></i>
                                                Unduh Kode QR
                                            </a>
                                        <?php else: ?>
                                            <div class="d-flex justify-content-center align-items-center"
                                                style="height: 250px;">
                                                <div class="text-center text-muted">
                                                    <i class="fa fa-qrcode fa-4x mb-3"></i>
                                                    <h6>Kode QR tidak tersedia atau telah terhapus.</h6>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>