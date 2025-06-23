<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Upload Arsip</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row justify-content">
        <div class="col-10">
            <div class="bg-light rounded shadow-sm p-3">
                <div class="d-flex justify-content-end mb-3">
                    <a href="<?php echo base_url('petugas/arsip'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <form method="post" novalidate enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Kode Arsip</label>
                        <input type="text" class="form-control" name="kode_arsip" value="<?php echo set_value('kode_arsip') ?>" required>
                        <?php echo form_error('kode_arsip', "<div class='text-danger small'>", "</div>") ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Arsip</label>
                        <input type="text" class="form-control" name="nama_arsip" value="<?php echo set_value('nama_arsip') ?>" required>
                        <?php echo form_error('nama_arsip', "<div class='text-danger small'>", "</div>") ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" name="id_kategori" required>
                            <option value="">Pilih kategori</option>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id_kategori']; ?>" <?= set_select('id_kategori', $k['id_kategori']) ?>>
                                    <?= $k['nama_kategori']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('id_kategori', "<div class='text-danger small'>", "</div>") ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan_arsip" required><?php echo set_value('keterangan_arsip') ?></textarea>
                        <?php echo form_error('keterangan_arsip', "<div class='text-danger small'>", "</div>") ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File</label>
                        <input type="file" class="form-control" name="file_arsip" accept="image/*, .docx, .pdf">
                        <?php if (!empty($error_file)) echo $error_file; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apakah Perlu QR Code ?</label>
                        <select class="form-select" name="kode_qr" required>
                            <option value="">Pilih QR Code</option>
                            <option value="ya" <?= set_select('kode_qr', 'ya') ?>>Ya</option>
                            <option value="tidak" <?= set_select('kode_qr', 'tidak') ?>>Tidak</option>
                        </select>
                        <?php echo form_error('kode_qr', "<div class='text-danger small'>", "</div>") ?>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success text-light">
                            <i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>