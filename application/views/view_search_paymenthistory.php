<div class="panel panel-default">
    <?php if (empty($paymet_id)) { ?>
        <div class = "panel-heading" role = "tab" >
            <h4 class = "panel-title">ไม่มีเลขที่ใบเสร็จนี้</h4>
        </div>
        <?php
    } else {

        $a = 0;
        foreach ($paymet_id as $key) {
            ?>
            <div class = "panel-heading" role = "tab" id = "heading<?php echo $a; ?>">
                <h4 class = "panel-title">
                    <div data-toggle = "collapse" data-parent = "#accordion" href = "#collapse<?php echo $a; ?>" aria-expanded = "false" aria-controls = "collapse<?php echo $a; ?>">
                        <strong>รหัสการสั่งซื้อ : <small><?php echo $key->txn_id; ?></small></strong>
                        <small  class="date-small hidden-xs"><?php echo date("d M Y H:i", strtotime($key->payment_date)); ?> น.</small>

                        <?php if ($key->payment_status == "1") { ?>
                            <strong class="hidden-xs" style="margin:0px 20px 0px 0px; float: right; top: -9px; color: red;" ><i class="icon-"> </i> Pending </strong>
                            <button  style="margin:0px 30px 0px 0px; float: right; top: -9px;" onClick="window.location.href = '<?php echo base_url("my_customer/payment_confirm?txt_id=$key->txn_id"); ?>';" style="margin: 15px " class="btn bg-gray hvr-shutter-out-horizontal hidden-xs" type="button"><i class="icon-ok-circled"> </i> ยืนยันการชำระ </button>
                        <?php } else if ($key->payment_status == "2") { ?>
                            <strong class="hidden-xs" style="margin:0px 20px 0px 0px; float: right; top: -9px; color: #f36f21;" ><i class="icon-"> </i> Verify </strong>
                        <?php } else if ($key->payment_status == "0") { ?>
                            <strong class="hidden-xs" style="margin:0px 20px 0px 0px; float: right; top: -9px; color: #04bd00;" ><i class="icon-"> </i> Complete </strong>
                        <?php } else { ?>
                            <strong class="hidden-xs" style="margin:0px 20px 0px 0px; float: right; top: -9px; color: red;" ><i class="icon-"> </i> Failed (ติดต่อผู้ดูแลระบบ) </strong>
                        <?php } ?>

                    </div>
                </h4>
            </div>
            <div id = "collapse<?php echo $a; ?>" class = "panel-collapse collapse" role = "tabpanel" aria-labelledby = "heading<?php echo $a; ?>">
                <ol>
                    <?php
                    foreach ($paymet_detail[$a] as $rs => $value) {
                        $total = $value->payment_gross;
                        ?>
                        <li><h6><?php echo $value->sm_autoid; ?> - <?php echo $value->sm_productname; ?> - ราคา <strong style=""><?php echo $value->ss_price; ?></strong> บาท </h6></li>
                    <?php } ?>
                </ol>
                <ul class="list-group">
                    <li class="list-group-item" style="padding: 25px 20px 25px 20px;"><h6 style="margin: 0px; padding: 0px;"><strong style="float:right; margin-right: 20px; padding: 0px;">ราคา <?php echo $total; ?> บาท</strong></h6></li>
                </ul>
                <?php if ($key->payment_status == "1") { ?>
                    <ul class="list-group visible-xs">
                        <li class="list-group-item ">
                            <strong style="color: red;" ><i class="icon-"> </i> Pending </strong>
                            <button style="margin:0px 30px 0px 0px; float: right; top: -7px;" onClick="window.location.href = '<?php echo base_url("my_customer/payment_confirm?txt_id=$key->txn_id"); ?>';" style="margin: 15px " class="btn bg-gray hvr-shutter-out-horizontal " type="button"><i class="icon-ok-circled"> </i> ยืนยันการชำระ </button>
                        </li>
                    </ul>
                <?php } else if ($key->payment_status == "2") { ?>
                    <ul class="list-group visible-xs">
                        <li class="list-group-item">
                            <strong style="color: #f36f21;" ><i class="icon-"> </i> Verify </strong>
                        </li>
                    </ul>
                <?php } else if ($key->payment_status == "0") { ?>
                    <ul class="list-group visible-xs">
                        <li class="list-group-item">
                            <strong style="color: #04bd00;" ><i class="icon-"> </i> Complete </strong>
                        </li>
                    </ul>

                <?php } else { ?>
                    <ul class="list-group visible-xs">
                        <li class="list-group-item">
                            <strong style="color: red;" ><i class="icon-"> </i> Failed (ติดต่อผู้ดูแลระบบ) </strong>
                        </li>
                    </ul>
                <?php } ?>

            </div>
            <?php
            $a++;
        }
    }
    ?>
</div>
