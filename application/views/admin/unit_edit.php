<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Edit Unit</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="bg-light rounded shadow-sm p-2">
                <div class="mb-3">
                    <a href="<?php echo base_url('admin/unit'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <form method="post">
                    <input type="hidden" name="id_unit" value="<?php echo set_value("nama_unit", $unit['id_unit']) ?>">

                    <div class="mb-3">
                        <label for="nama_unit" class="form-label">Nama Unit</label>
                        <input type="text" id="nama_unit" class="form-control" name="nama_unit" value="<?php echo set_value("nama_unit", $unit['nama_unit']) ?>">
                        <?php if (!form_error('nama_unit')): ?>
                                <div class="text-muted small mt-1">
                                    Nama unit hanya boleh mengandung huruf, angka, spasi, titik (.), tanda minus (-), dan underscore (_).
                                </div>
                            <?php endif; ?>
                        <?php echo form_error('nama_unit', "<div class='text-danger small mt-1'>", "</div>") ?>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan_unit" class="form-label">Keterangan</label>
                        <textarea id="keterangan_unit" class="form-control" name="keterangan_unit"><?php echo set_value("keterangan_unit", $unit['keterangan_unit']); ?></textarea>
                        <?php echo form_error('keterangan_unit', "<div class='text-danger small'>", "</div>") ?>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fa fa-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>