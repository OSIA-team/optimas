<?php
require 'model/klient.class.php';
require 'model/jednani.class.php';
require 'model/objednavka.class.php';

$klient     = new klient($mysqli);
$jednani    = new jednani($mysqli);
$objednavka = new objednavka($mysqli);

$klienti_pocet    = $klient->getKlienti(NULL, TRUE);
$jednani_pocet    = $jednani->getJednaniByStav(FALSE, TRUE);
$objednavka_pocet = $objednavka->getObjednavkyByStav(FALSE, TRUE, "nabidka = 0");
$nabidka_pocet    = $objednavka->getObjednavkyByStav(NULL, TRUE, "nabidka = 1");
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
                  <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success" >
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $klienti_pocet; ?></div>
                                    <div>Klientů</div>
                                </div>
                            </div>
                        </div>
                        <a href="?page=klienti">
                          <div class="panel-footer">
                            <span class="pull-left">Zobrazit</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span><div class="clearfix"></div>
                          </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-calculator fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $nabidka_pocet; ?></div>
                                    <div>Nabídek</div>
                                </div>
                            </div>
                        </div>
                        <a href="?page=nabidky">
                          <div class="panel-footer">
                            <span class="pull-left">Zobrazit</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span><div class="clearfix"></div>
                          </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $objednavka_pocet; ?></div>
                                    <div>Nevyříz. objednávek</div>
                                </div>
                            </div>
                        </div>
                        <a href="?page=nevyrizene_objednavky">
                          <div class="panel-footer">
                            <span class="pull-left">Zobrazit</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span><div class="clearfix"></div>
                          </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-calendar fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jednani_pocet; ?></div>
                                    <div>Nevyříz. jednání</div>
                                </div>
                            </div>
                        </div>
                        <a href="?page=vypisJednani">
                          <div class="panel-footer">
                            <span class="pull-left">Zobrazit</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span><div class="clearfix"></div>
                          </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
           <div class="row">
                <div class="col-lg-12">
              <?php /*   <div class="col-lg-6" style="padding: 0px;">
                  <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Payment Received
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>













             <div class="panel panel-default">
                        <div class="panel-heading">
                           Klienti v databázi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Jméno</th>
                                            <th>Přijmení</th>
                                            <th>Telefon</th>
                                            <th>E-mail</th>
                                            <th>Město</th>
                                            <th>Ulice</th>
                                            <th>PSČ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="odd clickable-table gradeX" onclick="window.document.location='?p=nahled_klient&id=1';">
                                            <td>Patrik</td>
                                            <td>Šafář</td>
                                            <td>736289288</td>
                                            <td>safarpatrik@seznam.cz</td>
                                            <td>Brno</td>
                                            <td>palackého třída 55</td>
                                            <td>612 00</td>
                                        </tr>

                                        <tr class="odd clickable-table gradeX" onclick="window.document.location='?p=nahled_klient&id=2';">
                                            <td>Radan</td>
                                            <td>Dolihal</td>
                                            <td>739999999</td>
                                            <td>radan.prcek@gmail.com</td>
                                            <td>Rosice</td>
                                            <td>Podzahradní 12</td>
                                            <td>664 00</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->


                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Auta v databázi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="auta_nahled">
                                    <thead>
                                        <tr>
                                            <th>Jméno</th>
                                            <th>Přijmení</th>
                                            <th>Telefon</th>
                                            <th>E-mail</th>
                                            <th>Město</th>
                                            <th>Ulice</th>
                                            <th>PSČ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="odd clickable-table gradeX" onclick="window.document.location='?p=nahled_autaid=1';">
                                            <td>Patrik</td>
                                            <td>Šafář</td>
                                            <td>736289288</td>
                                            <td>safarpatrik@seznam.cz</td>
                                            <td>Brno</td>
                                            <td>palackého třída 55</td>
                                            <td>612 00</td>
                                        </tr>

                                        <tr class="odd clickable-table gradeX" onclick="window.document.location='?p=nahled_auta&id=2';">
                                            <td>Radan</td>
                                            <td>Dolihal</td>
                                            <td>739999999</td>
                                            <td>radan.prcek@gmail.com</td>
                                            <td>Rosice</td>
                                            <td>Podzahradní 12</td>
                                            <td>664 00</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
*/ ?>

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
