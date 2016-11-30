<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.validate.min.js"); ?>"></script>

<div style="margin: 10px 10px;">
<center><h4>สินค้า</h4></center>
<?php foreach ($row as $value) { ?>
<form id="data">
<label>รหัส :</label><?=$value->sm_autoid?><br>
<label>ชื่อ :</label><?=$value->sm_productname?><br>
<label>ประเภท :</label><?=$value->ct_name?><br>
<label>หมวด :</label><?=$value->ty_name?><br>
<label>รายละเอียด :</label><p ><?=$value->sm_productdetail?></p><br>
<div class="col-md-12">
<div class="col-md-6">
<label>ราคา :</label>
<input type="text" name="ss_price" value="<?=$value->ss_price?>" class="form-control">
</div>
<div class="col-md-6">
<label>หน่วย :</label>
<input type="text" name="ss_unit" value="<?=$value->ss_unit?>" class="form-control">
</div>
</div>

<input type="hidden" name="ss_autoid" value="<?=$value->ss_autoid?>"><br>
<center><button class="btn btn-success" id="edit_product" style="margin-top: 20px;">แก้ไข</button> <div class="square" style="display: none;margin-top: 20px;" >
 <i class="icon-spin2  spin" ></i>
</div></center>
</form>
<?php } ?>
</div>
<script>
    $("#data").validate({
        focusInvalid: false,
        rules: {
            ss_price: {
                required: true,
                number: true
            },
        ss_unit: {
                required: true,
            }
        },
        messages: {
            ss_price: {
                required: "",
                number: ""
            },
              ss_unit: {
                required: "",
            }

        },
        submitHandler: function (form) {
            $('.square').show();
            $('#edit_product').hide();
            $.ajax({
                url: "<?php echo base_url("admin/update_store_sale");?>",
                method: "POST",
                data: $("#data").serialize(),
                success: function () {
                      window.location.reload();
                }
            });
        }

    });

</script>



