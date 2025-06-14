    <div class="container-fluid" style="margin-top: 20px;">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    <h4 style="margin: 0; font-weight: bold; color: #333;">Dashboard Petugas</h4>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="traffice-source-area mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px;">
                        <h5 class="box-title">Petugas</h5>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <!-- <div id="">INI BUAT IKON GRAFIKNYA</div>  -->
                            </li>
                            <li class="text-right sp-cn-r">
                                <i class="fa fa-level-up" aria-hidden="true"></i>
                                <span class="counter text-success">
                                    <span class="counter"></span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px;">
                        <h5 class="box-title">Riwayat</h5>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <!-- <div id="">INI BUAT IKON GRAFIKNYA</div>  -->
                            </li>
                            <li class="text-right graph-two-ctn">
                                <i class="fa fa-level-up" aria-hidden="true"></i>
                                <span class="counter text-purple">
                                    <span class="counter"></span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px;">
                        <h5 class="box-title">Total Arsip</h5>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <!-- <div id="">INI BUAT IKON GRAFIKNYA</div>  -->
                            </li>
                            <li class="text-right graph-three-ctn">
                                <i class="fa fa-level-up" aria-hidden="true"></i>
                                <span class="counter text-info">
                                    <span class="counter"></span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px;">
                        <h5 class="box-title">Kategori Arsip</h5>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <!-- <div id="">INI BUAT IKON GRAFIKNYA</div>  -->
                            </li>
                            <li class="text-right graph-four-ctn">
                                <i class="fa fa-level-up" aria-hidden="true"></i>
                                <span class="text-danger">
                                    <?php echo $total_kategori; ?>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="product-sales-area mg-tb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div style="background-color: #F5F5F5; border-radius: 10px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                        <div class="portlet-title">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="caption pro-sl-hd">
                                        <span class="caption-subject"><b>Grafik pengunduhan arsip</b></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="actions graph-rp graph-rp-dl">
                                        <p>Grafik jumlah unduh arsip perhari selama sebulan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline cus-product-sl-rp">
                            <li>
                                <h5><i class="fa fa-circle" style="color: #006DF0;"></i>Jumlah Unduhan</h5>
                            </li>
                        </ul>
                        <div id="extra-area-chart" style="height: 356px;"></div>


                        <div id="morris-area-chart"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php if ($this->session->flashdata('login_success')): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '<?php echo $this->session->flashdata('login_success'); ?>',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        </script>
    <?php endif; ?>