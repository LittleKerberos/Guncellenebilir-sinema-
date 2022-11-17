<?php 
session_start();
include '../netting/baglan.php';
$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail' => $_SESSION['kullanici_mail']
));
$say =$kullanicisor->rowCount();
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);



require_once "class.log.php";
$txt= $kullanicicek['kullanici_adsoyad'];
$log = new Log();
$log->add( $txt." ÇIKIŞ YAPTI");



session_destroy();
header("location:login.php?durum=exit");


 ?>