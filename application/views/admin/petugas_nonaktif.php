<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Data Petugas Nonaktif</h4>
            </div>
        </div>
    </div>
</div>

<br>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-3">

                <div class="d-flex justify-content-start mb-3">
                    <a href="<?= base_url('admin/petugas'); ?>" 
                       class="btn btn-sm btn-outline-dark mb-3">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="table-responsive">
                    <table id="mytable2" class="table table-bordered table-striped table-hover w-100">
                        <thead class="table-light">
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Petugas</th>
                                <th>Unit</th>
                                <th>Username</th>
                                <th class="text-center" width="15%">OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($petugas_nonaktif as $i => $p): ?>
                                <tr>
                                    <td class="text-center"><?= $i + 1; ?></td>
                                    <td><?= $p['nama_petugas']; ?></td>
                                    <td><?= $p['nama_unit']; ?></td>
                                    <td><?= $p['username_petugas']; ?></td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">

                                            <a href="<?= base_url('admin/petugas/aktifkan/'.$p['id_petugas']); ?>" 
                                               class="btn btn-success btn-sm text-light"
                                               onclick="return confirm('Aktifkan kembali petugas ini?')">
                                                <i class="fa fa-check"></i> Aktifkan
                                            </a>

                                            <a href="<?= base_url('admin/petugas/hapus/' . $p['id_petugas']); ?>" 
                                               class="btn btn-danger btn-sm text-light"
                                               onclick="return confirm('Yakin ingin menghapus permanen?')">
                                                <i class="fa fa-trash"></i>
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
