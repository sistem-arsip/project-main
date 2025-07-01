<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Edit Nomor Dokumen</h4>
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

                <?php echo form_open(); ?>

                <div class="mb-3">
                    <label for="nomor_dokumen" class="form-label"><strong>Nomor Dokumen</strong></label>
                    <input type="text" class="form-control" name="nomor_dokumen" id="nomor_dokumen" value="<?php echo set_value('nomor_dokumen', isset($qr['nomor_dokumen']) ? $qr['nomor_dokumen'] : ''); ?>">
                    <?php echo form_error('nomor_dokumen', "<div class='text-danger small'>", "</div>"); ?>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Simpan Perubahan
                </button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
