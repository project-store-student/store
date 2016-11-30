<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/header.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/content.css"); ?>">
<link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/favicons.png'); ?>"/>


<?php $this->load->view("bootstrap_and_js.php"); ?>
<?php
if (empty($_SESSION['sessemp'])) {
    
} else if ($_SESSION['sessemp']['status'] == 0) {
    $id = $_SESSION['sessemp']['id'];
    ?>
    <div class="head">
        <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
        <div class="head-content">

            <ul class="head-menu">
                <li class="head-menu-menu"><a class="head-link" href="<?php echo base_url() ?>"><img height="58" src="<?php echo base_url('assets/images/logo2.png') ?>"></a></li>
                <li class="head-menu-menu"><a class="head-link" href="<?php echo base_url('product/') ?>">หน้าขาย</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/page_store') ?>">คลังสินค้า</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/page_emp') ?>">พนักงาน</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/approval') ?>">อนุมัติ</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/all_report') ?>">รายงาน</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/order'); ?>">สั่งสินค้า</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/product_sale'); ?>">เพิ่มสินค้าขาย</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/payment_verify'); ?>">ตรวจสอบการชำระเงิน</a></li>

                <li class="head-menu-menu-search"> 
                    <div class="head-search" id="Search">
                        <span class="icon-search"></span>
                        <span class="icon-cancel"></span>   
                        <div class="input-key"><input type="text" class="form-control" name="key" id="key" autofocus="autofocus" placeholder="ค้นหาสินค้า..">
                            <div class="search-overlay fadeOut" style="display: block;">
                                <div class="dropdown-show">
                                    <div class="" id="auto">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div></li>
                <li class="head-menu-menu-user"><a class="head-link"  href="<?php echo base_url('admin/view?id=' . $id) ?>"><?= $_SESSION['sessemp']['name'] ?></a>
                    <ul class="head-menu-menu-user-dropdown" style="display: none;">
                        <li class="user-dropdown-li"><a class="user-dropdown-li-a" href="<?php echo base_url('admin/update?id=' . $id) ?>">แก้ไข</a></li>
                        <li class="user-dropdown-li"><a class="user-dropdown-li-a" href="<?php echo base_url('admin/logout') ?>">Logout</a></li>
                    </ul>
                </li>

            </ul>


        </div>
        <div class="helpTabRight" id="helpTab">
            <CENTER><i class="icon-sliders"><div style="display: none;margin-right: 150px"></div></i></CENTER>
            <div class="div-slide" href="<?php echo base_url("admin/add_product_to_sale"); ?>">เพิ่มสินค้าขาย</div>
            <!-- <div class="div-order"  onclick="window.location.href = '<?php //echo base_url('admin/order');     ?>'">สั่งสินค้า</div> -->
        </div>
    </div>

    <?php
} else {
    $id = $_SESSION['sessemp']['id'];
    ?>
    <div class="head">
        <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
        <div class="head-content">

            <ul class="head-menu">
                <li class="head-menu-menu"><a class="head-link" href="<?php echo base_url() ?>"><img height="58" src="<?php echo base_url('assets/images/logo2.png') ?>"></a></li>
                <li class="head-menu-menu"><a class="head-link" href="<?php echo base_url('product/') ?>">หน้าขาย</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/page_store') ?>">คลังสินค้า</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/approval') ?>">อนุมัติ</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/order'); ?>">สั่งสินค้า</a></li>

                <li class="head-menu-menu-search"> 
                    <div class="head-search" id="Search">
                        <span class="icon-search"></span>
                        <span class="icon-cancel"></span>   
                        <div class="input-key"><input type="text" class="form-control" name="key" id="key" placeholder="ค้นหาสินค้า..">
                            <div class="search-overlay fadeOut" style="display: block;">
                                <div class="dropdown-show">
                                    <div class="" id="auto">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div></li>
                <li class="head-menu-menu-user"><a class="head-link"  href="<?php echo base_url('admin/view?id=' . $id) ?>"><?= $_SESSION['sessemp']['name'] ?></a>
                    <ul class="head-menu-menu-user-dropdown" style="display: none;">
                        <li class="user-dropdown-li"><a class="user-dropdown-li-a" href="<?php echo base_url('admin/update?id=' . $id) ?>">แก้ไข</a></li>
                        <li class="user-dropdown-li"><a class="user-dropdown-li-a" href="<?php echo base_url('admin/logout') ?>">Logout</a></li>
                    </ul>
                </li>

            </ul>


        </div>
        <div class="helpTabRight" id="helpTab">
            <CENTER><i class="icon-sliders"><div style="display: none;margin-right: 150px"></div></i></CENTER>
                <!-- <div class="div-slide" href="<?php //echo base_url("admin/add_product_to_sale");     ?>">เพิ่มสินค้าขาย</div> -->
                <!-- <div class="div-order"  onclick="window.location.href = '<?php //echo base_url('admin/order');   ?>'">สั่งสินค้า</div> -->
        </div>
    </div>
