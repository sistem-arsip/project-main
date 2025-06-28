<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Data Arsip Unit</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="bg-light rounded shadow-sm p-3">
        <div class="d-flex justify-content-end mb-3">
            <a href="<?php echo base_url('petugas/arsip/tambah'); ?>" class="btn text-white btn-success">
                <i class="fa fa-plus"></i> Upload Arsip
            </a>
        </div>

        <div class="table-responsive">
            <table id="mytable" class="table table-bordered table-striped table-hover w-100">
                <thead class="table-light">
                    <tr>
                        <th style="width: 1%;">No</th>
                        <th class="d-none d-md-table-cell">Waktu</th>
                        <th>Arsip</th>
                        <th>Kategori</th>
                        <th>Petugas</th>
                        <th>Keterangan</th>
                        <th class="text-center" style="width: 20%;">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arsip as $a => $v): ?>
                        <tr>
                            <td><?php echo $a + 1; ?></td>
                            <td class="d-none d-md-table-cell"><?php echo date('d-m-Y', strtotime($v['waktu_upload'])); ?></td>
                            <td>
                                <strong>Kode Arsip:</strong> <?php echo $v['kode_arsip']; ?><br>
                            </td>
                            <td>
                                <b>Kategori : </b><?php echo $v['nama_kategori']; ?> <br>
                                <div class="d-block d-md-none"><small><?php echo $v['waktu_upload']; ?></small></div>
                            </td>
                            <td>
                                <strong>Petugas:</strong> <?php echo $v['nama_petugas']; ?> <br>
                                <strong>Bagian:</strong> <?php echo $v['nama_unit']; ?>
                            </td>
                            <td><?php echo $v['keterangan_arsip']; ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?php echo base_url('petugas/arsip/detail/' . $v['id_arsip']); ?>" class="btn btn-success text-light" style="margin-right: 5px;">
                                        <i class="fa fa-file"></i> Preview
                                    </a>
                                    <?php if ($v['id_petugas'] == $this->session->userdata('id_petugas')): ?>
                                        <a href="<?php echo base_url('petugas/arsip/edit/' . $v['id_arsip']); ?>" class="btn btn-warning text-white me-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?php echo base_url('petugas/arsip/hapus/' . $v['id_arsip']); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus arsip ini?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>