
<?php
if(count($row)==0){
}else{
foreach ($row as $value) {
    $id = $value->sm_autoid;
    $image = $value->sm_image;
}

?>
<div class="one-produce" style="padding: 100px 50px">
    <div class="photo" style="float: left; margin-left:100px;"><img style=" border: 1px solid #ddd;" src="<?php echo base_url("admin/showupload/" . $image); ?>_fontpage_slide.jpg">
    </div>
 
    <div class="detail" style="display: inline-block;width: 300px; margin-left: 20px;">
<center> <h5>สินค้า</h5></center>       
            <label>ชื่อ :</label><span><?=$row[0]->sm_productname?></span><br>
            <label>ประเภท :</label><span><?=$row[0]->ct_name?></span><br>
            <label>หมวดหมู่ :</label><span><?=$row[0]->ty_name?></span><br>
            <label>รายละเอียด :</label><p style="word-wrap: break-word;"><?=$row[0]->sm_productdetail?></p><br>
            <label>คงเหลือ :</label><span><?=$row[0]->sm_amount?></span><br>
            <label>สถานะ :</label><span><?php  if($value->sm_sale==0){ echo "ไม่ได้ขาย";}else{echo "ขาย";}  ?></span><br>
        <button  id="btn-cancel" >ยกเลิก</button>
    </div>   
</div>
<?php }?>

<script>
    $("#btn-cancel").on('click',function(){
                    window.location.reload();
            });
</script>
<style type="text/css">
p{font-size: 12px;}
</style>
