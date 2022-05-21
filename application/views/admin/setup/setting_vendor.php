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
                    <form action="<?php echo base_url('setting/vendor'); ?>" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Trading Name:</label>
                                    <input type="text" class="form-control" name="trading_name" value="<?php echo $vendor->trading_name ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Legal Name:</label>
                                    <input type="text" class="form-control" name="legal_name" value="<?php echo $vendor->legal_name ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ABN:</label>
                                    <input type="text" class="form-control" name="abn" value="<?php echo $vendor->abn ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>GL Code:</label>
                                    <input type="text" class="form-control" name="gl_code" value="<?php echo $vendor->gl_code ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone:</label>
                                    <input type="text" class="form-control" name="business_phone" value="<?php echo $vendor->business_phone ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="text" class="form-control" name="business_email" value="<?php echo $vendor->business_email ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address :</label>
                                    <input type="text" class="form-control" name="billing_add_line_1" value="<?php echo $vendor->billing_add_line_1 ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 2:</label>
                                    <input type="text" class="form-control" name="billing_add_line_2" value="<?php echo $vendor->billing_add_line_2 ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City/Suburb:</label>
                                    <input type="text" class="form-control" name="billing_suburb" value="<?php echo $vendor->billing_suburb ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State:</label>
                                    <input type="text" class="form-control" name="billing_state" value="<?php echo $vendor->billing_state ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country:</label>
                                    <input type="text" class="form-control" name="billing_country" value="<?php echo $vendor->billing_country ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Post Code:</label>
                                    <input type="text" class="form-control" name="billing_postcode" value="<?php echo $vendor->billing_postcode ?>" required>
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