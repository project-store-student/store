<div class="container">
<center><h4>รายละเอียดใบสั่งซื่อ</h4></center>
<label>เลขที่ใบสั่งซื้อ :<?=$rpo_od[0]->rpo_autoid?></label><br>
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
                                                		<td><?=$value->od_detail?></td>
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
</div>
   <script type="text/javascript">
       $("#get_item").click(function(){
                rpo_id =$(this).attr("data-id");
                $("#get_item").hide();
                $(".square").show();

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
   <style type="text/css">
          .spin {
    -moz-animation: spin 2s infinite linear;
    -o-animation: spin 2s infinite linear;
    -webkit-animation: spin 2s infinite linear;
    display: inline-block;
}
.icon-spin2 {
  font-size: 23px;
    text-align: center!important;
    line-height: 0;
    -webkit-transition-duration: .8s!important;
    transition-duration: .8s!important;
    -webkit-transition-property: -webkit-transform!important;
    transition-property: transform!important;
    overflow: hidden!important;
    -webkit-font-smoothing: antialiased;
}
   </style>