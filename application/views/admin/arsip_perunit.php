<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark"> Arsip Unit 
                    <?php echo isset($unit['nama_unit']) ? $unit['nama_unit'] : 'Nama Unit Tidak Diketahui'; ?>
                </h4>
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

        <!-- FILTERS -->
        <div class="d-flex align-items-start gap-3">

            <!-- FILTER BULAN & TAHUN -->
            <div>
                <label for="filterBulanTahun" class="form-label fw-bold mb-0">Pilih Arsip Bulan & Tahun:</label>
                <input type="text" class="form-control" id="filterBulanTahun" placeholder="Pilih Bulan & Tahun">
            </div>

            <!-- FILTER KATEGORI -->
            <div>
                <label for="filterKategori" class="form-label fw-bold mb-0">Pilih Kategori:</label>
                <select id="filterKategori" class="form-control">
                    <option value="">Semua Kategori</option>

                    <!-- PERBAIKAN: pakai id_kategori sebagai value -->
                    <?php foreach ($kategori as $k): ?>
                        <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                    <?php endforeach; ?>

                </select>
            </div>

        </div>

        <div class="table-responsive mt-3">
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
                            data-bulan="<?php echo date('m', strtotime($v['waktu_upload'])); ?>"
                            data-tahun="<?php echo date('Y', strtotime($v['waktu_upload'])); ?>"
                            data-kategori="<?php echo $v['id_kategori']; ?>">

                            <td><?php echo $a + 1; ?></td>

                            <td class="d-none d-md-table-cell">
                                <?php echo date('d-m-Y', strtotime($v['waktu_upload'])); ?>
                            </td>

                            <td>
                                <?= $v['nama_kategori']; ?>
                                <br>
                                <div class="d-block d-md-none text-muted small">
                                    <?= date('d-m-Y', strtotime($v['waktu_upload'])); ?>
                                </div>
                            </td>

                            <td><?= $v['nama_petugas']; ?></td>

                            <td><?= $v['keterangan_arsip']; ?></td>

                            <td class="text-center">
                                <a href="<?= base_url('admin/arsip/detail/' . $v['id_arsip'] . '?unit_id=' . $v['id_unit']); ?>" 
                                   class="btn btn-sm btn-success text-light">
                                    <i class="fa fa-file"></i>
                                </a>

                                <a href="<?= base_url('admin/arsip/hapus/' . $v['id_arsip'] . '?redirect=admin/arsip/arsip_perunit/' . $v['id_unit']); ?>" 
                                   class="btn btn-sm btn-danger text-light"
                                   onclick="return confirm('Yakin ingin menghapus arsip ini?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>


<!-- FLATPICKR -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>

<script>
    // Inisialisasi flatpickr bulan-tahun
    flatpickr("#filterBulanTahun", {
        dateFormat: "Y-m",
        altFormat: "F Y",
        altInput: true,
        plugins: [
            new monthSelectPlugin({
                shorthand: true,
                dateFormat: "Y-m"
            })
        ]
    });

    function applyFilters() {
        const kategoriDipilih = document.getElementById('filterKategori').value;
        const bulanTahun = document.getElementById('filterBulanTahun').value;

        let filterYear = null;
        let filterMonth = null;

        if (bulanTahun) {
            let [year, month] = bulanTahun.split("-");

            month = month.padStart(2, "0");

            filterYear = year;
            filterMonth = month;
        }

        const rows = document.querySelectorAll('#mytable tbody tr');

        rows.forEach(row => {
            const rowKategori = row.dataset.kategori;
            const rowMonth = row.dataset.bulan;
            const rowYear = row.dataset.tahun;

            let cocokKategori = true;
            let cocokTanggal = true;

            if (kategoriDipilih && kategoriDipilih !== rowKategori) {
                cocokKategori = false;
            }

            if (filterYear && filterMonth) {
                if (rowMonth !== filterMonth || rowYear !== filterYear) {
                    cocokTanggal = false;
                }
            }

            row.style.display = (cocokKategori && cocokTanggal) ? '' : 'none';
        });
    }

    document.getElementById('filterKategori').addEventListener('change', applyFilters);
    document.getElementById('filterBulanTahun').addEventListener('change', applyFilters);
</script>
