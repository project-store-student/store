<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Store.com</title>
    </head>
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#EDEFF1 !important;">
        <div class="container" > 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" id="nav-bar" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span id="span-icon" class="icon-align-justify "></span>
                </button>
                <a class="navbar-brand" style="padding: 2px 0px" id="index" href="<?php echo base_url("product/"); ?>"><img width="49" src="<?php echo base_url('assets/images/logo.png') ?>"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a id="index-product" href="#product">สินค้า</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">เกี่ยวกับเรา</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">ติดต่อกับเรา</a>
                    </li>

                    <li class="page-scroll">
    <!--                    <a id="" style="height: 10px; width: 12em;" href="" class="popover-markup trigger" data-placement="bottom" ><i class="icon-basket"></i>List cart<span id="option"></span><span id="amount" class="badge"></span></a> -->
                        <a href="<?php echo base_url('product/list-cart'); ?>" class="popover-markup trigger" data-placement="bottom" ><i class="icon-basket"></i>List cart<span id="option"></span><span id="amount" class="badge"></span></a> 
                    </li>
                    <li class="page-scroll-img hidden-xs">
                        <a style="padding: 0px 0px 0px 15px" href="<?php echo (isset($_SESSION['customer']['link'])) ? $_SESSION['customer']['link'] : ''; ?>"><img style="border-radius: 50%" src="<?php echo (isset($_SESSION['customer']['picture'])) ? $_SESSION['customer']['picture'] : ''; ?>"></a>
                    </li>
                    <?php if (empty($_SESSION['customer']['id'])) { ?>
                        <li class = "page-scroll">
                            <a href = "<?php echo product_login_url(); ?>"><i class = "icon-large icon-lock"></i>เข้าสู่ระบบ</a>
                        </li>
                    <?php } else {
                        ?>
                        <li id="nav-bar-user" class="page-scroll" style="width: 169px;">
                            <a id="a-user" class="dropdown-toggle" data-toggle="dropdown" href = "javascript:void(0);"><i class ="icon-large icon-user hidden-md hidden-lg"></i><?php echo $_SESSION['customer']['name']; ?> <span class="caret" style="float:right; margin-top: 8px; margin-left: 8px;"></span></a>
                            <ul class="dropdown-menu" style="background-color: #e7e7e7 !important; border-top:1px solid #f5f5f5;">
                                <li id="favorites"><a  href="<?php echo base_url('my_customer/show_favorites'); ?>"><i class ="icon-heart"></i> รายการโปรด <span class="badge">0</span></a></li>
                                <li><a href="<?php echo base_url("my_customer/customer_edit_profile"); ?>"><i class ="icon-edit"></i> แก้ไขข้อมูลส่วนตัว</a></li>
                                <li><a href="<?php echo base_url("my_customer/payment_history"); ?>"><i class ="icon-history"></i> ประวัติการทำรายการ </a></li>
                                <li class="divider" style="background-color: #f5f5f5 !important;"></li>
                                <li><a href="<?php echo base_url('my_customer/logout'); ?>"><i class ="icon-logout"></i> ออกจากระบบ</a></li>
                            </ul>
                        </li>
                        <li id="nav-bar-user-xs" class = "page-scroll" style="display: none;">
                            <a href = "javascript:void(0);"><i class ="icon-large icon-user hidden-md hidden-lg"></i><?php echo $_SESSION['customer']['name']; ?> </a>
                            <a class="favorites" href="<?php echo base_url('my_customer/show_favorites'); ?>"><i class ="icon-heart"></i> รายการโปรด <span class="badge">0</span></a>             
                            <a href="<?php echo base_url("my_customer/customer_edit_profile"); ?>"><i class ="icon-edit"></i> แก้ไขข้อมูลส่วนตัว</a>
                            <a href="<?php echo base_url("my_customer/payment_history"); ?>"><i class ="icon-history"></i> ประวัติการทำรายการ </a>    
                            <a href="<?php echo base_url('my_customer/logout'); ?>"><i class ="icon-logout"></i> ออกจากระบบ</a>
                        </li>
                    <?php }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <style>


        @media(max-width: 768px){ 

            .navbar-collapse { 
                min-height: 100% !important;
                max-height: 100% !important;
            } 

        }
        .fix-height{
            height: 1800em;
            overflow: hidden;
        }


        .popover{
            width: 450px;
        }
        .col-list-cart{
            text-align: center;
        }
        .popover-content {
            color: #000;
            padding: 9px 0px;
        }
        .btn-radius{
            border-radius: 25%;
        }
        .border-button{
            border-bottom: 1px solid #E1E1E1;
            text-align: center;
        }
        header {
            text-align: center;
            color: #fff;
            background: #18bc9c;

            position: fixed;
            width:100%;
            z-index: 1;
            height: 88%;
            overflow: hidden;
            top: 0;
            left: 0;
        }
        .dropdown-menu {
            border-top: 0px solid rgba(0, 0, 0, .15);
            border-right: 1px solid #e5e5e5;
            border-left:  1px solid #e5e5e5;
            border-bottom:  1px solid #e5e5e5;
            z-index:1;
            width: 169px;
            text-align: left;
            box-shadow: 0 6px 12px rgba(255, 255, 255, .15);
            -webkit-box-shadow: 0 6px 12px rgba(255, 255, 255, .1);
        }

        .content-wrapper{
            background-color: white;
            top: 93%;
            min-height: 12%;
            position:absolute;
            z-index: 2;
            width: 100%;
        }
        /* HERE ENDS THE MAGIC */
        header .container {
            padding-top: 150px;
            padding-bottom: 50px;
        }

        header img {
            display: block;
            margin: 0 auto 20px;
        }

        header .intro-text .name {
            display: block;
            text-transform: uppercase;
            font-family: Montserrat, "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 2em;
            font-weight: 700;
        }

        header .intro-text .skills {
            font-size: 1.25em;
            font-weight: 300;
        }

        section {
            padding-top: 0px;
            padding-bottom:25px;
            width: 100%;
        }

        section h2 {
            margin: 0;
            font-size: 3em;
        }
        hr.star-light,
        hr.star-primary {
            margin: 25px auto 30px;
            padding: 0;
            max-width: 250px;
            border: 0;
            border-top: solid 5px;
            text-align: center;
        }

        hr.star-light:after,
        hr.star-primary:after {
            content: "\f005";
            display: inline-block;
            position: relative;
            top: -.8em;
            padding: 0 .25em;
            font-family: FontAwesome;
            font-size: 2em;
        }

        hr.star-light {
            border-color: #fff;
        }

        hr.star-light:after {
            color: #fff;
            background-color: #18bc9c;
        }

        hr.star-primary {
            border-color: #2c3e50;
        }

        hr.star-primary:after {
            color: #2c3e50;
            background-color: #fff;
        }

        section.primary h2{
            color: #2c3e50;
        }

        section.success{
            background-color: #18bc9c;
            color: #fff;
        }
        form .error {
            color: #ff0000;
        }
        form input.error {
            border:1px solid red;
        }



    </style>

    <script>
        var chk = "0";
        $(document).ready(function () {
            $('#nav-bar').on("click", function () {
                if (chk === "0") {
                    $('#bs-example-navbar-collapse-1').addClass("fix-height");
                    chk = "1";
                } else {
                    $('#bs-example-navbar-collapse-1').removeClass("fix-height");
                    chk = "0";
                }
                $('#span-icon').toggleClass("icon-align-justify icon-cancel-3");
            });
            $.ajax({
                url: "<?php echo base_url("my_customer/check_favorites"); ?>",
                method: "post",
                datatype: "html",
                cache: false,
                success: function (response) {
                    $("#favorites").empty();
                    $("#favorites").append("<a href='<?php echo base_url('my_customer/show_favorites'); ?>'><i class ='icon-heart'></i> รายการโปรด <span id='count' class='badge'></span></a>");
                    $(".favorites").empty();
                    $(".favorites").append("<i class ='icon-heart'></i> รายการโปรด <span class='badge count'></span>");
                    $(".count").html(response);
                    $("#count").html(response);
                }
            });
            $.ajax({
                url: "<?php echo base_url("my_customer/add_item"); ?>",
                method: "POST",
                datatype: "html",
                data: "id=undefined",
                cache: false,
                success: function (response) {
                    //alert(response);
                    if (response == "begin") {

                    } else {
                        $("#option").html(": ");
                        $("#amount").html(response);
                    }
                }
            });
            $('body').on('click', function (e) {
                $('.popover-markup').each(function () {
                    if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                        $(this).popover('hide');
                    }
                });
            });
            $('a[href*=#]:not([href=#])').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top
                        }, 300);
                        return false;
                    }
                }
            });
            $('#index,#index-product').on("click", function () {
                var url = window.location.href;
                var res1 = url.replace("http://store.com/product/", "");
                var res2 = res1.split("/");
                var res3 = res1.split("#");
                var res4 = res1.split("?");
                var key1 = res2[0];
                var key2 = res3[0];
                var key3 = res4[0];
                if (key1 == "index") {
                    $("#index").attr("href", "#page-top");
                    $("#index-product").attr("href", "#product");
                } else if (key2 == "index") {
                    $("#index").attr("href", "#page-top");
                    $("#index-product").attr("href", "#product");
                } else if (key3 == "index") {
                    $("#index").attr("href", "#page-top");
                    $("#index-product").attr("href", "#product");
                } else {
                    $("#index").attr("href", "<?php echo product_url(); ?>");
                    $("#index-product").attr("href", "<?php echo product_url(); ?>");
                }
            });
            $("#list-cart").on("click", function () {
                $.ajax({
                    url: "<?php echo base_url("my_customer/show_list_cart"); ?>?dfg=" + Math.random(),
                    method: "POST",
                    datatype: "html",
                    cache: false,
                    success: function (response) {
                        // alert(response);
                        $('.popover-markup').popover({
                            html: true,
                            title: function () {
                                return $(this).parent().find('.head').html();
                            },
                            content: function () {
                                alert(response);
                                $('#content_show').empty();
                                $("#content_show").append(response);
                                return $('.popover-markup').parent().find('.content').html();
                            }
                        });
                    }
                });
            });
