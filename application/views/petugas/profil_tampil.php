<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h4 style="margin: 0; font-weight: bold; color: #333;">Profil</h4>
            </div>
        </div>
    </div>
</div><br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="<?php echo base_url('petugas/dashboard'); ?>" class="btn bg-custome">
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
                        <input type="password" id="password_petugas" class="form-control" placeholder="Masukkan Password .." name="password_petugas" value="">
                        <div class="form-text">Kosongkan jika tidak ingin mengubah password.</div>
                    </div>

                    <div class="mb-3">
                        <label for="nama_unit" class="form-label">Unit</label>
                        <input type="text" id="nama_unit" class="form-control" name="nama_unit" value="<?php echo $profil['nama_unit']; ?>" readonly>
                    </div>


                    <div class="mb-3">
                        <button type="submit" class="btn bg-custome">Simpan</button>
                    </div>

                </form>
                </div>
            </div>
            </div>
        </div>
    </div>

<br>