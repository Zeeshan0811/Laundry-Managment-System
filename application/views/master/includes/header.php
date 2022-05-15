<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="<?php echo base_url(); ?>" class="d-inline-block">
            <img src="<?php echo site_url('upload/logo/logo_yoweri_laundries.png'); ?>" alt="" style="height: 30px;">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <span class="badge bg-success ml-md-3 mr-md-auto">Online</span>
        <span class="badge bg-success ml-3 mr-md-auto">MASTER ADMIN</span>

        <ul class="navbar-nav">
            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    <?php $photo = (!empty($current_user->photo)) ? $current_user->photo : 'default.png'; ?>
                    <img src="<?php echo site_url('upload/user/' . $photo); ?>" class="rounded-circle mr-2" height="34" alt="">
                    <span><?php echo $current_user->firstName;  ?></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?php echo base_url('ma/setting/user'); ?>" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                    <a href="<?php echo base_url('ma/setting/password'); ?>" class="dropdown-item"><i class="icon-cog5"></i> Change Password</a>
                    <a href="<?php echo base_url('logout'); ?>" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->