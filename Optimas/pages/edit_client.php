<?php
//
//editace klienta
//
require 'model/klient.class.php';
$klient_id = $_GET['id'];

$klient = new klient($mysqli);
$klient_info = $klient->getKlient($klient_id);

?>
<div id="wrapper">
<!-- Page Content -->
       <div id="page-wrapper">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-12">
                       <h1 class="page-header">Editace klienta <?php echo $klient_info['nazev_firmy']; ?></h1>
                       <form role="form" method="POST" id="edit_klient" action="script/edit_client.script.php">
                       <div class="col-md-6">
                           <div class="form-group col-md-8">
                               <label>Název firmy</label>
                               <input type="text" name="nazev_firmy" class="form-control" value="<?php echo $klient_info['nazev_firmy']; ?>">
                           </div>
                           <div class="form-group col-md-4">
                               <label>Kód zákazníka</label>
                               <input type="text" name="kod_zakaznika" class="form-control" value="<?php echo $klient_info['kod_zakaznika']; ?>">
                           </div>
                           <div class="form-group col-md-12">
                             <label class="checkbox-inline">
                               <input type="checkbox" id="inlineCheckbox1" name="stavebni" value="Stavební" <?php echo ($klient_info['stavebni']==1) ? "checked" : "" ; ?>  > Stavební
                             </label>
                             <label class="checkbox-inline">
                               <input type="checkbox" id="inlineCheckbox2" name="obchodnik" value="Obchodník" <?php echo ($klient_info['obchodnik']==1) ? "checked" : "" ; ?>> Obchnodník
                             </label>
                             <label class="checkbox-inline">
                               <input type="checkbox" id="inlineCheckbox3" name="ziva" value="Živá" <?php echo ($klient_info['ziva']==1) ? "checked" : "" ; ?>> Živá
                             </label>
                             <label class="checkbox-inline">
                               <input type="checkbox" id="inlineCheckbox4" name="wimag" value="wimag" <?php echo ($klient_info['wimag']==1) ? "checked" : "" ; ?>> Wimag
                             </label>
                             <label class="checkbox-inline">
                               <input type="checkbox" id="inlineCheckbox5" name="optimas" value="optimas" <?php echo ($klient_info['optimas']==1) ? "checked" : "" ; ?>> Optimas
                             </label>
                             <label class="checkbox-inline">
                               <input type="checkbox" id="ZajemoStroj" name="pouzitestroje" value="ojetina" <?php echo ($klient_info['pouzitestroje']==1) ? "checked" : "" ; ?>> <b>Zájem o použitý stroj</b>
                            </label>
                         </div>
                         <div class="spacer-top"></div>
                           <div class="form-group col-md-12">
                               <label>Ulice a č.p.</label>
                               <input type="text" name="ulice" class="form-control" value="<?php echo $klient_info['ulice']; ?>">
                           </div>
                           <div class="form-group col-md-4">
                               <label>Město</label>
                               <input type="text" name="mesto" class="form-control" value="<?php echo $klient_info['mesto']; ?>">
                           </div>
                           <div class="form-group col-md-3">
                               <label>PSČ</label>
                               <input type="text" name="psc" class="form-control" value="<?php echo $klient_info['psc']; ?>">
                           </div>
                           <div class="form-group col-md-5">
                               <label>Stát</label>
                               <select name="zeme" class="form-control">
                                 <option <?php echo ($klient_info['zeme']=="ČR") ? "selected" : "" ; ?> value="ČR">Česká republika</option>
                                 <option <?php echo ($klient_info['zeme']=="SR") ? "selected" : "" ; ?> value="SR">Slovensko</option>
                               </select>
                           </div>
                         </div>

                         <div class="col-md-6">
                           <div class="col-md-12"></div>
                             <div class="form-group col-md-6">
                                 <label>Telefon</label>
                                 <input type="text" name="telefon" class="form-control" value="<?php echo $klient_info['telefon']; ?>">
                             </div>
                             <div class="form-group col-md-6">
                                 <label>Email</label>
                                 <input type="text" name="email" class="form-control" value="<?php echo $klient_info['email']; ?>">
                             </div>
                             <div class="form-group col-md-6">
                                 <label>Web</label>
                                 <input type="text" name="www" class="form-control" value="<?php echo $klient_info['www']; ?>">
                             </div>
                          </div>

                   </div>
                   <!-- /.col-lg-12 -->
                   <div class="col-md-12">
                       <div class="form-group col-md-12">
                        <input type="hidden" name="klient_id" value="<?php echo $_GET['id']; ?>"/>
                        <input type="submit" name="Editovat" class="btn btn-warning" value="Uložit"/>
                      </div>
                   </div>
</form>
               </div>
               <!-- /.row -->
           </div>
           <!-- /.container-fluid -->
       </div>
       <!-- /#page-wrapper -->
 </div>
   <!-- /#wrapper -->

<!-- jQuery -->
    <script src="js/jquery-1.7.1.min.js"></script>
   <script src="bower_components/jquery/dist/jquery.min.js"></script>

   <!-- Bootstrap Core JavaScript -->
   <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
   <script src="js/jquery.validate.js"></script>
   <script src="js/script.js"></script>
   <!-- Metis Menu Plugin JavaScript -->
   <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

   <!-- Custom Theme JavaScript -->
   <script src="dist/js/sb-admin-2.js"></script>

   <!-- DataTables JavaScript -->
   <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
   <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
   <!-- Page-Level Demo Scripts - Tables - Use for reference -->
   <script>
       $(document).ready(function() {
           $('#auto-klient').DataTable({
                   responsive: true
           });

           $(".dropdown-toggle").click(function(){
               $("#auta-klient-tabulka").show();
               });
       });

   </script>
