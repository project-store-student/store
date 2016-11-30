<?php $this->load->view("bootstrap_and_js.php"); ?>

<?php $this->load->view("view_headerproduct.php"); ?>
<div class="container" style="margin: 50px;">

    <div class="col-md-5">
        <img name="img1" id="img1" style="width:100%; height: 100%;" src="<?php echo base_url("my_customer/showupload/xPEm4AvYIG3XX.jpg"); ?>">
    </div>
    <div class="col-md-7">
        <div id="login" class="omb_login">
            <h3 class="omb_authTitle" style="margin-left:180px;"><i class="icon-large icon-lock"></i>เข้าสู่ระบบ หรือ <a href="#" onClick="$('#sing_up').show(); $('#login').hide();" ><i class="icon-large icon-user-add"></i>สมัครสมาชิก</a></h3>
            <div class="row omb_row-sm-offset-3">
                <div class="col-xs-12 col-sm-9">	
                    <form id="frm-login" class="omb_loginForm" action="" autocomplete="off" method="POST">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon-user"></i></span>
                            <input type="text" class="form-control" name="username" id="username" placeholder="email address">
                        </div>
                        <div id="errorlogin1" style="margin-bottom:15px;"></div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon-key-1"></i></span>
                            <input  type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div id="errorlogin2" style="margin-bottom:15px;"></div>

                        <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="icon-login"></i> Login</button>
                    </form>

                </div>
                <div class="row omb_row-sm-offset-3">
                    <div class="col-xs-12 col-sm-4">
                        <label class="checkbox" style="margin-left: 30px;">
                            <input type="checkbox" value="remember-me">Remember Me
                        </label>
                    </div>
                    <div class="col-xs-12 col-sm-5">
                        <p class="omb_forgotPwd" >
                            <a href="<?php echo base_url('my_customer/view_forgotpassword'); ?>" class="cbo-forgotpassword" style="margin-right: 15px;">Forgot password?</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row omb_row-sm-offset-3 omb_loginOr">
                <div class="col-xs-12 col-sm-9">
                    <hr class="omb_hrOr">
                    <span class="omb_spanOr">or</span>
                </div>
            </div>
            <div class="row omb_row-sm-offset-3 omb_socialButtons">
                <div class="col-xs-12 col-sm-9">
                    <a id="login-fb" href="<?= $login_url ?>" class="btn btn-lg btn-block omb_btn-facebook">
                        <i class="icon-facebook-rect"></i>
                        <span class="hidden-xs">Facebook</span>
                    </a>
                </div>

            </div>
        </div>
        <div id="sing_up" class="omb_login" style="display:none;">
            <h3 class="omb_authTitle" style="margin-left:180px;"><a href="#" onClick="$('#login').show(); $('#sing_up').hide();" ><i class="icon-large icon-lock"></i>เข้าสู่ระบบ</a> หรือ <i class="icon-large icon-user-add"></i>สมัครสมาชิก</h3>
            <div class="row omb_row-sm-offset-3">
                <div class="col-xs-12 col-sm-9">	
                    <div class="panel-body">
                        <form id="frm-signup" role="form">
                            <div class="form-group">
                                <label class="control-label" for="firstname">ชื่อ</label>
                                <input id="firstname" name="firstname" type="text" maxlength="50" class="form-control">
                                <div id="errordiv1"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="lastname">นามสกุล</label>
                                <input  id="lastname" name="lastname" type="text" maxlength="50" class="form-control">
                                <div id="errordiv2"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email">อีเมลของคุณ</label>
                                <input id="email" name="email" type="email" maxlength="50" class="form-control">
                                <div id="errordiv3"></div>

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="emailagain">กรอกอีเมลอีกครั้ง</label>
                                <input id="emailagain" name="emailagain" type="email" maxlength="50" class="form-control">
                                <div id="errordiv4"></div>

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">สร้างรหัสผ่านใหม่</label>
                                <input id="password" name="password" type="password" maxlength="25" class="form-control" placeholder="at least 6 characters" length="40">
                                <div id="errordiv5"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="passwordagain">กรอกรหัสผ่านอีกครั้ง</label>
                                <input id="passwordagain" name="passwordagain" type="password" maxlength="25" class="form-control">
                                <div id="errordiv6"></div>

                            </div>
                            <div class="form-group" >
                                <label class=" control-label">เพศ</label>
                                <div  style="margin-bottom: 15px;">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default">
                                            <input type="radio" name="gender" value="1" /> ชาย
                                        </label>
                                        <label class="btn btn-default">
                                            <input type="radio" name="gender" value="2" /> หญิง
                                        </label>
                                        <label class="btn btn-default">
                                            <input type="radio" name="gender" value="3" /> อื่นๆ
                                        </label>
                                    </div>
                                    <div id="errordiv7"></div>
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="control-label" for="address">ที่อยู่</label>
                                <textarea style="height:100px;" id="address" name="address" class="form-control"></textarea>
                                <div id="errordiv8"></div>

                            </div>
                            <div class="form-group" >
                                <button id="signupsubmit" type="submit" class="btn btn-info btn-block">สมัครสมาชิก</button>
                            </div>
                            <p class="form-group">จะไม่เปิดเผยข้อมูลให้สมาชิกท่านอื่นทราบ หากไม่ได้รับอนุญาตจากคุณ</p>
                            <hr>
                        </form>
                    </div>
                </div>

            </div>
        </div>



    </div>
