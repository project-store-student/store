
<?php
$day=date("d-m-Y");
?>

<center><h4>สร้างใบสั่งซื้อ</h4></center>
<p>
เลขที่ใบสั่งซื้อ&nbsp<span><?=$row_rpo;?></span><br>
จำนวนรายการ&nbsp<span class="b_amount" style="color: red"><?=$row['row'];?></span>&nbspรายการ<span style="float: right;">วันที่&nbsp<?=$day?></span><br>
</p>
<table style="text-align: center;" class="table table-bordered table-hover" id="tab_logic">
                                                <thead>
                                                    <tr>  
                                                        <th class="text-center">ลำดับ</th>
                                                        <th class="text-center">ชื่อ</th>
                                                        <th class="text-center">จำนวน</th>
						<th class="text-center">จัดการ</th>
                                                                                                            </tr>
                                                </thead>
                                                <tbody style="font-size: 15px;">
                                                

<?php $i=1;
foreach ($od as $value) { ?>
<tr class="row<?=$value->od_autoid?>">
<td><?=$i?></td>
<td><?=$value->od_productname?></td>
<td><?=$value->od_amount?></td>
<td>
<button><i class="icon-trash-empty"  onclick="deleterow(<?=$value->od_autoid?>)"></i></button>
</td>
</tr>

<?php $i++; } ?>
</tbody>
                                                </table>
<center><button  class="btn btn-success" data-id="<?=$row_rpo;?>"  id='add_od'>บันทึก</button>
<div class="square" style="display: none;">
 <i class="icon-spin2  spin" ></i>
</div></center>

<script type="text/javascript">
	   $("#add_od").click(function(){
        var row_rpo=$(this).attr("data-id");
        var b_amount =$(".b_amount").html();
        if(b_amount==0){
alert("ไม่มีรายการ");
        }else{ 
         $.ajax({
                url: "add_rpo_od",
                method: "POST",
                data: "id="+row_rpo,
                success: function (response) {
                	window.location.reload();
                }
            
            });
         }
    });

      

function deleterow(id) {
    if (confirm("ลบรายการนี้ !") == true) {
                $(".row"+id).slideUp("slow");
  $.ajax({
                url: "delete_row_od",
                method: "POST",
                data: "id="+id,
                success: function (response) {
                 var Data = JSON.parse(response);
                    if(Data==""){
                      alert("ทำรายการไม่สำเร็จ");
                    }else{
                      $(".order-detail-li").remove();
                     $(".count-order").empty().append(Data.row);
                     $(".count-order").attr("data-id",Data.row);
                     $(".b_amount").empty().append(Data.row);
                    $.each( Data.od, function( key, value ) {
                    $(".order-detail-ul").append("<li class='order-detail-li'>"+value.od_productname+"<i class='i-amount' style='color: red'>"+value.od_amount+"</i></li>");
                     });                    
}
            }
            
            });
    }
}

$("#add_od").click(function(){
     $('#add_od').hide();
            $('.square').show();
});
</script>
