<table class="table table-bordered table-hover" id="tab_logic">
    <thead>
        <tr >
            <th class="text-center">ลำดับ</th>
            <th class="text-center">วันและเวลา</th>
            <th class="text-center">รูปภาพ</th>
            <th class="text-center">ชื่อสินค้า</th>
            <th class="text-center">หมวดสินค้า</th>
            <th class="text-center">ประเภทสินค้า</th>
            <th class="text-center">จำนวนสินค้า</th>
            <?php if ($_SESSION['sessemp']['status'] == ("admin")) { ?> 
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
                    <td style="width: 110px;"><?php echo $key->mtr_date; ?></td>
                    <td><img name="img1" id="img1" width="50px" src="<?php echo base_url("admin/showupload/" . $key->mtr_image); ?>_backpage.jpg"></td>
                    <td style="width: 126px;"><?php echo $key->mtr_productname; ?></td>
                    <td><?php echo $key->ty_name; ?></td>
                    <td><?php echo $key->ct_name; ?></td>                    
                    <td><?php echo $key->mtr_quantity; ?></td>
                    <?php if ($_SESSION['sessemp']['status'] == ("admin")) { ?> 
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
<center>
    <nav>
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
    </nav>
</center>