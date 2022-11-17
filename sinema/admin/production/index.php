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
                         <td><center><a href="hak-duzenler.php?hakkimizda_id=<?php echo $menucek['hakkimizda_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                          <td><center><a href="../netting/islem.php?hakkimizda_id=<?php echo $menucek['hakkimizda_id']; ?>&menusil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                        </tr>


                         <?php }
                         ?>
                       
                      
                      </tbody>

                    </table>
                    <hr>
                      <!--renk ayarları--->
         <label style="color:green;" >FOOTER RENK AYARLARI</label>
             <table style="border:1px solid green;  background: green; color: black;" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr style="color:white;">
                          <th >Sıra No</th>
                          <th>Footer Arkaplan Renk</th>
                          <th>Footer Yazı Renk</th>
                          <th>Düzenle</th>
                        </tr>
                      </thead>

                      <tbody>

                        <?php 
                        $say=0;

                          while($ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC)) { $say++?>

                        <tr>
                          <td><?php echo $say ?></td>
                          <td><?php echo $ayarcek['ayar_renk']; ?></td>
                          <td><?php echo $ayarcek['ayar_renk2']; ?></td>
                          <form action="../netting/islem.php" enctype="multipart/form-data" method="POST" id="demo-form3" data-parsley-validate class="form-horizontal form-label-left">
                        </center>
                          </form>
                         <td>
                        <a href="renk-duzenle.php?ayar_id=<?php echo $ayarcek['ayar_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button>
                        </tr>
                         <?php }
                         ?>
                        </tbody>
                        </table>
                          <hr>
                      <!--slider ayarları---><hr>
             <label style="color:orange;">DİĞER AYARLAR (BODY-LOGO-TİTLE) </label>
             <table style="border:1px solid orange; background: orange; color: black;" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr style="color:white;">
                          <th>Sıra No</th>
                          <th>Arkaplan Renk</th>
                          <th>Yazı Renk</th>
                          <th>Sticky Menü Renk</th>
                          <th>Sticky Yazı Renk</th>
                          <th>Font Family</th>
                          <th>Font Size</th>
                          <th>Tittle</th>
                          <th>Logo</th>
                          <th>Düzenle</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $say=0;
                        while($ayarcek = $ayarsor2->fetch(PDO::FETCH_ASSOC)) { $say++?>
                        <tr>
                          <td><?php echo $say ?></td>
                          <td><?php echo $ayarcek['ayar_renk3']; ?></td>
                          <td><?php echo $ayarcek['ayar_renk4']; ?></td>
                          <td> <?php echo $ayarcek['ayar_sticky']; ?> </td>
                           <td> <?php echo $ayarcek['ayar_sticky2']; ?> </td>
                          <td><?php echo $ayarcek['ayar_font']; ?></td>
                          <td><?php echo $ayarcek['ayar_size'];?></td>
                          <td><?php echo $ayarcek['ayar_title'];?></td>
                          <td><?php echo $ayarcek['ayar_logo'];?></td>
                          <form action="../netting/islem.php" enctype="multipart/form-data" method="POST" id="demo-form3" data-parsley-validate class="form-horizontal form-label-left">
                        </center>
                          </form>
                         <td>
                          <center>
                            <a href="body-duzenle.php?ayar_id=<?php echo $ayarcek['ayar_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button>
                            </a>
                          </center>
                        </td>                
                        </tr>                   
                         <?php }
                         ?>
                        </tbody>
                        </table>

                  <label style="color:purple;">İCON AYARLARI</label>
                         <table style="border:1px solid purple; background: purple; color: black;" id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr style="color:white;">
                          <th>Sıra No</th>
                          <th>Facebook</th>
                          <th>Twitter</th>
                          <th>İnstagram</th>
                          <th>Github</th>
                          <th>Youtube</th>
                          <th>Linked İn</th>
                          <th>Düzenle</th>
                        </tr>
                      </thead>
                      <tbody style="font-size: 12px;">
                        <?php 
                        $say=0;
                        while($ayarcek = $ayarsor3->fetch(PDO::FETCH_ASSOC)) { $say++?>
                        <tr>
                          <td><?php echo $say ?></td>
                          <td><?php echo $ayarcek['ayar_facebook']; ?></td>
                          <td><?php echo $ayarcek['ayar_twitter']; ?></td>
                          <td><?php echo $ayarcek['ayar_instagram']; ?></td>
                          <td><?php echo $ayarcek['ayar_github']; ?></td>
                          <td><?php echo $ayarcek['ayar_pinterest'];?></td>
                          <td><?php echo $ayarcek['ayar_linkedin'];?></td>
                          <td> <a href="icon-duzenle.php?renk_id=<?php echo $ayarcek['ayar_id']; ?>"><button class="btn btn-primary btn-xs"> Düzenle </button></a></td>
                          <form action="../netting/islem.php" enctype="multipart/form-data" method="POST" id="demo-form3" data-parsley-validate class="form-horizontal form-label-left">                   
                        </center>
                          </form>
                         <?php }
                         ?>
                        </tbody>
                        </table>   
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
