<!--<form method="post" id="frmupdate">
    <center><label><h3>เพิ่มจำนวนสินค้า</h3></label><input type="text" name="amount" id="amount"/>
    </center>
    <input type="hidden" name="id_emp" id="id_emp" value="<?php //echo $id_emp;                                                                                                                       ?>" />
    <input type="hidden" name="id_pro" id="id_pro" value="<?php //echo $id_pro;                                                                                                                       ?>" />
</form>-->
<script type="text/javascript" src="<?php echo base_url("assets/plupload-2.1.9/js/plupload.full.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/plupload-2.1.9/js/jquery.ui.plupload/jquery.ui.plupload.js"); ?>"></script>


<script>

    Date.prototype.toDateInputValue = (function () {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0, 10);
    });

    $('#date').val(new Date().toDateInputValue());

    jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != 'error');
    }, "");
    $("#frm-editer-date").validate({
        focusInvalid: false,
        rules: {
            product_id: {
                required: true
            },
            product_name: {
                required: true
            },
            product_type: {
                selectcheck: true
            },
            available_quantity: {
                required: true,
                number: true
            },
            product_description: {
                required: true
            },
            filebutton: {
                required: true
            },
            approuved_by: {
                required: true
            },
        },
        messages: {
            product_id: {
                required: ""
            },
            product_name: {
                required: ""
            },
            product_type: {
                required: "",
            },
            available_quantity: {
                required: "",
                number: ""
            },
            product_description: {
                required: ""
            },
            filebutton: {
                required: ""
            },
            approuved_by: {
                required: ""
            },
        },
        submitHandler: function (form) {
            $.ajax({
                url: "update_amount",
                method: "post",
                datatype: "html",
                data: $("#frm-editer-date").serialize(),
                success: function (response) {
                    //alert(response);
                }
            });
        }

    });

</script>


