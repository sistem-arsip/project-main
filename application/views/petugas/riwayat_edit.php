<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h4 style="margin: 0; font-weight: bold; color: #333;">Edit Arsip</h4>
            </div>
        </div>
    </div>
</div><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel">
                <div class="panel-body">
                    <div class="pull-right">
                        <a href="<?php echo base_url('petugas/riwayat'); ?>" class="btn btn-sm" style="background-color: #38E54D;"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br><br>

                    <form method="post" enctype="multipart/form-data">
                        <!-- Hidden ID Arsip -->
                        <input type="hidden" name="id_arsip" value="<?php echo $arsip['id_arsip']; ?>">
                        <div class="form-group mb-2">
                            <label>Kode Arsip</label>
                            <input type="text" class="form-control" name="kode_arsip" required="required" value="<?php echo $arsip['kode_arsip']; ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label>Nama Arsip</label>
                            <input type="text" class="form-control" name="nama_arsip" required="required" value="<?php echo $arsip['nama_arsip']; ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label>Kategori</label>
                            <select class="form-control" name="id_kategori" required="required">
                                <option value="">Pilih kategori</option>
                                <?php foreach ($kategori as $k): ?>
                                    <option value="<?= $k['id_kategori']; ?>" <?= $k['id_kategori'] == $arsip['id_kategori'] ? 'selected' : ''; ?>>
                                        <?= $k['nama_kategori']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan_arsip" required="required"><?php echo $arsip['keterangan_arsip']; ?></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label>File</label>
                            <input type="file" name="file">
                            <small>Kosongkan jika tidak ingin mengubah file</small><br>
                            <?php if (!empty($arsip['file_arsip'])): ?>
                                <a href="<?= base_url('upload/arsip/' . $arsip['file_arsip']); ?>" target="_blank">Lihat file saat ini</a>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-2">
                            <input type="submit" class="btn" style="background-color: #38E54D;" value="Simpan Perubahan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><br>