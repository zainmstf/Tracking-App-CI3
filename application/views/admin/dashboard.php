<?php
function singkat_angka($n, $presisi = 1)
{
    if ($n < 900) {
        $format_angka = number_format($n, $presisi);
        $simbol = '';
    } else if ($n < 900000) {
        $format_angka = number_format($n / 1000, $presisi);
        $simbol = ' rb';
    } else if ($n < 900000000) {
        $format_angka = number_format($n / 1000000, $presisi);
        $simbol = ' jt';
    } else if ($n < 900000000000) {
        $format_angka = number_format($n / 1000000000, $presisi);
        $simbol = ' M';
    } else {
        $format_angka = number_format($n / 1000000000000, $presisi);
        $simbol = ' T';
    }

    if ($presisi > 0) {
        $pisah = '.' . str_repeat('0', $presisi);
        $format_angka = str_replace($pisah, '', $format_angka);
    }

    return $format_angka . $simbol;
} ?>
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
                        <p class="mb-1 mt-3 font-weight-semibold"><?php echo $nama ?></p>
                        <p class="fw-light text-muted mb-0"><?php echo $email ?></p>
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
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/admin/Dashboard') ?>">
                    <i class="mdi mdi-grid-large menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Master Data</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="menu-icon mdi mdi-floor-plan"></i>
                    <span class="menu-title">Master Data</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Barang</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Paket</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Pengirim</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Penerima</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Pengiriman</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Testimonials</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">User</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Vendor</a></li>
                    </ul>
                </div>
            </li>
            <!-- <li class="nav-item nav-category">Forms and Datas</li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                      <i class="menu-icon mdi mdi-card-text-outline"></i>
                      <span class="menu-title">Form elements</span>
                      <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="form-elements">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                      <i class="menu-icon mdi mdi-chart-line"></i>
                      <span class="menu-title">Charts</span>
                      <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="charts">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                      <i class="menu-icon mdi mdi-table"></i>
                      <span class="menu-title">Tables</span>
                      <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="tables">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                      <i class="menu-icon mdi mdi-layers-outline"></i>
                      <span class="menu-title">Icons</span>
                      <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="icons">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item nav-category">pages</li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                      <i class="menu-icon mdi mdi-account-circle-outline"></i>
                      <span class="menu-title">User Pages</span>
                      <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="auth">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item nav-category">help</li>
              <li class="nav-item">
                  <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
                      <i class="menu-icon mdi mdi-file-document"></i>
                      <span class="menu-title">Documentation</span>
                  </a>
              </li> -->
        </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">
                        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content tab-content-basic">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="statistics-details d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="statistics-title">User</p>
                                                <h3 class="rate-percentage"><?= $totalUser ?></h3>
                                            </div>
                                            <div>
                                                <p class="statistics-title">Barang</p>
                                                <h3 class="rate-percentage"><?= $totalBarang ?></h3>
                                            </div>
                                            <div>
                                                <p class="statistics-title">Vendor</p>
                                                <h3 class="rate-percentage"><?= $totalVendor ?></h3>
                                            </div>
                                            <div>
                                                <p class="statistics-title">Testimonials</p>
                                                <h3 class="rate-percentage"><?= $totalTestimonials ?></h3>
                                            </div>
                                            <div>
                                                <p class="statistics-title">All Income</p>
                                                <h3 class="rate-percentage"><?php
                                                                            echo singkat_angka($totalIncome[0]->TotalOrdered) ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 d-flex flex-column">
                                        <div class="row flex-grow">
                                            <div class="col-12 grid-margin stretch-card">
                                                <div class="card card-rounded">
                                                    <div class="card-body">
                                                        <div class="d-sm-flex justify-content-between align-items-start">
                                                            <div>
                                                                <h4 class="card-title card-title-dash">Income Overview</h4>
                                                                <p class="card-subtitle card-subtitle-dash">Total income munggu ini daripada minggu sebelumnya </p>
                                                            </div>
                                                        </div>
                                                        <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                                            <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                                                <h2 class="me-2 fw-bold"><?php
                                                                                            $totalTw = 0;
                                                                                            $totalLw = 0;
                                                                                            for ($i = 0; $i < 7; $i++) {
                                                                                                $totalTw += $graphTw[$i][0]->TotalItemsOrdered;
                                                                                                $totalLw += $graphLw[$i][0]->TotalItemsOrdered;
                                                                                            }
                                                                                            if ($totalTw == 0 || $totalLw == 0) {
                                                                                                $percentage = 0;
                                                                                            } else {
                                                                                                $percentage = ($totalTw / $totalLw) * 100;
                                                                                            }

                                                                                            echo number_format($totalTw, 2, ',', '.');
                                                                                            ?></h2>
                                                                <h4 class="me-2">IDR</h4>
                                                                <h4 class="text-<?= ($totalTw >= $totalLw) ? "success" : "danger" ?>"><?= ($totalTw >= $totalLw) ? "(+" . $percentage . "%)" : "(-" . $percentage . "%)" ?></h4>
                                                            </div>
                                                            <div class="me-3">
                                                                <div id="marketing-overview-legend"></div>
                                                            </div>
                                                        </div>
                                                        <div class="chartjs-bar-wrapper mt-3">
                                                            <canvas id="marketingOverview"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex flex-column">
                                        <div class="row flex-grow">
                                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                                <div class="card bg-primary card-rounded">
                                                    <div class="card-body pb-0">
                                                        <h4 class="card-title card-title-dash text-white mb-4">Orders</h4>
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <div>
                                                                    <p class="status-summary-ight-white mb-1">Total</p>
                                                                    <h2 class="text-info"><?php echo count($totalOrderOp) + count($totalOrderOd) + count($totalOrderD) + count($totalOrderC); ?></h2>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="status-summary-chart-wrapper pb-4">
                                                                    <canvas id="status-summary"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                                <div class="card card-rounded">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="d-flex align-items-center mb-2 mb-sm-0">
                                                                    <div class="circle-progress-width me-5">
                                                                        <div id="totalSender" class="progressbar-js-circle pr-2"></div>
                                                                    </div>
                                                                    <div>
                                                                        <p class="text-small mb-2 ">Total Sender</p>
                                                                        <h4 class=" mb-0 fw-bold"><?php echo $totalSender; ?></h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="circle-progress-width me-5">
                                                                        <div id="totalReceiver" class="progressbar-js-circle pr-2"></div>
                                                                    </div>
                                                                    <div>
                                                                        <p class="text-small mb-2 ">Total Receiver</p>
                                                                        <h4 class=" mb-0 fw-bold"><?php echo $totalReceiver; ?></h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 d-flex flex-column">

                                        <div class="row flex-grow">
                                            <div class="col-12 grid-margin stretch-card">
                                                <div class="card card-rounded table-darkBGImg">
                                                    <div class="card-body">
                                                        <div class="col-sm-8">
                                                            <h3 class="text-dark upgrade-info mb-0 fs-4">
                                                                "Tidak ada pekerjaan yang rendah, yang ada hanyalah <span class="fw-bold">sikap yang rendah.</span>" - William Bennett
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row flex-grow">
                                            <div class="col-12 grid-margin stretch-card">
                                                <div class="card card-rounded">
                                                    <div class="card-body">
                                                        <div class="d-sm-flex justify-content-between align-items-start">
                                                            <div>
                                                                <h4 class="card-title card-title-dash">Manage Order</h4>
                                                                <P class="card-subtitle card-subtitle-dash">Win + Scroll for details order</P>
                                                            </div>
                                                            <div>
                                                                <button class="btn btn-inverse-primary btn-lg mb-0 me-0" type="button" data-bs-toggle="modal" data-bs-target="#addNewOrder"><i class="mdi mdi-note-plus"></i>Add new order</button>

                                                                <!-- Modal Add-->
                                                                <div class="modal fade" id="addNewOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div id="detailOrder" class="detailOrder">
                                                                                    <div class="section-title">
                                                                                        <h2>Add New Order</h2>
                                                                                    </div>
                                                                                    <div class="detail">
                                                                                        <h4 class="text-center fw-bold"></h4>
                                                                                        <ul>
                                                                                            <li data-aos="fade-up">
                                                                                                <i class='bx bx-send icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#detail-1">Sender Information <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                                                                                <div id="detail-1" class="collapse show">
                                                                                                    <div class="card card-order">
                                                                                                        <div class="card-body">
                                                                                                            <div class="form-sample">
                                                                                                                <p class="card-description">
                                                                                                                    Personal info
                                                                                                                </p>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Name</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="text" class="form-control" name="sender_name" required />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Phone Number</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="tel" class="form-control" pattern="[0-9]{11}||[0-9]{12}||[0-9]{13}" name="sender_phone_number" required />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row select2ParentAdd">
                                                                                                                            <label class="col-sm-3 col-form-label">Origin City</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <select class="w-100 form-control select2Add" name="origin_city">
                                                                                                                                    <?php foreach ($cities as $key => $city) : ?>
                                                                                                                                        <option value="<?= $city->city_name . ", " . $city->prov_name; ?>"><?= $city->city_name . ", " . $city->prov_name; ?></option>
                                                                                                                                    <?php endforeach; ?>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Post Code</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input class="form-control" type="text" pattern="[0-9]{5}" name="sender_post_code" required />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Address</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <textarea name="sender_address" cols="30" rows="10" class="form-control" required></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-aos="fade-up">
                                                                                                <i class='bx bx-receipt icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#detail-1">Receipent Information <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                                                                                <div id="detail-1" class="collapse show">
                                                                                                    <div class="card card-order">
                                                                                                        <div class="card-body">
                                                                                                            <div class="form-sample">
                                                                                                                <p class="card-description">
                                                                                                                    Personal info
                                                                                                                </p>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Name</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="text" class="form-control" name="receipent_name" required />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Phone Number</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="tel" class="form-control" pattern="[0-9]{11}||[0-9]{12}||[0-9]{13}" name="receipent_phone_number" required />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Destination City</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <select class="w-100 form-control select2Add" name="destination_city">
                                                                                                                                    <?php foreach ($cities as $key => $city) : ?>
                                                                                                                                        <option value="<?= $city->city_name . ", " . $city->prov_name; ?>"><?= $city->city_name . ", " . $city->prov_name; ?></option>
                                                                                                                                    <?php endforeach; ?>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Post Code</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input class="form-control" type="text" pattern="[0-9]{5}" name="receipent_post_code" />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Address</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <textarea name="receipent_address" cols="30" rows="10" class="form-control"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-aos="fade-up">
                                                                                                <i class='bx bx-package icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#detail-1">Package Information <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                                                                                <div id="detail-1" class="collapse show">
                                                                                                    <div class="card card-order">
                                                                                                        <div class="card-body">
                                                                                                            <div class="form-sample">
                                                                                                                <p class="card-description">
                                                                                                                    Package info
                                                                                                                </p>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Vendor Name</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <select class="w-100 form-control select2Add" name="vendor">
                                                                                                                                    <?php foreach ($vendor as $key => $vd) : ?>
                                                                                                                                        <option value="<?= $vd->id_vendor; ?>"><?= $vd->nama_vendor ?></option>
                                                                                                                                    <?php endforeach; ?>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Item Name</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="text" class="form-control" name="item_name" required />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Weight</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <div class="input-group">
                                                                                                                                    <input type="tel" class="form-control" name="weight" required />
                                                                                                                                    <div class="input-group-prepend">
                                                                                                                                        <span class="input-group-text">Kg</span>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Item Type</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <select class="w-100 form-control select2Add" name="item_type">
                                                                                                                                    <?php foreach ($paket as $key => $pk) : ?>
                                                                                                                                        <option value="<?= $pk->id_paket; ?>"><?= $pk->jenis_paket ?></option>
                                                                                                                                    <?php endforeach; ?>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Shipping Cost</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="text" class="form-control shipping-cost" required name="shipping_cost" />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Insurance</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="text" class="form-control insurance" required name="insurance" />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Qty</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="number" class="form-control qty" value="1" name="qty" required />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Note :</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <textarea name="note" cols="30" rows="10" class="form-control"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <div class="dash-line"></div>
                                                                                        <div class="freight-box">
                                                                                            <div style="display: inline-block">
                                                                                                <table>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td>Shipping Cost：</td>
                                                                                                            <td class="freight-num">
                                                                                                                <span> </span>
                                                                                                                <span class="yfmoney"></span>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Insurance：</td>
                                                                                                            <td class="freight-num">
                                                                                                                <span> </span>
                                                                                                                <span class="bjmoney"></span>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr id="max-ins-money-box">
                                                                                                            <td colspan="2">
                                                                                                                <div style="font-size: 11px; color: #ff0000" id="max-ins-money"></div>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr style="font-size: 18px; font-weight: 800">
                                                                                                            <td>Total Fee：</td>
                                                                                                            <td class="freight-num">
                                                                                                                <span> </span><span class="zmoney"></span>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btninverse-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-inverse-primary" id="addOrder">Add Order</button>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal edit-->
                                                                <div class="modal fade" id="editOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div id="detailOrder" class="detailOrder">
                                                                                    <div class="section-title">
                                                                                        <h2>Edit Order</h2>
                                                                                    </div>
                                                                                    <div class="detail">
                                                                                        <h4 class="text-center fw-bold"></h4>
                                                                                        <ul>
                                                                                            <li data-aos="fade-up">
                                                                                                <i class='bx bx-send icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#detail-1">Sender Information <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                                                                                <div id="detail-1" class="collapse show">
                                                                                                    <div class="card card-order">
                                                                                                        <div class="card-body">
                                                                                                            <div class="form-sample">
                                                                                                                <p class="card-description">
                                                                                                                    Personal info
                                                                                                                </p>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Name</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="text" class="form-control" name="sender_name_edit" required />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Phone Number</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="tel" class="form-control" pattern="[0-9]{11}||[0-9]{12}||[0-9]{13}" name="sender_phone_number_edit" required />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row select2ParentEdit">
                                                                                                                            <label class="col-sm-3 col-form-label">Origin City</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <select class="w-100 form-control select2Edit" name="origin_city_edit">
                                                                                                                                    <?php foreach ($cities as $key => $city) : ?>
                                                                                                                                        <option value="<?= $city->city_name . ", " . $city->prov_name; ?>"><?= $city->city_name . ", " . $city->prov_name; ?></option>
                                                                                                                                    <?php endforeach; ?>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Post Code</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input class="form-control" type="text" pattern="[0-9]{5}" name="sender_post_code_edit" required />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Address</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <textarea name="sender_address_edit" cols="30" rows="10" class="form-control" required></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-aos="fade-up">
                                                                                                <i class='bx bx-receipt icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#detail-1">Receipent Information <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                                                                                <div id="detail-1" class="collapse show">
                                                                                                    <div class="card card-order">
                                                                                                        <div class="card-body">
                                                                                                            <div class="form-sample">
                                                                                                                <p class="card-description">
                                                                                                                    Personal info
                                                                                                                </p>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Name</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="text" class="form-control" name="receipent_name_edit" required />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Phone Number</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="tel" class="form-control" pattern="[0-9]{11}||[0-9]{12}||[0-9]{13}" name="receipent_phone_number_edit" required />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Destination City</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <select class="w-100 form-control select2Edit" name="destination_city_edit">
                                                                                                                                    <?php foreach ($cities as $key => $city) : ?>
                                                                                                                                        <option value="<?= $city->city_name . ", " . $city->prov_name; ?>"><?= $city->city_name . ", " . $city->prov_name; ?></option>
                                                                                                                                    <?php endforeach; ?>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Post Code</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input class="form-control" type="text" pattern="[0-9]{5}" name="receipent_post_code_edit" />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Address</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <textarea name="receipent_address_edit" cols="30" rows="10" class="form-control"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-aos="fade-up">
                                                                                                <i class='bx bx-package icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#detail-1">Package Information <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                                                                                <div id="detail-1" class="collapse show">
                                                                                                    <div class="card card-order">
                                                                                                        <div class="card-body">
                                                                                                            <div class="form-sample">
                                                                                                                <p class="card-description">
                                                                                                                    Package info
                                                                                                                </p>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Vendor Name</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <select class="w-100 form-control select2Edit" name="vendor_edit">
                                                                                                                                    <?php foreach ($vendor as $key => $vd) : ?>
                                                                                                                                        <option value="<?= $vd->id_vendor; ?>"><?= $vd->nama_vendor ?></option>
                                                                                                                                    <?php endforeach; ?>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Item Name</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="text" class="form-control" name="item_name_edit" required />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Weight</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <div class="input-group">
                                                                                                                                    <input type="tel" class="form-control" name="weight_edit" required />
                                                                                                                                    <div class="input-group-prepend">
                                                                                                                                        <span class="input-group-text">Kg</span>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Item Type</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <select class="w-100 form-control select2Edit" name="item_type_edit">
                                                                                                                                    <?php foreach ($paket as $key => $pk) : ?>
                                                                                                                                        <option value="<?= $pk->id_paket; ?>"><?= $pk->jenis_paket ?></option>
                                                                                                                                    <?php endforeach; ?>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Shipping Cost</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="text" class="form-control shipping-cost" required name="shipping_cost_edit" />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Insurance</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="text" class="form-control insurance" required name="insurance_edit" />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Qty</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <input type="number" class="form-control qty" value="1" name="qty_edit" required />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="form-group row">
                                                                                                                            <label class="col-sm-3 col-form-label">Note :</label>
                                                                                                                            <div class="col-sm-9 form-input">
                                                                                                                                <textarea name="note_edit" cols="30" rows="10" class="form-control"></textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <div class="dash-line"></div>
                                                                                        <div class="freight-box">
                                                                                            <div style="display: inline-block">
                                                                                                <table>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td>Shipping Cost：</td>
                                                                                                            <td class="freight-num">
                                                                                                                <span> </span>
                                                                                                                <span class="yfmoney"></span>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Insurance：</td>
                                                                                                            <td class="freight-num">
                                                                                                                <span> </span>
                                                                                                                <span class="bjmoney"></span>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr id="max-ins-money-box">
                                                                                                            <td colspan="2">
                                                                                                                <div style="font-size: 11px; color: #ff0000" id="max-ins-money"></div>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr style="font-size: 18px; font-weight: 800">
                                                                                                            <td>Total Fee：</td>
                                                                                                            <td class="freight-num">
                                                                                                                <span> </span><span class="zmoney"></span>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btninverse-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-inverse-primary" id="editOrderbtn">Save Changes</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-start mt-2 ">
                                                            <input type="text" id="manage_order" name="manage_order" class="form-control  text-center" placeholder="Masukkan Resi Anda" onkeyup="searchOrder()">
                                                        </div>
                                                        <div id="notfound"></div>
                                                        <div class="table-responsive mt-1">
                                                            <table class="table select-table text-center" id="tableOrder">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No Resi</th>
                                                                        <th>Nama Barang</th>
                                                                        <th>Berat</th>
                                                                        <th>Pengirim</th>
                                                                        <th>Penerima</th>
                                                                        <th>Jenis Barang</th>
                                                                        <th>Qty</th>
                                                                        <th>Total Biaya</th>
                                                                        <th>Keterangan</th>
                                                                        <th>Status</th>
                                                                        <th>Nama Admin</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tableData">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex flex-column">
                                        <div class="row flex-grow">
                                            <div class="col-12 grid-margin stretch-card">
                                                <div class="card card-rounded">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                                    <div>
                                                                        <h4 class="card-title card-title-dash">Last Orders</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <?php foreach ($lastOrder as $lO) : ?> <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                                                            <div class="d-flex">
                                                                                <div class="wrapper ms-3">
                                                                                    <p class="mb-1 fw-bold text-start"><?= $lO->nama_barang ?></p>
                                                                                    <small class="text-muted mb-0"><?= $lO->jenis_paket ?></small>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-muted text-small text-end">
                                                                                <?= timespan(strtotime($lO->tgl_order), time()) . ' ago' ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; ?> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row flex-grow">
                                            <div class="col-12 grid-margin stretch-card">
                                                <div class="card card-rounded">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                                    <div>
                                                                        <h4 class="card-title card-title-dash">Most used shipping</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <?php foreach ($jenisPaket as $key => $jP) : ?>
                                                                        <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                                                            <div class="d-flex">
                                                                                <div class="wrapper ms-3 pe-3">
                                                                                    <p class="mb-1 fw-bold"><?= $jP[0]; ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-muted text-small ps-3">
                                                                                <?= $jP[1]; ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<script>
    const dataTw = [<?php
                    for ($i = 0; $i < 7; $i++) {
                        echo "" . ($graphTw)[$i][0]->TotalItemsOrdered . ",";
                    }
                    ?>];
    const dataLw = [<?php
                    for ($i = 0; $i < 7; $i++) {
                        echo "" . ($graphLw)[$i][0]->TotalItemsOrdered . ",";
                    }
                    ?>];
    const totalOrder = [<?php
                        echo "'" .  count($totalOrderOp) . "',";
                        echo "'" .  count($totalOrderOd) . "',";
                        echo "'" .  count($totalOrderD) . "',";
                        echo "'" .  count($totalOrderC) . "',";
                        ?>];
    const sender = <?php if ($totalSender == 0) {
                        echo 0;;
                    } else {
                        echo $totalSender / ($totalSender + $totalReceiver);
                    } ?>;
    const receiver = <?php if ($totalReceiver == 0) {
                            echo 0;;
                        } else {
                            echo $totalReceiver / ($totalSender + $totalReceiver);
                        } ?>;
</script>