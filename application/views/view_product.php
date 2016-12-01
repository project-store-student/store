<?php $this->load->view("bootstrap_and_js.php"); ?>

<?php $this->load->view("view_headerproduct.php"); ?>
<?php
$item_cookie = $this->input->cookie();

$array[] = array();
foreach ($item_cookie as $key => $value) {

    if ($key == "ci_session") {
        
    } else {
        $array[] = $key;
    }
}
$array_favorites[] = array();
foreach ($test as $key) {
    $array_favorites[] = $key->ss_autoid;
}
// 
//print_r($array_favorites);
?>
<header id="page-top" class="" style="margin-top: 50px; ">

    <div id="carousel-example"   class="carousel slide " data-ride="carousel" style="margin-top: 50px; ">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" >
            <div class="item active">
                <?php
                $numItems = count($data['1']);
                $chk_row = 1;
                foreach ($data['1'] as $key) {
                    ?>
                    <div class="resize-slide col-lg-3 col-md-4 col-sm-4 col-xs-6  <?php
                    if ($chk_row % 2 == 0) {
                        echo "hidden-xs";
                    }
                    if ($chk_row === $numItems) {
                        echo " hidden-sm";
                        echo " hidden-md";
                    }
                    ?>">

                        <div class="col-item">
                            <div class="[ info-card ]">

                                <div class="photo" style="margin-bottom:20px;">
                                    <center><img name="img1" id="img1" class="img-slide" style=" height: 260px;" src="<?php echo base_url("my_customer/showupload/" . $key->sm_image . "_fontpage_slide.jpg"); ?>"></center>
                                    <div class="after" <?php
                                    if ($key->sm_amount > 0) {
                                        
                                    } else {
                                        echo "style='background-color: red; color: white;'";
                                    }
                                    ?> >
                                        <small>คงเหลือ <?php echo $key->sm_amount; ?> ชิ้น</small>
                                    </div>
                                </div>
                                <div class="[ info-card-details ] animate">
                                    <!--                                            <div class="[ info-card-header ]" style="color:black;">
                                    
                                                                                </div>-->
                                    <div class="[ info-card-detail ]" style="color:black;">
                                        <h1 style="font-size: 16px;"><b>รายระเอียดสินค้า</b></h1>
                                        <h5 style="font-size: 14px;"><p style="word-wrap: break-word;"><?php echo $key->sm_productdetail; ?></p></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price col-md-8">
                                        <h5 class="textname"><b>ชื่อสินค้า</b><?php echo " " . $key->sm_productname; ?></h5>
                                        <h5 class="textname"><b>หมวด</b><?php echo " " . $key->ty_name; ?></h5>
                                        <h5 class="textname"><b>ประเภท</b><?php echo " " . $key->ct_name; ?></h5>
                                        <h5 class=" hidden-lg price-text-color">฿<?php echo " " . $key->ss_price . " "; ?> ต่อ <?php echo $key->ss_unit; ?></h5>
                                    </div>
                                    <div class="rating hidden-xs hidden-sm hidden-md col-md-4">
                                        <h5 align="left" class="price-text-color">฿<?php echo $key->ss_price . " "; ?> ต่อ <?php echo $key->ss_unit; ?></h5>
                                    </div>
                                </div>
                                <br class="hidden-xs hidden-sm hidden-md">
                                <?php if ($key->sm_amount > 0) { ?>
                                    <div class="separator clear-left">
                                        <?php if (in_array($key->ss_autoid, $array_favorites)) { ?>
                                            <p id="slide_favorites<?php echo $key->ss_autoid; ?>" class="btn-details"><a class="deletefavorites" data-id="<?php echo $key->ss_autoid; ?>"  href="javascript:void(0);"  ><i class="icon-heart" ></i></a></p>
                                        <?php } else { ?>
                                            <p id="slide_favorites<?php echo $key->ss_autoid; ?>" class="btn-details"><a id="addfavorites"  class="addfavorites" data-id = "<?php echo $key->ss_autoid; ?>"  href="javascript:void(0);" ><i class="icon-heart"></i></a></p>
                                        <?php } ?>
                                        <?php if (in_array($key->sm_autoid, $array)) { ?>
                                            <p id = "slide<?php echo $key->sm_autoid; ?>" class = "btn-add"><a class="deleteitem" data-id="<?php echo $key->sm_autoid; ?>"  href="javascript:void(0);" ><span>Remove cart</span><i class="icon-cancel"></i></a></p>
                                        <?php } else { ?>
                                            <p id = "slide<?php echo $key->sm_autoid; ?>" class = "btn-add"><a class = "additem" data-id = "<?php echo $key->sm_autoid; ?>" href = "javascript:void(0);" ><i class = "icon-basket"></i> <span>Add to cart</span></a></p>
                                        <?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="separator clear-left">
                                        <?php if (in_array($key->ss_autoid, $array_favorites)) { ?>
                                            <p id="slide_favorites<?php echo $key->ss_autoid; ?>" class="btn-details" style="width: 30%;"><a class="deletefavorites" data-id="<?php echo $key->ss_autoid; ?>"  href="javascript:void(0);" ><i class="icon-heart" ></i></a></p>
                                        <?php } else { ?>
                                            <p id="slide_favorites<?php echo $key->ss_autoid; ?>" class="btn-details" style="width: 30%;"><a id="addfavorites"  class="addfavorites" data-id = "<?php echo $key->ss_autoid; ?>"  href="javascript:void(0);" ><i class="icon-heart"></i></a></p>
                                        <?php } ?>
                                        <p id = "outstore" class ="outstore" style="width: 70%; "><a href = "javascript:void(0);" style="color: red;"><i class = "icon-cancel-circled"></i> ขออภัย สินค้าหมดชั่วคราว</a></p>
                                    </div>
                                <?php } ?>
                                <div class="clearfix"></div>

                            </div>

                        </div>
                    </div>
                    <?php
                    $chk_row++;
                }
                ?>
            </div>
            <!--slider เล็กต่อไป-->
            <?php
            for ($i = 2; $i <= 5; $i++) {
                if (count($data[$i]) == 0) {
                    break;
                } else {
                    
                }
                ?>
                <div class="item">
                    <?php
                    $numItems = count($data[$i]);
                    $chk_row = 1;
                    foreach ($data[$i] as $key) {
                        ?>

                        <!--                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">-->
                        <div class="resize-slide-small col-lg-3 col-md-4 col-sm-4 col-xs-6  <?php
                        if ($chk_row % 2 == 0) {
                            echo "hidden-xs";
                        }
                        if ($chk_row === $numItems) {
                            echo " hidden-sm";
                            echo " hidden-md";
                        }
                        ?>">
                            <div class="col-item">

                                <div class="[ info-card ]">
                                    <div class="photo" style="margin-bottom:20px;">
                                        <center><img name="img1" id="img1" class="img-slide-small" style="height: 260px;"  src="<?php echo base_url("my_customer/showupload/" . $key->sm_image . "_fontpage_slide.jpg"); ?>"></center>
                                        <div class="after" <?php
                                        if ($key->sm_amount > 0) {
                                            
                                        } else {
                                            echo "style='background-color: red; color: white;'";
                                        }
                                        ?> >
                                            <small>คงเหลือ  <?php echo $key->sm_amount; ?> ชิ้น</small>
                                        </div>
                                    </div>
                                    <div class="[ info-card-details ] animate">
                                        <!--                                                <div class="[ info-card-header ]">
                                                                                        </div>-->
                                        <div class="[ info-card-detail ]" style="color:black;">
                                            <h1 style="font-size: 16px;"><b>รายระเอียดสินค้า</b></h1>
                                            <h5 style="font-size: 14px;"><p style="word-wrap: break-word;"><?php echo $key->sm_productdetail; ?></p></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-8">
                                            <h5 class="textname"><b>ชื่อสินค้า</b><?php echo " " . $key->sm_productname; ?></h5>
                                            <h5 class="textname"><b>หมวด</b><?php echo " " . $key->ty_name; ?></h5>
                                            <h5 class="textname"><b>ประเภท</b><?php echo " " . $key->ct_name; ?></h5>
                                            <h5 class="textname hidden-lg price-text-color">฿<?php echo " " . $key->ss_price . " "; ?> ต่อ <?php echo $key->ss_unit; ?></h5>
                                        </div>
                                        <div class="rating hidden-xs hidden-sm hidden-md col-md-4">
                                            <h5 align="left" class="price-text-color">฿<?php echo $key->ss_price . " "; ?> ต่อ <?php echo $key->ss_unit; ?></h5>
                                        </div>
                                    </div>
                                    <br class="hidden-xs hidden-sm hidden-md">
                                    <?php if ($key->sm_amount > 0) { ?>
                                        <div class="separator clear-left">
                                            <?php if (in_array($key->ss_autoid, $array_favorites)) { ?>
                                                <p id="slide_favorites<?php echo $key->ss_autoid; ?>" class="btn-details"><a class="deletefavorites" data-id="<?php echo $key->ss_autoid; ?>"  href="javascript:void(0);" ><i class="icon-heart" ></i></a></p>
                                            <?php } else { ?>
                                                <p id="slide_favorites<?php echo $key->ss_autoid; ?>" class="btn-details"><a class="addfavorites" data-id = "<?php echo $key->ss_autoid; ?>"  href="javascript:void(0);" ><i class="icon-heart"></i></a></p>
                                            <?php } ?>
                                            <?php if (in_array($key->sm_autoid, $array)) { ?>
                                                <p id = "slide<?php echo $key->sm_autoid; ?>" class = "btn-add"><a class="deleteitem" data-id="<?php echo $key->sm_autoid; ?>"  href="javascript:void(0);" ><span>Remove cart</span><i class="icon-cancel"></i></a></p>
                                            <?php } else { ?>
                                                <p id = "slide<?php echo $key->sm_autoid; ?>" class = "btn-add"><a class = "additem" data-id = "<?php echo $key->sm_autoid; ?>" href = "javascript:void(0);" ><i class = "icon-basket"></i> <span>Add to cart</span></a></p>
                                            <?php } ?>    
                                        </div>
                                    <?php } else { ?>
                                        <div class="separator clear-left">
                                            <?php if (in_array($key->ss_autoid, $array_favorites)) { ?>
                                                <p id="slide_favorites<?php echo $key->ss_autoid; ?>" class="btn-details" style="width: 30%;"><a class="deletefavorites" data-id="<?php echo $key->ss_autoid; ?>"  href="javascript:void(0);" ><i class="icon-heart" ></i></a></p>
                                            <?php } else { ?>
                                                <p id="slide_favorites<?php echo $key->ss_autoid; ?>" class="btn-details" style="width: 30%;"><a id="addfavorites"  class="addfavorites" data-id = "<?php echo $key->ss_autoid; ?>"  href="javascript:void(0);" ><i class="icon-heart"></i></a></p>
                                            <?php } ?>
                                            <p id = "outstore" class ="outstore" style="width: 70%; "><a href = "javascript:void(0);" style="color: red;"><i class = "icon-cancel-circled"></i> ขออภัย สินค้าหมดชั่วคราว</a></p>
                                        </div>
                                    <?php } ?>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
                        $chk_row++;
                    }
                    ?>
                </div>

            <?php } ?>
            <!--slider เล็กต่อไป-->

        </div>
    </div>
</header>

<div class="content-wrapper" >
    <section class="primary" id="product" style="width:calc(100% - 0px); padding-bottom: 0px; ">
        <nav id="nav-fixed" class="navbar navbar-default navbar-color hidden-xs hidden-sm hidden-md nav-fixed-1" style="height:20px; margin-top:0px; background-color:#EDEFF1 !important;" >
            <!-- Collect the nav links, forms, and other content for toggling -->
            <ul class="nav navbar-nav ul-nav">
                <li class="li" style="border-left: 1px solid #E1E1E1;"><a id="click1" href="#step-1" onClick="$('#step-2').hide(); $('#step-3').hide(); $('#step-4').hide(); $('#step-5').hide(); $('#step-1').show();">งานรากฐาน โครงสร้าง</a></li>
                <li class="li"><a id="click2" href="#step-2" onClick="$('#step-1').hide(); $('#step-3').hide(); $('#step-4').hide(); $('#step-5').hide(); $('#step-2').show();">หลังคา</a></li>
                <li class="li"><a id="click3" href="#step-3" onClick="$('#step-2').hide(); $('#step-1').hide(); $('#step-4').hide(); $('#step-5').hide(); $('#step-3').show();">งานโครงสร้างฝาผนัง</a></li>
                <li class="li"><a id="click4" href="#step-4" onClick="$('#step-2').hide(); $('#step-3').hide(); $('#step-1').hide(); $('#step-5').hide(); $('#step-4').show();">วัสดุ ท่อประปา ท่อสายไฟ</a></li>
                <li class="li" ><a id="click5" href="#step-5" onClick="$('#step-2').hide(); $('#step-3').hide(); $('#step-4').hide(); $('#step-1').hide(); $('#step-5').show();">วัสดุ ตกแต่ง</a></li>
            </ul>
            <!--            </div> /.container-fluid -->
        </nav>
        <nav class="navbar navbar-default  hidden-lg nav-fixed-1" style="background-color:#EDEFF1 !important;">
            <div class="navbar-header page-scroll" style="width:100%;">
                <button type="button" id="nav-bar-2" class="navbar-collapse-bar" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span id="span-icon-2" class="icon-down-open"></span>
                </button>

                <ul class="nav navbar-nav-bar ">
                    <?php if ($this->uri->segment(2) == 1) { ?>
                        <li class="li" style="border:0px;"><a id="click1" href="<?php echo base_url("product/1/all/1/1"); ?>" >งานรากฐาน โครงสร้าง</a></li>
                    <?php } else if ($this->uri->segment(2) == 2) { ?>
                        <li class="li" style="border:0px;"><a id="click2" href="<?php echo base_url("product/2/all/1/1"); ?>" >หลังคา</a></li>
                    <?php } else if ($this->uri->segment(2) == 3) { ?>
                        <li class="li" style="border:0px;"><a id="click3" href="<?php echo base_url("product/3/all/1/1"); ?>" >งานโครงสร้างฝาผนัง</a></li>
                    <?php } else if ($this->uri->segment(2) == 4) { ?>
                        <li class="li" style="border:0px;"><a id="click4" href="<?php echo base_url("product/4/all/1/1"); ?>" >วัสดุ ท่อประปา ท่อสายไฟ</a></li>
                    <?php } else if ($this->uri->segment(2) == 5) { ?>
                        <li class="li" style="border:0px;"><a id="click5" href="<?php echo base_url("product/5/all/1/1"); ?>" >วัสดุ ตกแต่ง</a></li>
                    <?php } else { ?>
                        <li class="li" style="border:0px;"><a id = "click1" href = "<?php echo base_url("product/1/all/1/1"); ?>" >งานรากฐาน โครงสร้าง</a></li>
                    <?php } ?>
                </ul>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse hidden-lg" id="bs-example-navbar-collapse-2" >
                <ul class="nav navbar-nav-bar ul-col" style="background-color: white !important;">
                    <li class="li" style="border: 0px;"><a id="click1" href="<?php echo base_url("product/1/all/1/1"); ?>" >งานรากฐาน โครงสร้าง</a></li>
                    <li class="li" style="border:0px;"><a id="click2" href="<?php echo base_url("product/2/all/1/1"); ?>" >หลังคา</a></li>
                    <li class="li" style="border:0px;"><a id="click3" href="<?php echo base_url("product/3/all/1/1"); ?>" >งานโครงสร้างฝาผนัง</a></li>
                    <li class="li" style="border:0px;"><a id="click4" href="<?php echo base_url("product/4/all/1/1"); ?>" >วัสดุ ท่อประปา ท่อสายไฟ</a></li>
                    <li class="li" style="border:0px;"><a id="click5" href="<?php echo base_url("product/5/all/1/1"); ?>" >วัสดุ ตกแต่ง</a></li>
                </ul>
            </div>
        </nav>

        <div class="clearfix"></div>

        <?php
        for ($i = 1; $i <= 5; $i++) {
            if (count($type[$i]) == 0) {
                
            } else {
                
            }
            ?>
            <div id="step-<?php echo $i; ?>" style="display:none; width: 100%; ">
                <div style="padding:15px 0px;">
                    <?php if ($i == 1) { ?>
                        <ul class="nav navbar-nav-bar ul-col" style="background-color: white !important;">
                            <li class="li" style="border: 0px;"><a href="<?php echo base_url("product/1/all/1/1"); ?>" >All Category</a></li>
                            <?php foreach ($category[$i] as $cat1) { ?>
                                <li class="li" style="border: 0px;"><a  href="<?php echo base_url("product/$i/$cat1->ct_name/$cat1->ct_auto/1"); ?>" ><?php echo $cat1->ct_name; ?></a></li>
                            <?php } ?>
                        </ul>
                    <?php } else if ($i == 2) { ?>

                        <ul class="nav navbar-nav-bar ul-col" style="background-color: white !important;">
                            <li class="li" style="border: 0px;"><a href="<?php echo base_url("product/$i/all/1/1"); ?>" >All Category</a></li>
                            <?php foreach ($category[$i] as $cat1) { ?>
                                <li class="li" style="border: 0px;"><a  href="<?php echo base_url("product/$i/$cat1->ct_name/$cat1->ct_auto/1"); ?>" ><?php echo $cat1->ct_name; ?></a></li>
                            <?php } ?>
                        </ul>
                    <?php } else if ($i == 3) { ?>

                        <ul class="nav navbar-nav-bar ul-col" style="background-color: white !important;">
                            <li class="li" style="border: 0px;"><a href="<?php echo base_url("product/$i/all/1/1"); ?>" >All Category</a></li>
                            <?php foreach ($category[$i] as $cat1) { ?>
                                <li class="li" style="border: 0px;"><a  href="<?php echo base_url("product/$i/$cat1->ct_name/$cat1->ct_auto/1"); ?>" ><?php echo $cat1->ct_name; ?></a></li>
                            <?php } ?>
                        </ul>
                    <?php } else if ($i == 4) { ?>
                        <ul class="nav navbar-nav-bar ul-col" style="background-color: white !important;">
                            <li class="li" style="border: 0px;"><a href="<?php echo base_url("product/$i/all/1/1"); ?>" >All Category</a></li>
                            <?php foreach ($category[$i] as $cat1) { ?>
                                <li class="li" style="border: 0px;"><a  href="<?php echo base_url("product/$i/$cat1->ct_name/$cat1->ct_auto/1"); ?>" ><?php echo $cat1->ct_name; ?></a></li>
                            <?php } ?>
                        </ul>
                    <?php } else if ($i == 5) { ?>
                        <ul class="nav navbar-nav-bar ul-col" style="background-color: white !important;">
                            <li class="li" style="border: 0px;"><a href="<?php echo base_url("product/$i/all/1/1"); ?>" >All Category</a></li>
                            <?php foreach ($category[$i] as $cat1) { ?>
                                <li class="li" style="border: 0px;"><a  href="<?php echo base_url("product/$i/$cat1->ct_name/$cat1->ct_auto/1"); ?>" ><?php echo $cat1->ct_name; ?></a></li>
                            <?php } ?>
                        </ul>
                        <?php
                    } else {
                        
                    }
                    ?>
                </div>
                <?php
                if (isset($show_category[$i])) {
                    $chk = count($show_category[$i]);
                } else {
                    $chk = 0;
                }
                if ($chk > 0) {
                    ?>
                    <div class="border-top-button">
                        <nav>
                            <ul class="pagination">
                                <?php
                                $total = $_SESSION["page_ca$i"]['total_ca'];
                                $amountpage = $_SESSION["page_ca$i"]['amountpage_ca'];
                                $cid = $_SESSION["page_ca$i"]['cid'];
                                $cname = $_SESSION["page_ca$i"]['name'];
                                if ($amountpage == 1) {
                                    
                                } else {
                                    ?>
                                    <li>
                                        <a href="<?php echo base_url("product/$i/$cname/$cid/1"); ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php
                                }
                                for ($a = 1; $a <= $total; $a++) {
                                    ?>
                                    <li><a href="<?php echo base_url("product/$i/$cname/$cid/"); ?><?php echo $a; ?>"><?php echo $a; ?></a></li>
                                    <?php
                                }
                                if ($amountpage == $total) {
                                    
                                } else {
                                    if ($total != 0) {
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url("product/$i/$cname/$cid/"); ?><?php echo $total; ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                <?php } else { ?>
                    <div class="border-top-button">
                        <nav>
                            <ul class="pagination">
                                <?php
                                $total = $_SESSION["page$i"]['total'];
                                $amountpage = $_SESSION["page$i"]['amountpage'];

                                if ($amountpage == 1) {
                                    
                                } else {
                                    ?>
                                    <li>
                                        <a href="<?php echo base_url("product/$i/all/1/1"); ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php
                                }
                                for ($a = 1; $a <= $total; $a++) {
                                    ?>
                                    <li><a href="<?php echo base_url("product/$i/all/1/"); ?><?php echo $a; ?>"><?php echo $a; ?></a></li>
                                    <?php
                                }
                                if ($amountpage == $total) {
                                    
                                } else {
                                    if ($total != 0) {
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url("product/$i/all/1/"); ?><?php echo $total; ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                <?php } ?>
                <div class="row" style="margin: 30px 15px; " >

                    <?php
                    if (isset($show_category[$i])) {
                        $chk = count($show_category[$i]);
                    } else {
                        $chk = 0;
                    }
                    if ($chk > 0) {
                        foreach ($show_category[$i] as $rs) {
                            ?>
                            <!--                            <div class="col-sm-3" style="padding:15px; ">-->
                            <div class="test-resize-<?php echo $i; ?> col-lg-3 col-md-4 col-sm-4 col-xs-6" style="padding:15px; ">
                                <div class="col-item">

                                    <div class="[ info-card ]">

                                        <div class="photo">
                                            <center><img name="img1" id="img1" class="img-<?php echo $i; ?>" style="height: 240px;" src="<?php echo base_url("my_customer/showupload/" . $rs->sm_image . "_fontpage_list.jpg"); ?>"></center>
                                            <div class="after" <?php
                                            if ($rs->sm_amount > 0) {
                                                
                                            } else {
                                                echo "style='background-color: red; color: white;'";
                                            }
                                            ?> >
                                                <small>คงเหลือ <?php echo $rs->sm_amount; ?> ชิ้น</small>
                                            </div>


                                        </div>
                                        <div class="[ info-card-details ] animate">
                                            <!--                                        <div class="[ info-card-header ]">
                                                                                    </div>-->
                                            <div class="[ info-card-detail ]" style="color:black;">
                                                <h1 style="font-size: 16px;"><b>รายระเอียดสินค้า</b></h1>
                                                <h5 style="font-size: 14px;"><p style="word-wrap: break-word;"><?php echo $rs->sm_productdetail; ?></p></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                                <h5 class="textname"><b>ชื่อสินค้า</b><?php echo " " . $rs->sm_productname; ?></h5 >
                                                <h5 class="textname"><b>หมวด</b><?php echo " " . $rs->ty_name; ?></h5>
                                                <h5 class="textname"><b>ประเภท</b><?php echo " " . $rs->ct_name; ?></h5>
                                                <h5 class="textname hidden-lg price-text-color">฿<?php echo " " . $rs->ss_price . " "; ?> ต่อ <?php echo $rs->ss_unit; ?></h5>
                                            </div>
                                            <div class="rating hidden-xs hidden-sm hidden-md col-md-4">
                                                <h5 align="left" class="price-text-color">฿<?php echo $rs->ss_price . " "; ?> ต่อ <?php echo $rs->ss_unit; ?></h5>
                                            </div>
                                        </div>
                                        <br class="hidden-xs hidden-sm hidden-md">
                                        <?php if ($rs->sm_amount > 0) { ?>
                                            <div class="separator clear-left">
                                                <?php if (in_array($rs->ss_autoid, $array_favorites)) { ?>
                                                    <p id="product_favorites<?php echo $rs->ss_autoid; ?>" class="btn-details"><a class="deletefavorites" data-id="<?php echo $rs->ss_autoid; ?>"  href="javascript:void(0);"  ><i class="icon-heart" ></i></a></p>
                                                <?php } else { ?>
                                                    <p id="product_favorites<?php echo $rs->ss_autoid; ?>" class="btn-details"><a  class="addfavorites" data-id = "<?php echo $rs->ss_autoid; ?>"  href="javascript:void(0);" ><i class="icon-heart"></i></a></p>
                                                <?php } ?>
                                                <?php if (in_array($rs->sm_autoid, $array)) {
                                                    ?>
                                                    <p id = "product<?php echo $rs->sm_autoid; ?>" class = "btn-add"><a class="deleteitem" data-id="<?php echo $rs->sm_autoid; ?>"  href="javascript:void(0);" ><span>Remove cart</span><i class="icon-cancel"></i></a></p>
                                                <?php } else { ?>
                                                    <p id = "product<?php echo $rs->sm_autoid; ?>" class = "btn-add"><a class = "additem" data-id = "<?php echo $rs->sm_autoid; ?>" href = "javascript:void(0);"><i class = "icon-basket"></i> <span>Add to cart</span></a></p>
                                                <?php } ?>
                                            </div>
                                        <?php } else { ?>
                                            <div class="separator clear-left">
                                                <?php if (in_array($rs->ss_autoid, $array_favorites)) { ?>
                                                    <p id="slide_favorites<?php echo $rs->ss_autoid; ?>" class="btn-details" style="width: 30%;"><a class="deletefavorites" data-id="<?php echo $rs->ss_autoid; ?>"  href="javascript:void(0);"  ><i class="icon-heart" ></i></a></p>
                                                <?php } else { ?>
                                                    <p id="slide_favorites<?php echo $rs->ss_autoid; ?>" class="btn-details" style="width: 30%;"><a id="addfavorites"  class="addfavorites" data-id = "<?php echo $rs->ss_autoid; ?>"  href="javascript:void(0);" ><i class="icon-heart"></i></a></p>
                                                <?php } ?>
                                                <p id = "outstore" class ="outstore" style="width: 70%; "><a href = "javascript:void(0);" style="color: red;"><i class = "icon-cancel-circled"></i> ขออภัย สินค้าหมดชั่วคราว</a></p>
                                            </div>
                                        <?php } ?>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        //print_r($type[$i]);
                        foreach ($type[$i] as $rs) {
                            ?>

                            <!--                            <div class="col-sm-3" style="padding:15px; ">-->
                            <div class="test-resize-<?php echo $i; ?> col-lg-3 col-md-4 col-sm-4 col-xs-6" style="padding:15px; ">
                                <div class="col-item">

                                    <div class="[ info-card ]">

                                        <div class="photo">
                                            <center><img name="img1" id="img1" class="img-<?php echo $i; ?>" style="height: 240px;" src="<?php echo base_url("my_customer/showupload/" . $rs->sm_image . "_fontpage_list.jpg"); ?>"></center>
                                            <div class="after" <?php
                                            if ($rs->sm_amount > 0) {
                                                
                                            } else {
                                                echo "style='background-color: red; color: white;'";
                                            }
                                            ?> >
                                                <small>คงเหลือ <?php echo $rs->sm_amount; ?> ชิ้น</small>
                                            </div>
                                        </div>
                                        <div class="[ info-card-details ] animate">
                                            <!--                                        <div class="[ info-card-header ]">
                                                                                    </div>-->
                                            <div class="[ info-card-detail ]" style="color:black;">
                                                <h1 style="font-size: 16px;"><b>รายระเอียดสินค้า</b></h1>
                                                <h5 style="font-size: 14px;"><p style="word-wrap: break-word;"><?php echo $rs->sm_productdetail; ?></p></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                                <h5 class="textname"><b>ชื่อสินค้า</b><?php echo " " . $rs->sm_productname; ?></h5>
                                                <h5 class="textname"><b>หมวด</b><?php echo " " . $rs->ty_name; ?></h5>
                                                <h5 class="textname"><b>ประเภท</b><?php echo " " . $rs->ct_name; ?></h5>
                                                <h5 class="textname hidden-lg price-text-color">฿<?php echo " " . $rs->ss_price . " "; ?> ต่อ <?php echo $rs->ss_unit; ?></h5>
                                            </div>
                                            <div class="rating hidden-xs hidden-sm hidden-md col-md-4">
                                                <h5 align="left" class="price-text-color">฿<?php echo $rs->ss_price . " "; ?> ต่อ <?php echo $rs->ss_unit; ?></h5>
                                            </div>
                                        </div>
                                        <br class="hidden-xs hidden-sm hidden-md">
                                        <?php if ($rs->sm_amount > 0) { ?>
                                            <div class="separator clear-left">
                                                <?php if (in_array($rs->ss_autoid, $array_favorites)) { ?>
                                                    <p id="product_favorites<?php echo $rs->ss_autoid; ?>" class="btn-details"><a  class="deletefavorites" data-id="<?php echo $rs->ss_autoid; ?>"  href="javascript:void(0);" ><i class="icon-heart" ></i></a></p>
                                                <?php } else { ?>
                                                    <p id="product_favorites<?php echo $rs->ss_autoid; ?>" class="btn-details"><a  class="addfavorites" data-id = "<?php echo $rs->ss_autoid; ?>"  href="javascript:void(0);" ><i class="icon-heart"></i></a></p>
                                                <?php } ?>
                                                <?php if (in_array($rs->sm_autoid, $array)) {
                                                    ?>
                                                    <p id = "product<?php echo $rs->sm_autoid; ?>" class = "btn-add"><a class="deleteitem" data-id="<?php echo $rs->sm_autoid; ?>"  href="javascript:void(0);" ><span>Remove cart</span><i class="icon-cancel"></i></a></p>
                                                <?php } else { ?>
                                                    <p id = "product<?php echo $rs->sm_autoid; ?>" class = "btn-add"><a class = "additem" data-id = "<?php echo $rs->sm_autoid; ?>" href = "javascript:void(0);" ><i class = "icon-basket"></i> <span>Add to cart</span></a></p>
                                                <?php } ?>
                                            </div>
                                        <?php } else { ?>
                                            <div class="separator clear-left">
                                                <?php if (in_array($rs->ss_autoid, $array_favorites)) { ?>
                                                    <p id="slide_favorites<?php echo $rs->ss_autoid; ?>" class="btn-details" style="width: 30%;"><a class="deletefavorites" data-id="<?php echo $rs->ss_autoid; ?>"  href="javascript:void(0);"  ><i class="icon-heart" ></i></a></p>
                                                <?php } else { ?>
                                                    <p id="slide_favorites<?php echo $rs->ss_autoid; ?>" class="btn-details" style="width: 30%;"><a id="addfavorites"  class="addfavorites" data-id = "<?php echo $rs->ss_autoid; ?>"  href="javascript:void(0);" ><i class="icon-heart"></i></a></p>
                                                <?php } ?>

                                                <p id = "outstore" class ="outstore" style="width: 70%; "><a href = "javascript:void(0);" style="color: red;"><i class = "icon-cancel-circled"></i> ขออภัย สินค้าหมดชั่วคราว</a></p>
                                            </div>
                                        <?php } ?>

                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>

                <?php
                if (isset($show_category[$i])) {
                    $chk = count($show_category[$i]);
                } else {
                    $chk = 0;
                }
                if ($chk > 0) {
                    ?>
                    <div class="border-top-button">
                        <nav>
                            <ul class="pagination">
                                <?php
                                $total = $_SESSION["page_ca$i"]['total_ca'];
                                $amountpage = $_SESSION["page_ca$i"]['amountpage_ca'];
                                $cid = $_SESSION["page_ca$i"]['cid'];
                                $cname = $_SESSION["page_ca$i"]['name'];
                                if ($amountpage == 1) {
                                    
                                } else {
                                    ?>
                                    <li>
                                        <a href="<?php echo base_url("product/$i/$cname/$cid/1"); ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php
                                }
                                for ($a = 1; $a <= $total; $a++) {
                                    ?>
                                    <li><a href="<?php echo base_url("product/$i/$cname/$cid/"); ?><?php echo $a; ?>"><?php echo $a; ?></a></li>
                                    <?php
                                }
                                if ($amountpage == $total) {
                                    
                                } else {
                                    if ($total != 0) {
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url("product/$i/$cname/$cid/"); ?><?php echo $total; ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                <?php } else { ?>
                    <div class="border-top-button">
                        <nav>
                            <ul class="pagination">
                                <?php
                                $total = $_SESSION["page$i"]['total'];
                                $amountpage = $_SESSION["page$i"]['amountpage'];

                                if ($amountpage == 1) {
                                    
                                } else {
                                    ?>
                                    <li>
                                        <a href="<?php echo base_url("product/$i/all/1/1"); ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php
                                }
                                for ($a = 1; $a <= $total; $a++) {
                                    ?>
                                    <li><a href="<?php echo base_url("product/$i/all/1/"); ?><?php echo $a; ?>"><?php echo $a; ?></a></li>
                                    <?php
                                }
                                if ($amountpage == $total) {
                                    
                                } else {
                                    if ($total != 0) {
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url("product/$i/all/1/"); ?><?php echo $total; ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </section>
<!--    <i class="icon-spin6 animate-spin" style="font-size: 30px;"></i>-->
    <?php $this->load->view('view_footerproduct'); ?>
</div>

<script>
    $(document).ready(function () {

        $('#nav-bar-2').on("click", function () {
            $('#span-icon-2').toggleClass("icon-down-open icon-up-open");
        });

        if (window.location.hash && window.location.hash == '#_=_') {
            window.location.hash = '';
            var newUrl = "product/";//fetch new url
            window.history.pushState("", "", "/" + newUrl);

        }
        var url = window.location.href;

        var res1 = url.replace("http://store.com/product/", "");
        var res2 = url.replace("http://store.com/", "");
        if (res1[0] == null || res1[0] == "#" || res2[0] == null) {
            $('#step-1').show();
        } else {
            $('#step-' + res1[0]).show();
            $('#click' + res1[0]).trigger('click');
        }


        $(document).on("click", '.addfavorites', function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "<?php echo base_url("my_customer/favorites"); ?>",
                method: "post",
                datatype: "html",
                data: "id=" + id,
                cache: false,
                success: function (response) {
                    if (response == "fail") {
                        alert(response);
                    } else if (response == "user_not_login") {
                        alert("กรุณาเข้าสู่ระบบ เพื่อสร้างรายการโปรดของคุณ");
                        window.location.href = "http://store.com/product/login";
                    } else {
                        $("#slide_favorites" + id).empty();
                        $("#slide_favorites" + id).append("<a  class='deletefavorites' data-id=" + id + "  href='javascript:void(0);' ><i class='icon-heart' ></i></a>");
                        $("#product_favorites" + id).empty();
                        $("#product_favorites" + id).append("<a  class='deletefavorites' data-id=" + id + "  href='javascript:void(0);'><i class='icon-heart' ></i></a>");
                        $("#favorites").empty();
                        $("#favorites").append("<a href='<?php echo base_url('my_customer/show_favorites'); ?>'><i class ='icon-heart'></i> รายการโปรด <span id='count' class='badge'></span></a>");
                        $(".favorites").empty();
                        $(".favorites").append("<i class ='icon-heart'></i> รายการโปรด <span class='badge count'></span>");
                        $(".count").html(response);
                        $("#count").html(response);
                    }
                }
            });
        });
        $(document).on("click", '.deletefavorites', function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "<?php echo base_url("my_customer/delete_favorites"); ?>",
                method: "post",
                datatype: "html",
                data: "id=" + id,
                cache: false,
                success: function (response) {
                    if (response == "fail") {
                        alert(response);
                    } else {
                        $("#slide_favorites" + id).empty();
                        $("#slide_favorites" + id).append("<a  class='addfavorites' data-id = " + id + "  href='javascript:void(0);' ><i class='icon-heart'></i></a>");
                        $("#product_favorites" + id).empty();
                        $("#product_favorites" + id).append("<a  class='addfavorites' data-id = " + id + "  href='javascript:void(0);'><i class='icon-heart'></i></a>");
                        $("#favorites").empty();
                        $("#favorites").append("<a href='<?php echo base_url('my_customer/show_favorites'); ?>'><i class ='icon-heart'></i> รายการโปรด <span id='count' class='badge'></span></a>");
                        $(".favorites").empty();
                        $(".favorites").append("<i class ='icon-heart'></i> รายการโปรด <span class='badge count'></span>");
                        $(".count").html(response);
                        $("#count").html(response);
                    }
                }
            });
        });
        $(document).on("click", '.additem', function () {
            var id = $(this).attr('data-id');
            //alert(id);
            $.ajax({
                url: "<?php echo base_url("my_customer/add_item"); ?>",
                method: "POST",
                datatype: "html",
                data: "id=" + id,
                cache: false,
                success: function (response) {
                    // alert(response);
                    if (response == "begin") {

                    } else {
                        $("#slide" + id).empty();
                        $("#slide" + id).append("<a class='deleteitem' data-id=" + id + "  href='javascript:void(0);' ><span>Remove cart</span><i class='icon-cancel'></i></a>");
                        $("#product" + id).empty();
                        $("#product" + id).append("<a class='deleteitem' data-id=" + id + "  href='javascript:void(0);' ><span>Remove cart</span><i class='icon-cancel'></i></a>");
                        $("#option").html(": ");
                        $("#amount").html(response);
                    }
                }
            });
        });
        $(document).on("click", '.deleteitem', function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "<?php echo base_url("my_customer/delete_item"); ?>",
                method: "POST",
                datatype: "html",
                data: "id=" + id,
                cache: false,
                success: function (response) {
                    //alert(response);
                    if (response == "begin") {

                    } else {
                        if (response == 0) {
                            $("#slide" + id).empty();
                            $("#slide" + id).append("<a class='additem' data-id=" + id + "  href='javascript:void(0);' ><i class='icon-basket'></i> <span>Add to cart</span></a>");
                            $("#product" + id).empty();
                            $("#product" + id).append("<a class='additem' data-id=" + id + "  href='javascript:void(0);' ><i class='icon-basket'></i> <span>Add to cart</span></a>");
                            $("#option").empty();
                            $("#amount").empty();
                        } else {
                            $("#slide" + id).empty();
                            $("#slide" + id).append("<a class='additem' data-id=" + id + "  href='javascript:void(0);' ><i class='icon-basket'></i> <span>Add to cart</span></a>");
                            $("#product" + id).empty();
                            $("#product" + id).append("<a class='additem' data-id=" + id + "  href='javascript:void(0);' ><i class='icon-basket'></i> <span>Add to cart</span></a>");
                            $("#option").html(": ");
                            $("#amount").html(response);
                        }
                    }
                }
            });
        });
        $(window).scroll(function () {

            var y = $(this).scrollTop();
            var z = $('.content-wrapper').offset().top;
            var x = $('#about').offset().top;


            if (y >= z) {
                if (y >= x) {
                    $(".nav-fixed-1").removeClass("test-scroll");
                } else {
                    $(".nav-fixed-1").addClass("test-scroll");
                }
            } else {
                $(".nav-fixed-1").removeClass("test-scroll");
            }
        });
    });
    function getPathFromUrl(url) {
        return url.split("?")[0];
    }
    function stripQueryStringAndHashFromPath(url) {
        return url.split("?")[0].split("#")[0];
    }
    function getPathFromUrl(url) {
        return url.split(/[?#]/)[0];
    }

</script>
<style>
    .ul-col {
        -webkit-columns: 320px 3; /* Chrome, Safari, Opera */
        -moz-columns: 320px 3; /* Firefox */
        columns: 320px 3;

        padding: 15px 2px 15px 2px;
    }
    .navbar-nav-bar {
        /*        margin: 7.5px -15px;*/

    }
    .navbar-nav-bar > li > a {
        padding-top: 10px;
        padding-bottom: 10px;
        line-height: 20px;
        color :#777;
    }
    .navbar-nav-bar > li > a:hover {
        color :#333;
        background-color:transparent;
    }
    @media (max-width: 1200px) {
        .navbar-nav-bar.open .dropdown-menu {
            position: static;
            float: none;
            width: auto;
            margin-top: 0;
            background-color: transparent;
            border: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        .navbar-nav-bar .open .dropdown-menu > li > a,
        .navbar-nav-bar .open .dropdown-menu .dropdown-header {
            padding: 5px 15px 5px 25px;
        }
        .navbar-nav-bar .open .dropdown-menu > li > a {
            line-height: 20px;
        }
        .navbar-nav-bar .open .dropdown-menu > li > a:hover,
        .navbar-nav-bar .open .dropdown-menu > li > a:focus {
            background-image: none;
        }
    }
    @media (min-width: 1200px) {
        .navbar-nav-bar {
            float: left;
            margin: 0;
        }
        .navbar-nav-bar > li {
            float: left;
        }
        .navbar-nav-bar > li > a {
            padding-top: 15px;
            padding-bottom: 15px;
        }
    }

    .navbar-default .navbar-collapse-bar:hover, .navbar-default .navbar-collapse-bar:focus {
        background-color: #ddd;
    }
    .navbar-default .navbar-collapse-bar {
        border-color: #ddd;
    }
    .navbar-collapse-bar{
        position: relative;
        float: right;
        padding: 9px 10px;
        margin-top: 8px;
        margin-right: 15px;
        margin-bottom: 8px;
        background-color: transparent;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .navbar-collapse-bar:focus {
        outline: 0;
    }
    .navbar-collapse-bar .icon-bar {
        display: block;
        width: 22px;
        height: 2px;
        border-radius: 1px;
    }
    .navbar-collapse-bar .icon-bar + .icon-bar {
        margin-top: 4px;
    }
    @media (min-width: 1200px) {
        .navbar-collapse-bar {
            display: none;
        }
    }
    .photo .after {
        position: absolute;
        /*float: left;*/
        /*        top: 100;
        left: 0;*/
        padding:10px 0; 
        bottom: 0;
        width: 100%;
        height: 6%;
        display: none;
        color: #333;
        display: block;
        background-color: whitesmoke;
        border-top:    none;
        border-right:  1px solid #e7e7e7;
        /* border-bottom: 1px solid #e7e7e7;*/
        border-left:   none;
        /*border-bottom-right-radius: 7px;*/
        z-index: 1;
    }
    .photo > .after > small   {   
        /*        padding: 5px;*/
        position:absolute;
        top:1px;
        left: calc(50% - 38px);
    }

    .textname{
        white-space: nowrap;
        width: 185px;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .category > a{
        padding: 15px 10px;
        color: #777;
        text-decoration: none;
    }
    .category > a:hover{
        color: #333;
        text-decoration: none;
    }


    .navbar-color{
        background: #f8f8f8;
    }
    .ul-nav{
        padding: 0px 91px;

    }
    .li{
        width: 233px;
        text-align: center;
        list-style: none;
        border-right: 1px solid #E1E1E1;

    }
    .navbar{
        border-radius: 0px;
    }
    .pagination{
        margin: 15px 0;
    }
    .test-scroll{
        width: 100%;
        z-index: 2;
        top: 51px;
        /*        bottom:0;*/
        position:fixed;

    }



    .border-top-button
    {
        padding-left: 30px;
        border-top: 1px solid #E1E1E1;
        border-bottom: 1px solid #E1E1E1;

    }


    .col-item
    {
        border: 1px solid #E1E1E1;
        border-radius: 5px;
        background: #FFF;
    }
    .col-item .photo img
    {
        margin: 0 auto;
    }
    .carousel{
        margin-top: 20px;
        margin-left: 25px ;
        margin-right: 25px ;
    }
    .info{
        height: 136px;
    }

    .col-item .info
    {
        padding: 10px;
        border-radius: 0 0 5px 5px;
        margin-top: 1px;
        color: black;
        text-align: left;
    }

    .col-item:hover .info {
        background-color: #F5F5DC;
    }
    .col-item .price
    {
        /*width: 50%;*/
        float: left;
        margin-top: 5px;
    }

    .col-item .price h5
    {
        line-height: 20px;
        margin: 0;
    }

    .price-text-color
    {
        /*        width: 85px;*/
        color: #219FD1;
    }

    .col-item .info .rating
    {
        color: #777;
    }

    .col-item .rating
    {
        /*width: 50%;*/
        float: left;
        font-size: 17px;
        text-align: right;
        line-height: 52px;
        margin-bottom: 10px;
        height: 52px;
    }

    .col-item .separator
    {
        border-top: 1px solid #E1E1E1;
    }

    .clear-left
    {
        clear: left;
    }

    .col-item .separator p
    {
        line-height: 20px;
        margin-bottom: 0;
        margin-top: 10px;
        text-align: center;
    }

    .col-item .separator p i
    {
        margin-right: 5px;
    }
    .col-item .btn-add
    {
        width: 50%;
        float: left;
    }

    .col-item .btn-add
    {
        border-left: 1px solid #E1E1E1;
    }
    .col-item .outstore
    {
        width: 50%;
        float: left;
    }
    .col-item .outstore
    {
        border-left: 1px solid #E1E1E1;
    }
    .col-item .outstore > a
    {
        text-decoration: none;
    }

    .col-item .btn-details
    {
        width: 50%;
        float: left;
        /*padding-left: 10px;*/
    }
    .controls
    {
        margin-top: 20px;
    }
    [data-slide="prev"]
    {
        margin-right: 10px;
    }
    .price{
        padding-right: 0px; 
    }
    .rating{
        padding-left: 3px;
        padding-right: 0px; 
    }
    .animate {
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }
    .info-card-detail > p{
        width: 13em;
        word-wrap: break-word;
    }
    .info-card {
        width: 100%;
        border: 1px solid rgb(215, 215, 215);
        position: relative;
        font-family: 'Lato', sans-serif;
        overflow: hidden;
    }
    .info-card > img {
        width: 100px;
        margin-bottom: 60px;
    }
    .info-card .info-card-details,
    .info-card .info-card-details .info-card-header  {
        width: 100%;
        height: 100%;
        position: absolute;
        bottom: -100%;
        left: 0;
        padding: 0 15px;
        background: rgb(255, 255, 255);
        text-align: center;
    }
    .info-card .info-card-details::-webkit-scrollbar {
        width: 8px;
    }
    .info-card .info-card-details::-webkit-scrollbar-button {
        width: 8px;
        height: 0px;
    }
    .info-card .info-card-details::-webkit-scrollbar-track {
        background: transparent;
    }
    .info-card .info-card-details::-webkit-scrollbar-thumb {
        background: rgb(160, 160, 160);
    }
    .info-card .info-card-details::-webkit-scrollbar-thumb:hover {
        background: rgb(130, 130, 130);
    }           

    .info-card .info-card-details .info-card-header {
        height: auto;		
        bottom: 100%;
        padding: 10px 5px;
    }
    .info-card:hover .info-card-details {
        bottom: 0px;
        overflow: auto;
        padding-bottom: 25px;
    }
    .info-card:hover .info-card-details .info-card-header {
        position: relative;
        bottom: 0px;
        padding-top: 45px;
        padding-bottom: 25px;
    }
    .info-card .info-card-details .info-card-header h1,	
    .info-card .info-card-details .info-card-header h3 {
        color: rgb(62, 62, 62);
        font-size: 22px;
        font-weight: 900;
        text-transform: uppercase;
        margin: 0 !important;
        padding: 0 !important;
    }
    .info-card .info-card-details .info-card-header h3 {
        color: rgb(142, 182, 52);
        font-size: 15px;
        font-weight: 400;
        margin-top: 5px;
    }
    .pagination > li > a:hover, .pagination > li > span:hover, .pagination > li > a:focus, .pagination > li > span:focus
    {
        z-index: 0;
    }
    .addfavorites{
        color:#777;
        font-size: 14px;

    }
    .addfavorites:hover{
        color:red;
        font-size: 18px;
    }
    .additem{
        color:#777;
        font-size: 14px;
    }
    .additem:hover{
        text-decoration: none;
        color:#333;
        font-size: 16px;
    }
    .deleteitem{
        color: red;
        font-size: 14px;
    }
    .deleteitem:hover{
        text-decoration: none;
        color:red;
        font-size: 16px;
    }
    @media (max-width: 844px){
        .additem{
            color:#777;
            font-size: 12px;
        }
        .additem:hover{
            text-decoration: none;
            color:#333;
            font-size: 14px;
        }
        .deleteitem{
            color: red;
            font-size: 12px;
        }
        .deleteitem:hover{
            text-decoration: none;
            color:red;
            font-size: 14px;
        }
    }
    @media (max-width: 550px){
        .additem{
            color:#777;
            font-size: 16px;
        }
        .additem:hover{
            text-decoration: none;
            color:#333;
            font-size: 18px;
        }
        .deleteitem{
            color: red;
            font-size: 16px;
        }
        .deleteitem:hover{
            text-decoration: none;
            color:red;
            font-size: 18px;
        }
        .additem > span{
            display: none;
        }
        .deleteitem > span{
            display: none;
        }

    }


    .deletefavorites{
        color:red;
        font-size: 14px;

    }

    .deletefavorites:hover {
        color:#333;
        font-size: 18px;
    }
    .separator{
        margin-top: 5px;
    }

    body{
        overflow-x: hidden;
        overflow-y: scroll;
    }




</style>

