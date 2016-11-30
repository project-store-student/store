<?php
$triggerOn = $paymet_detail[0]->payment_date;
$user_tz = 'Asia/Bangkok';
$schedule_date = new DateTime($triggerOn, new DateTimeZone($user_tz));
$schedule_date->setTimeZone(new DateTimeZone('Asia/Bangkok'));
$triggerOn = $schedule_date->format('H:i:s D d-M-Y');
?>
<?php $this->load->view("bootstrap_and_js.php"); ?>
<script>
    $(document).ready(function () {
        window.print();
    });
</script>

<div  >
    <h1><i class="icon-newspaper-1"></i>ใบเสร็จ : <small><?php echo $paymet_detail[0]->txn_id; ?></small></h1>
    <hr>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <h1><i class="icon-home-5"></i> Store.com</h1>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="float: right;">
            <div class="row">
                <h4 style="float: right; margin: 0px 15px 5px 0px"><?php echo $paymet_detail[0]->txn_id; ?> <small><?php echo $triggerOn; ?></small></h4>
            </div>
            <div class="row">
                <h6 style="float: right; margin: 0px 15px 0px 0px;">คำสั่งซื้อได้ถูกชำระเมื่อ : <small><?php echo $triggerOn; ?></small></h6>
            </div>
        </div>
    </div>
    <div class="row" style="padding-top:25px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-info alert-dismissable" style="background-color:white; color: black; border-color:black;">
                <i class="fa fa-coffee"></i>
                คำสั่งซื้อได้ถูก<strong>ชำระแล้ว</strong> เลขที่ใบเสร็จของคุณคือ : <?php echo $paymet_detail[0]->txn_id; ?> 
            </div>
        </div>
    </div>
    <hr>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h4>ผู้ซื้อ : </h4>
                <h5><i class="icon-user"> </i> ชื่อ-นามสกุล : <?php echo $customer_detail[0]->c_name; ?></h5>
                <h5><i class="icon-mail"> </i> อีเมลล์ : <?php echo $customer_detail[0]->c_email; ?></h5>
                <h5><i <?php if ($customer_detail[0]->c_gender == 1) { ?>class="icon-male-1"<?php } else { ?>class="icon-female-1"<?php } ?> > </i> เพศ : <?php if ($customer_detail[0]->c_gender == 1) { ?> ชาย <?php } else { ?> หญิง <?php } ?></h5>
                <h5><i class="icon-home"> </i> ที่อยู่ : <?php echo $customer_detail[0]->c_address; ?></h5>
            </div>
            <div class="col-sm-12 col-xs-12 hidden-md hidden-lg ">
                <hr style="">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h4>ผู้ขาย : </h4>
                <h5><i class="icon-home-5"> </i> บริษัท :  Store.com</h5>
                <h5><i class="icon-phone"> </i> โทร :  +6632866249</h5>
                <h5><i class="icon-home"> </i> ที่อยู่  :  มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน วิทยาเขตขอนแก่น 150 ตำบล ในเมือง อำเภอเมืองขอนแก่นขอนแก่น 40000 ประเทศไทย</h5>
                <h5><i class="icon-globe"> </i> ประเทศ :  ไทย</h5>
            </div>
        </div>
        <hr>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h4>รายการสั่งซื้อ : </h4>

        <table>
            <thead>
                <tr>
                    <th class="th">ลำดับ</th>
                    <th class="th">รายการสั่งซื้อ</th>
                    <th class="th">ราคา</th>
                    <th class="th">จำนวน</th>
                    <th class="th">ราคาต่อหน่วย</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($paymet_detail as $key) {
                    ?>
                    <tr>
                        <td class="th"><?php echo $i; ?></td>
                        <td><?php echo $key->sm_productname; ?></td>
                        <td class="th"><?php echo $key->ss_price; ?></td>
                        <td class="th"><?php echo $key->sp_amount; ?></td>
                        <td class="th"><?php echo $key->mc_gross; ?></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>

                <tr>
                    <td colspan="4" id="total" class="th">รวมสุทธิ</td>
                    <td id="td" class="th"><?php echo $paymet_detail[0]->payment_gross; ?></td>

                </tr>
            </tbody>
        </table>
    </div>

    <div class="clearfix"></div>
</div>

<style>
    .th{
        text-align:center; 
        vertical-align:middle;
    }
    /* 
    Max width before this PARTICULAR table gets nasty
    This query will take effect for any screen smaller than 760px
    and also iPads specifically.
    */
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
        td:nth-of-type(1):before { content: "ลำดับ"; }
        td:nth-of-type(2):before { content: "รายการสั่งซื้อ"; }
        td:nth-of-type(3):before { content: "ราคา"; }
        td:nth-of-type(4):before { content: "จำนวน"; }
        td:nth-of-type(5):before { content: "ราคาต่อหน่วย"; }
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
        background: #333; 
        color: white; 
        font-weight: bold; 

    }
    td, th { 
        padding: 6px; 
        border: 1px solid #ccc; 
        text-align: left; 

    }

</style>