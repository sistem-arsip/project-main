<?php
$riwayat['ekstensi_file_arsip'] = pathinfo($riwayat['file_arsip'], PATHINFO_EXTENSION);

// cek file fisik
$file_path  = FCPATH . 'assets/arsip/' . $riwayat['file_arsip'];
$file_exist = (!empty($riwayat['file_arsip']) && file_exists($file_path));

$file_url = base_url("assets/arsip/" . $riwayat['file_arsip']);
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
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-2">

                <div class="mb-3">
                    <a href="<?= base_url('petugas/riwayat'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="row">
                    <!-- INFORMASI ARSIP -->
                    <div class="col-lg-4">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Waktu</th>
                                    <td><?= date('d-m-Y H:i:s', strtotime($riwayat['waktu_upload'])); ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Surat / Dokumen</th>
                                    <td><?= $riwayat['nomor_dokumen']; ?></td>
                                </tr>

                                <?php if (!empty($riwayat['kode_qr'])): ?>
                                <tr>
                                    <th>Kode QR</th>
                                    <td><?= $riwayat['kode_qr']; ?></td>
                                </tr>
                                <?php endif; ?>

                                <tr>
                                    <th>Kategori</th>
                                    <td><?= $riwayat['nama_kategori']; ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis File</th>
                                    <td><?= strtoupper($riwayat['ekstensi_file_arsip']); ?></td>
                                </tr>
                                <tr>
                                    <th>Unit</th>
                                    <td><?= $riwayat['nama_unit']; ?></td>
                                </tr>
                                <tr>
                                    <th>Petugas</th>
                                    <td><?= $riwayat['nama_petugas']; ?></td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td><?= $riwayat['keterangan_arsip']; ?></td>
                                </tr>
                            </table>
                        </div>

                        <?php if ($file_exist): ?>
                            <a href="<?= $file_url; ?>" download class="btn btn-sm btn-success">
                                <i class="fa fa-download"></i> Download File
                            </a>
                        <?php else: ?>
                            <div class="alert alert-warning mt-3">
                                <i class="fa fa-exclamation-triangle"></i>
                                File arsip tidak tersedia atau telah dihapus dari server.
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- PREVIEW ARSIP -->
                    <div class="col-lg-8">
                        <?php if ($file_exist): ?>

                            <?php if ($riwayat['ekstensi_file_arsip'] === 'pdf'): ?>
                                <iframe src="<?= $file_url ?>" width="100%" height="500" style="border:none;"></iframe>

                            <?php elseif (in_array($riwayat['ekstensi_file_arsip'], ['jpg', 'jpeg', 'png'])): ?>
                                <img src="<?= $file_url ?>" class="img-fluid w-100 rounded shadow-sm" alt="Preview Gambar">

                            <?php elseif (in_array($riwayat['ekstensi_file_arsip'], ['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'])): ?>
                                <iframe src="https://view.officeapps.live.com/op/embed.aspx?src=<?= urlencode($file_url) ?>"
                                        width="100%" height="500" frameborder="0"></iframe>

                            <?php elseif ($riwayat['ekstensi_file_arsip'] === 'zip'): ?>
                                <div class="alert alert-info">
                                    File <strong>ZIP</strong> tidak dapat dipreview di browser.<br>
                                    Silakan <strong>Download</strong> untuk membuka file.
                                </div>

                            <?php else: ?>
                                <div class="alert alert-warning">
                                    Pratinjau tidak tersedia untuk tipe file
                                    <strong><?= strtoupper($riwayat['ekstensi_file_arsip']); ?></strong>.
                                </div>
                            <?php endif; ?>

                        <?php else: ?>
                            <div class="d-flex justify-content-center align-items-center" style="height: 350px;">
                                <div class="text-center text-muted">
                                    <i class="fa fa-file-o fa-4x mb-3"></i>
                                    <h5>File Tidak Ditemukan</h5>
                                    <p>File arsip ini telah dihapus atau tidak tersedia di server.</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<br>
