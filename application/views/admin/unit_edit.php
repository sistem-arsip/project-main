<!-- <div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Edit Unit</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Unit</span></li>
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
                    <h3 class="panel-title">Edit Unit</h3>
                </div>
                <div class="panel-body">
                    <div class="pull-right">
                        <a href="<?php echo base_url('admin/unit'); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br>
                    <br>

                    <form method="post">
                        <div class="form-group">
                            <label>Nama Unit</label>
                            <input type="hidden" name="id_unit" value="<?php echo set_value("nama_unit", $unit['id_unit']) ?>">
                            <input type="text" class="form-control" name="nama_unit" required="required" value="<?php echo set_value("nama_unit", $unit['nama_unit']) ?>">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan_unit"><?php echo set_value("keterangan_unit", $unit['keterangan_unit']); ?></textarea>
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