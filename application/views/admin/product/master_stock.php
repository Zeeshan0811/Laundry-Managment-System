<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title">
            <h4><i class="icon-gear mr-2"></i> <span class="font-weight-semibold"><?php echo $title; ?></span></h4>
            <p class="mt-2">This master stock list is the master template where all stock available to your laundry is shown.</p>
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
                        <span class="font-weight-semibold"><i class="icon-stack3 mr-2"></i> MASTER STOCK LIST</span>
                    </h5>
                </div>
                <div class="dropdown-divider m-0"></div>
                <div class="card-body master_stock">
                    <div class="row font-weight-bold mb-2">
                        <div class="col-4">PRODUCT NAME</div>
                        <div class="col-2">PACK SIZE</div>
                        <div class="col-2">WASH PRICE</div>
                        <div class="col-3">RENTAL PRICE</div>
                        <div class="col-1">ACTION</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control product_name" id="product_name" placeholder="Name of a Product">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" class="form-control pack_size" id="pack_size" value="1">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" class="form-control wash_price" id="wash_price" value="0.00">
                            </div>
                        </div>
                        <div class="col-md-3 d-flex">
                            <div class="form-group">
                                <input type="text" class="form-control rental_price" id="rental_price" value="0.00">

                            </div>
                            <div class="form-group">
                                <select id="rental_type" name="rental_type" data-placeholder="Select Category" class="form-control">
                                    <option value="Daily">Daily</option>
                                    <option value="Weekly">Weekly</option>
                                    <option value="Forthnightly">Forthnightly</option>
                                    <option value="Monthly">Monthly</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <a href="#" id="add_stock" class="btn  btn-success btn-sm" title="Add Item">
                                    <i class="icon-plus-circle2"> </i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /hover rows -->
        </div>
    </div>
    <!-- /dashboard content -->

</div>
<!-- /content area -->


<script>
    $(document).ready(function() {
        let url = base_url + "ajax/master_stock_get";
        $.post(url, function(data) {
            let stocks = JSON.parse(data);
            stocks.forEach((stock) => {
                console.log(stock.product_name);
                add_stock_row(stock);
            })
        });
    });

    $(document).on('click', '#add_stock', function(e) {
        e.preventDefault();
        let item = {};

        item.product_name = $('#product_name').val();
        item.pack_size = $('#pack_size').val();
        item.wash_price = $('#wash_price').val();
        item.rental_price = $('#rental_price').val();
        item.rental_type = $('#rental_type').val();

        let url = base_url + "ajax/master_stock_add";
        $.post(url, {
                item: JSON.stringify(item)
            })
            .done(function(data) {
                item.master_stock_id = data;
                add_stock_row(item);

                $('#product_name').val("");
                $('#pack_size').val(1);
                $('#wash_price').val(0);
                $('#rental_price').val(0);
            });
    });

    $(document).on('click', '#update_stock', function(e) {
        e.preventDefault();
        let item = {};

        item.master_stock_id = $(this).closest('.row').attr('data-stock-id');
        item.product_name = $(this).closest('.row').find('.product_name').val();
        item.pack_size = $(this).closest('.row').find('.pack_size').val();
        item.wash_price = $(this).closest('.row').find('.wash_price').val();
        item.rental_price = $(this).closest('.row').find('.rental_price').val();
        item.rental_type = $(this).closest('.row').find('.rental_type').val();

        let url = base_url + "ajax/master_stock_update";
        $.post(url, {
                item: JSON.stringify(item)
            })
            .done(function(data) {
                // item.stock_id = data;
                alert('Updated Successfully');
            });
    });

    function add_stock_row(item) {
        let new_stock_row = `
            <div class="row" data-stock-id="${item.master_stock_id}">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control product_name" placeholder="Name of a Product" value="${item.product_name}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text" class="form-control pack_size" value="${item.pack_size}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text" class="form-control wash_price" value="${item.wash_price}">
                    </div>
                </div>
                <div class="col-md-3  d-flex">
                    <div class="form-group">
                        <input type="text" class="form-control rental_price" value="${item.rental_price}">

                    </div>
                    <div class="form-group">
                        <select name="rental_type" data-placeholder="Select Category" class="form-control rental_type">
                            <option value="Daily" ${(item.rental_type == "Daily") ? "selected" : ""}>Daily</option>
                            <option value="Weekly" ${(item.rental_type == "Weekly") ? "selected" : ""}>Weekly</option>
                            <option value="Forthnightly" ${(item.rental_type == "Forthnightly") ? "selected" : ""}>Forthnightly</option>
                            <option value="Monthly" ${(item.rental_type == "Monthly") ? "selected" : ""}>Monthly</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <a href="#" id="update_stock" class="btn  btn-primary btn-sm" title="Update Item">
                            <i class="icon-checkmark"> </i>
                        </a>
                    </div>
                </div>
            </div>
            `;

        $('.master_stock').append(new_stock_row);
    }
</script>