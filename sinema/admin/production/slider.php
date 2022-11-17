<?php
include 'header.php'; 
include '../netting/baglan.php';
?>

<?php if(@$_GET): ?>
<?php if (@$_GET['sliderEkle'] == "ok"): ?>
  <script>Swal.fire("Başarılı", "Slider Başarıyla Eklendi", "success"); </script>
<?php endif ?>

<?php if (@$_GET['sliderGuncelleİslem'] == "yes"): ?>
  <script>Swal.fire("Başarılı", "Slider Başarıyla Eklendi", "success"); </script>
<?php endif ?>

<?php if (@$_GET['sliderSil'] == "ok"): ?>
  <script>Swal.fire("Başarılı", "Slider Başarıyla Silindi", "success"); </script>
<?php endif ?>




<?php if (@$_GET['sliderGuncelle'] == "yes"): ?>
  <script>Swal.fire({
  icon: 'success',
  title: 'Slider Güncellendi',

}) </script>
<?php endif ?>
<?php endif ?>
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
                    <h3>Slider Listeleme</h3>

                  
                     
                    <ul class="nav navbar-right panel_toolbox">

                   <button style="margin-left: 800px; margin-top: 50px; " type="button" class="btn btn-success aw-zoom" data-toggle="modal" data-target="#sliderekle"> Slider Ekle </button>

                  

        <div class="x_content">

          <!-- Div İçerik Başlangıç-->

            <table class="table">
                        <thead>
                          <tr>
                            <th>Slider Sıra</th>             
                            <th>Slider Durumu</th>
                            <th>Güncelle</th>
                            <th>Sil</th>
                            <th>Slider Resmi </th>
                          </tr>
                        </thead>
                         <tbody>

        <?php  

        $sorgu = $db->query("SELECT * FROM slider order by slider_sira ");
        
        while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) { ?>

              



    
                       
                          <tr>
                            
                            <td><?php echo $cikti['slider_sira'];    ?></td>
                            

                            <?php if( $cikti['slider_durum']  == 1): ?>
                            <td><a style="text-decoration: none; color: white;" href="sliderGuncelleİslem.php?id=<?php echo $cikti['slider_id'] ?>    ">  <button   type="button" class="btn btn-success aw-zoom">Aktif</button></a> </td>
                        <?php endif ?>
                          <?php if( $cikti['slider_durum']  == 0): ?>
                            <td><a style="text-decoration: none; color: white;" href="sliderGuncelleİslem.php?id=<?php echo $cikti['slider_id'] ?>    ">  <button   type="button" class="btn btn-danger aw-zoom">Pasif </button></a> </td>
                        <?php endif ?>

                         <td>
                          <a style="text-decoration: none; color: white;" href="SliderGuncelle.php?id=<?php echo $cikti['slider_id'] ?>">  <buttontype="button" class="btn btn-primary aw-zoom" >Güncelle</button>
                          </a>
                        </td>
                <td><a style="text-decoration: none; color: white;" href="sliderSil.php?id=<?php echo $cikti['slider_id'] ?>">  <button   type="button" class="btn btn-danger aw-zoom">Sİl</button></a></td>
                <td>  <img style="width:400px; height:120px;" src="../../<?php  echo $cikti['slider_resim']; ?>">    </td>

                          </tr>

                     <?php } ?>      
                         
                      </table>

       <!--LOGO-->>


             
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
                   
                    <div class="table-responsive">
                     
                    </div>
                  </div>
                </div>
              </div>








<?php
include "footer.php";


?>


<div class="modal fade" id="sliderekle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Slider Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      		 <div class="row" style="margin-left: 10px;">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    

                    <h4 class="card-description"> Slider Ekleme </h4><br><br>


          



                    <form class="forms-sample" action="sliderEkleİslem.php" method="POST">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Slider Resim</label>
                        <input type="file" class="form-control" id="exampleInputUsername1" placeholder="" name="sliderresim" value="images/" required>
                      </div>
                 
                     
                      
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success mr-2">Kaydet</button>
                     
                      
                    </form>
                  </div>
                </div>
              </div>





      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>



