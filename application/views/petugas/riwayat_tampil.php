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

        <!-- FILTER PANEL -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-end align-items-md-center mb-3 gap-3">

            <div class="d-flex gap-3">

                <!-- FILTER BULAN TAHUN -->
                <div>
                    <label class="form-label fw-bold mb-0">Pilih Arsip Bulan & Tahun:</label>
                    <input type="text" id="filterBulanTahun" class="form-control" placeholder="Pilih Bulan & Tahun">
                </div>

                <!-- FILTER KATEGORI -->
                <div>
                    <label class="form-label fw-bold mb-0">Pilih Kategori:</label>
                    <select id="filterKategori" class="form-control">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k['nama_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>
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
                                <a href="<?= base_url('petugas/riwayat/detail/' . $v['id_arsip']); ?>" class="btn btn-success text-white"><i class="fa fa-file"></i></a>
                                <a href="<?= base_url('petugas/riwayat/edit/' . $v['id_arsip']); ?>" class="btn btn-warning text-white"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url('petugas/riwayat/hapus/' . $v['id_arsip']); ?>" 
                                   onclick="return confirm('Yakin ingin menghapus arsip ini?')" 
                                   class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<!-- FLATPICKR -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>

<script>
// Inisialisasi Flatpickr
flatpickr("#filterBulanTahun", {
    dateFormat: "Y-m",
    altFormat: "F Y",
    altInput: true,
    plugins: [ new monthSelectPlugin({ shorthand: true, dateFormat: "Y-m" }) ]
});

// Fungsi Filter
function applyFilters() {
    const kategori = document.getElementById('filterKategori').value;
    const bulanTahun = document.getElementById('filterBulanTahun').value;

    let filterYear = null;
    let filterMonth = null;

    if (bulanTahun) {
        const [y, m] = bulanTahun.split("-");
        filterYear = y;
        filterMonth = m;
    }

    document.querySelectorAll("#mytable tbody tr").forEach(row => {
        const rowKategori = row.getAttribute("data-kategori");
        const rowMonth   = row.getAttribute("data-bulan");
        const rowYear    = row.getAttribute("data-tahun");

        let matchKategori = kategori === "" || kategori === rowKategori;
        let matchTanggal  = (!filterYear || !filterMonth) || (rowMonth === filterMonth && rowYear === filterYear);

        row.style.display = (matchKategori && matchTanggal) ? "" : "none";
    });
}

// Event Listener
document.getElementById('filterKategori').addEventListener('change', applyFilters);
document.getElementById('filterBulanTahun').addEventListener('change', applyFilters);

</script>
