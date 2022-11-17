<?php 
include 'admin/netting/baglan.php';
include 'admin/production/fonksiyon.php';

$ayarsor = $db->prepare("SELECT * FROM ayar WHERE ayar_id=?");
$ayarsor->execute(array(1));
$ayarcek = $ayarsor->fetch(pdo::FETCH_ASSOC);

$haksor = $db->prepare("SELECT * FROM hakkimizda WHERE  
hakkimizda_id=?");
$haksor->execute(array(1));
$hakcek =  $haksor->fetch(pdo::FETCH_ASSOC);

$menusor = $db->prepare("SELECT * FROM menu");
$menusor->execute();
$menucek = $menusor->fetch(pdo::FETCH_ASSOC);


$slider = $db->query("SELECT * FROM slider where slider_durum=1 and slider_sira !=1");
$slider->execute();


$slider1 = $db->query("SELECT * FROM slider where slider_durum=1 and slider_sira =1");
$slider1->execute();


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title><?php echo $ayarcek['ayar_title']; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/slick.css">
	<link rel="stylesheet" type="text/css" href="css/slick-theme.css"/> 
	<link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="description" content="<?php echo $ayarcek['ayar_icerik']; ?>">
	<meta name="keywords" content="<?php echo $ayarcek['ayar_anahtarkelime']; ?>">
	<meta name="author" content="<?php echo $ayarcek['ayar_yazar']; ?>">
</head>
<style type="text/css">  
  .text-color{
    color: <?php echo $ayarcek['ayar_renk2']; ?>;
  }
  .text-colorr{
   color:  <?php echo $ayarcek['ayar_renk4'] ;?>;
   font-size:   <?php echo $ayarcek['ayar_size'] ;?>;
   text-align: center;
  }
  .text-color-hak{
  color:  <?php echo $ayarcek['ayar_renk4'] ;?>;
  }
  .sticky-navbar{
height: 60px !important;
background: <?php echo $ayarcek['ayar_sticky'];?>;
}
.sticky-navbar .nav-logo span{
  color:#000 !important;
}
.sticky-navbar .nav-menu a{
  color: <?php echo $ayarcek['ayar_sticky'];?>; !important;
}
.sticky-navbar .nav-menu a:hover{
  color: #111 !important;
}
</style>
<body style="background-color:<?php echo $ayarcek['ayar_renk3']; ?>">
		<div class="mobile-menu">
			<div class="close-menu"><span>Kapat</span></div>
			<div class="overlay-menu">
				<?php 

				$menusor = $db->prepare("SELECT * FROM menu order by menu_sira asc");
				$menusor->execute();
				while ($menucek = $menusor->fetch(pdo::FETCH_ASSOC)) {
				?>
				<?php if ($menucek['menu_durum']==1): ?>
				<a href="<?php echo $menucek['menu_url']; ?>"><?php echo $menucek['menu_ad']; ?></a>
				<?php endif ?>

				<?php } ?>
			</div>
		</div><!-- .mobile-menu -->

	<!-- Home -->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  
  <?php 
  while ($vericek =  $slider1->fetch(PDO::FETCH_ASSOC) ) {  //bootsrapin active özelliğinin çalışması için sırası 1 olan resmi çektik ?>
    <div class="carousel-item active">
      <img style="width:80em; height:25em;" src="<?php echo $vericek['slider_resim'] ?>" class="d-block w-100" alt="..." style="height: 80px;">
    </div>  
    <?php } ?>

    <?php while ($vericek =  $slider->fetch(PDO::FETCH_ASSOC) ) { //sırası 1 olmayanları çektik ?>
    <div class="carousel-item  " style="width:100em; height:25em;">
      <img src="<?php echo $vericek['slider_resim'] ?>" class="d-block w-100" alt="..." style="height: 440px;">
    </div>
    <?php } ?>
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<section class="home container-fluid" id="home">
	<div class="navbar-wrap">
		<div class="open-menu">
      <i class="fas fa-bars"></i>
    </div>
		<img style="width: 120px; height:58px; margin-left:5px; margin-top:1px;" src="<?php echo $ayarcek['ayar_logo']?>"  alt="Web Sitesi Logosu">
		<div style="background: url(<?php echo $ayarcek['ayar_logo'] ?>) no-repeat;" class="nav-logo logo-w"></div>
			<nav class="nav-menu" class="sticky-navbar">
				<?php 

				$menusor = $db->prepare("SELECT * FROM menu order by menu_sira asc");
				$menusor->execute();
				while ($menucek = $menusor->fetch(pdo::FETCH_ASSOC)) {
				?><?php if ($menucek['menu_durum']==1): ?>
				<a href="<?php echo $menucek['menu_url']; ?>"><?php echo $menucek['menu_ad']; ?></a>
				<?php endif ?>

				<?php } ?>
			</nav><!-- .nav-menu -->
	</div><!-- .navbar-wrap -->
   <div class="carousel-caption d-none d-md-block" style="margin-bottom: 100px;">
    <h2>OOMB CINEMA GROUP</h2>
    <p>OOBM Cinema Group; 2001 yılında teknoloji ve konforu, beklentilerin üzerinde hizmet anlayışı ile birleştirerek, Türkiye’de farklı ve kendine özgü bir sinema deneyimi yaratma felsefesiyle kurulmuştur.</p>
  </div>
	<div class="home-content">

	</div><!-- .home-content -->	
</section><!-- #home -->
	<!-- Classes -->
<section class="classes container-fluid text-colorr" id="films" style="background-color: <?php echo $ayarcek['ayar_renk3']; ?>; font-family: <?php echo $ayarcek['ayar_font'];?>;">
  <div class="container" >
    <div class="row">
      <div class="classes-text col-11 col-lg-8">
       <h2 class="text-colorr" style="font-size: 32px;">OOMB | MAXİMUM</h2>
      <hr style="background: black;">
      <h2 class="text-colorr" style="font-size:28px;">Filmler</h2>
      </div>
    </div><!-- classes row1 -->
    <div class="container">
      <h1 class="my-4">Cinemaximum
      </h1>
      <hr>
      <div class="row">
        <div class="col-lg-12">
          <h2 class="my-4">Vizyondaki Filmler</h2>
        </div>
        <?php 
        $websor = $db->prepare("SELECT * from filmler");
        $websor->execute();
        while ($cek = $websor->fetch(PDO::FETCH_ASSOC)) { ?>      
        <div id="film" class="col-lg-4 col-sm-6 text-center mb-4">
          <img class="img-fluid d-block mx-auto" src="<?php echo $cek['film_resim'] ?>" alt=""><br>
          <h3><?php echo $cek['film_ad'] ?>
          <br>
            </h3>
          <p> <?php echo $cek['film_tür'] ?></p>         
        </div>
        <?php
    }
      ?>
      </div>
    </div>
</section><!-- #classes -->
<br id="features">
<section class="pt-5">  
  <div style="margin-left:10px; font-size: 14px; font-family: sans-serif;" class="text-color-hak">
    <h4 style="font-family: monospace;  font-size:28px;" class="text-color-hak">HAKKIMIZDA </h4>  
    <hr style="background:whitesmoke;">       
    <?php 
      $haksor = $db->prepare("SELECT * FROM hakkimizda order by hakkimizda_sıra asc");
      $haksor->execute();
      while ($hakcek = $haksor->fetch(pdo::FETCH_ASSOC)) {
    ?>
    <?php if ($hakcek['hakkimizda_durum']==1): ?><br>
    <a style="width: 100%; "><?php echo $hakcek['hakkimizda_icerik']; ?></a> <br>
    <?php endif ?>
    <?php } ?>
  </div>
</section>     
<br>
<!-- Footer -->
<footer class="text-center text-white" id="contact" style="background-color: <?php echo $ayarcek['ayar_renk']; ?>;">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="<?php echo $ayarcek['ayar_facebook']; ?>" target="_blank" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="<?php echo $ayarcek['ayar_twitter']; ?>"target="_blank" role="button"
        ><i class="fab fa-twitter"></i
      ></a>
      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="<?php echo $ayarcek['ayar_instagram']; ?>" target="_blank" role="button"
        ><i class="fab fa-instagram"></i
      ></a>
      <!--Pinterest--->
       <a class="btn btn-outline-light btn-floating m-1" href="<?php echo $ayarcek['ayar_pinterest']; ?>" target="_blank" role="button"
        ><i class="fab fa-youtube"></i
      ></a>
      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="<?php echo $ayarcek['ayar_facebook']; ?>"target="_blank" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="<?php echo $ayarcek['ayar_github']; ?> "target="_blank" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>

    
   <section class="">
      <form action="">
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-auto">
            <p class="pt-2" class="text-color">
              <strong class="text-color">Sitemize Kaydolun</strong>
            </p>
          </div>
          <div class="col-md-5 col-12">
            <div class="form-outline form-white mb-4">
              <input style="border: 1px solid black; border-radius: 5px;" type="email" id="form5Example21" class="form-control" />
              <br>
              <label class="text-color" class="form-label" for="form5Example21" >Email adresiniz </label>
            </div>
          </div>
          <div class="col-auto">
            <!-- Submit button -->
            <button type="submit" class="btn btn-outline-light mb-4 text-color" >
            Kayıt Ol
            </button>
          </div>
        </div>
      </form>
    </section>
        <section class="mb-4">
      <p class="text-color">
      OOBM Cinema Group; 2001 yılında teknoloji ve konforu, beklentilerin üzerinde hizmet anlayışı ile birleştirerek, Türkiye’de farklı ve kendine özgü bir sinema deneyimi yaratma felsefesiyle kurulmuştur.
      </p>
      <br>
    </section>
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-color">Vizyonda</a>
            </li>
            <li>
              <a href="#!" class="text-color">Yakında</a>
            </li>
            <li>
              <a href="#!" class="text-color">Sinemalar</a>
            </li>
            <li>
              <a href="#!" class="text-color">Kampanyalar</a>
            </li>
            <li>
              <a href="#!" class="text-color">Özel Etkinlik Talepleri</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-color">İnsan Kaynakları</a>
            </li>
            <li>
              <a href="#!" class="text-color">Sıkça Sorulan Sorular</a>
            </li>
            <li>
              <a href="#!" class="text-color">İşlem Rehberi</a>
            </li>
            <li>
              <a href="#!" class="text-color">Hakkımızda</a>
            </li>
            <li>
              <a href="#!" class="text-color">Yorum ve Öneriler</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <ul class="list-unstyled mb-0">
            <li>
              <a href="https://www.cinemaximum.com.tr/kisisel-verilerin-korunmasi-hakkinda-aydinlatma-bildirimi" target="_black" class="text-color">KVK Aydınlatma Bildirimi</a>
            </li>
            <li>
              <a href="#!" class="text-color">Kamera Sistemleri Bildirimi</a>
            </li>
            <li>
              <a href="#!" class="text-color">KVKK Basvuru Formu</a>
            </li>
            <li>
              <a href="#!" class="text-color">KVK Politikasi</a>
            </li>
            <li>
              <a href="#!" class="text-color">İletişim</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <ul class="list-unstyled mb-0">
            <li>
              <a href="" class="text-color"> Gizlilik </a>
              <a href="#!" class="text-color">  Kullanım Koşulları</a>
            </li>
            <li>
              <a href="#!" class="text-color">Mesafeli Bilet Satış Sözleşmesi</a>
            </li> <br>
            <li>
              <a href="#!" class="text-color">E-posta adresimiz: oobmmediailetisim@oobm.com</a>
            </li>
            <li>
              <p class="text-color">© Copyright 2022</p>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>
   <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2); color:<?php echo $ayarcek['ayar_renk2']; ?>;">
    © 2022 Copyright:
    <a class="text-color" href="https://mdbootstrap.com/">OOBM</a>
  </div>
</footer>
<!-- Footer -->
<script src="js/jquery-3.1.1.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>
    <script>
        lightGallery(document.getElementById('lightgallery'));
    </script>
<script src="js/custom.js"></script>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>