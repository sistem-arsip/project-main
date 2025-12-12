<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Data Kode QR <?php echo isset($unit['nama_unit']) ? $unit['nama_unit'] : 'Nama Unit Tidak Diketahui'; ?></h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="col-12">
        <div class="bg-light rounded shadow-sm p-3">
            <div class="mb-3">
            <a href="<?php echo base_url('admin/kode_qr'); ?>" class="btn btn-sm btn-outline-dark">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>

            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-striped table-hover w-100">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" width="1%">No</th>
                            <th>Kode QR</th>
                            <th>Nomor</th>
                            <th>Petugas</th>
                            <th class="text-center" width="20%">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_qr as $q => $qr): ?>
                            <tr>
                                <td class="text-center"><?php echo $q + 1; ?></td>
                                <td><?php echo $qr['kode_qr']; ?></td>
                                <td><?php echo $qr['nomor_dokumen']; ?></td>
                                <td><?php echo $qr['nama_petugas']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('admin/kode_qr/detail/' . $qr['kode_qr']) ?>" class="btn btn-sm btn-secondary text-light">
                                        <i class="fa fa-info-circle"></i> Detail QR
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>