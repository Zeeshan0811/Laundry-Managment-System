<div class="content" id="printableArea">
    <!-- Invoice template -->
    <div class="card">
        <div class="card-header bg-transparent header-elements-inline">
            <h4 class="text-primary mb-0">Invoice #<?php echo $invoice->transectionId; ?></h4>
            <div class="header-elements no-print">
                <!-- <button type="button" class="btn btn-light btn-sm"><i class="icon-file-check mr-2"></i> Save</button> -->
                <button type="button" class="btn btn-light btn-sm" onClick="Javascript:window.location.href = '<?php echo base_url('order_edit/' . $invoice->transectionId); ?>';"><i class="icon-pencil5 mr-2"></i> Edit</button>
                <button type="button" class="btn btn-light btn-sm ml-3"  onclick="printDiv('printableArea')" ><i class="icon-printer mr-2"></i> Print</button>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-4">
                        
                        <ul class="list list-unstyled mb-0">
                            <li><span class="font-weight-semibold">Order Type: </span><?php echo $this->CommonModel->table_info('nso_allsetup','unitId',$invoice->order_type)->title; ?></li>
                            <li><span class="font-weight-semibold">Delivery Type: </span><?php echo $this->CommonModel->table_info('nso_allsetup','unitId',$invoice->delivery_type)->title; ?></li>
                            <li><span class="font-weight-semibold">Delivery: </span><?php echo  date("F j, Y", strtotime($invoice->delivery_date));  ?></li>
                            <li><span class="font-weight-semibold">Pickup: </span><?php echo  date("F j, Y", strtotime($invoice->pickup_date));  ?></li>
                            <li><span class="font-weight-semibold">Order At: </span><?php echo  date("F j, Y g:i a", strtotime($invoice->general_created));  ?></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="mb-4">
                        <div class="text-sm-right">
                            <ul class="list list-unstyled mb-0">
                                <li><?php echo $invoice->trading_name; ?></li>
                                <li><?php echo $invoice->business_email; ?></li>
                                <li><?php echo $invoice->business_phone; ?></li>
                                <li><?php echo $invoice->billing_add_line_1; ?></li>
                                <li><?php echo $invoice->billing_add_line_2; ?></li>
                                <li><?php echo $invoice->billing_state . ',' . $invoice->billing_country; ?></li>
                                <li><?php echo $invoice->billing_postcode; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="table-responsive">
            <table class="table table-lg">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Rate</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sub_total = 0;
                    foreach ($invoice->ledgers as $ledger) {
                        $sub_total +=  $ledger->total;
                    ?>
                        <tr>
                            <td>
                                <h6 class="mb-0"><?php echo $ledger->product_name; ?></h6>
                            </td>
                            <td><?php echo $ledger->unit_price; ?></td>
                            <td><?php echo $ledger->quantity; ?></td>
                            <td><span class="font-weight-semibold"><?php echo $ledger->total; ?></span></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="card-body">
            <div class="d-md-flex flex-md-wrap">
                <div class="pt-2 mb-3">
                    <!-- <h6 class="mb-3">Authorized person</h6>-->
                    <!--<div class="mb-3">-->
                    <!--    <img src="../../../../global_assets/images/signature.png" width="150" alt="">-->
                    <!--</div>-->

                    <!--<ul class="list-unstyled text-muted">-->
                    <!--    <li>Eugene Kopyov</li>-->
                    <!--    <li>2269 Elba Lane</li>-->
                    <!--    <li>Paris, France</li>-->
                    <!--    <li>888-555-2311</li>-->
                    <!--</ul> -->
                </div>

                <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                    <!--<h6 class="mb-3">Total due</h6>-->
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Subtotal:</th>
                                    <td class="text-right">$<?php echo $sub_total; ?></td>
                                </tr>
                                <tr>
                                    <th>Tax: <span class="font-weight-normal">(0%)</span></th>
                                    <td class="text-right">0</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td class="text-right text-primary">
                                        <h5 class="font-weight-semibold">$<?php echo $sub_total; ?></h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- <div class="text-right mt-3">
                        <button type="button" class="btn btn-primary btn-labeled btn-labeled-left"><b><i class="icon-paperplane"></i></b> Send invoice</button>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="card-footer text-center">
            <span class="text-muted">Thank you for using Smart Laundry Manager.</span>
        </div>
    </div>
    <!-- /invoice template -->
</div>
