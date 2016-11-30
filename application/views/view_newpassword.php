<!DOCTYPE html>
<?php
foreach ($data as $key) {
    $token = $key->temp_token;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php $this->load->view("bootstrap_and_js.php"); ?>
        <title>New Password</title>
    </head>
    <script>
        $(document).ready(function () {
            $("#passwordForm").validate({
                focusInvalid: false,
                rules: {
                    newpassword: {
                        required: true,
                        minlength: 8
                    },
                    confrimpassword: {
                        required: true,
                        equalTo: "#newpassword",
                        minlength: 8
                    }
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "newpassword")
                        error.appendTo('#errordiv1');
                    else
                        error.appendTo('#errordiv2');
                },
                messages: {
                    newpassword: {
                        required: "โปรดใส่ password ของท่าน",
                        minlength: "โปรดใส่รหัสผ่าน 8-10 หลัก"

                    },
                    confrimpassword: {
                        required: "โปรดใส่ password ของท่าน",
                        minlength: "โปรดใส่รหัสผ่าน 8-10 หลัก",
                        equalTo: "โปรดระบุบพาสเวิร์ดให้ตรงกัน"
                    },
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: "set_newpassword",
                        method: "POST",
                        datatype: "html",
                        data: $("#passwordForm").serialize(),
                        success: function (response) {
                            alert(response);
                            window.location.reload();
                        }
                    });
                }

            });
        });
    </script>
    <body>
        <div class="login-body">
            <div class="content"><p>Change Password</p></div>

            <article class="container-login center-block">
                <section>
                    <div class="tab-content tabs-login col-lg-12 col-md-12 col-sm-12 cols-xs-12">
                        <div  class="tab-pane fade active in">
                            <h2><i class="icon-home-5"></i> Store</h2>						
                            <form method="post" id="passwordForm">
                                <div  class="input-group">
                                    <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password" tabindex="1" value="" />
                                    <span id="err1" style="color:red;"></span>
                                    <span class="input-group-addon" ><i class="icon-key-1" ></i></span>  
                                </div>
                                <div id="errordiv1" style="margin-bottom: 25px"></div>
                                <div  class="input-group">
                                    <input type="password" class="form-control" name="confrimpassword" id="confrimpassword" placeholder="Confrim Password" value="" tabindex="2" />
                                    <span id="err2" style="color:red;"></span>
                                    <input type="hidden" name="token" id="token" value="<?php echo $token; ?>">
                                    <span class="input-group-addon" ><i class="icon-key-1" ></i></span>  
                                </div>
                                <div id="errordiv2" style="margin-bottom: 25px"></div>
                                <br/>
                                <div class="form-group ">				
                                    <button type="submit" name="log-me-in" tabindex="5" class="btn btn-lg btn-primary"><span><i class="icon-arrows-cw" ></i></span>Change Password</button>
                                </div>
                            </form>			
                        </div>
                    </div>
                </section>
            </article>
        </div>
    </body>

</html>
<style>
    /*LOGIN*/
    .container-login {
        min-height: 0;
        width: 480px;
        color: #333333;
        margin-top: 40px;
        padding: 0;
    }
    
    .container-login > section {
        margin-left: 0;
        margin-right: 0;
        padding-bottom: 10px;
    }
   
    .tabs-login {
        background: #ffffff;
        border: medium none;
        margin-top: -1px;
        padding: 10px 30px;
    }
    .container-login h2 {
        color: #ea533f;
    }
    .form-control {
        background-color: #ffffff;
        background-image: none;
        border: 1px solid #999999;
        border-radius: 0;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
        color: #333333;
        display: block;
        font-size: 14px;
        height: 34px;
        line-height: 1.42857;
        padding: 6px 12px;
        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        width: 100%;
    }
    
    .container-login button {
        background-color: #ea533f;
        border-color: #e73e28;
        color: #ffffff;
        border-radius: 0;
        font-size: 18px;
        line-height: 1.33;
        padding: 10px 16px;
        width: 100%;
    }
    .container-login button:hover,
    .container-login button:focus {
        background: #de2f18;
        border-color: #be2815;
    }
    form .error {
        color: #ff0000;
    }   
    form input.error {
        border:1px solid red;
    }
    .content p{
        margin: 0px 500px;
        font-size: 32pt;
        color: #ea533f;

    }
</style>

