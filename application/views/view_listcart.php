<?php $this->load->view("bootstrap_and_js.php"); ?>

<?php $this->load->view("view_headerproduct.php"); ?>
<style>
    .table > tbody > tr > td, .table > tfoot > tr > td
    {
        vertical-align: middle;
    }
    @media screen and (max-width: 600px) {
        table#cart tbody td .form-control{
            width:20%;
            display: inline !important;
        }
        .actions .btn{
            width:36%;
            margin:1.5em 0;
        }
        .actions .btn-info{
            float:left;
        }
        .actions .btn-danger{
            width:100%;
            float:right;
        }

        table#cart thead { display: none; }
        table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
        table#cart tbody tr td:first-child { background: #333; color: #fff; }
        table#cart tbody td:before {
            content: attr(data-th); font-weight: bold;
            display: inline-block; width: 8rem;
        }



        table#cart tfoot td{display:block; }
        table#cart tfoot td .btn{display:block;}

    }
</style>
<div style="margin:75px;">
    <section class="primary"  style="width:calc(100% - 0px); padding-bottom: 0px;">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">สินค้า</th>
                    <th style="width:10%">ราคา</th>
                    <th style="width:8%">จำนวน</th>
                    <th style="width:22%" class="text-center">ราคาต่อหน่วย</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($list_data)) {
                    $i = 1;
                    foreach ($list_data as $key) {
                        ?>
                        <tr id="target<?php echo $key->sm_autoid; ?>">
                            <td data-th="สินค้า">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs" style="height: 150px;"><img class="img-2" style="width: 100%; height: 100%;" src="<?php echo base_url("my_customer/showupload/" . $key->sm_image . "_fontpage_list.jpg"); ?>" alt="..." class="img-responsive"/></div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <h4 class="nomargin"><?php echo $key->sm_productname; ?></h4>
                                        <div class="detail hidden-xs">
                                            <p id="detail-p" ><?php echo $key->sm_productdetail; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td  data-th="ราคา"><?php echo $key->ss_price; ?>
                                <input type="hidden" name="price" id="price" value="<?php echo $key->ss_price; ?>" >
                                <input type="hidden" name="idpro" class="idpro" id="idpro" value="<?php echo $key->sm_autoid; ?>" >
                            </td>
                            <td data-th="จำนวน">
                                <input type="number" name="number" id="number" min="1" max="<?php echo $key->sm_amount; ?>" data-id="<?php echo $i; ?>" data-price="<?php echo $key->ss_price; ?>" class="number form-control text-center" value="1">
                            </td>
                            <td id="td-subtotal<?php echo $i; ?>" data-th="ราคาต่อหน่วย" class="text-center">
                                <?php echo $key->ss_price; ?>
                                <input type='hidden' name='subtotal' id='subtotal' class="subtotal-input" value='<?php echo $key->ss_price; ?>' >
                            </td>
                            <td class="actions" data-th="">
                                <button type="submit" class="btn btn-danger btn-sm deleteitem" data-id="<?php echo $key->sm_autoid; ?>"><i class="icon-cancel-circled"></i></button>								
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                } else {
                    ?>
                    <tr id="targetError" >
                        <td colspan="5"><center>ไม่มีรายการ</center></td>
                </tr>
            <?php }
            ?>
            </tbody>
            <tfoot>
                <tr class="visible-xs ">
                    <td class=" text-center total" colspan="5" id="total"><strong>รวม </strong></td>
<!--                    <td class=" text-center " ></td>
                    <td class=" text-center " ></td>
                    <td class=" text-center " ></td>
                    <td class=" text-center " ></td>-->

                </tr>
                <tr>
                    <td><a href="<?php echo product_url(); ?>" class="btn btn-warning"><i class="icon-angle-left"></i> เลือกสินค้าต่อ</a></td>
                    <td id="td-cart" colspan="2" class="hidden-xs"></td>
                    <?php if (!empty($list_data)) { ?>

                        <td id="total" class="total hidden-xs text-center">
                            <strong>รวม </strong>
                        </td>
                    <?php } else { ?>
                        <td class="hidden-xs text-center">
                            <strong></strong>
                        </td>
                        <?php
                    }
                    if (!empty($list_data)) {
                        ?>
                        <td><a id="<?php
                            if (empty($_SESSION['customer']['id'])) {
                                
                            } else {
                                echo "checkout";
                            }
                            ?>" href="<?php
                            if (empty($_SESSION['customer']['id'])) {
                                echo base_url('product/login');
                            } else {
                                
                            }
                            ?>" class="btn btn-success btn-block">Process Checkout <i class="icon-angle-right"></i></a>
                        </td>
                    <?php } else {
                        ?>
                        <td>
                            <a id="checkout-fail" href="javascript:void(0);"class = "btn btn-success btn-block">Process Checkout <i class = "icon-angle-right"></i></a>
                        </td>
                    <?php } ?>
                </tr>
            </tfoot>
        </table>

    </section>
</div>
<script>
    $(document).ready(function () {
//        $(window).on("load resize scroll", function (e) {
//            width = $(this).width();
//            if (width < 583) {    //768 == 751
//                
//            } else {
//                
//            }
//
//        });
        $('.number').on('input', function (e) {
            var id = $(this).attr('data-id');
            var price = $(this).attr('data-price');
            var number = $(this).val().trim();
            var subtotal = (parseInt(price) * parseInt(number));
            $('#td-subtotal' + id).empty();
            $('#td-subtotal' + id).append(subtotal + "<input type='hidden' name='subtotal' class='subtotal-input' id='subtotal' value='" + subtotal + "' >");
            calculate();
        });
        calculate();
        $('#checkout').on("click", function () {

            $('#cart > tbody > tr').each(function () {
                var name = $(this).find('.idpro').val();
                var value = $(this).find('.number').val();
                var max = parseInt($(this).find('.number').attr('max'));
                var days = 1;
                if (value > max) {
                    alert("ขออภัยสินค้าไม่พอกับจำนวนที่ระบุบ");
                    return false;
                } else {
                    createCookie(name, value, days);
                    $('#checkout').attr("href", "<?php echo base_url('my_customer/steppayment'); ?>");
                }
            });
        });
        $('#checkout-fail').on("click", function () {
            alert("ขออภัย ไม่มีสินค้าอยู่ในรายการสั่งซื้อ");
        });


        var createCookie = function (name, value, days) {
            var expires;
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toGMTString();
            } else {
                expires = "";
            }
            document.cookie = name + "=" + value + expires + "; path=/";
        }



        $(document).on("click", '.deleteitem', function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "<?php echo base_url("my_customer/delete_cart"); ?>",
                method: "POST",
                datatype: "html",
                data: "id=" + id,
                cache: false,
                success: function (response) {
                    //alert(response);
                    if (response == "begin") {
                        $('#target' + id).fadeOut(1000, function () {
                            $(this).remove();
                            $("#cart > tbody ").fadeIn(1200, function () {
                                $(this).append("<tr id='targetError'><td colspan='5'><center>ไม่มีรายการ</center></td></tr>");
                            });
                            $("#option").empty();
                            $("#amount").empty();
                            calculate();
                            $("#total").empty();
                            $("#total").remove("total");
                        });
                    } else {
                        $('#target' + id).fadeOut(1000, function () {
                            $(this).remove();
                            $("#option").html(": ");
                            $("#amount").html(response);
                            calculate();
                        });
                    }
                }
            });
        });
    });



    function calculate() {
        var total = 0;

        $('#cart > tbody > tr').each(function () {
            var subtotal = $(this).find('.subtotal-input').val();
            total = (parseInt(subtotal) + parseInt(total));
            $('.total').html("<strong> รวม " + total + " ฿</strong>");
        });
    }
</script>
<style>
    .detail > p{
        font-size: 12px;
        line-height:16pt;
        height:75pt;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: pre-line;

        position: relative;
    }

</style>
<?php $this->load->view('view_footerproduct'); ?>


