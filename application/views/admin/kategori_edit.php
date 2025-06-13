<!-- <div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Edit Kategori</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Kategori</span></li>
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
        <div class="col-lg-12">
            <div class="panel panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit kategori</h3>
                </div>
                <div class="panel-body">
                    <div class="pull-right">
                        <a href="<?php echo base_url('admin/kategori'); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br>
                    <br>

                    <form method="post">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="hidden" name="id_kategori" value="<?php echo set_value("nama_kategori", $kategori['id_kategori']) ?>">
                            <input type="text" class="form-control" name="nama_kategori" required="required" value="<?php echo set_value("nama_kategori", $kategori['nama_kategori']) ?>">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan_kategori"><?php echo set_value("keterangan_kategori", $kategori['keterangan_kategori']); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>