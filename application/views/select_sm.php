     <?php  if(count($sm)==0){
?> 
<center><h3>ไม่มีรายการ</h3></center>
<?php       }else{ ?>
<h5 style="margin-left: 10px">สินค้า</h5>
<?php foreach ($sm as $value){?>	
	<div id="contentrelated" class="Collage effect-parent" style="width: auto; text-align:center; opacity: 1;display: inline-block;">    
    <div class="item default effect-duration-1" style="margin:0px 0px 10px 10px; display: inline-block; vertical-align: bottom; opacity: 1;">
        <div class="image">
                    <div class="Productminimenu transit-tool-box ProductmenuItems" id="Productmenuicons53826" style="display: inline-block;">

                                    </div><button class="select-sm-show" href="<?php echo base_url("admin/select_sm_show?id=" . $value->sm_autoid); ?>"><img src="<?php echo base_url("admin/showupload/" . $value->sm_image); ?>_backpage.jpg" title="<?= $value->sm_productname; ?>" ></button></div>
                                <div class="clear"></div>
                            </div>
</div>
<?php } } ?><hr>
<script type="text/javascript">
	$(".select-sm-show").click(function(){
        var url = $(this).attr("href");
        $.colorbox({
            href: url,
            width: 700,
            opacity: 0.5,
            scrolling: false,
        });

	});
</script>
