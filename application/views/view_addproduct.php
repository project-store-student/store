<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">  

<script type="text/javascript" src="<?php echo base_url("assets/plupload-2.1.9/js/plupload.full.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/plupload-2.1.9/js/jquery.ui.plupload/jquery.ui.plupload.js"); ?>"></script>

<legend><h5 style="margin-left: 30px;">สั่งสินค้าใหม่</h5></legend>  
<div class="row" style="margin: 20px 40px">
    <form class="form-horizontal" id="addproduct" method="post">
        <fieldset>
            <div class="col-md-6">
                    <div id="dropzone" style="background:#eee;height:150px;text-align: center; display: table; width: 100%; vertical-align: middle;">
                        <div id="uploader" style="position: relative; display: table-cell; vertical-align: middle;">
                            <div id="showupload" style="    margin-top: 10px;">

                                <div style="margin-bottom:25px;color:#CCCCCC;">

                                 Drop image files here to upload
                                </div>

                            </div>
                            <div class="clearfix">
                                <div style="margin-top:10px;width:220px; margin-bottom:10px;">
                                    <center><div id="file-uploader_new" class="btn btn-default" onclick="javascript:;" style="font-size: 12px; ">เลือกรูปภาพ</div></center>
                                </div>
                            </div>
                        </div>

                    </div>
<div id="filelist"></div>
<div id="console"></div>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-5">

            
                    <label class="" for="product_id">รหัสสินค้า</label>  
                    <div class="sm_autoid">
                         
                        <input   class="form-control"  id="product_id" name="sm_autoid"  type="text" value="<?=$id?>" readonly>

                    </div>
                    <label class=" control-label" for="name">ชื่อสินค้า</label>  
                    <div class="">
                        <input  id="name" name="name" placeholder="ชื่อสินค้า" class="form-control input-md"  type="text">
                    </div>
