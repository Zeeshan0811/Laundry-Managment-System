<div class="mad-breadcrumb">
    <div class="container text-center">
        <h1 class="mad-page-title"><?php echo $title; ?></h1>
        <nav class="mad-breadcrumb-path"><span><a href="<?php echo base_url('/'); ?>" class="mad-link">Home</a></span> / <span><?php echo $title; ?>
            </span>
        </nav>
    </div>
</div>

<section class="mad-content no-pd">
    <div class="container">
        <table cellpadding="6" cellspacing="1" style="width:100%" border="0">

            <tr>
                <th>Item Description</th>
                <th style="text-align:right">Item Price</th>
                <th>QTY</th>
                <th style="text-align:right">Sub-Total</th>
            </tr>

            <?php $i = 1; ?>

            <?php foreach ($this->cart->contents() as $items) : ?>

                <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

                <tr data-row-id="<?php echo $items['rowid'];  ?>">
                    <td>
                        <?php echo $items['name']; ?>
                    </td>
                    <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                    <td>
                        <input type="number" name="pro_quantity" class="pro_quantity" value="<?php echo $items['qty']; ?>" maxlength="4" min="1">
                    </td>
                    <td style="text-align:right" class="sub_total">৳<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                </tr>

                <?php $i++; ?>

            <?php endforeach; ?>

            <tr>
                <td colspan="2"> </td>
                <td class="right"><strong>Total</strong></td>
                <td class="right" class="total_amount">৳<?php echo $this->cart->format_number($this->cart->total()); ?></td>
            </tr>

        </table>
    </div>
</section>

<script>
    $(document).on('change', '.pro_quantity', function(e) {

        let pro_qty = $(this).val();
        let row_id = $(this).closest('tr').attr('data-row-id');
        if (pro_qty > 0) {
            console.log(pro_qty);
        }

    });
</script>