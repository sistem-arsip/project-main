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
                            <div class="card-body">
                                <button class="btn btn-success mt-2">
                                    <i class="fa fa-download"></i> Klik untuk Backup database
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header bg-success text-white">
                                <strong><i class="fa fa-upload"></i> Restore</strong>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="sqlFile">Pilih File <code>*.sql</code></label>
                                        <input type="file" class="form-control-file" id="sqlFile">
                                    </div>
                                    <button type="submit" class="btn btn-success mt-2">
                                        <i class="fa fa-upload"></i> Restore Database
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
