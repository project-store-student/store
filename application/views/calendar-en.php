<?php
$num = array();
$numrp = array();


foreach ($mtr as $key) {

    $timeday = strtotime($key->mtr_date);
    $aday = date("j", $timeday);
    $name_product = $key->mtr_productname;

    if (array_key_exists($aday, $num)) {
        $num[$aday] = $num[$aday] . "," . $name_product;
    } else {
        $num[$aday] = $name_product;
    }
}
foreach ($rp as $key) {

    $timedayrp = strtotime($key->rp_date);
    $adayrp = date("j", $timedayrp);
    $name_product = $key->rp_productname;

    if (array_key_exists($adayrp, $numrp)) {
        $numrp[$adayrp] = $numrp[$adayrp] . "," . $name_product;
    } else {
        $numrp[$adayrp] = $name_product;
    }
}
?>
 <div class="sub-content">
 <div class="calen">

<div class="fc-button-group">
<button id="prev" value="<?php echo $prevMonth ?>"><</button>
<button id="next" value="<?php echo $nextMonth ?>">></button>
</div>
<?php
            for ($i = 1; $i <= 12; $i++) {
                if ($month == $i) {
                    ?>
<center><h2><?php echo $full_month . "&nbsp" . $year ?> </h2></center>
     <?php
                }
            }
            ?>

<table>
   
<tr>
    <?php
    for ($i = 0; $i <= 6; $i++) {
        echo "<th class='day' >" . $arrDday[$i] . "</th>";
    }
    ?> 
