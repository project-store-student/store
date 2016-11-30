<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/emp_show.css"); ?>">
        <?php $this->load->view("header") ?>
	<div class="content">
<?php echo form_open($action); ?>
		<div class="emp_show">
		<center><h2><?=$title?></h2></center>
			<i class="link"><?=$message?></i>

		<table>
			<tr>
				<td width="30%">รหัส</td>
				<td><input class="emp_edit" type="text" name="emp_autoid" disabled="disable" class="text" value="<?php echo (isset($Student['emp_autoid']))?$Student['emp_autoid']:''; ?>"/></td>
				<input type="hidden" name="emp_autoid" value="<?php echo (isset($Student['emp_autoid']))?$Student['emp_autoid']:''; ?>"/>
			</tr>
			<tr>
				<td valign="top">ชื่อ<span style="color:red;">*</span></td>
				<td><input class="emp_edit" type="text" name="emp_fristname" class="text" value="<?php echo (set_value('emp_fristname'))?set_value('emp_fristname'):$Student['emp_fristname']; ?>"/>
				    <div id="error_name"></div>
				</td>
			</tr>
			<tr>
				<td valign="top">นามสกุล<span style="color:red;">*</span></td>
				<td><input class="emp_edit" type="text" name="emp_lastname" class="text" value="<?php echo (set_value('emp_lastname'))?set_value('emp_lastname'):$Student['emp_lastname']; ?>"/>
				    <div id="error_lastname"></div>
				</td>
			</tr>
			<tr>
				<td valign="top">เลขบัตรประชาชน<span style="color:red;">*</span></td>
				<td><input class="emp_edit" type="text" name="emp_id" class="text" value="<?php echo set_value('emp_id')?set_value('emp_id'):$Student['emp_id']; ?>"/>
				<div id="error_empid"></td>
			</tr>
			<tr>
				<td valign="top">วันเกิด<span style="color:red;">*</span></td>
				<td><input class="emp_edit" type="date" name="emp_birthday" class="text" value="<?php echo set_value('emp_birthday')?set_value('emp_birthday'):$Student['emp_birthday']; ?>"/>
				<div id="error_birthday"></td>
			</tr>
			<tr>
				<td valign="top">เบอร์โทรศัพท์<span style="color:red;">*</span></td>
				<td><input class="emp_edit" type="text" name="emp_phone" class="text" value="<?php echo set_value('emp_phone')?set_value('emp_phone'):$Student['emp_phone']; ?>"/>
				<div id="error_phone"></td>
			</tr>
			<tr>
				<td valign="top">อีเมลล์<span style="color:red;">*</span></td>
				<td><input class="emp_edit" type="text" name="emp_email" class="text" value="<?php echo set_value('emp_email')?set_value('emp_email'):$Student['emp_email']; ?>"/>
				<div id="error_email"></td>
			</tr>
			
			<tr>
				<td valign="top">ตำแหน่ง<span style="color:red;">*</span></td>
				<td>
<?php if($_SESSION['sessemp']['status']==0){?>
				<input type="radio" name="emp_status" value="0" <?php echo set_radio('emp_status', 0, TRUE); ?>/> Admin
					<input type="radio" name="emp_status" value="1" <?php echo set_radio('emp_status', 1); ?>/> Employee
					<div id="error_status">
<?php }else{ ?>
	<input  type="radio" name="emp_status" value="1" <?php echo set_radio('emp_status', 1,TRUE); ?>/> Employee
					<div id="error_status">
<?php	} ?>
					</td>
			</tr>
			<tr>
				<td valign="top">รหัสผ่าน<span style="color:red;">*</span></td>
				<td><input class="emp_edit" type="password" name="emp_password" id="emp_password" class="text" value="<?php echo set_value('emp_password')?set_value('emp_password'):$Student['emp_password']; ?>"/>
				<div id="error_password"></td>
			</tr>
			<tr>
				<td valign="top">ยืนยันรหัสผ่าน<span style="color:red;">*</span></td>
				<td><input class="emp_edit" type="password" name="confrim" class="text" value="<?php echo set_value('emp_password')?set_value('emp_password'):$Student['emp_password'];?>"/>
				<div id="error_confirm"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>

        <?php echo form_hidden($csrf['name'],$csrf['hash']); ?>
				<td><input type="submit" value="บันทึก" class="btn btn-default"></td>
			</tr>
		</table>
<?php if($_SESSION['sessemp']['status']==0){?>
			<?=$link_back;?>
			<?php }else{?>
			<?= $link_view?>
	<?php }  ?>
		
		
		</div>

<?php echo form_open(); ?>

	</div>
   <script>
   $(document).ready(function () {
            $("form").validate({
                focusInvalid: false,
                rules: {
                    emp_fristname: {
                        required: true,
                    },
                    emp_lastname: {
                        required: true,
                    },
                         emp_id: {
                        required: true,
                        number:true,
                rangelength: [13, 13]

                    },    
                           emp_birthday: {
                        required: true,
                    },    
                           emp_phone: {
                        required: true,
                        number:true,
                rangelength: [10, 10]

                    },    
                     emp_email: {
                        required: true,
                        email:true

                    },     
                        emp_status: {
                        required: true,

                    },     emp_password: {
                        required: true,
                        minlength: 6

                    },     confrim: {
                        required: true,
                         equalTo: emp_password,
                        minlength: 6
                    }
                },
               errorPlacement: function (error, element) {
                    if (element.attr("name") == "emp_fristname")
                        error.appendTo('#error_name');
                    else if(element.attr("name") == "emp_lastname")
                        error.appendTo('#error_lastname');
                      else if(element.attr("name") == "emp_id")
                        error.appendTo('#error_empid');
                     else if(element.attr("name") == "emp_birthday")
                        error.appendTo('#error_birthday');
                     else if(element.attr("name") == "emp_phone")
                        error.appendTo('#error_phone');
                      else if(element.attr("name") == "emp_email")
                        error.appendTo('#error_email');                   
                      else if(element.attr("name") == "emp_status")
                        error.appendTo('#error_status');
                      else if(element.attr("name") == "emp_password")
                        error.appendTo('#error_password');
                    else error.appendTo('#error_confirm');
                },
                messages: {
                         emp_fristname: {
                        required: "กรุณากรอกข้อมูล",
                    },
                    emp_lastname: {
                        required: "กรุณากรอกข้อมูล",
                    },
                         emp_id: {
                        required: "กรุณากรอกข้อมูล",
                        number:"เป็นตัวเลขเท่านั้น",
			rangelength:"13 หลัก"
                    },    
                                   emp_birthday: {
                        required: "กรุณากรอกข้อมูล",
                    },    
                           emp_phone: {
                        required: "กรุณากรอกข้อมูล",
                        number:"เป็นตัวเลขเท่านั้น",
                rangelength: "10 หลัก"
                    }, 
                     emp_email: {
                        required: "กรุณากรอกข้อมูล",
			email:"รูปแบบไม่ถูกต้อง"
                    },    
                       
                     emp_status: {
                        required: "กรุณากรอกข้อมูล",

                    },    
                     emp_password: {
                        required: "กรุณากรอกข้อมูล",
		    minlength:"กรุณากรอก 8 ตัวขึ้นไป",

                    },     
                    confrim: {
                        required: "กรุณากรอกข้อมูล",
		    minlength:"กรุณากรอก 8 ตัวขึ้นไป",
		equalTo:"รหัสผ่านไม่ตรงกัน"

                    }
                },

            });
        });
    </script>