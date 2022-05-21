<div class="content">
    <!-- Invoice template -->
    <div class="card">
        <div class="card-header bg-transparent header-elements-inline">
            <h6 class="card-title">invoice</h6>
            <div class="header-elements">
                <!-- <button type="button" class="btn btn-light btn-sm"><i class="icon-file-check mr-2"></i> Save</button>
                <button type="button" class="btn btn-light btn-sm ml-3"><i class="icon-printer mr-2"></i> Print</button> -->
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-4">
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

                <div class="col-sm-6">
                    <div class="mb-4">
                        <div class="text-sm-right">
                            <h4 class="text-primary mb-2 mt-md-2">Invoice #<?php echo $invoice->transectionId; ?></h4>
                            <ul class="list list-unstyled mb-0">
                                <li>Date: <span class="font-weight-semibold"><?php echo date("F j, Y, g:i a"); ?></span></li>
                                <li>Purchase date: <span class="font-weight-semibold"><?php echo  date("F j, Y, g:i a", strtotime($invoice->general_created));  ?></span></li>
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
                    <!-- <h6 class="mb-3">Authorized person</h6>
                    <div class="mb-3">
                        <img src="../../../../global_assets/images/signature.png" width="150" alt="">
                    </div>

                    <ul class="list-unstyled text-muted">
                        <li>Eugene Kopyov</li>
                        <li>2269 Elba Lane</li>
                        <li>Paris, France</li>
                        <li>888-555-2311</li>
                    </ul> -->
                </div>

                <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                    <h6 class="mb-3">Total due</h6>
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

        <div class="card-footer">
            <span class="text-muted">Thank you for using Laundry Management System. This invoice can be paid via PayPal, Bank transfer, Skrill or Payoneer. Payment is due within 30 days from the date of delivery. Late payment is possible, but with with a fee of 10% per month. Company registered in England and Wales #6893003, registered office: 3 Goodman Street, London E1 8BF, United Kingdom. Phone number: 888-555-2311</span>
        </div>
    </div>
    <!-- /invoice template -->
</div>