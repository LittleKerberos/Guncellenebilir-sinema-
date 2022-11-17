<?php 
include 'header.php'; 
include '../netting/baglan.php';
$menusor = $db->prepare("SELECT * FROM hakkimizda");
$menusor->execute();
$ayarsor = $db->prepare("SELECT * FROM ayar");
$ayarsor->execute();
$ayarsor2 = $db->prepare("SELECT * FROM ayar");
$ayarsor2->execute();
$ayarsor3 = $db->prepare("SELECT * FROM ayar");
$ayarsor3->execute();
$slidersor = $db->prepare("SELECT * FROM slider");
$slidersor->execute();
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
                    <h3>Hakkımızda Listeleme</h3>

                  
                     
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  

        <div class="x_content">
                         
          <!--Hakkımızda ayarları--->
            <label style="color:red;">HAKKIMIZDA AYARLARI</label>
           <table style="border:1px solid red; background: red; color: black;" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr style="color:white;">
                          <th>Sıra No</th>
                          <th>Hakkımızda İçerik</th>                      
                          <th>Hakkımızda Sıra</th>
                          <th>Hakkımızda Durum</th>
                          <th>Durum</th>
                          <th>Düzenle</th>
                          <th>Sil</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php 
                        $say=0;
                          while($menucek = $menusor->fetch(PDO::FETCH_ASSOC)) { $say++?>
                        <tr>
                          <td><?php echo $say ?></td>
                          <td><?php echo $menucek['hakkimizda_icerik']; ?></td>
                          <td><?php echo $menucek['hakkimizda_sıra']; ?></td>
                          <td><?php echo $menucek['hakkimizda_durum']; ?></td>
                          <form action="../netting/islem.php" enctype="multipart/form-data" method="POST" id="demo-form3" data-parsley-validate class="form-horizontal form-label-left">
                          <td><center><?php
                             
                            if ($menucek['hakkimizda_durum']==1) {?>
                              <button type="submit" name="maktif" class="btn btn-success btn-xs">aktif</button>
                              <input type="hidden" name="id" value="aktif">
                              <input type="hidden" name="hakkimizda_id" value="<?php echo $menucek['hakkimizda_id']; ?>">
                            <?php } else {?>
                              <input type="hidden" name="id" value="pasif">
                              <input type="hidden" name="hakkimizda_id" value="<?php echo $menucek['hakkimizda_id']; ?>">
                              <button type="submit" method="POST" name="mpasif"
                               class="btn btn-mutet btn-xs">pasif</button>
                              <?php } ?>
                          </td>
                        </center>
                          </form>
                         <td><a href="hak-duzenler.php?hakkimizda_id=<?php echo $menucek['hakkimizda_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                          <td><a href="../netting/islem.php?hakkimizda_id=<?php echo $menucek['hakkimizda_id']; ?>&menusil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                        </tr>


                         <?php }
                         ?>
                       
                      
                      </tbody>

                    </table>
                    <hr>
                      <!--renk ayarları--->

                  </div>
                </div>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>


<?php 
include 'footer.php'; ?>
