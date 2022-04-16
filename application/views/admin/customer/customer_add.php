<!-- Content area -->
<div class="content">
    <!-- Dashboard content -->
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <!-- Hover rows -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h4 class="card-title">
                        <span class="font-weight-semibold"><i class="icon-user-plus mr-2"></i> <?php echo $title; ?></span>
                    </h4>
                </div>
                <div class="dropdown-divider"></div>
                <div class="card-body">
                    <form action="<?php echo base_url('customer_add'); ?>" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <!-- Details -->

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6 class="mb-0 font-weight-semibold">DETAILS</h6>
                                        <hr class="mt-2 mb-2">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Trading Name</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Legal Name</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">ABN</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Cstomer Code</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">GL Code</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Business Email</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Business Phone</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Customer Status</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Customer Group</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6 class="mb-0 font-weight-semibold">DELIVERY ADDRESS</h6>
                                        <hr class="mt-2 mb-2">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Address line 1</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Address line 2</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Suburb</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">State</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                    <label class="col-form-label col-md-3">Postcode</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h6 class="mb-0 font-weight-semibold">BILLING ADDRESS</h6>
                                        <hr class="mt-2 mb-2">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Address line 1</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Address line 2</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Suburb</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">State</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                    <label class="col-form-label col-md-3">Postcode</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="Password" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-12">
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