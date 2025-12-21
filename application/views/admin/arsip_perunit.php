<?php
$kategori_aktif = $kategori_aktif ?? '';
$bulan_aktif    = $bulan_aktif ?? '';
?>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">
                    Arsip Unit <?= isset($unit['nama_unit']) ? $unit['nama_unit'] : 'Tidak Diketahui'; ?>
                </h4>
            </div>
        </div>
    </div>
</div>

<br>

<div class="container-fluid">
    <div class="bg-light rounded shadow-sm p-3">

        <div class="mb-3">
            <a href="<?= base_url('admin/arsip'); ?>" class="btn btn-sm btn-outline-dark">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>

        <!-- FILTER -->
        <div class="d-flex align-items-start gap-3">
            <!-- FILTER BULAN & TAHUN -->
            <div>
                <label class="fw-bold mb-0">Bulan & Tahun</label>
            
                <div class="input-group">
                    <input type="month"
                           id="filterBulan"
                           class="form-control"
                           value="<?= $bulan_aktif; ?>"
                           onchange="applyFilter()">
                </div>
            </div>

            <!-- FILTER KATEGORI  -->
            <div>
                <label class="form-label fw-bold mb-0">Pilih Kategori:</label>
            
                <div class="input-group">
                    <select id="filterKategori"
                            class="form-control"
                            onchange="applyFilter()">
            
                        <option value=""
                            <?= empty($kategori_aktif) ? 'selected' : '' ?>
                            disabled>
                            Semua Kategori
                        </option>
            
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k['id_kategori']; ?>"
                                <?= ($kategori_aktif == $k['id_kategori']) ? 'selected' : ''; ?>>
                                <?= $k['nama_kategori']; ?>
                            </option>
                        <?php endforeach; ?>
            
                    </select>
                    
                    <button type="button"
                            class="btn btn-outline-secondary"
                            title="Reset Filter"
                            onclick="resetFilter()">
                        ✕
                    </button>
                </div>
            </div>


        </div>

        <!-- TABEL -->
        <div class="table-responsive mt-3">
            <table id="mytable" class="table table-bordered table-striped table-hover w-100">
                <thead class="table-light">
                    <tr>
                        <th width="1%">No</th>
                        <th class="d-none d-md-table-cell">Waktu</th>
                        <th>Kategori</th>
                        <th>Petugas</th>
                        <th>Keterangan</th>
                        <th class="text-center" width="15%">Detail</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($arsip as $a => $v): ?>
                        <tr
                            data-bulan="<?= date('m', strtotime($v['waktu_upload'])); ?>"
                            data-tahun="<?= date('Y', strtotime($v['waktu_upload'])); ?>">

                            <td><?= $a + 1; ?></td>

                            <td class="d-none d-md-table-cell">
                                <?= date('d-m-Y', strtotime($v['waktu_upload'])); ?>
                            </td>

                            <td>
                                <?= $v['nama_kategori']; ?>
                                <div class="d-block d-md-none text-muted small">
                                    <?= date('d-m-Y', strtotime($v['waktu_upload'])); ?>
                                </div>
                            </td>

                            <td><?= $v['nama_petugas']; ?></td>
                            <td><?= $v['keterangan_arsip']; ?></td>

                            <td class="text-center">
                                <a href="<?= base_url('admin/arsip/detail/' . $v['id_arsip']); ?>"
                                   class="btn btn-sm btn-success">
                                    <i class="fa fa-file"></i>
                                </a>

                                <!-- <a href="<?= base_url('admin/arsip/hapus/' . $v['id_arsip'] . '?redirect=admin/arsip/arsip_perunit/' . $v['id_unit']); ?>"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Yakin ingin menghapus arsip ini?')">
                                    <i class="fa fa-trash"></i>
                                </a> -->
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>


<script>
    function applyFilter() {
        const kategori = document.getElementById('filterKategori').value;
        const bulan    = document.getElementById('filterBulan').value;
    
        let params = [];
    
        if (kategori) params.push('kategori=' + kategori);
        if (bulan) params.push('bulan=' + bulan);
    
        const query = params.length ? '?' + params.join('&') : '';
        window.location.href = query;
    }
    
    function resetFilter() {
        // reset ke kondisi awal (tanpa parameter)
        window.location.href = window.location.pathname;
    }
</script>


