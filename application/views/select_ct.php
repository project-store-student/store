<h5>ประเภท</h5>
<?php if(count($ct)==0){ ?>
<center><h3>ไม่มีรายการ</h3></center>
<?php }else{ foreach ($ct as $value){?> 
    <button class="select-sm" data-id="<?= $value->ct_auto; ?>"><?= $value->ct_name; ?></button>
<?php } }?>
<hr>
<script type="text/javascript">
	$(".select-sm").click(function(){
		var id=$(this).attr("data-id");
  $.ajax({
                    url: "select_sm",
                    method: "POST",
                    data: "id="+id,
                    success: function (response) {
	$(".sm").empty().append(response);
                    }
                        });

	});
</script>
<script type="text/javascript">
    $('.select-sm').click(function () {
        $that = $(this);
        $(".select-sm").removeClass("active");
        $(".select-sm").attr("style", "");
        $that.addClass('active').css("font-weight", "bold");
       

    });
</script>
