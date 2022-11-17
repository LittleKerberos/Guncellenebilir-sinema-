<?php
 include 'header.php'; 
 ?>


        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ayarlar</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
         
            
                  <div class="x_content">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                   
                     
                    <ul class="nav navbar-right panel_toolbox">

                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>

        <div class="x_content">

      <?php
$kisisor=$db->prepare("SELECT * FROM filmler WHERE film_id=:id");
$kisisor->execute([
    'id'=>$_GET['id']
]);
$kisicek=$kisisor->fetch(PDO::FETCH_ASSOC);
?>

<body>
<?php 



?>

<form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    <h3>Kayıt Ekleme Formu</h3>
       <label for="colorpicker">FİLM ADI </label>
        <input type="text" id="film_ad" required="required" value="<?php echo $kisicek['film_ad']; ?>" name="film_ad" class="form-control col-md-7 col-xs-12"><br><br>
        <label style="margin-top:20px;" for="colorpicker">RESİM YOLU</label>
         <input type="text" id="film_resim" required="required" value="<?php echo $kisicek['film_resim']; ?>" name="film_resim" class="form-control col-md-7 col-xs-12"><br><br><br>
        <label>FİLM AÇIKLAMA</label>
        <textarea class="ckeditor" id="editor1" name="film_tür"> <?php echo $kisicek['film_tür']; ?> </textarea><br><br>   
       	<input type="hidden" name="film_id" value="<?php echo $kisicek['film_id']; ?>">
       	<div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="submit" name="filmduzenleykaydet" class="btn btn-primary">Güncelle</button>
        </div>
</form>
                  </div>
                </div>
              </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php include 'footer.php'; ?>