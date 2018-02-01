<?php
require 'model/jednani.class.php';
require 'model/klient.class.php';

$klient = new klient($mysqli);

$jednani = new jednani($mysqli);
$jednani_info = $jednani->getJednaniByStav(false); // puvodne getAllJednani();


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
             <div class="bunka col-md-12">
                 <h1 class="page-header spacer-top">Nevyřízené jednání</h1>
               <a href="?page=add_jednani"class="btn btn-warning"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Založit nového jednání</a>
              </div>
          <div class="col-lg-12 spacer-top">

            <div class="panel panel-default">
                        <div class="panel-heading">
                           Jednání s klienty
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                         	<th>Zákazník</th>
                                         	<th>Datum jednání</th>
              								            <th>S kým</th>
              							              <th>Kdo</th>
              								            <th>Předmět jednání</th>
              								            <th>Datum vyřízení</th>
              								            <th>Vyřídil</th>
            								           </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          foreach($jednani_info as $jednani):
                                            $klient_info = $klient->getKlient($jednani['klient_id']);
                                         ?>
                                            <tr class="odd clickable-table gradeX" onclick="window.document.location='?page=jednani&id=<?php echo $jednani['id']; ?>';" class="success">
                            								 			      <td><?php echo $klient_info['nazev_firmy']; ?></td>
                            								            <td><?php echo $jednani['datumjednani']; ?></td>
                            								            <td><?php echo $jednani['skym']; ?></td>
                            								            <td><?php echo $jednani['kdojednal']; ?></td>
                            								            <td><?php echo $jednani['predmet_jednani']; ?></td>
                            								            <td><?php echo ($jednani['datumvyrizeni'] == "0000-00-00")?"Nevyřízeno":$jednani['datumvyrizeni']; ?></td>
                            								            <td><?php echo ($jednani['kdovyridil'] == "")?"":$jednani['kdovyridil']; ?></td>
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
