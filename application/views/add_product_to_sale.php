
<?php $day = date("d-m-Y"); ?>

    <div class="picking-product"  style="width: 500px;height: 600px;">
        <label class="usr"><?php echo $day; ?></label>
        <div class="header-picking">
            <center><h5>เพิ่มสินค้าลงเว็บ</h5></center>
            <form id="select-picking" method="post">
               <center> 
               <select name="productname" class="select-picking">
                    <option value="0">Select Product</option>
                    <?php
                    foreach ($proname as $key) {
                        $name = $key->sm_productname;
                        $id = $key->sm_autoid;
                        ?>
                        <option value="<?=$id;?>"><?=$name; ?></option>
                    <?php } ?>

                </select>
</center>
            </form>
        </div>
<hr>
        <div class="content-picking">

        </div>

    </div>
<script>
    $(document).ready(function () {
        $("#select-picking").on("change", function () {
            var id = $('#select-picking :selected').val();
            $.ajax({
                url: "<?php echo base_url("admin/select_to_sale");?>",
                method: "POST",
                data: "id=" + id,
                success: function (response) {
                    if (!response == "") {
                        $(".content-picking").empty();
                        $(".content-picking").append(response);
                    } else {
                        $(".content-picking").empty();
                    }
                }
            });
        });

    });
</script>
<style type="text/css">
    .select-picking{border-radius: 3px;border:1px solid #ddd;font-size: 12px;padding: 5px;width: 200px}
</style>
