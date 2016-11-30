<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<?php $this->load->view("header"); ?>
<?php
$one = count($data);
$two = count($data2);
$there = count($data3);
$four = count($data4);
?>
<div class="content">
<div  class="approval-content" style="width: 100%; padding: 0px 35px; " >
<center><h2>รายการ เพิ่ม/เบิก</h2></center>

                <div id="step-1">
                    <div class="row">
                        <div class="col-md-3" style=" width: 25%; padding: 0;">
                            <a href="#" style=" background-color:#e3e3e3; color:#000; border-color:#e3e3e3; "   class="list-group-item active step-1-menu" onClick="$('#step-2').hide(); $('#step-3').hide(); $('#step-4').hide(); $('#step-1').show()" >
                                <h4 class="list-group-item-heading">รายการเพิ่ม(<?php
                                        if ($one) {
                                            echo $one;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                        <div class="col-md-3" style="width: 25%; padding: 0;">
                            <a href="#" class="list-group-item  step-2-menu" onClick="$('#step-1').hide(); $('#step-3').hide(); $('#step-4').hide(); $('#step-2').show()">
                                <h4 class="list-group-item-heading">รายการเพิ่มอนุมัติแล้ว(<?php
                                        if ($two) {
                                            echo $two;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                        <div class="col-md-3" style="width: 25%; padding: 0;">

                            <a href="#" class="list-group-item step-3-menu" onClick="$('#step-1').hide(); $('#step-2').hide(); $('#step-4').hide(); $('#step-3').show()">
                                <h4 class="list-group-item-heading">รายการเบิก(<?php
                                        if ($there) {
                                            echo $there;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                        <div class="col-md-3" style="width: 25%; padding: 0;">
                            <a href="#" class="list-group-item step-3-menu" onClick="$('#step-1').hide(); $('#step-2').hide(); $('#step-3').hide(); $('#step-4').show()">
                                <h4 class="list-group-item-heading">รายการเบิกอนุมัติแล้ว(<?php
                                        if ($four) {
                                            echo $four;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top:10px;padding: 0" >
                            <!--                Load content in-->
                            <div class="well wizard-content"   style="width: 100%;">
                                <div class="row">
                                    <div class="col-md-12 column">
                                        <h4 style="color:black;">รอการอนุมัติ</h4>
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
                                                <div class="panel-footer">
                                                    <div class="pull-left">
                                                        <input type="button" id="btn_delete" class="btn btn-danger"  value="ลบที่เลือกที่เลือก" disabled>
                                                    </div>
                                                    <div class="pull-right">
                                                        <input type="submit" class="btn btn-primary" value="อนุมัติที่เลือก">
                                                    </div>
                                                </div>
                                            <?php } else { ?> 
                                                <div class="panel-footer">
                                                    <div class="pull-left">
                                                        <input type="button" id="btn_delete" class="btn btn-danger"  value="ลบที่เลือกที่เลือก" disabled>
                                                    </div>
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
                </div>


                <div  id="step-2" style="display:none;" >
                    <div class="row">
                        <div class="col-md-3" style="width: 25%; padding: 0">
                            <a href="#" class="list-group-item  step-1-menu" onClick="$('#step-2').hide(); $('#step-3').hide(); $('#step-4').hide(); $('#step-1').show()" >
                                <h4 class="list-group-item-heading">รายการเพิ่ม(<?php
                                        if ($one) {
                                            echo $one;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                        <div class="col-md-3" style="width: 25%; padding: 0;">
                            <a href="#" class="list-group-item active step-2-menu" style=" background-color:#e3e3e3; color:#000; border-color:#e3e3e3;" onClick="$('#step-1').hide(); $('#step-3').hide(); $('#step-4').hide(); $('#step-2').show()">
                                <h4 class="list-group-item-heading">รายการเพิ่มอนุมัติแล้ว(<?php
                                        if ($two) {
                                            echo $two;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                        <div class="col-md-3" style="width: 25%; padding: 0;">
                            <a href="#" class="list-group-item step-3-menu" onClick="$('#step-1').hide(); $('#step-2').hide(); $('#step-4').hide(); $('#step-3').show()">
                                <h4 class="list-group-item-heading">รายการเบิก(<?php
                                        if ($there) {
                                            echo $there;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                        <div class="col-md-3" style="width: 25%; padding: 0;">
                            <a href="#" class="list-group-item step-3-menu" onClick="$('#step-1').hide(); $('#step-2').hide(); $('#step-3').hide(); $('#step-4').show()">
                                <h4 class="list-group-item-heading">รายการเบิกอนุมัติแล้ว(<?php
                                        if ($four) {
                                            echo $four;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top:10px;padding: 0" >
                            <!--                Load content in-->
                            <div class="well wizard-content"   style="width: 100%;">

                                <div class="row">
                                    <div class="col-md-12 column">
                                        <h4 style="color:black;">อนุมัติแล้ว</h4>
                                        <form method="post" id="show_store">
                                            <div class="form-group" >
                                                <div class="col-md-3">
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

                                                    <div class="col-md-2">
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
                                            <div class="panel-footer">
                                                <div class="pull-right">
                                                </div>
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
                </div>

                <div id="step-3" style="display:none;" >
                    <div class="row">
                        <div class="col-md-3" style="width: 25%; padding: 0;">
                            <a href="#" class="list-group-item  step-1-menu" onClick="$('#step-2').hide(); $('#step-3').hide(); $('#step-4').hide(); $('#step-1').show()" >
                                <h4 class="list-group-item-heading">รายการเพิ่ม(<?php
                                        if ($one) {
                                            echo $one;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                        <div class="col-md-3" style="width: 25%; padding: 0;">
                            <a href="#" class="list-group-item  step-2-menu" onClick="$('#step-1').hide(); $('#step-3').hide(); $('#step-4').hide(); $('#step-2').show()">
                                <h4 class="list-group-item-heading">รายการเพิ่มอนุมัติแล้ว(<?php
                                        if ($two) {
                                            echo $two;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                        <div class="col-md-3" style="width: 25%; padding: 0;">
                            <a style=" background-color:#e3e3e3; color:#000; border-color:#e3e3e3;" href="#" class="list-group-item active step-3-menu" onClick="$('#step-1').hide(); $('#step-2').hide(); $('#step-4').hide(); $('#step-3').show()">
                                <h4 class="list-group-item-heading">รายการเบิก(<?php
                                        if ($there) {
                                            echo $there;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                        <div class="col-md-3" style="width: 25%; padding: 0;">
                            <a href="#" class="list-group-item step-3-menu" onClick="$('#step-1').hide(); $('#step-2').hide(); $('#step-3').hide();  $('#step-4').show()">
                                <h4 class="list-group-item-heading">รายการเบิกอนุมัติแล้ว(<?php
                                        if ($four) {
                                            echo $four;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top:10px;padding: 0" >
                            <!--                Load content in-->
                            <div class="well wizard-content"   style="width: 100%;">
                                <div class="row">
                                    <div class="col-md-12 column">
                                        <h4 style="color:black;">รายการขอเบิก</h4>
                                        <form method="post" id="update_store">
                                            <table  id="tab_logic">
                                                <thead>
                                                    <tr >
                                                        <th class="text-center">ลำดับ</th>
                                                        <th class="text-center">วันและเวลา</th>
                                                        <th class="text-center">รูปภาพ</th>
                                                        <th class="text-center">ชื่อสินค้า</th>
                                                        <th class="text-center">หมวดสินค้า</th>
                                                        <th class="text-center">ประเภทสินค้า</th>
                                                        <th class="text-center">จำนวนสินค้าที่เบิก</th>
                                                        <th class="text-center">ขอเบิกสินค้าโดย</th>
                                                        <?php if ($_SESSION['sessemp']['status'] == 0) { ?> 
                                                            <th class="text-center">เลือกรายการขอเบิก</th>
                                                            <th class="text-center">ลบ</th>
                                                        <?php } else { ?>
                                                            <th class="text-center">Option</th>
                                                        <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $num = 1;
                                                    if (!empty($data3)) {
                                                        ?>
                                                        <tr>
                                                            <?php foreach ($data3 as $rs) {
                                                                ?>

                                                                <td><input type="hidden" value="<?php echo $rs->rp_autoid; ?>" name="rp_autoid" id="rp_autoid"><?php echo $num; ?></td>
                                                                <td><?php echo $rs->rp_date; ?></td>
                                                                <td><img name="img1" id="img1" width="50px" src="<?php echo base_url("admin/showupload/" . $rs->rp_image); ?>_backpage.jpg"></td>
                                                                <td><input type="hidden" value="<?php echo $rs->sm_autoid; ?>" name="sm_autoid" id="sm_autoid"><?php echo $rs->rp_productname; ?></td>
                                                                <td><?php echo $rs->ty_name; ?></td>
                                                                <td ><?php echo $rs->ct_name; ?></td>                    
                                                                <td><input type="hidden" value="<?php echo $rs->rp_amount; ?>" name="rp_amount" id="rp_amount"><?php echo $rs->rp_amount; ?></td>
                                                                <td><input type="hidden" value="<?php echo $rs->emp_id; ?>" name="emp_id" id="emp_id"><?php echo $rs->emp_fristname; ?></td>
                                                                <td>
                                                                    <?php if ($_SESSION['sessemp']['status'] == 0) { ?>
                                                                        <div class="radio">
                                                                            <label style="font-size: 14px;">
                                                                                <input type="radio" name="rad" id="rad" value="<?php echo $rs->rp_autoid; ?>">
                                                                                <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                                                            </label>
                                                                        </div>
                                                                    <td ><a style="width: 50px;" href="<?php echo base_url('admin/delete_ssm_whid?id_emp=' . $_SESSION['sessemp']['id'] . '&rp_id=' . $rs->rp_autoid . '&rp_amount=' . $rs->rp_amount .''); ?>" name="btn_emp" id="btn_emp" class="btn btn-danger" onclick="return confirm('ลบรายการ?');" ><span><i class="icon-trash-empty" ></i></span></a></td>

                                                                <?php } else { ?>
                                                        <a style="width: 50px;" href="<?php echo base_url('admin/view_updatepicking?id_emp=' . $_SESSION['sessemp']['id']. '&sup_mtr=' . $rs->sm_autoid . '&ty_id=' . $rs->ty_id . '&ct_auto=' . $rs->ct_auto . '&id_autoid=' . $rs->rp_autoid . ''); ?>" name="btn_emp" id="btn_emp" class="btn btn-warning cb1" ><span><i class="icon-pencil" ></i></span></a>
                                                    <a style="width: 50px;" href="<?php echo base_url('admin/delete_picking?id_emp=' . $_SESSION['sessemp']['id'] . '&id_autoid=' . $rs->rp_autoid . ''); ?>" name="btn_emp" id="btn_emp" class="btn btn-danger" onclick="return confirm('ลบรายการ?');" ><span><i class="icon-trash-empty" ></i></span></a>
                                                        <?php } ?>
                                                        </td>
                                                        </tr> 
                                                        <?php
                                                        $num++;
                                                    }
                                                    ?>


                                                <?php } else { ?>
                                                    <tr>
                                                        <td colspan="10"><p style="text-align: center;">ไม่มีรายการขอเบิก</p></td>

                                                    </tr>
                                                <?php } ?>

                                                </tbody>
                                            </table>
                                            <?php if ($_SESSION['sessemp']['status'] == 0) { ?> 
                                                <div class="panel-footer">
                                                    <div class="pull-right">
                                                        <input type="submit" class="btn btn-primary" value="อนุมัติที่เลือก">
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <center><nav>
                                                    <ul class="pagination">
                                                        <?php
                                                        $total = $_SESSION['page3']['total'];
                                                        $amountpage = $_SESSION['page3']['amountpage'];

                                                        if ($amountpage == 1) {
                                                            
                                                        } else {
                                                            ?>
                                                            <li>
                                                                <a href="<?php echo base_url("admin/approval/3/?key=3&page=1"); ?>" aria-label="Previous">
                                                                    <span aria-hidden="true">&laquo;</span>
                                                                </a>
                                                            </li>
                                                            <?php
                                                        }
                                                        for ($i = 1; $i <= $total; $i++) {
                                                            ?>
                                                            <li><a href="<?php echo base_url("admin/approval/3/?key=3&page="); ?><?php echo $i; ?>"><?php echo $i; ?></a></li>
                                                            <?php
                                                        }
                                                        if ($amountpage == $total) {
                                                            
                                                        } else {
                                                            ?>
                                                            <li>
                                                                <a href="<?php echo base_url("admin/approval/3/?key=3&page="); ?><?php echo $total; ?>" aria-label="Next">
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
                </div>

                <div  id="step-4" style="display:none;" >
                    <div class="row">
                        <div class="col-md-3" style="width: 25%; padding: 0;">
                            <a  href="#" class="list-group-item  step-1-menu" onClick="$('#step-2').hide(); $('#step-3').hide(); $('#step-4').hide(); $('#step-1').show()" >
                                <h4 class="list-group-item-heading">รายการเพิ่ม(<?php
                                        if ($one) {
                                            echo $one;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                        <div class="col-md-3" style="width: 25%; padding: 0;">
                            <a href="#" class="list-group-item  step-2-menu" onClick="$('#step-1').hide(); $('#step-3').hide(); $('#step-4').hide(); $('#step-2').show()">
                                <h4 class="list-group-item-heading">รายการเพิ่มอนุมัติแล้ว(<?php
                                        if ($two) {
                                            echo $two;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                        <div class="col-md-3" style="width: 25%; padding: 0;">
                            <a href="#" class="list-group-item step-3-menu" onClick="$('#step-1').hide(); $('#step-2').hide(); $('#step-4').hide(); $('#step-3').show()">
                                <h4 class="list-group-item-heading">รายการเบิก(<?php
                                        if ($there) {
                                            echo $there;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                        <div class="col-md-3" style="width: 25%; padding: 0;">
                            <a style=" background-color:#e3e3e3; color:#000; border-color:#e3e3e3;" href="#" class="list-group-item active step-4-menu" onClick="$('#step-1').hide(); $('#step-2').hide(); $('#step-3').hide(); $('#step-4').show()">
                                <h4 class="list-group-item-heading">รายการเบิกอนุมัติแล้ว(<?php
                                        if ($four) {
                                            echo $four;
                                        }
                                        ?>)</h4>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top:10px;padding: 0" >
                            <!--                Load content in-->
                            <div class="well wizard-content"   style="width: 100%;">

                                <div class="row">
                                    <div class="col-md-12 column">
                                        <h4 style="color:black;">อนุมัติแล้ว</h4>
                                        <form method="post" id="show_store1">
                                            <div class="form-group" >
                                                <div class="col-md-3">
                                                    <select id="approval1" name="approval1" class="form-control approval">
                                                        <option value="error">-- Select --</option>
                                                        <option value="day">Select Date</option>
                                                        <option value="month">Select Month</option>
                                                        <option value="year">Select Year</option>
                                                    </select> </div>
                                                <div class="col-md-3">
                                                    <input id="datepicker2" name="frist_id" placeholder="Select Type Date Frist" class="form-control frist_id" style="text-align: center;"  type="text" disabled />
                                                </div>
                                                <div class="col-md-3">
                                                    <input id="datepicker3" name="end_id" placeholder="Select Type Date Frist" class="form-control end_id" style="text-align: center;"  type="text" disabled >
                                                </div>
                                                <div class="col-md-1">
                                                    <button id="btn_id1"  class="btn btn-primary"  type="submit" disabled >Search</button>
                                                </div>
                                                <?php if ($_SESSION['sessemp']['status'] == 0) { ?> 

                                                    <div class="col-md-2">
                                                        <button id="btn_report1" class="btn btn-success"  type="button" onClick="report1();" >Export Excel</button>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </form>
                                        <br><br><br>
                                        <div id="showday1">
                                            <table  id="tab_logic">
                                                <thead>
                                                    <tr >
                                                        <th class="text-center">ลำดับ</th>
                                                        <th class="text-center">วันและเวลา</th>
                                                        <th class="text-center">รูปภาพ</th>
                                                        <th class="text-center">ชื่อสินค้า</th>
                                                        <th class="text-center">หมวดสินค้า</th>
                                                        <th class="text-center">ประเภทสินค้า</th>
                                                        <th class="text-center">จำนวนสินค้าที่เบิก</th>
                                                        <?php if ($_SESSION['sessemp']['status'] == 0) { ?> 
                                                            <th class="text-center">เบิกสินค้าโดย</th>
                                                        <?php } else { ?>
                                                            <th class="text-center">สถานะการเบิก</th>
                                                        <?php } ?>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $num = 1;
                                                    if (!empty($data4)) {


                                                        foreach ($data4 as $row) {
                                                            ?>
                                                            <tr>
                                                                <td><input type="hidden" value="<?php echo $row->rp_autoid; ?>" name="autoid" id="autoid"><?php echo $num; ?></td>
                                                                <td><?php echo $row->rp_date; ?></td>
                                                                <td><img name="img1" id="img1" width="50px" src="<?php echo base_url("admin/showupload/" . $row->rp_image); ?>_backpage.jpg"></td>
                                                                <td><?php echo $row->rp_productname; ?></td>
                                                                <td><?php echo $row->ty_name; ?></td>
                                                                <td><?php echo $row->ct_name; ?></td>                    
                                                                <td><?php echo $row->rp_amount; ?></td>
                                                                <?php if ($_SESSION['sessemp']['status'] == 0) { ?> 
                                                                    <td><?php echo $row->emp_fristname; ?></td>
                                                                    <?php
                                                                } else {
                                                                    if ($row->rp_status == 1) {
                                                                        ?>
                                                                        <td>ผ่านการอนุมัติแล้ว</td>
                                                                    <?php } else {
                                                                        ?>
                                                                        <td>รอการอนุมัติ</td>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </tr>
                                                            <?php
                                                            $num++;
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="11"><p style="text-align: center;">ไม่มีรายการขอเบิกที่ถูกอนุมัติแล้ว</p></td>
                                                        </tr>

                                                    <?php } ?>
                                                </tbody>
                                            </table>  
                                            <div class="panel-footer">
                                                <div class="pull-right">
                                                </div>
                                            </div>
                                            <center><nav>
                                                    <ul class="pagination">
                                                        <?php
                                                        $total = $_SESSION['page4']['total'];
                                                        $amountpage = $_SESSION['page4']['amountpage'];

                                                        if ($amountpage == 1) {
                                                            
                                                        } else {
                                                            ?>
                                                            <li>
                                                                <a href="<?php echo base_url("admin/approval/4/?key=4&page=1"); ?>" aria-label="Previous">
                                                                    <span aria-hidden="true">&laquo;</span>
                                                                </a>
                                                            </li>
                                                            <?php
                                                        }
                                                        for ($i = 1; $i <= $total; $i++) {
                                                            ?>
                                                            <li><a href="<?php echo base_url("admin/approval/4/?key=4&page="); ?><?php echo $i; ?>"><?php echo $i; ?></a></li>
                                                            <?php
                                                        }
                                                        if ($amountpage == $total) {
                                                            
                                                        } else {
                                                            ?>
                                                            <li>
                                                                <a href="<?php echo base_url("admin/approval/4/?key=4&page="); ?><?php echo $total; ?>" aria-label="Next">
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
                </div>
</div>

  
<script>
    $(document).ready(function () {
        var url = window.location.href;
//        var res1 = url.replace("http://store.com/admin/approval?key=", "");
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
        window.location = 'report_store?frist_id=' + frist_day + '&end_id=' + end_day + '&approval=' + select_day + '';
    }
    function report1() {
        // alert("reprot");
        var frist_day = document.getElementById('datepicker2').value
        var end_day = document.getElementById('datepicker3').value
        var select_day = document.getElementById('approval1').value
        //alert(frist_day + end_day + select_day);
        window.location = 'report_store1?frist_id=' + frist_day + '&end_id=' + end_day + '&approval=' + select_day + '';
    }
</script>
<style>
   
    .text-center{
        font-size: 14px;
    }
    tbody{
        text-align: center;
                font-size: 12px;
    }
    .center-block {
        display: block;
        margin-left: auto;
        margin-right: auto;
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

<style type="text/css">
    .approval-content table{text-align: center;width: 100%;background-color: #fff;border: none;}
tbody{color: #777;}
.approval-content table tr th{
   text-align: center;
    padding-top: 20px;
    padding-bottom: 20px;
    background: #fff;
    font-size: 14px;
        border-bottom: 1px solid rgba(51, 51, 51, 0.07);
        border-right: none;
        border-left: none;
        color: #898989;
}

.approval-content table tr td{
    font: 12px;
    height: 50px;
    border: 1px solid;
        border-color: transparent;
    border-radius: 3px;
    padding: 5px 10px;
    vertical-align: middle;
}
</style>