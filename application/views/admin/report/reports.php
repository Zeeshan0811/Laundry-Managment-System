<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-gear mr-2"></i> <span class="font-weight-semibold"><?php echo $title; ?></span></h4>
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
                        <span class="font-weight-semibold"><i class="icon-stack3 mr-2"></i> FILTER REPORTS</span>
                    </h5>
                </div>
                <div class="dropdown-divider"></div>
                <div class="card-body">
                    <form action="<?php echo base_url('order'); ?>" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group justify-content-md-center">
                                    <select class="form-control" name="" id="">
                                        <option value="">Revenue</option>
                                        <option value="">Production</option>
                                        <option value="">Analysis</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group justify-content-md-center">
                                    <select class="form-control" name="" id="">
                                        <option value="">by Customer</option>
                                        <option value="">by Customer & Item</option>
                                        <option value="">by Item</option>
                                        <option value="">by Item & Customer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group justify-content-md-center">
                                    <select class="form-control" name="" id="">
                                        <option value="">Name A</option>
                                        <option value="">Name B</option>
                                        <option value="">Name C</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group justify-content-md-center">
                                    <select class="form-control" name="" id="">
                                        <option value="">Name A</option>
                                        <option value="">Name B</option>
                                        <option value="">Name C</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group justify-content-md-center">
                                    <select class="form-control" name="" id="">
                                        <option value="">Dispatched</option>
                                        <option value="">Invoice</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group justify-content-md-center">
                                    <select class="form-control" name="" id="">
                                        <option value="">Name A</option>
                                        <option value="">Name B</option>
                                        <option value="">Name C</option>
                                    </select>
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