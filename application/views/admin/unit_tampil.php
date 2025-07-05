<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Data Unit</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-3">
                <div class="d-flex justify-content-end mb-3">
                    <a href="<?php echo base_url('admin/unit/tambah'); ?>" class="btn btn-success text-light">
                        <i class="fa fa-plus"></i> Tambah Unit
                    </a>
                </div>

                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped table-hover w-100">
                        <thead class="table-light">
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Unit</th>
                                <th>Keterangan</th>
                                <th class="text-center" width="15%">OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($unit as $uni => $var): ?>
                                <tr>
                                    <td class="text-center"><?php echo $uni + 1; ?></td>
                                    <td><?php echo $var['nama_unit']; ?></td>
                                    <td><?php echo $var['keterangan_unit']; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('admin/unit/edit/' . $var['id_unit']); ?>" class="btn btn-warning text-light">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?php echo base_url('admin/unit/hapus/' . $var['id_unit']); ?>" class="btn btn-danger text-light" onclick="return confirm('Yakin ingin menghapus unit ini?')">
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
    </div>
</div>