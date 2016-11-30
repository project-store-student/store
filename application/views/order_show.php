
<center><h4>รายละเอียดใบสั่งซื่อ</h4></center>
<label >จำนวน :&nbsp<span style="color: red"><?=count($rpo_od);?></span>&nbsp รายการ</label>
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
<button class="get_item" data-id="<?=$value->rpo_autoid?>">รับสินค้า</button>

   <?php }else{ ?>
<label>รับสินค้าแล้ว</label>
   <?php } ?> </center>

   <script type="text/javascript">
       $(".get_item").click(function(){
                rpo_id =$(this).attr("data-id");
   $.ajax({
                url: "<?php echo base_url("admin/add_materials"); ?>",
                method: "POST",
                data: "rpo_id=" + rpo_id,
                success: function (response) {
              if(response=='success'){
                window.location.reload();
              }else{
                alert("false");
              }
                }
            });


       });
   </script>