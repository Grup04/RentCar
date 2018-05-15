<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/admin/images/favicon.png">
    <title>RentCar Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/admin/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../assets/admin/css/colors/blue.css" id="theme" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <b>
                            <img src="../assets/admin//images/logo-icon.png" alt="homepage" class="dark-logo" />
                            
                        </b>
                        <span>
                            <img src="../assets/admin/images/logo-text.png" alt="homepage" class="dark-logo" />
                        </span>
                    </a>
                </div>
                
              <!--   <div class="navbar-collapse"> -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item hidden-sm-down">
                            <form class="app-search p-l-20">
                                <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a>
                            </form>
                        </li>
                    </ul>

                    <ul class="navbar-nav my-lg-0">
                       <!--  <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/admin/images/users/1.jpg" alt="user" class="profile-pic m-r-5" />Markarn Doe</a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a href="../admin" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="../admin/tampil_admin" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Admin</a>
                        </li>
                        <li>
                            <a href="../admin/tampil_user" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Users</a>
                        </li>
                        <li>
                            <a href="tampil_car" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Cars</a>
                        </li>
                        <li>
                            <a href="tampil_driver" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Drivers</a>
                        </li>
                         <li>
                            <a href="tampil_order" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Data Order</a>
                        </li>
                        <li>
                            <a href="<?=site_url('login/logout');?>" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Logout</a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
<div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">User Table</h4>
                                <h6 class="card-subtitle">Add User<code>.table</code></h6>
                                <div class="table-responsive">
                                    <div class="alert-warning"><?php echo (isset($message))? : "";?></div>
<!-- <?php //echo form_open('admin/tambah_user', array('enctype'=>'multipart/form-data')); ?> -->
    <?php echo validation_errors(); ?>
<?php echo form_open_multipart ('admin/tambah_admin', array('class' => 'needs-validation', 'novalidate' => '') ); ?>
    <table border="0px">
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="input_username" value="<?php echo set_value('input_username'); ?>"required>
                <div class="invalid-feedback">isi username </div></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="input_alamat" value="<?php echo set_value('input_alamat'); ?>"required>
                <div class="invalid-feedback">isi username </div></td>
            </tr>
            <tr>
                <td>No_Telp</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="input_no_telp" value="<?php echo set_value('input_no_telp'); ?>"required>
                <div class="invalid-feedback">isi username </div></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="input_email" value="<?php echo set_value('input_email'); ?>"required>
                <div class="invalid-feedback">isi username </div></td>
            </tr>
            <tr>
                <td>Birth</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="input_birth" value="<?php echo set_value('input_birth'); ?>"required>
                <div class="invalid-feedback">isi username </div></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td><br>
                <td><input type="text" class="form-control" name="input_password" value="<?php echo set_value('input_password'); ?>"required>
                <div class="invalid-feedback">isi username </div></td>
            </tr>
            <tr>
                <td>Image</td>
                <td>:</td>
                <td><input type="file" name="input_gambar"></td>
            </tr>
            <td colspan="3" align="center">
                <input type="submit" name="simpan" value="Add" id="submitBtn">
                <input type="reset" name="reset" value="Cancel">
            </td>
        </table>
        </font>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            <footer class="footer text-center">
                © 2018 RentCar by Group4
            </footer>
        </div>
    </div>
   
    <script src="../assets/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/admin/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/admin/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../assets/admin/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../assets/admin/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/admin/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../assets/admin/js/custom.min.js"></script>
    <!-- Flot Charts JavaScript -->
    <script src="../assets/admin/plugins/flot/jquery.flot.js"></script>
    <script src="../assets/admin/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../assets/admin/js/flot-data.js"></script>
    <script src="../assets/admin/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <!-- js2 dan css2 buat validation boostrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css2/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css2/custom.css">

    <script src="<?php echo base_url() ?>assets/js2/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js2/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="<?php echo base_url() ?>assets/js2/holder.min.js"></script>

    <!-- Custom -->
    <script src="<?php echo base_url() ?>assets/js2/custom.js"></script>
</body>
</html>