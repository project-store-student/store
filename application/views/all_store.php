<!DOCTYPE html>
<html>
    <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- HEADER -->
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png');?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/all.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>"> 
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.4.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url("assets/fontello/css/fontello.css"); ?>"> 
<!-- END HEADER -->
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.validate.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/colorbox/jquery.colorbox-min.js"); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url("assets/js/colorbox/example4/colorbox.css"); ?>"> 
<link rel="stylesheet" href="<?php echo base_url("assets/fontello/css/animation.css"); ?>"> 


        <title>Store</title>
        <script>

function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
     var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var option=getCookie("option");
     if(option=='list'){
        // setTimeout(function(){$('#products .item').addClass('list-group-item')}, 0);
        // setTimeout(function(){$(".caption").show()}, 0); 
        $('#products .item').addClass('list-group-item');
        $(".caption").show();
}else{
      $('#products .item').removeClass('list-group-item');
        $('#products .item').addClass('grid-group-item');
        $(".caption").hide();
}
    
}

    $(document).ready(function() {
checkCookie();
 $('#list').click(function(event){event.preventDefault();
        $('#products .item').addClass('list-group-item');
        $(".caption").show();
           setCookie("option", 'list', 30);

    });

    $('#grid').click(function(event){event.preventDefault();
        $('#products .item').removeClass('list-group-item');
        $('#products .item').addClass('grid-group-item');
        $(".caption").hide();
           setCookie("option", 'grid', 30);
    });


$(".edit_product").click(function(){
 var url = $(this).attr("href");
        $.colorbox({
            href: url,
            opacity: 0.9,
            scrolling: true,
              fixed:true,
            closeButton:false,
        });
});

$(".list-group-image").click(function(){
 var url = $(this).attr("href");
        $.colorbox({
            href: url,
            opacity: 0.9,
            scrolling: true,
              fixed:true,
            closeButton:false,
        });
});


$(window).on('load resize scroll' ,function(){
    var width =$('body').width();
if(width<=749){
     $('#products .item').removeClass('list-group-item');
        $('#products .item').addClass('grid-group-item');
        $(".caption").hide();
}else{
     var option=getCookie("option");
     if(option=='list'){
        $('#products .item').addClass('list-group-item');
        $(".caption").show();
}else{
      $('#products .item').removeClass('list-group-item');
        $('#products .item').addClass('grid-group-item');
        $(".caption").hide();
}
}
});


});

    function deleterow(id) {
    if (confirm("ลบสินค้านี้ !") == true) {
  $.ajax({
                url: "<?php echo base_url('admin/delete_row_sm')?>",
                method: "POST",
                data: "id="+id,
                success: function (response) {
                    if(response=="success"){
                $("#"+id).slideUp("slow");
                    }else{
            alert("สินค้านี้ขายอยู่ ไม่สามารถลบได้ !");
                    }

            }
            
            });
    }
}



</script>
    </head>
    <body>
        <?php $this->load->view("header") ?>
<div class="content"></div>
   <div class="rp-store-sale-content" style="width: 100%;">
<center><h3>คลังสินค้า</h3></center>
    <div class="line-page">
    <div class="page-grid-list">
        <div class="paging" style="float: left;"><strong>Page</strong><?=$pagination?></div>
        <div class="btn-group hidden-xs">
        <a href="#" id="grid" class="btn btn-default btn-sm"><span
                class="icon-th"></span></a>
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="icon-th-list">
            </span></a> 
        </div>
             <div class="frm-sort hidden-xs"> 
             <ul class="frm-sort-item"> 
             <li class="sort-seleted"><?=$sort?><i class="icon-down-dir" style="float: right;"></i>
            <ul class="sort-item">
    <li class="sort-list"><a href="<?php echo base_url('admin/store/sm_autoid/desc/1/0')?>">Highest ID</a></li>
    <li class="sort-list"><a href="<?php echo base_url('admin/store/sm_autoid/asc/2/0')?>">Lowest ID</a></li>
    <li class="sort-list"><a href="<?php echo base_url('admin/store/sm_amount/desc/3/0')?>">Highest Amount</a></li>
     <li class="sort-list"><a href="<?php echo base_url('admin/store/sm_amount/asc/4/0')?>">Lowest Amount</a></li>
     <li class="sort-list"><a href="<?php echo base_url('admin/store/sm_productname/desc/5/0')?>">A-Z</a></li>
     <li class="sort-list"><a href="<?php echo base_url('admin/store/sm_productname/asc/6/0')?>">Z-A</a></li>
         </ul>
        </li>
        </ul>
        </div>
    </div>
    </div>
    <div id="products" class="row list-group" style="width: 100%;margin: 0;">

        <?php foreach ($sm as  $value) {
?>

        <div class="item col-lg-2 col-md-2 col-sm-3 col-xs-4" id="<?=$value->sm_autoid?>">
                <img class="group list-group-image"  href="<?php echo base_url("admin/edit_row_sm?ty_id=$value->sm_typeid&id=$value->sm_autoid"); ?>" src="<?php echo base_url("admin/showupload/$value->sm_image"); ?>_backpage.jpg"  title="<?= $value->sm_productname; ?>" alt="<?= $value->sm_productname; ?>" style="cursor: pointer;">
                <div class="caption">
                    <h3 class="group inner list-group-item-heading">
                        <?=$value->sm_autoid?> <?=$value->sm_productname?></h3>
                         <h4 class="group inner list-group-item-heading">
                        <?=$value->ty_name?></h4>
                        <h5 class="group inner list-group-item-heading">
                        <?=$value->ct_name?></h5>
                    <p class="group inner list-group-item-text">
                         <?=$value->sm_productdetail?></p>
                    <div class="row">
                            <p  style="font-size: 12px;"><label>คงเหลือ :</label> <?=$value->sm_amount?><br>
                            <label>สถานะ :</label><?php  if($value->sm_sale==0){ echo "ไม่ได้ขาย";}else{echo "ขาย";}  ?></p>
                    </div>
                        <div class="row">
                        <div class="col-md-1 col-xs-1" style="font-size: 16px;">
                            <button  onclick="deleterow(<?=$value->sm_autoid?>)"><i class="icon-trash-empty"></i></button>
                        </div>
                        <div class="col-md-10 col-xs-10">
                        </div>
                        <div class="col-md-1 col-xs-1" style="font-size: 16px;">
                            <button class="edit_product" href="<?php echo base_url("admin/edit_row_sm?ty_id=$value->sm_typeid&id=$value->sm_autoid"); ?>"><i class="icon-edit"></i></button>
                        </div>
                    </div>
            </div>
        </div>

            <?php } ?>
</div>
</div>
    </body>
</html>



