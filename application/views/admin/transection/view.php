<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Order</span> - View</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="d-flex justify-content-center">
                <!-- <a href="#" class="btn btn-link btn-float text-default"><i class="icon-add text-primary"></i><span>Add New</span></a> -->
            </div>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <span class="breadcrumb-item active">Order View</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <!-- <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_theme_primary">
                    <i class="icon-add mr-2"></i>
                    Add New
                </a> -->
            </div>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <!-- Dashboard content -->
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <!-- Hover rows -->
            <div class="card">
                <div class="card-body">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card border-left-3 border-left-danger rounded-left-0">
                        <div class="card-body">
                            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                <div>
                                    <h6 class="font-weight-semibold">Customer Information </h6>
                                    <ul class="list list-unstyled mb-0">
                                        <li>Name: <?php echo $general->firstName . " " . $general->lastName; ?></li>
                                        <li>Phone: <?php echo $general->phone; ?></li>
                                        <li>Email: <?php echo $general->email; ?></li>
                                        <li>Address: <?php echo $general->address; ?></li>
                                        <li>City: <?php echo $general->city; ?></li>
                                        <li>State: <?php echo $general->state; ?></li>
                                        <li>Country: <?php echo $general->country; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-left-3 border-left-success rounded-left-0">
                        <div class="card-body">
                            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                <div>
                                    <h6 class="font-weight-semibold">Order Information</h6>
                                    <ul class="list list-unstyled mb-0">
                                        <li>Date: <?php echo  date("d-m-Y", strtotime($general->createdAt)); ?></li>
                                        <li>Voucher: <?php echo $general->voucherId; ?></li>
                                        <li>Sub-total: <?php echo $general->sub_total; ?></li>
                                        <li>Fee: <?php echo $general->fee; ?></li>
                                        <li>Discount: <?php echo $general->discount; ?></li>
                                        <li>Total: <?php echo $general->amount; ?></li>
                                        <li>Coupon Code: <?php echo $general->coupon_code; ?></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table datatable-basic table-hover">
                                <tr>
                                    <th> Ledger ID </th>
                                    <th> Product Type </th>
                                    <th> Product ID </th>
                                    <th> Name </th>
                                    <th> Unit Price </th>
                                    <th> Qty </th>
                                    <th> Price </th>
                                </tr>
                                <?php foreach ($ledger as $item) {  ?>
                                    <tr>
                                        <td><?php echo $item->generalLedgerId; ?></td>
                                        <td><?php echo frame_category($item->proType); ?></td>
                                        <td><?php echo $item->product_id; ?></td>
                                        <td><?php echo $item->product_name; ?></td>
                                        <td><?php echo $item->unit_price; ?></td>
                                        <td><?php echo $item->quantity; ?></td>
                                        <td><?php echo $item->total_price; ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php foreach ($ledger as $led) {
                $option = json_decode($led->cart_options); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body border-top-0">
                                <div class="d-sm-flex flex-sm-wrap mb-3">
                                    <div class="font-weight-semibold">Ledger Id: <?php echo $led->generalLedgerId; ?></div>
                                </div>
                                <div class="d-sm-flex flex-sm-wrap mb-3">
                                    <div class="font-weight-semibold">Type: <?php echo frame_category($led->proType); ?></div>
                                </div>

                                <?php switch ($led->proType) {

                                    case 1: ?>
                                        <div class="d-sm-flex flex-sm-wrap mb-3">
                                            <div class="font-weight-semibold">Image:</div>
                                            <div class="ml-sm-auto mt-2 mt-sm-0">
                                                <a href="<?php echo site_url('upload/original_image/' . $option->current_image); ?>" target="_blank">
                                                    <img src="<?php echo site_url('upload/original_image/' . $option->current_image); ?>" alt="" width="120" height="120">
                                                </a>
                                            </div>
                                        </div>
                                    <?php break;
                                    case 2:
                                    case 3: ?>
                                        <div class="d-sm-flex flex-sm-wrap mb-3">
                                            <div class="font-weight-semibold">Frame Style: <?php echo $option->const_frame_style; ?></div>
                                        </div>
                                        <?php foreach ($option->current_image_list as $image) ?>
                                        <div class="d-sm-flex flex-sm-wrap mb-3">
                                            <div class="font-weight-semibold">Image:</div>
                                            <div class="ml-sm-auto mt-2 mt-sm-0">
                                                <a href="<?php echo site_url('upload/custom_image/' . $image); ?>" target="_blank">
                                                    <img src="<?php echo site_url('upload/custom_image/' . $image); ?>" alt="" width="120" height="120">
                                                </a>
                                            </div>
                                        </div>
                                    <?php break;
                                    case 4: ?>
                                        <div class="d-sm-flex flex-sm-wrap mb-3">
                                            <div class="font-weight-semibold">Size: <?php echo $option->size; ?></div>
                                        </div>
                                    <?php break;
                                    case 5: ?>
                                        <div class="d-sm-flex flex-sm-wrap mb-3">
                                            <div class="font-weight-semibold">Format: <?php echo $option->current_format; ?></div>
                                        </div>
                                        <div class="d-sm-flex flex-sm-wrap mb-3">
                                            <div class="font-weight-semibold">Size: <?php echo $option->current_size; ?></div>
                                        </div>
                                        <div class="d-sm-flex flex-sm-wrap mb-3">
                                            <div class="font-weight-semibold">Frame: <?php echo $option->current_frame; ?></div>
                                        </div>
                                        <div class="d-sm-flex flex-sm-wrap mb-3">
                                            <div class="font-weight-semibold">Border: <?php echo $option->current_border; ?></div>
                                        </div>


                                        <div class="d-sm-flex flex-sm-wrap mb-3">
                                            <div class="font-weight-semibold">Image:</div>
                                            <div class="ml-sm-auto mt-2 mt-sm-0">
                                                <a href="<?php echo site_url('upload/custom_image/' . $option->canvas_image); ?>" target="_blank">
                                                    <img src="<?php echo site_url('upload/custom_image/' . $option->canvas_image); ?>" alt="" width="120" height="120">
                                                </a>
                                            </div>
                                        </div>
                                    <?php break;
                                    default: ?>
                                <?php break;
                                } ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /hover rows -->
            <?php } ?>
        </div>
    </div>
    <!-- /dashboard content -->

</div>
<!-- /content area -->