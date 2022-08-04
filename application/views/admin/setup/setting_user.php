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
                    <form action="<?php echo base_url('setting/user'); ?>" enctype="multipart/form-data" method="POST">
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">First Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="firstName" value="<?php echo $user->firstName ?>" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">Last Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="lastName" value="<?php echo $user->lastName ?>" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">Phone Number</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="phone" value="<?php echo $user->phone ?>" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">Email Address</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="email" value="<?php echo $user->email ?>" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">Address Line 1</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="address" value="<?php echo $user->address ?>" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">Address Line 2</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="address_line_2" value="<?php echo $user->address_line_2 ?>" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">City</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="city" value="<?php echo $user->city ?>" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">State</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="state" value="<?php echo $user->state ?>" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">Country</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="country" value="<?php echo $user->country ?>" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">Postal Code</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="zip" value="<?php echo $user->zip ?>" required>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <label class="col-form-label col-md-3">Photo</label>
                            <div class="col-md-7">
                                <input type="file" class="form-control" name="image">
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