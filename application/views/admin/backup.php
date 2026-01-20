<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Cadangkan & Pulihkan Data</h4>
            </div>
        </div>
    </div>
</div>

<br>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-3">
                <div class="row">

                    <!-- CARD CADANGKAN (ATAS) -->
                    <div class="col-12">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header bg-success text-white">
                                <strong><i class="fa fa-shield-alt"></i> Cadangkan Data</strong>
                            </div>
                            <div class="card-body">

                                <p class="mb-3">
                                    Ikuti langkah berikut untuk mencadangkan data agar tetap aman.
                                </p>

                                <div class="mb-2">
                                    <strong>Langkah 1:</strong><br>
                                    <small class="text-muted">
                                        Cadangkan data sistem informasi arsip digital.
                                    </small>
                                </div>
                                <a href="<?= base_url('admin/backup/db') ?>"
                                    class="btn btn-success btn-sm mb-3">
                                    <i class="fa fa-database"></i> Cadangkan Data Sistem
                                </a>

                                <div class="mb-2">
                                    <strong>Langkah 2:</strong><br>
                                    <small class="text-muted">
                                        Cadangkan file dokumen arsip yang tersimpan di sistem.
                                    </small>
                                </div>
                                <a href="<?= base_url('admin/backup/files') ?>"
                                    class="btn btn-success btn-sm">
                                    <i class="fa fa-archive"></i> Cadangkan Dokumen Arsip
                                </a>


                            </div>
                        </div>
                    </div>

                    <!-- CARD PULIHKAN (BAWAH) -->
                    <div class="col-12">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header bg-warning text-dark">
                                <strong><i class="fa fa-exclamation-triangle"></i> Pulihkan Data</strong>
                            </div>
                            <div class="card-body">
                                <p class="mb-2">
                                    Gunakan fitur ini jika data sistem hilang atau rusak. Proses ini akan memulihkan data dari file cadangan terakhir.
                                </p>

                                <!-- RESTORE DATABASE -->
                                <form action="<?= base_url('admin/backup/restore_db') ?>"
                                    method="post" enctype="multipart/form-data">

                                    <label class="form-label fw-semibold">
                                        Langkah 1: Pilih File Cadangan Data Sistem (.sql)
                                    </label>
                                    <small class="text-muted d-block mb-2">
                                        Pilih file hasil cadangan database sebelumnya.
                                    </small>

                                    <input type="file" class="form-control mb-3"
                                        name="sql_file" accept=".sql" required>

                                    <div class="d-flex justify-content mb-3">
                                        <button type="submit" class="btn btn-warning btn-sm">
                                            <i class="fa fa-upload"></i> Pulihkan Data Sistem
                                        </button>
                                    </div>
                                </form>


                                <!-- RESTORE FILES -->
                                <form action="<?= base_url('admin/backup/restore_files') ?>"
                                    method="post" enctype="multipart/form-data">
                                    <label class="form-label fw-semibold">
                                        Langkah 2: Pilih File Cadangan Dokumen Arsip (.zip)
                                    </label>
                                    <small class="text-muted d-block mb-2">
                                        Pilih file arsip hasil cadangan sebelumnya.
                                    </small>

                                    <input type="file" class="form-control mb-3"
                                        name="zip_file" accept=".zip" required>

                                    <div class="d-flex justify-content">
                                        <button type="submit" class="btn btn-warning btn-sm">
                                            <i class="fa fa-upload"></i> Pulihkan Dokumen Arsip
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>