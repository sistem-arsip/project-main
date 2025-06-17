<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="bg-light rounded p-3 shadow-sm">
                <h4 class="m-0 fw-bold text-dark">Dashboard Admin</h4>
            </div>
        </div>
    </div>
</div>
<br>

<div class="traffice-source-area mb-4">
  <div class="container-fluid">
    <div class="row g-3">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="bg-light rounded p-4 shadow-sm h-100">
          <h5 class="box-title">Petugas</h5>
          <ul class="list-inline two-part-sp d-flex justify-content-between align-items-center mb-0">
            <li>
              <!-- <div id="">INI BUAT IKON GRAFIKNYA</div> -->
            </li>
            <li class="text-end text-success">
              <i class="fa fa-level-up" aria-hidden="true"></i> 
              <span class="counter"></span>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="bg-light rounded p-4 shadow-sm h-100">
          <h5 class="box-title">Unit</h5>
          <ul class="list-inline two-part-sp d-flex justify-content-between align-items-center mb-0">
            <li>
              <!-- <div id="">INI BUAT IKON GRAFIKNYA</div> -->
            </li>
            <li class="text-end text-purple">
              <i class="fa fa-level-up" aria-hidden="true"></i> 
              <span class="counter"><?php echo $total_unit; ?></span>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="bg-light rounded p-4 shadow-sm h-100">
          <h5 class="box-title">Total Arsip</h5>
          <ul class="list-inline two-part-sp d-flex justify-content-between align-items-center mb-0">
            <li>
              <!-- <div id="">INI BUAT IKON GRAFIKNYA</div> -->
            </li>
            <li class="text-end text-info">
              <i class="fa fa-level-up" aria-hidden="true"></i> 
              <span class="counter"></span>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="bg-light rounded p-4 shadow-sm h-100">
          <h5 class="box-title">Kategori Arsip</h5>
          <ul class="list-inline two-part-sp d-flex justify-content-between align-items-center mb-0">
            <li>
              <!-- <div id="">INI BUAT IKON GRAFIKNYA</div> -->
            </li>
            <li class="text-end text-danger">
              <i class="fa fa-level-up" aria-hidden="true"></i> 
              <?php echo $total_kategori; ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="product-sales-area mb-4">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="bg-light rounded p-4 shadow-sm">
          <div class="portlet-title">
            <div class="row">
              <div class="col-6">
                <div class="caption pro-sl-hd">
                  <span class="caption-subject fw-bold">Grafik pengunduhan arsip</span>
                </div>
              </div>
              <div class="col-6">
                <div class="actions graph-rp graph-rp-dl text-end">
                  <p>Grafik jumlah unduh arsip perhari selama sebulan</p>
                </div>
              </div>
            </div>
          </div>

          <ul class="list-inline cus-product-sl-rp mb-3">
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
