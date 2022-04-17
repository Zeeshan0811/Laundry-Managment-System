<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-equalizer mr-2"></i> <span class="font-weight-semibold"><?php echo $title; ?></span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <!-- Dashboard content -->
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <!-- Hover rows -->
            <div class="card">
                <div class="card-header header-elements-inline pb-2">
                    <h5 class="card-title">
                        <span class="font-weight-semibold"><i class="icon-stack3 mr-2"></i> ORDER DETAILS</span>
                    </h5>
                </div>
                <div class="dropdown-divider"></div>
                <div class="card-body">
                    <form action="<?php echo base_url('order'); ?>" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-4">Customer*</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="" id="">
                                            <option value="">Name A</option>
                                            <option value="">Name B</option>
                                            <option value="">Name C</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-4">Delivery</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="" id="">
                                            <option value="">Name A</option>
                                            <option value="">Name B</option>
                                            <option value="">Name C</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-form-label col-md-4">Purchase Order</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="repeat_password" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /hover rows -->

            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">
                        <span class="font-weight-semibold"><i class="icon-stack3 mr-2"></i> LINKED STOCK LIST</span>
                    </h5>
                </div>
                <div class="dropdown-divider"></div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
    <!-- /dashboard content -->

</div>
<!-- /content area -->