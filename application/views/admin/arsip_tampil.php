<!-- <div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data Arsip</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Arsip</span></li>
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
    <div class="panel panel">
        <div class="panel-heading">
            <h3 class="panel-title">Semua Arsip</h3>
        </div>
        <div class="panel-body">
            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Waktu Upload</th>
                        <th>Arsip</th>
                        <th>Kategori</th>
                        <th>Petugas</th>
                        <th>Keterangan</th>
                        <th class="text-center" width="20%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arsip as $a => $v): ?>
                        <tr>
                            <td><?php echo $a + 1; ?></td>
                            <td><?php echo $v['waktu_upload']; ?></td>
                            <td>

                                <b>KODE</b> : <?php echo $v['kode_arsip']; ?> <br>
                                <b>Nama</b> : <?php echo $v['nama_arsip']; ?><br>

                            </td>
                            <td><?php echo $v['nama_kategori']; ?></td>
                            <td>
                                <b>Petugas :</b> <?php echo $v['nama_petugas']; ?> <br>
                                <b>Bagian :</b> <?php echo $v['nama_unit']; ?> <br>
                            </td>
                            <td><?php echo $v['keterangan_arsip']; ?></td>
                            <td class="text-center">


                                <div class="btn-group">
                                    <!-- <a target="_blank" class="btn btn-default" href=""><i class="fa fa-download"></i></a> -->
                                    <a href="<?php echo base_url('admin/arsip/detail/' . $v['id_arsip']); ?>" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>
                                    <a href="<?php echo base_url('admin/arsip/hapus/' . $v['id_arsip']); ?>" class="btn btn-primary">
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