<style>
    .orders a.nav-link {
        font-size: 16px;
    }
</style>

<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex pt-2 pb-2">
            <h4><i class="icon-cart mr-2"></i> <span class="font-weight-semibold"><?php echo $title; ?></span></h4>
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
                        <span class="font-weight-semibold"><i class="icon-stack3 mr-2"></i> FILTER ORDERS</span>
                    </h5>
                </div>
                <div class="dropdown-divider"></div>
                <div class="card-body">
                    <form action="<?php echo base_url('order'); ?>" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <select class="form-control" name="" id="">
                                    <option value="">Name A</option>
                                    <option value="">Name B</option>
                                    <option value="">Name C</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <select class="form-control" name="" id="">
                                    <option value="">Coffs</option>
                                    <option value="">Taree</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <select class="form-control" name="" id="">
                                    <option value="">Coffs</option>
                                    <option value="">Taree</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="text" class="form-control" name="repeat_password" required>
                            </div>
                            <div class="col-md-3 form-group">
                                <select class="form-control" name="" id="">
                                    <option value="">Wash Orders</option>
                                    <option value="">Rental Charges</option>
                                    <option value="">Pickup Orders</option>
                                    <option value="">Backorders</option>
                                    <option value="">All Pending Orders</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <select class="form-control" name="" id="">
                                    <option value="">Motel</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /hover rows -->

            <div class="card">
                <div class="card-header header-elements-inline">
                    <ul class="nav nav-tabs nav-tabs-bottom orders">
                        <li class="nav-item"><a href="#bottom-tab1" class="nav-link active" data-toggle="tab">Pending</a></li>
                        <li class="nav-item"><a href="#bottom-tab2" class="nav-link" data-toggle="tab">Packing</a></li>
                        <li class="nav-item"><a href="#bottom-tab3" class="nav-link" data-toggle="tab">Packed</a></li>
                        <li class="nav-item"><a href="#bottom-tab4" class="nav-link" data-toggle="tab">Dispatched</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="card-body">


                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="bottom-tab1">
                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid laeggin.
                            </div>

                            <div class="tab-pane fade" id="bottom-tab2">
                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid laeggin.
                            </div>

                            <div class="tab-pane fade" id="bottom-tab3">
                                DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg whatever.
                            </div>

                            <div class="tab-pane fade" id="bottom-tab4">
                                Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /content area -->