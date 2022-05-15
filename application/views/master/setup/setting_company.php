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
                    <form action="<?php echo base_url('ma/setting/company'); ?>" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company Name:</label>
                                    <input type="text" class="form-control" name="company_name" value="<?php echo $sysConf->company_name ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company Slogan:</label>
                                    <input type="text" class="form-control" name="slogan" value="<?php echo $sysConf->slogan ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone:</label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo $sysConf->phone ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone 2:</label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo $sysConf->phone_2 ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $sysConf->email ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Website:</label>
                                    <input type="text" class="form-control" name="website" value="<?php echo $sysConf->website ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Facebook:</label>
                                    <input type="text" class="form-control" name="facebook" value="<?php echo $sysConf->facebook ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Twitter:</label>
                                    <input type="text" class="form-control" name="twitter" value="<?php echo $sysConf->twitter ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Instagram:</label>
                                    <input type="text" class="form-control" name="instagram" value="<?php echo $sysConf->instagram ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Linkedin:</label>
                                    <input type="text" class="form-control" name="linkedin" value="<?php echo $sysConf->linkedin ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pinterest:</label>
                                    <input type="text" class="form-control" name="pinterest" value="<?php echo $sysConf->pinterest ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address :</label>
                                    <textarea name="address" rows="5" cols="5" class="form-control" placeholder="Enter address here"><?php echo $sysConf->address; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
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