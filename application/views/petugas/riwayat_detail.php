<?php
$riwayat['ekstensi_file_arsip'] = pathinfo($riwayat['file_arsip'], PATHINFO_EXTENSION);
?>
<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h4 style="margin: 0; font-weight: bold; color: #333;">Preview Arsip</h4>
            </div>
        </div>
    </div>
</div><br>
<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12">
        </div>
    </div>
</div><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel">
                <div class="panel-body">
                    <a href="<?php echo base_url('petugas/riwayat'); ?>" class="btn btn-sm" style="background-color: #38E54D;"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <table class="table">
                                <tr>
                                    <th>Kode Arsip:</th>
                                    <td><?php echo $riwayat['kode_arsip']; ?></td>
                                </tr>
                                <tr>
                                    <th>Waktu Upload:</th>
                                    <td><?php echo date('H:i:s  d-m-Y', strtotime($riwayat['waktu_upload'])) ?></td>
                                </tr>
                                <tr>
                                    <th>Nama File:</th>
                                    <td><?php echo $riwayat['nama_arsip']; ?></td>
                                </tr>
                                <tr>
                                    <th>Kategori:</th>
                                    <td><?php echo $riwayat['nama_kategori']; ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis File:</th>
                                    <td><?php echo strtoupper($riwayat['ekstensi_file_arsip']); ?></td>
                                </tr>
                                <tr>
                                    <th>Petugas Pengupload:</th>
                                    <td>Bagian <?php echo $riwayat['nama_unit']; ?></td>
                                </tr>
                                <tr>
                                    <th>Keterangan:</th>
                                    <td><?php echo $riwayat['keterangan_arsip']; ?></td>
                                </tr>
                            </table>

                            <img src="<?php echo $qrcode ?>" class="img-fluid">
                            <div class="mb-2">
                                <a href="<?= $qrcode ?>" download="<?php echo date("YmHis") ?>_qrcode.png" class="btn" style="background-color: #38E54D;">Unduh QR Code</a>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <?php if ($riwayat['ekstensi_file_arsip'] == "pdf"): ?>
                                <iframe src="<?php echo base_url("assets/arsip/" . $riwayat['file_arsip']) ?>" width="100%" height="500"></iframe>
                            <?php endif ?>

                            <?php if (in_array($riwayat['ekstensi_file_arsip'], ['png', 'jpg', 'jpeg'])): ?>
                                <img src="<?php echo base_url("assets/arsip/" . $riwayat['file_arsip']) ?>" class="w-100 img-fluid">
                            <?php endif ?>

                            <?php if (in_array($riwayat['ekstensi_file_arsip'], ['doc', 'docx'])): ?>
                                <iframe src="https://docs.google.com/gview?url=<?php echo base_url("assets/arsip/" . $riwayat['file_arsip']) ?>&embedded=true"></iframe>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>