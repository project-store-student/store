
    <div class="picking-product">
        <div class="header-picking">
            <center><h5>เพิ่มสินค้าลงเว็บ</h5></center>
        </div>
<hr>
        <div class="content-picking">
<form id="save-product" method="post">
    <?php
    foreach ($one_row as $rs) {
        $name = $rs->sm_productname;
        $id = $rs->sm_autoid;
        ?>

        <div class="img"  style="margin: 5px 0px">
        <center>    <img style=" border: 1px solid #ddd;"  src="<?php echo base_url("admin/showupload/" . $rs->sm_image); ?>_backpage.jpg" ></center>
        </div>
     <div style="margin: 5px;">
  
             <label for="usr">ชื่อสินค้า:</label>
        <span> <?= $name ?></span><br>
             <label for="usr">ประเภท:</label>
        <span>  <?= $rs->ty_name ?></span><br>

             <label for="usr">หมวด:</label>
      <span>    <?= $rs->ct_name ?></span><br>
             <label for="usr">จำนวนคงเหลือ:</label>
       <span>   <?= $rs->sm_amount ?></span><br>
             <div class="col-md-12">
             <div class="col-md-6">
             <label for="usr">ราคา&nbsp:</label>
            <input type="text" name="price" class="form-control" style="width: 200px" placeholder="ราคา">
</div>
             <div class="col-md-6">
            <label for="usr">หน่วย:</label>
            <input type="text" name="unit" class="form-control" style="width: 200px"  placeholder="หน่วยสินค้า"><br>
</div>
</div>

        </div>
            <input type="hidden" name="sm_autoid" value="<?= $rs->sm_autoid ?>">

        <?php } ?>
        <center><button type="submit" class="btn btn-success" id="add_to_sale">เพิ่ม</button>
<div class="square" style="display: none;">
 <i class="icon-spin2  spin" ></i>
</div>
        </center>
</form>
        </div>

    </div>
<script>
    $("#save-product").validate({
        focusInvalid: false,
        rules: {
            price: {
                required: true,
                number: true
            },
        unit: {
                required: true,
            }
        },
        messages: {
            price: {
                required: "",
                number: ""
            },
              unit: {
                required: "",
            }

        },
        submitHandler: function (form) {
            $('#add_to_sale').hide();
            $('.square').show();
            $.ajax({
                url: "<?php echo base_url("admin/save_to_sale");?>",
                method: "POST",
                data: $("#save-product").serialize(),
                success: function (response) {
                window.location.reload();
                }
            });
        }

    });

</script>
