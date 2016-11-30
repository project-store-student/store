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
<label>ราคา :</label><br>
<input type="text" name="ss_price" value="<?=$value->ss_price?>" class="form-control"><br>
<label>หน่วย :</label><br>
<input type="text" name="ss_unit" value="<?=$value->ss_unit?>" class="form-control"><br>
<input type="hidden" name="ss_autoid" value="<?=$value->ss_autoid?>"><br>
<center><button class="btn btn-defualt" id="save">แก้ไข</button></center>
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
            $.ajax({
                url: "<?php echo base_url("admin/update_store_sale");?>",
                method: "POST",
                data: $("#data").serialize(),
                success: function () {
                	alert("แก้ไขข้อมูลแล้ว");
                      window.location.reload();
                }
            });
        }

    });

</script>



