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
                    <a href="<?php echo base_url('petugas/generate'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 mb-3">
                        <p><strong>Kode QR:</strong> <?php echo $qr['kode_qr']; ?></p>
                        <p><strong>Nomor Dokumen:</strong> <?php echo $qr['nomor_dokumen']; ?></p>
                        <p><strong>Waktu Generate:</strong> <?php echo $qr['waktu_generate']; ?></p>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="<?php echo base_url('assets/kode_qr/' . $qr['foto_qr']); ?>" alt="QR Code" class="img-thumbnail mb-3" style="max-width: 250px;">
                        <br>
                        <a href="<?php echo base_url('assets/kode_qr/' . $qr['foto_qr']); ?>" download class="btn btn-sm btn-success">
                            <i class="fa fa-download"></i> Unduh QR Code
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>