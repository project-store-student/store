<!DOCTYPE html>
<html>
    <head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/css-order.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/all.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>"> 
<link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png'); ?>"/> 
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.4.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/colorbox/jquery.colorbox-min.js"); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url("assets/js/colorbox/example4/colorbox.css"); ?>"> 
 <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/dropzone.css"); ?>"/>
<script type="text/javascript" src="<?php echo base_url("assets/js/dropzone.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.validate.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/additional-methods.min.js"); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url("assets/fontello/css/animation.css"); ?>"> 
<link rel="stylesheet" href="<?php echo base_url("assets/fontello/css/fontello.css"); ?>"> 
<script type="text/javascript" src="<?php echo base_url("assets/plupload-2.1.9/js/jquery.ui.plupload/jquery.ui.plupload.js"); ?>"></script>
        <title>Store</title>

</head>
<body>

<?php $this->load->view("header"); ?>
<div class="content">
</div> 
<div class="order-content">
<center><h3>สั่งซื้อสินค้า</h3></center>
<ul class="order-show">
<div class="head-order">
<li class="order-total-right">
<h5 class="h">จำนวนรายการสั่งซื้อ&nbsp:&nbsp<span class="count-order" data-id="<?=$rows=$row['row'];?>"><?=$rows=$row['row'];?></span></h5>
<ul class="order-detail-ul">
<li class="order-detail-li-btn">
<button class="order-detail-btn"  href='<?php echo base_url("admin/build_report_order?row_rpo=" . $row_rpo['row_rpo']); ?>' >สร้างใบสั่งซื้อ</button>
</li >
<?php foreach($od as $value){ ?>
<li class="order-detail-li"><?=$value->od_productname?><i class="i-amount">&nbsp(<?=$value->od_amount?>)</i></li>
<?php } ?>	
</ul>
<li class="order-total" id="add_new_order" href = '<?php echo base_url('admin/add_product');?>'><h5 class="h">สั่งซื้อสินค้าใหม่</h5></li>
</li>
</div>
</ul>

<div class="content-order">
<div class="ty">
<h5>หมวด</h5>

<?php if(count($ty)==0){ ?>
<center><h3>ไม่มีรายการ</h3></center>
<?php }else{ foreach ($ty as $value){?>
	<button class="select-ty" data-id="<?= $value->ty_id; ?>" ><?= $value->ty_name; ?></button>

<?php } }?>

</div>
<div class="ct"></div>


<div class="sm"></div>
</div>
</div>
</body>
</html>
<script type="text/javascript">
	$(".select-ty").click(function(){
		var id=$(this).attr("data-id");
    var csrf_test_name = $("input[name=tname]").val();

  	$.ajax({
                    url: "select_ct",
                    method: "POST",
                    data: "id="+id,
                    success: function (response) {

                    	$(".sm").empty();
		$(".ct").empty().append(response);
                    }
                       });

	});

    $('.select-ty').click(function () {
        $that = $(this);
        $(".select-ty").removeClass("active");
        $(".select-ty").attr("style", "");
        $that.addClass('active').css("font-weight", "bold");

    });


       $(".order-detail-btn").on('click', function () {
        var url = $(this).attr("href");
        var row_od=$(".count-order").attr("data-id");

            if(row_od==0){
                alert("กรุณาเลือกสินค้า")
            }else{
        $.colorbox({
            href: url,
            opacity: 0.9,
            scrolling: true,
            fixed:true,
            width:1000,
        });
}
    });


          $("#add_new_order").on('click', function () {
        var url = $(this).attr("href");
        $.colorbox({
            href: url,
            opacity: 0.9,
            scrolling: true,
            fixed:true,
            closeButton:false,
            width:600,
            innerWidth:800,
        });
    });


</script>

