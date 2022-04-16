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

                <a href="<?php echo base_url('admin/products') ?>" target="_blank" class="breadcrumb-elements-item">
                    <i class="icon-display4 mr-2"></i>
                    View Page
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">New Product</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('admin/product_add/'); ?>" class="page_form" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="col-form-label">Product Id</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="productId" name="productId" value="<?php echo $productId; ?>" class="form-control" placeholder="Product ID" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="col-form-label">Product Category</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select id="pro_category" name="pro_category" data-placeholder="Select Category" class="form-control form-control-select2" data-fouc="">
                                            <option value="">Select Category</option>
                                            <?php $i = 0;
                                            foreach ($categories as $item) {
                                                $i++; ?>
                                                <option value="<?php echo $item->unitId; ?>">
                                                    <?php echo $item->title; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="col-form-label">Formulation</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select id="formulationId" name="formulationId" data-placeholder="Select Formulation" class="form-control form-control-select2" data-fouc="">
                                            <option value="">Select Formulation</option>
                                            <?php $i = 0;
                                            foreach ($formulations as $item) {
                                                $i++; ?>
                                                <option value="<?php echo $item->unitId; ?>">
                                                    <?php echo $item->title; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="col-form-label">Brand Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="brandName" name="brandName" class="form-control" placeholder="Brand Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="col-form-label">Generic Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select id="pro_genericId" name="pro_genericId" data-placeholder="Select Generic" class="form-control form-control-select2" data-fouc="">
                                            <option value="">Select Generic</option>
                                            <?php $i = 0;
                                            foreach ($generics as $item) {
                                                $i++; ?>
                                                <option value="<?php echo $item->unitId; ?>">
                                                    <?php echo $item->title; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="col-form-label">Menufecturer</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select id="pro_company" name="pro_company" data-placeholder="Select Menufecturer" class="form-control form-control-select2" data-fouc="">
                                            <option value="">Select Menufecturer</option>
                                            <?php $i = 0;
                                            foreach ($manufacturers as $item) {
                                                $i++; ?>
                                                <option value="<?php echo $item->unitId; ?>">
                                                    <?php echo $item->title; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="col-form-label">Strength</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="pro_weight" name="pro_weight" class="form-control" placeholder="Strength">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="col-form-label">MRP (Single)</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" id="salesPrice" name="salesPrice" class="form-control" placeholder="MRP in Taka" step="0.01" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="col-form-label">Description</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="summernote sumnote_description">
                                        </div>
                                        <textarea name="pro_information" id="pro_information" class="form-control d-none" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="col-form-label">Meta Description</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="col-form-label">Meta Keywords</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="meta_keywords" id="meta_keywords" class="form-control" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="product_image_list">

                        </div>
                        <div class="text-right">

                            <button type="submit" class="btn btn-primary">Save <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /hover rows -->


        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Upload Image</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="#" class="dropzone" id="dropzone_remove_cust">
                        <input type="hidden" name="image_type" value="1">
                        <input type="hidden" name="path" value="upload/product/">
                        <input type="hidden" name="reference_id" value="<?php echo $productId; ?>">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Image List</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Index No.</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /dashboard content -->
</div>
<!-- /content area -->

<script>
    Dropzone.autoDiscover = false;

    $("#dropzone_remove_cust").dropzone({
        acceptedFiles: 'image/*',
        url: "<?php echo base_url('admin/file_upload/'); ?>",
        success: function(file, response) {
            this.removeFile(file);
            single_img_comp(response);
        }
    });


    // Add Image
    function single_img_comp(response) {
        let {
            image_id,
            reference_id,
            image,
            path
        } = JSON.parse(response);

        if (image_id) {
            let file_base_path = site_url + path + image;
            let comp = ` <tr data-image_id="${image_id}"  data-reference_id="${reference_id}">
                            <td width="10%">New</td>
                            <td>
                                <a href="${file_base_path}" target="_blank">
                                    <img src="${file_base_path}" width="150" alt="">
                                </a>
                            </td>
                            <td><input type="text" class="form-control image_title" value=""></td>
                            <td><input type="number" class="form-control image_order" value="0"></td>
                            <td>
                                <button type="button" class="btn bg-primary-400 btn-float image_update" title="Update"><i class="icon-checkmark4"></i></button>
                                <button type="button" class="btn bg-danger-400 btn-float image_delete" title="Delete"  onclick="return confirm('Are you sure?')"><i class="icon-trash"></i></button>
                            </td>
                        </tr>`;
            $('tbody').append(comp);
            $('#product_image_list').append(`<input type="hidden" name="pro_images" value="${image_id}">`);
        }
    }

    // Update Image
    $(document).on('click', '.image_update', function(e) {
        e.preventDefault();
        let element = $(this).closest('tr');
        let url = "<?php echo base_url('admin/file_update') ?>";
        let data = {
            image_id: element.attr('data-image_id'),
            reference_id: element.attr('data-reference_id'),
            image_title: element.find('.image_title').val(),
            image_order: element.find('.image_order').val()
        }

        $.post(url, data, function(response, status) {
            if (status == "success") {
                console.log(response);
                alert('Your request has updated successfully');
            }
        });
    });

    // Delete Image
    $(document).on('click', '.image_delete', function(e) {
        e.preventDefault();
        let element = $(this).closest('tr');
        let image_id = element.attr('data-image_id');
        let url = "<?php echo base_url('admin/delete/image/') ?>" + image_id;
        $.get(url, function(data, status) {
            if (status == "success") {
                element.remove();
            }
        });
    });



    $('.sumnote_description').summernote({
        fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '36', '48'],
        toolbar: [
            ['style', ['style']],
            ['fontsize', ['fontsize']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture', 'hr']],
            ['table', ['table']],
            ['codeview', ['codeview']]
        ],
        callbacks: {
            onChange: function(contents, $editable) {
                // console.log('onChange:', contents, $editable);
                $('#pro_information').text(contents);
            }
        }
    });
</script>