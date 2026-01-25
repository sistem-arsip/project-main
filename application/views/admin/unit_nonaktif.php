<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Unit Nonaktif</h4>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-2">

                <a href="<?php echo base_url('admin/unit'); ?>" class="btn btn-sm btn-outline-dark">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>

                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped table-hover w-100">
                        <thead class="table-light">
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Kategori</th>
                                <th>Keterangan</th>
                                <th class="text-center" width="25%">OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($unit_nonaktif as $u => $v): ?>
                                <tr>
                                    <td class="text-center"><?php echo $u + 1; ?></td>
                                    <td><?php echo $v['nama_unit']; ?></td>
                                    <td><?php echo $v['keterangan_unit']; ?></td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1 gap-md-2 flex-wrap">

                                            <a href="<?php echo base_url('admin/unit/aktifkan/' . $v['id_unit']); ?>"
                                                class="btn btn-success btn-sm text-light"
                                                title="Aktifkan"
                                                onclick="return confirm('Aktifkan unit ini?')">
                                                <i class="fa fa-check"></i>
                                                <span class="d-none d-md-inline"> Aktifkan</span>
                                            </a>

                                            <a href="<?php echo base_url('admin/unit/hapus/' . $v['id_unit']); ?>"
                                                class="btn btn-danger btn-sm text-light"
                                                title="Hapus"
                                                onclick="return confirm('Hapus permanen unit ini?')">
                                                <i class="fa fa-trash"></i>
                                                <span class="d-none d-md-inline"> Hapus</span>
                                            </a>

                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>