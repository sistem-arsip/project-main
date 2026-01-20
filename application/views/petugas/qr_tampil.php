<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Data Kode QR</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="col-12">
        <div class="bg-light rounded shadow-sm p-2">
            <div class="d-flex justify-content-end">
                <a href="<?php echo base_url("petugas/generate/tambah"); ?>" class="btn btn-sm btn-success text-light"><i class="fa fa-qrcode"></i> Buat Kode QR
                </a>
            </div>

            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-striped table-hover w-100">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" width="1%">No</th>
                            <th>Kode QR</th>
                            <th>Nomor</th>
                            <th class="text-center" width="25%">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($generate as $gen => $var): ?>
                            <tr>
                                <td class="text-center"><?php echo $gen + 1; ?></td>
                                <td><?php echo $var['kode_qr']; ?></td>
                                <td><?php echo $var['nomor_dokumen']; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('petugas/generate/detail/' . $var['kode_qr']); ?>" class="btn btn-sm btn-success text-white">
                                        <i class="fa fa-file"></i> Detail
                                    </a>
                                    <a href="<?php echo base_url('petugas/generate/edit/' . $var['kode_qr']); ?>" class="btn btn-sm btn-outline-secondary text-dark">
                                        <i class="fa fa-edit"></i> Ubah
                                    </a>
                                    <a href="<?php echo base_url('petugas/generate/hapus/' . $var['kode_qr']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus QR Code ini?')">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>