
<section class="success" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1></h1>
                <h3>เกี่ยวกับเรา</h3>
                <h1></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-2">
                <p>Store.com เป็นบริษัทจัดจำหนายสินค้าจำหน่ายวัสดุก่อสร้างปลีกออนไลน์และส่งให้กับลูกค้า รวมถึงการจัดหาวัสดุอุปกรณ์การก่อสร้าง
                    ตามความต้องการที่ใช้ในอาคารโรงงานอุตสาหกรรมและโครงการอสังหาริมทรัพย์ต่างๆด้วยราคาพิเศษนอก
                    เหนือจากนั้นลูกค้าที่อยู่นอกพื้นที่การให้บริการบริษัทมีร้านค้าพันธมิตรในเครือข่ายที่สามารถให้บริการท่านได้
                    นอกเหนือจากนั้นบริษัทเห็นความสำคัญในการพัฒนาอย่างต่อเนื่องในการให้บริการ
                    </p>
            </div>
            <div class="col-lg-4">
                <p>จึงเพิ่มช่องทางการสั่งซื้อวัสดุก่อสร้างออนไลน์เพื่อตอบสนองความต้องการให้ลูกค้าได้สะดวกยิ่งขึ้นบริษัทมั่นใจว่าความรู้ในผลิตภัณฑ์
                    ประกอบกับการสนับสนุนพิเศษของผู้เชี่ยวชาญจากบริษัทผู้ผลิตโดยตรงในผลิตภัณฑ์แต่ละประเภทสามารถเพิ่ม
                    ประสิทธิภาพให้กับงานของลูกค้าดียิ่งขึ้น Store.com ตั้งอยู่ที่มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน วิทยาเขตขอนแก่น 150 ตำบล ในเมือง 
                    อำเภอเมืองขอนแก่นขอนแก่น 40000 ประเทศไทย.</p>
            </div>
        </div>
    </div>
</section>
<section class="primary" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1></h1>
                <h3>ติดต่อเรา</h3>
                <h1></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <form name="sentMessage" id="contactForm" novalidate="">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>ชื่อ</label>
                            <input type="text" class="form-control" placeholder="Name" id="name" name="name" required="" data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>อีเมล์</label>
                            <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" required="" data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="tel" class="form-control" placeholder="Phone Number" id="phone" name="phone" required="" data-validation-required-message="Please enter your phone number.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>ข้อความ</label>
                            <textarea rows="5" class="form-control" placeholder="Message" id="message" name="message" required="" data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success btn-lg">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--<footer class="container" style="min-height:200px; background-color:#18bc9c;color:#fff;text-align:center;padding-top:50px;">
    <div class="footer-top">

    </div>
  
</footer>-->
<footer style="min-height:200px; text-align:center;padding-top:0px;">
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> Email Newsletters</h3>
                    <p style="color:#7F8C8D;">Sign up for new Envato content, updates, surveys & offers.</p>
                    <ul>
                        <li>
                            <div class="input-append newsletter-box text-center">
                                <input type="text" class="full text-center test" placeholder="Email ">
                                <button class="btn  bg-gray hvr-shutter-out-horizontal" type="button"> Subscribe <i class="fa fa-long-arrow-right"> </i> </button>

                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-6 col-xs-6">
                    <h3> Product </h3>
                    <ul>
                        <?php
                        $i = 1;
                        foreach ($_SESSION["footer"]['footer_type'] as $key) {
                            ?>
                            <li> <a href="<?php echo base_url("product/$i/all/1/1"); ?>" class="hvr-underline-from-center"> <?= $key->ty_name; ?></a> </li>
                            <?php
                            $i++;
                        }
                        ?>
                    </ul>
                </div>

                <div class="col-lg-2  col-md-2 col-sm-6 col-xs-6 ">

                    <!--                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">-->
                    <h3>Follow us</h3>
                    <div id="footer-social" class="footer-box__content">
                        <ul class="social">
                            <li> <a href="#" class="facebook" > <i class="icon-facebook-circled"></i></a></li>
                            <li> <a href="#" class="instagram"> <i class="icon-instagram-circled"></i></a></li>
                            <li> <a href="#" class="twitter"> <i class="icon-twitter-circled"></i></a></li>
                            <li> <a href="#" class="gplus"> <i class="icon-gplus-circled"></i></a></li>
                        </ul>

                    </div>
                </div>

                <!--                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                                    <h3> Address </h3>
                                    </div>-->
                <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                    <h3> contact us </h3>
                    <ul>
                        <li>มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน วิทยาเขตขอนแก่น</li>
                        <li>150 ตำบล ในเมือง อำเภอเมืองขอนแก่น</li>
                        <li>ขอนแก่น 40000 ประเทศไทย</li>

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12">
                    <h3 class="fix"> Address </h3>
                    <?php echo $_SESSION["footer"]['map']['js']; ?>
                    <?php echo $_SESSION["footer"]['map']['html']; ?>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->

    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left">  Store.com © 2016. All right reserved. </p>
            <div class="pull-right">
                <ul class="nav nav-pills payments">
                    <li><i class="fa fa-cc-visa"></i></li>
                    <li><i class="fa fa-cc-mastercard"></i></li>
                    <li><i class="fa fa-cc-amex"></i></li>
                    <li><i class="fa fa-cc-paypal"></i></li>
                </ul> 
            </div>
        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>




