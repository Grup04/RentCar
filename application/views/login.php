<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/admin/images/favicon.png">
    <link href="../assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/admin/css/style.css" rel="stylesheet">
    <link href="../assets/admin/css/colors/blue.css" id="theme" rel="stylesheet">
    <style>
        .p {
            margin-left: 500px;
        }
    </style>
</head>
<body>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('user/login', array('class' => 'needs-validation', 'novalidate' => '')); ?>
<!-- <?php echo form_open('user/login'); ?> -->

<br>
<center>
    <div class="row p">
        <div class="col-md-4 col-md-offset-4">
            <!-- <h1 class="text-center"><?php echo $page_title; ?></h1> -->
            <p>^^ FORM LOGIN RENTCAR ^^</p>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Input Username" required autofocus> 
            </div>
            <br>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Input Password" required> 
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <br>
            <p>
            Create New Account!
            <a href="<?php echo site_url().'User/register/' ?>">New Account</a>
        </p>
    </div>
</center>
<?php echo form_close(); ?>

<script src="../assets/admin/plugins/jquery/jquery.min.js"></script>
<script src="../assets/admin/plugins/bootstrap/js/tether.min.js"></script>
<script src="../assets/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/admin/js/jquery.slimscroll.js"></script>
<script src="../assets/admin/js/waves.js"></script>
<script src="../assets/admin/js/sidebarmenu.js"></script>
<script src="../assets/admin/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="../assets/admin/js/custom.min.js"></script>
<script src="../assets/admin/plugins/flot/jquery.flot.js"></script>
<script src="../assets/admin/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="../assets/admin/js/flot-data.js"></script>
<script src="../assets/admin/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>