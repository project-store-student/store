<div class="product-order-show">

    <div class="header-order-show">
       <?php

foreach ($sm as $rs) {

    $id = $rs->sm_autoid;
    $image = $rs->sm_image;
    $name = $rs->sm_productname;
    $cattype = $rs->ct_name;
    $type = $rs->ty_name;
    $amount = $rs->sm_amount;
    $detail = $rs->sm_productdetail;

?>

            <center><h5>สั่งซื้อ</h5></center>
     
        </div>

        <div class="content-order-show">
                <center>
                <div class="img">

                    <img style=" border: 1px solid #ddd;" src="<?php echo base_url("admin/showupload/" . $image); ?>_backpage.jpg" >
                </div>
                </center>
                <div class="text">
                   
            <label>ชื่อ : </label><span><?= $name ?></span><br>
            <label>ประเภท : </label><span><?= $cattype ?></span><br>
            <label>หมวดหมู่ : </label><span><?= $type ?></span><br>
            <label>คงเหลือ : </label><span><?= $amount ?></span><br>
            <label>รายละเอียด : </label><span><?= $detail ?></span><br>

                </div>
            <form id="save-order" method="post">

                <div class="button">
                   <label>จำนวน :</label>

                    <input type="text" name="amount" class="amount" placeholder="จำนวนสั่งซื่อ"><br>
                    <input type="hidden" name="emp_autoid" value="<?= $_SESSION['sessemp']['id'] ?>">
                    <input type="hidden" name="sm_autoid" value="<?= $rs->sm_autoid ?>">
                    <input type="hidden" name="name" value="<?= $rs->sm_productname ?>">
                    <input type="hidden" name="img" value="<?= $rs->sm_image?>">
                    <input type="hidden" name="product_type" value="<?= $rs->sm_typeid?>">
                    <input type="hidden" name="product_categorie" value="<?= $rs->sm_categoryid?>">
                    <input type="hidden" name="mtr_product_status" value="1">
                    <input type="hidden" name="detail" value="<?=$detail?>">


               <?php } ?>
            </div>
              <center><button  type="submit" class="btn btn-default" id="save">บันทึกใบสั่งซื้อ</button></center>
        </form>

            </div>

    </div>

<script>
    $("#save-order").validate({
        focusInvalid: false,
        rules: {   
            amount: {
                required: true,
                number: true
            },
        },
        messages: {        
            amount: {
                required: "กรุณากรอกจำนวน",
                number: "กรุณากรอกจำนวนเป็นตัวเลข"
            },
        },
        submitHandler: function (form) {
            $.ajax({
                url: "add_order",
                method: "POST",
                data: $("#save-order").serialize(),
                success: function (response) {
                    var Data = JSON.parse(response);

                    if(Data==""){
                      alert("ทำรายการไม่สำเร็จ");
                    }else{
                     $(".amount").val('');
                     $(".amount").val('');
                     $(".count-order").empty().append(Data.row);
                     $(".count-order").attr("data-id",Data.row);
                    $.each( Data.one, function( key, value ) {
                    $(".order-detail-ul").append("<li class='order-detail-li'>"+value.od_productname+"<i class='i-amount' style='color: red'>"+value.od_amount+"</i></li>");
                     });                    
}
            }
            });
        }

    });
</script>
<style type="text/css">
.amount{border: 1px solid #ddd;border-radius: 3px;padding: 5px;margin: 5px}
label{font-size: 12px;}
input{font-size: 12px;}
span{font-size: 12px;}
</style>