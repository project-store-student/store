<?php $this->load->view("bootstrap_and_js.php"); ?>

<?php $this->load->view("view_headerproduct.php"); ?>


<div  style="width: calc(100% - 179px); margin: 75px 89.500px 75px 89.500px;">
    <div class="row">
        <h3>การชำระเงิน</h3>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" >
                <div class="wizard" style="">
                    <a id="a-1" class="btn-is-disabled" onClick="$('#step-2').hide();
                            $('#step-3').hide();
                            setTimeout(function () {
                                $('#step-1').fadeIn('slow');
                            }, 500);" ><span class="badge" >1</span>เลือกระบบการชำระ <i class="icon-ok-circle" ></i></a>
                    <a id="a-2" class="btn-is-disabled" onClick="$('#step-1').hide();
                            $('#step-3').hide();
                            setTimeout(function () {
                                $('#step-2').fadeIn('slow');
                            }, 500);"><span class="badge">2</span>ที่อยู่จัดส่ง <i class="icon-ok-circle"></i></a>
                    <a id="a-3" class="current btn-is-disabled" onClick="$('#step-1').hide();
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
            <div id="step-3" style="">
                <div class="list-content">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" >
                        <div class = "panel panel-default">
                            <div class = "panel-heading">
                                <h3 class = "panel-title">ชำระเงิน</h3>
                            </div>
                            <div class = "panel-body">
                                <?php if ($_SESSION["customer_address"]["payment_type"] == "option1") { ?>

                                    <div class="form-check" style="margin-top:25px;">
                                        <center>
                                            <a class="btn btn-primary" href="<?php echo base_url('my_customer/buy_topaypal'); ?>">Check Out to Paypal</a>
                                        </center>


                                    </div>
                                <?php } else { ?>
                                    <div class="form-check" style="margin-top:25px;">
                                        <center> 
                                            <a class="btn btn-primary" href="<?php echo base_url('my_customer/buy_tobank'); ?>">โอนเงินผ่านบัญชีธนาคาร</a>
                                        </center>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class = "panel panel-default">
                            <div class = "panel-heading" >
                                <h3 class = "panel-title">รูปแบบการชำระ <small><a href="<?php echo base_url("my_customer/steppayment"); ?>" style="float:right;">แก้ไข</a></small></h3>
                            </div>
                            <div class = "panel-body">
                                <?php
                                if ($_SESSION["customer_address"]["payment_type"] == "option1") {
                                    $payment_type = "Paypal";
                                } else {
                                    $payment_type = "โอนเงินผ่านบัญชีธนาคาร";
                                }
                                ?>
                                <dl class="row">
                                    <dt class="col-sm-3"><h5><b>ระบบ</b></h5></dt>
                                    <dd class="col-sm-9">
                                        <h5><?php echo $payment_type; ?></h5>
                                    </dd>
                                </dl>

                            </div>
                        </div>
                        <div class = "panel panel-default">
                            <div class = "panel-heading" >
                                <h3 class = "panel-title">ที่อยู่จัดส่ง <small><a  href="<?php echo base_url("my_customer/steppayment"); ?>" style="float:right;">แก้ไข</a></small></h3>
                            </div>
                            <div class = "panel-body">
                                <?php // print_r($_SESSION["customer_address"]);  ?>
                                <dl class="row">
                                    <dt class="col-sm-3"><h5><b>ชื่อ</b></h5></dt>
                                    <dd class="col-sm-9">
                                        <h5>
                                            <?php echo $_SESSION["customer_address"]["fullname"]; ?>
                                        </h5>
                                    </dd>
                                    <dt class="col-sm-3"><h5><b>ที่อยู่</b></h5></dt>
                                    <dd class="col-sm-9">
                                        <h5>
                                            <?php echo $_SESSION["customer_address"]["address"]; ?>
                                            <?php echo $_SESSION["customer_address"]["postcode"]; ?>
                                            <?php echo $_SESSION["customer_address"]["area"]; ?>
                                            <?php echo $_SESSION["customer_address"]["county"]; ?>
                                        </h5>
                                    </dd>
                                    <dt class="col-sm-3 text-truncate" ><h5><b>เบอร์</b></h5></dt>
                                    <dd class="col-sm-9">
                                        <h5>
                                            <?php echo $_SESSION["customer_address"]["phone"]; ?>
                                        </h5> 
                                    </dd>
                                </dl>

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
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php $this->load->view('view_footerproduct'); ?>

<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#step-3').fadeIn('slow');
        }, 500);
        $(".wizard > a ").on("click", function () {
            $(".current").removeClass("current");
            $(this).addClass("current");
        });

        $('.a_collapse').on("click", function () {
            // alert("5556565");
            $(".a_collapse > i").toggleClass("icon-up-open icon-down-open");
        });
        var total = 0;
        $('.calculate > table > tbody > tr').each(function () {
            var amount = $(this).find('.amount').val();
            var price = $(this).find('.price').val();
            var subtotal = (parseInt(price) * parseInt(amount));
            total = (parseInt(total) + parseInt(subtotal));

            $('.total_s').html(total + " บาท");
            $('.free').html("*ฟรี");
            $('.total').html("<h6 style='color: #f36f21;'>" + total + " บาท</h6>");

        });
        $('.calculate').alternateScroll();
    });
</script>

<style>
    .fixed-panel {
        min-height: 250px;
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

