<?php
$kategori_aktif = $kategori_aktif ?? '';
$bulan_aktif    = $bulan_aktif ?? '';
?>

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
    <div class="bg-light rounded shadow-sm p-3">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-end align-items-md-center mb-3 gap-3">

            <div class="d-flex align-items-start gap-3">

                <!-- FILTER BULAN -->
                <div>
                    <label class="fw-bold mb-0">Bulan & Tahun</label>
                    <input type="month"
                        id="filterBulan"
                        class="form-control"
                        value="<?= $bulan_aktif; ?>"
                        onchange="applyFilter()">
                </div>
            
                <!-- FILTER KATEGORI  -->
                <div>
                    <label class="form-label fw-bold mb-0">Kategori:</label>
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
        </div>

        <!-- TABLE -->
        <div class="table-responsive">
            <table id="mytable" class="table table-bordered table-striped table-hover w-100 align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 1%;">No</th>
                        <th>Waktu</th>
                        <th>Arsip</th>
                        <th>Petugas</th>
                        <th class="text-center" style="width: 15%;">Opsi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($riwayat as $r => $v): ?>
                        <tr 
                            data-bulan="<?= date('m', strtotime($v['waktu_upload'])) ?>"
                            data-tahun="<?= date('Y', strtotime($v['waktu_upload'])) ?>"
                            data-kategori="<?= $v['nama_kategori'] ?>"
                        >
                            <td class="text-center"><?= $r + 1 ?></td>
                            <td><?= date('d-m-Y', strtotime($v['waktu_upload'])) ?></td>
                            <td>
                                <b>Kategori :</b> <?= $v['nama_kategori']; ?><br>
                                <?= $v['keterangan_arsip']; ?>
                            </td>
                            <td>
                                <strong><?= $v['nama_petugas']; ?></strong><br>
                                <small class="text-muted">Bagian <?= $v['nama_unit']; ?></small>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('petugas/riwayat/detail/' . $v['id_arsip']); ?>" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i></a>
                                <a href="<?= base_url('petugas/riwayat/edit/' . $v['id_arsip']); ?>" class="btn btn-sm btn-warning text-white"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url('petugas/riwayat/hapus/' . $v['id_arsip']); ?>" 
                                   onclick="return confirm('Yakin ingin menghapus arsip ini?')" 
                                   class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
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
