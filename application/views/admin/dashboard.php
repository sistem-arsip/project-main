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
            <span class="counter"><?php echo $total_petugas ?></span>
            <li class="text-end text-success">
              <i class="fa fa-level-up" aria-hidden="true"></i>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="bg-light rounded p-4 shadow-sm h-100">
          <h5 class="box-title">Unit</h5>
          <ul class="list-inline two-part-sp d-flex justify-content-between align-items-center mb-0">
            <span class="counter"><?php echo $total_unit ?></span>
            <li class="text-end text-purple">
              <i class="fa fa-level-up" aria-hidden="true"></i>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="bg-light rounded p-4 shadow-sm h-100">
          <h5 class="box-title">Total Arsip</h5>
          <ul class="list-inline two-part-sp d-flex justify-content-between align-items-center mb-0">
            <span class="counter"><?php echo $total_arsip ?></span>
            <li class="text-end text-info">
              <i class="fa fa-level-up" aria-hidden="true"></i>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="bg-light rounded p-4 shadow-sm h-100">
          <h5 class="box-title">Kategori Arsip</h5>
          <ul class="list-inline two-part-sp d-flex justify-content-between align-items-center mb-0">
            <span class="counter"><?php echo $total_kategori ?></span>
            <li class="text-end text-danger">
              <i class="fa fa-level-up" aria-hidden="true"></i>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<h4 class="mb-4">Dashboard Admin - Grafik Jumlah Arsip per Unit</h4>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow-sm">
        <div class="card-body">
          <div style="overflow-x: auto;">
            <canvas id="barChartUnit" height="400" style="min-width: 500px;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-10">
      <div class="bg-light rounded shadow-sm p-3">
        <!-- Load Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
          const dataUnit = <?php echo json_encode($data_arsip_per_unit); ?>;
          const labels = dataUnit.map(item => item.unit);
          const data = dataUnit.map(item => item.jumlah);

          // ✅ Fungsi untuk generate warna acak (dalam rgba)
          function getRandomColor(opacity = 0.7) {
            const r = Math.floor(Math.random() * 256);
            const g = Math.floor(Math.random() * 256);
            const b = Math.floor(Math.random() * 256);
            return `rgba(${r}, ${g}, ${b}, ${opacity})`;
          }

          // Buat array warna acak sebanyak jumlah unit
          const backgroundColors = labels.map(() => getRandomColor(0.7));
          const borderColors = backgroundColors.map(color => color.replace(/0\.7/, '1'));

          const ctx = document.getElementById('barChartUnit').getContext('2d');
          new Chart(ctx, {
            type: 'bar',
            data: {
              labels: labels,
              datasets: [{
                label: 'Jumlah Arsip per Unit',
                data: data,
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1,
                borderRadius: 5
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              scales: {
                x: {
                  grid: {
                    display: false
                  },
                  ticks: {
                    font: {
                      size: 10
                    }
                  }
                },
                y: {
                  grid: {
                    display: false
                  },
                  ticks: {
                    display: false
                  }
                }
              },
              plugins: {
                legend: {
                  display: false
                },
                tooltip: {
                  enabled: true
                }
              }
            }
          });
        </script>
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