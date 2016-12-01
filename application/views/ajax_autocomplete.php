<ui class="show-data-search">
            <li class="head-autocomplete">งานรากฐาน โครงสร้าง</li>
<li class="divider"></li>
   <?php   foreach ($T01 as $value) { ?>
  <li class="li-hover">
                <a class="a" data-id="<?=$value->sm_autoid?>" href="<?php echo base_url("admin/one_product?id=$value->sm_autoid"); ?>"><?php echo $value->sm_productname; ?></a>
            </li>
         <?php   }?>
<li class="divider"></li>
         <li class="head-autocomplete">หลังคา</li>
<li class="divider"></li>
   <?php   foreach ($T02 as $value) { ?>
  <li class="li-hover">
                <a class="a" data-id="<?=$value->sm_autoid?>" href="<?php echo base_url("admin/one_product?id=$value->sm_autoid"); ?>"><?php echo $value->sm_productname; ?></a>
            </li>
         <?php   }?>
<li class="divider"></li>
         <li class="head-autocomplete">งานโครงสร้างฝาผนัง</li>
<li class="divider"></li>
   <?php   foreach ($T03 as $value) { ?>
  <li class="li-hover">
                <a class="a" data-id="<?=$value->sm_autoid?>" href="<?php echo base_url("admin/one_product?id=$value->sm_autoid"); ?>"><?php echo $value->sm_productname; ?></a>
            </li>
         <?php   }?>
<li class="divider"></li>
         <li class="head-autocomplete">วัสดุ ท่อประปา ท่อสายไฟ</li>
<li class="divider"></li>
   <?php   foreach ($T04 as $value) { ?>
  <li class="li-hover">
                <a class="a" data-id="<?=$value->sm_autoid?>" href="<?php echo base_url("admin/one_product?id=$value->sm_autoid"); ?>"><?php echo $value->sm_productname; ?></a>
            </li>
         <?php   }?>
<li class="divider"></li>
         <li class="head-autocomplete">วัสดุ ตกแต่ง</li>
<li class="divider"></li> 
   <?php   foreach ($T05 as $value) { ?>
  <li class="li-hover">
                <a class="a" data-id="<?=$value->sm_autoid?>" href="<?php echo base_url("admin/one_product?id=$value->sm_autoid"); ?>"><?php echo $value->sm_productname; ?></a>
            </li>
         <?php   }?>
  
</ui>
