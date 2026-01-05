<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Sistem Arsip Digital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url("../assets/img/homepage.jpg") no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }

        .error-pagewrap::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }

        .error-page-int {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px 20px;
        }

        .custom-login h4,
        .custom-login h5 {
            color: #fff;
            text-align: center;
        }

        .content-error {
            background: #f9f9f9;
            padding: 35px 30px;
            border-radius: 12px;
            max-width: 420px;
            width: 100%;
            margin: 0 auto;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.4);
        }

        .panel-body h4 {
            margin-bottom: 10px;
            font-weight: 600;
            text-align: center;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group i {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #555;
        }

        .form-control {
            height: 45px;
            padding-left: 38px;
            font-size: 15px;
        }

        .alert-info-box {
            font-size: 14px;
            color: #333;
            background-color: #f8f9fa;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 10px;
            margin-top: 10px;
            display: flex;
            align-items: center;
        }

        .alert-info-box i {
            margin-right: 8px;
            color: #17a2b8;
        }

        .loginbtn {
            background-color: #5CB338;
            border: none;
            font-weight: 600;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .loginbtn:hover {
            background-color: #347928;
            color: #fff;
        }

        a.btn-sm {
            padding: 6px 14px;
            font-size: 13px;
            font-weight: 500;
        }

        a {
            color: #fff;
            text-align: center;
            display: block;
            margin-top: 20px;
        }

        @media (max-width: 480px) {
            .content-error {
                padding: 25px 20px;
            }

            .form-control {
                font-size: 14px;
            }

            .custom-login h4 {
                font-size: 18px;
            }

            .custom-login h5 {
                font-size: 14px;
            }
        }
    </style>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="custom-login mb-4">
                <h4>Sistem Arsip Digital</h4>
                <h5>Pondok Pesantren Wali Songo Ngabar</h5>
            </div>

            <div class="content-error">
                <?php
                if ($this->input->get('alert') == "gagal") {
                    echo "<div class='alert alert-danger'>Login Gagal! Username & Password Salah!</div>";
                } else if ($this->input->get('alert') == "logout") {
                    echo "<div class='alert alert-success'>Anda Telah Berhasil Logout</div>";
                } else if ($this->input->get('alert') == "belum_login") {
                    echo "<div class='alert alert-warning'>Anda Harus Login Untuk Mengakses Dashboard</div>";
                }
                ?>

                <div class="hpanel">
                    <div class="panel-body">
                        <h4>Login Admin / Petugas</h4>
                        <div class="alert-info-box">
                            <i class="fas fa-circle-info"></i>
                            <span>Silahkan login untuk mengakses arsip.</span>
                        </div><br>
                        <form action="<?php echo site_url('auth/proses_login'); ?>" method="POST" id="loginForm" autocomplete="off">
                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>" placeholder="Username" required>
                                <span class="small text-danger"><?php echo form_error('username'); ?></span>
                            </div>
                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" placeholder="Password" required>
                                <span class="small text-danger"><?php echo form_error('password'); ?></span>
                            </div>
                            <div class="form-group">
                                <i class="fas fa-user-shield"></i>
                                <select class="form-control" name="akses" id="roleSelect">
                                    <option value="" <?php echo set_select('akses', '', TRUE); ?>>Pilih Role</option>
                                    <option value="admin" <?php echo set_select('akses', 'admin'); ?>>Admin</option>
                                    <option value="petugas" <?php echo set_select('akses', 'petugas'); ?>>Petugas</option>
                                </select>
                            </div>
                            <?php if (form_error('akses')): ?>
                                <div style="color: red; font-size: 14px; margin-top: 5px; margin-bottom: 12px;">
                                    <i class="fas fa-exclamation-circle"></i> <?php echo strip_tags(form_error('akses')); ?>
                                </div>
                            <?php endif; ?>
                            <input type="submit" class="btn btn-block loginbtn" value="Login">
                            <div class="alert-info-box mt-3" style="justify-content: center;">
                                <i class="fas fa-circle-question"></i>
                                <span>
                                    <a href="https://docs.google.com/document/d/e/2PACX-1vSlHYmXGWtLJXbS4BNiKF3hUmWyWFBeFqZvFff7w6-rgmOrd4Gmo7W3sml5vEi3Uob7L3Npqbv6S4tY/pub"
                                        target="_blank"
                                        style="color:#0d6efd; display:inline; margin-top:0;">
                                        Lihat Panduan Login
                                    </a>
                                </span>
                            </div>

                        </form>
                        <div class="text-center mt-3">
                            <a href="<?php echo base_url('/'); ?>" class="btn btn-sm btn-success text-light">← Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo base_url('assets/js/vendor/jquery-1.12.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

    <?php if ($this->session->flashdata('pesan_sukses')): ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '<?php echo $this->session->flashdata('pesan_sukses'); ?>',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        </script>
    <?php endif ?>

    <?php if ($this->session->flashdata('pesan_gagal')): ?>
        <script>
            Swal.fire("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal'); ?>", "error");
        </script>
    <?php endif ?>

    <?php if ($this->session->flashdata('logout_success')): ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: "<?php echo $this->session->flashdata('logout_success'); ?>",
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true
            });
        </script>
    <?php endif; ?>

    <!-- select login -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const roleSelect = document.getElementById('roleSelect');

            form.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    if (document.activeElement === roleSelect) {
                        e.preventDefault();
                        form.submit();
                    }
                }
            });
        });
    </script>

    <?php if ($this->session->flashdata('gagal')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Login!',
                text: "<?php echo $this->session->flashdata('gagal'); ?>",
            });
        </script>
    <?php endif; ?>


</body>

</html>