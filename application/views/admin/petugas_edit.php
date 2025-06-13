<!-- <div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Tambah Petugas</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Petugas</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Petugas</h3>
                </div>
                <div class="panel-body">
                    <div class="pull-right">
                        <a href="<?php echo base_url('admin/petugas'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br>
                    <br>

                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="hidden" name="id_petugas" value="<?php echo set_value("nama_petugas", $petugas['id_petugas']) ?>">
                            <input type="text" class="form-control" name="nama_petugas" value="<?php echo set_value("nama_petugas", $petugas['nama_petugas']) ?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username_petugas" value="<?php echo set_value("username_petugas", $petugas['username_petugas']) ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password_petugas">
                            <small>Kosongkan jika tidak ingin mengubah password.</small>
                        </div>
                        <div class="form-group">
                            <label>Unit</label>
                            <select id="pilihan" name="id_unit" class="form-control">
                                <?php foreach ($unit as $value): ?>
                                    <option value="<?php echo $value['id_unit']; ?>"
                                        <?php echo (set_value('id_unit', isset($petugas['id_unit']) ? $petugas['id_unit'] : '') == $value['id_unit']) ? 'selected' : ''; ?>>
                                        <?php echo $value['nama_unit']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>