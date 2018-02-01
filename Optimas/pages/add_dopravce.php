<?php
//
//editace stroje
//
?>
<body>
<script>
    $(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
</script>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <div class="row">
             <div class="col-lg-6 spacer-top">
               <h1 class="page-header">Přidat dopravce do systému</h1>
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
               <form method="POST" action="script/add_dopravce.script.php">
                 <div class="form-group col-md-12">
                   <label for="dopravce">Název dopravce</label>
                    <input type="text" name="nazev" class="form-control" id="dopravce" placeholder="UPS, PPL, TRANS, ..."  />

                 </div>
                 <div class="col-md-12">
                       <button type="submit" name="pridat_dopravce" class="btn btn-warning" name="ulozit_poznamku"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>Přidat dopravce</button>
                  </div>
              </form>


                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="dist/js/sb-admin-2.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                    responsive: true
            });

            $('#auta_nahled').DataTable({
                    responsive: true
            });
        });

        </script>
