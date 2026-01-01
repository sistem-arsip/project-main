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

                    <!-- CARD CADANGKAN -->
                    <div class="col-md-6">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header bg-success text-white">
                                <strong><i class="fa fa-database"></i> Cadangkan Data</strong>
                            </div>
                            <div class="card-body">
                                <p class="mb-3">
                                    Gunakan fitur ini untuk mencadangkan seluruh data sistem secara manual.
                                </p>

                                <div class="d-grid gap-2">
                                    <a href="<?= base_url('admin/backup/db') ?>" 
                                       class="btn btn-secondary">
                                        <i class="fa fa-database"></i> Cadangkan Database
                                    </a>

                                    <a href="<?= base_url('admin/backup/files') ?>" 
                                       class="btn btn-secondary">
                                        <i class="fa fa-archive"></i> Cadangkan File Arsip
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CARD PULIHKAN -->
                    <div class="col-md-6">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header bg-success text-white">
                                <strong><i class="fa fa-upload"></i> Pulihkan Data</strong>
                            </div>
                            <div class="card-body">

                                <p class="mb-3">
                                    Gunakan fitur ini untuk memulihkan data secara manual dari file cadangan yang telah dibuat sebelumnya.
                                </p>

                                <form action="<?= base_url('admin/backup/restore_db') ?>" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">
                                            Pilih File Database Dalam Format (.sql)
                                        </label>
                                        <input type="file" class="form-control" name="sql_file" accept=".sql" required>
                                    </div>
                                    <button type="submit" class="btn btn-secondary w-100 mb-3">
                                        <i class="fa fa-upload"></i> Pulihkan Database
                                    </button>
                                </form>

                                <form action="<?= base_url('admin/backup/restore_files') ?>" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">
                                            Pilih File Arsip Dalam Format (.zip)
                                        </label>
                                        <input type="file" class="form-control" name="zip_file" accept=".zip" required>
                                    </div>
                                    <button type="submit" class="btn btn-secondary w-100">
                                        <i class="fa fa-upload"></i> Pulihkan File Arsip
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>