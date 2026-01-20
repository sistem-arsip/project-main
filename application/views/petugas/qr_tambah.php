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
            <div class="bg-light rounded shadow-sm p-2">
                <div class="mb-2">
                    <a href="<?php echo base_url('petugas/generate'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <form method="post" novalidate>
                    <div class="mb-3">
                        <label class="form-label">Masukkan Nomor Surat/Dokumen</label>
                        <input type="text" class="form-control" name="nomor_dokumen" value="<?php echo set_value('nomor_dokumen') ?>">
                         <?php if (!form_error('nomor_dokumen')): ?>
                            <div class="form-text">
                                Nomor surat/dokumen dapat berupa huruf, angka, spasi, titik (.), tanda minus (-), underscore (_), dan garis miring (/).
                            </div>
                        <?php endif; ?>
                        <?php echo form_error('nomor_dokumen', "<div class='text-danger small'>", "</div>") ?>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-sm btn-success text-light">
                            <i class="fa fa-plus"></i> Buat Kode QR
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>