        <?php $this->load->view("header") ?>
<div class="content">
     <div class="all-report" style="padding: 0px 20px">
<center><h2>รายงานทั้งหมด</h2></center>
<table class="table table-bordered table-hover" id="tab_logic">
                                                <thead >
                                                    <tr>  
                                                        <th class="text-center">ลำดับ</th>
                                                        <th class="text-center">ชื่อรายงาน</th>
                                                        <th class="text-center">จำนวน/รายการ</th>
                                                     

                                                                                                            </tr>
                                                </thead>
                                                <tbody >



<tr class="">
<td>1</td>
<td><a  href = "<?php echo base_url("admin/report_order"); ?>">สั่งซื้อสินค้า</a></td>
<td><?=$rpo?></td>
</tr>
<tr class="">
<td>2</td>
<td>     <a  href = "<?php echo base_url("admin/approval/1"); ?>">เพิ่มสินค้ายังไม่อนุมัติ</a></td>
<td><?=$mtr?></td>
</tr>
<tr class="">
<td>3</td>
<td>     <a  href = "<?php echo base_url("admin/approval/3"); ?>">เบิกสินค้ายังไม่อนุมัติ</a></td>
<td><?=$rp?></td>
</tr>
<tr class="">
<td>4</td>
<td>     <a  href = "<?php echo base_url("admin/approval/2"); ?>">เพิ่มสินค้าอนุมัติแล้ว</a></td>
<td><?=$mtr_app?></td>
</tr>
<tr class="">
<td>5</td>
<td>     <a  href = "<?php echo base_url("admin/approval/4"); ?>">เบิกสินค้าอนุมัติแล้ว</a></td>
<td><?=$rp_app?></td>
</tr>

<tr class="">
<td>6</td>
<td>     <a  href = "<?php echo base_url("admin/report_store_sale"); ?>">สินค้าขาย</a></td>
<td><?=$ss?></td>
</tr>
</tbody>

</table>

    </div>
</div>
<style type="text/css">
    .all-report table{text-align: center;width: 100%;background-color: #fff;border: none;}
tbody{color: #777;}
.all-report table tr th{
   text-align: center;
    padding-top: 20px;
    padding-bottom: 20px;
    background: #fff;
    font-size: 20px;
        border-bottom: 1px solid rgba(51, 51, 51, 0.07);
        border-right: none;
        border-left: none;
        color: #898989;
}

.all-report table tr td{
    font: 18px Helvetica;
    height: 25px;
    border: 1px solid;
        border-color: transparent;
    border-radius: 3px;
    padding: 5px 10px;
}
</style>