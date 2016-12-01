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
  <!-- CONTENT -->
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.validate.min.js"); ?>"></script> 
<link rel="stylesheet" href="<?php echo base_url("assets/fontello/css/animation.css"); ?>"> 

<!-- END CONTENT -->
        <title>Store</title>
    </head>
    <body>
        <?php $this->load->view("header") ?>
        <?php $this->load->view("content") ?>

    </body>
</html>
