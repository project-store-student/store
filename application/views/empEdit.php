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
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.validate.min.js"); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url("assets/fontello/css/animation.css"); ?>"> 

        <title>Store</title>
        <script>
   $(document).ready(function () {
            $("#data").validate({
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

                    },  
                        emp_username: {
                        required: true,

                    },  
                       emp_password: {
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
                          else if(element.attr("name") == "emp_username")
                        error.appendTo('#error_username');
                      else if(element.attr("name") == "emp_password")
                        error.appendTo('#error_password');
                    else error.appendTo('#error_confirm');
                },
                messages: {
                         emp_fristname: {
                        required: "",
                    },
                    emp_lastname: {
                        required: "",
                    },
                         emp_id: {
                        required: "",
                        number:"เป็นตัวเลขเท่านั้น",
      rangelength:"13 หลัก"
                    },    
                                   emp_birthday: {
                        required: "",
                    },    
                           emp_phone: {
                        required: "",
                        number:"เป็นตัวเลขเท่านั้น",
                rangelength: "10 หลัก"
                    }, 
                     emp_email: {
                        required: "",
      email:"รูปแบบไม่ถูกต้อง"
                    },    
                       
                     emp_status: {
                        required: "",

                    },   
                       emp_username: {
                        required: "",

                    },  
                     emp_password: {
                        required: "",
        minlength:"กรุณากรอก 6 ตัวขึ้นไป",

                    },     
                    confrim: {
                        required: "",
        minlength:"กรุณากรอก 6 ตัวขึ้นไป",
    equalTo:"รหัสผ่านไม่ตรงกัน"

                    }
                },
      submitHandler: function (form) {
            $('.square').show();
            $('#addemp').hide();
            $.ajax({
                url: $("#data").attr('action'),
                method: "POST",
                data: $("#data").serialize(),
                success: function () {
            window.location.href="<?php echo base_url('admin/employ/')?>";

            }
            });
        }
            });


   $('#emp_fristname').keydown(function(e) {
     if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||      
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
            (e.keyCode >= 35 && e.keyCode <= 40)) {               
                 return;
        }
        var key = e.keyCode;
        if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
          e.preventDefault();
        }
      });
  $('#emp_lastname').keydown(function(e) {
     if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||      
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
            (e.keyCode >= 35 && e.keyCode <= 40)) {               
                 return;
        }
        var key = e.keyCode;
        if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
          e.preventDefault();
        }
      });



        });
    </script>
    </head>
    <body>
        <?php $this->load->view("header") ?>
  <div class="content">
<form id="data">
    <div class="emp_show">
    <center><h3><?=$title?></h3></center>

    <table style="width: 60%;margin-left: 20%;border: 1px solid #ddd;">
      <tr>
        <td width="30%">รหัส</td>
        <td><input class="emp_edit" type="text" name="emp_autoid" disabled="disable" class="text" value="<?php echo (isset($Student['emp_autoid']))?$Student['emp_autoid']:''; ?>"/></td>
        <input type="hidden" name="emp_autoid" value="<?php echo (isset($Student['emp_autoid']))?$Student['emp_autoid']:''; ?>"/>
      </tr>
      <tr>
        <td valign="top">ชื่อ<span style="color:red;">*</span></td>
        <td><input class="emp_edit" id="emp_fristname" type="text" name="emp_fristname" class="text" value="<?php echo (set_value('emp_fristname'))?set_value('emp_fristname'):$Student['emp_fristname']; ?>"/>
            <div id="error_name"></div>
        </td>
      </tr>
      <tr>
        <td valign="top">นามสกุล<span style="color:red;">*</span></td>
        <td><input class="emp_edit" id="emp_lastname" type="text" name="emp_lastname" class="text" value="<?php echo (set_value('emp_lastname'))?set_value('emp_lastname'):$Student['emp_lastname']; ?>"/>
            <div id="error_lastname"></div>
        </td>
      </tr>
      <tr>
        <td valign="top">เลขบัตรประชาชน<span style="color:red;">*</span></td>
        <td><input class="emp_edit" id="emp_id" type="text" name="emp_id" class="text" value="<?php echo set_value('emp_id')?set_value('emp_id'):$Student['emp_id']; ?>"/>
        <div id="error_empid"></td>
      </tr>
    
      <tr>
        <td valign="top">เบอร์โทรศัพท์<span style="color:red;">*</span></td>
        <td><input class="emp_edit" id="emp_phone" type="text" name="emp_phone" class="text" value="<?php echo set_value('emp_phone')?set_value('emp_phone'):$Student['emp_phone']; ?>"/>
        <div id="error_phone"></td>
      </tr>
      <tr>
        <td valign="top">อีเมลล์<span style="color:red;">*</span></td>
        <td><input class="emp_edit"  type="text" name="emp_email" class="text" value="<?php echo set_value('emp_email')?set_value('emp_email'):$Student['emp_email']; ?>"/>
        <div id="error_email"></td>
      </tr>
       <tr>
        <td valign="top">วันเกิด<span style="color:red;">*</span></td>
        <td><input class="emp_edit" type="date" name="emp_birthday" class="text" value="<?php echo set_value('emp_birthday')?set_value('emp_birthday'):$Student['emp_birthday']; ?>"/>
        <div id="error_birthday"></td>
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
<?php } ?>
          </td>
      </tr>
        <tr>
        <td valign="top">username<span style="color:red;">*</span></td>
        <td><input class="emp_edit" type="text" name="emp_username" id="emp_username" class="text" value="<?php echo set_value('emp_username')?set_value('emp_username'):$Student['emp_username']; ?>"/>
        <div id="error_username"></td>
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

        <td><input type="submit" value="บันทึก" id="addemp">
        <div class="square" style="display: none;">
 <i class="icon-spin2  spin" ></i>
</div></td>
      </tr>
    </table>
    
    </div>

</form>
<?php if($_SESSION['sessemp']['status']==0){?>
    <button style="padding: 0"><?=$link_back;?></button>
      <?php }else{?>
      <button style="padding: 0"><?= $link_view?></button>
  <?php }  ?>
  </div>
    </body>
</html>

   
