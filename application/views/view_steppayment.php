<?php
$csrf = array(
    'name' => $this->security->get_csrf_token_name(),
    'hash' => $this->security->get_csrf_hash()
);
?>
<?php $this->load->view("bootstrap_and_js.php"); ?>

<?php $this->load->view("view_headerproduct.php"); ?>


<div  style="width: calc(100% - 179px); margin: 75px 89.500px 75px 89.500px;">
    <div class="row">
        <h3>การชำระเงิน</h3>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" >
                <!--                <div class="wizard" style="">
                                    <a id="a-1" class="current" onClick="$('#step-2').hide(); $('#step-3').hide(); $('#step-1').show();" ><span class="badge" >1</span>เลือกระบบการชำระ</a>
                                    <a id="a-2" class="btn-is-disabled" onClick="$('#step-1').hide(); $('#step-3').hide(); $('#step-2').show();"><span class="badge">2</span>ที่อยู่จัดส่ง</a>
                                    <a id="a-3" class="btn-is-disabled" onClick="$('#step-1').hide(); $('#step-2').hide(); $('#step-3').show();"><span class="badge badge-inverse">3</span>ชำระเงิน</a>
                                </div>-->
                <div class="wizard" style="">
                    <a id="a-1" class="current btn-is-disabled" onClick="$('#step-2').hide();
                            $('#step-3').hide();
                            setTimeout(function () {
                                $('#step-1').fadeIn('slow');
                            }, 500);" ><span class="badge" >1</span>เลือกระบบการชำระ <i class="" ></i></a>
                    <a id="a-2" class="btn-is-disabled" onClick="$('#step-1').hide();
                            $('#step-3').hide();
                            setTimeout(function () {
                                $('#step-2').fadeIn('slow');
                            }, 500);"><span class="badge">2</span>ที่อยู่จัดส่ง <i class=""></i></a>
                    <a id="a-3" class="btn-is-disabled" onClick="$('#step-1').hide();
                            $('#step-2').hide();
                            setTimeout(function () {
                                $('#step-3').fadeIn('slow');
                            }, 500);"><span class="badge badge-inverse">3</span>ชำระเงิน</a>
                </div>
            </div>

        </div>
    </div>
    <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding:  10px 0px 10px 0px;">
            <?php
