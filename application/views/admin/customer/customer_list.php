<!-- Content area -->
<div class="content">
    <!-- Dashboard content -->
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <!-- Hover rows -->
            <div class="card">
                <div class="card-header header-elements-inline pt-2 pb-2">
                    <h4 class="card-title">
                        <span class="font-weight-semibold"><i class="icon-user-plus mr-2"></i> <?php echo $title; ?></span>
                    </h4>
                </div>
                <div class="dropdown-divider"></div>
                <div class="card-body">

                    <table class="table table-hover datatable-button-html5-columns">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Trading Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($customers as $item) {
                                $i++; ?>
                                <tr>
                                    <td width="10%"><?php echo $i; ?></td>
                                    <td><?php echo $item->firstName; ?></td>
                                    <td><?php echo $item->phone; ?></td>
                                    <td><?php echo $item->email; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('customer_edit/' . $item->userId) ?>" class="btn btn-primary btn-sm" title="Edit">
                                            <i class="icon-pencil "></i>
                                        </a>
                                        <a href="<?php echo base_url('admin/delete/customer/' . $item->userId) ?>" onclick="return confirm('Are you sure?')" class="btn  btn-danger btn-sm" title="Delete">
                                            <i class="icon-trash"> </i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>