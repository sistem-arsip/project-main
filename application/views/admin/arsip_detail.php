<?php
$arsip['ekstensi_file_arsip'] = pathinfo($arsip['file_arsip'], PATHINFO_EXTENSION);
?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Preview Arsip</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Preview Arsip</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Preview Arsip</h3>
                </div>
                <div class="panel-body">

                    <a href="<?php echo base_url('admin/arsip'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

                    <br>
                    <br>

                    <div class="row">
                        <div class="col-lg-4">

                            <table class="table">
                                    <tr>
                                        <th>Kode Arsip</th>
                                        <td><?php echo $arsip['kode_arsip']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Waktu Upload</th>
                                        <td><?php echo date('H:i:s  d-m-Y', strtotime($arsip['waktu_upload'])) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama File</th>
                                        <td><?php echo $arsip['nama_arsip']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td><?php echo $arsip['nama_kategori']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis File</th>
                                        <td><?php echo strtoupper($arsip['ekstensi_file_arsip']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Petugas Pengupload</th>
                                        <td>Bagian <?php echo $arsip['nama_unit']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td><?php echo $arsip['keterangan_arsip']; ?></td>
                                    </tr>
                            </table>

                            <?php echo $qrcode ?>

                        </div>
                        <div class="col-lg-8">
                            <?php if ($arsip['ekstensi_file_arsip']=="pdf"): ?>
                                     <iframe src="<?php echo base_url("assets/arsip/".$arsip['file_arsip']) ?>" width="100%" height="500"></iframe>   
                                <?php endif ?>

                                <?php if (in_array($arsip['ekstensi_file_arsip'], ['png','jpg','jpeg'])): ?>
                                     <img src="<?php echo base_url("assets/arsip/".$arsip['file_arsip']) ?>" class="w-100 img-fluid">   
                                <?php endif ?>

                                <?php if (in_array($arsip['ekstensi_file_arsip'], ['doc','docx'])): ?>
                                     <iframe src="https://docs.google.com/gview?url=<?php echo base_url("assets/arsip/".$arsip['file_arsip']) ?>&embedded=true"></iframe> 
                                <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>