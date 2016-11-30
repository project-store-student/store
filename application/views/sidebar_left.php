 <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/header.css"); ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/content.css"); ?>">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/favicons.png');?>"/>

<?php $this->load->view("bootstrap_and_js.php"); ?>
    <?php if (empty($_SESSION['sessemp'])) { ?>
            <?php
        } else if ($_SESSION['sessemp']['status'] ==0) {
            $id = $_SESSION['sessemp']['id'];
            ?>
<div id="sidebar_left" class="sidebar-left">
<div class="navbar-branding">
<span id="sidebar_l"  class="icon-menu active"></span>
<a href="<?=base_url()?>" class="navbar-brand">
Store&nbspAdmin</a>

</div>

<div class="sidebar-left-content">
          <!-- Start: Sidebar Header-->
          <header class="sidebar-header">
            <!-- Sidebar Widget - Author-->
             <div class="sidebar-widget author-widget">
              <div class="media"><a href="<?php echo base_url("admin/view?id=$id"); ?>" class="media-left"><span class="icon-user-male"></span></a>
                <div class="media-body">
                  <div class="media-author"><center><?=$_SESSION['sessemp']['name']?></center></div>
                  <center><a href="<?php echo base_url("admin/update?id=$id"); ?>" class="sidebar-menu-toggle">แก้ไข</a>
                  <a href = "<?php echo base_url("admin/logout"); ?>" class="sidebar-menu-toggle">Logout</a></center>
                </div>
              </div>
            </div> 
          
          </header>
        <ul class="sidebar-menu">
            <li class="sidebar-label"><a href="<?php echo base_url("product/"); ?>">หน้าขายสินค้า</a></li>
            <li class="sidebar-label">Menu</li>
            <li class="sidebar-menu-li"> 
            <a class="a1-hover" href="<?php echo base_url("admin/page_store"); ?>"><i class="icon-stackoverflow icon-ohver"></i><span class="sidebar-title">คลังสินค้า</span><span class="show-title1">คลังสินค้า</span></a></li>
             <li class="sidebar-menu-li">
             <a class="a2-hover" href = "<?php echo base_url("admin/approval"); ?>"><i class="icon-ok icon-ohver"></i><span class="sidebar-title">อนุมัติ</span><span class="show-title2">อนุมัติ</span></a></li>
              <li class="sidebar-menu-li">
              <a  class="a3-hover" href="<?php echo base_url("admin/page_emp"); ?>"><i class="icon-child icon-ohver"></i><span class="sidebar-title">พนักงาน</span><span class="show-title3">พนักงาน</span></a></li>
               <li class="sidebar-menu-li">
               <a class="a4-hover" href="javascript:void(0)"><i class="icon-doc-text icon-ohver"></i><span class="sidebar-title">รายงาน</span><span class="show-title4">รายงาน</span></a></li>
          
               
          </ul>
        </div>
      </div>
      <div class="helpTabRight" id="helpTab">
            <CENTER><i class="icon-sliders"><div style="display: none;margin-right: 150px"></div></i></CENTER>
                <div class="div-slide" href="<?php echo base_url("admin/add_product_to_sale"); ?>">สินค้าลงเว็บ</div>
                <div class="div-order"  onclick="window.location.href = '<?php echo base_url('admin/order'); ?>'">สั่งสินค้า</div>
            </div>
   <?php
        } else {
            $id = $_SESSION['sessemp']['id'];
            ?>
<div id="sidebar_left" class="sidebar-left">

<div class="navbar-branding">
<a href="<?=base_url()?>" class="navbar-brand">
Store&nbspEmployee
</a>
<span id="sidebar_l"  class="icon-menu active"></span>
</div>
<div class="sidebar-left-content">
          <!-- Start: Sidebar Header-->
          <header class="sidebar-header">
            <!-- Sidebar Widget - Author-->
             <div class="sidebar-widget author-widget">
              <div class="media"><a href="<?php echo base_url("admin/view?id=$id"); ?>" class="media-left"><span class="icon-user-male"></span></a>
                <div class="media-body">
                  <div class="media-author"><center><?=$_SESSION['sessemp']['name']?></center></div>
                  <center><a href="<?php echo base_url("admin/update?id=$id"); ?>" class="sidebar-menu-toggle">แก้ไข</a>
                  <a href = "<?php echo base_url("admin/logout"); ?> " class="sidebar-menu-toggle">Logout</a></center>
                </div>
              </div>
            </div> 
          
          </header>
        <ul class="sidebar-menu">
            <li class="sidebar-label"><a href="<?php echo base_url("product"); ?>">หน้าขายสินค้า</a></li>
            <li class="sidebar-label">Menu</li>
             <li class="sidebar-menu-li">
            <a class="a1-hover" href="<?php echo base_url("admin/page_store"); ?>"><i class="icon-stackoverflow icon-ohver"></i><span class="sidebar-title">คลังสินค้า</span><span class="show-title1">คลังสินค้า</span></a></li>
               
          </ul>
        </div>
      </div>
      <div class="helpTabRight" id="helpTab">
                 <i class="icon-sliders"><div style="display: none;margin-right: 200px"></div></i>
                <div class="div-slide" href="<?php echo base_url("admin/adduser"); ?>">เพิ่มพนักงาน</div>
                <div class="div-order"  onclick="window.location.href = '<?php echo base_url('admin/order'); ?>'">สั่งสินค้า</div>
            </div>
 <?php } ?>
   