<div class="update_amount" style="width: 850px;padding: 20px 20px">
    <form id="frm-editer-date" class="form-horizontal" role="form">
        <div class="row">
            <div class="col-md-8">
                <h5>แก้ไขสินค้า</h5>
            </div>
            <div class="col-md-4 ">
                <div class="form-group"><br>
                    <label class="col-lg-3 control-label" for="product_id">วันที่:</label>  
                    <div class="col-lg-9">
                        <input type="text" name="date" id="date" value="<?= $data_date; ?>"  class="form-control input-md"  disabled>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <!-- left column -->
            <?php foreach ($data as $key) { ?>

                <div class="col-md-3">

                    <div class="text-center">
                        <div id="dropzone" style="background:#F7F7F7;height:150px; text-align: center; display: table; width: 100%; vertical-align: middle;">
                            <div id="uploader" style="position: relative; display: table-cell; vertical-align: middle; width:200px;">
                                <?php $imgname = $key->mtr_image; ?>
                                <div id="showupload" >
                                    <div style="margin-bottom:25px;color:#CCCCCC;">
                                        <span style="font-size:18px;"><img  src="<?php echo base_url("admin/showupload/" . $imgname); ?>_backpage.jpg"></span>
                                        <input type="hidden" name="img"  value="<?= $imgname; ?>">

                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>

                        </div><br>

                        <div style="margin:auto;width:220px;">
                            <div id="file-uploader_new" class="btn btn-default" style="margin:auto;" onclick="javascript:;">
                                เลือกรูปภาพ
                            </div>
                        </div>

                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <?php $status_chk = $key->mtr_product_status; ?>
                    <input type = "hidden" name = "chk_status" id="chk_status" value = "<?= $status_chk; ?>">
                    <?php if ($key->mtr_product_status != 0) {
                        ?> 
                        <div class="form-group">
                            <label class="col-lg-3 control-label">รหัสสินค้า:</label>
                            <div class="col-lg-8">
                                <input id="product_id" name="product_id" value="<?= $key->sm_autoid; ?>" class="form-control input-md"  type="text" disabled>
                                <input type="hidden" name="idproduct" value="<?= $key->sm_autoid; ?>">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">ชื่อ:</label>
                            <div class="col-lg-8">
                                <input id="product_name" name="product_name" value="<?= $key->mtr_productname; ?>" class="form-control input-md"  type="text" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">หมวดหมู่:</label>
                            <div class="col-lg-8">
                                <select id="product_type" name="product_type" class="form-control" disabled>
                                    <option value="error">เลือกหมวด</option>
                                    <?php
                                    foreach ($data_type as $rs) {
                                        if ($rs->ty_id == $key->ty_id) {
                                            ?>
                                            <option value="<?php echo $rs->ty_id; ?>" selected><?php echo $rs->ty_name; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $rs->ty_id; ?>"><?php echo $rs->ty_name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">ประเภท:</label>
                            <div class="col-lg-5">
                                <input type="hidden" name="ct" id="ct" value="<?php echo $key->ct_id; ?>">

                                <select id="product_categorie" name="product_categorie" class="form-control" disabled>
                                    <option value="error_category">เลือกประเภท</option>
                                </select>
                                <!--  <button disabled type="button" name="new_categorie" id="new_categorie" class="btn btn-default"  style="width: 140;height: 34; margin-left: 10px;"></button>-->

                            </div>
                            <!--                        <a id="new_categorie" class="btn btn-default disabled" style="width: 140;height: 34; margin-left: 10px;" href = "" style="color:#6f6a5a;"></a>-->
                            <div  style="width: 133;height: 34; margin-left: 10px;" class="btn btn-default" data-toggle='popover' data-placement="top" title='' 
                                  data-content=' 
                                  NAME TYPE : 
                                  <select id="pro_type" name="pro_type" class="form-control">
                                  <?php foreach ($data_type as $rs) { ?>
                                      <option value="<?php echo $rs->ty_id; ?>"><?php echo $rs->ty_name; ?></option> 
                                  <?php } ?>
                                  </select>
                                  NEW CATEGORY : <br> 
                                  <input type="text" class="form-control input-md" name="pop_ct" id="pop_ct"><br>
                                  <center>
                                  <a id="insert_categorie" class="btn btn-primary" style="width: 150;height: 34; margin-left: 10px;" href = "#" style="color:#6f6a5a;">Save New Category</a>
                                  </center>

                                  <script>
                                  $(document).ready(function () {
                                  $("#insert_categorie").on("click", function (e) {
                                  var type_id = $("#pro_type :selected").val(); 
                                  var category_name =$("#pop_ct").val();
                                  //alert(type_id+category_name);
                                  $.ajax({
                                  url: "inset_category",
                                  method: "POST",
                                  datatype: "html",
                                  data: "product_type_id=" + type_id + "&product_category_name=" + category_name,
                                  success: function (response) {
                                  $("#product_categorie").prop("disabled", true);
                                  $("#product_categorie").empty();
                                  $("#product_categorie").append("<option >SELECT TYPE FIRST</option>");
                                  $("#product_type option[value=error]").attr("selected","selected");

                                  }
                                  });

                                  });

                                  });
                                  </script>'

                                  data-original-title='เพิ่มหมวดใหม่ที่นี้' class='test' disabled>เพิ่มประเภทใหม่</div>

                        </div>




                        <div class="form-group" >
                            <label class="col-lg-3 control-label">จำนวน:</label>
                            <div class="col-lg-8">
                                <input id="available_quantity" name="available_quantity" placeholder="AVAILABLE QUANTITY" value="<?= $key->mtr_quantity; ?>" class="form-control input-md"  type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" >รายละเอียด:</label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="product_description" name="product_description" disabled><?= $key->mtr_description; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">เพิ่มโดย:</label>
                            <div class="col-md-8">
                                <input id="approuved_by" name="approuved_by" placeholder="APPROUVED BY" class="form-control input-md" required="" type="text" value="<?php echo $_SESSION['sessemp']['name']; ?>" disabled>
                                <input type="hidden" name="iduser" value="<?php echo $_SESSION['sessemp']['id']; ?>">
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">รหัสสินค้า:</label>
                            <div class="col-lg-8">
                                <input id="product_id" name="product_id" placeholder="PRODUCT ID" value="<?= $key->sm_id; ?>" class="form-control input-md"  type="text" disabled>
                                <input type="hidden" name="idproduct" value="<?= $key->sm_autoid; ?>">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">ชื่อ:</label>
                            <div class="col-lg-8">
                                <input id="product_name" name="product_name" placeholder="PRODUCT NAME" value="<?= $key->mtr_productname; ?>" class="form-control input-md"  type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">หมวดหมู่:</label>
                            <div class="col-lg-8">
                                <select id="product_type" name="product_type" class="form-control">
                                    <option value="error">เลือกหมวดหมู่</option>
                                    <?php
                                    foreach ($data_type as $rs) {
                                        if ($rs->ty_id == $key->ty_id) {
                                            ?>
                                            <option value="<?php echo $rs->ty_id; ?>" selected><?php echo $rs->ty_name; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $rs->ty_id; ?>"><?php echo $rs->ty_name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">ประเภท:</label>
                            <div class="col-lg-5" >
                                <input type="hidden" name="ct" id="ct" value="<?php echo $key->ct_id; ?>">

                                <select id="product_categorie" name="product_categorie" class="form-control" disabled>
                                    <option value="error_category">เลือกประเภท</option>
                                </select>
                                <!--  <button disabled type="button" name="new_categorie" id="new_categorie" class="btn btn-default"  style="width: 140;height: 34; margin-left: 10px;"></button>-->

                            </div>
                            <!--                        <a id="new_categorie" class="btn btn-default disabled" style="width: 140;height: 34; margin-left: 10px;" href = "" style="color:#6f6a5a;"></a>-->
                            <div style="width: 133;height: 34; margin-left: 10px;" class="btn btn-default" data-toggle='popover' data-placement="top" title='' 
                                 data-content=' 
                                 NAME TYPE : 
                                 <select id="pro_type" name="pro_type" class="form-control">
                                 <?php foreach ($data_type as $rs) { ?>
                                     <option value="<?php echo $rs->ty_id; ?>"><?php echo $rs->ty_name; ?></option> 
                                 <?php } ?>
                                 </select>
                                 NEW CATEGORY : <br> 
                                 <input type="text" class="form-control input-md" name="pop_ct" id="pop_ct"><br>
                                 <center>
                                 <a id="insert_categorie" class="btn btn-primary" style="width: 150;height: 34; margin-left: 10px;" href = "#" style="color:#6f6a5a;">Save New Category</a>
                                 </center>

                                 <script>
                                 $(document).ready(function () {
                                 $("#insert_categorie").on("click", function (e) {
                                 var type_id = $("#pro_type :selected").val(); 
                                 var category_name =$("#pop_ct").val();
                                 //alert(type_id+category_name);
                                 $.ajax({
                                 url: "inset_category",
                                 method: "POST",
                                 datatype: "html",
                                 data: "product_type_id=" + type_id + "&product_category_name=" + category_name,
                                 success: function (response) {
                                 $("#product_categorie").prop("disabled", true);
                                 $("#product_categorie").empty();
                                 $("#product_categorie").append("<option >SELECT TYPE FIRST</option>");
                                 $("#product_type option[value=error]").attr("selected","selected");

                                 }
                                 });

                                 });
                                 });
                                 </script>'

                                 data-original-title='เพิ่มหมวดใหม่ที่นี้' class='test'>NEW CATEGORY</div>

                        </div>




                        <div class="form-group">
                            <label class="col-lg-3 control-label">จำนวน:</label>
                            <div class="col-lg-8">
                                <input id="available_quantity" name="available_quantity" placeholder="AVAILABLE QUANTITY" value="<?= $key->mtr_quantity; ?>" class="form-control input-md"  type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">รายละเอียด:</label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="product_description" name="product_description" ><?= $key->mtr_description; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">เพิ่มโดย:</label>
                            <div class="col-md-8">
                                <input id="approuved_by" name="approuved_by" placeholder="APPROUVED BY" class="form-control input-md" required="" type="text" value="<?php echo $_SESSION['sessemp']['name']; ?>" disabled>
                                <input type="hidden" name="iduser" value="<?php echo $_SESSION['sessemp']['id']; ?>">
                            </div>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary">บันทึก</button>
                            <!--<input type="button" class="btn btn-primary" value="Save Changes">-->
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </form>
</div>
<hr>
<script>
    $(document).ready(function () {
        $("[data-toggle=popover]").popover({html: true})
     

        $('body').on('click', function (e) {
            $('[data-toggle="popover"]').each(function () {
                if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                    $(this).popover('hide');
                }
            });
        });
        $("#product_type").on("change", function () {
            var type_id = $('#product_type :selected').val();
            var category_id = $('#ct').val();
            //alert(category_id);
            //alert(data2);
            //alert(type_id);
            $.ajax({
                url: "type_category",
                method: "POST",
                datatype: "html",
                data: "type_id=" + type_id + "&category_id=" + category_id,
                success: function (response) {
                    //                alert(response);
                    var data = jQuery.parseJSON(response);
                    //                alert(data);
                    if (data == "") {
                        $('#product_categorie').prop("disabled", true);
                        $('#new_categorie').addClass("disabled");
                        $("#product_categorie").empty();
                        $("#new_categorie").empty();
                        $("#new_categorie").append("<a class='cb1' disabled href = '' > NEW CATEGORY </a>");
                        $("#product_categorie").append("<option value='error_category'>SELECT TYPE FIRST</option>");
                    } else {

                        $('#product_categorie').prop("disabled", false);
                        $('#new_categorie').removeClass("disabled");
                        $("#product_categorie").empty();
                        $("#new_categorie").empty();
                        $("#new_categorie").attr("href", "<?php echo base_url('admin/new_category?datatype=" + type_id + "'); ?>");
                        $("#product_categorie").append(data);
                    }
                }
            });
        });
        var type_id = $('#product_type :selected').val();
        var category_id = $('#ct').val();
        var chk_status = $('#chk_status').val();
        //alert(category_id);
        //alert(data2);
        //alert(type_id);
        $.ajax({
            url: "type_category",
            method: "POST",
            datatype: "html",
            data: "type_id=" + type_id + "&category_id=" + category_id,
            success: function (response) {
                //                alert(response);
                var data = jQuery.parseJSON(response);
                //                alert(data);
                if (data == "") {

                    $('#new_categorie').addClass("disabled");
                    $("#product_categorie").empty();
                    $("#new_categorie").empty();
                    $("#new_categorie").append("<a class='cb1' disabled href = '' > NEW CATEGORY </a>");
                    $("#product_categorie").append("<option value='error_category'>SELECT TYPE FIRST</option>");
                } else {
                    if (chk_status == 0) {
                        $('#product_categorie').prop("disabled", false);
                    } else {
                        $('#product_categorie').prop("disabled", true);
                    }
                    $('#new_categorie').removeClass("disabled");
                    $("#product_categorie").empty();
                    $("#new_categorie").empty();
                    $("#new_categorie").attr("href", "<?php echo base_url('admin/new_category?datatype=" + type_id + "'); ?>");
                    $("#product_categorie").append(data);
                }
            }
        });
    });</script>
<script>
    var fileSizeTotal_progress = 0;
    var uploader = new plupload.Uploader({
        runtimes: 'html5,flash,silverlight,html4',
        browse_button: 'file-uploader_new',
        container: document.getElementById('uploader'),
        url: '<?php echo base_url("admin/save_img"); ?>',
        flash_swf_url: '<?php echo base_url("assets/plupload-2.1.9/js/Moxie.swf"); ?>',
        silverlight_xap_url: '<?php echo base_url("assets/plupload-2.1.9/js/Moxie.xap"); ?>',
        dragdrop: true,
        drop_element: "dropzone",
        filters: {
            max_file_size: '500mb',
            mime_types: [
                {title: "Image files", extensions: "jpg,gif,png"},
            ]
        },
        init: {
            FilesAdded: function (up, files) {

                plupload.each(files, function (file) {
                    var file_type = file.type;
                    //console.log(file_type);
                    var progressDetail = '';
                    if (file.size > 1024 * 1024) {
                        fileSizeTotal = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toFixed(2).toString() + ' MB';
                    } else {
                        fileSizeTotal = (Math.round(file.size * 100 / 1024) / 100).toFixed(2).toString() + ' KB';
                    }
                    progressDetail = '0 / ' + fileSizeTotal;
                    var img = new o.Image();
                    img.onload = function () {
                        setTimeout(function () {
                            uploader.start();
                        }, 100);
                    }
                    img.load(file.getSource());
                });
            },
            UploadProgress: function (up, file) {
                if (file.size > 1024 * 1024) {
                    fileSizeTotal_progress = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toFixed(2).toString() + ' MB';
                } else {
                    fileSizeTotal_progress = (Math.round(file.size * 100 / 1024) / 100).toFixed(2).toString() + ' KB';
                }
                if (file.loaded > 1024 * 1024) {
                    fileSizeLoaded_progress = (Math.round(file.loaded * 100 / (1024 * 1024)) / 100).toFixed(2).toString() + ' MB';
                } else {
                    fileSizeLoaded_progress = (Math.round(file.loaded * 100 / 1024) / 100).toFixed(2).toString() + ' KB';
                }
                progress = setInterval(function () {
                    console.log("progress");
                }, 10);
            },
            Error: function (up, err, file) {
                if (err.code == '-601') {


                } else {

                }
            },
            FileUploaded: function (e, file, result, form) {

                var data = $.parseJSON(result.response);
                //alert(data);
                $("#showupload").empty().append(data.view);
            },
            UploadComplete: function (up, files) {

            }
        },
    });
// Handle the case when form was submitted before uploading has finished
    uploader.init();

</script>
