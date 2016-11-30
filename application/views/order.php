<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/css-order.css"); ?>">
<?php $this->load->view("header"); ?>
<div class="content">

<div class="order-content">
<center><h2>สั่งซื้อสินค้า</h2></center>
<ul class="order-show">
<li class="order-total">
<h5 class="h">จำนวนรายการสั่งซื้อ&nbsp:&nbsp<span class="count-order" data-id="<?=$rows=$row['row'];?>"><?=$rows=$row['row'];?></span></h4>
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

</ul>


<div class="ty">
<h5>หมวด</h5>

<?php if(count($ty)==0){ ?>
<center><h3>ไม่มีรายการ</h3></center>
<?php }else{ foreach ($ty as $value){?>
	<button class="select-ty" data-id="<?= $value->ty_id; ?>" ><?= $value->ty_name; ?></button>

<?php } }?>

</div>
<hr>
<div class="ct"></div>


<div class="sm"></div>
</div>

</div>
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
        $that.addClass('active').css("font", "10pt blod");
        $that.addClass('active').css("color", "blue");

    });


       $(".order-detail-btn").on('click', function () {
        var url = $(this).attr("href");
        var row_od=$(".count-order").attr("data-id");

            if(row_od==0){
                alert("กรุณาเลือกสินค้า")
            }else{
        $.colorbox({
            href: url,
            opacity: 0.5,
            scrolling: true,
        });
}
    });


          $("#add_new_order").on('click', function () {
        var url = $(this).attr("href");
        $.colorbox({
            href: url,
            opacity: 0.5,
            scrolling: true,
        });
    });


</script>

