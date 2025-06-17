<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Data Kategori</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row justify-content">
        <div class="col-lg-12">
            <div class="bg-light rounded shadow-sm p-3">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3 gap-2">
                    <a href="<?php echo base_url('petugas/pengajuan_kategori'); ?>" class="btn btn-sm text-white" style="background-color: #5F6F52;">
                        <i class="fa fa-history"></i> Riwayat Pengajuan
                    </a>
                    <p class="mb-0 fw-bold text-dark">
                        Jika kategori tidak tersedia,
                        <a href="<?php echo base_url('petugas/kategori/tambah'); ?>" class="btn btn-sm btn-outline-dark ms-1">Tambah di sini</a>
                    </p>
                </div>

                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped table-hover table-datatable">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kategori as $index => $var): ?>
                                <tr>
                                    <td class="text-center"><?php echo $index + 1; ?></td>
                                    <td><?php echo $var['nama_kategori']; ?></td>
                                    <td><?php echo $var['keterangan_kategori']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>