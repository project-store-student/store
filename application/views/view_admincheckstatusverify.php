
<?php $this->load->view("header") ?>
<div style="width: calc(100% - 179px); margin: 75px 89.500px 75px 89.500px;">

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class = "panel panel-default fixed-panel-customer">
                <div class = "panel-heading" >
                    <h3 class = "panel-title">ข้อมูลลูกค้า </h3>
                </div>
                <table  class="table table-hover" style="margin-bottom:0px;">
                    <thead>
                        <tr>
                            <?php if (empty($select_payment[0]->c_facebook_id)) { ?>
                                <th  style="font-size:15px; width:220px; padding:8px 0px 8px 8px;">สมัครผ่านเว็บไซต์</th>
                            <?php } else { ?>
                                <th  style="font-size:15px; width:220px; padding:8px 0px 8px 8px;">สมัครผ่านเฟสบุ๊ค</th>
                            <?php } ?>
                        </tr>
                    </thead>
                </table>
                <div class = "panel-body calculate " id="calculate" > 

                    <dl class="row">
                        <dt class="col-sm-3">ชื่อ</dt>
                        <dd class="col-sm-9"><?php echo $select_payment[0]->c_name . " " . $select_payment[0]->c_lastname; ?></dd>

                        <dt class="col-sm-3">อีเมลล์</dt>
                        <dd class="col-sm-9"><a href="mailto:<?php echo $select_payment[0]->c_email; ?>"><?php echo $select_payment[0]->c_email; ?></a></dd>

                        <dt class="col-sm-3">เพศ</dt>
                        <dd class="col-sm-9">
                            <?php
                            if ($select_payment[0]->c_gender == 1) {
                                echo "ชาย";
                            } else {
                                echo "หญิง";
                            }
                            ?>
                        </dd>
                        <?php if (empty($select_payment[0]->c_facebook_id)) { ?>
                            <dt class="col-sm-3">เพศ</dt>
                            <dd class="col-sm-9"><?php echo $select_payment[0]->c_address; ?></dd>
                        <?php } else { ?>
                            <dt class="col-sm-3">Facebook</dt>
                            <dd class="col-sm-9"><a href="<?php echo $select_payment[0]->c_facebook_link; ?>" target="_blank"><?php echo $select_payment[0]->c_name . " " . $select_payment[0]->c_lastname; ?></a></dd>
                        <?php } ?>
                    </dl>
                </div>
                <div class = "panel-heading" style="border-top:1px solid #ddd;">
                    <h3 class = "panel-title">สถานที่จัดส่ง </h3>
                </div>
                <div class = "panel-body calculate " id="calculate">
                    <dl class="row">
                        <dt class="col-sm-4">ชื่อ</dt>
                        <dd class="col-sm-8"><?php echo $select_payment[0]->pmc_name; ?></dd>

                        <dt class="col-sm-4">ที่อยู่จัดส่ง</dt>
                        <dd class="col-sm-8"><?php echo $select_payment[0]->pmc_address; ?></dd>

                        <dt class="col-sm-4">เบอร์โทร</dt>

                        <dd class="col-sm-8"><a href="tel:<?php echo $select_payment[0]->pmc_phone; ?>"><?php echo $select_payment[0]->pmc_phone; ?></a></dd>

                    </dl>
                </div>
            </div>
            <?php if ($select_payment[0]->payment_status == "2") { ?>
                <button class="btn btn-default btn-approval col-md-3" id="approval" data-id="<?php echo $select_payment[0]->txn_id; ?>" data-cusid="<?php echo $select_payment[0]->c_id; ?>" style="margin:0px 5px 0px 0px;">อนุมัติ</button>
                <button class="btn btn-default btn-notapproval col-md-4" id="notapproval" data-id="<?php echo $select_payment[0]->txn_id; ?>" data-cusid="<?php echo $select_payment[0]->c_id; ?>" >ไม่ผ่านอนุมัติ</button>
            <?php } else { ?>
                <button class="btn btn-default btn-notapproval col-md-4" id="close">ปิด</button>


            <?php } ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class = "panel panel-default">
                <div class = "panel-heading" >
                    <h3 class = "panel-title">รายการสั่งซื้อ ( <?php echo $count = count($select_payment); ?> item  ) <a class="a_collapse"style="float:right;" data-toggle="collapse" data-target=".list-product"><i class="icon-up-open"></i></a></h3>
                </div>
                <table  class="table table-hover" style="margin-bottom:0px;">
                    <thead>
                        <tr>
                            <th  style="width:155px; padding:8px 0px 8px 8px;">สินค้า</th>
                            <th class="th" style=" width:10px; padding:8px 0px 8px 0px;">จำนวน</th>
                            <th class="th" style="width:10px; padding:8px 0px 8px 0px;">ราคา</th>
                            <th class="th" style="width:70px; padding:8px 8px 8px 0px;">ต่อ</th>
                        </tr>
                    </thead>
                </table>
                <div class = "panel-body calculate fixed-panel" id="calculate"  style="padding :0px; ">
                    <table  class="table table-hover" style="margin-bottom:0px;">
                        <tbody class="" >
                            <?php
                            foreach ($select_payment as $key) {
                                ?>
                                <tr>
                                    <td >
                                        <h6 class="collapse in list-product"><b>รหัสสินค้า</b> : <?php echo $key->sm_autoid; ?></h6>
                                        <h6><b>ชื่อสินค้า : <?php echo $key->sm_productname; ?></b></h6>
                                        <h6 class="collapse in list-product">- หมวด : <?php echo $key->ty_name; ?></h6>
                                        <h6 class="collapse in list-product">- ประเภท : <?php echo $key->ct_name; ?></h6>
                                        <h6 class="collapse in list-product"><b>ส่งธรรมดา</b></h6>
                                    </td>
                                    <td class="th" >
                                        <h6><?php echo $key->sp_amount; ?></h6>
                                    </td>
                                    <td class="th">
                                        <h6><?php echo $key->ss_price; ?></h6>
                                    </td>
                                    <td class="th">
                                        <h6><?php echo $key->ss_unit; ?></h6>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <div>
                        <div id="total_1" class="">
                            <h5 style="">มูลค่าสินค้า<small class="total_s" style="float:right;"><?php echo $key->payment_gross; ?></small></h5>
                            <h6 style="color:#04bd00;">- ค่าจัดส่ง <strong class="free" style="float:right;">*ฟรี</strong></h6>
                        </div>
                    </div>
                    <div>
                        <div id="total" >รวมสุทธิ <strong class="total" style="float:right;"><?php echo $key->payment_gross; ?></strong></div>
                    </div>                                
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class = "panel panel-default">
                <div class = "panel-heading" >
                    <h3 class = "panel-title">ข้อมูลการชำระ </h3>
                </div>
                <table  class="table table-hover" style="margin-bottom:0px;">
                    <thead>
                        <tr>
                            <?php if ($select_payment[0]->pp_tobank == 1) { ?>
                                <th  style="font-size:14px; width:220px; padding:8px 0px 8px 8px;">ธนาคารที่ลูกค้าโอนเงินเข้า : ธนาคารไทยพาณิชย์ / SCB</th>
                            <?php } else if ($select_payment[0]->pp_tobank == 2) { ?>
                                <th  style="font-size:15px; width:220px; padding:8px 0px 8px 8px;">ธนาคารที่ลูกค้าโอนเงินเข้า : ธนาคารกสิกร / KBANK</th>
                            <?php } else if ($select_payment[0]->pp_tobank == 3) { ?>
                                <th  style="font-size:15px; width:220px; padding:8px 0px 8px 8px;">ธนาคารที่ลูกค้าโอนเงินเข้า : ธนาคารกรุงเทพ / BBL</th>
                            <?php } else if ($select_payment[0]->pp_tobank == 4) { ?>
                                <th  style="font-size:15px; width:220px; padding:8px 0px 8px 8px;">ธนาคารที่ลูกค้าโอนเงินเข้า : ธนาคารกรุงไทย / KTB</th>
                            <?php } else if ($select_payment[0]->pp_tobank == 5) { ?>
                                <th  style="font-size:15px; width:220px; padding:8px 0px 8px 8px;">ธนาคารที่ลูกค้าโอนเงินเข้า : ธนาคารยูโอบี / UOB</th>
                            <?php } else { ?>
                                <th  style="font-size:15px; width:220px; padding:8px 0px 8px 8px;">ธนาคารที่ลูกค้าโอนเงินเข้า : ยังไม่ไดรับการชำระ </th>
                            <?php } ?>
                        </tr>
                    </thead>
                </table>
                <div class = "panel-body calculate fixed-panel-verify" id="calculate" >
                    <?php if ($select_payment[0]->pp_tobank == 1 || $select_payment[0]->pp_tobank == 2 || $select_payment[0]->pp_tobank == 3 || $select_payment[0]->pp_tobank == 4 || $select_payment[0]->pp_tobank == 5) { ?>

                        <dl class="row">
                            <dt class="col-sm-2">วันที่</dt>
                            <dd class="col-sm-9"><?php echo $select_payment[0]->pp_date; ?></dd>
                        </dl>
                        <dl class="row">
                            <center>
                                <img name="img1" class="img-zoom" src="<?php echo base_url("my_customer/showupload_payment/" . $select_payment[0]->pp_slip . "_backpage.jpg"); ?>">
                            </center>
                        </dl>
                        <dl class="row detail-verify">
                            <dt class="col-sm-2">ชื่อ</dt>
                            <dd class="col-sm-9"><?php echo $select_payment[0]->pp_name; ?></dd>  

                            <dt class="col-sm-2">เบอร์</dt>
                            <dd class="col-sm-9"><a href="tel:<?php echo $select_payment[0]->pp_phone; ?>"><?php echo $select_payment[0]->pp_phone; ?></a></dd>

                            <dt class="col-sm-6">จำนวนเงินที่โอนเข้า</dt>
                            <dd class="col-sm-6"><?php echo $select_payment[0]->pp_payment_gross; ?> บาท</dd>

                            <dt class="col-sm-6">สิ่งที่ลูกค้าบอกมา</dt>
                            <dd class="col-sm-6"><?php
                                if (empty($select_payment[0]->pp_detail)) {
                                    echo "-";
                                } else {
                                    echo $select_payment[0]->pp_detail;
                                }
                                ?></dd>
                        </dl>
                    <?php } else { ?>
                        <div class="alert alert-danger fade in">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Don't information payment!</strong> ลูกค้ายังไม่ชำระรายการสั่งซื้อ.
                        </div>   
                    <?php } ?>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>


</div>

<script>
    $(document).ready(function () {
        $('.a_collapse').on("click", function () {
            $(".a_collapse > i").toggleClass("icon-up-open icon-down-open");
        });
        $('.img-zoom').hover(function () {
            $(this).attr("src", "<?php echo base_url("my_customer/showupload_payment/" . $select_payment[0]->pp_slip . "_payment.jpg"); ?>");
            $(this).width(185);
            $(".detail-verify").css("display", "none");
            $(this).addClass('transition');
        }, function () {
            $(this).attr("src", "<?php echo base_url("my_customer/showupload_payment/" . $select_payment[0]->pp_slip . "_backpage.jpg"); ?>");
            $(".detail-verify").css("display", "");
            $(this).removeClass('transition');
        });
        $("#close").on("click", function () {
            opener.location.reload();
            window.close();
        });
        $("#approval").on("click", function () {
            var txn_id = $(this).attr("data-id");
            var c_id = $(this).attr("data-cusid");
            $.ajax({
                url: "<?php echo base_url("admin/approval_customer"); ?>",
                method: "POST",
                datatype: "html",
                data: "txn_id=" + txn_id + "&c_id=" + c_id,
                success: function (ab) {
                    opener.location.reload();
                    window.close();
                }
            });

        });
        $("#notapproval").on("click", function () {
            var txn_id = $(this).attr("data-id");
            var c_id = $(this).attr("data-cusid");

            $.ajax({
                url: "<?php echo base_url("admin/notapproval_customer"); ?>",
                method: "POST",
                datatype: "html",
                data: "txn_id=" + txn_id + "&c_id=" + c_id,
                success: function (ab) {
                    opener.location.reload();
                    window.close();
                }
            });

        });
        function open_in_new_tab_and_reload(url)
        {
            //Open in new tab
            window.open(url, '_blank');
            //focus to thet window
            window.focus();
            //reload current page
            location.reload();
        }


//        var lastChecked = null;
//
//        $('.someelement').bind('click', function (event) {
//            if (!lastChecked) {
//                lastChecked = this;
//                return;
//            }
//            if (event.shiftKey) {
//                var start = $('.someelement').index(this);
//                var end = $('.someelement').index(lastChecked);
//                $('.someelement').slice(Math.min(start, end), Math.max(start, end) + 1).addClass('test');
//
//            } else {
//                $('.someelement').removeClass('test');
//                $(this).addClass('test');
//            }
//            lastChecked = this;
//
//            test();
//            $.each(array, function (index) {
//                console.log(index + ':' + this);
//            });
//        });
    });
//    var array = [];
//
//    function test() {
//        $('.test').each(function () {
//            array.push($(this).attr("data-id"));
//        });
//
//
//    }
</script>
<style>
    /*    .test{
            border: 1px solid red;
        }*/
    .btn-notapproval:hover {
        color: white;
        background-color: #ff6600;
        border-color: white;
    }
    .btn-approval:hover {
        color: white;
        background-color: #04bd00;
        border-color: white;
    }

    .img-zoom {
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        -ms-transition: all .2s ease-in-out;
    }

    .transition {
        -webkit-transform: scale(2); 
        -moz-transform: scale(2);
        -o-transform: scale(2);
        transform: scale(2);
    }
    .fixed-panel {
        min-height: 300px;
        max-height: 300px;
        overflow-y: scroll;
    }
    .fixed-panel-customer{
        min-height: 400px;
        max-height: 400px;
    }
    .fixed-panel-verify{
        min-height: 400px;
        max-height: 400px;
    }
</style>
<style>

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

