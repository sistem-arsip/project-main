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
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-2">
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped table-hover w-100">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" width="1%">No</th>
                                <th>Unit</th>
                                <th>Keterangan</th>
                                <th class="text-center" width="15%">Jumlah Kode QR</th>
                                <th class="text-center" width="20%">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                $no = 1;
                                foreach ($qr_unit as $qr) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $qr['nama_unit'] ?></td>
                                        <td><?php echo $qr['keterangan_unit']; ?></td>
                                        <td class="text-center"><?= $qr['jumlah_qr'] ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('admin/kode_qr/qr_perunit/' . $qr['id_unit']); ?>" class="btn btn-sm btn-success text-light">
                                                <i class="fa fa-file"></i> Selengkapnya
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
</div>