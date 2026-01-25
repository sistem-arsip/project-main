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
    <div class="bg-light rounded shadow-sm p-2">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">
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
                            <option value="" disabled selected hidden>Pilih Kategori</option>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id_kategori']; ?>"
                                    <?= ($kategori_aktif == $k['id_kategori']) ? 'selected' : ''; ?>>
                                    <?= $k['nama_kategori']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button type="button"
                            class="btn btn-outline-secondary"
                            onclick="resetFilter()">
                            <i class="fa fa-rotate-right"></i>
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
                        <th class="text-center" style="width: 25%;">Opsi</th>
                    </tr>
                </thead>

                <tbody>
<?php foreach ($riwayat as $r => $v): ?>
<tr
    class="align-middle"
    data-bulan="<?= date('m', strtotime($v['waktu_upload'])) ?>"
    data-tahun="<?= date('Y', strtotime($v['waktu_upload'])) ?>"
    data-kategori="<?= $v['nama_kategori'] ?>">

    <td class="text-center"><?= $r + 1 ?></td>

    <td class="small">
        <?= date('d-m-Y', strtotime($v['waktu_upload'])) ?>
    </td>

    <td class="small">
        <b>Kategori :</b> <?= $v['nama_kategori']; ?><br>
        <span class="text-muted"><?= $v['keterangan_arsip']; ?></span>
    </td>

    <td class="small">
        <strong><?= $v['nama_petugas']; ?></strong><br>
        <span class="text-muted">Bagian <?= $v['nama_unit']; ?></span>
    </td>

    <td class="text-center">
        <div class="d-flex justify-content-center gap-1 gap-md-2 flex-wrap">

            <a href="<?= base_url('petugas/riwayat/detail/' . $v['id_arsip']); ?>"
               class="btn btn-sm btn-success text-white"
               title="Detail">
                <i class="fa fa-file"></i>
                <span class="d-none d-md-inline"> Detail</span>
            </a>

            <a href="<?= base_url('petugas/riwayat/edit/' . $v['id_arsip']); ?>"
               class="btn btn-sm btn-outline-secondary text-dark"
               title="Ubah">
                <i class="fa fa-edit"></i>
                <span class="d-none d-md-inline"> Ubah</span>
            </a>

            <a href="<?= base_url('petugas/riwayat/hapus/' . $v['id_arsip']); ?>"
               onclick="return confirm('Yakin ingin menghapus arsip ini?')"
               class="btn btn-sm btn-danger"
               title="Hapus">
                <i class="fa fa-trash"></i>
                <span class="d-none d-md-inline"> Hapus</span>
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