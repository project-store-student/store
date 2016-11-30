
<?php

if (empty($_SESSION['sessemp'])) {
    ?>

      <center> 
<div class="content-login">

                       <center><h2 ><a href="<?=base_url('product/')?>"><img width="120" src="<?php echo base_url('assets/images/logo.png') ?>"></a></h2>   </center>
                            <form method="post" id="loginstore"  class="form-horizontal " >
                                <div  class="input-group">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" tabindex="1" value="" />
                                    <span class="input-group-addon" ><i class="icon-user-1" ></i></span>  
                                </div>
                                <div id="errordiv1" style="margin-bottom: 25px"></div>
                                <div  class="input-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" tabindex="2" />
                                    <span class="input-group-addon" ><i class="icon-key-1" ></i></span>  
                                </div>
                                <div id="errordiv2" style="margin-bottom: 25px"></div>
                                <br/>
                                 <?php echo form_hidden($csrf['name'],$csrf['hash']); ?>
                                    <button type="submit"  id="submit" class="btn-login"><span><i class="icon-login" ></i></span>เข้าสู่ระบบ</button>
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
            errorPlacement: function (error, element) {
                if (element.attr("name") == "username")
                    error.appendTo('#errordiv1');
                else
                    error.appendTo('#errordiv2');
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
                $.ajax({
                    url: "<?php echo base_url('admin/login') ?>",
                    method: "POST",
                    datatype: "html",
                    data: $("#loginstore").serialize(),
                    success: function (response) {
                        if (response == "success") {
                            window.location.reload();
                        } else {    
                            alert("username หรือ password ไม่ถูกต้อง");
                        }
                    }
                });
            }
        });
</script>
<p id="demo"  style="display: none;"></p>
<p id="demonew" style="display: none;"></p>
<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }

    if (mm < 10) {
        mm = '0' + mm
    }

    today = mm + '/' + dd + '/' + yyyy;
    document.getElementById("demonew").innerHTML = today;
    var myVar = setInterval(function () {
        myTimer()
    }, 0);

    function myTimer() {
        var d = new Date();
        document.getElementById("demo").innerHTML = d.toLocaleTimeString();
    }
</script>
