<?php $this->load->view("bootstrap_and_js.php"); ?>
<script type="text/javascript" src="<?php echo base_url("assets/plupload-2.1.9/js/plupload.full.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/plupload-2.1.9/js/jquery.ui.plupload/jquery.ui.plupload.js"); ?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/bootstrap-datetimepicker/build/js/moment.js"); ?>"></script>

<link rel="stylesheet" href="<?php echo base_url("assets/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"); ?>"> 
<script type="text/javascript" src="<?php echo base_url("assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"); ?>"></script>



<?php $this->load->view("view_headerproduct.php"); ?>

<div style="width: calc(100% - 179px); margin: 75px 89.500px 75px 89.500px;">
    <div class="row">
        <h3>แบบฟอร์มชำระเงิน <small> (สำหรับลูกค้าที่เลือกชำระเงินโดย โอนเงินผ่านธนาคาร และชำระเงินเรียบร้อยแล้ว)</small></h3>
        <form id="payment" class="form-horizontal" role="form">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="col-lg-5 control-label"> รหัสคำสั่งซื้อ :</label>
                    <div class="col-lg-7">
                        <input class="form-control" name="t_id" id="t_id" type="text" value="<?php echo $this->input->get('txt_id'); ?>" disabled="">
                        <input  name="txn_id" id="txn_id" type="hidden" value="<?php echo $this->input->get('txt_id'); ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">ชื่อ - นามสกุล :</label>
                    <div class="col-lg-7">
                        <input class="form-control" name="fullname" id="fullname" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">เบอร์โทรศัพท์ :</label>
                    <div class="col-lg-7">
                        <input class="form-control" name="phone" id="phone" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">ข้อความเพิ่มเติม (ถ้ามี) :</label>
                    <div class="col-lg-7">
                        <textarea class="form-control" name="detail" id="detail" rows="5" ></textarea>
                    </div>
                </div>

            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="col-lg-5 control-label">วันที่และเวลา :</label>
                    <div class="col-lg-7">
                        <div class='input-group date' id='datetimepicker5'>
                            <input type='text' name="date" id="date" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-5 control-label">ใบสลิปชำระเงิน :</label>
                    <div class="col-lg-7">
                        <div id="dropzone" style="background:#eee;height:150px; margin: 0px; text-align: center; display: table; width: 100%; vertical-align: middle;">
                            <div id="uploader" style="position: relative; display: table-cell; vertical-align: middle;">
                                <div id="showupload">
                                    <div style="margin-bottom:25px;color:#CCCCCC;">
                                        <span style="font-size:12px;">ลากรูปภาพมาวางใส่กรอบสีเทา เพื่อทำการอัพโหลด</span>
                                        <input type="hidden" name="img" id="img" value="-1">
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <div style="margin-top:10px; margin-bottom:10px;">
                                        <center><div id="file-uploader_new" class="btn btn-default" onclick="javascript:;" style="font-size: 12px;">เลือกรูปภาพ</div></center>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">ธนาคารที่โอนเงินเข้า :</label>
                    <div class="col-lg-7">
                        <select name="bank" id="bank" class="form-control" style="visibility: visible;">
                            <option value="-1">เลือกธนาคารที่โอนเงินเข้า</option>
                            <option value="1">ธนาคารไทยพาณิชย์ / SCB</option>
                            <option value="2">ธนาคารกสิกร / KBANK</option>
                            <option value="3">ธนาคารกรุงเทพ / BBL</option>
                            <option value="4">ธนาคารกรุงไทย / KTB</option>
                            <option value="5">ธนาคารยูโอบี / UOB</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-5 control-label">จำนวนเงินที่โอน :</label>
                    <div class="col-lg-7">
                        <input class="form-control" name="money" id="money" type="text">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            <button type="submit" class="btn btn-default">ยืนยัน</button>
        </form>  
    </div>
    <div class="container">
        <div class="row">

        </div>
    </div>

    <div class="clearfix"></div>

</div>


<script>
    $(document).ready(function () {
        var tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() - 2);
        $('#datetimepicker5').datetimepicker({
            minDate: tomorrow
        });
        $("#payment").validate({
            focusInvalid: false,
            ignore: "",
            rules: {
                fullname: {
                    required: true,
                },
                phone: {
                    required: true,
                    number: true

                },
                date: {
                    required: true,
                },
                img: {
                    required: true,
                    min: 0
                },
                bank: {
                    required: true,
                    min: 0
                },
                money: {
                    required: true,
                    number: true
                }
            },
            messages: {
                fullname: {
                    required: "",
                },
                phone: {
                    required: "",
                    number: ""
                },
                date: {
                    required: "",
                },
                img: {
                    min: ""
                },
                bank: {
                    required: "",
                    min: ""
                },
                money: {
                    required: "",
                    number: ""
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: "<?php echo base_url("my_customer/payment_pending"); ?>",
                    method: "POST",
                    datatype: "html",
                    data: $("#payment").serialize(),
                    success: function (ab) {
                        alert(ab);
//                        if (ab == 1) {
//                            window.location.href = "<?php echo base_url('my_customer/payment_history'); ?>"
//                        } else {
//                            alert("เกิดข้อผิดพลาดกรุณาทำรายการอีกครั้งหรือติดต่อผู้ดูแลระบบ");
//                            window.location.href = "<?php echo base_url('my_customer/payment_history'); ?>"
//                        }
                    }
                });
            }
        });


    });

</script>
<script>
    var fileSizeTotal_progress = 0;
    var uploader = new plupload.Uploader({
        runtimes: 'html5,flash,silverlight,html4',
        browse_button: 'file-uploader_new',
        container: document.getElementById('uploader'),
        url: '<?php echo base_url("my_customer/save_img_forpayment"); ?>',
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

