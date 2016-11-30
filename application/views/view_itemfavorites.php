<?php $this->load->view("bootstrap_and_js.php"); ?>

<?php $this->load->view("view_headerproduct.php"); ?>

<?php
//echo "<pre>";
//print_r($item);
//echo "</pre>";
$item_cookie = $this->input->cookie();
$array[] = array();
foreach ($item_cookie as $key => $value) {

    if ($key == "ci_session") {
        
    } else {
        $array[] = $key;
    }
}
?>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">กรุณณายืนยันการลบ</h4>
            </div>

            <div class="modal-body">
                <p>คุณกำลังจะลบรายการโปรด ขั้นตอนนี้ไม่สามารถกลับมาใหม่ได้</p>
                <p>คุณต้องการลบรายการโปรดนี้ ใช่หรือไม่?</p>
                <p class="debug-url"></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a  class="btn btn-danger btn-ok delete" data-id="<?php echo $item[0]->caf_autoid; ?>">Delete</a>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin: 75px;">
    <div class="well well-sm" style="">
        <?php if ($item[0]->caf_name == "All Favorites") { ?>
            <div class="control-group" >
                <strong><a href="<?php echo base_url("my_customer/show_favorites"); ?>">Favorites > </a></strong><label><strong><?php echo $item[0]->caf_name; ?></strong></label>
                <!--                <a style="float:right;" id="add-all" class="hvr-rectangle-in add_all" href="javascript:void(0);" data-id="">Add All to Cart</a>-->
                <button style="float:right;" id="add-all" class="btn bg-gray hvr-rectangle-in add_all" type="button"> Add All to Cart </button>

            </div>    

        <?php } else { ?>
            <div class="control-group">
                <strong><a href="<?php echo base_url("my_customer/show_favorites"); ?>">Favorites > </a></strong><label><strong><?php echo $item[0]->caf_name; ?></strong></label>
                <input type="text" name="name_category" id="name_category" class="form-control edit-input" style="width:250px;" value="<?php echo $item[0]->caf_name; ?>"  data-id="<?php echo $item[0]->caf_autoid; ?>"class="edit-input" />
                <a  style="color: #333;"class="edit" href="javascript:void(0);"><i class="icon-wrench-3"></i></a>
                <a style="color: #333;" href="javascript:void(0);" data-href="<?php echo $item[0]->caf_name; ?>" data-toggle="modal" data-target="#confirm-delete"><i class="icon-trash-empty"></i></a>
                <a style="float:right;" id="add-all" class="hvr-rectangle-in add_all" href="javascript:void(0);" data-id="">Add All to Cart</a>

            </div>
        <?php } ?>
    </div>
    <div class="well" style="background-color:white; border:white;  box-shadow:none;" >
        <div class="btn-group" style="margin-left:89%;">
            <a href="javascript:void(0);" id="grid" class="btn btn-default btn-sm hover"><span class="glyphicon glyphicon-th"></span>Grid</a>
            <a href="javascript:void(0);" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list"></span>List</a> 
        </div>
    </div>
    <div id="products" class="row list-group" style="display: none;">

        <?php foreach ($item as $key) { ?>
            <div class="item col-xs-4 col-lg-4">
                <div id="div-grid" class="div-grid">
                    <div class="thumbnail">
                        <div id="div-grid-row" class="div-grid-row">
                            <div id="div-grid-col" class="col-xs-4 div-grid-col">
                                <div class="image-container">
                                    <img class="group list-group-image" src="<?php echo base_url("my_customer/showupload/" . $key->sm_image . "_fontpage_list.jpg"); ?>" alt="" />
                                    <div class="after">
                                        <p id="favorites_heart<?php echo $key->ss_autoid; ?>" class="product_favorites"><a  class="deletefavorites" data-id="<?php echo $key->ss_autoid; ?>" data-category="<?php echo $key->caf_autoid; ?>"  href="javascript:void(0);" class="hidden-sm" ><i class="icon-heart" ></i></a></p>
                                    </div>

                                    <div class="after-bottom" <?php
                                    if ($key->sm_amount > 0) {
                                        
                                    } else {
                                        echo "style='background-color: red; color: white;'";
                                    }
                                    ?> >
                                        <small>คงเหลือ <?php echo $key->sm_amount; ?> ชิ้น</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="div-grid-row" class="div-grid-row colone">
                            <div class="col-xs-4 div-grid-col coldetail">
                                <div class="caption detail ">
                                    <h4 class="group inner list-group-item-heading"><?php echo $key->sm_productname; ?></h4>
                                    <p class="group inner list-group-item-text"><?php echo $key->sm_productdetail; ?>.</p>
                                </div>
                            </div>
                        </div>
                        <div id="div-grid-row" class="div-grid-row chk1">
                            <div class="col-xs-4 div-grid-col chk2">
                                <div class="row row-button chk3">
                                    <div class="col-xs-12 col-md-6 chk4">
                                        <p class="lead1">
                                            <?php echo "฿" . $key->ss_price . " ต่อ " . $key->ss_unit; ?></p>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <?php if (in_array($key->sm_autoid, $array)) { ?>
                                            <p id = "slide<?php echo $key->sm_autoid; ?>" class = "btn btn-success btn-lead"><a class="deleteitem" data-id="<?php echo $key->sm_autoid; ?>"  href="javascript:void(0);" class="hidden - sm">Remove cart<i class="icon-cancel"></i></a></p>
                                        <?php } else { ?>
                                            <p id = "slide<?php echo $key->sm_autoid; ?>" class = "btn btn-success btn-lead"><i class = "icon-basket"></i><a class = "additem" data-id = "<?php echo $key->sm_autoid; ?>" href = "javascript:void(0);" class = "hidden-sm">Add to cart</a></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        <?php } ?>
    </div>
</div>
<style>
    .detail > p{
        display:block;
        width:300px;
        text-overflow:ellipsis;
        overflow:hidden;
        max-height:150px;

        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
    }
    .detail > h4{
        display:block;
        width:328px;
        text-overflow:ellipsis;
        overflow:hidden;
        max-height:150px;

        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
    }
    .colone .coldetail div p:not(:first-child){
        height:71px !important;
    }
    /*    .chk1 .chk2 .chk3 .chk4 p:not(:first-child){
            margin-bottom: 0px !important;
        }*/

    .edit-input {
        display:none;
    }
    .control-group{
        font-size: 18px;
        margin: 10px;
    }
</style>
<script>
    $(document).ready(function () {
        $(document).on("click", '.add_all', function () {
            var i = 0;
            $('.btn-lead').each(function () {
                var check = $(this).find('.additem').attr('data-id');

                if (check == null) {
                    var id = $(this).find('.deleteitem').attr('data-id');
                } else {
                    var id = check;
                }

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
                            $("#slide" + id).append("<a class='deleteitem' data-id=" + id + "  href='javascript:void(0);' class='hidden - sm'>Remove cart<i class='icon-cancel'></i></a>");
                            $("#product" + id).empty();
                            $("#product" + id).append("<a class='deleteitem' data-id=" + id + "  href='javascript:void(0);' class='hidden - sm'>Remove cart<i class='icon-cancel'></i></a>");
                            $("#option").html(": ");
                            $("#amount").html(i);
                            $("#add-all").removeClass("add_all");
                            $("#add-all").removeClass("hvr-rectangle-in");
                            $("#add-all").addClass("hvr-rectangle-out");
                            $("#add-all").addClass("delete_all");
                            $("#add-all").html("Remove All");

                        }
                    }
                });
                i++;
            });

        });

        $(document).on("click", '.delete_all', function () {
            $('.btn-lead').each(function () {
                var check = $(this).find('.deleteitem').attr('data-id');
                if (check == null) {
                    var id = $(this).find('.deleteitem').attr('data-id');
                } else {
                    var id = check;
                }

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
                                $("#slide" + id).append("<i class='icon-basket'></i><a class='additem' data-id=" + id + "  href='javascript:void(0);' class='hidden - sm'>Add to cart</a>");
                                $("#option").empty();
                                $("#amount").empty();
                            } else {
                                $("#slide" + id).empty();
                                $("#slide" + id).append("<i class='icon-basket'></i><a class='additem' data-id=" + id + "  href='javascript:void(0);' class='hidden - sm'>Add to cart</a>");
                                $("#option").empty();
                                $("#amount").empty();
                            }
                        }
                        $("#add-all").removeClass("delete_all");
                        $("#add-all").addClass("add_all");
                        $("#add-all").html("Add All to Cart");
                        $("#add-all").addClass("hvr-rectangle-in");
                        $("#add-all").removeClass("hvr-rectangle-out");

                    }
                });
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
                        $("#slide" + id).append("<a class='deleteitem' data-id=" + id + "  href='javascript:void(0);' class='hidden - sm'>Remove cart<i class='icon-cancel'></i></a>");
                        $("#product" + id).empty();
                        $("#product" + id).append("<a class='deleteitem' data-id=" + id + "  href='javascript:void(0);' class='hidden - sm'>Remove cart<i class='icon-cancel'></i></a>");
                        $("#option").html(": ");
                        $("#amount").html(response);
                    }
                    check_auto_add();
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
                            $("#slide" + id).append("<i class='icon-basket'></i><a class='additem' data-id=" + id + "  href='javascript:void(0);' class='hidden - sm'>Add to cart</a>");
                            $("#option").empty();
                            $("#amount").empty();
                        } else {
                            $("#slide" + id).empty();
                            $("#slide" + id).append("<i class='icon-basket'></i><a class='additem' data-id=" + id + "  href='javascript:void(0);' class='hidden - sm'>Add to cart</a>");
                            $("#option").html(": ");
                            $("#amount").html(response);
                        }
                    }
                    $("#add-all").removeClass("delete_all");
                    $("#add-all").addClass("add_all");
                    $("#add-all").html("Add All to Cart");

                }
            });
        });
        $(document).on("click", '.addfavorites', function () {
            var id = $(this).attr('data-id');
            var id_category = $(this).attr('data-category');
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
                        //window.location.href = 
                    } else {
                        $("#favorites_heart" + id).empty();
                        $("#favorites_heart" + id).append("<a  class='deletefavorites' data-id=" + id + " data-category = " + id_category + " href='javascript:void(0);' class='hidden-sm' ><i class='icon-heart' ></i></a>");
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
            var id_category = $(this).attr('data-category');

            $.ajax({
                url: "<?php echo base_url("my_customer/delete_favorites_fromview_itemfovrites"); ?>",
                method: "post",
                datatype: "html",
                data: "id=" + id + "&id_category=" + id_category,
                cache: false,
                success: function (response) {
                    if (response == "fail") {
                        alert(response);
                    } else {
                        $("#favorites_heart" + id).empty();
                        $("#favorites_heart" + id).append("<a  class='addfavorites' data-id = " + id + " data-category = " + id_category + "  href='javascript:void(0);' class='hidden-sm'><i class='icon-heart'></i></a>");
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


        $('#confirm-delete').on('show.bs.modal', function (e) {
            //var test = $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            $('.debug-url').html('รายการโปรด: <strong>' + $(e.relatedTarget).data('href') + '</strong>');
        });
        $('a.edit').click(function () {
            var dad = $(this).parent().parent();
            dad.find('label').hide();
            dad.find('input[type="text"]').show().focus();
        });
        $('a.delete').click(function () {
            var id_cate = $(this).attr('data-id');
            $.ajax({
                url: "<?php echo base_url("my_customer/delete_category_favorites"); ?>",
                method: "post",
                datatype: "html",
                data: "&id_cate=" + id_cate,
                cache: false,
                success: function (response) {
                    if (response == 1) {
                        window.location.href = 'http://store.com/my_customer/show_favorites';
                    } else {
                        alert("Delete Fail");
                    }
                }
            });
        });
        var old_name = $("#name_category").val();
        $('input[type=text]').focusout(function () {
            var new_name = $(this).val();
            var id_cate = $(this).attr('data-id');
            if (new_name != old_name) {
                $.ajax({
                    url: "<?php echo base_url("my_customer/edit_category_favorites"); ?>",
                    method: "post",
                    datatype: "html",
                    data: "new_name=" + new_name + "&id_cate=" + id_cate,
                    cache: false,
                    success: function (response) {
                        if (response == 1) {
                            window.location.href = 'http://store.com/my_customer/favorites_category/' + new_name;
                        } else {
                            alert("Update Fail");
                        }
                    }
                });
            }
            var dad = $(this).parent();
            $(this).hide();
            dad.find('label').show();
        });

        div_grid();
        $('#list').click(function (event) {
            event.preventDefault();
            $('#products .item').addClass('list-group-item');
            $('#list').addClass('hover');
            $('#grid').removeClass('hover');
            $('.div-grid').removeClass('col-xs-12');
            $('.div-grid-row').removeClass('row');
            $('.div-grid-col').addClass('col-xs-4');
            $('.div-grid-col').removeClass('col-xs-12');
            $(".div-grid-col").attr("style", "padding-left: 0px;");

        });


        $('#grid').click(function (event) {
            event.preventDefault();
            $('#products .item').removeClass('list-group-item');
            $('#products .item').addClass('grid-group-item');
            $('#grid').addClass('hover');
            $('#list').removeClass('hover');
            $('.div-grid').addClass('col-xs-12');
            $('.div-grid-row').addClass('row');
            $('.div-grid-col').removeClass('col-xs-4');
            $('.div-grid-col').addClass('col-xs-12');
            $(".div-grid-col").attr("style", "padding-left: 15px;");
        });
    });
    function div_grid() {
        setTimeout(function () {
            $('#products .item').removeClass('list-group-item');
            $('#products .item').addClass('grid-group-item');
            $('#grid').addClass('hover');
            $('#list').removeClass('hover');
            $('.div-grid').addClass('col-xs-12');
            $('.div-grid-row').addClass('row');
            $('.div-grid-col').removeClass('col-xs-4');
            $('.div-grid-col').addClass('col-xs-12');
            $('#products').fadeIn('show');
        }, 250);

    }

    function check_auto() {
        $('.btn-lead').each(function () {
            var check = $(this).find('.additem').attr('data-id');

            if (check != null) {
                $("#add-all").removeClass("delete_all");
                $("#add-all").addClass("add_all");
                $("#add-all").html("Add All to Cart");
                return false;
            } else {
                $("#add-all").removeClass("add_all");
                $("#add-all").addClass("delete_all");
                $("#add-all").html("Remove All");
//                alert(check);
            }
        });
    }

    function check_auto_add() {
        $('.btn-lead').each(function () {
            var check = $(this).find('.deleteitem').attr('data-id');
            if (check == null) {
                $("#add-all").removeClass("delete_all");
                $("#add-all").addClass("add_all");
                $("#add-all").html("Add All to Cart");
                return false;
            } else {
                $("#add-all").removeClass("add_all");
                $("#add-all").addClass("delete_all");
                $("#add-all").html("Remove All");
                //
            }
        });
    }



</script>

<style>
    .item{
        margin-bottom: 20px !important;
    }
    .control-group > strong > a {
        color: #333;
        text-decoration:none;
    }
    .additem{
        color: white;
        text-decoration:none;

    }
    .deleteitem{
        color: white;
        text-decoration:none;
    }
    .additem:hover{
        color: white;
        text-decoration:none;
    }
    .deleteitem:hover {
        color: white;
        text-decoration:none;
    }
    .btn-lead:hover > .deleteitem > .icon-cancel{
        color: red;
    }/*
    a .icon-basket{
        color: white;
    }*/
    .image-container {
        position: relative;
        width: 100%;
        height: 252px;
    }
    .image-container .after {
        position: absolute;
        float: left;
        top: 0;
        left: 0;
        width: 15%;
        height: 10%;
        display: none;
        color: #333;
        display: block;
        background-color: whitesmoke;
        border-top:    none;
        border-right:  1px solid #e7e7e7;
        border-bottom: 1px solid #e7e7e7;
        border-left:   none;
        border-bottom-right-radius: 7px;
        z-index: 3;
    }
    .image-container > .after > .product_favorites {
        margin-top: 5px;
    }
    .image-container .after-bottom {
        position: absolute;

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
    .image-container > .after-bottom > small   {   
        padding: 5px;
    }
    .deletefavorites:hover{
        font-size: 18px; 
        color: #333;
    }
    .deletefavorites{
        color: red;
    }
    .addfavorites{
        color: #333;
    }
    .addfavorites:hover{
        font-size: 18px; 
        color: red;
    }

    .div-grid-col{
        text-align: center;
    }
    .hover {
        color: #333;
        background-color: #e6e6e6;
        border-color: #adadad;
    }
    .glyphicon { margin-right:5px; }
    .thumbnail
    {
        margin-bottom: 20px;
        padding: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        border-radius: 0px;
        height: 252px;
        /*width: 340px;*/

    }
    .test{
        margin-top: 150px;
    }

    .item.list-group-item
    {
        float: none;
        width: 100%;
        background-color: #fff;
        margin-bottom: 10px;
    }
    .item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
    {
        background: #428bca;
    }

    .item.list-group-item .list-group-image
    {
        /* margin-right: 10px;*/
        padding: 0px 5px 0px 5px

    }
    .item.list-group-item .thumbnail
    {
        margin-bottom: 0px;
    }
    .item.list-group-item .caption
    {
        height: 227px;
        padding: 0px;
    }
    .list-group-item-heading {
        margin-top: 25px;
    }
    .lead1 {
        font-size: 16px;
        font-weight: 100;
        line-height: 1.1;
        margin-bottom: 0px !important;
    }
    .btn-lead{
        color: white;
        margin-top: 0px;
    }
    .item.list-group-item  .row-button{
        height: 252px;
    }
    .item.list-group-item:nth-of-type(odd)
    {
        background: #eeeeee;
    }

    .item.list-group-item:before, .item.list-group-item:after
    {
        display: table;
        content: " ";
    }

    .item.list-group-item img
    {
        float: left;
    }
    .item.list-group-item:after
    {
        clear: both;
    }
    .list-group-item-text
    {
        margin: 0 0 11px;
    }

</style>


<?php $this->load->view('view_footerproduct'); ?>
