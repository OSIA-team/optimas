<?php
//
//nahled stroje
//
require 'model/stroj.class.php';
require 'model/klient.class.php';

$stroj_id = $_GET['id'];

$stroj  = new stroj($mysqli);



if (@isset($_GET['delete']) AND $_GET['delete']== true) {
  $delete_stroj = $stroj->deleteStroj($stroj_id);
  if ($delete_stroj) {

  } else {
    echo "error";
  }

} else {
  $delete_stroj = FALSE;

  $klient = new klient($mysqli);

  $stroj_info = $stroj->getStroj($stroj_id);

  if (($stroj_info['klient_id'] == NULL) OR ($stroj_info['klient_id'] == 0)) {
    $nazev_firmy = "-"; $kod_zakaznika = "-"; $klient_id = "";

  } else {
    $klient_info    = $klient->getKlient($stroj_info['klient_id']);
    $nazev_firmy    = $klient_info['nazev_firmy'];
    $kod_zakaznika  = $klient_info['kod_zakaznika'];
    $klient_id      = $klient_info['id'];

  }
}

?>
<!-- Page Content -->
       <div id="page-wrapper">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-12 nahled">
                     <div class="">
                       <a href="?page=novy_stroj"class="btn btn-warning"><i class="fa fa-rocket" aria-hidden="true"></i> Přidat nový stroj</a>
                     </div>
                     <?php if ($delete_stroj): ?>
                         <div class="alert alert-danger" role="alert">Stroj neexistuje</div>
                     <?php
                           die();
                           endif;
                      ?>
                       <h1 class="page-header spacer-top">Náhled stroje <?php echo $stroj_info['vyrobce']." ".$stroj_info['typ']; ?></h1>
                         <div class="col-md-12 spacer-top">
                           <div class="bunka col-md-4"><strong>Zákazník</strong><br>
                             <?php
                                if ($klient_id != ""):
                              ?>
                                  <a href="?page=nahled_klient&id=<?php echo $klient_id; ?>"><?php echo $nazev_firmy; ?></a></div>
                              <?php
                                endif;
                                if ($klient_id == ""):
                              ?>
                                <?php echo $nazev_firmy; ?></div>
                              <?php
                                endif;
                              ?>



                           <div class="bunka col-md-8"><strong>Kód Zákazníka</strong><br><?php echo $kod_zakaznika; ?></div>
                           <div class="bunka col-md-3"><strong>Výrobce</strong><br><?php echo $stroj_info['vyrobce']; ?></div>
                           <div class="bunka col-md-3"><strong>Typ</strong><br><?php echo $stroj_info['typ']; ?></div>
                           <div class="bunka col-md-6"><strong>Výrobní číslo</strong><br><?php echo $stroj_info['vyrobnicislo']; ?></div>
                           <div class="bunka col-md-3"><strong>Rok vyroby</strong><br><?php echo $stroj_info['rokvyroby']; ?></div>
                           <div class="bunka col-md-3"><strong>Stav</strong><br><?php echo $stroj_info['stav']; ?></div>
                           </div>

                         <div class="spacer-top col-md-12" style="margin-top: 30px">
                           <div class="col-md-6"><strong>Poznámka ke stroji</strong><br>
                             <p>
                                <?php echo $stroj_info['poznamka']; ?>
                             </p>
                           </div>
                         </div>
                         <div class="spacer-top col-md-12">
                           <div class="col-md-6">
                           <a href="?page=edit_stroje&id=<?php echo $stroj_id; ?>"class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editovat stroj</a>
                           <a href="?page=nahled_stroje&id=<?php echo $stroj_id; ?>&delete=true"class="btn btn-danger" onclick="return confirm('Opravdu chcete smazat tento stroj?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Smazat stroj</a>
                         </div>
                         </div>
                   </div>
                   <!-- /.col-lg-12 -->

               </div>
               <!-- /.row -->
           </div>
           <!-- /.container-fluid -->
       </div>
       <!-- /#page-wrapper -->

   </div>
   <!-- /#wrapper -->

   <!-- jQuery -->
   <script src="bower_components/jquery/dist/jquery.min.js"></script>

   <!-- Bootstrap Core JavaScript -->
   <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

   <!-- Metis Menu Plugin JavaScript -->
   <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

   <!-- Custom Theme JavaScript -->
   <script src="dist/js/sb-admin-2.js"></script>