<label class=" control-label" for="product_type">หมวดสินค้า</label>
                    <div class=" product_type" >
                        <select id="product_type" name="product_type" class="form-control">
                            <option value="error">เลือกหมวด</option>
                            <?php foreach ($data_type as $key) { ?>
                                <option value="<?php echo $key->ty_id; ?>"><?php echo $key->ty_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <label class=" control-label" for="product_categorie">ประเภทสินค้า</label>
                    <div class="">
                        <select id="product_categorie" name="product_categorie" class="form-control" disabled>
                            <option value="error">เลือกประเภท</option>
                        </select>
                        </div>
                    <label class=" control-label" for="amount">จำนวนสินค้า</label>  
                    <div class="">
                        <input  id="amount" name="amount" placeholder="จำนวนสินค้า" class="form-control"  type="text">

                    </div>

                    <label class=" control-label" for="detail">รายละเอียดสินค้า</label>
                    <div class="">                     
                        <textarea class="form-control" id="detail" name="detail"></textarea>
                    </div>
                        <input type="hidden" name="emp_autoid" value="<?php echo $_SESSION['sessemp']['id']; ?>">
                        <input type="hidden" name="mtr_product_status" value="0">
                        <input type="hidden" name="sm_image" value="">

                    <label class=" control-label" for="singlebutton"></label>
                    <div class="">
                        <center><button  id="singlebutton" name="singlebutton" class="btn btn-success">เพิ่ม</button>
<div class="square" style="display: none;">
 <i class="icon-spin2  spin" ></i>
</div>
                        </center>
                </div>
            </div>
        </fieldset>
    </form>
</div>


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
                    //alert(response);
                    var data = jQuery.parseJSON(response);
                    //alert(data2);
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

    </script>

<style>
    form .error {
        color: #ff0000;
    }   
    form input.error {
        border:1px solid red;
    }
    form select.error {
        border:1px solid red;
    }
    form textarea.error {
        border:1px solid red;
    }
.form-group{font-size: 12px;}
.form-control{font-size: 12px;}

    .spin {
    -moz-animation: spin 2s infinite linear;
    -o-animation: spin 2s infinite linear;
    -webkit-animation: spin 2s infinite linear;
    display: inline-block;
}
.icon-spin2 {
  font-size: 23px;
    text-align: center!important;
    line-height: 0;
    -webkit-transition-duration: .8s!important;
    transition-duration: .8s!important;
    -webkit-transition-property: -webkit-transform!important;
    transition-property: transform!important;
    overflow: hidden!important;
    -webkit-font-smoothing: antialiased;
}
</style>
<script>

    jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != 'error');
    }, "");
    $("#addproduct").validate({
        focusInvalid: false,
        rules: {
            name: {
                required: true
            },
            product_type: {
                selectcheck: true
            },
            amount: {
                required: true,
                number: true
            },
            detail: {
                required: true
            },
        
            emp_autoid: {
                required: true
            },
        },
        messages: {
        
            name: {
                required: ""
            },
            product_type: {
                required: "",
            },
            amount: {
                required: "",
                number: ""
            },
            detail: {
                required: ""
            },
            emp_autoid: {
                required: ""
            },
        },
        submitHandler: function (form) {
              $('#singlebutton').hide();
            $('.square').show();
            $.ajax({
                url: "<?php echo base_url("admin/add_order"); ?>",
                method: "POST",
                data: $("#addproduct").serialize(),
                success: function (response) {
                     var Data = JSON.parse(response);

                    if(Data==""){
                      alert("ทำรายการไม่สำเร็จ");
                    }else{
                        $('#singlebutton').show();
                        $('.square').hide();

                      $("#filelist").empty();
                      $("#name").val("");
                      $("#detail").val("");
                      $("#amount").val("");

                      $("#showupload").empty().append("<div style='margin-bottom:25px;color:#CCCCCC;'>Drop image files here to upload</div>");
                     $(".count-order").empty().append(Data.row);
                     $(".count-order").attr("data-id",Data.row);
                             $(".sm_autoid").empty().append("<input class='form-control'  id='product_id' name='sm_autoid'  type='text' value='"+Data.id+"' readonly>");
                    $.each( Data.one, function( key, value ) {
                    $(".order-detail-ul").append("<li class='order-detail-li'>"+value.od_productname+"<i class='i-amount' style='color: red'>"+value.od_amount+"</i></li>");
                   
                     });                    
}
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
        // flash_swf_url: '<?php //echo base_url("assets/plupload-2.1.9/js/Moxie.swf"); ?>',
        // silverlight_xap_url: '<?php //echo base_url("assets/plupload-2.1.9/js/Moxie.xap"); ?>',
        dragdrop: true,
        drop_element: "dropzone",
        filters: {
            max_file_size: '500mb',
            mime_types: [
                {title: "Image files", extensions: "jpg,gif,png"},
            ]
        },
        init: {

        //     PostInit: function() {
        //     document.getElementById('filelist').innerHTML = '';
 
        //     document.getElementById('uploadfiles').onclick = function() {
        //         uploader.start();
        //         return false;
        //     };
        // },

            FilesAdded: function (up, files) {
                     plupload.each(files, function(file) {
                            document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                        });

                //     var file_type = file.type;
                //     //console.log(file_type);
                //     var progressDetail = '';

                //     if (file.size > 1024 * 1024) {
                //         fileSizeTotal = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toFixed(2).toString() + ' MB';
                //     } else {
                //         fileSizeTotal = (Math.round(file.size * 100 / 1024) / 100).toFixed(2).toString() + ' KB';
                //     }
                //     progressDetail = '0 / ' + fileSizeTotal;
                //     var img = new o.Image();
                //     img.onload = function () {
                //         setTimeout(function () {
                            uploader.start();
                //         }, 100);
                //     }
                //     img.load(file.getSource());

            },
            UploadProgress: function (up, file) {
                 document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
                        console.log((up.total.size-up.total.loaded)/up.total.bytesPerSec);
                        
                // if (file.size > 1024 * 1024) {
                //     fileSizeTotal_progress = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toFixed(2).toString() + ' MB';
                // } else {
                //     fileSizeTotal_progress = (Math.round(file.size * 100 / 1024) / 100).toFixed(2).toString() + ' KB';
                // }
                // if (file.loaded > 1024 * 1024) {
                //     fileSizeLoaded_progress = (Math.round(file.loaded * 100 / (1024 * 1024)) / 100).toFixed(2).toString() + ' MB';
                // } else {
                //     fileSizeLoaded_progress = (Math.round(file.loaded * 100 / 1024) / 100).toFixed(2).toString() + ' KB';
                // }


                // progress = setInterval(function () {
                //     console.log("progress");

                // }, 10);
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

