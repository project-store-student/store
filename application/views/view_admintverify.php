<?php $this->load->view("header") ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/DataTables/media/css/jquery.dataTables.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/DataTables/extensions/Responsive/css/responsive.dataTables.css"); ?>">

<script type="text/javascript" language="javascript" src="<?php echo base_url("assets/DataTables/media/js/jquery.dataTables.js"); ?>">
</script>
<script type="text/javascript" language="javascript" src="<?php echo base_url("assets/DataTables/extensions/Responsive/js/dataTables.responsive.js"); ?>">
</script>


<div style="width: calc(100% - 179px); margin: 75px 89.500px 75px 89.500px;">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class = "panel panel-default">
                <div class = "panel-heading">
                    <h3 class = "panel-title">ตรวจสอบการชำระเงิน</h3>
                </div>
                <div class = "panel-body">
                    <table id="example" class="display responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>รหัสใบเสร็จ</th>
                                <th>บริการ</th>
                                <th>วันที่สร้างใบเสร็จ</th>
                                <th>จำนวนเงินที่ชำระ</th>
                                <th>ลูกค้า</th>
                                <th>สถานะ</th>
                                <th>ติดต่อลูกค้า</th>
                                <th>ตรวจสอบ</th>
<!--                                <th>Extn.</th>
                                <th>E-mail</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($verify as $key) {
                                if ($key->payment_status == "0") {
                                    $status = "Complete";
                                } else if ($key->payment_status == "1") {
                                    $status = "Pendding";
                                } else if ($key->payment_status == "2") {
                                    $status = "Verify";
                                } else {
                                    $status = "Not Approval";
                                }

                                if (strlen($key->txn_id) <= 16) {
                                    $service = "Bank";
                                } else {
                                    $service = "Paypal";
                                }
                                ?>
                                <tr>
                                    <td><?php echo $key->txn_id; ?></td>
                                    <td><?php echo $service; ?></td>
                                    <td><?php echo $key->payment_date; ?></td>
                                    <td><?php echo $key->payment_gross; ?></td>
                                    <td><?php echo $key->c_name . " " . $key->c_lastname; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td><?php echo $key->c_email; ?></td>
                                    <?php
                                    if (strlen($key->txn_id) <= 16) {
                                        if ($key->payment_status == "0") {
                                            ?>
                                            <td><a href="<?php echo base_url("admin/check_verify") . "?transactions=$key->txn_id&customer=$key->c_id"; ?>" target="_blank" >ตรวจสอบ</a></td>
                                        <?php } else if ($key->payment_status == "1") { ?>
                                            <td><a href="<?php echo base_url("admin/check_verify") . "?transactions=$key->txn_id&customer=$key->c_id"; ?>" target="_blank" >ตรวจสอบ</a></td>
                                        <?php } else if ($key->payment_status == "2") { ?>
                                            <td><a href="<?php echo base_url("admin/check_verify") . "?transactions=$key->txn_id&customer=$key->c_id"; ?>" target="_blank" >ตรวจสอบ</a></td>
                                        <?php } else { ?>
                                            <td><a href="<?php echo base_url("admin/check_verify") . "?transactions=$key->txn_id&customer=$key->c_id"; ?>" target="_blank" >ตรวจสอบ</a></td>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <td><a href="https://www.sandbox.paypal.com/businessexp/transactions?tab=activity&transactiontype=PAYMENTS_RECEIVED" target="_blank" >ตรวจสอบ</a></td>
                                    <?php } ?>




                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    
    });
    
</script>