</tr>
<tr>
    <?php
    $start = 1;
    while ($start <= $weekday) {
        echo "<td>&nbsp;</td>";
        $start++;
    }
    $weekday++;
    while ($day <= $last_days) {
        if (date('j') == $day) {
            $text = "";
            $numb = 1;
            $textrp = "";
            $numbrp = 1;
            if ((array_key_exists($day, $num)) && (array_key_exists($day, $numrp))) {
                $datachk = explode(",", $num[$day]);
                $datarp = explode(",", $numrp[$day]);
                foreach ($datachk as $value) {
                    $text .= "<a href='admin/approval/1/' title='approval'>$value</a>";
                    $numb++;
                }
                foreach ($datarp as $value) {
                    $textrp .= "<a href='admin/approval/3/' title='approval'>$value</a>";
                    $numbrp++;
                }
                ?>
                <td  class='event'>
                    <div  title='รายการที่ยังไม่อนุมัติ' data-toggle='popover' data-placement="bottom" data-content="<div class='text'><h5>เพิ่ม</h5><?= $text; ?></div><div class='textrp'><h5>เบิก</h5><?= $textrp; ?></div>" data-original-title="header" ><?= $day; ?></div>
                </td>
                <?php
            } else if (array_key_exists($day, $num)) {
                $datachk = explode(",", $num[$day]);
                foreach ($datachk as $value) {
                    $text .= "<a href='admin/approval/1/' title='approval'>$value</a>";
                    $numb++;
                }
                ?>
                <td  class='event'>
                    <div  title='รายการที่ยังไม่อนุมัติ' data-toggle='popover' data-placement="bottom" data-content="<div class='text'><h5>เพิ่ม</h5><?= $text; ?></div><div class='textrp'><h5>เบิก</h5><?= $textrp; ?></div>" data-original-title="header" ><p><?= $day; ?></p></div>
                </td>
                <?php
            } else if (array_key_exists($day, $numrp)) {
                $datarp = explode(",", $numrp[$day]);
                foreach ($datarp as $value) {
                    $textrp .= "<a href='admin/approval/3/' title='approval'>$value</a>";
                    $numb++;
                }
                ?>
                <td  class='event'>
                    <div  title='รายการที่ยังไม่อนุมัติ' data-toggle='popover' data-placement="bottom" data-content="<div class='text'><h5>เพิ่ม</h5><?= $text; ?></div><div class='textrp'><h5>เบิก</h5><?= $textrp; ?></div>" data-original-title="header" ><p><?= $day; ?></p></div>
                </td>
                <?php
            } else {
                echo "<td bgcolor='#fff'>$day</td>";
            }
        } else {
            $text = "";
            $numb = 1;
            $textrp = "";
            $numbrp = 1;
            if ((array_key_exists($day, $num)) && (array_key_exists($day, $numrp))) {
                $datachk = explode(",", $num[$day]);
                $datarp = explode(",", $numrp[$day]);
                foreach ($datachk as $value) {
                    $text .= "<a href='admin/approval/1/' title='approval'>$value</a>";
                    $numb++;
                }
                foreach ($datarp as $value) {
                    $textrp .= "<a href='admin/approval/3/' title='approval'>$value</a>";
                    $numbrp++;
                }
                ?>
                <td  class='event'>
                    <div  title='รายการที่ยังไม่อนุมัติ' data-toggle='popover' data-placement="bottom" data-content="<div class='text'><h5>เพิ่ม</h5><?= $text; ?></div><div class='textrp'><h5>เบิก</h5><?= $textrp; ?></div>" data-original-title="header" ><p><?= $day; ?></p></div>
                </td>
                <?php
            } else if (array_key_exists($day, $num)) {
                $datachk = explode(",", $num[$day]);
                foreach ($datachk as $value) {
                    $text .= "<a href='admin/approval/1/' title='approval'>$value</a>";
                    $numb++;
                }
                ?>
                <td class='event'>
                    <div  title='รายการที่ยังไม่อนุมัติ' data-toggle='popover' data-placement="bottom" data-content="<div class='text'><h5>เพิ่ม</h5><?= $text; ?></div><div class='textrp'><h5>เบิก</h5><?= $textrp; ?></div>" data-original-title="header" ><p><?= $day; ?></p></div>
                </td>
                <?php
            } else if (array_key_exists($day, $numrp)) {
                $datarp = explode(",", $numrp[$day]);
                foreach ($datarp as $value) {
                    $textrp .= "<a href='admin/approval/3/' title='approval'>$value</a>";
                    $numb++;
                }
                ?>
                <td class='event'>
                    <div  title='รายการที่ยังไม่อนุมัติ' data-toggle='popover' data-placement="bottom" data-content="<div class='text'><h5>เพิ่ม</h5><?= $text; ?></div><div class='textrp'><h5>เบิก</h5><?= $textrp; ?></div>" data-original-title="header" ><p><?= $day; ?></p></div>
                </td>
                <?php
            } else {
                echo "<td>$day</td>";
            }
        }




        if ($weekday == 7 and $day != $last_days) {
            echo '<tr></tr>';
            $weekday = 0;
        }
        $day++;
        $weekday++;
    }


    while ($weekday <= 7) {
        echo "<td>&nbsp;</td>";
        $weekday++;
    }
    ?>
</tr>
</table>
</div>
</div>

<script>
    $("#next").on("click", function () {
        var m_y = $("#next").val();
        $.ajax({
            url: "<?php echo base_url('admin/calendar');?>",
            method: "POST",
            datatype: "html",
            data: "m_y=" + m_y,
            success: function (response) {
                var data = jQuery.parseJSON(response);
                $(".content").empty();
                $(".content").append(data);
            }
        });
    });
    $("#prev").on("click", function () {
        var m_y = $("#prev").val();
        $.ajax({
            url: "<?php echo base_url('admin/calendar');?>",
            method: "POST",
            datatype: "html",
            data: "m_y=" + m_y,
            success: function (response) {
                var data = jQuery.parseJSON(response);
                $(".content").empty();
                $(".content").append(data);
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover({html: true});
    });
</script>
<style type="text/css">
    .popover-title{
        padding: 8px 30px;
    margin: 0;
    font-size: 14px;
    color: #fff;
    background-color: #333;
}
.popover-content {
    color: #000;
    padding: 9px 14px;
}
.popover-content a{
    font-size: 12px;
}
.popover-content .text{
    float: left;
    margin: 0px 5px;
}
.popover-content .textrp{
    float: right;
    margin: 0px 5px;
}
[data-toggle="popover"]{
    cursor: pointer;
}
</style>