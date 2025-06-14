<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h4 style="margin: 0; font-weight: bold; color: #333;">Upload Arsip</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel">
                <div class="panel-body">
                    <div class="pull-right">
                        <a href="<?php echo base_url('petugas/arsip'); ?>" class="btn btn-sm" style="background-color: #38E54D;"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br>


                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group mb-2">
                            <label>Kode Arsip</label>
                            <input type="text" class="form-control" name="kode_arsip" required="required">
                        </div>
                        <div class="form-group mb-2">
                            <label>Nama Arsip</label>
                            <input type="text" class="form-control" name="nama_arsip" required="required">
                        </div>
                        <div class="form-group mb-2">
                            <label>Kategori</label>
                            <select class="form-control" name="id_kategori" required="required">
                                <option value="">Pilih kategori</option>
                                <?php foreach ($kategori as $k): ?>
                                    <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan_arsip" required="required"></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label>File</label>
                            <input type="file" name="file" accept="image/*, .docx, .pdf">
                        </div>
                        <br>
                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Upload">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><br>