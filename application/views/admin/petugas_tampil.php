<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Data Petugas Aktif</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-3">
                <div class="d-flex justify-content-end mb-3 gap-2">
                     <a href="<?php echo base_url('admin/petugas/nonaktif_list'); ?>" 
       class="btn btn-secondary btn-sm text-light">
        <i class="fa fa-eye"></i> Lihat Petugas Nonaktif
    </a>
                    <a href="<?php echo base_url('admin/petugas/tambah'); ?>" class="btn btn-sm btn-success text-light">
                        <i class="fa fa-plus"></i> Tambah Petugas
                    </a>
                </div>

                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped table-hover w-100">
                        <thead class="table-light">
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Petugas</th>
                                <th>Unit</th>
                                <th>Username</th>
                                <th class="text-center" width="20%">OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($petugas as $kt => $var): ?>
                                <tr>
                                    <td class="text-center"><?php echo $kt + 1; ?></td>
                                    <td><?php echo $var['nama_petugas']; ?></td>
                                    <td><?php echo $var['nama_unit']; ?></td>
                                    <td><?php echo $var['username_petugas']; ?></td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="<?php echo base_url('admin/petugas/edit/' . $var['id_petugas']); ?>" 
                                            class="btn btn-warning btn-sm text-light">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url('admin/petugas/nonaktif/' . $var['id_petugas']); ?>" 
                                            class="btn btn-warning btn-sm text-light" style="background-color:#ff8c00; border-color:#ff8c00;"
                                            onclick="return confirm('Nonaktifkan petugas ini?')">
                                                <i class="fa fa-ban"></i> Nonaktifkan
                                            </a>
                                            <a href="<?php echo base_url('admin/petugas/hapus/' . $var['id_petugas']); ?>" 
                                            class="btn btn-danger btn-sm text-light" 
                                            onclick="return confirm('Yakin ingin menghapus petugas ini?')">
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