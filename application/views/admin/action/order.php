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
                <div class="card-header header-elements-inline pb-2">
                    <h5 class="card-title">
                        <span class="font-weight-semibold"><i class="icon-stack3 mr-2"></i> ORDER DETAILS</span>
                    </h5>
                </div>
                <div class="dropdown-divider"></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row justify-content-md-center">
                                <label class="col-form-label col-md-4">Customer*</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="customer" id="customer">
                                        <?php foreach ($customers as $customer) {  ?>
                                            <option value="<?php echo $customer->userId; ?>"><?php echo $customer->firstName . ' ' . $customer->lastName; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row justify-content-md-center">
                                <label class="col-form-label col-md-4">Delivery</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="delivery" id="delivery">
                                        <?php foreach ($delivery_types as $delivery) { ?>
                                            <option value="<?php echo $delivery->unitId; ?>"><?php echo $delivery->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row justify-content-md-center">
                                <label class="col-form-label col-md-4">Purchase Order</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="purchase_order_number" id="purchase_order_number">
                                </div>
                            </div>
                        </div>
                    </div>
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
                <div class="card-body p-0">
                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th>PRODUCT NAME</th>
                                <th>CATEGORY</th>
                                <th>PACK SIZE</th>
                                <th>PACKS</th>
                                <th width="20%">TOTAL PIECES</th>
                            </tr>
                        </thead>
                        <tbody id="product_list">
                            <?php foreach ($products as $product) { ?>
                                <tr data-master_stock_id="<?php echo $product->master_stock_id; ?>">
                                    <td><?php echo $product->product_name; ?></td>
                                    <td><?php echo $product->pack_size; ?></td>
                                    <td><?php echo $product->pack_size; ?></td>
                                    <td><?php echo $product->pack_size; ?></td>
                                    <td>
                                        <div class="form-group">
                                            <input type="hidden" name="master_stock_id[]" value="<?php echo $product->master_stock_id; ?>">
                                            <input type="text" name="total_piece[]" value="1" class="form-control touchspin-set-value total_piece">
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
    $(document).on('click', '#submit', function(e) {
        e.preventDefault();
        let item = {};
        item.customer = $('#customer').val();
        item.delivery = $('#delivery').val();
        item.purchase_order_number = $('#purchase_order_number').val();

        let item_list = $('#product_list').

        let url = base_url + "ajax/order_submit";
        $.post(url, {
            item: JSON.stringify(item)
        }, function(data) {
            console.log(data);

        });
    })
</script>