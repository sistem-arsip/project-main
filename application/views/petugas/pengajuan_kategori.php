<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Riwayat Pengajuan Kategori</h4>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container-fluid">
    <div class="row justify-content">
        <div class="col-lg-12">
            <div class="bg-light rounded shadow-sm p-2">

                <div class="mb-3">
                    <a href="<?php echo base_url('petugas/kategori'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover w-100">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Nama Kategori</th>
                                <th>Keterangan</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengajuan as $index => $var): ?>
                                <tr>
                                    <td class="text-center"><?php echo $index + 1; ?></td>
                                    <td><?php echo $var['nama_pengajuan']; ?></td>
                                    <td><?php echo $var['keterangan_pengajuan']; ?></td>
                                    <td class="text-center">
                                        <?php if ($var['status_pengajuan'] == 'pending'): ?>
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        <?php elseif ($var['status_pengajuan'] == 'accepted'): ?>
                                            <span class="badge bg-success">Diterima</span>
                                        <?php elseif ($var['status_pengajuan'] == 'rejected'): ?>
                                            <span class="badge bg-danger">Ditolak</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
