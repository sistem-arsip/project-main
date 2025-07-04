<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="fw-bold text-dark m-0">Data Riwayat Unggah Arsip Saya</h4>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container-fluid">
    <div class="row justify-content">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-3">
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped table-hover w-100 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 1%;">No</th>
                                <th>Waktu</th>
                                <th>Arsip Yang Diunggah</th>
                                <th>Petugas</th>
                                <th class="text-center" style="width: 15%;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($riwayat as $r => $v): ?>
                                <tr>
                                    <td class="text-center"><?php echo $r + 1; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($v['waktu_upload'])); ?></td>
                                    <td>
                                        <b>Kategori : </b><?php echo $v['nama_kategori']; ?> <br>
                                        <?php echo $v['keterangan_arsip']; ?>
                                    </td>
                                    <td>
                                        <strong><?php echo $v['nama_petugas']; ?></strong><br>
                                        <small class="text-muted">Bagian <?php echo $v['nama_unit']; ?></small>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('petugas/riwayat/detail/' . $v['id_arsip']); ?>" class="btn btn-success text-white">
                                            <i class="fa fa-file"></i>
                                        </a>
                                        <a href="<?php echo base_url('petugas/riwayat/edit/' . $v['id_arsip']); ?>" class="btn btn-warning text-white">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?php echo base_url('petugas/riwayat/hapus/' . $v['id_arsip']); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus arsip ini?')">
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