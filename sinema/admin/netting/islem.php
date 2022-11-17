<?php 
ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';

if (isset($_POST['admingiris'])) 
{
$kullanici_mail = $_POST['kullanici_mail'];
$kullanici_password = $_POST['kullanici_password'];
$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
$kullanicisor->execute(array(
	'mail' => $kullanici_mail,
	'password' => $kullanici_password,
	'yetki' => 5
	
	));
	echo $say = $kullanicisor->rowCount();	
	if ($say==1) 
	{
		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("location: ../production/index.php");
		exit;
	}
	else
	{
		header("location: ../production/login.php?durum=no");
		exit;
	}
}

if (isset($_POST['menuduzenlekaydet'])) 
{
	$menu_id=$_POST['menu_id'];
	$ayarkaydet=$db->prepare("UPDATE menu SET
		menu_ad=:ad,
		menu_detay=:detay,
		menu_url=:url,
		menu_sira=:sira,
		menu_durum=:durum
		WHERE menu_id={$_POST['menu_id']}");

	$update=$ayarkaydet->execute(array(
		'ad' => $_POST['menu_ad'],
		'detay' => $_POST['menu_detay'],
		'url' => $_POST['menu_url'],
		'sira' => $_POST['menu_sira'],
		'durum' => $_POST['menu_durum']
		));
	
	if ($update) 
	{
		header("Location:../production/menu.php?menu_id=$menu_id&durum=ok");
	}
	else
	{
		header("Location:../production/menu.php?menu_id=$menu_id&durum=no");
	}
}

if (isset($_POST['maktif'])) {

		$menu_id=(int)$_POST["menu_id"];
		$pasifyap=$db->prepare("UPDATE menu SET
		menu_durum=:durum
		WHERE menu_id=$menu_id");

		$update=$pasifyap->execute(array(
		'durum' => 0
	));
	if ($update) 
	{
		header("Location:../production/menu.php?menu_id=$menu_id&durum=ok");
	}
	else
	{
		header("Location:../production/menu.php?menu_id=$menu_id&durum=no");
	}
	
}
if (isset($_POST['mpasif'])) {
		$menu_id=(int)$_POST["menu_id"];
		$pasifyap=$db->prepare("UPDATE menu SET
		menu_durum=:durum
		WHERE menu_id=$menu_id");

		$update=$pasifyap->execute(array(
		'durum' => 1
	));
	if ($update) 
	{
		header("Location:../production/menu.php?menu_id=$menu_id&durum=ok");
	}
	else
	{
		header("Location:../production/menu.php?menu_id=$menu_id&durum=no");
	}
}

if ($_GET['menusil']=="ok") 
{
	$sil=$db->prepare("DELETE FROM menu WHERE menu_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['menu_id']
	));
	if ($kontrol) 
	{
		header("location:../production/menu.php?sil=ok");
	}
	else
	{
		header("location:../production/menu.php?sil=no");
	}
}


if (isset($_POST['menukaydet'])) 
{

	$menu_seourl=seo($_POST['menu_ad']);

	$ayarkaydet=$db->prepare("INSERT INTO menu SET
		menu_ad=:ad,
		menu_detay=:detay,
		menu_url=:url,
		menu_sira=:sira,
		menu_durum=:durum
		");

	$ınsert=$ayarkaydet->execute(array(
		'ad' => $_POST['menu_ad'],
		'detay' => $_POST['menu_detay'],
		'url' => $_POST['menu_url'],
		'sira' => $_POST['menu_sira'],
		'durum' => $_POST['menu_durum']
		));
	
	if ($ınsert) 
	{
		header("Location:../production/menu.php?durum=ok");
	}
	else
	{
		header("Location:../production/menu.php?durum=no");
	}
}
if (isset($_POST['renkduzenlekaydet'])) 
{
	$ayar_id=$_POST['ayar_id'];


	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_renk=:ad
		WHERE ayar_id={$_POST['ayar_id']}");

	$update=$ayarkaydet->execute(array(
		'ad' => $_POST['ayar_renk']
		));
	
	if ($update) 
	{
		header("Location:../production/index.php?ayar_id=$ayar_idd&durum=ok");
	}
	else
	{
		header("Location:../production/index.php?menu_id=$menu_id&durum=no");
	}
}

if (isset($_POST['renkduzenlekaydet'])) 
{
	$ayar_id=$_POST['ayar_id'];
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_renk2=:ad2
		WHERE ayar_id={$_POST['ayar_id']}");
	$update=$ayarkaydet->execute(array(
		'ad2' => $_POST['ayar_renk2']
		));	
	if ($update) 
	{
		header("Location:../production/index.php?ayar_id=$ayar_idd&durum=ok");
	}
	else
	{
		header("Location:../production/index.php?menu_id=$menu_id&durum=no");
	}
}
if (isset($_POST['sliderkaydet'])) 
{
	$uploads_dir = '../../dimg/slider';
	@$stmp_name  = $_FILES['slider_resimyol']["tmp_name"];
	@$name  = $_FILES['slider_resimyol']["name"];
	$resim_boyutu=getimagesize($_FILES['slider_resimyol']["tmp_name"]);
	//resim ismini benzersiz yapar
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);

	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($stmp_name, "$uploads_dir/$benzersizad$name");
	if ($resim_boyutu==FALSE) {
	header("Location:../production/slider-ekle.php?durum=no");
}
else{
	$gkaydet=$db->prepare("INSERT INTO slider SET
		slider_ad=:ad,
		slider_sira=:sira,
		slider_link=:link,
		slider_yorum=:yorum,
		slider_resimyol=:resimyol,
		slider_yazar=:yazar,
		slider_durum=:durum,
		slider_calistigiyer=:firma
		");

	$insert=$gkaydet->execute(array(
		'ad' => $_POST['slider_ad'],
		'sira' => $_POST['slider_sira'],
		'link' => $_POST['slider_link'],
		'yorum' => $_POST['slider_yorum'],
		'resimyol' => $refimgyol,
		'yazar' => $_POST['slider_yazar'],
		'durum' => $_POST['slider_durum'],
		'firma'=>$_POST['slider_calistigiyer']
		
		));

	if ($insert) 
	{
		header("Location:../production/slider.php?durum=ok");
	}
	else
	{
		header("Location:../production/slider.php?durum=no");
	}
	}
}
if (isset($_POST['saktif'])) {

		$slider_id=(int)$_POST["slider_id"];
		$pasifyap=$db->prepare("UPDATE slider SET
		slider_durum=:durum
		WHERE slider_id=$slider_id");

		$update=$pasifyap->execute(array(
		'durum' => 0
	));
	if ($update) 
	{
		header("Location:../production/slider.php?slider_id=$slider_id&durum=ok");
	}
	else
	{
		header("Location:../production/slider.php?slider_id=$slider_id&durum=no");
	}
	
}
if (isset($_POST['spasif'])) {
		$slider_id=(int)$_POST["slider_id"];
		$pasifyap=$db->prepare("UPDATE slider SET
		slider_durum=:durum
		WHERE slider_id=$slider_id");

		$update=$pasifyap->execute(array(
		'durum' => 1
	));
	if ($update) 
	{
		header("Location:../production/slider.php?slider_id=$slider_id&durum=ok");
	}
	else
	{
		header("Location:../production/slider.php?slider_id=$slider_id&durum=no");
	}
}
if (isset($_POST['sliderduzenlekaydet'])) 
{
	$slider_id=$_POST['slider_id'];
	$uploads_dir = '../../images';
	$stmp_name  = $_FILES['slider_resimyol']["tmp_name"];
	$name  = $_FILES['slider_resimyol']["name"];
	$resim_boyutu=getimagesize($_FILES['slider_resimyol']["size"]);
	//resim ismini benzersiz yapar
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);

	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	move_uploaded_file($stmp_name, "$uploads_dir/$benzersizad$name");
	//copy($stmp_name, $uploads_dir. '/' . ""$_FILES['slider_resimyol']["name"]"");
if ($resim_boyutu) {
	$ayarkaydet=$db->prepare("UPDATE slider SET
		slider_sira=:sira,
		slider_resimyol=:resimyol,
		slider_durum=:durum
		WHERE slider_id={$_POST['slider_id']}");

		$update=$ayarkaydet->execute(array(
		'sira' => $_POST['slider_sira'],

		'resimyol' => $refimgyol,
		'durum' => $_POST['slider_durum']
	));
		
	
}
else{
	
		$ayarkaydet=$db->prepare("UPDATE slider SET
		slider_sira=:sira,
		slider_durum=:durum
		WHERE slider_id={$_POST['slider_id']}");

		$update=$ayarkaydet->execute(array(
		'sira' => $_POST['slider_sira'],
		'durum' => $_POST['slider_durum']
	));
}
if ($update) 
	{
		header("Location:../production/slider.php?slider_id=$slider_id&durum=ok");
	}
	else
	{
		header("Location:../production/slider.php?slider_id=$slider_id&durum=no");
	}

}


if ($_GET['slidersil']=="ok") 
{
	$sil=$db->prepare("DELETE FROM slider WHERE slider_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['slider_id']
	));
	if ($kontrol) 
	{
		header("location:../production/slider.php?sil=ok");
	}
	else
	{
		header("location:../production/slider.php?sil=no");
	}
}


if (isset($_POST['hakduzenleykaydet'])) 
{
	$hakkimizda_id=$_POST['hakkimizda_id'];
	$ayarkaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_icerik=:ad,
		hakkimizda_sıra=:detay,
		hakkimizda_durum=:url
		WHERE hakkimizda_id={$_POST['hakkimizda_id']}");

	$update=$ayarkaydet->execute(array(
		'ad' => $_POST['hakkimizda_icerik'],
		'detay' => $_POST['hakkimizda_sıra'],
		'url' => $_POST['hakkimizda_durum']
		));
	
	if ($update) 
	{
		header("Location:../production/index.php?hakkimizda_id=$hakkimizda_id&durum=ok");
	}
	else
	{
		header("Location:../production/index.php?hakkimizda_id=$hakkimizda_id&durum=no");
	}
}

if (isset($_POST['maktif'])) {

		$hakkimizda_id=$_POST["hakkimizda_id"];
		$pasifyap=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_durum=:durum
		WHERE hakkimizda_id=$hakkimizda_id");

		$update=$pasifyap->execute(array(
		'durum' => 0
	));
	if ($update) 
	{
		header("Location:../production/index.php?hakkimizda_id=$hakkimizda_id&durum=ok");
	}
	else
	{
		header("Location:../production/index.php?hakkimizda_id=$hakkimizda_id&durum=no");
	}
	
}
if (isset($_POST['mpasif'])) {
		$hakkimizda_id=$_POST["hakkimizda_id"];
		$pasifyap=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_durum=:durum
		WHERE hakkimizda_id=$hakkimizda_id");

		$update=$pasifyap->execute(array(
		'durum' => 1
	));
	if ($update) 
	{
		header("Location:../production/index.php?hakkimizda_id=$hakkimizda_id&durum=ok");
	}
	else
	{
		header("Location:../production/index.php?hakkimizda_id=$hakkimizda_id&durum=no");
	}
}

if (isset($_POST['bodyduzenlekaydet'])) 
{
	$ayar_id=$_POST['ayar_id'];
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_renk3=:ad
		WHERE ayar_id={$_POST['ayar_id']}");

	$update=$ayarkaydet->execute(array(
		'ad' => $_POST['ayar_renk3']
		));
	
	if ($update) 
	{
		header("Location:../production/index.php?ayar_id=$ayar_idd&durum=ok");
	}
	else
	{
		header("Location:../production/menu.php?menu_id=$menu_id&durum=no");
	}
}

if (isset($_POST['bodyduzenlekaydet'])) 
{
	$ayar_id=$_POST['ayar_id'];
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_renk4=:ad2
		WHERE ayar_id={$_POST['ayar_id']}");
	$update=$ayarkaydet->execute(array(
		'ad2' => $_POST['ayar_renk4']
		));	
	if ($update) 
	{
		header("Location:../production/index.php?ayar_id=$ayar_idd&durum=ok");
	}
	else
	{
		header("Location:../production/menu.php?menu_id=$menu_id&durum=no");
	}
}
if (isset($_POST['bodyduzenlekaydet'])) 
{
	$ayar_id=$_POST['ayar_id'];
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_font=:ad3
		WHERE ayar_id={$_POST['ayar_id']}");
	$update=$ayarkaydet->execute(array(
		'ad3' => $_POST['ayar_font']
		));	
	if ($update) 
	{
		header("Location:../production/index.php?ayar_id=$ayar_idd&durum=ok");
	}
	else
	{
		header("Location:../production/menu.php?menu_id=$menu_id&durum=no");
	}
}

if (isset($_POST['bodyduzenlekaydet'])) 
{
	$ayar_id=$_POST['ayar_id'];
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_size=:ad4
		WHERE ayar_id={$_POST['ayar_id']}");
	$update=$ayarkaydet->execute(array(
		'ad4' => $_POST['ayar_size']
		));	
	if ($update) 
	{
		header("Location:../production/index.php?ayar_id=$ayar_idd&durum=ok");
	}
	else
	{
		header("Location:../production/menu.php?menu_id=$menu_id&durum=no");
	}
}

if (isset($_POST['bodyduzenlekaydet'])) 
{
	$ayar_id=$_POST['ayar_id'];
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:title
		WHERE ayar_id={$_POST['ayar_id']}");
	$update=$ayarkaydet->execute(array(
		'title' => $_POST['ayar_title']
		));	
	if ($update) 
	{
		header("Location:../production/index.php?ayar_id=$ayar_idd&durum=ok");
	}
	else
	{
		header("Location:../production/index.php?menu_id=$menu_id&durum=no");
	}
}

if (isset($_POST['bodyduzenlekaydet'])) 
{
	$ayar_id=$_POST['ayar_id'];
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id={$_POST['ayar_id']}");
	$update=$ayarkaydet->execute(array(
		'logo' => $_POST['ayar_logo']
		));	
	if ($update) 
	{
		header("Location:../production/index.php?ayar_id=$ayar_idd&durum=ok");
	}
	else
	{
		header("Location:../production/index.php?menu_id=$menu_id&durum=no");
	}
}

if (isset($_POST['bodyduzenlekaydet'])) 
{
	$ayar_id=$_POST['ayar_id'];
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_sticky=:stic,
		ayar_sticky2=:stic2
		WHERE ayar_id={$_POST['ayar_id']}");
	$update=$ayarkaydet->execute(array(
		'stic' => $_POST['ayar_sticky'],
		'stic2' => $_POST['ayar_sticky2']
		));	
	if ($update) 
	{
		header("Location:../production/index.php?ayar_id=$ayar_idd&durum=ok");
	}
	else
	{
		header("Location:../production/index.php?menu_id=$menu_id&durum=no");
	}
}

//İCON DÜZENLEME
if (isset($_POST['iconduzenlekaydet'])) 
{
	$ayar_id=$_POST['ayar_id'];
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_facebook=:face,
		ayar_twitter=:twit,
		ayar_instagram=:ins,
		ayar_github=:git,
		ayar_pinterest=:pin,
		ayar_linkedin=:link
		WHERE ayar_id={$_POST['ayar_id']}");
	$update=$ayarkaydet->execute(array(
		'face' => $_POST['ayar_facebook'],
		'twit' => $_POST['ayar_twitter'],
		'ins' => $_POST['ayar_instagram'],
		'git' => $_POST['ayar_github'],
		'pin' => $_POST['ayar_pinterest'],
		'link' => $_POST['ayar_linkedin']
		));	
	if ($update) 
	{
		header("Location:../production/index.php?ayar_id=$ayar_idd&durum=ok");
	}
	else
	{
		header("Location:../production/index.php?menu_id=$menu_id&durum=no");
	}
}

if (isset($_POST['filmduzenleykaydet'])) 
{
	$film_id=$_POST['film_id'];
	$ayarkaydet=$db->prepare("UPDATE filmler SET
		film_ad=:ad,
		film_resim=:detay,
		film_tür=:url
		WHERE film_id={$_POST['film_id']}");

	$update=$ayarkaydet->execute(array(
		'ad' => $_POST['film_ad'],
		'detay' => $_POST['film_resim'],
		'url' => $_POST['film_tür']
		));
	
	if ($update) 
	{
		header("Location:../production/film.php?film_id=$film_id&durum=ok");
	}
	else
	{
		header("Location:../production/index.php?film_id=$film_id&durum=no");
	}
}

if (isset($_POST['filmkaydet'])) 
{

	$menu_seourl=seo($_POST['film_ad']);

	$ayarkaydet=$db->prepare("INSERT INTO filmler SET
		film_ad=:ad,
		film_resim=:detay,
		film_tür=:url
		");

	$ınsert=$ayarkaydet->execute(array(
		'ad' => $_POST['film_ad'],
		'detay' => $_POST['film_resim'],
		'url' => $_POST['film_tür']
		));
	
	if ($ınsert) 
	{
		header("Location:../production/film.php?durum=ok");
	}
	else
	{
		header("Location:../production/menu.php?durum=no");
	}
}

if ($_GET['kisisil']=="ok") 
{
	$sil=$db->prepare("DELETE FROM filmler WHERE film_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['film_id']
	));
	if ($kontrol) 
	{
		header("location:../production/film.php?sil=ok");
	}
	else
	{
		header("location:../production/film.php?sil=no");
	}
}

