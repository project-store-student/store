<?php $this->load->view("bootstrap_and_js.php"); ?>

<div class="container" style="width: 450px;">
    <h2>Checkboxes</h2>
    <fieldset>
        <?php foreach ($check_c_f as $key) { ?>
            <div class="checkbox checkbox-primary">
                <input id="checkbox[]" name="checkbox[]" type="checkbox" checked="">
                <label for="checkbox2"><?php echo $key->caf_name; ?></label>
            </div>
        <?php } ?>
    </fieldset>
</div>


