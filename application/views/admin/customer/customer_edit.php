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
                    <form action="<?php echo base_url('customer_edit/' . $company->vendor_id); ?>" enctype="multipart/form-data" method="POST" id="customer_form">
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
                                        <input type="text" name="trading_name" class="form-control" value="<?php echo $company->trading_name; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Legal Name</label>
                                    <div class="col-md-7">
                                        <input type="text" name="legal_name" class="form-control" value="<?php echo $company->legal_name; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">ABN</label>
                                    <div class="col-md-7">
                                        <input type="text" name="abn" class="form-control" value="<?php echo $company->abn; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Customer Code</label>
                                    <div class="col-md-7">
                                        <input type="text" name="customer_code" class="form-control" value="<?php echo $company->customer_code; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">GL Code</label>
                                    <div class="col-md-7">
                                        <input type="text" name="gl_code" class="form-control" value="<?php echo $company->gl_code; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Business Email</label>
                                    <div class="col-md-7">
                                        <input type="email" name="business_email" class="form-control" value="<?php echo $company->business_email; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Business Phone</label>
                                    <div class="col-md-7">
                                        <input type="text" name="business_phone" class="form-control" value="<?php echo $company->business_phone; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Customer Status</label>
                                    <div class="col-md-7">
                                        <select id="vendor_status" name="vendor_status" data-placeholder="Select status" class="form-control form-control-select2" data-fouc="">
                                            <option value="1" <?php echo ($company->vendor_status == 1) ? "selected" : ""; ?>>Active</option>
                                            <option value="2" <?php echo ($company->vendor_status == 2) ? "selected" : ""; ?>>On-Hold</option>
                                            <option value="3" <?php echo ($company->vendor_status == 3) ? "selected" : ""; ?>>Inactive</option>
                                        </select>
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
                                        <input type="text" name="delivery_add_line_1" class="form-control" value="<?php echo $company->delivery_add_line_1; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Address line 2</label>
                                    <div class="col-md-9">
                                        <input type="text" name="delivery_add_line_2" class="form-control" value="<?php echo $company->delivery_add_line_2; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Suburb</label>
                                    <div class="col-md-9">
                                        <input type="text" name="delivery_suburb" class="form-control" value="<?php echo $company->delivery_suburb; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">State</label>
                                    <div class="col-md-3">
                                        <input type="text" name="delivery_state" class="form-control" value="<?php echo $company->delivery_state; ?>">
                                    </div>
                                    <label class="col-form-label col-md-3">Postcode</label>
                                    <div class="col-md-3">
                                        <input type="text" name="delivery_postcode" class="form-control" value="<?php echo $company->delivery_postcode; ?>">
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
                                        <input type="text" name="billing_add_line_1" class="form-control" value="<?php echo $company->billing_add_line_1; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Address line 2</label>
                                    <div class="col-md-9">
                                        <input type="text" name="billing_add_line_2" class="form-control" value="<?php echo $company->billing_add_line_2; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Suburb</label>
                                    <div class="col-md-9">
                                        <input type="text" name="billing_suburb" class="form-control" value="<?php echo $company->billing_suburb; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">State</label>
                                    <div class="col-md-3">
                                        <input type="text" name="billing_state" class="form-control" value="<?php echo $company->billing_state; ?>">
                                    </div>
                                    <label class="col-form-label col-md-3">Postcode</label>
                                    <div class="col-md-3">
                                        <input type="text" name="billing_postcode" class="form-control" value="<?php echo $company->billing_postcode; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="mb-0 font-weight-semibold">USER</h6>
                                <hr class="mt-2 mb-2">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">First Name</label>
                                    <div class="col-md-7">
                                        <input type="text" name="firstName" class="form-control" value="<?php echo $customer->firstName; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">last Name</label>
                                    <div class="col-md-7">
                                        <input type="text" name="lastName" class="form-control" value="<?php echo $customer->lastName; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Phone</label>
                                    <div class="col-md-7">
                                        <input type="text" name="phone" class="form-control" value="<?php echo $customer->phone; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Email</label>
                                    <div class="col-md-7">
                                        <input type="text" name="email" class="form-control" value="<?php echo $customer->email; ?>">
                                        <input type="hidden" name="customer_id" value="<?php echo $customer->userId; ?>">
                                    </div>
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


<!-- Footer -->
<div class="content pt-2 pb-2" id="Page_footer">
    <div class="text-right">
        <button type="button" onclick="document.getElementById('customer_form').submit();" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
    </div>
</div>
<!-- /footer -->