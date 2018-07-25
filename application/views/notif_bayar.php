<!DOCTYPE html>
<html class="no-js">
<head>
  <!-- BASICS -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>RentCar</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="assets/text/css" href="<?php echo base_url()?>assets/css/isotope.css" media="screen" />
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/admin/images/favicon.png">
  
  <link rel="stylesheet" href="<?php echo base_url()?>assets/js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-theme.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
  <!-- skin -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/skin/default.css">
</head>

<body>
<section id="header" class="appear"></section>
  <div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);" data-300="line-height:60px; height:60px; background-color:rgba(0,0,0,1);">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="fa fa-bars color-white"></span>
        </button>
        <h1><a class="navbar-brand" href="index.html" data-0="line-height:90px;" data-300="line-height:50px;">      RentCar
        </a></h1>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
          <li class="active"><a href="<?=site_url('home_2/pembayaran')?>">Home</a></li>
        </ul>
      </div>
    </div>
  </div>
 <div class="row">

<section id="section-order" class="section appear clearfix">
    <div class="container">

      <div class="row mar-bot40">
        <div class="col-md-offset-3 col-md-6">
          <div class="section-header">
            
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="cform" id="contact-form">
            <div id="sendmessage">
              Your message has been sent. Thank you!
            </div>
            <div id="errormessage"></div>
            <div class="row">
            <form action="<?=site_url('home_2/pembayaran_doadd')?>" method="post" role="form" class="contactForm" enctype="multipart/form-data">
            <?php foreach ($order as $key) {?>
              <input type="hidden" name="id_order" class="form-control" value="<?=$key->id_order ;?>" size="5" readonly>
            <?php } ?>
              <div class="form-group">
                <label for="">Bukti Pembayaran</label>
                <input type="file" name="foto_bukti" size="100"/>

              </div>
              <input type="submit" value="Bayar">

          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
                   

 <section id="footer" class="section footer">
  <div class="container">
    <div class="row animated opacity mar-bot20" data-andown="fadeIn" data-animation="animation">
      <div class="col-sm-12 align-center">
        <ul class="social-network social-circle">
          <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
          <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
    </div>

    <div class="row align-center copyright">
      <div class="col-sm-12">
        <p>Copyright &copy; RentCar</p>
        <div class="credits">
          <!-- <a href="https://bootstrapmade.com/">Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
        </div>
      </div>
    </div>
  </div>
</section>

<a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>
<script src="<?php echo base_url()?>assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.isotope.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url()?>assets/js/fancybox/jquery.fancybox.pack.js"></script>
<script src="<?php echo base_url()?>assets/js/skrollr.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.scrollTo.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.localScroll.js"></script>
<script src="<?php echo base_url()?>assets/js/stellar.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.appear.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
<script src="<?php echo base_url()?>assets/js/main.js"></script>
<script src="<?php echo base_url()?>contactform/contactform.js"></script>

</body>
</html>