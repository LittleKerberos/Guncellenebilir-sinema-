<?php
 include 'header.php'; 
error_reporting(0);
$ayarsor = $db->prepare("SELECT * FROM ayar WHERE ayar_id=?");
$ayarsor->execute(array(1));
$ayarsor->execute(array(
  'id' => $_GET['ayar_id']
));
 $ayarcek = $ayarsor->fetch(pdo::FETCH_ASSOC);

 ?>  <div class="right_col" role="main">
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

        <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
               <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                     <label for="colorpicker">Facebook: </label>
                      <input type="text" id="ayar_facebook" required="required" value="<?php echo $ayarcek['ayar_facebook']; ?>" name="ayar_facebook" class="form-control col-md-7 col-xs-12"><br><br>

                     <label for="colorpicker">Twitter: </label>
                      <input type="text" id="ayar_twitter" required="required" value="<?php echo $ayarcek['ayar_twitter']; ?>" name="ayar_twitter" class="form-control col-md-7 col-xs-12"><br><br>

                      <label for="colorpicker">İnstagram: </label>
                      <input type="text" id="ayar_instagram" required="required" value="<?php echo $ayarcek['ayar_instagram']; ?>" name="ayar_instagram" class="form-control col-md-7 col-xs-12"><br><br>

                      <label for="colorpicker">Github: </label>
                      <input type="text" id="ayar_github" required="required" value="<?php echo $ayarcek['ayar_github']; ?>" name="ayar_github" class="form-control col-md-7 col-xs-12"><br><br>  

                      <label for="colorpicker">Youtube: </label>
                      <input type="text" id="ayar_pinterest" required="required" value="<?php echo $ayarcek['ayar_pinterest']; ?>" name="ayar_pinterest" class="form-control col-md-7 col-xs-12"><br><br>

                      <label for="colorpicker">Linkedin: </label>
                      <input type="text" id="ayar_linkedin" required="required" value="<?php echo $ayarcek['ayar_linkedin']; ?>" name="ayar_linkedin" class="form-control col-md-7 col-xs-12"><br><br>       
                   <br>

                    </div>
               </div>                           
             <input type="hidden" name="ayar_id" value="<?php echo $ayarcek['ayar_id']; ?>">           
               <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="iconduzenlekaydet" class="btn btn-primary">Güncelle</button>
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