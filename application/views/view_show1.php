<table class="table table-bordered table-hover" id="tab_logic">
    <thead>
        <tr >
            <th class="text-center">ลำดับ</th>
            <th class="text-center">วันและเวลา</th>
            <th class="text-center">รูปภาพ</th>
            <th class="text-center">ชื่อสินค้า</th>
            <th class="text-center">หมวดสินค้า</th>
            <th class="text-center">ประเภทสินค้า</th>
            <th class="text-center">จำนวนสินค้าที่เบิก</th>
            <?php if ($_SESSION['sessemp']['status'] == ("admin")) { ?> 
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
                    <td style="width: 110px;"><?php echo $row->rp_date; ?></td>
                    <td><img name="img1" id="img1" width="50px" src="<?php echo base_url("admin/showupload/" . $row->rp_image); ?>_backpage.jpg"></td>
                    <td style="width: 126px;"><?php echo $row->rp_productname; ?></td>
                    <td><?php echo $row->ty_name; ?></td>
                    <td><?php echo $row->ct_name; ?></td>                    
                    <td><?php echo $row->rp_amount; ?></td>
                    <?php if ($_SESSION['sessemp']['status'] == ("admin")) { ?> 
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