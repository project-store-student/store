<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/emp_show.css"); ?>">

        <?php $this->load->view("header") ?>
	<div class="content">
		<div class="emp_show">
	<center><h2>พนักงาน</h2></center>
		<div class="paging"><?php echo $pagination; ?></div>
		<?php echo $table; ?>
		<div class="paging"><?php echo $pagination; ?></div>
			<?php echo anchor(base_url('admin/add/'),'เพิ่มพนักงาน',array('class'=>'btn btn-default')); ?>
		</div>
	</div>
