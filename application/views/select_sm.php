     <?php  if(count($sm)==0){
?> 
<center><h3>ไม่มีรายการ</h3></center>
<?php       }else{ ?>
<h5 style="margin-left: 10px">สินค้า</h5>
<?php foreach ($sm as $value){?>	

              <div class="col-md-3" style="margin: 10px 0px">
                 <button class="select-sm-show" href="<?php echo base_url("admin/select_sm_show?id=" . $value->sm_autoid); ?>"><img src="<?php echo base_url("admin/showupload/" . $value->sm_image); ?>_backpage.jpg" alt="<?= $value->sm_productname; ?>" title="<?= $value->sm_productname; ?>" ></button>
                 </div>

<?php } } ?>
<script type="text/javascript">
	$(".select-sm-show").click(function(){
        var url = $(this).attr("href");
        $.colorbox({
            href: url,
            width: 600,
            innerWidth:800,
            opacity: 0.9,
            scrolling: false,
            fixed:true,
            closeButton:false,

        });

	});
</script>
