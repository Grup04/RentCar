<!DOCTYPE html>
<html class="no-js">
<head>
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
          <li class="active"><a href="home_2">Home</a></li>
          <li><a href="#section-about">About Drivers</a></li>
          <li><a href="#section-about_car">About Cars</a></li>
          <li><a href="#section-order">Get Order</a></li>
          <li><a href="#section-car">Rent Car</a></li>
          <li><a href="<?=site_url('home_2/pembayaran')?>">Notifikasi</a></li>
          <li><a href="<?=site_url('admin/tampil_user1')?>">Edit Profile</a></li>
          <li><a href="#section-contact">Contact</a></li>
          <li><a href="<?=site_url('user/logout')?>">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>

  <section class="featured">
    <div class="container">
      <div class="row mar-bot40">
        <div class="col-md-6 col-md-offset-3">
          <div class="align-center">
            <!-- <i class="fa fa-flask fa-5x mar-bot20"></i> -->
            <img src="assets/admin/images/logo-text.png" alt="homepage" width="500" height="250" />
            <?php foreach ($nama as $key ) {?>
            <h2 class="slogan">Welcome to <?=$key->nama; ?></h2>
            <?php } ?>
            <p>GROUP 4</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- spacer section:testimonial -->
  <section id="testimonials" class="section" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="align-center">
            <div class="testimonial pad-top40 pad-bot40 clearfix">
              <h5>
                INI WEBSITE RENTAL MOBIL
              </h5>
              <br/>
              <!-- <span class="author">&mdash; MIKE DOE <a href="#">www.siteurl.com</a></span> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- about -->
  <section id="section-about" class="section appear clearfix">
    <div class="container">
      <div class="row mar-bot40">
        <div class="col-md-offset-3 col-md-6">
          <div class="section-header">
            <h2 class="section-heading animated" data-animation="bounceInUp">DRIVER</h2>
            <p>Choose your drive</p>
          </div>
        </div>
      </div>
      <!-- batas gambar -->
      <div class="row align-center mar-bot40">
        <?php foreach ($tampil as $key){ ?>
        <div class="col-md-3">
          <div class="team-member">
            <figure class="member-photo"><img src="<?=base_url()?>/assets/picture/<?php echo $key->foto;?>" width="150" height="150" alt="" /></figure>
            <div class="team-detail">
              <h4><?php echo $key-> username; ?></h4>
              <span><?php echo $key-> umur; ?> th </span>
            </div>
          </div>
        </div>
        <?php  } ?>
      </div>
    </div>
  </section>

  <!-- spacer section:stats -->
  <section id="parallax1" class="section pad-top40 pad-bot40" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="align-center pad-top40 pad-bot40">
        <blockquote class="bigquote color-white">Menu Harga</blockquote>
        <blockquote class="bigquote color-white">Harga Mulai</blockquote>

        <p class="color-white">1 hari = 250k</p>
        <p class="color-white">2 hari = 400k</p>
        <p class="color-white">3 hari = 600k</p>
      </div>
    </div>
  </section>

  <!-- section cars -->
  <section id="section-about_car" class="section appear clearfix">
    <div class="container">

      <div class="row mar-bot40">
        <div class="col-md-offset-3 col-md-6">
          <div class="section-header">
            <h2 class="section-heading animated" data-animation="bounceInUp">Car</h2>
            <p>Choose your car</p>
          </div>
        </div>
      </div>

      <div class="row">
        <nav id="filter" class="col-md-12 text-center">
          <ul>
            <li><a href="#" class="current btn-theme btn-small" data-filter="*">Van</a></li>
            <li><a href="#" class="btn-theme btn-small" data-filter="*">Mini Bus</a></li>
            <li><a href="#" class="btn-theme btn-small" data-filter="*">Elf</a></li>
            <li><a href="#" class="btn-theme btn-small" data-filter="*">Sedan</a></li>
          </ul>
        </nav>
        
        <div class="col-md-12">
          <div class="row">
            <div class="portfolio-items isotopeWrapper clearfix" id="3">

              <!-- Batas gambar -->
              <?php foreach ($tampil_mobil as $key){ ?>
              <article class="col-md-4 isotopeItem webdesign">
                <div class="portfolio-item">
                  <img src="<?=base_url()?>/assets/picture/<?php echo $key->img;?>"  alt="" />
                  <div class="portfolio-desc align-center">
                    <div class="folio-info">
                      <h5><a href="#"><?php echo $key-> merk; ?></a></h5>
                      <h5><a href="#"><?php echo $key-> cat_mobil; ?></a></h5>
                      <a href="<?=base_url()?>/assets/picture/<?php echo $key->img;?>" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
                    </div>
                  </div>
                </div>
              </article>
              <?php  } ?>   
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<section id="section-order" class="section appear clearfix">
    <div class="container">
      <div class="row mar-bot40">
        <div class="col-md-offset-3 col-md-6">
          <div class="section-header">
            <h2 class="section-heading animated" data-animation="bounceInUp">Get Order</h2>
            <p>Order your trip</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="cform" id="contact-form">
            <div id="sendmessage">
              Your Order has been sent. Thank you!
            </div>
            <div id="errormessage"></div>

            <form action="<?=site_url('home_2/pemesanan')?>" method="post" role="form" class="contactForm">

              <div class="form-group">
                <label>Mobil</label>
                <select name="id_mobil" id="" class="form-control" required="required" >
                  <?php foreach ($mobil as $key) {?>
                  <option value="<?=$key->id_mobil;?>"><?=$key->merk;?> <?=$key->warna_mobil;?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Driver</label>
                <select name="id_driver" id="" class="form-control" required="required" >
                  <?php foreach ($driver as $key) {?>
                  <option value="<?=$key->id_driver;?>"><?=$key->username;?></option>
                  <?php } ?>
                </select> 
              </div>
              <div class="form-group">
                <label>Lama Peminjaman</label>
                <input type="number" name="day" id="input" class="form-control" placeholder="Day" required="required">
              </div>
              <input type="submit" value="ORDER">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="section-car" class="section appear clearfix">
    <div class="container">
      <div class="row mar-bot40">
        <div class="col-md-offset-3 col-md-6">
          <div class="section-header">
            <h2 class="section-heading animated" data-animation="bounceInUp">Go To Rent Your Car</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="cform" id="contact-form">
            <div id="sendmessage">
              Your car has been sent. Thank you!
            </div>
            <div id="errormessage"></div>
            <form action="<?=site_url('home_2/penyewaan')?>" method="post" role="form" class="contactForm" enctype="multipart/form-data">

              <div class="form-group">
                <label>No Polisi</label>
                <input type="text" name="no_polisi" id="input" class="form-control" placeholder="" required="required">
              </div>

              <div class="form-group">
                <label>Merk</label>
                <input type="text" name="merk" id="input" class="form-control" placeholder="" required="required">
              </div>

              <div class="form-group">
                <label>Category</label>
                  <select name="id_cat" class="form-control">
                      <option value="">Pilih Jenis Mobil</option>
                      <?php foreach ($categories as $key) {?>
                      <option value="<?=$key->id_cat;?>"><?=$key->cat_mobil;?></option>
                      <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                <label>Warna Mobil</label>
                <input type="text" name="warna_mobil" id="input" class="form-control" placeholder="" required="required">
              </div>

              <div class="form-group">
                <label>Tahun Mobil</label>
                <input type="text" name="tahun_mobil" id="input" class="form-control" placeholder="" required="required">
              </div>

              <div class="form-group">
                <label>Bahan Bakar</label>
                <input type="text" name="bahan_bakar" id="input" class="form-control" placeholder="" required="required">
              </div>

              <div class="form-group">
                <label>Harga Per Hari</label>
                <input type="text" name="price" id="input" class="form-control" placeholder="" required="required">
              </div>

              <div class="form-group">
                <label>Gambar</label>
                <td><input type="file" name="input_gambar"></td>
              </div>

              <input type="submit" value="Rent">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- contact -->
  <section id="section-contact" class="section appear clearfix">
    <div class="container">
      <div class="row mar-bot40">
        <div class="col-md-offset-3 col-md-6">
          <div class="section-header">
            <h2 class="section-heading animated" data-animation="bounceInUp">Contact us</h2>
            <p align="left">Company : Kuy!RentCar</p>
            <p align="left">Alamat : Malang</p>
            <p align="left">Email : RentcarMalang@gmail.com</p>
            <p align="left">WA : 087864866013</p>
            <p align="left">Customer Service : 08123768816</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- pagination -->
  <center>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </nav>
  </center>

  <?php        
  // $links ini berasal dari fungsi pagination        
  // Jika $links ada (data melebihi jumlah max per page), maka tampilkan        
  if (isset($links)) {            
    echo $links;        
  }        
  ?>            
</main>
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