<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/admin/images/favicon.png">
    <link href="../assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/admin/css/style.css" rel="stylesheet">
    <link href="../assets/admin/css/colors/blue.css" id="theme" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?> assets/dt/datatables.min.css"/>
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
                        <span>
                            <img src="../assets/admin/images/logo-text.png" alt="homepage" width="150" height="90" />
                        </span>
                    </a>
                </div>
                
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> 
                        </li>
                        <li class="nav-item hidden-sm-down">
                            <form class="app-search p-l-20">
                                <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0" >
                        <li class="nav-item dropdown"> 
                        <?php foreach ($profil as $key) {?>
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?=base_url()?>assets/picture/<?=$key->img ?>" alt="user" class="profile-pic m-r-5"/><?=$key->nama ?></a> 
                            <?php } ?>
                        </li> 
                        </ul>

                    <ul class="navbar-nav my-lg-0">
                    </ul>
                </div>
            </nav>
        </header>   