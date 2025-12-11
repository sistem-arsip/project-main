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
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-end align-items-md-center mb-3 gap-2">

            <div class="d-flex align-items-start gap-3">

                <!-- FILTER BULAN & TAHUN -->
                <div>
                    <label for="filterBulanTahun" class="form-label fw-bold mb-0">Pilih Arsip Bulan & Tahun:</label>
                    <input type="text" class="form-control" id="filterBulanTahun" placeholder="Pilih Bulan & Tahun">
                </div>

                <!-- FILTER KATEGORI (SEMUA KATEGORI DARI DATABASE) -->
                <div>
                    <label for="filterKategori" class="form-label fw-bold mb-0">Pilih Kategori:</label>
                    <select id="filterKategori" class="form-control">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k['nama_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>

            <div class="d-flex gap-2">
                <a href="<?php echo base_url('petugas/arsip/tambah'); ?>" class="btn text-white btn-success">
                    <i class="fa fa-plus"></i> Upload Arsip
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table id="mytable" class="table table-bordered table-striped table-hover w-100">
                <thead class="table-light">
                    <tr>
                        <th style="width: 1%;">No</th>
                        <th class="d-none d-md-table-cell">Waktu</th>
                        <th>Kategori</th>
                        <th>Petugas</th>
                        <th>Keterangan</th>
                        <th class="text-center" style="width: 15%;">Opsi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($arsip as $a => $v): ?>
                        <tr 
                            data-bulan="<?php echo date('m', strtotime($v['waktu_upload'])); ?>" 
                            data-tahun="<?php echo date('Y', strtotime($v['waktu_upload'])); ?>"
                            data-kategori="<?php echo $v['nama_kategori']; ?>"
                        >
                            <td><?php echo $a + 1; ?></td>
                            <td class="d-none d-md-table-cell"><?php echo date('d-m-Y', strtotime($v['waktu_upload'])); ?></td>
                            <td>
                                <?php echo $v['nama_kategori']; ?> <br>
                                <div class="d-block d-md-none"><small><?php echo $v['waktu_upload']; ?></small></div>
                            </td>
                            <td>
                                <strong>Petugas:</strong> <?php echo $v['nama_petugas']; ?> <br>
                                <strong>Bagian:</strong> <?php echo $v['nama_unit']; ?>
                            </td>
                            <td><?php echo $v['keterangan_arsip']; ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url('petugas/arsip/detail/' . $v['id_arsip']); ?>" class="btn btn-success text-white">
                                    <i class="fa fa-file"></i>
                                </a>
                                <?php if ($v['id_petugas'] == $this->session->userdata('id_petugas')): ?>
                                    <a href="<?php echo base_url('petugas/arsip/edit/' . $v['id_arsip']); ?>" class="btn btn-warning text-white">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?php echo base_url('petugas/arsip/hapus/' . $v['id_arsip']); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus arsip ini?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<br>

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

    // FILTER GABUNGAN (Kategori + Bulan & Tahun)
    function applyFilters() {
        const kategoriDipilih = document.getElementById('filterKategori').value;
        const bulanTahunDipilih = document.getElementById('filterBulanTahun').value;

        let filterYear = null;
        let filterMonth = null;

        if (bulanTahunDipilih) {
            const [year, month] = bulanTahunDipilih.split("-");
            filterYear = year;
            filterMonth = month;
        }

        const rows = document.querySelectorAll('#mytable tbody tr');

        rows.forEach(function(row) {
            const rowKategori = row.getAttribute('data-kategori');
            const rowMonth = row.getAttribute('data-bulan');
            const rowYear = row.getAttribute('data-tahun');

            let matchKategori = true;
            let matchBulanTahun = true;

            if (kategoriDipilih && rowKategori !== kategoriDipilih) {
                matchKategori = false;
            }

            if (filterYear && filterMonth) {
                if (rowMonth !== filterMonth || rowYear !== filterYear) {
                    matchBulanTahun = false;
                }
            }

            if (matchKategori && matchBulanTahun) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    document.getElementById('filterKategori').addEventListener('change', applyFilters);
    document.getElementById('filterBulanTahun').addEventListener('change', applyFilters);
</script>
