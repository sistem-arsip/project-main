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
        <div class="bg-light rounded-4 p-4 shadow-sm border border-light h-100">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
              <h6 class="mb-1 text-muted">Petugas</h6>
              <h3 class="fw-bold mb-0"><?php echo $total_petugas ?></h3>
            </div>
            <div class="text-primary bg-primary bg-opacity-10 rounded-circle p-3">
              <i class="fa fa-users fa-2x"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="bg-light rounded-4 p-4 shadow-sm border border-light h-100">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
              <h6 class="mb-1 text-muted">Unit</h6>
              <h3 class="fw-bold mb-0"><?php echo $total_unit ?></h3>
            </div>
            <div class="text-success bg-success bg-opacity-10 rounded-circle p-3">
              <i class="fa fa-sitemap fa-2x"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="bg-light rounded-4 p-4 shadow-sm border border-light h-100">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
              <h6 class="mb-1 text-muted">Total Arsip</h6>
              <h3 class="fw-bold mb-0"><?php echo $total_arsip ?></h3>
            </div>
            <div class="text-info bg-info bg-opacity-10 rounded-circle p-3">
              <i class="fa fa-file-archive-o fa-2x"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="bg-light rounded-4 p-4 shadow-sm border border-light h-100">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
              <h6 class="mb-1 text-muted">Kategori Arsip</h6>
              <h3 class="fw-bold mb-0"><?php echo $total_kategori ?></h3>
            </div>
            <div class="text-danger bg-danger bg-opacity-10 rounded-circle p-3">
              <i class="fa fa-tags fa-2x"></i>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<h4 class="mb-4">Grafik Jumlah Arsip per Unit</h4>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="bg-light rounded shadow-sm p-3">

        <!-- Chart.js & Datalabels plugin -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

        <!-- Responsive Chart Container -->
        <div class="card shadow-sm">
          <div class="card-body">
            <div style="position: relative; width: 100%; height: 300px;">
              <canvas id="barChartUnit"></canvas>
            </div>
          </div>
        </div>

        <!-- Chart Script -->
        <script>
          const dataUnit = <?php echo json_encode($data_arsip_per_unit); ?>;
          const labels = dataUnit.map(item => item.unit);
          const data = dataUnit.map(item => item.jumlah);

          const ctx = document.getElementById('barChartUnit').getContext('2d');

          new Chart(ctx, {
            type: 'bar',
            data: {
              labels: labels,
              datasets: [{
                label: 'Jumlah Arsip',
                data: data,
                backgroundColor: 'rgba(0, 123, 255, 0.7)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1,
                borderRadius: 8,
                barPercentage: 0.6
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              animation: {
                duration: 1000,
                easing: 'easeOutQuart'
              },
              scales: {
                x: {
                  grid: {
                    display: false
                  },
                  ticks: {
                    font: {
                      size: 10
                    },
                    color: '#333'
                  }
                },
                y: {
                  beginAtZero: true,
                  grid: {
                    display: false
                  },
                  ticks: {
                    display: false // Hilangkan angka 0–6
                  },
                  border: {
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
                },
                datalabels: {
                  anchor: 'end',
                  align: 'end',
                  color: '#111',
                  font: {
                    size: 10,
                    weight: 'bold'
                  },
                  formatter: value => value
                }
              }
            },
            plugins: [ChartDataLabels]
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