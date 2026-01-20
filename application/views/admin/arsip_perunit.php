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
    <div class="bg-light rounded shadow-sm p-2">
        <div class="mb-2">
            <a href="<?= base_url('admin/arsip'); ?>" class="btn btn-sm btn-outline-dark">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>

       <!-- FILTER SECTION -->
        <div class="d-flex align-items-end gap-1 mb-0 flex-wrap">

            <!-- FILTER BULAN & TAHUN -->
            <div>
                <label class="fw-bold mb-1">Bulan & Tahun</label>
                <input type="text"
                    id="filterBulanTahun"
                    class="form-control"
                    placeholder="Pilih Bulan & Tahun"
                    value="<?= $bulan_aktif ?? '' ?>">

                <input type="hidden"
                    id="filterBulan"
                    value="<?= $bulan_aktif ?? '' ?>">
            </div>

            <!-- FILTER KATEGORI -->
            <div>
                <label class="fw-bold mb-1">Kategori</label>

                <div class="input-group">
                    <select id="filterKategori"
                        class="form-select"
                        onchange="applyFilter()">

                        <!-- PLACEHOLDER (TIDAK MUNCUL DI DROPDOWN) -->
                        <option value=""
                            disabled
                            selected
                            hidden>
                            Pilih Kategori
                        </option>

                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k['id_kategori']; ?>"
                                <?= ($kategori_aktif == $k['id_kategori']) ? 'selected' : ''; ?>>
                                <?= $k['nama_kategori']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <!-- RESET -->
                    <button type="button"
                        class="btn btn-outline-secondary"
                        onclick="resetFilter()"
                        title="Reset Filter">
                        <i class="fa fa-rotate-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- TABEL -->
        <div class="table-responsive">
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
                                <a href="<?= base_url('admin/arsip/detail/' . $v['id_arsip'] . '/' . $v['id_unit']) ?>"
                                   class="btn btn-sm btn-success">
                                    <i class="fa fa-file"></i> Selengkapnya
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

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>

<script>
    flatpickr("#filterBulanTahun", {
        dateFormat: "Y-m", // VALUE UNTUK LOGIC
        altInput: true,
        altFormat: "F Y", // TAMPILAN USER
        plugins: [
            new monthSelectPlugin({
                shorthand: true,
                dateFormat: "Y-m"
            })
        ],
        onChange: function(selectedDates, dateStr) {
            if (dateStr) {
                document.getElementById('filterBulan').value = dateStr;
                applyFilter(); // LOGIC LAMA
            }
        }
    });
</script>
<script>
    function applyFilter() {
        const kategori = document.getElementById('filterKategori').value;
        const bulan = document.getElementById('filterBulan').value;

        let params = [];
        if (kategori) params.push('kategori=' + kategori);
        if (bulan) params.push('bulan=' + bulan);

        const query = params.length ? '?' + params.join('&') : '';
        window.location.href = query;
    }

    function resetFilter() {
        window.location.href = window.location.pathname;
    }
</script>
