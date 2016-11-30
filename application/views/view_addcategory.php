<?php $this->load->view("bootstrap_and_js.php"); ?>

        <?php
        foreach ($data_all as $key) {
            $id = $key->ty_id;
            $name = $key->ty_name;
        }
        ?>
            <legend>เพิ่มประเภทสินค้า</legend>   
            <div class="new_category" style="padding: 10px 10px">
                <form id="frmcategory" class="form-horizontal">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="product_type">หมวดสินค้า</label>  
                            <div class="col-md-6">
                                <input disabled="disabled" id="product_type" name="product_type" class="form-control input-md" required="" type="text" value="<?php echo $name; ?>">
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="product_category_name">ประเภทสินค้า</label>  
                            <div class="col-md-6">
                                <input id="product_category_name" name="product_category_name" placeholder="CATEGORY NAME" class="form-control input-md" required="" type="text">
                                <div id="errordiv"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label" for="singlebutton"></label>
                            <div class="col-md-3">
                                <center><input id="save" name="save" class="btn btn-primary" type="submit" value="บันทึก"></center>
                                <input id="product_type_id" name="product_type_id"  type="hidden" value="<?php echo $id; ?>">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
 
<script>
    $(document).ready(function () {
        
        
        $("#frmcategory").validate({
            focusInvalid: false,
            rules: {
                product_category_name: {
                    required: true,
                    email: false,
                    rangelength: [2, 100]
                }
            },
            errorPlacement: function (error, element) {
                error.appendTo('#errordiv');
            },
            submitHandler: function (form) {
                //alert("55555");
                $.ajax({
                    url: "<?php echo base_url("admin/inset_category");?>",
                    method: "POST",
                    datatype: "html",
                    data: $("#frmcategory").serialize(),
                    success: function (response) {
                        alert(response);
                        $("#product_category_name").val("");

    }
                });
            }

        });

    });
</script>
