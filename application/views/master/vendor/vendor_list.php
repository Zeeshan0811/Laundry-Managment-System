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
                                <th>Vendor Details</th>
                                <th>User Information</th>
                                <th>Customers</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($vendors as $item) {
                                $user_access = $this->CommonModel->get_single_data_by_many_columns('nso_user_vendor_access', array('access_type' => 4, 'vendor_id' => $item->vendor_id));
                                $customers = $this->CommonModel->get_customer_list_by_vendor(null, $item->vendor_id);
                                $user = $this->CommonModel->table_info('nso_user', 'userId', $user_access->user_id);
                                $i++; ?>
                                <tr>
                                    <td width="10%"><?php echo $i; ?></td>
                                    <td>
                                        Trading Name: <?php echo $item->trading_name; ?> </br>
                                        Legal Name: <?php echo $item->legal_name; ?> </br>
                                        ABN: <?php echo $item->abn; ?> </br>
                                        Business Email: <?php echo $item->business_email; ?> </br>
                                        Business Phone: <?php echo $item->business_phone; ?> </br>
                                    </td>
                                    <td>
                                        User Name: <?php echo $user->firstName . " " . $user->lastName; ?> </br>
                                        Email: <?php echo $user->phone; ?> </br>
                                        Phone: <?php echo $user->email; ?> </br>
                                    </td>
                                    <td><?php
                                        $j = 0;
                                        foreach ($customers as $customer) {
                                            $j++;
                                            echo $j . ". " . $customer->trading_name . "</br>";
                                        }

                                        echo "</br>Total: " . count($customers);
                                        ?>
                                    </td>
                                    <td>
                                        <span class="change_status badge <?php echo status_color($user_access->status); ?>" data-current-status="<?php echo $user_access->status; ?>" data-user-id="<?php echo $user->userId; ?>" data-access-id="<?php echo $user_access->nso_access_id; ?>">
                                            <?php echo status_text($user_access->status); ?>
                                        </span>
                                    </td>
                                    <td><?php echo date('F j, Y, g:i a', strtotime($item->created_at)); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.change_status', function(e) {
        e.preventDefault();

        let current_status = $(this).attr('data-current-status');
        let user_id = $(this).attr('data-user-id');
        let access_id = $(this).attr('data-access-id');

        let url = base_url + 'ajax/change_user_status';

        $.post(url, {
            user_id,
            current_status,
            access_id
        }, function(data) {
            if (data) {
                alert("Status has changed Successfully!");
                location.reload();
            }

        });
    })
</script>