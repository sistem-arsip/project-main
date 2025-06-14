<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h4 style="margin: 0; font-weight: bold; color: #333;">Data Unit</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="panel panel">
        <div class="panel-body">
            <div class="pull-right">
                <a href="<?php echo base_url('admin/unit/tambah'); ?>" class="btn btn-sm" style="background-color: #38E54D;"><i class="fa fa-plus"></i> Tambah Unit</a>
            </div>
            <br>

            <table id="mytable" class="table table-bordered table-striped table-hover table-datatable">
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
                                    <a href="<?php echo base_url('admin/unit/edit/' . $var['id_unit']); ?>" class="btn" style="background-color: #38E54D;  padding-right: 10px; margin-right: 5px;"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo base_url('admin/unit/hapus/' . $var['id_unit']); ?>" class="btn" style="background-color: #38E54D;  padding-right: 10px; margin-right: 5px;"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>