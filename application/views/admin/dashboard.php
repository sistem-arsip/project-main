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
<!-- DOWNLOAD -->
<div class="container-fluid mb-3">
  <div class="d-flex align-items-center gap-2">

    <!-- Button utama -->
    <div class="d-flex flex-wrap align-items-end gap-2">

      <!-- DROPDOWN DOWNLOAD -->
      <div class="dropdown">
        <button class="btn btn-sm btn-success dropdown-toggle"
          type="button"
          data-bs-toggle="dropdown">
          <i class="fa fa-download"></i>
          <span class="d-none d-md-inline"> Download Laporan</span>
        </button>

        <ul class="dropdown-menu">
          <li>
            <a class="dropdown-item" href="#" onclick="pilihJenis('bulanan')">
              Laporan Bulanan
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#" onclick="pilihJenis('tahunan')">
              Laporan Tahunan
            </a>
          </li>
        </ul>
      </div>

      <!-- PILIH TAHUN -->
      <select id="tahun"
        class="form-select form-select-sm d-none"
        style="width:150px">
        <option value="">Pilih Tahun</option>
        <?php foreach ($tahun_arsip as $t): ?>
          <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
        <?php endforeach; ?>
      </select>

      <!-- PILIH BULAN -->
      <select id="bulan"
        class="form-select form-select-sm d-none"
        style="width:180px">
        <option value="">Pilih Bulan</option>
      </select>

      <!-- BUTTON DOWNLOAD -->
      <button id="btnDownload"
        class="btn btn-sm btn-success d-none">
        <i class="fa fa-download"></i>
        <span class="d-none d-md-inline"> Download</span>
      </button>

    </div>
  </div>

  <h5 class=" mt-3 mb-3">Grafik Jumlah Arsip per Unit</h5>

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
            const labels = dataUnit.map(item => item.nama_unit);
            const data = dataUnit.map(item => item.jumlah);

            const maxData = Math.max(...data);

            // LOGIKA STEP ADAPTIF (ANTI UI JELEK)
            let step;
            if (maxData <= 50) {
              step = 10;
            } else if (maxData <= 100) {
              step = 20;
            } else {
              step = 50;
            }

            const maxScale = Math.ceil(maxData / step) * step;

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

                    ticks: {
                      stepSize: step,
                      color: '#333',
                      font: {
                        size: 11
                      }
                    },

                    suggestedMax: maxScale,

                    grid: {
                      display: false
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

  <script>
    let jenis = '';

    // =====================
    // PILIH JENIS LAPORAN
    // =====================
    function pilihJenis(val) {
      jenis = val;

      // sembunyikan semua dulu
      document.getElementById('bulan').classList.add('d-none');
      document.getElementById('tahun').classList.add('d-none');
      document.getElementById('btnDownload').classList.add('d-none');

      // reset value
      document.getElementById('bulan').value = '';
      document.getElementById('tahun').value = '';

      if (val === 'bulanan') {
        // ✅ BULANAN: tampilkan TAHUN dulu
        document.getElementById('tahun').classList.remove('d-none');
      } else if (val === 'tahunan') {
        // ✅ TAHUNAN: hanya tahun
        document.getElementById('tahun').classList.remove('d-none');
      }
    }

    // =====================
    // SAAT TAHUN DIPILIH
    // =====================
    document.getElementById('tahun').addEventListener('change', function() {

      let tahun = this.value;
      let bulanSelect = document.getElementById('bulan');

      // reset bulan & tombol
      bulanSelect.innerHTML = '<option value="">Pilih Bulan</option>';
      document.getElementById('btnDownload').classList.add('d-none');

      // =====================
      // JIKA BULANAN
      // =====================
      if (jenis === 'bulanan' && tahun !== '') {

        // ✅ tampilkan BULAN setelah tahun dipilih
        document.getElementById('bulan').classList.remove('d-none');

        fetch("<?= base_url('admin/dashboard/get_bulan_by_tahun/') ?>" + tahun)
          .then(response => response.json())
          .then(data => {
            data.forEach(function(b) {
              let namaBulan = new Date(2024, b.bulan - 1)
                .toLocaleString('id-ID', {
                  month: 'long'
                });

              bulanSelect.innerHTML +=
                '<option value="' + b.bulan + '">' + namaBulan + '</option>';
            });
          });
      }

      tampilDownload();
    });

    // =====================
    // SAAT BULAN DIPILIH
    // =====================
    document.getElementById('bulan').addEventListener('change', tampilDownload);

    // =====================
    // LOGIKA TOMBOL DOWNLOAD
    // =====================
    function tampilDownload() {
      let tahun = document.getElementById('tahun').value;
      let bulan = document.getElementById('bulan').value;

      if (
        (jenis === 'bulanan' && tahun !== '' && bulan !== '') ||
        (jenis === 'tahunan' && tahun !== '')
      ) {
        document.getElementById('btnDownload').classList.remove('d-none');
      } else {
        document.getElementById('btnDownload').classList.add('d-none');
      }
    }

    // =====================
    // AKSI DOWNLOAD
    // =====================
    document.getElementById('btnDownload').addEventListener('click', function() {

      let url = '';

      if (jenis === 'bulanan') {
        let bulan = document.getElementById('bulan').value;
        let tahun = document.getElementById('tahun').value;

        if (bulan === '' || tahun === '') {
          alert('Silakan pilih tahun dan bulan terlebih dahulu');
          return;
        }

        url = "<?= base_url('admin/laporan/bulanan/') ?>" + bulan + "/" + tahun;

      } else if (jenis === 'tahunan') {
        let tahun = document.getElementById('tahun').value;

        if (tahun === '') {
          alert('Silakan pilih tahun terlebih dahulu');
          return;
        }

        url = "<?= base_url('admin/laporan/tahunan/') ?>" + tahun;
      }

      window.location.href = url;
    });
  </script>