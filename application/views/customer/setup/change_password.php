<!-- Content area -->
<div class="content">
    <!-- Dashboard content -->
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <!-- Hover rows -->
            <div class="card">
                <div class="card-header header-elements-inline pb-2">
                    <h4 class="card-title">
                        <span class="font-weight-semibold"><i class="icon-gear mr-2"></i> <?php echo $title; ?></span>
                    </h4>
                </div>
                <div class="dropdown-divider"></div>
                <div class="card-body">
                    <form action="<?php echo base_url('setting/password'); ?>" enctype="multipart/form-data" method="POST">
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">Current Password</label>
                            <div class="col-md-7">
                                <input type="password" class="form-control" name="old_password" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">New Password</label>
                            <div class="col-md-7">
                                <input type="password" class="form-control" name="new_password" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">Repeat Password</label>
                            <div class="col-md-7">
                                <input type="password" class="form-control" name="repeat_password" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-10">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /hover rows -->
        </div>
    </div>
    <!-- /dashboard content -->

</div>
<!-- /content area -->