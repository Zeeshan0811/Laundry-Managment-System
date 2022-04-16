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
                <a href="<?php echo base_url('admin/price_scheduling/' . $page->uri) ?>" target="_blank" class="breadcrumb-elements-item">
                    <i class="icon-coin-dollar mr-2"></i>
                    Price Scheduling
                </a>
                <a href="<?php echo base_url('property/' . $page->uri) ?>" target="_blank" class="breadcrumb-elements-item">
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Content</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('admin/page_edit/' . $page->uri); ?>" class="page_form" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Title</label>
                                    <input type="text" name="title" value="<?php echo $page->title; ?>" class="form-control" placeholder="Title" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Adult limit to count additional</label>
                                    <input type="number" name="adult_limit" value="<?php echo $page->adult_limit; ?>" class="form-control" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Minimum Stays (Nights)</label>
                                    <input type="number" name="minimum_stays" value="<?php echo $page->minimum_stays; ?>" class="form-control" placeholder="Nights" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Price Per Night (AUD)</label>
                                    <input type="number" name="ppn" value="<?php echo $page->ppn; ?>" class="form-control" placeholder="Price Per Night" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Additional Cost Per Person (AUD)</label>
                                    <input type="number" name="gpn" value="<?php echo $page->gpn; ?>" class="form-control" placeholder="Price Per Night" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Cost Per child (AUD)</label>
                                    <input type="number" name="cpn" value="<?php echo $page->cpn; ?>" class="form-control" placeholder="Price Per Night" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Service Fee (AUD)</label>
                                    <input type="number" name="service_fee" value="<?php echo $page->service_fee; ?>" class="form-control" placeholder="Price Per Night" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Cleaning Fee (AUD)</label>
                                    <input type="number" name="cleaning_fee" value="<?php echo $page->cleaning_fee; ?>" class="form-control" placeholder="Price Per Night" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-label">Content</label>
                                    <div class="summernote sumnote_description">
                                        <?php echo $page->body; ?>
                                    </div>
                                </div>
                                <div class="input-group d-none">
                                    <textarea name="page_body" id="page_body" cols="30" rows="3" class="form-control" required><?php echo $page->body; ?></textarea>
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
                    <form action="#" class="dropzone" id="dropzone_remove_cust"></form>
                </div>
            </div>

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
                            <?php $i = 0;
                            foreach ($images as $item) {
                                $i++; ?>
                                <tr data-slider_id="<?php echo $item->slider_id; ?>">
                                    <td width="10%"><?php echo $i; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('upload/images/') . $item->image; ?>" target="_blank">
                                            <img src="<?php echo site_url('upload/images/') . $item->image; ?>" width="150" alt="<?php echo $item->title; ?>">
                                        </a>
                                    </td>
                                    <td><input type="text" class="form-control image_title" value="<?php echo $item->title; ?>"></td>
                                    <td><input type="number" class="form-control image_order" value="<?php echo $item->slider_order; ?>"></td>
                                    <td>
                                        <button type="button" class="btn bg-success-400 btn-float image_update" title="Update"><i class="icon-checkmark4"></i></button>
                                        <button type="button" class="btn bg-danger-400 btn-float image_delete" title="Delete"><i class="icon-trash"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
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
        url: "<?php echo base_url('admin/file_upload/' . $page->uri); ?>",
        success: function(file, response) {
            this.removeFile(file);
            let {
                slider_id,
                image
            } = JSON.parse(response);
            single_img_comp(slider_id, image);
        }
    });


    // Add Image
    function single_img_comp(slider_id, image) {
        if (slider_id) {
            let file_base_path = "<?php echo site_url('upload/images/'); ?>" + image;
            let comp = ` <tr data-slider_id="${slider_id}">
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
                                <button type="button" class="btn bg-danger-400 btn-float image_delete" title="Delete"><i class="icon-trash"></i></button>
                            </td>
                        </tr>`;
            $('tbody').append(comp);
        }
    }

    // Update Image
    $(document).on('click', '.image_update', function(e) {
        e.preventDefault();
        let element = $(this).closest('tr');
        let url = "<?php echo base_url('admin/file_update') ?>";
        let data = {
            slider_id: element.attr('data-slider_id'),
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
        let slider_id = element.attr('data-slider_id');
        let url = "<?php echo base_url('admin/delete/slider/') ?>" + slider_id;
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
                $('#page_body').text(contents);
            }
        }
    });
</script>