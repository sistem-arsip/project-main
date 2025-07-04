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

            <div class="d-flex align-items-start gap-2">
                <div>
                    <label for="filterBulanTahun" class="form-label fw-bold mb-0">Pilih Arsip Bulan & Tahun:</label>
                    <input type="text" class="form-control" id="filterBulanTahun" placeholder="Pilih Bulan & Tahun">
                </div>
            </div>

            <a href="<?php echo base_url('petugas/arsip/tambah'); ?>" class="btn text-white btn-success">
                <i class="fa fa-plus"></i> Upload Arsip
            </a>
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
                        <th class="text-center" style="width: 20%;">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arsip as $a => $v): ?>
                        <tr data-bulan="<?php echo date('m', strtotime($v['waktu_upload'])); ?>" data-tahun="<?php echo date('Y', strtotime($v['waktu_upload'])); ?>">
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
                                    <i class="fa fa-file"></i> Preview
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
            <script>
                document.getElementById('filterBulanTahun').addEventListener('change', function() {
                    var value = this.value; // Misal: 2025-06
                    if (!value) return;

                    const [year, month] = value.split('-');

                    const rows = document.querySelectorAll('#mytable tbody tr');
                    rows.forEach(function(row) {
                        const rowMonth = row.getAttribute('data-bulan'); // ex: 06
                        const rowYear = row.getAttribute('data-tahun'); // ex: 2025

                        if (rowMonth === month && rowYear === year) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>
<br>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>

<script>
    // Inisialisasi Flatpickr
    flatpickr("#filterBulanTahun", {
        dateFormat: "Y-m", // Format hasil value (e.g. 2025-06)
        altFormat: "F Y", // Format tampilan
        altInput: true,
        plugins: [
            new monthSelectPlugin({
                shorthand: true,
                dateFormat: "Y-m"
            })
        ]
    });

    // Event Listener untuk Filter
</script>