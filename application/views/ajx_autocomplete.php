<ui class="show-data-search">
    <?php
    if (count($data) != 0) {
        ?>
            <li class="head-autocomplete">สินค้า</li>
<li class="divider"></li>

        <?php
        foreach ($data as $value) {
            $id = $value->sm_autoid;
            ?>
            <li class="li-hover">
                <a class="a" data-id="<?= $id ?>" href="#"><?php echo $value->sm_productname; ?></a>
            </li>

            <?php
        }
    } else {
        ?>
      
        <?php }
        ?>
</ui>
<script>
    $("a").on('click', function () {
        var id = $(this).attr("data-id");
        $.ajax({
            url: "<?php echo base_url("admin/one_product"); ?>",
            method: "POST",
            data: "id=" + id,
            success: function (response) {
                $(".content").empty().append(response);
        $(".search-overlay").hide();
         $("#auto").empty();
         $(".dropdown-show").css("height","0px");
         $('#Search div').hide();
                    $('#Search .icon-cancel').hide();
                    $('#Search').css('width', "auto");

            }
        });
    });
</script>
