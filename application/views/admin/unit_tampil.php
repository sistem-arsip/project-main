<!-- <div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data Unit</h4>
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
    <div class="panel panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Unit</h3>
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a href="<?php echo base_url('admin/unit/tambah'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Unit</a>
            </div>
            <br>
            <br>
            <br>
            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Unit</th>
                        <th>Keterangan</th>
                        <th class="text-center" width="10%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($unit as $uni => $var): ?>
                        <tr>
                            <td><?php echo $uni + 1; ?></td>
                            <td><?php echo $var['nama_unit']; ?></td>
                            <td><?php echo $var['keterangan_unit']; ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?php echo base_url('admin/unit/edit/' . $var['id_unit']); ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo base_url('admin/unit/hapus/' . $var['id_unit']); ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>