//            $(document).on("load resize scroll", "window", function (e) {
            $(window).on("load resize scroll", function (e) {
                width = $(this).width();
                var url = window.location.href;
                var res1 = url.replace("http://store.com/product/", "");
                if (res1[0] == null) {
                    var widthhtcal = $(".test-resize-1 .col-item").width();
                    $('.img-1').attr('style', "width:" + widthhtcal + 'px !important;');
                    console.log(widthhtcal);

                }
                var widthhtcal_slide_small = $(".resize-slide-small .col-item").width();
                $('.img-slide-small').attr('style', "width:" + widthhtcal_slide_small + 'px !important;');
                var widthhtcal_slide = $(".resize-slide .col-item").width();
                $('.img-slide').attr('style', "width:" + widthhtcal_slide + 'px !important;');
                var widthhtcal = $(".test-resize-" + res1[0] + " .col-item").width();
                $('.img-' + res1[0]).attr('style', "width:" + widthhtcal + 'px !important;');
                var width_p = $("#cart tbody td .row .col-sm-8").width();
//                var height_img_cart = ($("#cart tbody td .row .col-sm-4").height() / 2) / 2;
                var width_img_cart = $("#cart tbody td .row .col-sm-4").width();
                $('.list-img-2').attr('style', "width:" + width_img_cart + 'px !important;  top:7.5px; position:relative;');
                $('#detail-p').attr('style', "width:" + width_p + 'px !important; height: 58pt !important;');
//                alert(widthhtcal);
                if (width <= 751) {    //768 == 751
                    $("#nav-bar-user").hide();
                    $("#nav-bar-user-xs").show();
                    if (width <= 583) {
                        $("#td-cart").attr("colspan", "2");
                    } else if (width <= 835) {
//                        $('#detail-p').attr('style', "width:" + width_p + 'px !important; height: 30pt !important;');
                    } else if (width <= 751) {
                        $("#td-cart").removeClass("hidden-xs");
                        $("#td-cart").attr("colspan", "3");
                    } else {
                        $("#td-cart").addClass("hidden-xs");
                        $("#td-cart").attr("colspan", "2");
                    }
                } else {
                    $("#nav-bar-user").show();
                    $("#nav-bar-user-xs").hide();
                }
            });
        });

    </script>


