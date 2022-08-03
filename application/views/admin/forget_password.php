<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php if (!empty($title)) {
            echo $title . " | " . $this->system_config->company_name;
        } ?></title>
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('assets/frontend/img/favicon.png') ?>" />

<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="<?php echo site_url('assets/admin/css/icons/icomoon/styles.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo site_url('assets/admin/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo site_url('assets/admin/css/bootstrap_limitless.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo site_url('assets/admin/css/layout.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo site_url('assets/admin/css/components.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo site_url('assets/admin/css/colors.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo site_url('assets/admin/css/custom.css'); ?>" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->

<!-- Core JS files -->
<script src="<?php echo site_url('assets/admin/js/main/jquery.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/main/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/plugins/loaders/blockui.min.js'); ?>"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="<?php echo site_url('assets/admin/js/plugins/visualization/d3/d3.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/plugins/visualization/d3/d3_tooltip.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/plugins/forms/styling/switchery.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/plugins/forms/selects/bootstrap_multiselect.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/plugins/forms/selects/select2.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/plugins/forms/styling/uniform.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/plugins/ui/moment/moment.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/plugins/pickers/daterangepicker.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/plugins/notifications/bootbox.min.js'); ?>"></script>

<script src="<?php echo site_url('assets/admin/js/plugins/datatables/datatables.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/plugins/datatables/datatables_basic.js'); ?>"></script>

<script src="<?php echo site_url('assets/admin/js/app.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/pages/login.js'); ?>"></script>
<script src="<?php echo site_url('assets/admin/js/components_modals.js'); ?>"></script>


<script src="<?php echo site_url('assets/admin/js/custom.js'); ?>"></script>

</head>

<body>
    <!-- Page content -->
    <div class="page-content login-cover">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Login form -->
                <form class="login-form wmin-sm-400" action="<?php echo base_url('forget-password');  ?>" method="post">
                    <div class="card mb-0">

                        <div class="tab-content card-body">
                            <div class="tab-pane fade show active" id="login-tab1">
                                <div class="text-center mb-3">
                                    <!--<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>-->
                                    <img src="<?php echo site_url('upload/logo/logo_yoweri_laundries.png'); ?>" class="login_logo" alt="Logo">
                                    <h5 class="mb-0">Reset your password</h5>
                                    <span class="d-block text-muted">Your credentials</span>
                                </div>

                                <div>
                                    <?php
                                    if ($this->session->flashdata('login_msg')) {
                                        echo '<h6 class="text-white bg-danger text-center p-2">';
                                        echo  $this->session->flashdata('login_msg');
                                        echo '</h6>';
                                    } else if ($this->session->flashdata('success_msg')) {
                                        echo '<h6 class="text-white bg-success text-center p-2">';
                                        echo  $this->session->flashdata('success_msg');
                                        echo '</h6>';
                                    }
                                    ?>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" name="email" class="form-control" placeholder="Email" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary default_background btn-block">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /login form -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
</body>

</html>