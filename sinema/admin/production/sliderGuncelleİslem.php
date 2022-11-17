<?php 
include '../netting/baglan.php';;	
//post kontrolü
if ($_POST) 
{
$slider_resim = $_POST['slider_resim'];
$id = $_POST['id'];
$slider_sira = $_POST['slider_sira'];
$slider_durum = $_POST['slider_durum'];
$eski = $_POST['eski'];
$sorgu1 = $db->prepare("UPDATE slider SET  slider_sira = ? WHERE slider_sira = ?");
$sorgu1->bindParam(1, $eski, PDO::PARAM_INT);
$sorgu1->bindParam(2, $slider_sira, PDO::PARAM_INT);
$sorgu1->execute();
$sorgu = $db->prepare("UPDATE slider SET slider_resim = :slider_resim, slider_sira = :slider_sira , slider_durum = :slider_durum  WHERE slider_id= :id");
	$sorgu -> execute([':slider_resim' => $slider_resim, ':slider_sira' => $slider_sira, ':slider_durum' => $slider_durum, ':id' => $id  ]);
}
?>
<?php 			
if ($_GET['id']) 
{		
	//gelen idye ait kaydı çekim
	$id = $_GET['id'];
	$sorgu = $db->query("SELECT * FROM slider Where slider_id = $id ");
	$cikti = $sorgu->fetch(PDO::FETCH_ASSOC);

	//kaydın durumuna göre güncelleme yaptırdım
if ($cikti['slider_durum'] == 1) {
	$durumupdate = $db->prepare("UPDATE slider SET  slider_durum = false WHERE slider_id= :id");
	$durumupdate -> execute([':id' => $id  ]);
	if ($durumupdate) {
	header("Location:slider.php?sliderGuncelle = no");
}
	else {
	header("Location:slider.php?sliderGuncelle = no");
	}

}
	elseif($cikti['slider_durum'] == 0){
		$durumupdate = $db->prepare("UPDATE slider SET  slider_durum = true WHERE slider_id= :id");
		$durumupdate -> execute([':id' => $id ]);

		if ($durumupdate) {
		header("Location:slider.php?sliderGuncelle = no");
	}
	else 
	{
	header("Location:slider.php?sliderGuncelle = no");
	}

}

}



if ($sorgu) 
{						
	header("Location:slider.php?sliderGuncelleİslem=yes");
}
else
 {
	header("Location:slider.php?sliderGuncelleİslem=yes");
}								
 ?>