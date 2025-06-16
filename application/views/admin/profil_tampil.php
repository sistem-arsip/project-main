<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h4 style="margin: 0; font-weight: bold; color: #333;">Data Profil Admin</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel">
                    <div class="panel-body">
                        <div class="pull-right">
                            <a href="<?php echo base_url('admin/dashboard'); ?>" class="btn btn-sm" style="background-color: #38E54D;"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <br>
                        <br>

                        <form action="<?php echo base_url('admin/profil/update'); ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group mb-2">
                                <label>Nama</label>
                                <input type="hidden" name="id_admin" value="<?php echo set_value("nama_admin", $profil['id_admin']) ?>">
                                <input type="text" class="form-control" name="nama_admin" value="<?php echo set_value("nama_admin", $profil['nama_admin']) ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username_admin" value="<?php echo set_value("username_admin", $profil['username_admin']) ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label>Password</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama .." name="password_admin" value="">
                                <small>Kosongkan jika tidak ingin mengubah password.</small>
                            </div>

                            <div class="form-group mb-2 d-flex align-items-center gap-2">
                                <input type="submit" class="btn btn-sm" style="background-color: #38E54D;" value="Simpan">
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>