<!-- <div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Profil</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Profil</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<br>
<div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6">

                <div class="panel">
                    <div class="panel-heading">
                        <h4>Data Profil Admin</h4>
                    </div>
                    <div class="panel-body">
                        <div class="pull-right">
                            <a href="<?php echo base_url('admin/dashboard'); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <br>
                        <br>

                        <form action="<?php echo base_url('admin/profil/update'); ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="hidden" name="id_admin" value="<?php echo set_value("admin_nama", $profil['id_admin']) ?>">
                                <input type="text" class="form-control" name="admin_nama" value="<?php echo set_value("admin_nama", $profil['admin_nama']) ?>">
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="admin_username" value="<?php echo set_value("admin_username", $profil['admin_username']) ?>">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama .." name="admin_password" value="">
                                <small>Kosongkan jika tidak ingin mengubah password.</small>
                            </div>

                            <div class="form-group d-flex align-items-center gap-2">
                                <input type="submit" class="btn btn-success" value="Simpan">
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>