<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h4 style="margin: 0; font-weight: bold; color: #333;">Data Pengajuan Kategori</h4>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="panel panel">
        <div class="panel-body">
            <div class="pull-right">
            </div>
            <br>
            <br>
            <table id="mytable" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Petugas</th>
                        <th>Unit</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pengajuan as $pn => $var): ?>
                        <tr>
                            <td class="text-center"><?php echo $pn + 1; ?></td>
                            <td><?php echo $var['nama_pengajuan']; ?></td>
                            <td><?php echo $var['keterangan_pengajuan']; ?></td>
                            <td><?php echo $var['nama_petugas']; ?></td>
                            <td><?php echo $var['nama_unit']; ?></td>
                            <td class="text-center">
                                <?php if ($var['status_pengajuan'] == 'pending'): ?>
                                    <a href="<?php echo base_url('admin/pengajuan_kategori/terima/' . $var['id_pengajuan']); ?>"
                                        class="btn btn-success btn-xs" style="color: #fff;"
                                        onclick="return confirm('Yakin akan menerima kategori ini?')">Terima</a>
                                    <a href="<?php echo base_url('admin/pengajuan_kategori/tolak/' . $var['id_pengajuan']); ?>"
                                        class="btn btn-danger btn-xs" style="color: #fff;"
                                        onclick="return confirm('Yakin akan menolak kategori ini?')">Tolak</a>
                                <?php elseif ($var['status_pengajuan'] == 'accepted'): ?>
                                    <span class="text-success"><i class="fa fa-check"></i></span>
                                <?php elseif ($var['status_pengajuan'] == 'rejected'): ?>
                                    <span class="text-danger"><i class="fa fa-times"></i></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>