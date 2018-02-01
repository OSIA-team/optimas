<?php
require 'model/klient.class.php';
require 'model/jednatel.class.php';
$klienti      = new klient($mysqli);
$klienti_info = $klienti->getKlienti();

$jednatel = new jednatel($mysqli);
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
                 <h1 class="page-header spacer-top">Zákazníci</h1>
               <a href="?page=add_client"class="btn btn-warning"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Založit nového zákazníka</a>
              </div>
          <div class="col-lg-12 spacer-top">

            <div class="panel panel-default">
                        <div class="panel-heading">
                            Zákazníci v databázi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                         	<th>Kód zákazníka</th>
                                         	<th>Firma</th>
              								            <th>Jméno</th>
              							              <th>Ulice</th>
              								            <th>Město</th>
              								            <th>PSČ</th>
              								            <th>Země</th>
              								            <th>Telefon</th>
              								            <th>E-mail</th>
              								           </tr>
                                    </thead>
                                    <tbody>
<?php
foreach ($klienti_info as $row) {
  echo "<tr class=\"odd clickable-table gradeX\" onclick=\"window.document.location='?page=nahled_klient&id={$row['id']}';\">";
    echo "<td>{$row['kod_zakaznika']}</td>";
    echo "<td>{$row['nazev_firmy']}</td>";
      $jednatel_info = $jednatel->getJednatelByKlient($row['id'], "jmeno, prijmeni");
      echo "<td>{$jednatel_info['jmeno']} {$jednatel_info['prijmeni']}</td>";
    echo "<td>{$row['ulice']}</td>";
    echo "<td>{$row['mesto']}</td>";
    echo "<td>{$row['psc']}</td>";
    echo "<td>{$row['zeme']}</td>";
    echo "<td>{$row['telefon']}</td>";
    echo "<td>{$row['email']}</td>";
  echo "</tr>";
}
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
