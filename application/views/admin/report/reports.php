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
                                    <select class="form-control" name="customer" id="customer">
                                        <option value="0">Customer - All</option>
                                        <?php foreach ($customers as $customer) { ?>
                                            <option value="<?php echo $customer->vendor_id; ?>"><?php echo $customer->trading_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group justify-content-md-center">
                                    <select class="form-control" name="order_status" id="order_status">
                                        <option value="0">Status - All</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Processing</option>
                                        <option value="3">Packed</option>
                                        <option value="4">Dispatched</option>
                                        <option value="5">Canceled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /hover rows -->

            <div class="card">
                <div class="card-header header-elements-inline pb-2">
                    <h5 class="card-title">
                        <span class="font-weight-semibold"><i class="icon-stack3 mr-2"></i>ORDERS</span>
                    </h5>
                </div>
                <div class="card-body" id="order_fetched_list">

                </div>
            </div>
        </div>
    </div>
    <!-- /dashboard content -->
</div>
<!-- /content area -->


<script>
    $(document).ready(function() {
        load_orders();
    });


    $(document).on('change', '#customer, #order_status, #invoice_status', function(e) {
        load_orders();
    });

    function load_orders() {
        let item = {};
        $('#order_fetched_list').empty();

        item.customer = $("#customer").val();
        item.order_type = 0;
        item.transectionId = "";
        item.purchase_order_number = "";
        item.order_status = $("#order_status option:selected").val();

        let url = base_url + "ajax/fetch_orders";
        $.post(url, {
            item: JSON.stringify(item)
        }, function(data) {
            if (data) {
                let orders = JSON.parse(data);
                let element_orders = "";
                let order_url;
                orders.forEach(order => {
                    order_url = base_url + 'invoice/' + order.transectionId;
                    // order_status = '<?php echo order_status(1); ?>';ll
                    element_orders += `
                            <tr>
                                <td>
                                    <a href="${order_url}">${order.transectionId}</a>
                                </td>
                                <td>${order.purchase_order_number}</td>
                                <td>${order.trading_name}</td>
                                <td>${order.created_at}</td>
                            </tr>`;
                });

                let element = `
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Purchase Id</th>
                            <th>Customer</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${element_orders}
                    </tbody>
                </table>
                `;

                $('#order_fetched_list').append(element);
            }

        });



    }
</script>