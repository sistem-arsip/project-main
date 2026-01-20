<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Arsip-Arsip Unit</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-2">
                <div class="d-flex justify-content-end">
                    <a href="<?php echo base_url("admin/arsip/all_arsip"); ?>" class="btn btn-sm btn-success text-light"><i class="fa fa-file"></i> Lihat Semua Arsip
                    </a>
                </div>

                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped table-hover w-100">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" width="1%">No</th>
                                <th>Unit</th>
                                <th>Keterangan</th>
                                <th class="text-center" width="15%">Jumlah Arsip</th>
                                <th class="text-center" width="20%">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($unit_arsip as $unit) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $unit['nama_unit']; ?></td>
                                    <td><?= $unit['keterangan_unit']; ?></td>
                                    <td class="text-center"><?= $unit['jumlah_arsip']; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('admin/arsip/arsip_perunit/' . $unit['id_unit']); ?>" class="btn btn-sm btn-secondary text-light">
                                            <i class="bi bi-eye"></i> Selengkapnya
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