<?php } ?>

</div>

<script type="text/javascript">
    $(document).ready(function () {

        var Timer_menu;
        $(".icon-search").click(function () {
            window.clearTimeout(Timer_menu);
            Timer_menu = setTimeout(function () {
                $('#Search').css('width', "auto");
                setTimeout(function () {
                    $('#Search div').fadeIn();
                    $('#Search span').fadeIn();

                }, 0);
            }, 0);
        });

        $(".icon-cancel").click(function () {
            window.clearTimeout(Timer_menu);
            Timer_menu = setTimeout(function () {
                $('#Search').css('width', "auto");

                setTimeout(function () {
                    $('#Search div').hide();
                    $('#Search .icon-cancel').hide();
                }, 100);
            }, 100);
        });
    });

</script>
<script language="javascript">
    $('#key').on('input', function () {
        var key = $("#key").val().trim();

        $.ajax({
            url: "<?php echo base_url("admin/product_search"); ?>",
            method: "POST",
            datatype: "html",
            data: "key=" + key,
            success: function (redata) {
                if (redata == "not found") {
                    $("#auto").empty();
                    $(".dropdown-show").css("height", "0px");
                } else if (redata == "row0") {
                    $("#auto").empty();
                    $(".dropdown-show").css("height", "0px");
                } else {
                    $(".dropdown-show").css("overflow", "auto");
                    $(".dropdown-show").css("height", "calc(100% - 400px)");
                    $("#auto").html(redata);
                }
            }
        });
    });

</script>
<script>
    var Timer_menu;

    $(".search-overlay").on('click', function () {
        window.clearTimeout(Timer_menu);
        Timer_menu = setTimeout(function () {
            $('#Search').css('width', "auto");
            setTimeout(function () {
                $(".search-overlay").hide();

                $('#Search div').hide();
                $('#Search .icon-cancel').hide();
            }, 100);
        }, 100);
    });
    $(".a").on('click', function () {
        $(".search-overlay").hide();
    });

    $("#helpTab").mouseenter(
            function () {
                window.clearTimeout(Timer_menu);
                Timer_menu = setTimeout(function () {
                    $('#helpTab').css('width', "auto");
                    setTimeout(function () {
                        $('#helpTab span').fadeIn();
                        $('#helpTab div').fadeIn();
                    }, 100);
                }, 100);
            });
    $("#helpTab").mouseleave(
            function () {
                window.clearTimeout(Timer_menu);
                Timer_menu = setTimeout(function () {
                    $('#helpTab').css('width', "auto");
                    $('#helpTab span').hide();
                    $('#helpTab div').hide();

                }, 100);
            });


    $(".div-slide").click(function () {
        var url = $(this).attr("href");
        $.colorbox({
            href: url,
            opacity: 0.5,
            scrolling: false,
        });

    });



    $(".head-menu-menu-user").mouseenter(
            function () {
                window.clearTimeout(Timer_menu);
                Timer_menu = setTimeout(function () {
                    $('.head-menu-menu-user-dropdown').show();
                }, 100);
            });
    $(".head-menu-menu-user").mouseleave(
            function () {
                window.clearTimeout(Timer_menu);
                Timer_menu = setTimeout(function () {
                    $('.head-menu-menu-user-dropdown').hide();
                }, 100);
            });


    if ($('#back-to-top').length) {
        var scrollTrigger = 100, // px
                backToTop = function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#back-to-top').addClass('show');
                    } else {
                        $('#back-to-top').removeClass('show');
                    }
                };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 500);
        });
    }
</script>
