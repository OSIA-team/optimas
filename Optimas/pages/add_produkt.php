<div id="wrapper">
<!-- Page Content -->
       <div id="page-wrapper">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-12">
                       <h1 class="page-header">Přidat produkt do systému</h1>
                       <?php
                          if (@isset($_GET['status']) AND $_GET['status']=="ok"):
                        ?>
                          <div class="alert alert-success" role="alert"> Vložení proběhlo úspěšně </div>
                        <?php
                          endif;
                          if(@isset($_GET['status']) AND $_GET['status']=="false"):
                        ?>
                          <div class="alert alert-warning" role="alert"> Při vkládáni se vyskytla chyba! Kontaktujte prosím podporu. </div>
                        <?php
                          endif;
                         ?>
                       <form role="form" method="POST" action="script/add_produkt.script.php">
                       <div class="col-md-6">
                           <div class="form-group col-md-8">
                               <label>Název produktu</label>
                               <input type="text" name="nazev_produktu" class="form-control" placeholder="kleště">
                           </div>
                           <div class="form-group col-md-4">
                               <label>Katalogové číslo</label>
                               <input type="text" name="kod_produktu" class="form-control" placeholder="554556">
                           </div>
                           <div class="form-group col-md-4">
                               <label>Cena v CZK</label>
                               <input type="text" name="cena" class="form-control" placeholder="999">
                           </div>
                           <div class="form-group col-md-4">
                               <label>Cena v EUR</label>
                               <input type="text" name="cena_eur" class="form-control" placeholder="999">
                           </div>
                               <div class="form-group col-md-12">
                                <input type="submit" name="pridat_produkt" class="btn btn-warning" value="Přidat"/>
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
   <script src="bower_components/jquery/dist/jquery.min.js"></script>

   <!-- Bootstrap Core JavaScript -->
   <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

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
