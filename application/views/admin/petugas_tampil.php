<!-- <div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data Petugas</h4>
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
    <div class="panel panel">

        <div class="panel-heading">
            <h3 class="panel-title">Data Petugas</h3>
        </div>
        <div class="panel-body">


            <div class="pull-right">
                <a href="<?php echo base_url('admin/petugas/tambah'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Petugas</a>
            </div>

            <br>
            <br>
            <br>
            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Petugas</th>
                        <th>Unit</th>
                        <th>Username</th>
                        <th class="text-center" width="10%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($petugas as $kt => $var): ?>
                        <tr>
                            <td class="text-center"><?php echo $kt + 1; ?></td>
                            <td><?php echo $var['nama_petugas']; ?></td>
                            <td><?php echo $var['nama_unit']; ?></td>
                            <td><?php echo $var['username_petugas']; ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?php echo base_url('admin/petugas/edit/' . $var['id_petugas']); ?>" class="btn btn-default"><i class="fa fa-wrench"></i></a>
                                    <a href="<?php echo base_url('admin/petugas/hapus/' . $var['id_petugas']); ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>