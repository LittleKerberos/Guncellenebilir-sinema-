<?php
 include 'header.php'; 

$menusor = $db->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=:id");
$menusor->execute(array(
  'id' => $_GET['hakkimizda_id']
));

$menucek = $menusor->fetch(PDO::FETCH_ASSOC);


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
                    <h2>Hakkımızda Düzenleme<small>

    
                                       
                    </small></h2>
                     
                    <ul class="nav navbar-right panel_toolbox">

                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>

        <div class="x_content">

        <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                <div class="form-group">            
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Hakkımızda İçerik <span class="required">*</span>
                  </label>
                    <div class="col-md-9 col-sm-9 col-xs-12"> 
                    <h6 style="color:red;">MAX 1000 KARAKTER GİREBİLİRSİNİZ !</h6>                  
                      <textarea class="ckeditor" id="editor1" name="hakkimizda_icerik"><?php echo $menucek['hakkimizda_icerik']; ?></textarea>
                    </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hakkımızda Sıra<span class="required">*</span>
                  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name"  value="<?php echo $menucek['hakkimizda_sıra']; ?>" name="hakkimizda_sıra" class="form-control col-md-7 col-xs-12">
                    </div>
               </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hakkımızda Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="hakkimizda_durum" required>


            <option value="1" <?php echo $menucek['hakkimizda_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
           <option value="0" <?php if ($menucek['hakkimizda_durum']==0) { echo 'selected=""'; } ?>>Pasif</option>                
                 </select>
               </div>
             </div>

               
             <input type="hidden" name="hakkimizda_id" value="<?php echo $menucek['hakkimizda_id']; ?>">
               


               <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="hakduzenleykaydet" class="btn btn-primary">Güncelle</button>
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