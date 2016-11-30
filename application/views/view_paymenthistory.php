<?php $this->load->view("bootstrap_and_js.php"); ?>

<?php $this->load->view("view_headerproduct.php"); ?>

<div style="width: calc(100% - 179px); margin: 75px 89.500px 75px 89.500px;">

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 hidden-xs" >

        </div>
        <div class="col-lg-10 col-md-10  col-sm-10 col-xs-12" style="">
            <div class="col-lg-6 col-md-6  col-sm-6 col-xs-6" style="">
                <h4 style="margin:10px 0px 10px 0px;"><i class="icon-newspaper-1"></i>ใบเสร็จ</h4>
            </div>
            <div class="col-lg-6 col-md-6  col-sm-6 col-xs-6" style="">
                <form action="" class="search-form">
                    <div class="form-group has-feedback">
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" class="form-control" name="search" id="search" placeholder="Search ID Receipt">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                </form>
            </div>
            <div class="clearfix">          
            </div>
            <hr style="margin:0px 0px 20px 0px;">
        </div>


        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" >
                <h5 style=" "><a onClick="$('#step-2').hide(); $('#step-1').show();" ><i class="icon-menu"></i> รายการที่สั่ง</a></h5>
                <h5 style=""><a onClick="$('#step-1').hide(); $('#step-2').show();" ><i class="icon-history"></i> ประวัติการทำรายการ</a></h5>
            </div>
            <div id="step-1">
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="">
                    <div id="accordion" role="tablist" aria-multiselectable="true" >
                        <div class="panel panel-default">
                            <?php
                            $a = 0;
                            foreach ($paymet_id as $key) {
                                ?>
                                <div class = "panel-heading" role = "tab" id = "heading<?php echo $a; ?>">
                                    <h4 class = "panel-title">
                                        <div data-toggle = "collapse" data-parent = "#accordion" href = "#collapse<?php echo $a; ?>" aria-expanded = "false" aria-controls = "collapse<?php echo $a; ?>">
                                            <strong>รหัสการสั่งซื้อ : <small><?php echo $key->txn_id; ?></small></strong>
                                            <small class="hidden-xs"><?php echo date("d M Y H:i", strtotime($key->payment_date)); ?> น.</small>
                                            <?php if ($key->payment_status == "1") { ?>
                                                <strong style="margin:0px 20px 0px 0px; float: right; top: -9px; color: red;" ><i class="icon-"> </i> Pending </strong>
                                                <a href="" ></a><button style="margin:0px 30px 0px 0px; float: right; top: -9px;" onClick="window.location.href = '<?php echo base_url("my_customer/payment_confirm?txt_id=$key->txn_id"); ?>';" style="margin: 15px " class="btn bg-gray hvr-shutter-out-horizontal" type="button"><i class="icon-ok-circled"> </i> ยืนยันการชำระ </button>
                                            <?php } else if ($key->payment_status == "2") { ?>
                                                <strong style="margin:0px 20px 0px 0px; float: right; top: -9px; color: #f36f21;" ><i class="icon-"> </i> Verify </strong>
                                            <?php } else if ($key->payment_status == "0") { ?>
                                                <strong style="margin:0px 20px 0px 0px; float: right; top: -9px; color: #04bd00;" ><i class="icon-"> </i> Complete </strong>
                                            <?php } else { ?>
                                                <strong style="margin:0px 20px 0px 0px; float: right; top: -9px; color: red;" ><i class="icon-"> </i> Failed (ติดต่อผู้ดูแลระบบ) </strong>
                                            <?php } ?>
                                        </div>
                                    </h4>
                                </div>
                                <div id = "collapse<?php echo $a; ?>" class = "panel-collapse collapse" role = "tabpanel" aria-labelledby = "heading<?php echo $a; ?>">
                                    <ol>
                                        <?php
                                        foreach ($paymet_detail[$a] as $key => $value) {
                                            $total = $value->payment_gross;
                                            ?>
                                            <li><h6><?php echo $value->sm_autoid; ?> - <?php echo $value->sm_productname; ?> - ราคา <strong style=""><?php echo $value->ss_price; ?></strong> บาท </h6></li>
                                        <?php } ?>
                                    </ol>
                                    <ul class="list-group">
                                        <li class="list-group-item" style="padding: 25px 20px 25px 20px;"><h6 style="margin: 0px; padding: 0px;"><strong style="float:right; margin-right: 20px; padding: 0px;">ราคา <?php echo $total; ?> บาท</strong></h6></li>
                                    </ul>
                                </div>
                                <?php
                                $a++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="step-2" style="display:none;">
                <div class="col-lg-10 col-md-10  col-sm-10 col-xs-12" style="">
                    <div id="accordion2" role="tablist" aria-multiselectable="true" >
                        <div class="panel panel-default">
                            <?php
                            $i = 0;
                            foreach ($paymet_id as $key) {
                                if ($key->payment_status != "0") {
                                    
                                } else {
                                    ?>
                                    <div class = "panel-heading" role = "tab" id = "heading<?php echo $i; ?>">
                                        <h4 class = "panel-title">
                                            <div data-toggle = "collapse" data-parent = "#accordion2" href = "#collapse2<?php echo $i; ?>" aria-expanded = "false" aria-controls = "collapse2<?php echo $i; ?>">
                                                <strong>เลขที่ใบเสร็จ: <small><?php echo $key->txn_id; ?></small></strong>
                                                <small class="hidden-xs"><?php echo date("d M Y H:i", strtotime($key->payment_date)); ?> น.</small>
                                                <button style="margin:0px; float: right; top: -9px;" onClick="window.open('<?php echo base_url("my_customer/print_receipt?txt_id=$key->txn_id"); ?>');" style="float: right; margin: 15px " class="btn bg-gray hvr-shutter-out-horizontal" type="button"><i class="icon-print"> </i> พิมพ์ </button>
                                            </div>
                                        </h4>
                                    </div>
                                    <div id = "collapse2<?php echo $i; ?>" class = "panel-collapse collapse" role = "tabpanel" aria-labelledby = "heading<?php echo $i; ?>">
                                        <ol>
                                            <?php foreach ($paymet_detail[$i] as $key => $value) { ?>
                                                <li><h6><?php echo $value->sm_autoid; ?> - <?php echo $value->sm_productname; ?></h6></li>
                                            <?php } ?>
                                        </ol>
                                    </div>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <div class="clearfix"></div>
</div>
<?php $this->load->view('view_footerproduct'); ?>
<script>
    $(document).ready(function () {
        $("#search").on("input", function () {
            var search = $("#search").val().trim();
            if (search != "") {
                $(".search-form .form-group").addClass("hover");

            } else {
                $(".search-form .form-group").removeClass("hover");
            }
            $.ajax({
                url: "<?php echo base_url('my_customer/selectlike_payment_history'); ?>",
                method: "POST",
                datatype: "html",
                data: "search=" + search,
                success: function (redata) {
                    //                     alert(redata);
                    $("#accordion2").empty().html(redata);
                }
            });

        });
    });
</script>
<style>
    .search-form .form-group {
        float: right !important;
        transition: all 0.35s, border-radius 0s;
        width: 32px;
        height: 32px;
        background-color: #fff;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
        border-radius: 25px;
        border: 1px solid #ccc;
    }
    .search-form .form-group input.form-control {
        padding-right: 20px;
        border: 0 none;
        background: transparent;
        box-shadow: none;
        display:block;
    }
    .search-form .form-group input.form-control::-webkit-input-placeholder {
        display: none;
    }
    .search-form .form-group input.form-control:-moz-placeholder {
        /* Firefox 18- */
        display: none;
    }
    .search-form .form-group input.form-control::-moz-placeholder {
        /* Firefox 19+ */
        display: none;
    }
    .search-form .form-group input.form-control:-ms-input-placeholder {
        display: none;
    }
    .search-form .form-group:hover,
    .search-form .form-group.hover {
        width: 100%;
        border-radius: 4px 25px 25px 4px;
    }
    .search-form .form-group span.form-control-feedback {
        position: absolute;
        top: -1px;
        right: -2px;
        z-index: 2;
        display: block;
        width: 34px;
        height: 34px;
        line-height: 34px;
        text-align: center;
        color: #3596e0;
        left: initial;
        font-size: 14px;
    }

</style>
<div class="row">
</div>