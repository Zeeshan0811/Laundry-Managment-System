<table class="table table-hover datatable-button-html5-columns">
    <thead>
        <tr>
            <th>Invoice</th>
            <th>Purchase Id</th>
            <th>Customer</th>
            <th>Status</th>
            <th>Created</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $order){  ?>
            <tr>
                <td>
                    <a href="<?php echo base_url('invoice/'.$order->transectionId); ?>"><?php echo $order->transectionId; ?></a>
                </td>
                <td><?php echo $order->purchase_order_number; ?></td>
                <td><?php echo $order->trading_name; ?></td>
                <td><?php echo order_status($order->order_status); ?></td>
                <td><?php echo date("F j, Y g:i a", strtotime($order->created_at)); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>