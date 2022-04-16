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
                <a href="<?php echo base_url('admin/assets') ?>" target="_blank" class="breadcrumb-elements-item">
                    <i class="icon-display4 mr-2"></i>
                    View List
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo base_url('admin/asset_edit/' . $asset->unitId); ?>" class="page_form" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-label">Category</label>
                                    <select id="type" name="type" data-placeholder="Select Category" class="form-control form-control-select2" data-fouc="">
                                        <option value="">Select Category</option>
                                        <?php $i = 0;
                                        foreach ($categories as $category) {
                                            $i++; ?>
                                            <option value="<?php echo $category->cat_id; ?>">
                                                <?php echo $category->cat_title; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-label">Title</label>
                                    <input type="text" name="title" id="title" value="" class="form-control" placeholder="Title" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Save <i class="icon-paperplane ml-2"></i></button>
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
<script>
    $(document).ready(function() {

        $('#type').val('<?php echo $asset->type; ?>').change();
        $('#title').val('<?php echo $asset->title; ?>');
    });
</script>