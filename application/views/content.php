
<?php

if (empty($_SESSION['sessemp'])) {
    ?>

      <center> 
<div class="content-login">

                       <center><a href="<?=base_url('admin/')?>"><img width="100" style="margin-bottom: 10px" src="<?php echo base_url('assets/images/logo2.png') ?>"></a></center>
                            <form method="post" id="loginstore"  class="form-horizontal " >
                                <div  class="input-group">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" tabindex="1" value="" />
                                    <span class="input-group-addon" ><i class="icon-user-1" ></i></span>  
                                </div>
                                <div id="errordiv1" style="margin-bottom: 20px"></div>
                                <div  class="input-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" tabindex="2" />
                                    <span class="input-group-addon" ><i class="icon-key-1" ></i></span>  
                                </div>
                                <div id="errordiv2" style="margin-bottom: 20px"></div>
                                <br/>
                                    <button type="submit"  id="submit" class="btn-login"><span><i class="icon-login" ></i></span>เข้าสู่ระบบ</button>
                                    <div class="square" style="display: none;">
 <i class="icon-spin2  spin" ></i>
</div>
                            </form>	

                </div>
</center>

            <?php }else{
                ?>

                <div class="content">
         
                    <?php $this->load->view("calendar-en"); ?>
             
                </div>
                <?php } ?>
   

<script>
        $("#loginstore").validate({
            focusInvalid: false,
            rules: {
                username: {
                    required: true,
                    focusInvalid: false
                },
                password: {
                    required: true,
                    minlength: 6,
                }
            },
      
            messages: {
                username: {
                    required: "",

                },
                password: {
                    required: "",
                    minlength: "",
                    maxlength: ""
                },
            },
            submitHandler: function (form) {
                     $('#submit').hide();
            $('.square').show();
                $.ajax({
                    url: "<?php echo base_url('admin/login') ?>",
                    method: "POST",
                    datatype: "html",
                    data: $("#loginstore").serialize(),
                    success: function (response) {
                        if (response == "success") {
                            window.location.reload();
                        } else {    
                                 $('#submit').show();
                                $('.square').hide();
                            alert("username หรือ password ไม่ถูกต้อง");
                        }
                    }
                });
            }
        });
</script>

