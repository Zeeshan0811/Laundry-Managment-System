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
                <a href="<?php echo base_url('/')  ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                <span class="breadcrumb-item active"><?php echo $title ?></span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="<?php echo base_url('admin/sub_category_add') ?>" class="breadcrumb-elements-item">
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
                <table class="table datatable-basic table-hover">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Type</th>
                            <th>Title (EN)</th>
                            <th>Title (PT)</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($sub_cats as $item) {
                            switch ($item->type) {
                                case 1:
                                    $type_text = 'Job Category';
                                    break;

                                default:
                                    $type_text = 'Invalid';
                                    break;
                            }
                            $i++; ?>
                            <tr>
                                <td width="10%"><?php echo $i; ?></td>
                                <td><?php echo $type_text; ?></td>
                                <td><?php echo $item->title_en; ?></td>
                                <td><?php echo $item->title_pt; ?></td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="<?php echo base_url('admin/sub_category_edit/' . $item->id) ?>" class="dropdown-item" target="_blank"><i class="icon-pencil5"></i> Edit</a>
                                                <a href="<?php echo base_url('delete/subcat/' . $item->id) ?>" onclick="return confirm('are you sure?')" class="dropdown-item"><i class="icon-bin"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
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