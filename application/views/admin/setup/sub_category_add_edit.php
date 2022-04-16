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
        <div class="col-md-6">
            <!-- Hover rows -->
            <div class="card">
                <div class="card-body">
                    <?php
                    $url_line = (!empty($sub_cat)) ? 'admin/sub_category_edit/' . $sub_cat->id : 'admin/sub_category_add';
                    $title_en = (!empty($sub_cat)) ? $sub_cat->title_en : '';
                    $title_pt = (!empty($sub_cat)) ? $sub_cat->title_pt : '';
                    ?>
                    <form action="<?php echo base_url($url_line); ?>" enctype="multipart/form-data" method="POST">
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">Select Type</label>
                            <div class="col-md-8">
                                <select name="type" id="type" data-placeholder="Select Type" class="form-control form-control-select2" data-fouc="">
                                    <?php foreach ($categories as $category) {  ?>
                                        <option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">Title (EN)</label>
                            <div class="col-md-8">
                                <input type="text" name="title_en" value="<?php echo $title_en; ?>" class="form-control" placeholder="Title in Enlish" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">Title (PT)</label>
                            <div class="col-md-8">
                                <input type="text" name="title_pt" value="<?php echo $title_pt; ?>" class="form-control" placeholder="Title in Enlish" required>
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
        let type = "<?php echo $sub_cat->type; ?>";
        if (type) {
            $('#type').val(type).trigger('change');
        }
    });
</script>