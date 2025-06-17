<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Tambah Kategori</h4>
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
                    <a href="<?php echo base_url('admin/kategori'); ?>" class="btn btn-sm btn-outline-dark">
                        <i class="fa fa-arrow-left"></i> Kembali</a>
                </div>

                <form method="post">
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" id="nama_kategori" class="form-control" name="nama_kategori" required>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan_kategori" class="form-label">Keterangan</label>
                        <textarea id="keterangan_kategori" class="form-control" name="keterangan_kategori" required></textarea>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-outline-light fa-plus" style="background-color: #5F6F52;"> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>