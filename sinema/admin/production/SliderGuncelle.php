<?php

include 'header.php'; 
include '../netting/baglan.php';

$id = $_GET['id'];
  $sorgu = $db->query("SELECT * FROM slider where slider_id = $id ");
  $cikti = $sorgu->fetch(PDO::FETCH_ASSOC);

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
                    <h3>Slider Güncelle</h3>           
        <div class="x_content">
          <!-- Div İçerik Başlangıç-->        
                    <form class="forms-sample" action="sliderGuncelleİslem.php" method="POST">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Slider Foroğraf</label>
                        <img src="<?php echo $cikti['slider_resim']; ?>"style="width: 500px; height: 120px; margin-top: 10px; margin-left: 100px;" ><br><br><br>
                        <input type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $cikti['slider_resim']; ?>" name="slider_resim" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Slider Sırası</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $cikti['slider_sira']; ?>" name="slider_sira" required>
                      </div>
                   

                       <div class="form-group " >
                        <label for="exampleInputPassword1">Slider Durum</label><br>
                        
                         <input type="radio" class="form-check-input" name="slider_durum" id="membershipRadios2" value="1" style="margin-left:40px" 

                              <?php if ($cikti['slider_durum'] == "1") {
                            echo ($cikti['slider_durum']== '1') ?  "checked" : "" ;  
                              }  ?>
                         > Aktif </label>                          
                        <br>
                         <input type="radio" class="form-check-input" name="slider_durum" id="membershipRadios2" value="0" style="margin-left:40px"

                                 <?php if ($cikti['slider_durum'] == "0") {
                                echo ($cikti['slider_durum']== '0') ?  "checked" : "" ;  
                              }  ?>

                         > Pasif </label>
                      </div>
                       <input type="hidden" name="id" value="<?php echo $id ?>">
                       <input type="hidden" name="eski" value="<?php echo $cikti['slider_sira']; ?>">                                    
                     <button type="submit" class="btn btn-warning mr-2" >Kaydet</button>                     
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
                    <div class="table-responsive">                
                    </div>
                  </div>
                </div>
              </div>
