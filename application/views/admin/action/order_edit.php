<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
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
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <select class="form-control" name="order_type" id="order_type">
                                    <?php foreach ($order_types as $order_type) {  ?>
                                        <option value="<?php echo $order_type->unitId; ?>"><?php echo $order_type->title; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="form-text text-muted font-italic">Order Type</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control" name="delivery_type" id="delivery_type">
                                    <?php foreach ($delivery_types as $delivery) { ?>
                                        <option value="<?php echo $delivery->unitId; ?>"><?php echo $delivery->title; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="form-text text-muted font-italic">Delivery Type</span>
                            </div>
                        </div>
                        <div class="col-md-3" id="delivery_date_col">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input name="delivery_date" data-value="<?php echo date("Y/m/d", strtotime($order->delivery_date)); ?>" type="text" class="form-control pickadate delivery_date" placeholder="Choose date" required>
                            </div>
                            <span class="form-text text-muted font-italic">Delivery Date</span>

                        </div>
                        <div class="col-md-3" id="pickup_date_col">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input name="pickup_date" data-value="<?php echo date("Y/m/d", strtotime($order->pickup_date)); ?>" type="text" class="form-control pickadate pickup_date" placeholder="Choose date" required>
                            </div>
                            <span class="form-text text-muted font-italic">Pickup Date</span>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /hover rows -->


        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">
                        <span class="font-weight-semibold"><i class="icon-stack3 mr-2"></i> LINKED STOCK LIST</span>
                    </h5>
                </div>
                <div class="dropdown-divider"></div>
                <div class="card-body p-0">
                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th>PRODUCT NAME</th>
                                <!-- <th>CATEGORY</th> -->
                                <th>PACK SIZE</th>
                                <th>PACKS</th>
                                <th width="20%">TOTAL PIECES</th>
                            </tr>
                        </thead>
                        <tbody id="product_list">
                            <?php foreach ($products as $product) { ?>
                                <tr data-master_stock_id="<?php echo $product->master_stock_id; ?>">
                                    <td><?php echo $product->product_name; ?></td>
                                    <!-- <td><?php echo $product->pack_size; ?></td> -->
                                    <td><?php echo $product->pack_size; ?></td>
                                    <td><?php echo $product->pack_size; ?></td>
                                    <td>
                                        <div class="form-group">
                                            <input type="hidden" name="master_stock_id[]" value="<?php echo $product->master_stock_id; ?>">
                                            <input type="text" name="total_piece[]" value="0" class="form-control touchspin-set-value total_piece" data-master-stock-id="<?php echo $product->master_stock_id; ?>">
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /dashboard content -->

</div>
<!-- /content area -->



<!-- Footer -->
<div class="content pt-2 pb-2" id="Page_footer">
    <div class="text-right">
        <button type="button" id="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
    </div>
</div>
<!-- /footer -->

<script>
    $(document).ready(function(e) {
        let order_type = "<?php echo $order->order_type; ?>";
        let delivery_type = "<?php echo $order->delivery_type; ?>";

        $("#order_type").val(order_type).change();
        $("#delivery_type").val(delivery_type).change();


        var picker_delivery = $('.delivery_date ').pickadate('picker');
        var picker_pickup = $('.pickup_date ').pickadate('picker');
        picker_delivery.set('select', '<?php echo $order->delivery_date; ?>', {
            format: 'yyyy-mm-dd'
        });
        picker_pickup.set('select', '<?php echo $order->pickup_date; ?>', {
            format: 'yyyy-mm-dd'
        });


        let url = base_url + "ajax/fetch_single_order/" + "<?php echo $order->transectionId; ?>";
        $.get(url, function(data) {
            if (data) {
                let ledgers = JSON.parse(data);
                ledgers.forEach(ledger => {
                    $(`.total_piece[data-master-stock-id='${ledger.productId}']`).val(ledger.quantity);
                });
            }
        });
    });


    $(document).on('click', '#submit', function(e) {
        e.preventDefault();
        let item = {};
        item.transectionId = "<?php echo $order->transectionId; ?>";
        item.order_type = $('#order_type').val();
        item.delivery_type = $('#delivery_type').val();
        item.delivery_date = $("input[name='delivery_date_submit']").val();
        item.pickup_date = $("input[name='pickup_date_submit']").val();

        item.product_list = $("input[name='master_stock_id[]']")
            .map(function() {
                return $(this).val();
            }).get();

        item.total_piece = $("input[name='total_piece[]']")
            .map(function() {
                return $(this).val();
            }).get();

        let url = base_url + "ajax/order_modify/" + "<?php echo $order->transectionId; ?>";
        $.post(url, {
            item: JSON.stringify(item)
        }, function(data) {
            if (data) {
                alert("Order Placed Successfully!");
                window.location.href = base_url + "invoice/" + "<?php echo $order->transectionId; ?>";
            }

        });
    });


    $(document).on('change', '#delivery_type', function(e) {
        let delivery_type = $(this).val();
        $('#delivery_date_col, #pickup_date_col').show();

        if (delivery_type == 2) {
            $('#pickup_date_col').hide();
        }

        if (delivery_type == 3) {
            $('#delivery_date_col').hide();
        }
    });
</script>