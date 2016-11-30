<div class="panel panel-default">
    <?php if (empty($paymet_id)) { ?>
        <div class = "panel-heading" role = "tab" >
            <h4 class = "panel-title">ไม่มีเลขที่ใบเสร็จนี้</h4>
        </div>
        <?php
    } else {
        $i = 0;
        foreach ($paymet_id as $key) {
            ?>
            <div class = "panel-heading" role = "tab" id = "heading<?php echo $i; ?>">
                <h4 class = "panel-title">
                    <div data-toggle = "collapse" data-parent = "#accordion" href = "#collapse<?php echo $i; ?>" aria-expanded = "false" aria-controls = "collapse<?php echo $i; ?>">
                        <strong>เลขที่ใบเสร็จ: <small><?php echo $key->txn_id; ?></small></strong>
                        <small class="hidden-xs"><?php echo date("d M Y H:i", strtotime($key->payment_date)); ?> น.</small>
                        <button style="margin:0px; float: right; top: -9px;" onClick="window.open('<?php echo base_url("my_customer/print_receipt?txt_id=$key->txn_id"); ?>');" style="float: right; margin: 15px " class="btn bg-gray hvr-shutter-out-horizontal" type="button"><i class="icon-print"> </i> พิมพ์ </button>
                    </div>
                </h4>
            </div>
            <div id = "collapse<?php echo $i; ?>" class = "panel-collapse collapse" role = "tabpanel" aria-labelledby = "heading<?php echo $i; ?>">
                <ol>
                    <?php foreach ($paymet_detail[$i] as $key => $value) { ?>
                        <li><h6><?php echo $value->sm_autoid; ?> - <?php echo $value->sm_productname; ?></h6></li>
                    <?php } ?>
                </ol>
            </div>
            <?php
            $i++;
        }
    }
    ?>
</div>