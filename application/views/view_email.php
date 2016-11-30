<html>
    <head>
        <meta charset="UTF-8">
        <?php $this->load->view("bootstrap_and_js.php"); ?>
        <title>Email</title>
    </head>
    <?php
    //print_r($data);
    foreach ($data as $key) {
        ?>
        <body>
            <div style="margin:0;padding:0;width:100%;background-color:#ffffff;color:#2f2f2f">
                <table width="100%" border="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td align="center" valign="middle" bgcolor="#FFFFFF" style="padding:20px">
                                <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:Helvetica,Arial,sans-serif;font-size:16px;line-height:25px">
                                    <tbody>
                                        <tr>
                                            <td align="center" valign="middle" bgcolor="#232323">
                                                <table width="90%" height="40" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:Helvetica,Arial,sans-serif;font-size:10px;line-height:12px">
                                                    <tbody>
                                                        <tr>
                                                            <td width="200" align="left" valign="middle" bgcolor="#232323" style="vertical-align:middle"><h2 style="color:white;" >Form : Store</h2></td>       
                                                            <td width="4" height="40" valign="middle" bgcolor="#232323" style="vertical-align:middle">&nbsp;</td>
                                                            <td valign="middle" bgcolor="#232323">&nbsp;&nbsp;&nbsp;</td>
                                                            <td width="4" height="40" valign="middle" bgcolor="#232323">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" bgcolor="#232323" style="height:15px;font-size:15px;line-height:15px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="45" align="center" bgcolor="#F1F1F1" style="font-size:45px;line-height:45px">&nbsp;</td>
                                        </tr>
                                        <tr><td align="center" bgcolor="#F1F1F1">
                                                <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td bgcolor="#F1F1F1" style="font-family:Helvetica,Arial,sans-serif;color:#128deb;text-align:center">                                                              
                                                                <h1 style="margin:0;font-size:34px;line-height:34px;font-weight:normal;color:inherit"><span style="color:#000000">Forgot Password</span>&nbsp;?</h1>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="30" align="left" bgcolor="#F1F1F1" style="font-size:15px;line-height:15px">&nbsp;
                                                <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td bgcolor="#F1F1F1" style="font-family:Helvetica,Arial,sans-serif;color:#128deb;text-align:left">    
                                                                <p><span style="color:#000000">
                                                                        Hi <?php echo $key->temp_email; ?>,<br><br>

                                                                        Somebody recently asked to reset your Store password.<br><br>
                                                                        <?php echo $key->temp_date; ?></span>&nbsp;</p><br>
                                                                *After clicking the link, you have 30 minutes to reset new password.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="600px" bgcolor="#F1F1F1">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="15px">&nbsp;</td>
                                                            <td width="570px">
                                                                <table style="width:570px;margin:0px auto;padding:0px;background-color:#fff">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td height="5px">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="border-radius:3px;vertical-align:middle;text-align:center" align="center" valign="middle" nowrap="" bgcolor="#FF0046" width="100" height="50"><a href="<?php echo base_url("admin/activate?token=$key->temp_token"); ?>">Click here to change your password.</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="5px">&nbsp;</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="30" align="center" style="font-family:Helvetica,Arial,sans-serif;color:#aaaaaa;font-size:12px;line-height:16px">
                                                <p style="margin-top:0;margin-bottom:3px">
                                                    This message was sent to <?php echo $key->temp_email; ?> at your request.<br>  
                                                    @ 2016 Store. Store Co.,Ltd. - Moo.5  </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </body>
</html>