<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Arsip</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.transitions.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/meanmenu.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/educate-custon-icon.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/morrisjs/morris.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/scrollbar/jquery.mCustomScrollbar.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/metisMenu/metisMenu.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/metisMenu/metisMenu-vertical.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/calendar/fullcalendar.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/calendar/fullcalendar.print.min.css'); ?>">
    <!-- Flatpickr Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/styles.css") ?>"  />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />


</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand fw-bold" style="background-color: #5F6F52;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 text-center text-light" href="index.html"> Arsip Digital</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fa-solid fa-bars fa-lg text-light"></i></button>

        <!-- Dropdown Notifikasi -->
         <?php 
            $notif_data = status_notifikasi_petugas($this->session->userdata("id_petugas"));
            $notifikasi = $notif_data['notifikasi'];
            $notif_belum_dibaca = $notif_data['notif_belum_dibaca'];
            ?>
        <div class="dropdown ms-auto me-3 d-none d-md-inline-block">
            <a class="btn position-relative" href="#" role="button" id="notifDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bell fa-lg text-white"></i>
                <?php if ($notif_belum_dibaca): ?>
                    <span id="notifPetugasDot" style="position: absolute; top: 3px; right: 3px; width: 10px; height: 10px; background-color: #dc3545; border: 2px solid #32cd40; border-radius: 50%;"></span>
                <?php endif; ?>
            </a>

            <ul class="dropdown-menu dropdown-menu-end p-3 shadow" aria-labelledby="notifDropdown" style="width: 350px; max-height: 400px; overflow-y: auto;">
                <div class="d-flex justify-content-between align-items-center mb-2 px-1">
                    <span class="fw-semibold">Notifikasi</span>
                    <a href="#" id="btnTandaiSemuaPetugas" class="text-decoration-none small">Tandai Dibaca</a>
                </div>

                <?php foreach ($notifikasi as $notif) : ?>
                    <?php $style = ($notif['status_notifikasi'] == 'belum') ? 'background-color: #f0f0f0;' : ''; ?>
                    <li class="dropdown-item mb-2 notif-item" data-id="<?php echo $notif['id_notifikasi'] ?>" style="white-space: normal; word-break: break-word; overflow-x: hidden; <?= $style ?> cursor: pointer;">
                        <div class="d-flex gap-2 align-items-start">
                            <div class="custom-notification-icon">
                                <i class="fas fa-bell text-white"></i>
                            </div>
                            <div>
                                <div class="small"><?php echo $notif['isi_notifikasi']; ?></div>
                                <div class="text-muted small"><?php echo $notif['waktu_notifikasi']; ?></div>
                            </div>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>


        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 text-white fw-semibold"
                id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle fa-lg text-white"></i>
                    <span class="d-none d-md-inline text-light"><?php echo $this->session->userdata('nama_petugas'); ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo base_url('petugas/profil'); ?>">Profil</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">Logout</a></li> 
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" style="background-color: #F5F5F5;" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="logo mb-2 text-center">
                        <img class="main-logo" src="<?php echo base_url("assets/img/logo/logo-ngabar.png") ?>" alt="Logo Ngabar" style="width: 150px; height: auto;">
                    </div>

                    <div class="left-custom-menu-adp-wrap comment-scrollbar">
                        <nav class="sidebar-nav left-sidebar-menu-pro" style="margin-top: 30px">
                            <ul class="metismenu text-dark" id="menu1" style="background-color: #F5F5F5;">
                                <li class="active" style="transition: background-color 0.3s;">
                                    <a href="<?php echo base_url('petugas/dashboard'); ?>" style="display: block; padding: 10px; text-decoration: none; color: inherit;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='transparent'">
                                        <i class="bi bi-house-door"></i>
                                        <span class="mini-click-non">Dashboard</span>
                                    </a>
                                </li>
                                <li style="transition: background-color 0.3s;">
                                    <a href="<?php echo base_url('petugas/kategori'); ?>" aria-expanded="false" style="display: block; padding: 10px; text-decoration: none; color: inherit;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='transparent'"><i class="bi bi-window-stack"></i> Data Kategori</span></a>
                                </li>
                                <li style="transition: background-color 0.3s;">
                                    <a href="<?php echo base_url('petugas/generate'); ?>" aria-expanded="false" style="display: block; padding: 10px; text-decoration: none; color: inherit;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='transparent'"><i class="bi bi-qr-code"></i> Buat QR Code</span></a>
                                </li>
                                <li style="transition: background-color 0.3s;">
                                    <a href="<?php echo base_url('petugas/arsip'); ?>" aria-expanded="false" style="display: block; padding: 10px; text-decoration: none; color: inherit;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='transparent'"> <i class="bi bi-file-earmark-text"></i> Arsip Unit</span></a>
                                </li>
                                <li style="transition: background-color 0.3s;">
                                    <a href="<?php echo base_url('petugas/riwayat'); ?>" aria-expanded="false" style="display: block; padding: 10px; text-decoration: none; color: inherit;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='transparent'"> <i class="bi bi-journal-bookmark-fill"></i> Riwayat Arsip</span></a>
                                </li>
                                <li style="transition: background-color 0.3s;">
                                    <a href="<?php echo base_url('auth/logout'); ?>" aria-expanded="false" style="display: block; padding: 10px; text-decoration: none; color: inherit;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='transparent'"><i class="bi bi-box-arrow-left"></i> Logout</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">



