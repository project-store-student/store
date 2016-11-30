<?php $this->load->view("bootstrap_and_js.php"); ?>

<?php $this->load->view("view_headerproduct.php"); ?>

<div  style="width: calc(100% - 179px); margin: 75px 89.500px 75px 89.500px;">
    <h1>แก้ไข<small> ( ข้อมูลส่วนตัว ) </small></h1>
    <hr>
    <div class="row">
        <?php foreach ($detail as $key) { ?>
            <div class="col-md-12 personal-info">
                <div class="alert alert-info alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a> 
                    <i class="fa fa-coffee"></i>
                    This is an <strong>.alert</strong>. Use this to show important messages to the user.
                </div>
                <h3>ข้อมลูส่วนตัว</h3>

                <form class="form-horizontal" id="editcustomer" method="post">
                    <?php if (isset($key->c_facebook_id)) { ?>
                        <input class="form-control" type="hidden" name="c_id" id="c_id" value="<?php echo $key->c_facebook_id; ?>">
                    <?php } else { ?>
                        <input class="form-control" type="hidden" name="c_id" id="c_id" value="<?php echo $key->c_autoid; ?>">
                    <?php } ?>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">ชื่อ : </label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="c_name" id="c_name" value="<?php echo $key->c_name; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">นามสกลุ : </label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="c_lastname" id="c_lastname" value="<?php echo $key->c_lastname; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">อีเมล : </label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="email_customer" id="email_customer" value="<?php echo $key->c_email; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label"> เพศ : </label>
                        <div class="col-lg-8">
                            <?php if ($key->c_gender == 1) { ?>
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default active">
                                        <input type="radio" name="gender" value="1"  checked="checked"/> ชาย
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="gender" value="2" /> หญิง
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="gender" value="3" /> อื่นๆ
                                    </label>
                                </div>
                            <?php } else if ($key->c_gender == 2) { ?>
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default">
                                        <input type="radio" name="gender" value="1"  /> ชาย
                                    </label>
                                    <label class="btn btn-default active">
                                        <input type="radio" name="gender" value="2"  checked="checked"/> หญิง
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="gender" value="3" /> อื่นๆ
                                    </label>
                                </div>
                            <?php } else { ?>
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default">
                                        <input type="radio" name="gender" value="1" /> ชาย
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="gender" value="2" /> หญิง
                                    </label>
                                    <label class="btn btn-default active">
                                        <input type="radio" name="gender" value="3" checked="checked"/> อื่นๆ
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">ที่อยู่ : </label>
                        <div class="col-md-8">
                            <textarea  class="form-control" id="address_customer" name="address_customer"><?php echo $key->c_address; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <button  id="singlebutton" name="singlebutton" class="btn btn-primary">บันทึก</button>
                            <span></span>
                            <input type="reset" class="btn btn-default" value="ยกเลิก">
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>

    </div>
</div>
<?php $this->load->view('view_footerproduct'); ?>

<script>
    $('#editcustomer').on("submit", function () {
        $.ajax({
            url: "<?php echo base_url("my_customer/update_customer"); ?>",
            method: "POST",
            datatype: "html",
            data: $("#editcustomer").serialize(),
            cache: false,
            success: function (response) {
                if (response === "1") {
                    window.location.href = "http://store.com/product/";
                } else {
                    alert("ข้อมูลผิดพลาดการุณาทำรายการอีกครั้ง");
                    return false;
                }
            }

        });
    });
</script>

