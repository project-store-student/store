<!DOCTYPE html>
<html>
<head>
  <!-- HEADER -->
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png');?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/all.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>"> 
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.4.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url("assets/fontello/css/fontello.css"); ?>"> 
<!-- END HEADER -->
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.validate.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/colorbox/jquery.colorbox-min.js"); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url("assets/js/colorbox/example4/colorbox.css"); ?>"> 
<link rel="stylesheet" href="<?php echo base_url("assets/fontello/css/animation.css"); ?>"> 

    <title>Store</title>
</head>
<body>
        <?php $this->load->view("header") ?>
<?php
if(count($row)==0){
}else{
foreach ($row as $value) {
    $id = $value->sm_autoid;
    $image = $value->sm_image;
}

?>
<div class="content">
<div class="one-produce" style="">
<center> <h3>สินค้า</h3></center>    
    <div class="photo" style="float: left;margin-left: 100px;"><img  src="<?php echo base_url("admin/showupload/" . $image); ?>_fontpage_slide.jpg">
    </div>
    <div class="detail" style="margin-left: 460px;">
            <label>ชื่อ :</label><span><?=$row[0]->sm_productname?></span><br>
            <label>ประเภท :</label><span><?=$row[0]->ct_name?></span><br>
            <label>หมวดหมู่ :</label><span><?=$row[0]->ty_name?></span><br>
            <label>รายละเอียด :</label><p style="word-wrap: break-word;font-size: 12px"><?=$row[0]->sm_productdetail?></p><br>
            <label>คงเหลือ :</label><span><?=$row[0]->sm_amount?></span><br>
            <label>สถานะ :</label><span><?php  if($value->sm_sale==0){ echo "ไม่ได้ขาย";}else{echo "ขาย";}  ?></span><br>

            <?php  if($value->sm_sale==0){ ?>
             <?php }else{ ?>
             <label>ราคา :</label><span><?=$row[0]->ss_price?>/<?=$row[0]->ss_unit?></span><br>
             <?php }  ?>

<div  style="float: left;">
<h5><label>สินค้า</label></h5>
<button class="edit_product" href="<?php echo base_url("admin/edit_row_sm?ty_id=$value->sm_typeid&id=$value->sm_autoid"); ?>">แก้ไข</button>
<button  onclick="deleterow(<?=$value->sm_autoid?>)">ลบ</button>
</div>
<div style="float: right;margin-right: 200px;">
<h5><label>การขาย</label></h5>
<?php  if($value->sm_sale==0){  ?> 
<button class="add_sale"  href="<?php echo base_url("admin/add_product_to_sale?id=$value->sm_autoid"); ?>">ขาย</button>
<?php  }else{ ?>
<button class="edit_sale" href="<?php echo base_url("admin/edit_row_ss?id=$value->ss_autoid"); ?>">แก้ไขการขาย</button>
<button onclick="deleterowsale(<?=$value->ss_autoid?>,<?=$value->sm_autoid?>)">ลบออกจากรายการขาย</button>
<?php }  ?>
</div>
</div>
</div>
</div>

<?php }?>
</body>
</html>


<script>
$(".edit_product").click(function(){
 var url = $(this).attr("href");
        $.colorbox({
            href: url,
            opacity: 0.9,
            scrolling: true,
              fixed:true,
            closeButton:false,
        });
});



        function deleterow(id) {
    if (confirm("ลบสินค้านี้ !") == true) {
  $.ajax({
                url: "<?php echo base_url('admin/delete_row_sm')?>",
                method: "POST",
                data: "id="+id,
                success: function (response) {
                    if(response=="success"){
                    window.location.reload();
                    }else{
            alert("สินค้านี้ขายอยู่ ไม่สามารถลบได้ !");
                    }

            }
            
            });
    }
}
$(".edit_sale").click(function(){
 var url = $(this).attr("href");
        $.colorbox({
            href: url,
            width:700,
               opacity: 0.9, 
            scrolling: true,
               fixed:true,
            closeButton:false,
        });
});

   function deleterowsale(ss_autoid,sm_autoid) {
    if (confirm("ลบรายการนี้ ออกจากรายการขาย ?") == true) {

    $.ajax({
                url: "<?php echo base_url("admin/delete_row_ss"); ?>",
                method: "POST",
                 data: "ss_autoid="+ss_autoid+"&sm_autoid="+sm_autoid,
                success: function (response) {
                    if(response=='ok'){
                    window.location.reload();
                    }else{
                    }
            }
            
            });
    }
}

$(".add_sale").click(function(){
 var url = $(this).attr("href");
        $.colorbox({
            href: url,
            opacity: 0.9,
            scrolling: true,
               fixed:true,
            closeButton:false,
        });
});

</script>