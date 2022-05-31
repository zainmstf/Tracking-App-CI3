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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/vertical-layout-light/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/vertical-layout-light/custom.css') ?>">
    <!-- endinject -->
    <link rel="shortcut icon" href="#" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <h4>Login Admin</h4>
                            <h6 class="fw-light">Sign in to continue.</h6>

                            <form method="post" action="<?php echo base_url('admin/Auth/proses_login') ?>" class="pt-3">
                                <?php echo $this->session->flashdata('pesan') ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name=password>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- container-scroller -->
    <!-- plugins:js -->

    <script src="<?php echo base_url('assets/vendor/js/vendor.bundle.base.js') ?>"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/progressbar.js/progressbar.min.js') ?>"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->

    <!-- endinject -->
    <script src="<?php echo base_url('assets/js/dashboard.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/Chart.roundedBarCharts.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/select2/select2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/select2.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/moment.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>

</body>

</html>