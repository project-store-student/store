<!DOCTYPE html>
<html>
    <head>
  <!-- HEADER -->
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png');?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/all.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>"> 
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.4.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url("assets/fontello/css/fontello.css"); ?>"> 
<!-- END HEADER -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.validate.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/colorbox/jquery.colorbox-min.js"); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url("assets/js/colorbox/example4/colorbox.css"); ?>">
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

     <title>Store</title>
    </head>
    <body>
<?php $this->load->view("header"); ?>
<?php
$one = count($data);
$two = count($data2);
// $there = count($data3);
// $four = count($data4);
?>

<div class="content">
</div>
<center><h3> อนุมัติ</h3></center>
<div  class="approval-content" >
                <div id="step-1">
                    <div class="row" style="border: 1px solid #ddd; height: 50px">
                        <div class="approval-head">

                            <a href="#" class="btntap-left" onClick="$('#step-2').hide();$('#step-1').show()" >
                             <label>  รายการเพิ่ม</label>
                            </a>
                            <a href="#" class="btntap-right" onClick="$('#step-1').hide(); $('#step-2').show()">
                               <label>รายการเพิ่มอนุมัติแล้ว</label>
                            </a>
                        </div>
                    </div>
                    <div class="approval-row-data">
                        <div class="col-md-12" style="margin-top:10px;" >
                            <!--                Load content in-->
                            
                                <div class="row" >
                                    <div class="col-md-12 column">
                                        <form method="post" id="save_store">

                                            <table id="tab_logic">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            <div class="checkbox">
                                                                <label><input type="checkbox" name="chk_all" id="chk_all" >
                                                                    <span class="cr "><i class="cr-icon glyphicon glyphicon-ok " style="color:black;"></i></span>
                                                                </label>
                                                            </div>    
                                                        </th>
                                                        <th class="text-center">ลำดับ</th>
                                                        <th class="text-center">วันและเวลา</th>
                                                        <th class="text-center">รูปภาพ</th>
                                                        <th class="text-center">รหัสสินค้า</th>
                                                        <th class="text-center">ชื่อสินค้า</th>
                                                        <th class="text-center">หมวดสินค้า</th>
                                                        <th class="text-center">ประเภทสินค้า</th>
                                                        <th class="text-center">จำนวนสินค้า</th>
                                                        <th class="text-center">เพิ่มสินค้าโดย</th>
                                                        <?php if ($_SESSION['sessemp']['status'] == 0) { ?> 
                                                            <th class="text-center">ลบ
                                                            </th>
                                                        <?php } else { ?>
                                                            <th class="text-center">ตัวเลือก</th>
                                                        <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $num = 1;
                                                    if (!empty($data)) {
                                                        foreach ($data as $key) {
                                                            ?>
                                                            <tr>
                                                                <td > 
                                                                    <div class="checkbox">
                                                                        <label><input type="checkbox" name="chk[]" id="chk" value="<?php echo $key->mtr_autoid; ?>" >
                                                                            <span class="cr "><i class="cr-icon glyphicon glyphicon-ok " style="color:black;"></i></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td><input type="hidden" value="<?php echo $key->mtr_autoid; ?>" name="autoid" id="autoid"><?php echo $num; ?></td>
                                                                <td><?php echo $key->mtr_date; ?></td>
                                                                <td><img name="img1" id="img1" width="50px" src="<?php echo base_url("admin/showupload/" . $key->mtr_image); ?>_backpage.jpg"></td>
                                                                <td ><?php echo $key->sm_autoid; ?></td>
                                                                <td><?php echo $key->mtr_productname; ?></td>
                                                                <td><?php echo $key->ty_name; ?></td>
                                                                <td ><?php echo $key->ct_name; ?></td>                    
                                                                <td><?php echo $key->mtr_quantity; ?></td>
                                                                <td><?php echo $key->emp_fristname; ?></td>
                                                                <td>
                                                                    <?php if ($_SESSION['sessemp']['status'] == 0) { ?>
                                                                        <div style="margin: 0 15 ;">
                                                                            <a style="width: 50px;" href="<?php echo base_url('admin/delete_mtr?id_emp=' . $_SESSION['sessemp']['id'] . '&id_pro=' . $key->mtr_autoid . ''); ?>" name="btn_emp" id="btn_emp" class="btn btn-danger" onclick="return confirm('ลบรายการ?');" ><span><i class="icon-trash-empty" ></i></span></a>
                                                                        </div>
                                                                    <?php } else { ?>
                                                                        <a style="width: 50px;" href="<?php echo base_url('admin/view_amount?id_emp=' . $_SESSION['sessemp']['id'] . '&id_pro=' . $key->mtr_autoid . ''); ?>" name="btn_emp" id="btn_emp" class="btn btn-warning cb1" ><span><i class="icon-pencil" ></i></span></a>
                                                                        <a style="width: 50px;" href="<?php echo base_url('admin/delete_mtr?id_emp=' . $_SESSION['sessemp']['id'] . '&id_pro=' . $key->mtr_autoid . ''); ?>" name="btn_emp" id="btn_emp" class="btn btn-danger" onclick="return confirm('ลบรายการ?');" ><span><i class="icon-trash-empty" ></i></span></a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            $num++;
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="11"><p style="text-align: center;">ไม่มีรายการขอเพิ่มสินค้า</p></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <?php if ($_SESSION['sessemp']['status'] == 0) { ?> 
                                                    <div class="pull-left">
                                                        <input type="button" id="btn_delete" class="btn btn-danger"  value="ลบที่เลือกที่เลือก" disabled>
                                                    </div>
                                                    <div class="pull-right">
                                                        <input type="submit" class="btn btn-primary" value="อนุมัติที่เลือก">
                                                    </div>
                                            <?php } else { ?> 
                                                    <div class="pull-left">
                                                        <input type="button" id="btn_delete" class="btn btn-danger"  value="ลบที่เลือกที่เลือก" disabled>
                                                    </div>
                                            <?php } ?>
                                            <center><nav>
                                                    <ul class="pagination">
                                                        <?php
                                                        $total = $_SESSION['page']['total'];
                                                        $amountpage = $_SESSION['page']['amountpage'];

                                                        if ($amountpage == 1) {
                                                            
                                                        } else {
                                                            ?>
                                                            <li>
                                                                <a href="<?php echo base_url("admin/approval/1/?key=1&page=1"); ?>" aria-label="Previous">
                                                                    <span aria-hidden="true">&laquo;</span>
                                                                </a>
                                                            </li>
                                                            <?php
                                                        }
                                                        for ($i = 1; $i <= $total; $i++) {
                                                            ?>
                                                            <li><a href="<?php echo base_url("admin/approval/1/?key=1&page="); ?><?php echo $i; ?>"><?php echo $i; ?></a></li>
                                                            <?php
                                                        }
                                                        if ($amountpage == $total) {
                                                            
                                                        } else {
                                                            ?>
                                                            <li>
                                                                <a href="<?php echo base_url("admin/approval/1/?key=1&page="); ?><?php echo $total; ?>" aria-label="Next">
                                                                    <span aria-hidden="true">&raquo;</span>
                                                                </a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </nav></center>

                                        </form>
                                    </div>
                                </div>
                          
                        </div>
                    </div>
                </div>


                <div  id="step-2" style="display:none;" >
                         <div class="row" style="border: 1px solid #ddd; height: 50px">
                        <div class="approval-head">

                            <a href="#" class="btntap-left" onClick="$('#step-2').hide();$('#step-1').show()" >
                            <label>รายการเพิ่ม</label>
                            </a>
                            <a href="#" class="btntap-right" onClick="$('#step-1').hide(); $('#step-2').show()">
                               <label>รายการเพิ่มอนุมัติแล้ว</label>
                            </a>
                        </div>
                    </div>
                    <div class="approval-row-data">
                        <div class="col-md-12" style="margin-top:10px;" >

                                <div class="row">
                                    <div class="col-md-12 column">
                                        <form method="post" id="show_store">
                                            <div class="form-group" >
                                                    <div class="col-md-1">
                                                    </div>
                                                <div class="col-md-2">
                                                    <select id="approval" name="approval" class="form-control approval">
                                                        <option value="error">-- Select --</option>
                                                        <option value="day">Select Date</option>
                                                        <option value="month">Select Month</option>
                                                        <option value="year">Select Year</option>
                                                    </select> </div>
                                                <div class="col-md-3">
                                                    <input id="datepicker" name="frist_id" placeholder="Select Type Date Frist" class="form-control frist_id" style="text-align: center;"  type="text" disabled />
                                                </div>
                                                <div class="col-md-3">
                                                    <input id="datepicker1" name="end_id" placeholder="Select Type Date Frist" class="form-control end_id" style="text-align: center;"  type="text" disabled >
                                                </div>
                                                <div class="col-md-1">
                                                    <button id="btn_id"  class="btn btn-primary"  type="submit" disabled >Search</button>
                                                </div>
                                                <?php if ($_SESSION['sessemp']['status'] == 0) { ?> 

                                                    <div class="col-md-1">
                                                        <button id="btn_report" class="btn btn-success"  type="button" onClick="report();" >Export Excel</button>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </form>
                                        <br><br><br>
                                        <div id="showday">
                                            <table  id="tab_logic">
                                                <thead>
                                                    <tr >
                                                        <th class="text-center">ลำดับ</th>
                                                        <th class="text-center">วันและเวลา</th>
                                                        <th class="text-center">รูปภาพ</th>
                                                        <th class="text-center">ชื่อสินค้า</th>
                                                        <th class="text-center">หมวดสินค้า</th>
                                                        <th class="text-center">ประเภทสินค้า</th>
                                                        <th class="text-center">จำนวนสินค้า</th>
                                                        <?php if ($_SESSION['sessemp']['status'] == 0) { ?> 
                                                            <th class="text-center">เพิ่มสินค้าโดย</th>
                                                        <?php } else { ?>
                                                            <th class="text-center">สถานะ</th>
                                                        <?php } ?>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $num = 1;
                                                    if (!empty($data2)) {
                                                        foreach ($data2 as $key) {
                                                            ?>
                                                            <tr>
                                                                <td><input type="hidden" value="<?php echo $key->mtr_autoid; ?>" name="autoid" id="autoid"><?php echo $num; ?></td>
                                                                <td><?php echo $key->mtr_date; ?></td>
                                                                <td><img name="img1" id="img1" width="50px" src="<?php echo base_url("admin/showupload/" . $key->mtr_image); ?>_backpage.jpg"></td>
                                                                <td><?php echo $key->mtr_productname; ?></td>
                                                                <td><?php echo $key->ty_name; ?></td>
                                                                <td><?php echo $key->ct_name; ?></td>                    
                                                                <td><?php echo $key->mtr_quantity; ?></td>
                                                                <?php if ($_SESSION['sessemp']['status'] == 0) { ?> 
                                                                    <td><?php echo $key->emp_fristname; ?></td>
                                                                    <?php
                                                                } else {
                                                                    if ($key->mtr_status == 1) {
                                                                        ?>
                                                                        <td>ผ่านการอนุมัติแล้ว</td>
                                                                    <?php } else { ?>
                                                                        <td>รอการอนุมัติ</td>
                                                                    <?php }
                                                                    ?>
                                                                </tr>
                                                                <?php
                                                            }
                                                            $num++;
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="8"><p style="text-align: center;">ไม่มีรายการเพิ่มสินค้าที่ถูกอนุมัติ</p></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>  
                                                <div class="pull-right">
                                                </div>
                                            <center><nav>
                                                    <ul class="pagination">
                                                        <?php
                                                        $total = $_SESSION['page2']['total'];
                                                        $amountpage = $_SESSION['page2']['amountpage'];

                                                        if ($amountpage == 1) {
                                                            
                                                        } else {
                                                            ?>
                                                            <li>
                                                                <a href="<?php echo base_url("admin/approval/2/?key=2&page=1"); ?>" aria-label="Previous">
                                                                    <span aria-hidden="true">&laquo;</span>
                                                                </a>
                                                            </li>
                                                            <?php
                                                        }
                                                        for ($i = 1; $i <= $total; $i++) {
                                                            ?>
                                                            <li><a href="<?php echo base_url("admin/approval/2/?key=2&page="); ?><?php echo $i; ?>"><?php echo $i; ?></a></li>
                                                            <?php
                                                        }
                                                        if ($amountpage == $total) {
                                                            
                                                        } else {
                                                            ?>
                                                            <li>
                                                                <a href="<?php echo base_url("admin/approval/2/?key=2&page="); ?><?php echo $total; ?>" aria-label="Next">
                                                                    <span aria-hidden="true">&raquo;</span>
                                                                </a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </nav></center>

                                        </div>
                                    </div>

                                </div>
                       
                        </div>
                    </div>
                </div>

    </body>
</html>

<script>
    $(document).ready(function () {
        var url = window.location.href;
//        var res1 = url.replace("http://store.ori/admin/approval?key=", "");
//        var res2 = res1.split("&");
        var res1 = url.replace("http://store.com/admin/approval", "");
if(res1[1]==null){
    $("#step-1").show();
}else{
    if(res1[1]==1){
    $("#step-"+res1[1]).show();
    }else{
    $("#step-"+res1[1]).show();
    $("#step-1").hide();
}
}

        
        $("#btn_delete").on("click", function () {
            $.ajax({
                url: "<?php echo base_url("admin/delete_mtr"); ?>",
                method: "POST",
                datatype: "html",
                data: $("#save_store").serialize(),
                success: function (data) {
                   window.location.reload();
                }
            });
        });

        function step_day1() {
            $('#datepicker2,#datepicker3').datepicker("destroy");
            $('#datepicker2,#datepicker3').datepicker({dateFormat: 'yy-mm-dd'}).val();
        }
        function step_month1() {
            $('#datepicker2,#datepicker3').datepicker("destroy");
            $('#datepicker2,#datepicker3').datepicker({dateFormat: 'MM'}).val();
        }
        function step_year1() {
            $('#datepicker2,#datepicker3').datepicker("destroy");
            $('#datepicker2').datepicker({dateFormat: 'yy'}).val();
        }

        $("#approval1").on("change", function () {
            var day = $('#approval1 :selected').val();
            //alert(day);
            //alert(id);
            if (day == "error") {
                //alert("ไม่มี");
                $('#datepicker2').prop("disabled", true);
                $('#datepicker3').prop("disabled", true);
                $('#datepicker2').removeClass("error");
                $('#datepicker3').removeClass("error");
                $("#datepicker2").val("");
                $("#datepicker3").val("");
                $("#datepicker2").attr("placeholder", "Select Type Date Frist");
                $("#datepicker3").attr("placeholder", "Select Type Date Frist");
                $('#btn_id1').prop("disabled", true);
                $('#btn_report1').prop("disabled", false);
                var day = $('#approval1 :selected').val();
                $.ajax({
                    url: "<?php echo base_url("admin/select_type_day1"); ?>",
                    method: "post",
                    datatype: "html",
                    data: $("#show_store1").serialize(),
                    success: function (response) {
                        $("#showday1").empty().html(response);
                    }
                });

            } else if (day == "day") {
                //alert("มี");

                $('#datepicker2').prop("disabled", false);
                $('#datepicker3').prop("disabled", false);
                $("#datepicker2").attr("placeholder", "Day Begin");
                $("#datepicker3").attr("placeholder", "Day End");
                $("#datepicker2").val("");
                $("#datepicker3").val("");
                step_day1();
                $('#btn_id1').prop("disabled", false);
                $('#btn_report1').prop("disabled", true);

            } else if (day == "month") {

                $('#datepicker2').prop("disabled", false);
                $('#datepicker3').prop("disabled", false);
                $("#datepicker2").attr("placeholder", "Mounth Begin");
                $("#datepicker3").attr("placeholder", "Mounth End");
                $("#datepicker2").val("");
                $("#datepicker3").val("");
                step_month1();
                $('#btn_id1').prop("disabled", false);
                $('#btn_report1').prop("disabled", true);
            } else {
                $('#datepicker2').prop("disabled", false);
                $('#datepicker3').prop("disabled", true);
                $("#datepicker2").attr("placeholder", "Year Begin");
                $("#datepicker3").attr("placeholder", "");
                $("#datepicker2").val("");
                $("#datepicker3").val("");
                step_year1();
                $('#btn_id1').prop("disabled", false);
                $('#btn_report1').prop("disabled", true);
            }

        });

        $("#show_store1").validate({
            focusInvalid: false,
            rules: {
                frist_id: {
                    required: true
                },
                end_id: {
                    required: true
                }
            },
            messages: {
                frist_id: {
                    required: ""
                },
                end_id: {
                    required: ""
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: "<?php echo base_url("admin/select_type_day1"); ?>",
                    method: "post",
                    datatype: "html",
                    data: $("#show_store1").serialize(),
                    success: function (response) {
                        //alert(response);
                        $("#showday1").empty().html(response);
                        $('#btn_report1').prop("disabled", false);

                    }
                });
            }
        });
    });
</script>
<script type="text/javascript">
    function report() {
        // alert("reprot");
        var frist_day = document.getElementById('datepicker').value
        var end_day = document.getElementById('datepicker1').value
        var select_day = document.getElementById('approval').value
        //alert(frist_day + end_day + select_day);
        window.location.href = '<?php echo base_url("admin/report_store?") ?>'+'frist_id=' + frist_day + '&end_id=' + end_day + '&approval=' + select_day + '';
    }
</script>

<script>
    $(document).ready(function () {
        $(".cb1").colorbox({
            //rel:'group1',  ใช่อ้างอิงหากมีหลายหน้า
          
            opacity: 0.5,
        });
        $('#save_store').submit(function (e) {
            $.ajax({
                url: "<?php echo base_url("admin/savestore"); ?>",
                method: "POST",
                datatype: "html",
                data: $("#save_store").serialize(),
                success: function (response) {
                    window.reload();

                }
            });
        });
        $('#update_store').submit(function (e) {
            $.ajax({
                url: "<?php echo base_url("admin/updatestore"); ?>",
                method: "POST",
                datatype: "html",
                data: $("#update_store").serialize(),
                success: function (response) {
                    alert(response);
                    window.reload();
                }
            });
        });
        $("#tab_logic #chk_all").click(function () {
            if ($("#tab_logic #chk_all").is(':checked')) {
                $("#tab_logic input[type=checkbox]").each(function () {
                    $("#btn_delete").prop("disabled", false);
                    $(this).prop("checked", true);
                });
            } else {
                $("#tab_logic input[type=checkbox]").each(function () {
                    $("#btn_delete").prop("disabled", true);
                    $(this).prop("checked", false);
                });
            }
        });
        $("#tab_logic #chk").on("click", function () {
            if ($("#tab_logic #chk").is(':checked')) {
                $("#btn_delete").prop("disabled", false);
            } else {
                $("#btn_delete").prop("disabled", true);
            }
        });
    });
</script>
<script>
    $(document).ready(function () {

        //$('#datepicker,#datepicker1').datepicker({dateFormat: 'yy-mm-dd'}).val();
        function step_day() {
            $('#datepicker,#datepicker1').datepicker("destroy");
            $('#datepicker,#datepicker1').datepicker({dateFormat: 'yy-mm-dd'}).val();
        }
        function step_month() {
            $('#datepicker,#datepicker1').datepicker("destroy");
            $('#datepicker,#datepicker1').datepicker({dateFormat: 'MM'}).val();
        }
        function step_year() {
            $('#datepicker,#datepicker1').datepicker("destroy");
            $('#datepicker').datepicker({dateFormat: 'yy'}).val();
        }

        $("#approval").on("change", function () {
            var day = $('#approval :selected').val();
            //alert(data2);
            //alert(id);
            if (day == "error") {
                //alert("ไม่มี");
                $('#datepicker').prop("disabled", true);
                $('#datepicker1').prop("disabled", true);
                $('#datepicker').removeClass("error");
                $('#datepicker1').removeClass("error");
                $("#datepicker").val("");
                $("#datepicker1").val("");
                $("#datepicker").attr("placeholder", "Select Type Date Frist");
                $("#datepicker1").attr("placeholder", "Select Type Date Frist");
                $('#btn_id').prop("disabled", true);
                $('#btn_report').prop("disabled", false);
                var day = $('#approval :selected').val();
                $.ajax({
                    url: "<?php echo base_url("admin/select_type_day"); ?>",
                    method: "post",
                    datatype: "html",
                    data: $("#show_store").serialize(),
                    success: function (response) {
                        $("#showday").empty().html(response);
                    }
                });
            } else if (day == "day") {
                //alert("มี");

                $('#datepicker').prop("disabled", false);
                $('#datepicker1').prop("disabled", false);
                $("#datepicker").attr("placeholder", "Day Begin");
                $("#datepicker1").attr("placeholder", "Day End");
                $("#datepicker").val("");
                $("#datepicker1").val("");
                step_day();
                $('#btn_id').prop("disabled", false);
                $('#btn_report').prop("disabled", true);
            } else if (day == "month") {

                $('#datepicker').prop("disabled", false);
                $('#datepicker1').prop("disabled", false);
                $("#datepicker").attr("placeholder", "Mounth Begin");
                $("#datepicker1").attr("placeholder", "Mounth End");
                $("#datepicker").val("");
                $("#datepicker1").val("");
                step_month();
                $('#btn_id').prop("disabled", false);
                $('#btn_report').prop("disabled", true);
            } else {
                $('#datepicker').prop("disabled", false);
                $('#datepicker1').prop("disabled", true);
                $("#datepicker").attr("placeholder", "Year Begin");
                $("#datepicker1").attr("placeholder", "");
                $("#datepicker").val("");
                $("#datepicker1").val("");
                step_year();
                $('#btn_id').prop("disabled", false);
                $('#btn_report').prop("disabled", true);
            }

        });
        $("#show_store").validate({
            focusInvalid: false,
            rules: {
                frist_id: {
                    required: true
                },
                end_id: {
                    required: true
                }
            },
            messages: {
                frist_id: {
                    required: ""
                },
                end_id: {
                    required: ""
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: "<?php echo base_url("admin/select_type_day"); ?>",
                    method: "post",
                    datatype: "html",
                    data: $("#show_store").serialize(),
                    success: function (response) {
                        // alert(response);
                        $("#showday").empty().html(response);
                        $('#btn_report').prop("disabled", false);
                    }
                });
            }
        });
    });
</script>

<style type="text/css">
.approval-row-data{width: 80%;margin-left:10%;}
.approval-head{width: 70%;margin-left:15%;}
.btntap-right{display: inline-block;color: #000;text-decoration:none;padding: 12px 10px;    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;float: right;width: 50%;    text-align: center;}
.btntap-right:hover{color: #000;text-decoration:none;background-color: #f5f5f5;}
.btntap-left{display: inline-block;color: #000;text-decoration:none;padding: 12px 10px;    border-left: 1px solid #ddd;
   width: 50%;    text-align: center;}
.btntap-left:hover{color: #000;text-decoration:none;background-color: #f5f5f5;}
  #tab_logic{text-align: center;width: 90%;background-color: #fff;border: none;    margin-left: 5%;}
}
tbody{color: #777;}

 #tab_logic tr th{
   text-align: center;
    padding-top: 20px;
    padding-bottom: 20px;
    background: #fff;
    font-size: 12px;
        border-bottom: 1px solid rgba(51, 51, 51, 0.07);
        border-right: none;
        border-left: none;
        color: #898989;

}

 #tab_logic tr td{
    font: 12px Helvetica;
    height: 50px;
    border: 1px solid;
        border-color: transparent;
    border-radius: 3px;
    padding: 5px 10px;
    vertical-align: middle;
}

    .checkbox label:after, 
    .radio label:after {
        content: '';
        display: table;
        clear: both;
    }

    .checkbox .cr,
    .radio .cr {
        position: relative;
        display: inline-block;
        border: 1px solid #a9a9a9;
        border-radius: .25em;
        width: 1.3em;
        height: 1.3em;
        float: left;
        margin-right: .5em;
    }

    .radio .cr {
        border-radius: 50%;
    }

    .checkbox .cr .cr-icon,
    .radio .cr .cr-icon {
        position: absolute;
        font-size: .8em;
        line-height: 0;
        top: 50%;
        left: 20%;
    }

    .radio .cr .cr-icon {
        margin-left: 0.04em;
    }

    .checkbox label input[type="checkbox"],
    .radio label input[type="radio"] {
        display: none;
    }

    .checkbox label input[type="checkbox"] + .cr > .cr-icon,
    .radio label input[type="radio"] + .cr > .cr-icon {
        transform: scale(3) rotateZ(-20deg);
        opacity: 0;
        transition: all .3s ease-in;
    }

    .checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
    .radio label input[type="radio"]:checked + .cr > .cr-icon {
        transform: scale(1) rotateZ(0deg);
        opacity: 1;
    }

    .checkbox label input[type="checkbox"]:disabled + .cr,
    .radio label input[type="radio"]:disabled + .cr {
        opacity: .5;
    }
</style>