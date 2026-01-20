<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Data Kategori Aktif</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-2">
                <div class="d-flex justify-content-end gap-2">
                    <a href="<?php echo base_url('admin/kategori/nonaktif_list'); ?>"
                        class="btn btn-sm btn-secondary text-light">
                        <i class="fa fa-eye"></i> Lihat Kategori Nonaktif
                    </a>

                    <a href="<?php echo base_url('admin/kategori/tambah'); ?>" class="btn btn-sm btn-success text-light">
                        <i class="fa fa-plus"></i> Tambah Kategori
                    </a>
                </div>

                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped table-hover w-100">
                        <thead class="table-light">
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Kategori</th>
                                <th>Keterangan</th>
                                <th class="text-center" width="30%">OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kategori as $k => $v): ?>
                                <tr>
                                    <td class="text-center"><?php echo $k + 1; ?></td>
                                    <td><?php echo $v['nama_kategori']; ?></td>
                                    <td><?php echo $v['keterangan_kategori']; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('admin/kategori/edit/' . $v['id_kategori']); ?>" class="btn btn-sm btn-outline-secondary text-dark">
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                        <a href="<?php echo base_url('admin/kategori/nonaktif/' . $v['id_kategori']); ?>"
                                            class="btn btn-warning btn-sm" 
                                            onclick="return confirm('Nonaktifkan kategori ini?')">
                                            <i class="fa fa-ban"></i> Nonaktifkan
                                        </a>
                                        <a href="<?php echo base_url('admin/kategori/hapus/' . $v['id_kategori']); ?>" class="btn btn-danger btn-sm text-light" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
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
<br>

