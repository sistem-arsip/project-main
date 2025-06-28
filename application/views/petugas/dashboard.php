
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .card-box {
            background-color: #F5F5F5;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-title {
            margin: 0;
            font-weight: bold;
            color: #333;
        }

        .stat-number {
            font-size: 24px;
            font-weight: bold;
        }
    </style>

<body>

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="card-title">Dashboard Petugas</h4>
                </div>
            </div>
        </div>

        <div class="traffice-source-area mb-4">
            <div class="container-fluid">
                <div class="row g-3">

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="bg-light rounded-4 p-4 shadow-sm border border-light h-100">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <h6 class="mb-1 text-muted">Total Arsip Unit</h6>
                                    <h3 class="fw-bold mb-0"><?php echo $total_arsip_unit ?></h3>
                                </div>
                                <div class="text-primary bg-primary bg-opacity-10 rounded-circle p-3">
                                    <i class="fa fa-users fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="bg-light rounded-4 p-4 shadow-sm border border-light h-100">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <h6 class="mb-1 text-muted">Riwayat Arsip Saya</h6>
                                    <h3 class="fw-bold mb-0"><?php echo $total_arsip_saya ?></h3>
                                </div>
                                <div class="text-success bg-success bg-opacity-10 rounded-circle p-3">
                                    <i class="fa fa-history fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="bg-light rounded-4 p-4 shadow-sm border border-light h-100">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <h6 class="mb-1 text-muted">Kategori Arsip</h6>
                                    <h3 class="fw-bold mb-0"><?php echo $total_kategori ?></h3>
                                </div>
                                <div class="text-info bg-info bg-opacity-10 rounded-circle p-3">
                                    <i class="fa fa-file-archive-o fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card-box">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <h5 class="mb-0"><b>Grafik Jumlah Arsip Tahun</b></h5>
                                <select id="tahunSelect" class="form-select ms-3" style="width:auto; min-width:120px;">
                                    <?php foreach ($tahunList as $tahun): ?>
                                        <option value="<?= $tahun ?>" <?= ($tahun == date('Y')) ? 'selected' : '' ?>>
                                            <?= $tahun ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>


                        </div>
                    </div>
                    <canvas id="uploadChart" style="height: 150px;"></canvas>
                </div>
            </div>
        </div>


    </div>

    <script>
        // Ambil dataset dari PHP
        const arsipDataPerTahun = <?php echo $arsipDataPerTahunJson; ?>;

        // Ambil tahun yang terpilih default
        const tahunAwal = document.getElementById('tahunSelect').value;

        const ctx = document.getElementById('uploadChart').getContext('2d');
        const uploadChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                    'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des',
                ],
                datasets: [{
                    label: 'Jumlah Upload',
                    data: arsipDataPerTahun[tahunAwal] || [],
                    fill: true,
                    backgroundColor: 'rgba(0, 109, 240, 0.2)',
                    borderColor: '#006DF0',
                    tension: 0.4,
                    pointBackgroundColor: '#006DF0'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {display: false} ,
                        grid: {display: false}
                    }
                }
            }
        });

        // Ubah grafik saat tahun diganti manual
        document.getElementById('tahunSelect').addEventListener('change', function () {
            const tahunDipilih = this.value;
            uploadChart.data.datasets[0].data = arsipDataPerTahun[tahunDipilih] || [];
            uploadChart.update();
        });
    </script>


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

</body>

</html>