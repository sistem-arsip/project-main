<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h4 style="margin: 0; font-weight: bold; color: #333;">Edit Petugas</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel">
                <div class="panel-body">
                    <div class="pull-right">
                        <a href="<?php echo base_url('admin/petugas'); ?>" class="btn btn-sm" style="background-color: #38E54D;"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br>

                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group mb-2">
                            <label>Nama</label>
                            <input type="hidden" name="id_petugas" value="<?php echo set_value("nama_petugas", $petugas['id_petugas']) ?>">
                            <input type="text" class="form-control" name="nama_petugas" value="<?php echo set_value("nama_petugas", $petugas['nama_petugas']) ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username_petugas" value="<?php echo set_value("username_petugas", $petugas['username_petugas']) ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password_petugas">
                            <small>Kosongkan jika tidak ingin mengubah password.</small>
                        </div>
                        <div class="form-group mb-2">
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
                        <div class="form-group mb-2">
                            <label></label>
                            <input type="submit" class="btn btn-sm" style="background-color: #38E54D;" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>