</div>
<?php $this->load->view('view_footerproduct'); ?>
<script>
    $(document).ready(function () {



        $(".cbo-forgotpassword").colorbox({
            //rel:'group1',  ใช่อ้างอิงหากมีหลายหน้า
            width: 550,
            initialWidth: 550,
            initialHeight: 460,
            height: 460,
            scrolling: false,
            opacity: 0.5,
        });
        $("#frm-signup").validate({
            focusInvalid: false,
            rules: {
                firstname: {
                    required: true,
                    focusInvalid: false
                },
                lastname: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                emailagain: {
                    required: true,
                    equalTo: "#email",
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                passwordagain: {
                    required: true,
                    equalTo: "#password",
                    minlength: 8
                },
                gender: {
                    required: true,
                },
                address: {
                    required: true,
                }
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") == "firstname") {
                    error.appendTo('#errordiv1');
                }
                if (element.attr("name") == "lastname") {
                    error.appendTo('#errordiv2');
                }
                if (element.attr("name") == "email") {
                    error.appendTo('#errordiv3');
                }
                if (element.attr("name") == "emailagain") {
                    error.appendTo('#errordiv4');
                }
                if (element.attr("name") == "password") {
                    error.appendTo('#errordiv5');
                }
                if (element.attr("name") == "passwordagain") {
                    error.appendTo('#errordiv6');
                }
                if (element.attr("name") == "gender") {
                    error.appendTo('#errordiv7');
                }
                if (element.attr("name") == "address") {
                    error.appendTo('#errordiv8');
                }

            },
            messages: {
                firstname: {
                    required: "โปรดระบุบ *ชื่อของท่าน"
                },
                lastname: {
                    required: "โปรดระบุบ *นามสกุลของท่าน"
                },
                email: {
                    required: "โปรดระบุบ *E-mail ของท่าน",
                    email: "รูปแบบ e-mail ของท่านไม่ถูกต้อง"
                },
                emailagain: {
                    required: "โปรดระบุบ *E-mail ของท่านอีกครั้ง",
                    equalTo: "e-mail ของท่าน ไม่ตรงกัน",
                    email: "รูปแบบ E-mail ของท่านไม่ถูกต้อง"
                },
                password: {
                    required: "โปรดระบุบ *รหัสผ่านของท่าน",
                    minlength: "รหัสผ่านต้องมีความยาวมากกว่า 8 ตัว"
                },
                passwordagain: {
                    required: "โปรดระบุบ *รหัสผ่านของท่านอีกครั้ง",
                    equalTo: "รหัสผ่าน ของท่าน ไม่ตรงกัน",
                    minlength: "รหัสผ่านต้องมีความยาวมากกว่า 8 ตัว"
                },
                gender: {
                    required: "โปรดระบุบ *เพศของท่าน",
                },
                address: {
                    required: "โปรดระบุบ *ที่อยู่ของท่าน",
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: "<?php echo base_url("my_customer/sign_up_customer"); ?>",
                    method: "post",
                    datatype: "html",
                    data: $("#frm-signup").serialize(),
                    success: function (response) {
                        if (response == 1) {
                            window.location.href = "http://store.com/product/login";
                        } else if (response == 2) {
                            alert("เกิดข้อผิดพลาด E-mail นี้มีผู้ใช่แล้ว กรุณาทำรายการใหม่");
                        } else {
                            alert("เกิดข้อผิดพลาด กรุณาทำรายการใหม่");
                        }
                    }
                });
            }
        });
        $("#frm-login").validate({
            rules: {
                username: {
                    required: true,
                    focusInvalid: false,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                }
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") == "username") {
                    error.appendTo('#errorlogin1');
                }
                if (element.attr("name") == "password") {
                    error.appendTo('#errorlogin2');
                }
            },
            messages: {
                username: {
                    required: "โปรดระบุบ *E-mail ของท่าน",
                    email: "รูปแบบ E-mail ของท่านไม่ถูกต้อง"
                },
                password: {
                    required: "โปรดระบุบ *รหัสผ่าน ของท่าน",
                    minlength: "รหัสผ่านต้องมีความยาวมากกว่า 8 ตัว"
                }
            }, submitHandler: function (form) {
                $.ajax({
                    url: "<?php echo base_url("my_customer/login_customer"); ?>",
                    method: "POST",
                    datatype: "html",
                    data: $("#frm-login").serialize(),
                    success: function (response) {
                        if (response == "fail") {
                            alert(response);
                        } else {
                            window.location.href = "<?php echo product_url(); ?>";
                        }
                    }
                });
            }
        });

    });
