<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"><?php echo $title; ?></span> - List</h4>
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
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Payment</a>
                <span class="breadcrumb-item active">List</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <!-- <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_theme_add">
                    <i class="icon-add mr-2"></i>
                    Add New
                </a> -->
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
                            <th>Date</th>
                            <th>Reg.Id</th>
                            <th>Name</th>
                            <th>Transection Id</th>
                            <th>Approval Code</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($generals as $item) {
                            $user = $this->CommonModel->table_info('nso_forms', 'form_id', $item->formId);
                            $i++; ?>
                            <tr>
                                <td width="10%"><?php echo $i; ?></td>
                                <td><?php echo  date("d-m-Y H:i:s", strtotime($item->createdAt)); ?></td>
                                <td><?php echo $item->formId; ?></td>
                                <td><?php echo $user->firstName . ' ' . $user->lastName; ?></td>
                                <td><?php echo $item->transactionId; ?></td>
                                <td><?php echo $item->approvalCode; ?></td>
                                <td><?php echo $item->amount; ?></td>
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