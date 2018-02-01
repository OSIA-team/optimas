<?php
//
//Nekompletní objednávky
//
require 'model/objednavka.class.php';
require 'model/dopravce.class.php';

$objednavka       = new objednavka($mysqli);
$objednavky_info  = $objednavka->getObjednavkyByStav(NULL, FALSE, "nabidka = 0");


$dopravce = new dopravce($mysqli);
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
       <div class="row">
         <div class="col-md-12">
             <h1 class="page-header spacer-top">Všechny evidované objednávky</h1>
          </div>
      <div class="col-lg-12 spacer-top">

        <div class="panel panel-default">
                    <div class="panel-heading">
                       Vyřízené objednávky
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                  <tr>
                                      <th>Číslo objednávky</th>
                                      <th>Přijal</th>
                                      <th>Objendáno</th>
                                      <th>Poznámky</th>
                                      <th>Datum vyřízení</th>
                                      <th>Stav</th>
                                      <th>Číslo obj. klienta</th>
                                      <th>Dopravce</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach($objednavky_info as $objednavka_info):
                                      $dopravce_info = $dopravce->getDopravceById($objednavka_info['jakvyridil'])
                                   ?>
                                      <tr onclick="window.document.location='?page=objednavka&id=<?php echo $objednavka_info['id']; ?>';"
                                        class="<?php echo ($objednavka_info['datumvyrizeni'] == "0000-00-00")?"danger":"success"; ?>">
                                          <td><?php echo $objednavka_info['cislo_obj_nase']; ?></td>
                                          <td><?php echo $objednavka_info['prijal']; ?></td>
                                          <td><?php echo $objednavka_info['datumobjednavky']; ?></td>
                                          <td><?php echo $objednavka_info['predmetobjednavky']; ?></td>
                                          <td><?php echo $objednavka_info['datumvyrizeni']; ?></td>
                                          <td><?php echo ($objednavka_info['datumvyrizeni'] == "0000-00-00")?"Nevyřízeno":"Vyřízeno"; ?></td>
                                          <td><?php echo $objednavka_info['cislo_obj_jejich']; ?></td>
                                          <td><?php echo $dopravce_info['nazev']; ?></td>
                                      </tr>
                                  <?php
                                    endforeach;
                                   ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

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
