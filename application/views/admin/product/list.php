<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"><?php echo $title; ?></span></h4>
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
                <span class="breadcrumb-item active"><?php echo $title; ?></span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="<?php echo base_url('admin/product_add'); ?>" class="breadcrumb-elements-item" target="_blank">
                    <i class="icon-add mr-2"></i>
                    Add New
                </a>
            </div>
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
                <table class="table table-hover  datatable-button-html5-columns">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>SKU</th>
                            <th>Medicine</th>
                            <th>Company</th>
                            <th>MRP (BDT)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($products as $item) {
                            $i++; ?>
                            <tr>
                                <td width="10%"><?php echo $i; ?></td>
                                <td><?php echo $item->productId; ?></td>
                                <td>
                                    <?php echo $item->formulationTitle . ' ' . $item->brandName . ' ' . $item->pro_weight; ?> <br>
                                    <?php echo $item->genericTitle; ?>
                                </td>
                                <td><?php echo $item->companyTitle; ?></td>
                                <td><?php echo $item->salesPrice; ?></td>
                                <td>
                                    <a href="<?php echo base_url('product/' . $item->uri) ?>" class="btn btn-success btn-sm" title="View" target="_blank">
                                        <i class="icon-display4"></i>
                                    </a>
                                    <a href="<?php echo base_url('admin/product_edit/' . $item->pro_id) ?>" class="btn btn-primary btn-sm" title="Edit" target="_blank">
                                        <i class="icon-pencil "></i>
                                    </a>
                                    <a href="<?php echo base_url('admin/delete/product/' . $item->pro_id) ?>" onclick="return confirm('Are you sure?')" class="btn  btn-danger btn-sm" title="Delete" target="_blank">
                                        <i class="icon-trash"> </i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /hover rows -->
        </div>
    </div>
    <!-- /dashboard content -->

</div>
<!-- /content area -->