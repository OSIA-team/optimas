<?php
//
//Sestavy z databáze
//
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
       <div class="row">
         <div class="col-md-12">
             <h1 class="page-header spacer-top">Sestavy</h1>
          </div>
      <div class="col-lg-12 spacer-top">

        <div class="panel panel-default">
                    <div class="panel-heading">
                      Zákazníci se zájmem o ojeté stroje
                      <?php
                        require 'model/klient.class.php';
                        $klient = new klient($mysqli);

                        $klienti_info = $klient->getKlienti(NULL, FALSE, "pouzitestroje = 1");
                        //var_dump($klienti_info);
                       ?>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                  <tr>
                                      <th>Firma</th>
                                      <th>Město</th>
                                      <th>PSČ</th>
                                      <th>Telefon</th>
                                      <th>Email</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach ($klienti_info as $klient_info):
                                   ?>
                                      <tr onclick="window.document.location='?page=nahled_klient&id=<?php echo $klient_info['id']; ?>';">
                                              <td><?php echo $klient_info['nazev_firmy']; ?></td>
                                              <td><?php echo $klient_info['mesto']; ?></td>
                                              <td><?php echo $klient_info['psc']; ?></td>
                                              <td><?php echo $klient_info['telefon']; ?></td>
                                              <th><b><?php echo $klient_info['email']; ?></b></th>
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