<style>
    .fix{
        padding: 10px 0 10px !important;
    }
    #map_canvas{
        height: 130px !important;
    }
    .footer-social{
        display: block;
        padding: 0;
    }
    .social-links{
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .social-links li {
        display: inline-block;
        padding: 0px 2px;
    }

    .test{
        border-radius: 4px;
        width: 100%;
    }
    .full {
        width: 100%;    
    }
    .gap {
        height: 30px;
        width: 100%;
        clear: both;
        display: block;
    }
    .footer {
        background: #EDEFF1;
        height: auto;
        padding-bottom: 30px;
        position: relative;
        width: 100%;
        border-bottom: 1px solid #CCCCCC;
        border-top: 1px solid #DDDDDD;
    }
    .footer p {
        margin: 0;
    }
    .footer img {
        max-width: 100%;
    }
    .footer h3 {
        border-bottom: 1px solid #BAC1C8;
        color: #54697E;
        font-size: 18px;
        font-weight: 600;
        line-height: 27px;
        padding: 40px 0 10px;
        text-transform: uppercase;
    }
    .footer ul {
        font-size: 13px;
        list-style-type: none;
        margin-left: 0;
        padding-left: 0;
        margin-top: 15px;
        color: #7F8C8D;
    }
    .footer ul li a {
        padding: 0 0 5px 0;
        display: block;
        text-decoration: none;

    }

    .footer a {
        color: #78828D
    }
    .supportLi h4 {
        font-size: 20px;
        font-weight: lighter;
        line-height: normal;
        margin-bottom: 0 !important;
        padding-bottom: 0;
    }
    .newsletter-box input#appendedInputButton {
        background: #FFFFFF;
        display: inline-block;
        float: left;
        height: 30px;
        clear: both;
        width: 100%;
    }
    .newsletter-box .btn {
        border: medium none;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -o-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px;
        display: inline-block;
        height: 30px;
        padding: 0;
        width: 100%;
        color: #333;
    }
    .newsletter-box {
        overflow: hidden;
    }
    .bg-gray {
        background-image: -moz-linear-gradient(center bottom, #BBBBBB 0%, #F0F0F0 100%);
        box-shadow: 0 1px 0 #B4B3B3;
    }
    .social li {
        background: none repeat scroll 0 0 #B5B5B5;
        border: 2px solid #B5B5B5;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -o-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%;
        float: left;
        height: 36px;
        line-height: 36px;
        margin: 0 5px 0 0;
        padding: 0;
        text-align: center;
        width: 36px;
        transition: all 0.5s ease 0s;
        -moz-transition: all 0.5s ease 0s;
        -webkit-transition: all 0.5s ease 0s;
        -ms-transition: all 0.5s ease 0s;
        -o-transition: all 0.5s ease 0s;
    }
    .social li:hover {
        transform: scale(1.15) rotate(360deg);
        -webkit-transform: scale(1.1) rotate(360deg);
        -moz-transform: scale(1.1) rotate(360deg);
        -ms-transform: scale(1.1) rotate(360deg);
        -o-transform: scale(1.1) rotate(360deg);
    }
    .social li a {
        font-size: 12px;
        color: #EDEFF1;
    }
    .social li:hover {
        border: 2px solid #2c3e50;
        background: #2c3e50;
    }
    .social li a i {
        font-size: 32px;
        margin-left:-6px;
        /*margin: 0 0 0 5px;*/
        color: #EDEFF1 !important;
    }
    .footer-bottom {
        background: #E3E3E3;
        border-top: 1px solid #DDDDDD;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .footer-bottom p.pull-left {
        padding-top: 6px;
    }
    .payments {
        font-size: 1.5em;	
    }
</style>
<script>

    $(document).ready(function () {
        $("#contactForm").validate({
            focusInvalid: false,
            rules: {
                name: {
                    required: true,
                    focusInvalid: false
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    number: true
                },
                message: {
                    required: true
                }

            },
            messages: {
                name: {
                    required: ""
                },
                email: {
                    required: "",
                    email: ""
                },
                phone: {
                    required: "",
                    number: ""
                },
                message: {
                    required: "",
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: "<?php echo base_url("my_customer/customer_contact"); ?>",
                    method: "POST",
                    datatype: "html",
                    data: $("#contactForm").serialize(),
                    success: function (response) {

                    }
                });
            }
        });




    });

