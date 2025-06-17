<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Tambah Petugas</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <div class="bg-light rounded shadow-sm p-3">
                <div class="d-flex justify-content-end mb-3">
                    <a href="<?php echo base_url('admin/petugas'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama_petugas" class="form-label">Nama</label>
                        <input type="text" id="nama_petugas" class="form-control" name="nama_petugas">
                    </div>

                    <div class="mb-3">
                        <label for="username_petugas" class="form-label">Username</label>
                        <input type="text" id="username_petugas" class="form-control" name="username_petugas" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="password_petugas" class="form-label">Password</label>
                        <input type="password" id="password_petugas" class="form-control" name="password_petugas" autocomplete="new-password">
                    </div>

                    <div class="mb-3">
                        <label for="pilihan" class="form-label">Unit</label>
                        <select id="pilihan" name="id_unit" class="form-select">
                            <option value="" selected disabled>Pilih Unit</option>
                            <?php foreach ($unit as $key => $value): ?>
                                <option value="<?php echo $value['id_unit']; ?>"><?php echo $value['nama_unit']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-outline-light fa-plus" style="background-color: #5F6F52;"> Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<br>