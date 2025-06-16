<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h4 style="margin: 0; font-weight: bold; color: #333;">Data Arsip</h4>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="panel panel">
        <div class="panel-body">
            <div class="pull-right">
                <a href="<?php echo base_url('petugas/arsip/tambah'); ?>" class="btn" style="background-color: #38E54D;"><i class="fa fa-cloud"></i> Upload Arsip</a>
            </div>
            <br>
            <br>
            <br>

            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th class="d-none d-md-block">Waktu Upload</th>
                        <th>Arsip</th>
                        <th>Kategori</th>
                        <th>Petugas</th>
                        <th>Keterangan</th>
                        <th class="text-center" width="20%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arsip as $a => $v): ?>
                        <tr>
                            <td><?php echo $a + 1; ?></td>
                            <td class="d-none d-md-block"><?php echo $v['waktu_upload']; ?></td>
                            <td>

                                <b>KODE: <?php echo $v['kode_arsip']; ?><br>
                                <b>Nama: <?php echo $v['nama_arsip']; ?><br>

                            </td>
                            <td>
                                <?php echo $v['nama_kategori']; ?>
                                <div class="d-block d-md-none"><?php echo $v['waktu_upload']; ?></div>
                            </td>
                            <td>
                                <b>Petugas :</b> <?php echo $v['nama_petugas']; ?> <br>
                                <b>Bagian :</b> <?php echo $v['nama_unit']; ?> <br>
                            </td>
                            <td><?php echo $v['keterangan_arsip']; ?></td>
                            <td class="text-center">
                                <div class="btn-group">

                                    <a href="<?php echo base_url('petugas/arsip/detail/' . $v['id_arsip']); ?>" class="btn" style="background-color: #38E54D;  padding-right: 10px; margin-right: 5px;"><i class="fa fa-search"></i> Preview</a>
                                    <?php if ($v['id_petugas'] == $this->session->userdata('id_petugas')): ?>
                                        <a href="<?php echo base_url('petugas/arsip/edit/' . $v['id_arsip']); ?>" class="btn" style="background-color: #38E54D;  padding-right: 10px; margin-right: 5px;"><i class="fa fa-wrench"></i></a>
                                        <a href="<?php echo base_url('petugas/arsip/hapus/' . $v['id_arsip']); ?>" class="btn" style="background-color: #38E54D;" onclick="return confirm('Yakin ingin menghapus arsip ini?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    <?php endif; ?>

                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>