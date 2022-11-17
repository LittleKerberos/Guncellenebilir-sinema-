<?php
 include 'header.php'; 
error_reporting(0);
$ayarsor = $db->prepare("SELECT * FROM ayar WHERE ayar_id=?");
$ayarsor->execute(array(1));
$ayarsor->execute(array(
  'id' => $_GET['ayar_id']
));
 $ayarcek = $ayarsor->fetch(pdo::FETCH_ASSOC);

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

        <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
               <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                     <label for="colorpicker">Arkaplan rengi seç: </label>
                      <input type="color" id="ayar_renk" required="required" value="<?php echo $ayarcek['ayar_renk']; ?>" name="ayar_renk" class="form-control col-md-7 col-xs-12"><br><br>
                      <label style="margin-top:20px;" for="colorpicker">Yazı rengi seç: </label>
                      <input type="color" id="ayar_renk2" required="required" value="<?php echo $ayarcek['ayar_renk2']; ?>" name="ayar_renk2" class="form-control col-md-7 col-xs-12">
                    </div>
               </div>                           
             <input type="hidden" name="ayar_id" value="<?php echo $ayarcek['ayar_id']; ?>">           
               <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="renkduzenlekaydet" class="btn btn-primary">Güncelle</button>
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