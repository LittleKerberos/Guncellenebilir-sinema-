<?php 
include 'header.php'; 
include '../netting/baglan.php';
$ayarsor = $db->prepare("SELECT * FROM ayar");
$ayarsor->execute();
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
                    <h3>Renk Listeleme</h3>
                    <ul class="nav navbar-right panel_toolbox">                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  

        <div class="x_content">

          <!-- Div İçerik Başlangıç-->

           <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Arkaplan Renk</th>
                          <th>Yazı Renk</th>
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
                         <td><center><a href="renk-duzenle.php?renk_id=<?php echo $ayarcek['ayar_id']; ?>&eski_sira=<?php echo $ayarcek['ayar_sira']?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>  
                        </tr>


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
        <!-- /page content -->
<?php include 'footer.php'; ?>