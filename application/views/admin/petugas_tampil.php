<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h4 style="margin: 0; font-weight: bold; color: #333;">Data Petugas</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="panel panel">
        <div class="panel-body">
            <div class="pull-right">
                <a href="<?php echo base_url('admin/petugas/tambah'); ?>" class="btn btn-sm" style="background-color: #38E54D;"><i class="fa fa-plus"></i> Tambah Petugas</a>
            </div>
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
                                    <a href="<?php echo base_url('admin/petugas/edit/' . $var['id_petugas']); ?>" class="btn" style="background-color: #38E54D;  padding-right: 10px; margin-right: 5px;"><i class="fa fa-wrench"></i></a>
                                    <a href="<?php echo base_url('admin/petugas/hapus/' . $var['id_petugas']); ?>" class="btn" style="background-color: #38E54D;  padding-right: 10px; margin-right: 5px;"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>