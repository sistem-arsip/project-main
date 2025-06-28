<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Pengajuan Kategori</h4>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded shadow-sm p-3">
                <div class="table-responsive">
                    <br>
                    <table id="mytable" class="table table-bordered table-striped table-hover w-100">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Kategori</th>
                                <th>Keterangan</th>
                                <th>Petugas</th>
                                <th>Unit</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengajuan as $pn => $var): ?>
                                <tr id="pengajuan-<?php echo $var['id_pengajuan']; ?>">
                                    <td class="text-center"><?php echo $pn + 1; ?></td>
                                    <td><?php echo $var['nama_pengajuan']; ?></td>
                                    <td><?php echo $var['keterangan_pengajuan']; ?></td>
                                    <td><?php echo $var['nama_petugas']; ?></td>
                                    <td><?php echo $var['nama_unit']; ?></td>
                                    <td class="text-center">
                                        <?php if ($var['status_pengajuan'] == 'pending'): ?>
                                            <a href="<?php echo base_url('admin/pengajuan_kategori/terima/' . $var['id_pengajuan']); ?>"
                                                class="btn btn-success btn-xs" style="color: #fff;"
                                                onclick="return confirm('Yakin akan menerima kategori ini?')">Terima</a>
                                            <span class="btn btn-danger btn-xs btn-tolak" style="color: #fff;" 
                                                id_pengajuan="<?php echo $var['id_pengajuan'] ?>">Tolak</span>
                                        <?php elseif ($var['status_pengajuan'] == 'accepted'): ?>
                                            <span class="text-success"><i class="fa fa-check"></i></span>
                                        <?php elseif ($var['status_pengajuan'] == 'rejected'): ?>
                                            <span class="text-danger"><i class="fa fa-times"></i></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Alasan Penolakan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url("admin/pengajuan_kategori/tolak") ?>" method="POST">
            <div class="mb-2">
                <label>Masukkan Alasan Penolakan</label>
                <input type="hidden" name="id_pengajuan">
                <textarea name="alasan" class="form-control" value="" placeholder="" required></textarea>
            </div>
            <button class="btn btn-success">Kirim</button>
        </form>
      </div>
      
    </div>
  </div>
</div>

<script>
    $(document).ready(function(e){
        $(document).on("click", ".btn-tolak", function(){
            var id_pengajuan = $(this).attr("id_pengajuan");
            $("#exampleModal input[name=id_pengajuan]").val(id_pengajuan);
            $("#exampleModal").modal("show");
        })
    })
</script>