</script>
<style>
    /* Shutter Out Horizontal */
    .hvr-shutter-out-horizontal {
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -moz-osx-font-smoothing: grayscale;
        position: relative;
        background: #e1e1e1;
        -webkit-transition-property: color;
        transition-property: color;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
    }
    .hvr-shutter-out-horizontal:before {
        content: "";
        position: absolute;
        z-index: -1;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: #2098d1;
        -webkit-transform: scaleX(0);
        transform: scaleX(0);
        -webkit-transform-origin: 50%;
        transform-origin: 50%;
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
    }
    .hvr-shutter-out-horizontal:hover, .hvr-shutter-out-horizontal:focus, .hvr-shutter-out-horizontal:active {
        color: white;
    }
    .hvr-shutter-out-horizontal:hover:before, .hvr-shutter-out-horizontal:focus:before, .hvr-shutter-out-horizontal:active:before {
        -webkit-transform: scaleX(1);
        transform: scaleX(1);
    }

    /* Underline From Center */
    .hvr-underline-from-center {
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -moz-osx-font-smoothing: grayscale;
        position: relative;
        overflow: hidden;
    }
    .hvr-underline-from-center:before {
        content: "";
        position: absolute;
        z-index: -1;
        left: 50%;
        right: 50%;
        bottom: 0;
        background: #2098d1;
        height: 4px;
        -webkit-transition-property: left, right;
        transition-property: left, right;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
    }
    .hvr-underline-from-center:hover:before, .hvr-underline-from-center:focus:before, .hvr-underline-from-center:active:before {
        left: 0;
        right: 0;
    }

    /* Rectangle In */
    .hvr-rectangle-in {
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -moz-osx-font-smoothing: grayscale;
        position: relative;
        background: #2098d1;
        -webkit-transition-property: color;
        transition-property: color;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
    }
    .hvr-rectangle-in:before {
        content: "";
        position: absolute;
        z-index: -1;
        top: -1;
        left: -1;
        right: -1;
        bottom: -1;
        background: #e1e1e1;
        -webkit-transform: scale(1);
        transform: scale(1);
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
    }
    .hvr-rectangle-in:hover, .hvr-rectangle-in:focus, .hvr-rectangle-in:active {
        color: white;
    }
    .hvr-rectangle-in:hover:before, .hvr-rectangle-in:focus:before, .hvr-rectangle-in:active:before {
        -webkit-transform: scale(0);
        transform: scale(0);
    }

    /* Rectangle Out */
    .hvr-rectangle-out {
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -moz-osx-font-smoothing: grayscale;
        position: relative;
        background: #e1e1e1;
        -webkit-transition-property: color;
        transition-property: color;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
    }
    .hvr-rectangle-out:before {
        content: "";
        position: absolute;
        z-index: -1;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #2098d1;
        -webkit-transform: scale(0);
        transform: scale(0);
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
    }
    .hvr-rectangle-out:hover, .hvr-rectangle-out:focus, .hvr-rectangle-out:active {
        color: white;
    }
    .hvr-rectangle-out:hover:before, .hvr-rectangle-out:focus:before, .hvr-rectangle-out:active:before {
        -webkit-transform: scale(1);
        transform: scale(1);
    }

</style>

