<!DOCTYPE html>
<html>
    <head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<div class="content"></div>
	<div class="container">

		<div class="emp_show">
		<center><h3><?=$title?></h3></center>
		
		<table style="width: 60%;margin-left: 20%;border: 1px solid #ddd;">

			<tr>
				<td width="30%"><label>รหัสพนักงาน</label></td>
				<td><?=$user->emp_autoid?></td>
			</tr>
			<tr>
				<td valign="top"><label>ชื่อ</label></td>
				<td><?=$user->emp_fristname?></td>
			</tr>
			<tr>
				<td valign="top"><label>นามสกุล</label></td>
				<td><?=$user->emp_lastname?></td>
			</tr>
			<tr>
				<td valign="top"><label>เลขบัตรประชาชน</label></td>
				<td><?=$user->emp_id?></td>
			</tr>
			<tr>
				<td valign="top"><label>วันเกิด</label></td>
				<td><?=$user->emp_birthday?></td>
			</tr>
			<tr>
				<td valign="top"><label>เบอรโทร์ศัพท์</label></td>
				<td><?=$user->emp_phone?></td>
			</tr>
			<tr>
				<td valign="top"><label>อีเมลล์</label></td>
				<td><?=$user->emp_email?></td>
			</tr>			
			<tr>
				<td valign="top"><label>ตำแหน่ง</label></td>
				<td><?=$user->emp_status==0? 'Admin':'Employee'?></td>
			</tr>
			<tr>
				<td valign="top"><label>username</label></td>
				<td><?=$user->emp_username?></td>
			</tr>
			
		</table>
		<?php if($_SESSION['sessemp']['status']==0){?>
			<button style="padding: 0"><?=$link_back;?></button>
			<?php }else{
				}  ?>
		</div>
	</div>

    </body>
</html>





