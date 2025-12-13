<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Generate Kode QR</h4>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container-fluid">
    <div class="row justify-content">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-3">
                <div class="mb-3">
                    <a href="<?php echo base_url('petugas/generate'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <form method="post" novalidate>
                    <div class="mb-3">
                        <label class="form-label">Masukkan Nomor Surat/Dokumen</label>
                        <input type="text" class="form-control" name="nomor_dokumen" value="<?php echo set_value('nomor_dokumen') ?>">
                        <?php echo form_error('nomor_dokumen', "<div class='text-danger small'>", "</div>") ?>
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-sm btn-success text-light">
                            <i class="fa fa-plus"></i> Generate Kode QR
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>