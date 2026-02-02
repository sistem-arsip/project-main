<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Kategori Edit</h4>
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
                    <a href="<?php echo base_url('admin/kategori'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali</a>
                </div>

                <form method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" id="nama_kategori" class="form-control" name="nama_kategori" value="<?php echo set_value('nama_kategori', $kategori['nama_kategori']) ?>">
                        <?php if (!form_error('nama_kategori')): ?>
                                <div class="text-muted small mt-1">
                                    Nama kategori hanya boleh mengandung huruf, angka, spasi, titik (.), tanda minus (-), dan underscore (_).
                                </div>
                            <?php endif; ?>
                        <?php echo form_error('nama_kategori', "<div class='text-danger small mt-1'>", "</div>") ?>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan_kategori" class="form-label">Keterangan</label>
                        <textarea id="keterangan_kategori" class="form-control" name="keterangan_kategori"><?php echo set_value('keterangan_kategori', $kategori['keterangan_kategori']); ?></textarea>
                        <?php echo form_error('keterangan_kategori', "<div class='text-danger small'>", "</div>") ?>
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