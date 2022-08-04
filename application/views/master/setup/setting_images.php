<!-- Content area -->
<div class="content">
    <!-- Dashboard content -->
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <!-- Hover rows -->
            <div class="card">
                <div class="card-header header-elements-inline pb-2">
                    <h4 class="card-title">
                        <span class="font-weight-semibold"><i class="icon-gear mr-2"></i> <?php echo $title; ?></span>
                    </h4>
                </div>
                <div class="dropdown-divider"></div>
                <div class="card-body">
                    <form action="<?php echo base_url('ma/setting/images'); ?>" enctype="multipart/form-data" method="POST">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Master Admin Dashboard</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control h-auto" name="image" required>
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" name="image_type" value="master_dashboard_image">
                                <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>
                    </form>

                    <form action="<?php echo base_url('ma/setting/images'); ?>" enctype="multipart/form-data" method="POST">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Admin Dashboard</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control h-auto" name="image" required>
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" name="image_type" value="admin_dashboard_image">
                                <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>
                    </form>

                    <form action="<?php echo base_url('ma/setting/images'); ?>" enctype="multipart/form-data" method="POST">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Customer Dashboard</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control h-auto" name="image" required>
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" name="image_type" value="customer_dashboard_image">
                                <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-md-4 p-2 text-center">
                            <p class="font-weight-bold">Master Dashboard</p>
                            <a href="<?php echo site_url('upload/bg/' . $this->system_config->master_dashboard_image); ?>" target="_blank">
                                <img class="img-fluid" src="<?php echo site_url('upload/bg/' . $this->system_config->master_dashboard_image); ?>" alt="">
                            </a>
                        </div>
                        <div class="col-md-4 p-2 text-center">
                            <p class="font-weight-bold">Admin Dashboard</p>
                            <a href="<?php echo site_url('upload/bg/' . $this->system_config->admin_dashboard_image); ?>" target="_blank">
                                <img class="img-fluid" src="<?php echo site_url('upload/bg/' . $this->system_config->admin_dashboard_image); ?>" alt="">
                            </a>
                        </div>
                        <div class="col-md-4 p-2 text-center">
                            <p class="font-weight-bold">Customer Dashboard</p>
                            <a href="<?php echo site_url('upload/bg/' . $this->system_config->customer_dashboard_image); ?>" target="_blank">
                                <img class="img-fluid" src="<?php echo site_url('upload/bg/' . $this->system_config->customer_dashboard_image); ?>" alt="">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /hover rows -->
        </div>
    </div>
    <!-- /dashboard content -->

</div>
<!-- /content area -->