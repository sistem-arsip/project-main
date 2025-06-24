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
            <div class="bg-light rounded shadow-sm p-3">
                <div class="d-flex justify-content-end mb-3">
                    <a href="<?php echo base_url('petugas/riwayat'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_arsip" value="<?php echo $arsip['id_arsip']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Kode Arsip</label>
                        <input type="text" class="form-control" name="kode_arsip" required value="<?php echo $arsip['kode_arsip']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Surat</label>
                        <input type="text" class="form-control" name="nomor_surat" required value="<?php echo $arsip['nomor_surat']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" name="id_kategori" required>
                            <option value="">Pilih kategori</option>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id_kategori']; ?>" <?= $k['id_kategori'] == $arsip['id_kategori'] ? 'selected' : ''; ?>>
                                    <?= $k['nama_kategori']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan_arsip" rows="3" required><?php echo $arsip['keterangan_arsip']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">File</label>
                        <input type="file" class="form-control" name="file">
                        <div class="form-text">Kosongkan jika tidak ingin mengubah file.</div>
                        <?php if (!empty($arsip['file_arsip'])): ?>
                            <a href="<?= base_url('assets/arsip/' . $arsip['file_arsip']); ?>" target="_blank" class="d-inline-block mt-2">Lihat file saat ini</a>
                        <?php endif; ?>
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
