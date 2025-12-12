<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Semua Arsip</h4>
            </div>
        </div>
    </div>
</div>

<br>

<div class="container-fluid">
    <div class="bg-light rounded shadow-sm p-3">

        <div class="mb-3">
            <a href="<?php echo base_url('admin/arsip'); ?>" class="btn btn-sm btn-outline-dark">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>

        <!-- FILTER SECTION -->
        <div class="d-flex align-items-start gap-3 mb-3">

            <!-- FILTER BULAN TAHUN -->
            <div>
                <label class="form-label fw-bold mb-0">Pilih Bulan & Tahun:</label>
                <input type="text" class="form-control" id="filterBulanTahun" placeholder="Pilih Bulan & Tahun">
            </div>

            <!-- FILTER KATEGORI -->
            <div>
                <label class="form-label fw-bold mb-0">Pilih Kategori:</label>
                <select id="filterKategori" class="form-control">
                    <option value="">Semua Kategori</option>
                    <?php foreach ($kategori as $k): ?>
                        <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        </div>

        <div class="table-responsive">
            <table id="mytable" class="table table-bordered table-striped table-hover w-100">
                <thead class="table-light">
                    <tr>
                        <th width="1%">No</th>
                        <th class="d-none d-md-table-cell">Waktu</th>
                        <th>Kategori</th>
                        <th>Petugas</th>
                        <th>Keterangan</th>
                        <th class="text-center" width="15%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arsip as $a => $v): ?>
                        <tr
                            data-bulan="<?= date('m', strtotime($v['waktu_upload'])); ?>"
                            data-tahun="<?= date('Y', strtotime($v['waktu_upload'])); ?>"
                            data-kategori="<?= $v['id_kategori']; ?>"
                        >
                            <td><?= $a + 1; ?></td>
                            <td class="d-none d-md-table-cell"><?= date('d-m-Y', strtotime($v['waktu_upload'])); ?></td>

                            <td>
                                <?= $v['nama_kategori']; ?> <br>
                                <div class="d-block d-md-none text-muted small"><?= $v['waktu_upload']; ?></div>
                            </td>

                            <td>
                                <?= $v['nama_petugas']; ?><br>
                                Bagian: <?= $v['nama_unit']; ?>
                            </td>

                            <td><?= $v['keterangan_arsip']; ?></td>

                            <td class="text-center">
                                <a href="<?= base_url('admin/arsip/detail/' . $v['id_arsip']); ?>" class="btn btn-sm btn-success text-light">
                                    <i class="fa fa-file"></i>
                                </a>
                                <a href="<?= base_url('admin/arsip/hapus/' . $v['id_arsip'] . '?redirect=admin/arsip/all_arsip'); ?>" class="btn btn-sm btn-danger text-light" onclick="return confirm('Yakin ingin menghapus arsip ini?')">
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

<!-- JAVASCRIPT FILTER -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>

<script>
    // Inisialisasi flatpickr Month-Year
    flatpickr("#filterBulanTahun", {
        dateFormat: "Y-m",
        altInput: true,
        altFormat: "F Y",
        plugins: [
            new monthSelectPlugin({
                shorthand: true,
                dateFormat: "Y-m",
                altFormat: "F Y"
            })
        ]
    });

    // Fungsi Filter
    function applyFilters() {
        const kategoriDipilih = document.getElementById('filterKategori').value;
        const bulanTahun = document.getElementById('filterBulanTahun').value;

        let tahun = null, bulan = null;

        if (bulanTahun) {
            [tahun, bulan] = bulanTahun.split("-");
        }

        const rows = document.querySelectorAll('#mytable tbody tr');

        rows.forEach(row => {
            const rowKategori = row.getAttribute('data-kategori');
            const rowBulan = row.getAttribute('data-bulan');
            const rowTahun = row.getAttribute('data-tahun');

            let cocokKategori = !kategoriDipilih || rowKategori === kategoriDipilih;
            let cocokTanggal = !bulanTahun || (rowBulan === bulan && rowTahun === tahun);

            row.style.display = (cocokKategori && cocokTanggal) ? '' : 'none';
        });
    }

    document.getElementById('filterKategori').addEventListener('change', applyFilters);
    document.getElementById('filterBulanTahun').addEventListener('change', applyFilters);
</script>
