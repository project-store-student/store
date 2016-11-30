<?php $this->load->view("bootstrap_and_js.php"); ?>
<script type="text/javascript" src="<?php echo base_url("assets/bootstrap-datetimepicker/build/js/moment.js"); ?>"></script>

<link rel="stylesheet" href="<?php echo base_url("assets/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"); ?>"> 
<script type="text/javascript" src="<?php echo base_url("assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"); ?>"></script>

<?php $this->load->view("view_headerproduct.php"); ?>
<?php
$array = array();
if (isset($_SESSION['chk'])) {
    $array = $_SESSION['chk'];
} else {
    $array = array();
}
?>
<div style="margin:100px;">
    <section class="setting_listfavorites"  style="width:calc(100% - 0px); padding-bottom: 0px;">
        <div  class="container" style="font-size:15px;">
            <form id="chk_setting">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-xs-11 col-sm-11">
                                <div class="row">
                                    <div class="col-xs-2 col-sm-2">
                                        <i class="icon-cog-alt" style="color: #333; font-size:18px; float:left !important;" data-toggle="popover" title="ตั้งค่ารายการโปรด" data-content="ตั้งค่ารายการโปรดของท่าน แล้วกดอัพเดต" > Setting</i>
                                    </div>
                                    <?php
                                    foreach ($data_setting as $rs) {
                                        ?>
                                        <?php if ($rs->caf_name == "All Favorites") { ?>
                                            <div class="col-xs-2 col-sm-2" >
                                                <input id="cnk<?php echo $rs->caf_autoid; ?>" class="chk chk-all" type="checkbox" name="setting[]" value="<?php echo $rs->caf_autoid; ?>" checked=""  disabled="">
                                                <label for="cnk<?php echo $rs->caf_autoid; ?>"><?php echo $rs->caf_name; ?></label>
                                                <input type="hidden" name="setting[]" value="<?php echo $rs->caf_autoid; ?>" />

                                            </div>
                                        <?php } else {
                                            ?>
                                            <?php if (in_array($rs->caf_autoid, $array)) { ?>
                                                <div class="col-xs-2 col-sm-2 " >
                                                    <input id="cnk<?php echo $rs->caf_autoid; ?>" class="chk" type="checkbox" name="setting[]" value="<?php echo $rs->caf_autoid; ?>" checked />
                                                    <label for="cnk<?php echo $rs->caf_autoid; ?>"><?php echo $rs->caf_name; ?></label>
                                                </div>

                                            <?php } else { ?>
                                                <div class="col-xs-2 col-sm-2" >
                                                    <input id="cnk<?php echo $rs->caf_autoid; ?>" class="chk" type="checkbox" name="setting[]" value="<?php echo $rs->caf_autoid; ?>" />
                                                    <label for="cnk<?php echo $rs->caf_autoid; ?>"><?php echo $rs->caf_name; ?></label>
                                                </div>
                                            <?php } ?>
                                        <?php }
                                        ?>

                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-xs-1 col-sm-1" >
                                <input type="submit" value="Update" class = "btn btn-default" style="float:right !important;">  
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>

    </section>
    <section class=""  style="margin: 15px 0px; display: block; ">
        <div  class="container" style="font-size:15px;">
            <?php
            if (count($data) > 0) {
//                    echo "<pre>";
//                    print_r($data);
//                    print_r($data_img);
//                    echo "</pre>";
                ?>
                <div id="content" class="col-md-3 col-xs-12" style="padding-left: 0px;">
                    <div class="listfavorites" style="padding: 0px 0px;">
                        <div class="panel">
                            <div class="panel-heading" style="background-color:teal;color:#fff;"><strong>All Favorites</strong></div>
                            <div class="panel-body" style="background-color:#000;color:#fff; height:235px; box-shadow:0 -12px 13px teal inset;">
                                <?php
                                if (count($data_img) > 0) {
                                    ?>
                                    <?php ?>
                                    <div class="boximg">
                                        <a href="<?php echo base_url("my_customer/favorites_category/AllFavorites"); ?>"><img src="<?php echo base_url("my_customer/showupload/" . $data_img[0]->sm_image . "_fontpage_list.jpg"); ?>" class="img-responsive" ></a>
                                        <span class="label label-danger date"><?php echo $rs->caf_date; ?></span>
                                    </div>
                                <?php } else { ?>
                                    <div class="boximg">
                                        <a href="#"><img src="<?php echo base_url("my_customer/showupload/" . "test1.jpg"); ?>" class="img-responsive" ></a>
                                        <span class="label label-danger date"><?php echo $rs->caf_date; ?></span>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                foreach ($data as $key) {
                    if ($key->caf_name == "All Favorites") {
                        
                    } else {
                        ?>
                        <div id="content" class="col-md-3 col-xs-12" style="padding-left: 0px;">
                            <div class="listfavorites" style="padding: 0px 0px;">
                                <div class="panel">
                                    <div class="panel-heading" style="background-color:teal;color:#fff;"><strong><?php echo $key->caf_name; ?></strong></div>
                                    <div class="panel-body" style="background-color:#000;color:#fff; height:235px; box-shadow:0 -12px 13px teal inset;">
                                        <?php foreach ($data_img as $rs) { ?>
                                            <?php if ($key->caf_autoid == $rs->caf_autoid) { ?>
                                                <div class="boximg">
                                                    <a href="<?php echo base_url("my_customer/favorites_category/$key->caf_name"); ?>"><img src="<?php echo base_url("my_customer/showupload/" . $rs->sm_image . "_fontpage_list.jpg"); ?>" class="img-responsive" ></a>
                                                    <span class="label label-danger date"><?php echo $rs->caf_date; ?></span>
                                                </div>
                                                <?php break; ?>
                                                <?php
                                            } else {
                                                if (count($data_img) > 0) {
                                                    continue;
                                                }
                                                ?>
                                                <div class="boximg">
                                                    <a href="#"><img src="<?php echo base_url("my_customer/showupload/" . "test1.jpg"); ?>" class="img-responsive" ></a>
                                                    <span class="label label-danger date"><?php echo $rs->caf_date; ?></span>
                                                </div>
                                            <?php } ?>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            <?php } else { ?> 
                <div id="content" class="col-md-3 col-xs-12" style="padding-left: 0px;">
                    <div class="listfavorites">
                        <div class="row">
                            <h3>Browse Favorites!</h3>
                            <hr>
                        </div>
                        <div class="row">
                            <p style="word-wrap: break-word;">ไปหน้าสินค้าของ Store.com แล้วกดรูป <i class="icon-heart"></i> เพื่อสร้างรายการโปรดที่คุณชื่นชอบ</p>                     
                        </div>
                        <div class="row" style="margin-top:20px">
                            <a href="<?php echo base_url('my_customer/index'); ?>" class="btn btn-default"><i id="pic" class="icon-globe"></i>Browse  Favorites</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div id="sidebar" class="col-md-3 col-xs-12 collapsed-fa">
                <div class="listfavorites">
                    <form id="save-favorites">
                        <div class="form-group">
                            <label for="name_favorites">ชื่อรายการโปรด</label>
                            <input type="text" class="form-control" id="namename_favorites" name="namename_favorites" placeholder="Name Favorites">
                        </div>
                        <div class="form-group">
                            <label for="name_favorites">วัน/เดือน/ปี</label><!--
                            <input type="text" id="datepickertest" class="form-control" id="date_favorites" name="date_favorites" placeholder="Name Favorites">-->
                            <div class='input-group ' id='datetimepicker5' style="">
                                <input type='text' name="date_favorites" id="date_favorites" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="btn" class="btn btn-default" ><i  class=""></i> Create Favorites</button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="content" class="col-md-3 col-xs-12">
                <div class="listfavorites">
                    <div class="row">
                        <h3>Create Favorites!</h3>
                        <hr>
                    </div>
                    <div class="row">
                        <p style="word-wrap: break-word;"><dd>สร้างรายการโปรดของคุณ <i class="icon-heart"></i> โดยกำหนดวันที่คุณคิดว่าจะซื้อ ระบบจะทำการแจ้งเตือนไปยังคุณ</p>                     
                    </div>
                    <div class="row" style="margin-top:20px">
                        <button type="button" id="btn-create" class="btn btn-default" ><i id="pic" class="icon-plus"></i> New Favorites</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div style="clear: both"></div>
<?php $this->load->view('view_footerproduct'); ?>

<style>

    input[type=checkbox] { display:none; } /* to hide the checkbox itself */
    input[type=checkbox] + label:before {
        font-family: fontello;
        display: inline-block;
    }

    input[type=checkbox] + label:before { content: "\F096"; } /* unchecked icon */
    input[type=checkbox] + label:before { letter-spacing: 10px; } /* space between checkbox and label */

    input[type=checkbox]:checked + label:before { content: "\F14A"; } /* checked icon */
    input[type=checkbox]:checked + label:before { letter-spacing: 9px; } /* allow space for check mark */

    .listfavorites{
        border: 1px solid #f5f5f5;
        padding: 20px 40px;
        background: white;
        width: 284px;
        height: 300px;
    }

    #sidebar {
        /* for the animation */
        transition: margin 0.3s ease;
        padding: 0px;

    }

    .collapsed-fa {
        /* hide it for small displays*/
        display: none;
    }

    @media (min-width: 992px) {
        .collapsed-fa {
            display: none;
            /* same width as sidebar */
            margin-left: -25%;
        }
    }
    #row-main {
        /* necessary to hide collapsed-fa sidebar */
    }
    #content {
        /* for the animation */
        transition: width 0.3s ease;
        padding: 0.5px 0px;
    }
</style>
<script>
    $(document).ready(function () {
        //$('.chk-all').attr('disabled', true);
        $('#datetimepicker5').datetimepicker({
            showTodayButton: true,
            format: "DD-MM-YYYY hh:mm A",
            sideBySide: true,
            widgetPositioning: {
                horizontal: 'left',
                vertical: 'bottom'
            }
        });
        $('[data-toggle="popover"]').popover({
            trigger: "hover",
            placement: 'top'
        });
        $("#save-favorites").validate({
            focusInvalid: false,
            rules: {
                namename_favorites: {
                    required: true
                },
                date_favorites: {
                    required: true
                }
            },
            messages: {
                namename_favorites: {
                    required: ""
                },
                date_favorites: {
                    required: ""
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: "<?php echo base_url("my_customer/create_favorites"); ?>",
                    method: "post",
                    datatype: "html",
                    data: $("#save-favorites").serialize(),
                    success: function (response) {
                        location.reload();
                    }
                });
            }
        });

//        $('#datepickertest').datepicker({
//            dateFormat: 'dd-M-yy'
//                    //startDate: '-3d'
//        });

        $('#btn-create').on("click", function () {
            $("#pic").toggleClass("icon-plus icon-cancel");
            $("#sidebar").toggleClass("collapsed-fa", 1000, "easeOutSine");
//            $("#content").toggleClass("col-md-3 col-md-3");
        });

        $('#chk_setting').on("submit", function () {
            $.ajax({
                url: "<?php echo base_url("my_customer/setting_favorites"); ?>",
                method: "post",
                datatype: "html",
                data: $("#chk_setting").serialize(),
                success: function (response) {
                    alert(response);
                    alert("บันทึกการตั้งค่าเรียบร้อย");
                }
            });
            return false;

        });
//        $("#update_setting").on("click", function () {
//            alert('sss');
//        });
    });
</script>

<style type="text/css">
    .popover-title{
        color: #333;
    }
    .popover-content{
        margin-left: 10px;
    }
    .outerpadding{
        padding:10% 0%;}
    .boximg{
        position:relative;
        overflow:hidden;
    }

    .boximg img{
        transition:all ease-in 500ms;
        border:1px solid #fff;
    }	
    .boximg img:hover{
        transform:scale(1.3,1.3);
        cursor:pointer;

    }	

    .boximg:hover{
        border:1px solid #fff;
    }	

    .date{
        left: 0;
        position: absolute;
        top: 15px;
        padding:5px;
        background-color:teal;
        opacity:0;
        transition:all ease-in 300ms;

    }	

    .likebut{
        background: none repeat scroll 0 0 teal;
        width: 50px;
        height: 25px;
        padding: 7px;
        position: absolute;
        right: 5px;
        top: 130px;
        width: 25px;
        opacity:0.4;
        transition:all ease-in 300ms;
    }


    .boximg:hover .date{
        opacity:1;

    }	
    .boximg:hover .likebut{
        opacity:1;

    }


</style>

<style>
    form .error {
        color: #ff0000;
    }   
    form input.error {
        border:1px solid red;
    }
    form select.error {
        border:1px solid red;
    }
    form textarea.error {
        border:1px solid red;
    }

</style>
