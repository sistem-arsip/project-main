<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Edit Petugas</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="bg-light rounded shadow-sm p-3">
                <div class="mb-3">
                    <a href="<?php echo base_url('admin/petugas'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_petugas" value="<?php echo set_value('nama_petugas', $petugas['id_petugas']) ?>">

                    <div class="mb-3">
                        <label for="nama_petugas" class="form-label">Nama</label>
                        <input type="text" id="nama_petugas" class="form-control" name="nama_petugas" value="<?php echo set_value('nama_petugas', $petugas['nama_petugas']) ?>">
                        <?php echo form_error('nama_petugas', "<div class='text-danger small'>", "</div>") ?>
                    </div>

                    <div class="mb-3">
                        <label for="username_petugas" class="form-label">Username</label>
                        <input type="text" id="username_petugas" class="form-control" name="username_petugas" value="<?php echo set_value('username_petugas', $petugas['username_petugas']) ?>">
                        <?php echo form_error('username_petugas', "<div class='text-danger small'>", "</div>") ?>
                    </div>

                    <div class="mb-3">
                        <label for="password_petugas" class="form-label">Password</label>
                        <input type="password" id="password_petugas" class="form-control" name="password_petugas">
                        <div class="form-text">Kosongkan jika tidak ingin mengubah password.</div>
                        <?php echo form_error('password_petugas', "<div class='text-danger small'>", "</div>") ?>
                    </div>

                    <div class="mb-3">
                        <label for="pilihan" class="form-label">Unit</label>
                        <select id="pilihan" name="id_unit" class="form-select">
                            <?php foreach ($unit as $value): ?>
                                <option value="<?php echo $value['id_unit']; ?>"
                                    <?php echo (set_value('id_unit', isset($petugas['id_unit']) ? $petugas['id_unit'] : '') == $value['id_unit']) ? 'selected' : ''; ?>>
                                    <?php echo $value['nama_unit']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-4">
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