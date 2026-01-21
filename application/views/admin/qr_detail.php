<?php
// cek file QR fisik
$file_path  = FCPATH . 'assets/kode_qr/' . $qr['foto_qr'];
$file_exist = (!empty($qr['foto_qr']) && file_exists($file_path));

$file_url = base_url('assets/kode_qr/' . $qr['foto_qr']) . '?v=' . time();
?>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Detail Kode QR</h4>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-3">

                <div class="mb-3">
                    <a href="<?= base_url('admin/kode_qr/qr_perunit/' . $id_unit); ?>"
                        class="btn btn-sm btn-outline-dark">
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

                                    <!-- INFO QR -->
                                    <div class="col-md-6 mb-3">
                                    <table class="table table-bordered table-sm mb-0 w-100 info-qr-table">
                                        <tr>
                                            <th style="width:40%">Kode QR</th>
                                            <td><?= $qr['kode_qr']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Dokumen</th>
                                            <td><?= $qr['nomor_dokumen']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Waktu Generate</th>
                                            <td><?= $qr['waktu_generate']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Petugas</th>
                                            <td><?= $qr['nama_petugas']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Unit</th>
                                            <td><?= $qr['nama_unit']; ?></td>
                                        </tr>
                                    </table>
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
                                                    <h6>Kode QR tidak tersedia atau telah terhapus</h6>
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