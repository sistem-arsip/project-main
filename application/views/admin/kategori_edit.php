<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h4 style="margin: 0; font-weight: bold; color: #333;">Kategori Edit</h4>
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
                        <a href="<?php echo base_url('admin/kategori'); ?>" class="btn btn-sm" style="background-color: #38E54D;"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br>
                    <br>

                    <form method="post">
                        <div class="form-group mb-2">
                            <label>Nama</label>
                            <input type="hidden" name="id_kategori" value="<?php echo set_value("nama_kategori", $kategori['id_kategori']) ?>">
                            <input type="text" class="form-control" name="nama_kategori" required="required" value="<?php echo set_value("nama_kategori", $kategori['nama_kategori']) ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan_kategori"><?php echo set_value("keterangan_kategori", $kategori['keterangan_kategori']); ?></textarea>
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