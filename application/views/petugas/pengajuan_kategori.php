<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h4 style="margin: 0; font-weight: bold; color: #333;">Riwayat Pengajuan Kategori</h4>
            </div>
        </div>
    </div>
</div><br>
<div class="container-fluid">
    <div class="panel panel">
        <div class="panel-body">
            <table class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pengajuan as $pn => $var): ?>
                        <tr>
                            <td class="text-center"><?php echo $pn + 1; ?></td>
                            <td><?php echo $var['nama_pengajuan']; ?></td>
                            <td><?php echo $var['keterangan_pengajuan']; ?></td>
                            <td class="text-center">
                                <?php if ($var['status_pengajuan'] == 'pending'): ?>
                                    <span class="label label-warning">Pending</span>
                                <?php elseif ($var['status_pengajuan'] == 'accepted'): ?>
                                    <span class="label label-success">Diterima</span>
                                <?php elseif ($var['status_pengajuan'] == 'rejected'): ?>
                                    <span class="label label-danger">Ditolak</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
