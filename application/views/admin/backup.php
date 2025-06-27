<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Backup & Restore</h4>
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
                    <div class="col-md-6">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header bg-success text-white">
                                <strong><i class="fa fa-database"></i> Backup</strong>
                            </div>
                            <div class="card-body d-flex justify-content-center gap-3">
                                <a href="<?php echo base_url('admin/backup/db') ?>" class="btn btn-success mt-4">
                                    <i class="fa fa-download"></i> Klik untuk Backup database
                                </a>
                                <a href="<?php echo base_url('admin/backup/files') ?>" class="btn btn-success mt-4">
                                    <i class="fa fa-archive"></i> Klik untuk Backup File Arsip
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header bg-success text-white">
                                <strong><i class="fa fa-upload"></i> Restore</strong>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/backup/restore_db') ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="sqlFile">Pilih File <code>*.sql</code></label>
                                        <input type="file" class="form-control-file" name="sql_file" id="sqlFile" accept=".sql" required>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-3">
                                        <i class="fa fa-upload"></i> Restore Database
                                    </button>
                                </form>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/backup/restore_files') ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="zipFile">Pilih File ZIP Arsip</label>
                                        <input type="file" class="form-control-file" name="zip_file" id="zipFile" accept=".zip" required>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-2">
                                        <i class="fa fa-upload"></i> Restore File Arsip
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div>
        </div>
    </div>
</div>
