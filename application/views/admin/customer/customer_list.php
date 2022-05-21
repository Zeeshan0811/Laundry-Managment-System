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
                                <th>Company</th>
                                <th>User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($companies as $company) {
                                $company_access = $this->CommonModel->get_single_data_by_single_column('nso_user_vendor_access', 'company_id', $company->vendor_id);
                                $customer = $this->CommonModel->table_info('nso_user', 'userId', $company_access->customer_id);
                                $i++; ?>
                                <tr>
                                    <td width="10%"><?php echo $i; ?></td>
                                    <td>
                                        <span class="font-weight-bold">Trading Name: </span> <?php echo $company->trading_name; ?></br>
                                        <span class="font-weight-bold">Legal Name: </span> <?php echo $company->legal_name; ?></br>
                                        <span class="font-weight-bold">Business Phone: </span> <?php echo $company->business_phone; ?></br>
                                        <span class="font-weight-bold">Business Email: </span> <?php echo $company->business_email; ?>
                                    </td>
                                    <td>
                                        <span class="font-weight-bold">Name: </span> <?php echo $customer->firstName . ' ' . $customer->lastName; ?></br>
                                        <span class="font-weight-bold">Phone: </span> <?php echo $customer->phone; ?></br>
                                        <span class="font-weight-bold">Email: </span> <?php echo $customer->email; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('customer_edit/' . $company->vendor_id) ?>" class="btn btn-primary btn-sm" title="Edit">
                                            <i class="icon-pencil "></i>
                                        </a>
                                        <!-- <a href="<?php echo base_url('admin/delete/customer/' . $customer->userId) ?>" onclick="return confirm('Are you sure?')" class="btn  btn-danger btn-sm" title="Delete">
                                            <i class="icon-trash"> </i>
                                        </a> -->
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