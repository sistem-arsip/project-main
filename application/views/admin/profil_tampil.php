<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Profile Admin</h4>
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
                    <a href="<?php echo base_url('admin/dashboard'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali</a>
                </div>

                <form action="<?php echo base_url('admin/profil/update'); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama_admin" class="form-label">Nama</label>
                        <input type="text" id="nama_admin" class="form-control" name="nama_admin"
                            value="<?php echo set_value('nama_admin', $profil['nama_admin']) ?>">
                        <?php echo form_error('nama_admin', "<div class='text-danger small'>", "</div>") ?>
                    </div>
                    <div class="mb-3">
                        <label for="username_admin" class="form-label">Username</label>
                        <input type="text" id="username_admin" class="form-control" name="username_admin"
                            value="<?php echo set_value('username_admin', $profil['username_admin']) ?>">
                        <?php echo form_error('username_admin', "<div class='text-danger small'>", "</div>") ?>
                    </div>
                    <div class="mb-3">
                        <label for="password_admin" class="form-label">Password</label>
                        <input type="password" id="password_admin" class="form-control" placeholder="Masukkan Password .." name="password_admin" value="">
                        <div class="form-text">Kosongkan jika tidak ingin mengubah password.</div>
                        <?php echo form_error('password_admin', "<div class='text-danger small'>", "</div>") ?>
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