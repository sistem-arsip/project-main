<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h4 style="margin: 0; font-weight: bold; color: #333;">Data Kategori</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="panel panel">
        <div class="panel-body">
            <div class="pull-right">
                <b>
                    <p>Jika kategori tidak tersedia, silahkan tambah <a href="<?php echo base_url('petugas/kategori/tambah'); ?>"><u>disini</u></a></p>
                    <a href="<?php echo base_url('petugas/pengajuan_kategori'); ?>"><u >Riwayat pengajuan</u></a>
                </b>
            </div>
            <br>
            <br>
            <br>
            <table id="mytable" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kategori as $kate => $var): ?>
                        <tr>
                            <td class="text-center"><?php echo $kate + 1; ?></td>
                            <td><?php echo $var['nama_kategori']; ?></td>
                            <td><?php echo $var['keterangan_kategori']; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>