<?php
include 'header.php'; 

$slidersor = $db->prepare("SELECT * FROM slider WHERE slider_id=:id");
$slidersor->execute(array(
  'id' => $_GET['slider_id']
));
$slidercek = $slidersor->fetch(PDO::FETCH_ASSOC);
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
                    <h2>slider Düzenleme<small>

                      <?php 

                        if ($_GET['durum']=="ok") {?>
                          
                          <b style="color: green;">İşlem Başarılı...</b>

                          <?php } 
                          
                          elseif ($_GET['durum']=="no") {?>
                            
                            <b style="color: red;">İşlem Başarısız...</b>

                         <?php  }

                         ?>
                                       
                    </small></h2>
                     
                    <ul class="nav navbar-right panel_toolbox">

                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>

        <div class="x_content">

        <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim seç<span class="required">*</span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <img width="200" height="100" src="../../<?php echo $slidercek['slider_resimyol'] ?>">
                    </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç <span class="required">*</span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="first-name"  name="slider_resimyol" class="form-control  col-md-7 col-xs-12">
                    </div>
               </div>

               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sıra<span class="required">*</span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" value="<?php echo $slidercek['slider_sira']; ?>" name="slider_sira" class="form-control col-md-7 col-xs-12">
                    </div>
               </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="slider_durum" required>
            <option value="1" <?php echo $slidercek['slider_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
           <option value="0" <?php if ($slidercek['slider_durum']==0) { echo 'selected=""'; } ?>>Pasif</option>
                 </select>
               </div>
             </div>
       <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id']; ?>">
               <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="sliderduzenlekaydet" class="btn btn-primary">Güncelle</button>
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