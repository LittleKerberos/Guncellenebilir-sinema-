<?php
include '../netting/baglan.php';


$query = $db->prepare("SELECT MAX(slider_sira) FROM `slider`  ");

//Sorgumuzu çalıştırıyoruz
$query->execute();
$result=$query->fetch(PDO::FETCH_ASSOC);
								if ($_POST) {
										
										$sliderresim = $_POST['sliderresim'];
										
										

										
										$query = $db->prepare("INSERT INTO slider SET
							slider_resim = ?,
							slider_sira = ?
							");
							
							$insert = $query->execute(array(
							     $sliderresim, $result['MAX(slider_sira)']+1
							));



								}

								if ($insert) {
									header("Location:slider.php?sliderEkle=ok");
								}
								else {
									header("Location:slider.php?sliderEkle = no");
								}
								