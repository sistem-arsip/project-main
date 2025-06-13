<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        


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
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link href="<?php echo base_url("assets/css/styles.css") ?>" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand" style="background-color: #32cd40; color: hex;">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 text-dark" href="index.html">Sistem Arsip Digital</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-dark" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn" style="background-color: #38E54D;" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo base_url('admin/profil'); ?>">Profil</a></li>
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
                            <img class="main-logo" src="<?php echo base_url("assets/img/logo/logo-ngabar.png") ?>" alt="Logo Ngabar" style="width: 120px; height: auto;">
                        </div>
                        <div class="left-custom-menu-adp-wrap comment-scrollbar">

                <nav class="sidebar-nav left-sidebar-menu-pro" style=" margin-top: 30px">

                    <ul class="metismenu text-dark" id="menu1" style="background-color: #F5F5F5;">
    <li class="active" style="transition: background-color 0.3s;">
        <a href="<?php echo base_url('admin/dashboard'); ?>" style="display: block; padding: 10px; text-decoration: none; color: inherit;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='transparent'">
            <i class="bi bi-house-door"></i>
            <span class="mini-click-non">Dashboard</span>
        </a>
    </li>

    <li style="transition: background-color 0.3s;">
        <a href="<?php echo base_url('admin/kategori'); ?>" aria-expanded="false" style="display: block; padding: 10px; text-decoration: none; color: inherit;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='transparent'">
            <i class="bi bi-window-stack"></i> Kategori Arsip
        </a>
    </li>

    <li style="transition: background-color 0.3s;">
        <a href="<?php echo base_url('admin/pengajuan_kategori'); ?>" aria-expanded="false" style="display: block; padding: 10px; text-decoration: none; color: inherit;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='transparent'">
            <i class="bi bi-window-stack"></i> Pengajuan Kategori
        </a>
    </li>

    <li style="transition: background-color 0.3s;">
        <a href="<?php echo base_url('admin/petugas'); ?>" aria-expanded="false" style="display: block; padding: 10px; text-decoration: none; color: inherit;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='transparent'">
            <i class="bi bi-file-earmark-text"></i> Data Petugas
        </a>
    </li>

    <li style="transition: background-color 0.3s;">
        <a href="<?php echo base_url('admin/unit'); ?>" aria-expanded="false" style="display: block; padding: 10px; text-decoration: none; color: inherit;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='transparent'">
            <i class="bi bi-journal-bookmark-fill"></i> Data Unit
        </a>
    </li>

    <li style="transition: background-color 0.3s;">
        <a href="<?php echo base_url('admin/arsip'); ?>" aria-expanded="false" style="display: block; padding: 10px; text-decoration: none; color: inherit;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='transparent'">
            <i class="bi bi-journal-bookmark-fill"></i> Data Arsip
        </a>
    </li>

    <li style="transition: background-color 0.3s;">
        <a href="<?php echo base_url('auth/logout'); ?>" aria-expanded="false" style="display: block; padding: 10px; text-decoration: none; color: inherit;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='transparent'">
            <i class="bi bi-box-arrow-left"></i> Logout
        </a>
    </li>
</ul>

            </div>
                        
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        