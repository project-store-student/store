

<?php
if(count($row)==0){
}else{
foreach ($row as $value) {
    $id = $value->sm_autoid;
    $image = $value->sm_image;
    $name = $value->sm_productname;
    $cattype = $value->ct_name;
    $type = $value->ty_name;
    $detail = $value->sm_productdetail;
    $amount = $value->sm_amount;
}

?>
<div class="one-produce" style="padding: 100px 50px">
    <div class="photo" style="float: left; margin-left:100px;"><img style=" border: 1px solid #ddd;" src="<?php echo base_url("admin/showupload/" . $image); ?>_fontpage_slide.jpg">
    </div>
 
    <div class="detail" style="display: inline-block;width: 300px; margin-left: 20px;">
<center> <h5>สินค้า</h5></center>       
            <label>ชื่อ :</label><span><?= $name ?></span><br>
            <label>ประเภท :</label><span><?= $cattype ?></span><br>
            <label>หมวดหมู่ :</label><span><?= $type ?></span><br>
            <label>รายละเอียด :</label><p style="word-wrap: break-word;"><?= $detail ?></p><br>
            <label>คงเหลือ :</label><span><?= $amount ?></span><br>
        <button  class="btn-lg btn primary" id="btn-cancel" >ยกเลิก</button>
    </div>   
</div>
<?php }?>

<script>
    $("#btn-cancel").on('click',function(){
         $.ajax({
                url: "<?php echo base_url("admin/cancel_product"); ?>",
                success: function (redata) {
                    $(".content").empty().append(redata);
                    
                }
            });
    });

    $("#picking").on('click', function () {
        var url = $(this).attr("href");
        $.colorbox({
            href: url,
            opacity: 0.5,
            scrolling: false,
        });
    });
        $("#add").on('click', function () {
        var url = $(this).attr("href");
        $.colorbox({
            href: url,
            opacity: 0.5,
            scrolling: false,
        });
    });

</script>
<style type="text/css">
#picking{background-color: #ddd;color: #000;border: 1px solid #dddddd;font-size: 14px;padding: 4px 0px;width: 20%;margin:1px 0px }
#picking:hover{color: #fff;background-color: #286090;border-color: #204d74;}
#add{background-color: #ddd;color: #000;border: 1px solid #dddddd;font-size: 14px;padding: 4px 0px;width:20%;margin:1px 0px }
#add:hover{color: #fff;background-color: #286090;border-color: #204d74;}

#btn-cancel{background-color: #ddd;color: #000;border: 1px solid #dddddd;font-size: 14px;padding: 4px 0px;width: 20%;margin:1px 0px }
#btn-cancel:hover{color: #fff;background-color: #286090;border-color: #204d74;}
label{font-size: 12px;}
span{font-size: 12px;}
p{font-size: 12px;}
</style>
