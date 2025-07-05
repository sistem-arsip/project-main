<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark"> Arsip Unit <?php echo isset($unit['nama_unit']) ? $unit['nama_unit'] : 'Nama Unit Tidak Diketahui'; ?></h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="bg-light rounded shadow-sm p-3">
        <div class="mb-3">
            <a href="<?php echo base_url('admin/arsip'); ?>" class="btn btn-sm btn-outline-dark">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="table-responsive">
            <table id="mytable" class="table table-bordered table-striped table-hover w-100">
                <thead class="table-light">
                    <tr>
                        <th width="1%">No</th>
                        <th class="d-none d-md-table-cell">Waktu</th>
                        <th>Kategori</th>
                        <th>Petugas</th>
                        <th>Keterangan</th>
                        <th class="text-center" width="15%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arsip as $a => $v): ?>
                        <tr>
                            <td><?php echo $a + 1; ?></td>
                            <td class="d-none d-md-table-cell"><?php echo date('d-m-Y', strtotime($v['waktu_upload'])); ?></td>

                            <td>
                                <?php echo $v['nama_kategori']; ?> <br>
                                <div class="d-block d-md-none text-muted small"><?php echo date('d-m-Y', strtotime($v['waktu_upload'])); ?></div>
                            </td>
                            <td>
                                <?php echo $v['nama_petugas']; ?><br>
                            </td>
                            <td><?php echo $v['keterangan_arsip']; ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url('admin/arsip/detail/' . $v['id_arsip'] . '?unit_id=' . $v['id_unit']); ?>" class="btn btn-success text-light">
                                    <i class="fa fa-file"></i>
                                </a>
                                <a href="<?php echo base_url('admin/arsip/hapus/' . $v['id_arsip'] . '?redirect=admin/arsip/arsip_perunit/' .  $v['id_unit']); ?>" class="btn btn-danger text-light" onclick="return confirm('Yakin ingin menghapus arsip ini?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>