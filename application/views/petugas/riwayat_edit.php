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
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-2">
                <div class="mb-3">
                    <a href="<?php echo base_url('petugas/riwayat'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_arsip" value="<?php echo $riwayat['id_arsip']; ?>">

                    <?php if (!empty($riwayat['kode_qr'])): ?>
                        <div class="mb-3">
                            <label class="form-label">Kode QR</label>
                            <input type="text" class="form-control" name="kode_qr" value="<?php echo $riwayat['kode_qr']; ?>"
                                <?php echo !empty($riwayat['kode_qr']) ? 'readonly' : ''; ?>>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label">Nomor Surat / Dokumen</label>
                        <input type="text" class="form-control" name="nomor_dokumen" value="<?php echo $riwayat['nomor_dokumen']; ?>"
                            <?php echo !empty($riwayat['kode_qr']) ? 'readonly' : ''; ?>>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" name="id_kategori" required>
                            <option value="">Pilih kategori</option>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id_kategori']; ?>" <?= $k['id_kategori'] == $riwayat['id_kategori'] ? 'selected' : ''; ?>>
                                    <?= $k['nama_kategori']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan_arsip" rows="3" required><?php echo $riwayat['keterangan_arsip']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">File</label>
                        <input type="file" class="form-control" name="file">
                        <div class="form-text">Kosongkan jika tidak ingin mengubah file.</div>
                        <?php if (!empty($riwayat['file_arsip'])): ?>
                            <a href="<?= base_url('assets/arsip/' . $riwayat['file_arsip']); ?>" target="_blank" class="btn btn-sm btn-secondary mt-2">Lihat file saat ini</a>
                        <?php endif; ?>
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
<br>
