      <!DOCTYPE html>
<html>
    <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- HEADER -->
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png');?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/all.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>"> 
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.4.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url("assets/fontello/css/fontello.css"); ?>"> 
<!-- END HEADER -->
<script type="text/javascript" src="<?php echo base_url("assets/js/colorbox/jquery.colorbox-min.js"); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url("assets/js/colorbox/example4/colorbox.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/fontello/css/animation.css"); ?>"> 

       <title>Store</title>
    </head>
    <body>
        <?php $this->load->view("header") ?>

<div class="content">
<div class="report-order-content" style="padding: 0px 50px 100px 50px">
<center><h3>รายงานสั่งซื้อสินค้า</h3></center>
<table>
                                                <thead>
                                                    <tr>  
                                                        <th class="text-center">ลำดับ</th>
                                                        <th class="text-center">เลขที่ใบสั่งซื้อ</th>
                                                        <th class="text-center">วันที่</th>
						<th class="text-center">ผู้สั่งซื้อ</th>
                                                                <th class="text-center">สถานะ</th>
						<th class="text-center">รายละเอียด</th>
						<th class="text-center">พิมพ์</th>
                                                                                                            </tr>
                                                </thead>
                                                <tbody>
                                                	
<?php $i=1; foreach ($rpo as  $value) {
?>
                                                	<tr>
                                                		<td><?=$i?></td>
                                                		<td><?=$value->rpo_autoid?></td>
                                                		<td><?=$value->rpo_date?></td>
                                                		<td><?=$value->emp_fristname?></td>
                                                            <td><?php echo ($value->rpo_status == 0)? "<span style='color:red'>ยังไม่ได้รับ</span>": "<span style='color:green'>รับแล้ว</span>" ?></td>

                                                		<td><button class="btn-rpo" href="<?php echo base_url("admin/order_show?id=$value->rpo_autoid"); ?>">รายละเอียด</button>
 
                                                              </td>
                                                		<td><button class="btn-print" href="<?php echo base_url("admin/order_print?id=$value->rpo_autoid"); ?>"><i class="icon-print"><i></button></td>
                                                	</tr>
                                            
    <?php $i++; } ?>                                           

                                                </tbody>
                                                </table>
</div>
</div>
</body>
</html>
<script type="text/javascript">
	  $(".btn-rpo").click(function(){
        var url = $(this).attr("href");
        $.colorbox({
            href: url,
               opacity: 0.9, 
            scrolling: false,
               fixed:true,
            closeButton:false,
        });
                });

	   $(".btn-print").click(function(){
        		var URL = $(this).attr("href");
        		 var W = window.open(URL);    
    		W.window.print(); 
                });

</script>
<style type="text/css">
        .report-order-content table{text-align: center;width: 100%;background-color: #fff;border: none;}
tbody{color: #777;}
.report-order-content table tr th{
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

.report-order-content table tr td{
    font: 12px Helvetica;
    height: 30px;
    border: 1px solid;
        border-color: transparent;
    border-radius: 3px;
    padding: 5px 10px;
}
</style>