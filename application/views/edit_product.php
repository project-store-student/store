<script type="text/javascript" src="<?php echo base_url("assets/plupload-2.1.9/js/plupload.full.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/plupload-2.1.9/js/jquery.ui.plupload/jquery.ui.plupload.js"); ?>"></script>

<div class="update_picking" style="width: 600px">
                <center><h4>แก้ไขสินค้า</h4></center>
    <hr>
        <!-- left column -->
        <form id="update_product">

            <div class="col-md-6">
                <div class="text-center">
                 <div id="dropzone" style="background:#eee;height:150px;text-align: center; display: table; width: 100%; vertical-align: middle;">
                        <div id="uploader" style="position: relative; display: table-cell; vertical-align: middle;">
                            <div id="showupload" style="margin-top: 10px;">

                                  <span style="font-size:18px;"><img  src="<?php echo base_url("admin/showupload/") . $data[0]->sm_image . "_backpage.jpg"; ?>"></span>
                                    <input type="hidden" name="sm_image"  value="<?php echo $data[0]->sm_image; ?>">

                            </div>
                            <div class="clearfix">
                                <div style="margin-top:10px;margin-bottom:10px;">
                                   <div id="file-uploader_new" class="btn btn-default" onclick="javascript:;" style="font-size: 12px; ">เลือกรูปภาพ</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="filelist"></div>
<div id="console"></div>
            </div>
        <!-- edit form column -->
            <div class="col-md-6"> 
                    <label >ชื่อสินค้า :</label>
                        <input class="form-control" type="text" name="sm_productname" value="<?php echo $data[0]->sm_productname; ?>">
                        <input class="form-control" type="hidden" name="sm_autoid" value="<?php echo $data[0]->sm_autoid; ?>" >

                    <label>หมวด:</label>
                           <select id="product_type" name="sm_typeid" class="form-control">
                            <?php foreach ($data_type as $key) { ?>
                    <option value="<?=$key->ty_id?>" <?=($key->ty_id == $data[0]->sm_typeid ? "selected" : ""); ?> > 
                        <?=$key->ty_name?></option>
                        <?php } ?>
                        </select>
                    <label >ประเภท:</label>
                           <select id="product_categorie" name="sm_categoryid" class="form-control">
                           <?php foreach ($data_category as $key) { ?>
                             <option value="<?=$key->ct_auto?>" <?=($key->ct_auto == $data[0]->sm_categoryid ? "selected" : ""); ?> > 
                        <?=$key->ct_name?></option>
                        <?php } ?>
                        </select>
                    <label>รายละเอียด:</label>
                        <textarea class="form-control" id="detail" name="sm_productdetail"><?php echo $data[0]->sm_productdetail; ?></textarea>
                    <label>คงเหลือ :</label>
                        <input class="form-control" id="amount" name="sm_amount" type="text" value="<?php echo $data[0]->sm_amount; ?>" >
<br>
                      <center>  <input type="submit" class="btn btn-success" id="edit_product" value="บันทึก"><div class="square" style="display: none;" >
 <i class="icon-spin2  spin" ></i>
</div></center>
            </div>
        </form>
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
            $('.square').show();
            $('#edit_product').hide();
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
    var fileSizeTotal_progress = 0;
    var uploader = new plupload.Uploader({
        runtimes: 'html5,flash,silverlight,html4',
        browse_button: 'file-uploader_new',
        container: document.getElementById('uploader'),
        url: '<?php echo base_url("admin/save_img"); ?>',
      
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
                     plupload.each(files, function(file) {
                            document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                        });

                            uploader.start();
      

            },
            UploadProgress: function (up, file) {
                 document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
                        console.log((up.total.size-up.total.loaded)/up.total.bytesPerSec);
      
            },
            Error: function (up, err, file) {
          
           document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;

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
