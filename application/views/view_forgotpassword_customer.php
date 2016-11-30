<br>
<div class="container">
    <div class="col-md-4 col-md-offset-1 " style="margin-left: 4.333333%;" >
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="text-center">
                    <h3><i class="fa fa-lock fa-4x"></i></h3>
                    <h2 class="text-center">Forgot Password?</h2>
                    <p>You can reset your password here.</p>
                    <div class="panel-body">

                        <form id="frm-forgotpassword" class="form">
                            <fieldset>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

                                        <input id="emailInput" name="emailInput" placeholder="email address" class="form-control" type="email"  required="">
                                        <input type="hidden" name="token" id="token" value="<?php echo session_id(); ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit">
                                </div>
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<script>

    $(document).ready(function () {
        $('#frm-forgotpassword').on("submit", function () {
            $.ajax({
                url: "<?php echo base_url("my_customer/forgotpassword_customer"); ?>",
                method: "POST",
                datatype: "html",
                data: $("#frm-forgotpassword").serialize(),
                cache: false,
                success: function (response) {
                    alert(response);
                    return false;
                }
            });
            return false;
        });

    });
</script>

