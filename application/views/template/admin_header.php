<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title ?></title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/feather/feather.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/mdi/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/typicons/typicons.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/simple-line-icons/css/simple-line-icons.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/vendor/boxicons/css/boxicons.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/select2/select2.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css') ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/dataTable/css/datatables.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/vertical-layout-light/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/vertical-layout-light/custom.css') ?>">
    <!-- endinject -->
    <link rel="shortcut icon" href="#" />
</head>

<body>

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                    <span class="d-none icon-menu"></span>
                </button>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text">Welcome Back, <span class="text-black fw-bold"><?php echo $username ?></span></h1>
                    <h3 class="welcome-sub-text">Tetap Jaga Kesehatan, Tetap Jaga Semangat, Untuk Kinerja yang Lebih Baik </h3>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form class="search-form" action="#">
                        <i class="icon-search"></i>
                        <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                    </form>
                </li>

                <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                    <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="img-xs rounded-circle" src="<?php echo base_url('assets/images/faces/face8.jpg') ?>" alt="Profile image"> </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                            <img class="img-xs rounded-circle" src="<?php echo base_url('assets/images/faces/face8.jpg') ?>" alt="Profile image"> </a>
                            <p class="mb-1 mt-3 font-weight-semibold"><?php echo $username ?></p>
                        </div>
                        <a class="dropdown-item" href="<?php echo base_url('admin/Auth/logout') ?>"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                    <div class="img-ss rounded-circle bg-light border me-3"></div>Light
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('/admin/Dashboard') ?>">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Master Data</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="true" aria-controls="ui-basic">
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title">Master Data</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse show" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/barang') ?>">Barang</a></li>
                            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/jenis_barang') ?>">Jenis Barang</a></li>
                            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/pengirim') ?>">Pengirim</a></li>
                            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/penerima') ?>">Penerima</a></li>
                            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/pengiriman') ?>">Pengiriman</a></li>
                            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/vendor') ?>">Vendor</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
        </nav>