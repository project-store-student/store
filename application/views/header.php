
<?php if (empty($_SESSION['sessemp'])) {
    
} else if ($_SESSION['sessemp']['status'] == 0) {
    $id = $_SESSION['sessemp']['id']; ?>

    <div class="head">
        <div class="head-respon">
            <div class="head-logo"><a   href="<?php echo base_url('admin') ?>"><img height="58" style="padding: 0px 10px;" src="<?php echo base_url('assets/images/logo2.png') ?>"></a>
            </div>
            <div class="head-list">
                <li class="head-btn-list" id="toggle-list">
                    <i class="icon-menu-1"></i>
                </li>
            </div>
        </div>
        <a href="#" id="back-to-top" title="Back to top">&uarr;</a>

        <div class="head-content">

            <ul class="head-menu">
                <li class="head-menu-logo" id="logo"><a  href="<?php echo base_url('admin') ?>"><img style="padding: 0px 10px;" height="58" src="<?php echo base_url('assets/images/logo2.png') ?>"></a></li>
                <!-- <li class="head-menu-menu" id="search-response">
                 <span class="icon-search" id="iconsearch"></span>
                    <input type="text" class="form-control" name="key" id="response_key"  placeholder="ค้นหาสินค้า.."></li> -->

                <li class="head-menu-menu"><a class="head-link" href="<?php echo base_url('product/') ?>">หน้าขาย</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/store') ?>">คลังสินค้า</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/employ') ?>">พนักงาน</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/order'); ?>">สั่งสินค้า</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/approval') ?>">อนุมัติ</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/product_sale'); ?>">เพิ่มสินค้าขาย</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/payment_verify'); ?>">ตรวจสอบการชำระ</a></li>

                <li class="head-menu_report"><a class="head-link"  href="#">รายงาน</a>
                    <ul class="head-menu-report-dropdown" style="display: none;">
                        <li class="report-dropdown-li"><a class="report-dropdown-li-a" href = "<?php echo base_url("admin/report_order"); ?>">สั่งสินค้า</a></li>
                        <li class="report-dropdown-li"><a class="report-dropdown-li-a" href = "<?php echo base_url("admin/report_store_sale"); ?>">สินค้าขาย</a></li>

                    </ul>

                </li>

                <li class="head-menu-menu-search" id="li-search"> 
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
        <!-- <div class="helpTabRight" id="helpTab">
                 <CENTER><i class="icon-menu"><div style="display: none;margin-right: 150px"></div></i></CENTER>
                      <div class="div-slide" href="<?php //echo base_url("admin/add_product_to_sale");  ?>">เพิ่มสินค้าขาย</div> 
                     <div class="div-order"  onclick="//window.location.href = '<?php //echo base_url('admin/order');  ?>'">สั่งสินค้า</div>
                 </div> -->
    </div>

<?php } else {
    $id = $_SESSION['sessemp']['id']; ?>
    <div class="head">
        <div class="head-respon">
            <div class="head-logo"><a class="head-link" href="<?php echo base_url('admin') ?>"><img height="58" src="<?php echo base_url('assets/images/logo2.png') ?>"></a>
            </div>
            <div class="head-list">
                <li class="head-btn-list" id="toggle-list">
                    <i class="icon-menu-1"></i>
                </li>
            </div>
        </div>
        <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
        <div class="head-content">

            <ul class="head-menu">
                <li class="head-menu-logo" id="logo"><a class="head-link" href="<?php echo base_url('admin') ?>"><img height="58" src="<?php echo base_url('assets/images/logo2.png') ?>"></a></li>
                <li class="head-menu-menu"><a class="head-link" href="<?php echo base_url('product/') ?>">หน้าขาย</a></li>
                <li class="head-menu-menu"><a class="head-link"  href="<?php echo base_url('admin/order'); ?>">สั่งสินค้า</a></li>

                <li class="head-menu-menu-search" id="li-search"> 
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
        <!--   <div class="helpTabRight" id="helpTab">
                   <CENTER><i class="icon-menu"><div style="display: none;margin-right: 150px"></div></i></CENTER>
                      <div class="div-slide" href="<?php //echo base_url("admin/add_product_to_sale");  ?>">เพิ่มสินค้าขาย</div> 
                       <div class="div-order"  onclick="//window.location.href = '<?php // echo base_url('admin/order'); ?>'">สั่งสินค้า</div>
                   </div> -->
    </div>
<?php } ?>

</div>

<script type="text/javascript">
    $("#toggle-list").click(function () {
        $('.head-content').slideToggle('fast');
    });
    $(document).ready(function () {

// $(window).on('load resize scroll' ,function(){
//     var width =$('body').width();
//     if(width > 991){
// $('.head-content').show();
//     }else{
// $('.head-content').hide();
//     }
// });

        var Timer_menu;
        $(".icon-search").click(function () {
            window.clearTimeout(Timer_menu);
            Timer_menu = setTimeout(function () {
                $('#Search').css('width', "auto");
                $(".head-menu-menu-user").hide();
                $(".head-menu_report").hide();
                $(".head-menu-menu").hide();

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
                    $(".head-menu_report").show(300);
                    $(".head-menu-menu").show(300);
                    $(".head-menu-menu-user").show(300);
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
            url: "<?php echo base_url("admin/search_product"); ?>",
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
                    $(".dropdown-show").css("height", "calc(100% - 100px)");
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
                $(".head-menu_report").show(300);
                $(".head-menu-menu").show(300);
                $(".head-menu-menu-user").show(300);
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
            opacity: 0.9,
            scrolling: false,
            fixed: true,
            closeButton: false,
        });

    });



    $(".head-menu-menu-user").mouseenter(
            function () {
                window.clearTimeout(Timer_menu);
                Timer_menu = setTimeout(function () {
                    $('.head-menu-menu-user-dropdown').show();
                }, 200);
            });
    $(".head-menu-menu-user").mouseleave(
            function () {
                window.clearTimeout(Timer_menu);
                Timer_menu = setTimeout(function () {
                    $('.head-menu-menu-user-dropdown').hide();
                }, 0);
            });
    $(".head-menu_report").mouseenter(
            function () {
                window.clearTimeout(Timer_menu);
                Timer_menu = setTimeout(function () {
                    $('.head-menu-report-dropdown').show();
                }, 200);
            });
    $(".head-menu_report").mouseleave(
            function () {
                window.clearTimeout(Timer_menu);
                Timer_menu = setTimeout(function () {
                    $('.head-menu-report-dropdown').hide();
                }, 0);
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
