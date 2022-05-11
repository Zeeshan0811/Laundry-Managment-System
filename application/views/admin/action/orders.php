<style>
    .orders a.nav-link {
        font-size: 16px;
    }

    .order_tickbox {
        transform: scale(1.5);
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
                    <form action="" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <select class="form-control" name="customer" id="customer">
                                    <?php foreach ($customers as $customer) { ?>
                                        <option value="<?php echo $customer->userId; ?>"><?php echo $customer->firstName; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <select class="form-control" name="order_type" id="order_type">
                                    <option value="1">All Pending Orders</option>
                                    <option value="2">Rental Charges</option>
                                    <option value="3">Pickup Orders</option>
                                    <option value="4">Wash Orders</option>
                                    <option value="5">Backorders</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="text" class="form-control" name="order_id" id="order_id" placeholder="Purchase Id">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /hover rows -->

            <div class="card">
                <div class="card-header header-elements-inline p-0">
                    <ul class="nav nav-tabs nav-tabs-bottom orders">
                        <li class="nav-item order_view_tab"><a href="#pending_tab" class="nav-link active" data-toggle="tab" id="pending_menu">Pending</a></li>
                        <li class="nav-item order_view_tab"><a href="#packing_tab" class="nav-link" data-toggle="tab" id="packing_menu">Packing</a></li>
                        <li class="nav-item order_view_tab"><a href="#packed_tab" class="nav-link" data-toggle="tab" id="packed_menu">Packed</a></li>
                        <li class="nav-item order_view_tab"><a href="#dispatched_tab" class="nav-link" data-toggle="tab" id="dispatched_menu">Dispatched</a></li>
                    </ul>
                </div>
                <div class="card-body pl-0 pr-0">
                    <div class="tab-content">
                        <div class="tab-pane fade order_view  show active" id="pending_tab" data-order-type-tab="1"></div>
                        <div class="tab-pane fade order_view " id="packing_tab" data-order-type-tab="2"></div>
                        <div class="tab-pane fade order_view " id="packed_tab" data-order-type-tab="3"></div>
                        <div class="tab-pane fade order_view " id="dispatched_tab" data-order-type-tab="4"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /dashboard content -->
    </div>
    <!-- /content area -->
</div>

<!-- Footer -->
<div class="content pt-2 pb-2 row" id="Page_footer">
    <div class="col-md-4">
        <button type="button" id="view_orrder" class="btn btn-secondary">View <i class="icon-display ml-2"></i></button>
        <button type="button" id="print_Order" class="btn btn-success">Print <i class="icon-printer4 ml-2"></i></button>
        <button type="button" id="cancel Order" class="btn btn-danger">Cancel <i class="icon-cancel-circle2 ml-2"></i></button>
        <button type="button" id="new_order_btn" class="btn btn-primary">New Order <i class="icon-plus-circle2 ml-2"></i></button>
    </div>
    <div class="col-md-8 text-right" id="page_footer_buttons">
        <button type="button" id="packing_order_btn" class="btn btn-info">Packing <i class="icon-dropbox ml-2"></i></button>
        <button type="button" id="packed_order_btn" class="btn btn-info">Packed <i class="icon-gift ml-2"></i></button>
        <button type="button" id="dispatch_order_btn" class="btn btn-info">Dispatch <i class="icon-cart ml-2"></i></button>

    </div>
</div>
<!-- /footer -->

<script>
    $(document).ready(function() {
        load_orders(1);
    });

    $(document).on('input', '#order_id', function(e) {
        let order_status = $(".tab-pane.active").attr('data-order-type-tab');
        load_orders(order_status);
    });

    $(document).on('click', '.order_view_tab', function(e) {
        let order_status = $(this).attr('data-order-type-tab');
        load_orders(order_status);
    });

    function load_orders(order_status) {
        let item = {};
        $('.order_view').empty();

        item.customer = $("#customer").val();
        item.order_type = $("#order_type").val();
        item.order_id = $("#order_id").val();
        item.order_status = order_status;

        let url = base_url + "ajax/fetch_orders";
        $.post(url, {
            item: JSON.stringify(item)
        }, function(data) {
            if (data) {
                let orders = JSON.parse(data);
                let element_orders = "";
                orders.forEach(order => {
                    element_orders += `
                            <tr>
                                <td>${order.transectionId}</td>
                                <td>Customer</td>
                                <td>${order.created_at}</td>
                                <td>${order.delivery_date}</td>
                                <td>
                                <div class="form-check form-check-inline form-check-right">
                                    <input type="checkbox" class="form-check-input order_tickbox" data-order-id="${order.generalId}">
                                </div>
                                </td>
                            </tr>`;
                });

                let element = `
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th>Order.</th>
                            <th>Customer</th>
                            <th>Created</th>
                            <th>Delivery</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${element_orders}
                    </tbody>
                </table>
                `;

                if (order_status == 1) {
                    $('#pending_tab').append(element);
                } else if (order_status == 2) {
                    $('#packing_tab').append(element);
                } else if (order_status == 3) {
                    $('#packed_tab').append(element);
                } else if (order_status == 4) {
                    $('#dispatched_tab').append(element);
                } else {}
            }

        });



    }
</script>