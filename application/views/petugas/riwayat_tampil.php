<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h4 style="margin: 0; font-weight: bold; color: #333;">Data Riwayat Unggah Arsip Unit</h4>
            </div>
        </div>
    </div>
</div><br>
<div class="container-fluid">
    <div class="panel panel">
        <div class="panel-body">
            <table id="mytable" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Waktu Upload</th>
                        <th>Arsip Yang Diunggah</th>
                        <th class="text-center">Petugas</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($riwayat as $r => $v): ?>
                        <tr>
                            <td><?php echo $r + 1; ?></td>
                            <td><?php echo $v['waktu_upload']; ?></td>
                            <td>
                                <b>Kode</b> : <?php echo $v['kode_arsip']; ?><br>
                                <b>Nama</b> : <?php echo $v['nama_arsip']; ?><br>
                                <b>Kategori</b> : <?php echo $v['nama_kategori']; ?><br>
                            </td>
                            <td>
                                <b>Petugas :</b> <?php echo $v['nama_petugas']; ?> <br>
                                <b>Bagian :</b> <?php echo $v['nama_unit']; ?> <br>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <!-- <a target="_blank" class="btn btn-default" href=""><i class="fa fa-download"></i></a> -->
                                    <a href="<?php echo base_url('petugas/riwayat/detail/' . $v['id_arsip']); ?>" class="btn" style="background-color: #38E54D; padding-right: 10px; margin-right: 5px;"><i class="fa fa-search"></i> Preview</a>
                                    <a href="<?php echo base_url('petugas/riwayat/edit/' . $v['id_arsip']); ?>" class="btn" style="background-color: #38E54D; padding-right: 10px; margin-right: 5px;"><i class="fa fa-wrench"></i></a>
                                    <a href="<?php echo base_url('petugas/riwayat/hapus/' . $v['id_arsip']); ?>" class="btn" style="background-color: #38E54D;" onclick="return confirm('Yakin ingin menghapus arsip ini?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>