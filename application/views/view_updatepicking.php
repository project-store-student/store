<?php ?>
<script type="text/javascript" src="<?php echo base_url("assets/plupload-2.1.9/js/plupload.full.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/plupload-2.1.9/js/jquery.ui.plupload/jquery.ui.plupload.js"); ?>"></script>

<div class="update_picking" style="padding: 20px 20px;width: 850px;">
    <div class="row">
        <div class="col-md-8">
                <h5>แก้ไขสินค้า</h5>
            </div>
        <div class="col-md-4 ">
            <div class="form-group"><br>
                <label class="col-lg-3 control-label" for="product_id">วันที่:</label>  
                <div class="col-lg-9">
                    <input type="text" name="date" id="date" value="<?php //echo $data_date;                                                  ?>"  class="form-control input-md"  disabled>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">

            <div class="col-md-3">
                <div class="text-center">
                    <div id="dropzone" style="background:#F7F7F7;height:150px; text-align: center; display: table; width: 100%; vertical-align: middle;">
                        <div id="uploader" style="position: relative; display: table-cell; vertical-align: middle; width:200px;">
                            <?php //$imgname = $key->mtr_image;   ?>
                            <div id="showupload" >
                                <div style="margin-bottom:25px;color:#CCCCCC;">
                                    <span style="font-size:18px;"><img  src="<?php echo base_url("admin/showupload/") . $data[0]->rp_image . "_backpage.jpg"; ?>"></span>
                                    <input type="hidden" name="img"  value="<?php echo $data[0]->rp_image; ?>">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div><br>

                </div>
            </div>
        </div>
        <!-- edit form column -->
        <form id="update-rp" class="form-horizontal">

            <div class="col-md-9 personal-info">


                <div class="form-group">
                    <label class="col-lg-3 control-label">ชื่อสินค้า :</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="<?php echo $data[0]->rp_productname; ?>" disabled="">
                        <input class="form-control" type="hidden" name="rp_id" value="<?php echo $data[0]->rp_autoid; ?>" >

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">หมวด:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="<?php echo $type_name[0]->ty_name; ?>" disabled="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">ประเภท:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="<?php echo $category_name[0]->ct_name; ?>" disabled="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">คงเหลือ :</label>
                    <div class="col-lg-8">
                        <input class="form-control" id="amount" name="amount" type="text" value="<?php echo $sup_mtr[0]->ssm_amount; ?>" disabled="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">จำนวนที่เบิก :</label>
                    <div class="col-lg-8">
                        <input class="form-control" id="num" name="num" type="text" value="<?php echo $data[0]->rp_amount; ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">เบิกโดย :</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="<?php echo $_SESSION['sessemp']['name']; ?>" disabled="">
                        <input class="form-control" type="hidden" name="id_emp" value="<?php echo $data[0]->emp_id; ?>">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-primary" value="บันทึก">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<hr>
<script>
    $(document).ready(function () {
        Date.prototype.toDateInputValue = (function () {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0, 10);
        });
        var num = $("#amount").val();

        $('#date').val(new Date().toDateInputValue());

        $("#update-rp").validate({
            focusInvalid: false,
            rules: {
                num: {
                    required: true,
                    number: true,
                    max: + num
                }
            },
            messages: {
                num: {
                    required: "",
                    number: "",
                    max: ""
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: "<?php echo base_url() . "admin/update_picking"; ?>",
                    method: "POST",
                    datatype: "html",
                    data: $("#update-rp").serialize(),
                    success: function (response) {
                        if (response == 1) {
                            window.location.href = "http://store.ori/admin/approval/3";
                        } else {
                            alert("Update Fail");
                        }
                    }
                });
            }

        });

    });
</script>
