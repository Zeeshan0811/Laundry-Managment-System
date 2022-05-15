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
                    <form action="<?php echo base_url('customer_edit/' . $customer->userId); ?>" enctype="multipart/form-data" method="POST" id="customer_form">
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
                                        <input type="text" name="trading_name" class="form-control" name="text" value="<?php echo $custom_details->trading_name; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Legal Name</label>
                                    <div class="col-md-7">
                                        <input type="text" name="legal_name" class="form-control" name="text" value="<?php echo $custom_details->legal_name; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">ABN</label>
                                    <div class="col-md-7">
                                        <input type="text" name="abn" class="form-control" name="text" value="<?php echo $custom_details->abn; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Customer Code</label>
                                    <div class="col-md-7">
                                        <input type="text" name="customer_code" class="form-control" name="text" value="<?php echo $custom_details->customer_code; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">GL Code</label>
                                    <div class="col-md-7">
                                        <input type="text" name="gl_code" class="form-control" name="text" value="<?php echo $custom_details->gl_code; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Business Email</label>
                                    <div class="col-md-7">
                                        <input type="email" name="business_email" class="form-control" name="text" value="<?php echo $custom_details->business_email; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Business Phone</label>
                                    <div class="col-md-7">
                                        <input type="text" name="business_phone" class="form-control" name="text" value="<?php echo $custom_details->business_phone; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Customer Status</label>
                                    <div class="col-md-7">
                                        <select id="cusotmer_status" name="cusotmer_status" data-placeholder="Select status" class="form-control form-control-select2" data-fouc="">
                                            <option value="Active">Active</option>
                                            <option value="On-Hold">On-Hold</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Customer Group</label>
                                    <div class="col-md-7">
                                        <select id="customer_group" name="customer_group" data-placeholder="Select group" class="form-control form-control-select2" data-fouc="">
                                            <option value="">None</option>
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
                                        <input type="text" name="delivery_add_line_1" class="form-control" name="text" value="<?php echo $custom_details->delivery_add_line_1; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Address line 2</label>
                                    <div class="col-md-9">
                                        <input type="text" name="delivery_add_line_2" class="form-control" name="text" value="<?php echo $custom_details->delivery_add_line_2; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Suburb</label>
                                    <div class="col-md-9">
                                        <input type="text" name="delivery_suburb" class="form-control" name="text" value="<?php echo $custom_details->delivery_suburb; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">State</label>
                                    <div class="col-md-3">
                                        <input type="text" name="delivery_state" class="form-control" name="text" value="<?php echo $custom_details->delivery_state; ?>">
                                    </div>
                                    <label class="col-form-label col-md-3">Postcode</label>
                                    <div class="col-md-3">
                                        <input type="text" name="delivery_postcode" class="form-control" name="text" value="<?php echo $custom_details->delivery_postcode; ?>">
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
                                        <input type="text" name="billing_add_line_1" class="form-control" name="text" value="<?php echo $custom_details->billing_add_line_1; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Address line 2</label>
                                    <div class="col-md-9">
                                        <input type="text" name="billing_add_line_2" class="form-control" name="text" value="<?php echo $custom_details->billing_add_line_2; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Suburb</label>
                                    <div class="col-md-9">
                                        <input type="text" name="billing_suburb" class="form-control" name="text" value="<?php echo $custom_details->billing_suburb; ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">State</label>
                                    <div class="col-md-3">
                                        <input type="text" name="billing_state" class="form-control" name="text" value="<?php echo $custom_details->billing_state; ?>">
                                    </div>
                                    <label class="col-form-label col-md-3">Postcode</label>
                                    <div class="col-md-3">
                                        <input type="text" name="billing_postcode" class="form-control" name="text" value="<?php echo $custom_details->billing_postcode; ?>">
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