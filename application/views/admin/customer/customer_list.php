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
                                <th>Company</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Created At</th>
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
                                    <td><span class="font-weight-bold"><?php echo $company->trading_name; ?></span></td>
                                    <td>
                                        <?php echo $company->legal_name; ?></br>
                                        <?php echo $company->business_phone; ?></br>
                                        <?php echo $company->business_email; ?>
                                    </td>
                                    <td>
                                        <?php echo $customer->firstName . ' ' . $customer->lastName; ?></br>
                                        <?php echo $customer->phone; ?></br>
                                        <?php echo $customer->email; ?>
                                    </td>
                                    <td>
                                        <?php if ($company->vendor_status == 1) { ?>
                                            <span class="badge badge-success my-3 my-lg-0 ml-lg-3">Active</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger my-3 my-lg-0 ml-lg-3">Disabled</span>
                                        <?php }   ?>
                                    </td>
                                    <td><?php echo date('F j, Y <\b\\r> g:i a', strtotime($company->created_at)); ?></td>
                                    <td>
                                        <a href="<?php echo base_url('customer_edit/' . $company->vendor_id) ?>" class="btn btn-primary btn-sm mb-2" title="Edit">
                                            <i class="icon-pencil "></i>
                                        </a>
                                        <?php if ($company->vendor_status == 1) { ?>
                                            <a href="<?php echo base_url('company_status/' . $company->vendor_id . '/3') ?>" onclick="return confirm('Are you sure?')" class="btn  btn-danger btn-sm mb-2" title="Disable Now">
                                                <i class="icon-blocked"> </i>
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url('company_status/' . $company->vendor_id . '/1') ?>" onclick="return confirm('Are you sure?')" class="btn  btn-success btn-sm mb-2" title="Disable Now">
                                                <i class="icon-checkmark"> </i>
                                            </a>
                                        <?php } ?>
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