<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light p-3 rounded shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Edit Arsip</h4>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container-fluid">
    <div class="row justify-content">
        <div class="col-lg-10">
            <div class="bg-light p-4 rounded shadow-sm">
                <div class="d-flex justify-content-end mb-3">
                    <a href="<?php echo base_url('petugas/arsip'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <!-- Hidden ID Arsip -->
                    <input type="hidden" name="id_arsip" value="<?php echo $arsip['id_arsip']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Kode Arsip</label>
                        <input type="text" class="form-control" name="kode_arsip" required value="<?php echo $arsip['kode_arsip']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Arsip</label>
                        <input type="text" class="form-control" name="nama_arsip" required value="<?php echo $arsip['nama_arsip']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" name="id_kategori" required>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id_kategori']; ?>" <?= $k['id_kategori'] == $arsip['id_kategori'] ? 'selected' : ''; ?>>
                                    <?= $k['nama_kategori']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan_arsip" required rows="3"><?php echo $arsip['keterangan_arsip']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">File</label>
                        <input class="form-control" type="file" name="file">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small><br>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Apakah Perlu QR Code?</label>
                        <select class="form-select" name="kode_qr" required>
                            <option value="ya" <?= $arsip['kode_qr'] == 'ya' ? 'selected' : ''; ?>>Ya</option>
                            <option value="tidak" <?= $arsip['kode_qr'] == 'tidak' ? 'selected' : ''; ?>>Tidak</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<br>
