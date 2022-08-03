<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php if (!empty($title)) {
                echo $title . " | " . $this->system_config->company_name;
            } ?> </title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('assets/frontend/img/favicon.png') ?>" />

    <!-- Global stylesheets -->
    <link href="//fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo site_url('assets/admin/css/icons/icomoon/styles.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo site_url('assets/admin/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo site_url('assets/admin/css/bootstrap_limitless.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo site_url('assets/admin/css/layout.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo site_url('assets/admin/css/components.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo site_url('assets/admin/css/colors.min.css'); ?>" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
    <link href="<?php echo site_url('assets/admin/css/custom.css'); ?>" rel="stylesheet" type="text/css">

    <!-- Core JS files -->
    <script src="<?php echo site_url('assets/admin/js/main/jquery.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/main/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/loaders/blockui.min.js'); ?>"></script>
    <!-- /core JS files -->

    <!-- Javascript Encription -->
    <script src="<?php echo site_url('assets/admin/js/main/aes.js'); ?>"></script>
    <!-- /Javascript Encription -->

    <!-- Theme JS files -->
    <script src="<?php echo site_url('assets/admin/js/plugins/visualization/d3/d3.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/visualization/d3/d3_tooltip.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/forms/styling/switchery.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/forms/selects/bootstrap_multiselect.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/extensions/jquery_ui/interactions.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/forms/selects/select2.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/forms/styling/uniform.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/ui/moment/moment.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/pickers/daterangepicker.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/notifications/bootbox.min.js'); ?>"></script>

    <script src="<?php echo site_url('assets/admin/js/plugins/datatables/datatables.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/pages/datatables_basic.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/pages/datatables_advanced.js'); ?>"></script>

    <script src="<?php echo site_url('assets/admin/js/plugins/datatables/extensions/jszip/jszip.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/datatables/extensions/pdfmake/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/datatables/extensions/pdfmake/vfs_fonts.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/datatables/extensions/buttons.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/datatables/extensions/select.min.js'); ?>"></script>

    <script src="<?php echo site_url('assets/admin/js/plugins/loaders/blockui.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/media/fancybox.min.js'); ?>"></script>

    <script src="<?php echo site_url('assets/admin/js/plugins/uploaders/dropzone.min.js'); ?>"></script>

    <script src="<?php echo site_url('assets/admin/js/plugins/editors/summernote/summernote.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/forms/styling/uniform.min.js'); ?>"></script>

    <script src="<?php echo site_url('assets/admin/js/plugins/pickers/daterangepicker.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/pickers/anytime.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/pickers/pickadate/picker.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/pickers/pickadate/picker.date.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/pickers/pickadate/picker.time.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/pickers/pickadate/legacy.js'); ?>"></script>

    <script src="<?php echo site_url('assets/admin/js/app.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/pages/dashboard.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/pages/components_modals.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/pages/form_layouts.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/pages/form_select2.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/pages/picker_date.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/pages/gallery_library.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/pages/uploader_dropzone.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/pages/editor_summernote.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/pages/datatables_extension_buttons_html5.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/datatables/extensions/datatables_extension_buttons_print.js'); ?>"></script>

    <script src="<?php echo site_url('assets/admin/js/plugins/forms/styling/uniform.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/forms/styling/switchery.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/plugins/forms/inputs/touchspin.min.js'); ?>"></script>

    <script src="<?php echo site_url('assets/admin/js/pages/form_input_groups.js'); ?>"></script>
    <script src="<?php echo site_url('assets/admin/js/custom.js'); ?>"></script>
    <script src="https://www.w3counter.com/tracker.js?id=128746"></script>

    <!-- summernote -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
    <!-- /theme JS files -->

    <?php
    if (!empty($customCSS)) {
        echo $customCSS;
    }
    ?>

    <script>
        let base_url = "<?php echo base_url(); ?>";
        let site_url = "<?php echo site_url(); ?>";
    </script>
</head>

<body class="home">
    <?php $current_user = $this->CommonModel->get_single_data_by_single_column('nso_user', 'userId', $this->session->userdata('userId')); ?>
    <!-- START HEADER SECTION -->
    <?php include 'application/views/admin/includes/header.php'; ?>

    <!-- Page content -->
    <div class="page-content">
        <!-- START SIDEBAR SECTION -->
        <?php include 'application/views/admin/includes/sidebar.php'; ?>

        <!-- Main content -->
        <div class="content-wrapper">
            <?php include 'admin/includes/message.php'; ?>
            <?php
            if (!empty($mainContent)) {
                echo $mainContent;
            }
            ?>


            <!-- START FOOTER -->
            <?php include 'application/views/admin/includes/footer.php'; ?>
            <!-- END FOOTER -->

            <?php
            if (!empty($customJS)) {
                echo $customJS;
            }
            ?>
        </div>
        <!-- /main content -->

        <script>
            // $( document ).ready(function() {
            //     var url = "<?php echo current_url(); ?>";
            //     $( "p" ).find( "span" )

            //     console.log( url );
            // });

            jQuery(function($) {
                var url = "<?php echo current_url(); ?>";
                $('.nav-sidebar a').filter(function() {
                    return $(this).attr('href').toLowerCase() == url;
                }).addClass('active').closest('.nav-item-submenu').addClass('nav-item-open').find(
                    '.nav-group-sub').css({
                    'display': 'block'
                });
            });

            $('.pickadate').pickadate({
                formatSubmit: 'yyyy-mm-dd',
                onStart: function() {
                    var date = new Date();
                    this.set('select', [date.getFullYear(), date.getMonth(), date.getDate()]);
                },
            });

            // $('.datatable-basic').DataTable({
            //     dom: 'Bfrtip',
            //     buttons: [
            //         'print'
            //     ]
            // });
        </script>




    </div>
    <!-- /page content -->
</body>

</html>