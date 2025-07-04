<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Tambah Kategori</h4>
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
                    <a href="<?php echo base_url('petugas/kategori'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <form method="post" novalidate>
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" value="<?php echo set_value('nama_kategori') ?>">
                        <?php echo form_error('nama_kategori', "<div class='text-danger small'>", "</div>") ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan_kategori" rows="3"><?php echo set_value('keterangan_kategori') ?></textarea>
                        <?php echo form_error('keterangan_kategori', "<div class='text-danger small'>", "</div>") ?>
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-success text-light">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>