</script>
<style>
    #buttonGroupForm .btn-group .form-control-feedback {
        top: 0;
        right: -30px;
    }

    @media (min-width: 768px) {
        .omb_row-sm-offset-3 div:first-child[class*="col-"] {
            margin-left: 25%;
        }
    }

    .omb_login .omb_authTitle {
        text-align: center;
        line-height: 300%;
    }

    .omb_login .omb_socialButtons a {
        color: white; // In yourUse @body-bg 
        opacity:0.9;
    }
    .omb_login .omb_socialButtons a:hover {
        color: white;
        opacity:1;    	
    }
    .omb_login .omb_socialButtons .omb_btn-facebook {background: #3b5998;}
    .omb_login .omb_socialButtons .omb_btn-twitter {background: #00aced;}
    .omb_login .omb_socialButtons .omb_btn-google {background: #c32f10;}


    .omb_login .omb_loginOr {
        position: relative;
        font-size: 1.5em;
        color: #aaa;
        margin-top: 1em;
        margin-bottom: 1em;
        padding-top: 0.5em;
        padding-bottom: 0.5em;
    }
    .omb_login .omb_loginOr .omb_hrOr {
        background-color: #cdcdcd;
        height: 1px;
        margin-top: 0px !important;
        margin-bottom: 0px !important;
    }
    .omb_login .omb_loginOr .omb_spanOr {
        display: block;
        position: absolute;
        left: 50%;
        top: -0.6em;
        margin-left: -1.5em;
        background-color: white;
        width: 3em;
        text-align: center;
    }			

    .omb_login .omb_loginForm .input-group.i {
        width: 2em;
    }
    .omb_login .omb_loginForm  .help-block {
        color: red;
    }


    @media (min-width: 768px) {
        .omb_login .omb_forgotPwd {
            text-align: right;
            margin-top:10px;
        }		
    }
</style>