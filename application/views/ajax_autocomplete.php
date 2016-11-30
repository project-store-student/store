<ui class="show-data-search">
            <li class="head-autocomplete">งานรากฐาน โครงสร้าง</li>
<li class="divider"></li>
   <?php   foreach ($T01 as $value) { ?>
  <li class="li-hover">
                <a class="a" data-id="<?=$value->sm_autoid?>" href="#"><?php echo $value->sm_productname; ?></a>
            </li>
         <?php   }?>
<li class="divider"></li>
         <li class="head-autocomplete">หลังคา</li>
<li class="divider"></li>
   <?php   foreach ($T02 as $value) { ?>
  <li class="li-hover">
                <a class="a" data-id="<?=$value->sm_autoid?>" href="#"><?php echo $value->sm_productname; ?></a>
            </li>
         <?php   }?>
<li class="divider"></li>
         <li class="head-autocomplete">งานโครงสร้างฝาผนัง</li>
<li class="divider"></li>
   <?php   foreach ($T03 as $value) { ?>
  <li class="li-hover">
                <a class="a" data-id="<?=$value->sm_autoid?>" href="#"><?php echo $value->sm_productname; ?></a>
            </li>
         <?php   }?>
<li class="divider"></li>
         <li class="head-autocomplete">วัสดุ ท่อประปา ท่อสายไฟ</li>
<li class="divider"></li>
   <?php   foreach ($T04 as $value) { ?>
  <li class="li-hover">
                <a class="a" data-id="<?=$value->sm_autoid?>" href="#"><?php echo $value->sm_productname; ?></a>
            </li>
         <?php   }?>
<li class="divider"></li>
         <li class="head-autocomplete">วัสดุ ตกแต่ง</li>
<li class="divider"></li> 
   <?php   foreach ($T05 as $value) { ?>
  <li class="li-hover">
                <a class="a" data-id="<?=$value->sm_autoid?>" href="#"><?php echo $value->sm_productname; ?></a>
            </li>
         <?php   }?>
  
</ui>
<script>
    $("a").on('click', function () {
        var id = $(this).attr("data-id");
        $.ajax({
            url: "<?php echo base_url("admin/one_product"); ?>",
            method: "POST",
            data: "id=" + id,
            success: function (response) {
                $(".content").empty().append(response);
        $(".search-overlay").hide();
         $("#auto").empty();
         $(".dropdown-show").css("height","0px");
         $('#Search div').hide();
                    $('#Search .icon-cancel').hide();
                    $('#Search').css('width', "auto");

            }
        });
    });
</script>
