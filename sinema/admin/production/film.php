<?php 
include 'header.php'; 
include '../netting/baglan.php';
$ayarsor = $db->prepare("SELECT * FROM filmler");
$ayarsor->execute();
?>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
               
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
         
            
                  <div class="x_content">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Film Listeleme</h3>

                  
                     
                      
                    <ul class="nav navbar-right panel_toolbox">

                      <div align="right"><a href="film-ekle.php"> <button class="btn btn-success btn-xs">Yeni Ekle</button></a></div>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
        <div class="x_content">
          <!--Hakkımızda ayarları--->
            <label style="color:red;">FİLM AYARLARI</label>
<table class="table table-striped table-dark" id="tablo">
    <tr>
      <th>ID</th>
      <th>Resim</th>
      <th>İsim</th>
      <th>Tür</th>
      <th>Düzenle</th>
      <th>Sil</th>
    </tr>
<?php
    $websor = $db->prepare("SELECT * from filmler");
    $websor->execute();

    while ($cek = $websor->fetch(PDO::FETCH_ASSOC)) { ?>
      <tr>
        <td> <?php echo $cek['film_id'] ?> </td> 
        <td><a href="<?php echo $cek['film_resim'] ?>" target="_blank">  <img style="width:180px; height:180px;" src=" <?php echo $cek['film_resim'] ?>"></a>
        </td>
        <td> <?php echo $cek['film_ad'] ?> </td>
        <td> <?php echo  $cek['film_tür'] ?> </td>
        <td>
          <a href="duzenle.php?id=<?php echo $cek['film_id'] ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a>
        </td>
        <td>
          <center><a href="../netting/islem.php?film_id=<?php echo $cek['film_id']; ?>&kisisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center>
        </td>


      <?php
    }
      ?>
      </tr>
</table>
                  </div>
                </div>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
<?php include 'footer.php'; ?>