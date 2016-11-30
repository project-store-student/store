
<script type="text/javascript" src="<?php echo base_url("assets/plupload-2.1.9/js/plupload.full.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/plupload-2.1.9/js/jquery.ui.plupload/jquery.ui.plupload.js"); ?>"></script>
<div class="update_picking" >
                <center><h4>แก้ไขสินค้า</h4></center>
    <hr>
    <div class="row">
        <!-- left column -->
        <form id="update_product" class="form-horizontal">

            <div class="col-md-4">
                <div class="text-center">
                 <div id="dropzone" style="background:#eee;height:150px;text-align: center; display: table; width: 100%; vertical-align: middle;">
                        <div id="uploader" style="position: relative; display: table-cell; vertical-align: middle;">
                            <div id="showupload">

                                  <span style="font-size:18px;"><img  src="<?php echo base_url("admin/showupload/") . $data[0]->sm_image . "_backpage.jpg"; ?>"></span>
                                    <input type="hidden" name="sm_image"  value="<?php echo $data[0]->sm_image; ?>">

                            </div>
                            <div class="clearfix">
                                <div style="margin-top:10px;width:220px; margin-bottom:10px;">
                                    <center><div id="file-uploader_new" class="btn btn-default" onclick="javascript:;" style="font-size: 12px; ">เลือกรูปภาพ</div></center>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <!-- edit form column -->
            <div class="col-md-8 personal-info" style="padding: 0;"> 
                <div class="form-group">
                    <div class="col-lg-1"></div>
                    <label class="col-lg-3 control-label">ชื่อสินค้า :</label>
                    <div class="col-lg-7">
                        <input class="form-control" type="text" name="sm_productname" value="<?php echo $data[0]->sm_productname; ?>">
                        <input class="form-control" type="hidden" name="sm_autoid" value="<?php echo $data[0]->sm_autoid; ?>" >

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-1"></div>
                    <label class="col-lg-3 control-label">หมวด:</label>
                    <div class="col-lg-7">
                           <select id="product_type" name="sm_typeid" class="form-control">
                            <?php foreach ($data_type as $key) { ?>
                    <option value="<?=$key->ty_id?>" <?=($key->ty_id == $data[0]->sm_typeid ? "selected" : ""); ?> > 
                        <?=$key->ty_name?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-1"></div>
                    <label class="col-lg-3 control-label">ประเภท:</label>
                    <div class="col-lg-7">
                           <select id="product_categorie" name="sm_categoryid" class="form-control">
                           <?php foreach ($data_category as $key) { ?>
                             <option value="<?=$key->ct_auto?>" <?=($key->ct_auto == $data[0]->sm_categoryid ? "selected" : ""); ?> > 
                        <?=$key->ct_name?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
      <div class="form-group">
                    <div class="col-lg-1"></div>
                    <label class="col-lg-3 control-label">รายละเอียด:</label>
                    <div class="col-lg-7">
                        <textarea class="form-control" id="detail" name="sm_productdetail"><?php echo $data[0]->sm_productdetail; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-1"></div>
                    <label class="col-lg-3 control-label">คงเหลือ :</label>
                    <div class="col-lg-7">
                        <input class="form-control" id="amount" name="sm_amount" type="text" value="<?php echo $data[0]->sm_amount; ?>" >
                    </div>
                </div>
            
                <div class="form-group">
                    <div class="col-lg-1"></div>
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-7">
                                 <?php echo form_hidden($csrf['name'],$csrf['hash']); ?>

                        <input type="submit" class="btn btn-default" value="บันทึก">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<hr>
<script>
    $(document).ready(function () {

        $("#product_type").on("change", function () {
            var type_id = $('#product_type :selected').val();

            $.ajax({
                url: "<?php echo base_url("admin/type_category"); ?>",
                method: "POST",
                datatype: "html",
                data: "type_id=" + type_id,
                success: function (response) {
                    var data = jQuery.parseJSON(response);
                    if (data == "") {
                        $('#product_categorie').prop("disabled", true);
                        $("#product_categorie").empty();
                    } else {

                        $('#product_categorie').prop("disabled", false);
                        $("#product_categorie").empty();
                        $("#product_categorie").append(data);
                    }
                }
            });
        });

       
    });

 $("#update_product").validate({
        focusInvalid: false,
        rules: {
            sm_productname: {
                required: true
            },
            sm_amount: {
                required: true,
                number:true
            },
        },
        messages: {
        sm_productname: {
                required: ""
            },
               sm_amount: {
                required: "",
                number:""

            },
         
        },
        submitHandler: function (form) {
            $.ajax({
                url: "<?php echo base_url("admin/update_product"); ?>",
                method: "POST",
                data: $("#update_product").serialize(),
                success: function (response) {
                     window.location.reload();   
                }
            });
        }

    });



</script>
<script>
    var csrf_test_name = $("input[name=tname]").val();
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
        multipart_params: {
            'tname' : csrf_test_name
        },
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

    uploader.init();

</script>
