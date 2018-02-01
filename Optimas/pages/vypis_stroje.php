<?php
//
//vypis všech stroju a klintu  kteří jej vlastní/pornajímají
//
require 'model/klient.class.php';
require 'model/stroj.class.php';

$klient = new klient($mysqli);
$stroj  = new stroj($mysqli);

$stroje_info = $stroj->getStroje();

?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
       <div class="row">
         <div class="col-md-12">
             <h1 class="page-header spacer-top">Stroje</h1>
           <a href="?page=novy_stroj"class="btn btn-warning"><i class="fa fa-rocket" aria-hidden="true"></i> Přidat nový stroj</a>
          </div>
      <div class="col-lg-12 spacer-top">

        <div class="panel panel-default">
                    <div class="panel-heading">
                      Evidované stroje
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                  <tr>
                                      <th>Výrobce</th>
                                      <th>Typ</th>
                                      <th>Výrobní číslo</th>
                                      <th>Rok výroby</th>
                                      <th>Zákazník</th>
                                      <th>Poznámky</th>
                                      <th>Stav</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach($stroje_info as $stroj_info):
                                      if ($stroj_info['klient_id'] == NULL) {
                                        $nazev_firmy = "Není";
                                      } else {
                                        $klient_info = $klient->getKlient($stroj_info['klient_id']);
                                        $nazev_firmy = $klient_info['nazev_firmy'];
                                      }

                                   ?>
                                      <tr onclick="window.document.location='?page=nahled_stroje&id=<?php echo $stroj_info['id']; ?>';">
                                          <td><?php echo $stroj_info['vyrobce']; ?></td>
                                          <td><?php echo $stroj_info['typ']; ?></td>
                                          <td><?php echo $stroj_info['vyrobnicislo']; ?></td>
                                          <td><?php echo $stroj_info['rokvyroby']; ?></td>
                                          <th><b><?php echo $nazev_firmy; ?></b></th>
                                          <td><?php echo $stroj_info['poznamka']; ?></td>
                                          <td><?php echo $stroj_info['stav']; ?></td>
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
