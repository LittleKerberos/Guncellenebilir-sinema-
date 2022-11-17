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
                      <input type="color" id="ayar_renk3" required="required" value="<?php echo $ayarcek['ayar_renk3']; ?>" name="ayar_renk3" class="form-control col-md-7 col-xs-12"><br><br>

                      <label style="margin-top:20px;" for="colorpicker">Yazı rengi seç: </label>
                      <input type="color" id="ayar_renk4" required="required" value="<?php echo $ayarcek['ayar_renk4']; ?>" name="ayar_renk4" class="form-control col-md-7 col-xs-12"><br><br>

                      <label style="margin-top:20px;">Font: </label>                
                   <input type="text" id="ayar_font" required="required" value="<?php echo $ayarcek['ayar_font']; ?>" name="ayar_font" class="form-control col-md-7 col-xs-12"><br><br>
                   <br>
                   <hr>
                  <h6 style="margin-top:20px; color:green; font-style: italic;" >FONT ÇEŞİTLERİ;  </h6>
                  <label style="font-family:arial;"> Arial - </label>
                  <label style="font-family:Times New Roman;"> Times New Roman -  </label>
                  <label style="font-family:Helvetica;"> Helvetica - </label>
                  <label style="font-family:Times;"> Times -</label>
                  <label style="font-family:Courier;"> Courier - </label> 
                  <label style="font-family:Verdana;"> Verdana -  </label> 
                  <label style="font-family:Arial Narrow ;"> Arial Narrow -  </label>
                  <label style="font-family:Candara ;"> Candara -  </label>
                  <label style="font-family:Geneva ;"> Geneva -  </label>
                  <label style="font-family:Calibri;"> Calibri - </label>
                  <label style="font-family:Optima;"> Optima- </label>
                  <label style="font-family:Cambria ;"> Cambria - </label>
                  <label style="font-family:Garamond ;"> Garamond - </label>
                  <label style="font-family:Perpetua ;"> Perpetua - </label>
                  <label style="font-family:Monaco  ;"> Monaco  - </label>
                  <label style="font-family:Didot  ;"> Didot  - </label>
                  <label style="font-family:Lucida Bright ;"> Lucida Bright - </label>
                  <label style="font-family:Copperplate ;"> Copperplate -</label>
                  <label style="font-family:Sans-serif;"> Sans-serif - </label>
                  <label style="font-family:Monospace;"> Monospace -</label>
                  <label style="font-family:Coursie;"> Coursie </label>
                  <hr>
                    <label style="margin-top:10px;">Font Size: </label>                
                   <input type="text" id="ayar_size" required="required" value="<?php echo $ayarcek['ayar_size']; ?>" name="ayar_size" class="form-control col-md-7 col-xs-12">
                    <label style="color:green; opacity:50%;">..px şeklinde giriş yapınız örnek; 12px</label> <br> <br>
                   <label style="margin-top:10px;">Tittle: </label>                
                   <input type="text" id="ayar_title" required="required" value="<?php echo $ayarcek['ayar_title']; ?>" name="ayar_title" class="form-control col-md-7 col-xs-12">
                   <br><br>
                   <label style="margin-top:10px;">Logo: </label>                
                   <input type="text" id="ayar_logo" required="required" value="<?php echo $ayarcek['ayar_logo']; ?>" name="ayar_logo" class="form-control col-md-7 col-xs-12">
                   <br>
                   <label style="margin-top:10px;">Sticky Renk: </label>                
                    <input type="color" id="ayar_sticky" required="required" value="<?php echo $ayarcek['ayar_sticky']; ?>" name="ayar_sticky" class="form-control col-md-7 col-xs-12"><br><br>
                    <label style="margin-top:10px;">Sticky Yazı Renk: </label>                
                    <input type="color" id="ayar_sticky2" required="required" value="<?php echo $ayarcek['ayar_sticky2']; ?>" name="ayar_sticky2" class="form-control col-md-7 col-xs-12"><br><br>
                   <br>
                


                    </div>
               </div>                           
             <input type="hidden" name="ayar_id" value="<?php echo $ayarcek['ayar_id']; ?>">           
               <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="bodyduzenlekaydet" class="btn btn-primary">Güncelle</button>
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