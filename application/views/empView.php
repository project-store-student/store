<!DOCTYPE html>
<html>
    <head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/emp_show.css"); ?>">
        <title>Store</title>
    </head>
    <body>
        <?php $this->load->view("header") ?>
	<div class="content">
		<div class="emp_show">
		<center><h2><?=$title?></h2></center>
		
		<table>
			<tr>
				<td width="30%">รหัสพนักงาน</td>
				<td><?=$user->emp_autoid?></td>
			</tr>
			<tr>
				<td valign="top">ชื่อ</td>
				<td><?=$user->emp_fristname?></td>
			</tr>
			<tr>
				<td valign="top">นามสกุล</td>
				<td><?=$user->emp_lastname?></td>
			</tr>
			<tr>
				<td valign="top">เลขบัตรประชาชน</td>
				<td><?=$user->emp_id?></td>
			</tr>
			<tr>
				<td valign="top">วันเกิด</td>
				<td><?=$user->emp_birthday?></td>
			</tr>
			<tr>
				<td valign="top">เบอรโทร์ศัพท์</td>
				<td><?=$user->emp_phone?></td>
			</tr>
			<tr>
				<td valign="top">อีเมลล์</td>
				<td><?=$user->emp_email?></td>
			</tr>			
			<tr>
				<td valign="top">ตำแหน่ง</td>
				<td><?=$user->emp_status==0? 'Admin':'Employee'?></td>
			</tr>
			<tr>
				<td valign="top">รหัสผ่าน</td>
				<td>***********</td>
			</tr>
		</table>
		<?php if($_SESSION['sessemp']['status']==0){?>
			<?=$link_back;?>
			<?php }else{
				}  ?>
		</div>
	</div>
    </body>
</html>





