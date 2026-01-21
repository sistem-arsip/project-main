<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Kategori Nonaktif</h4>
            </div>
        </div>
    </div>
</div>

<br>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-2">
                <a href="<?php echo base_url('admin/kategori'); ?>" class="btn btn-sm btn-outline-dark">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>

                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped table-hover w-100">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Kategori</th>
                                <th>Keterangan</th>
                                <th class="text-center" width="25%">OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kategori_nonaktif as $k => $v): ?>
                            <tr>
                                <td class="text-center"><?php echo $k + 1; ?></td>
                                <td><?php echo $v['nama_kategori']; ?></td>
                                <td><?php echo $v['keterangan_kategori']; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('admin/kategori/aktifkan/'.$v['id_kategori']); ?>" 
                                       class="btn btn-success btn-sm text-light"
                                       onclick="return confirm('Aktifkan kategori ini?')">
                                        <i class="fa fa-check"></i> Aktifkan
                                    </a>
                                    <a href="<?php echo base_url('admin/kategori/hapus/'.$v['id_kategori']); ?>" 
                                       class="btn btn-danger btn-sm text-light"
                                       onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                        <i class="fa fa-trash"></i> Hapus
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
</div>
