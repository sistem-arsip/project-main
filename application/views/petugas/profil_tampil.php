<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light p-3 rounded shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Profil</h4>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container-fluid">
    <div class="row justify-content">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-3">
                <div class="mb-3">
                    <a href="<?php echo base_url('petugas/dashboard'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <form action="<?php echo base_url('petugas/profil/update'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_petugas" value="<?php echo set_value('nama_petugas', $profil['id_petugas']) ?>">

                    <div class="mb-3">
                        <label for="nama_petugas" class="form-label">Nama</label>
                        <input type="text" id="nama_petugas" class="form-control" name="nama_petugas" value="<?php echo set_value('nama_petugas', $profil['nama_petugas']) ?>">
                    </div>

                    <div class="mb-3">
                        <label for="username_petugas" class="form-label">Username</label>
                        <input type="text" id="username_petugas" class="form-control" name="username_petugas" value="<?php echo set_value('username_petugas', $profil['username_petugas']) ?>">
                    </div>

                    <div class="mb-3">
                        <label for="password_petugas" class="form-label">Password</label>
                        <input type="password" id="password_petugas" class="form-control" placeholder="Masukkan Password .." name="password_petugas">
                        <div class="form-text">Kosongkan jika tidak ingin mengubah password.</div>
                    </div>

                    <div class="mb-3">
                        <label for="nama_unit" class="form-label">Unit</label>
                        <input type="text" id="nama_unit" class="form-control" name="nama_unit" value="<?php echo $profil['nama_unit']; ?>" readonly>
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