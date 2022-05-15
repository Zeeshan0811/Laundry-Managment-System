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
                    <form action="<?php echo base_url('ma/vendor_add'); ?>" enctype="multipart/form-data" method="POST" id="customer_form">
                        <div class="row">
                            <!-- Details -->
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6 class="mb-0 font-weight-semibold">VENDOR DETAILS</h6>
                                        <hr class="mt-2 mb-2">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Trading Name*</label>
                                    <div class="col-md-7">
                                        <input type="text" name="trading_name" class="form-control" name="text" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Legal Name</label>
                                    <div class="col-md-7">
                                        <input type="text" name="legal_name" class="form-control" name="text">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">ABN</label>
                                    <div class="col-md-7">
                                        <input type="text" name="abn" class="form-control" name="text">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Business Email</label>
                                    <div class="col-md-7">
                                        <input type="email" name="business_email" class="form-control" name="text">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Business Phone</label>
                                    <div class="col-md-7">
                                        <input type="text" name="business_phone" class="form-control" name="text">
                                    </div>
                                </div>
                            </div>

                            <!-- USER Details -->
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6 class="mb-0 font-weight-semibold">USER DETAILS</h6>
                                        <hr class="mt-2 mb-2">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Name*</label>
                                    <div class="col-md-4">
                                        <input type="text" name="firstName" class="form-control" name="text" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="lastName" class="form-control" name="text" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Phone</label>
                                    <div class="col-md-8">
                                        <input type="text" name="phone" class="form-control" name="text">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-3">Email*</label>
                                    <div class="col-md-8">
                                        <input type="text" name="email" class="form-control" name="email" required>
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
        <button type="button" onclick="document.getElementById('customer_form').submit();" class="btn btn-primary">Invite <i class="icon-paperplane ml-2"></i></button>
    </div>
</div>
<!-- /footer -->