//            $attributes = array('id' => '5');
//            echo form_open(base_url("my_customer/view_test"), $attributes);
            ?>

            <form id="address_information">
                <div id="step-1" style="">
                    <div class="list-content">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" >
                            <div class = "panel panel-default">
                                <div class = "panel-heading">
                                    <h3 class = "panel-title">เลือกระบบการชำระ</h3>
                                </div>
                                <div class = "panel-body">
                                    <fieldset class="form-group">
                                        <legend><h5>- ตัวเลือกสำหรับการชำระเงิน</h5></legend>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                                <i class="icon-cc-paypal" style="font-size: 25px;"></i> &mdash; Paypal
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                                                <i class="icon-bank" style="font-size: 25px;"></i> &mdash; หักบัญชีธนาคาร
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin-top:25px;">
                                            <button type="button" class="btn btn-primary" onclick="$('#a-1 > i').addClass('icon-ok-circle'); $('#a-2').removeClass('btn-is-disabled'); $('#a-2').trigger('click');">ดำเนินการต่อ</button>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                            <div class = "panel panel-default">
                                <div class = "panel-heading" >
                                    <h3 class = "panel-title">สรุปการสั่งซื้อ ( <?php echo $count = count($list_data); ?> item  ) <a class="a_collapse"style="float:right;" data-toggle="collapse" data-target=".list-product"><i class="icon-up-open"></i></a></h3>
                                </div>
                                <table  class="table table-hover" style="margin-bottom:0px;">
                                    <thead>
                                        <tr>
                                            <th  style="font-size:15px; width:220px; padding:8px 0px 8px 8px;">สินค้า</th>
                                            <th class="th" style="font-size:15px; width:45px; padding:8px 0px 8px 0px;">จำนวน</th>
                                            <th class="th" style="font-size:15px; width:25px; padding:8px 3px 8px 3px;">ราคา</th>
                                            <th class="th" style="font-size:15px; width:40px; padding:8px 8px 8px 0px;">ต่อ</th>
                                        </tr>
                                    </thead>
                                </table>
                                <div class = "panel-body calculate fixed-panel" id="calculate"  style="padding :0px; ">
                                    <table  class="table table-hover" style="margin-bottom:0px;">
                                        <tbody class="" >
                                            <?php
                                            foreach ($list_data as $key) {
                                                ?>
                                                <tr>
                                                    <td><h6 class="collapse in list-product"><b>รหัสสินค้า</b> : <?php echo $key->sm_autoid; ?></h6>
                                                        <h6><b>ชื่อสินค้า : <?php echo $key->sm_productname; ?></b></h6>
                                                        <h6 class="collapse in list-product">- หมวด : <?php echo $key->ty_name; ?></h6>
                                                        <h6 class="collapse in list-product">- ประเภท : <?php echo $key->ct_name; ?></h6>
                                                        <h6 class="collapse in list-product"><b>ส่งธรรมดา</b></h6>
                                                        <h6 class="collapse in list-product"><?php echo $date_sent; ?></h6>
                                                    </td>
                                                    <td class="th">
                                                        <h6><?php echo $amount_data[$key->sm_autoid]; ?></h6>
                                                        <input class="amount" type="hidden" value="<?php echo $amount_data[$key->sm_autoid]; ?>">
                                                    </td>
                                                    <td class="th">
                                                        <h6><?php echo $key->ss_price; ?></h6>
                                                        <input class="price" type="hidden" value="<?php echo $key->ss_price; ?>">
                                                    </td>
                                                    <td class="th"><h6><?php echo $key->ss_unit; ?></h6></td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>

                                    </table>
                                </div>
                                <div class="panel-footer">
                                    <div>
                                        <div id="total_1" class="">
                                            <h5 style="">มูลค่าสินค้า<small class="total_s" style="float:right;">0</small></h5>
                                            <h6 style="color:#04bd00;">- ค่าจัดส่ง <strong class="free" style="float:right;">*ฟรี</strong></h6>
                                        </div>
                                        <!--<div id="td" class="total_s">-->     
                                        <!--</div>-->
                                    </div>
                                    <div>
                                        <div id="total" >รวมสุทธิ <strong class="total" style="float:right;">0</strong></div>
                                    </div>                                
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div id="step-2" style="display:none;">
                    <div class="list-content">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" >
                            <div class = "panel panel-default">
                                <div class = "panel-heading">
                                    <h3 class = "panel-title">ที่อยู่จัดส่ง</h3>
                                </div>
                                <div class = "panel-body">
                                    <fieldset class="form-group">
                                        <h5>- ที่อยู่</h5>
                                        <div class="panel panel-default" style="border-color:white;">
                                            <div class="panel-body">
                                                <div class="form-horizontal row-border" >
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">ชื่อ-นามสกุล</label>
                                                        <div class="col-md-10">
                                                            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="ชื่อจริง-นามสกุลจริง">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">ที่อยู่</label>
                                                        <div class="col-md-10">
                                                            <textarea name="address" id="address" class="form-control custom-control" rows="5" style="resize:none"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">รหัสไปรษณีย์</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" id="postcode" name="postcode" placeholder="รหัสไปรษณีย์">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">อำเภอ</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" id="area" name="area" placeholder="อำเภอ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">จังหวัด</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="text" id="county" name="county" placeholder="จังหวัด">
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="col-md-2 control-label">โทรศัพท์</label>
                                                        <div class="col-md-10">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">+66</span>    
                                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="เบอร์โทรติดต่อ">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-check" style="margin-top:25px;">
                                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                                            <button type="submit" class="btn btn-primary" onclick="">ดำเนินการต่อ</button>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">


                            <div class = "panel panel-default">
                                <div class = "panel-heading" >
                                    <h3 class = "panel-title">สรุปการสั่งซื้อ ( <?php echo $count = count($list_data); ?> item  ) <a class="a_collapse"style="float:right;" data-toggle="collapse" data-target=".list-product"><i class="icon-up-open"></i></a></h3>
                                </div>
                                <table  class="table table-hover" style="margin-bottom:0px;">
                                    <thead>
                                        <tr>
                                            <th  style="font-size:15px; width:220px; padding:8px 0px 8px 8px;">สินค้า</th>
                                            <th class="th" style="font-size:15px; width:45px; padding:8px 0px 8px 0px;">จำนวน</th>
                                            <th class="th" style="font-size:15px; width:25px; padding:8px 3px 8px 3px;">ราคา</th>
                                            <th class="th" style="font-size:15px; width:40px; padding:8px 8px 8px 0px;">ต่อ</th>
                                        </tr>
                                    </thead>
                                </table>
                                <div class = "panel-body calculate fixed-panel"  style="padding :0px; ">
                                    <table  class="table table-hover" style="margin-bottom:0px;">
                                        <tbody class="" >
                                            <?php
                                            foreach ($list_data as $key) {
                                                ?>
                                                <tr>
                                                    <td><h6 class="collapse in list-product"><b>รหัสสินค้า</b> : <?php echo $key->sm_autoid; ?></h6>
                                                        <h6><b>ชื่อสินค้า : <?php echo $key->sm_productname; ?></b></h6>
                                                        <h6 class="collapse in list-product">- หมวด : <?php echo $key->ty_name; ?></h6>
                                                        <h6 class="collapse in list-product">- ประเภท : <?php echo $key->ct_name; ?></h6>
                                                        <h6 class="collapse in list-product"><b>ส่งธรรมดา</b></h6>
                                                        <h6 class="collapse in list-product"><?php echo $date_sent; ?></h6>
                                                    </td>
                                                    <td class="th">
                                                        <h6><?php echo $amount_data[$key->sm_autoid]; ?></h6>
                                                        <input class="amount" type="hidden" value="<?php echo $amount_data[$key->sm_autoid]; ?>">
                                                    </td>
                                                    <td class="th">
                                                        <h6><?php echo $key->ss_price; ?></h6>
                                                        <input class="price" type="hidden" value="<?php echo $key->ss_price; ?>">
                                                    </td>
                                                    <td class="th"><h6><?php echo $key->ss_unit; ?></h6></td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>

                                    </table>
                                </div>
                                <div class="panel-footer">
                                    <div>
                                        <div id="total_1" class="">
                                            <h5 style="">มูลค่าสินค้า<small class="total_s" style="float:right;">0</small></h5>
                                            <h6 style="color:#04bd00;">- ค่าจัดส่ง <strong class="free" style="float:right;">*ฟรี</strong></h6>
                                        </div>
                                        <!--<div id="td" class="total_s">-->     
                                        <!--</div>-->
                                    </div>
                                    <div>
                                        <div id="total" >รวมสุทธิ <strong class="total" style="float:right;">0</strong></div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <?php // echo form_close(); ?>
        </div>
    </div>



    <div class="clearfix"></div>
</div>

<script>
    $(document).ready(function () {

        $(".wizard > a ").on("click", function () {
            $(".current").removeClass("current");
            $(this).addClass("current");
        });
//        $('#a-1').removeClass('btn-is-disabled');
//        $('#a-2').removeClass('btn-is-disabled');
//        $('#a-3').removeClass('btn-is-disabled');
        $("#address_information").validate({
            focusInvalid: false,
            rules: {
                fullname: {
                    required: true,
                    number: false

                },
                address: {
                    required: true
                },
                postcode: {
                    required: true,
                    alphanumeric: true,
                    number: true
                },
                area: {
                    required: true,
                    number: false
                },
                county: {
                    required: true,
                    number: false
                },
                phone: {
                    required: true,
                    alphanumeric: true,
                    number: true,
                    minlength: 9,
                    maxlength: 10
                }
            },
            messages: {
                fullname: {
                    required: "",
                    number: ""
                },
                address: {
                    required: ""
                },
                postcode: {
                    required: "",
                    alphanumeric: "",
                    number: ""
                },
                area: {
                    required: "",
                    number: ""
                },
                county: {
                    required: "",
                    number: ""
                },
                phone: {
                    required: "",
                    alphanumeric: "",
                    number: "",
                    minlength: "",
                    maxlength: ""
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: "<?php echo base_url("my_customer/customer_address"); ?>",
                    method: "POST",
                    datatype: "html",
                    data: $("#address_information").serialize(),
                    success: function (ab) {
                        window.location.href = "<?php echo base_url("my_customer/steppayment_3"); ?>";
                    }
                });
            }
        });
        $('.a_collapse').on("click", function () {
            // alert("5556565");
            $(".a_collapse > i").toggleClass("icon-up-open icon-down-open");
        });
        var total = 0;
        $('#calculate > table > tbody > tr').each(function () {
            var amount = $(this).find('.amount').val();
            var price = $(this).find('.price').val();
            var subtotal = (parseInt(price) * parseInt(amount));
            total = (parseInt(total) + parseInt(subtotal));

            $('.total_s').html(total + " บาท");
            $('.free').html("*ฟรี");
            $('.total').html("<h6 style='color: #f36f21;'>" + total + " บาท</h6>");
        });
    });
</script>
<style>


    .fixed-panel {
        min-height: 300px;
        max-height: 345px;
        overflow-y: scroll;
    }

    form .error {
        color: #ff0000;
    }   
    form input.error {
        border:1px solid red;
    }
    .btn-is-disabled {
        pointer-events: none; /* Disables the button completely. Better than just cursor: default; */
        @include opacity(0.7);
    }
    .list-content{
        margin: 10px 0px 10px 0px;
        /*border-bottom:  1px solid #dde2e4;*/
    }
    .wizard a {
        padding: 10px 12px 10px;
        margin-right: 5px;
        background: #efefef;
        position: relative;
        display: inline-block;
        text-decoration: none;

    }
    .wizard a:before {
        width: 0;
        height: 0;
        border-top: 20px inset transparent;
        border-bottom: 20px inset transparent;
        border-left: 20px solid #fff;
        position: absolute;
        content: "";
        top: 0;
        left: 0;
    }
    .wizard a:after {
        width: 0;
        height: 0;
        border-top: 20px inset transparent;
        border-bottom: 20px inset transparent;
        border-left: 20px solid #efefef;
        position: absolute;
        content: "";
        top: 0;
        right: -20px;
        z-index: 2;
    }
    .wizard a:first-child:before,
    .wizard a:last-child:after {
        border: none;
    }
    .wizard a:first-child {
        -webkit-border-radius: 4px 0 0 4px;
        -moz-border-radius: 4px 0 0 4px;
        border-radius: 4px 0 0 4px;
    }
    .wizard a:last-child {
        -webkit-border-radius: 0 4px 4px 0;
        -moz-border-radius: 0 4px 4px 0;
        border-radius: 0 4px 4px 0;
    }
    .wizard .badge {
        margin: 0 5px 0 18px;
        position: relative;
        top: -1px;
    }
    .wizard a:first-child .badge {
        margin-left: 0;
    }
    .wizard .current {
        background: #007ACC;
        color: #fff;
    }
    .wizard .current:after {
        border-left-color: #007ACC;
    }
</style>
<style>
    .th{
        text-align:center; 
        vertical-align:middle;
    }
    @media 
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {
        .th{
            text-align:left; 
            vertical-align:middle;
        }
        /* Force table to not be like tables anymore */
        table, thead, tbody, th, td, tr { 
            display: block; 
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr { 
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr { border: 1px solid #ccc; }

        td { 
            /* Behave  like a "row" */

            border: none !important;
            border-bottom: 1px solid #eee !important; 
            position: relative;
            padding-left: 50% !important; 
        }

        td:before { 
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%; 
            padding-right: 10px; 
            white-space: nowrap;
        }
        #total{
            display: none;
        }
        /*
        Label the data
        */
        td:nth-of-type(1):before { content: "สินค้า"; }
        td:nth-of-type(2):before { content: "จำนวน"; }
        td:nth-of-type(3):before { content: "ราคา"; }
        td:nth-of-type(4):before { content: "ต่อ"; }

        #td:nth-of-type(2):before { content: "ราคาสุทธิ"; }

    }

    /* Smartphones (portrait and landscape) ----------- */
    @media only screen
    and (min-device-width : 320px)
    and (max-device-width : 480px) {
        body { 
            padding: 0; 
            margin: 0; 
            width: 320px; }
    }

    /* iPads (portrait and landscape) ----------- */
    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
        body { 
            width: 495px; 
        }
    }

    * { 
        margin: 0; 
        padding: 0; 
    }

    #page-wrap {
        margin: 50px;
    }
    p {
        margin: 20px 0; 
    }

    /* 
    Generic Styling, for Desktops/Laptops 
    */
    table { 
        width: 100%; 
        border-collapse: collapse; 
    }
    /* Zebra striping */
    tr:nth-of-type(odd) { 
        background: #eee; 
    }
    th { 
        background: white; 
        color: #333; 
        font-weight: bold; 

    }
    td, th { 
        padding: 6px; 
        /*border: 1px solid #ccc; */
        text-align: left; 

    }

</style>

