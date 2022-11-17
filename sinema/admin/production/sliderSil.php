<?php 
include '../netting/baglan.php';

if ($_GET) {
    
    $id= $_GET['id'];

    if (!$id) {
       echo"sadsa";
            }

    else

    {
        $sil= $db->prepare("DELETE From slider where slider_id = :id");
        $sil->execute(array(':id' => $id)); 

            if ($sil) {
            	header("Location:slider.php?sliderSil=ok");

            }

    }
}

?>