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
        <title>Store</title>
    </head>
    <body>
        <?php $this->load->view("header") ?>
<div class="content">
		<div class="emp_show">
			<center><h3>พนักงาน</h3></center>
		
		<?php echo $table; ?>

<!-- <span style="margin-right: 10px;"><label>จำนวน : </label> <?=$num_show?> <label>of  <?=$total_rows?></label></span> -->
		<button style="padding: 0"><?php echo anchor(base_url('admin/add/'),'เพิ่ม ',array('class'=>'add_employ')); ?></button>
	
			<div class="paging">
			<?php echo $pagination; ?>
		</div>
		</div>
 </div>
    </body>
</html>



	