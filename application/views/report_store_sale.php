        <?php $this->load->view("header") ?>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/gridlist.css"); ?>">

<script type="text/javascript">
    $(document).ready(function() {

    $('#list').click(function(event){event.preventDefault();
        $('#products .item').addClass('list-group-item');
        $(".caption").show();
    });

    $('#grid').click(function(event){event.preventDefault();
        $('#products .item').removeClass('list-group-item');
        $('#products .item').addClass('grid-group-item');
        $(".caption").hide();
    });


$(".btn-warning").click(function(){
 var url = $(this).attr("href");
        $.colorbox({
            href: url,
            width:700,
            opacity: 0.5,
            scrolling: false,
        });
});

$(".list-group-image").click(function(){
 var url = $(this).attr("href");
        $.colorbox({
            href: url,
            width:700,
            opacity: 0.5,
            scrolling: false,
        });
});
});

    function deleterow(ss_autoid,sm_autoid) {
    if (confirm("ลบรายการนี้ ออกจากรายการขาย ?") == true) {

    $.ajax({
                url: "<?php echo base_url("admin/delete_row_ss"); ?>",
                method: "POST",
                 data: "ss_autoid="+ss_autoid+"&sm_autoid="+sm_autoid,
                success: function (response) {
                    if(response=='ok'){
                $("#"+ss_autoid).slideUp("slow");
                    }else{
 alert('ทำรายการไม่สำเร็จ')                       
                    }
            }
            
            });
    }
}
</script>
<div class="content"></div>
   <div class="rp-store-sale-content" style="width: 100%;">
<center><h2>สินค้าขาย</h2></center>
    <div class="well well-sm">
        <div class="paging" style="float: left;"><strong>Page</strong><?=$pagination?></div>
        <div class="btn-group" style="right: -75%;">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                class="glyphicon glyphicon-th"></span>Grid</a>
        </div>
    </div>
    <div id="products" class="row list-group" style="width: 95%;margin-left: 2%;">
        <?php foreach ($ss as  $value) {
?>
        <div class="item  col-xs-2" id="<?=$value->ss_autoid?>">
            <div class="items">
                <img class="group list-group-image"  href="<?php echo base_url("admin/edit_row_ss?id=$value->ss_autoid"); ?>" src="<?php echo base_url("admin/showupload/$value->sm_image"); ?>_backpage.jpg"  title="<?= $value->sm_productname; ?>" style="cursor: pointer;">
                <div class="caption" style="display: none;">
                    <h3 class="group inner list-group-item-heading">
                        <?=$value->sm_autoid?> <?=$value->sm_productname?></h3>
                         <h4 class="group inner list-group-item-heading">
                        <?=$value->ty_name?></h4>
                        <h5 class="group inner list-group-item-heading">
                        <?=$value->ct_name?></h5>
                    <p class="group inner list-group-item-text">
                         <?=$value->sm_productdetail?></p>
                    <div class="row">
                        <div class="col-md-7">
                            <p class="lead" style="font-size: 16px;"><?=$value->ss_price?> บาท/<?=$value->ss_unit?></p>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger" onclick="deleterow(<?=$value->ss_autoid?>,<?=$value->sm_autoid?>)"><i class="icon-trash-empty"></i></button>
                            <button class="btn btn-warning" href="<?php echo base_url("admin/edit_row_ss?id=$value->ss_autoid"); ?>"><i class="icon-edit"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php } ?>
       
</div>
</div>
