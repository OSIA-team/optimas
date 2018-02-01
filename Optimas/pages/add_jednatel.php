
  <div id="wrapper">
  <!-- Page Content -->
         <div id="page-wrapper">
           <?php
           require 'model/klient.class.php';

           $klient_id    = (integer)$_GET['id'];
           $klient       = new klient($mysqli);
           $klient_info  = $klient->getKlient($klient_id);
            ?>

             <div class="container-fluid">
                 <div class="row">
                     <div class="col-lg-12">
                         <h1 class="page-header">Přiřadit kontaktní osobu k <?php echo $klient_info['nazev_firmy']; ?> </h1>
                         <form role="form" method="POST" id="add_jednatel" action="script/add_jednatel.script.php">
                         <div class="col-md-12">
                           <div class="col-md-6">
                               <div class="form-group col-md-3">
                                   <label>titul</label>
                                   <input type="text" name="titul" class="form-control">
                               </div>
                               <div class="form-group col-md-4">
                                   <label>Jméno</label>
                                   <input type="text" name="jmeno" class="form-control">
                               </div>
                               <div class="form-group col-md-5">
                                   <label>Přijmení</label>
                                   <input type="text" name="prijmeni" class="form-control">
                               </div>
                               <div class="form-group col-md-4">
                                   <label>Funkce</label>
                                   <input type="text" name="funkce" class="form-control">
                               </div>


                               <div class="form-group col-md-4">
                                   <label>Mobil</label>
                                   <input type="text" name="mobil" class="form-control">
                               </div>

                               <div class="form-group col-md-4">
                                   <label>Email</label>
                                   <input type="text" name="email" class="form-control">
                               </div>

                             </div>
                           </div>
                             <div class="col-md-12">
                                 <div class="form-group col-md-12">
                                  <input type="hidden" name="klient_id" value="<?php echo @$_GET['id']; ?>" />
                                  <input type="submit" name="pridat_jednatele" class="btn btn-warning" value="Přidat"/>
                                </div>
                             </div>
                         </form>

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
