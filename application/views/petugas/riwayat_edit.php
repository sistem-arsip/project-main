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

                        <?php if (!empty($riwayat['kode_qr'])): ?>
                            <div class="mb-3">
                                <label class="form-label">Kode QR</label>
                                <input type="text"
                                    class="form-control"
                                    name="kode_qr"
                                    value="<?= set_value('kode_qr', $riwayat['kode_qr']); ?>"
                                    readonly>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label class="form-label">Nomor Surat / Dokumen</label>
                            <input type="text"
                                class="form-control"
                                name="nomor_dokumen"
                                value="<?= set_value('nomor_dokumen', $riwayat['nomor_dokumen']); ?>"
                                <?= !empty($riwayat['kode_qr']) ? 'readonly' : ''; ?>>
                            <?= form_error('nomor_dokumen', "<div class='text-danger small'>", "</div>"); ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-select" name="id_kategori" required>
                                <?php foreach ($kategori as $k): ?>
                                    <option value="<?= $k['id_kategori']; ?>"
                                        <?= set_value('id_kategori', $riwayat['id_kategori']) == $k['id_kategori'] ? 'selected' : ''; ?>>
                                        <?= $k['nama_kategori']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control"
                                    name="keterangan_arsip"
                                    rows="3"><?= set_value('keterangan_arsip', $riwayat['keterangan_arsip']); ?></textarea>
                            <?= form_error('keterangan_arsip', "<div class='text-danger small'>", "</div>"); ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">File</label>
                            <input type="file" class="form-control" name="file">
                            <div class="form-text">Kosongkan jika tidak ingin mengubah file.</div>

                            <?php if (!empty($riwayat['file_arsip'])): ?>
                                <a href="<?= base_url('assets/arsip/' . $riwayat['file_arsip']); ?>"
                                target="_blank"
                                class="btn btn-sm btn-secondary mt-2">
                                Lihat file saat ini
                                </a>
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