<script type="text/javascript">
$(".click").click(function(){
        $(".navbar-brand").hide();    
});

  $(document).ready(function () {

    var Timer_menu;
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


    var Timer;
    $(".icon-menu").click( function () {
       if ( $(this).hasClass("active") ) {
                window.clearTimeout(Timer);
                Timer = setTimeout(function () {
                     $(".sidebar-left").stop().animate({width:"5%"}, 200);
                     $(".content").stop().animate({marginLeft:"5%"}, 200);
                     $(".head").stop().animate({width:"95%"}, 200);  
                    $(".a1-hover").addClass("show1");
                    $(".a2-hover").addClass("show2");
                    $(".a3-hover").addClass("show3");
                    $(".a4-hover").addClass("show4");
                    $(".sidebar-menu-li").addClass("click");
                    setTimeout(function () {
        $(".navbar-brand").hide();    
        $(".sidebar-title").css("display","none");
        $(".sidebar-header").hide();   
        $(".sidebar-label").hide();   
        $(".sidebar-menu-li").css("margin","0px 0px");
        $(".sidebar-menu-li").css("font-size","30px");
        $(".sidebar-menu-li").css("padding","5px 0px");
        $(".icon-menu").css("padding","15px 14px");   
        $(".sidebar-menu").css("padding","45px 11px");

                    }, 0);
                }, 0);
          
  } else {
   window.clearTimeout(Timer);
                Timer = setTimeout(function () {
                      $(".sidebar-left").stop().animate({width:"20%"}, 200);
                      $(".content").stop().animate({marginLeft:"20%"}, 200);
                      $(".head").stop().animate({width:"80%"}, 200);
                    $(".a1-hover").removeClass("show1");
                    $(".a2-hover").removeClass("show2");
                    $(".a3-hover").removeClass("show3");
                    $(".a4-hover").removeClass("show4");
                    $(".sidebar-menu-li").removeClass("click");

                    setTimeout(function () {
        $(".navbar-brand").show();           
        $(".sidebar-title").css("display","");       
        $(".sidebar-header").show();   
        $(".sidebar-label").show();
        $(".sidebar-menu-li").css("margin","0px 0px");
        $(".sidebar-menu-li").css("font-size","12px");
        $(".sidebar-menu-li").css("padding","0px 10px");
        $(".icon-menu").css("padding","15px 14px");   
        $(".sidebar-menu").css("padding","20px 50px");

                    }, 200);
                }, 0);
  }
   $(this).toggleClass("active");
  });

            });

  $(".a4-hover").click(function(){
                      $.ajax({
                url: "<?php echo base_url("admin/all_report"); ?>",
                success: function (response) {
                $(".content").empty().append(response);
                }
            });
  });



                    
</script>
