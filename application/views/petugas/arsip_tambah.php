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
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-2">
                <div class="mb-2">
                    <a href="<?php echo base_url('petugas/arsip'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <form method="post" novalidate enctype="multipart/form-data">
                    <!-- Apakah punya QR Code -->
                    <div class="mb-3">
                        <label class="form-label">Apakah surat/dokumen memiliki Kode QR?</label>
                        <select class="form-select" name="kode_qr_status" id="kode_qr_status" required>
                            <option value="">Pilih</option>
                            <option value="ya" <?php echo set_select('kode_qr_status', 'ya') ?>>Ya</option>
                            <option value="tidak" <?php echo set_select('kode_qr_status', 'tidak') ?>>Tidak</option>
                        </select>
                        <?php echo form_error('kode_qr_status', "<div class='text-danger small'>", "</div>") ?>
                    </div>

                    <!-- Jika YA, maka isi Kode QR -->
                    <div class="mb-3" id="kode_qr_input_group">
                        <label class="form-label">Masukkan Kode QR</label>
                        <input type="text" class="form-control" name="kode_qr" value="<?php echo set_value('kode_qr') ?>">
                        <?php echo form_error('kode_qr', "<div class='text-danger small'>", "</div>") ?>
                    </div>

                    <!-- Jika TIDAK, maka isi nomor surat -->
                    <div class="mb-3" id="nomor_arsip_group">
                        <label class="form-label">Nomor Surat / Dokumen</label>
                        <input type="text" class="form-control" name="nomor_dokumen" value="<?php echo set_value('nomor_dokumen') ?>">
                        <?php echo form_error('nomor_dokumen', "<div class='text-danger small'>", "</div>") ?>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" name="id_kategori" required>
                            <option value="">Pilih kategori</option>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?php echo $k['id_kategori']; ?>" <?php echo set_select('id_kategori', $k['id_kategori']) ?>>
                                    <?php echo $k['nama_kategori']; ?>
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
                        <input type="file" class="form-control" name="file_arsip">
                        <?php if (!empty($error_file)) echo $error_file; ?>
                        <small class="text-muted">
                            Jika arsip berupa video atau foto dalam jumlah banyak, silakan unggah dalam bentuk file ZIP.
                        </small>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-sm btn-success text-light">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<br>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const selectStatus = document.getElementById("kode_qr_status");
        const qrInputGroup = document.getElementById("kode_qr_input_group");
        const nomorGroup = document.getElementById("nomor_arsip_group");

        function toggleQRFields() {
            if (selectStatus.value === "ya") {
                qrInputGroup.style.display = "block";
                nomorGroup.style.display = "none";
            } else if (selectStatus.value === "tidak") {
                qrInputGroup.style.display = "none";
                nomorGroup.style.display = "block";
            } else {
                qrInputGroup.style.display = "none";
                nomorGroup.style.display = "block";
            }
        }

        toggleQRFields(); // Saat pertama kali halaman dimuat
        selectStatus.addEventListener("change", toggleQRFields);
    });
</script>

