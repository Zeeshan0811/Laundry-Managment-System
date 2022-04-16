<!DOCTYPE html>
<html lang="en">

<head>
    <!-- =================== /TITLE EOC ==================== -->
    <title><?php if (!empty($title)) {
                echo $title . " | " . $this->system_config->company_name;
            } ?></title>
    <!-- =================== /TITLE EOC ==================== -->
    <meta charset="UTF-8">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!--================ Mobile specific metas ================-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--================ Favicon ================-->
    <link rel="shortcut icon" href="<?php echo site_url('assets/frontend/images/favicon.png'); ?>">
    <!--================ Google web fonts ================-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!--================ Vendor CSS ================-->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons%7CMaterial+Icons+Outlined%7CMaterial+Icons+Two+Tone%7CMaterial+Icons+Round%7CMaterial+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo site_url('assets/frontend/css/fontawesome-all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/frontend/css/linearicons.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/frontend/vendors/owl-carousel/assets/owl.carousel.min.css'); ?>">
    <!-- <link rel="stylesheet" href="<?php echo site_url('assets/frontend/css/bootstrap.min.css'); ?>"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo site_url('assets/frontend/css/animate.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/frontend/vendors/fancybox/jquery.fancybox.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/frontend/vendors/revolution/css/settings.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/frontend/vendors/revolution/css/layers.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/frontend/vendors/revolution/css/navigation.min.css'); ?>">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">


    <!--================ Theme CSS ================-->
    <link rel="stylesheet" href="<?php echo site_url('assets/frontend/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/frontend/css/responsive.css'); ?>">

    <!--================ Vendor JS ================-->
    <script src="<?php echo site_url('assets/frontend/vendors/modernizr.js'); ?>"></script>
    <script src="<?php echo site_url('assets/frontend/vendors/jquery-3.3.1.min.js'); ?>"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        let base_url = "<?php echo base_url(); ?>";
        let site_url = "<?php echo site_url(); ?>";

        $(document).ready(function() {
            $('.data-table').DataTable();
        });
    </script>

</head>

<body class="mad-body--scheme-brown">
    <div id="mad-page-wrapper" class="mad-page-wrapper">

        <!--================ Header ================-->
        <?php include 'application/views/frontend/includes/header.php'; ?>
        <!--================ End of Header ================-->
        <!-- ====== /CONTENT BOC ====== -->
        <?php
        if (!empty($mainContent)) {
            echo $mainContent;
        }
        ?>
        <!-- ====== /CONTENT EOC ====== -->



        <!--================ Footer ================-->

        <?php include 'application/views/frontend/includes/footer.php'; ?>
        <!--================ End of Footer ================-->
    </div>
    <?php include 'application/views/frontend/includes/scripts.php'; ?>
</body>

</html>