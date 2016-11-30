<?php $this->load->view("bootstrap_and_js.php"); ?>
<?php $i=1; foreach ($rpo_od as  $value) {
$emp_name=$value->emp_fristname;
    }?>
<center><h4 style="margin-top: 50px">ใบสั่งซื้อสินค้า</h4></center>
<center><h4>บริษัท คลังสินค้า จำกัด</h4></center>

<label >วันที่พิมพ์ :</label>&nbsp<?=date("d-m-y H:i:s");?><br>
<label >เลขที่ใบสั่งซื้อ :</label>&nbsp<?=$value->rpo_autoid?><br>
<label >ผู้ทำรายการ : </label>&nbsp<?=$emp_name?><br>
<label >จำนวน : </label> &nbsp<span style="color: red"><?=count($rpo_od);?></span>&nbsp <label>รายการ</label><br>

<table style="text-align: center;" class="table table-bordered table-hover" id="tab_logic">
                                                <thead>
                                                    <tr>  
                                                        <th class="text-center">ลำดับ</th>
                                                        <th class="text-center">ชื่อสินค้า</th>
                                                        <th class="text-center">หมวด</th>
                                                        <th class="text-center">ประเภท</th>

						<th class="text-center">จำนวน</th>
                        <th class="text-center">รายละเอียด</th>

                                                                                                            </tr>
                                                </thead>
                                                <tbody style="font-size: 15px;">
                                                	
<?php $i=1; foreach ($rpo_od as  $value) {
?>
                                                	<tr>
                                                		<td><?=$i?></td>
                                                		<td><?=$value->od_productname?></td>
                                                        <td><?=$value->ty_name?></td>
                                                        <td><?=$value->ct_name?></td>

                                                		<td><?=$value->od_amount?></td>
                                                       <td><p style="width: 300px; word-wrap: break-word;"><?=$value->od_detail?></p></td>

                                                	</tr>
    <?php $i++; } ?>                                           
                                                </tbody>
                                                </table>
                                                <center>                                                <?php if($value->rpo_status==0){ ?>
<button class="btn btn-success" id="get_item" data-id="<?=$value->rpo_autoid?>">รับสินค้า</button>
<div class="square" style="display: none;">
 <i class="icon-spin2  spin" ></i>
</div>
   <?php }else{ ?>
<label>รับสินค้าแล้ว</label>
   <?php } ?> </center>