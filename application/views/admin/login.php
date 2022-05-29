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