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
                    <form action="<?php echo base_url('ma/setting/user'); ?>" enctype="multipart/form-data" method="POST">
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">First Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="firstName" value="<?php echo $sysConf->firstName ?>" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">Last Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="lastName" value="<?php echo $sysConf->lastName ?>" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">Phone Number</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="phone" value="<?php echo $sysConf->phone ?>" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">Email Address</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="email" value="<?php echo $sysConf->email ?>" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">Location</label>
                            <div class="col-md-7">
                                <textarea name="address" rows="5" cols="5" class="form-control" placeholder="Enter your address here"><?php echo $sysConf->address; ?></textarea>
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