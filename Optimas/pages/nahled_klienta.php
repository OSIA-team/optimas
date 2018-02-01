<?php
// Náhled s vypisem klienta
require 'model/klient.class.php';
$klient = new klient($mysqli);
$klient_id    = $_GET['id'];

if (isset($_POST['ulozit_poznamku'])) {
  $poznamka = $_POST['poznamka'];
  $update   = array('poznamka' => "{$poznamka}");
  $where    = array('id' => $klient_id);

  $status = $klient_update = $klient->editKlient($update,$where);
}

$klient_info  = $klient->getKlient($klient_id);
?>

 <!-- Page Content -->
        <div id="page-wrapper">
        <div class="row">
                <!-- /.col-lg-12 -->
            </div>
            <div class="container-fluid">
                <div class="row">

                  <?php
                  if (isset($status) AND $status == true) {
                    echo "<div class=\"alert alert-success\" role=\"alert\">Úspěšně změněno!</div>";
                  } elseif (isset($status) AND $status == false) {
                    echo "<div class=\"alert alert-warning\" role=\"alert\">Při ukládání změn došlo k chybě!</div>";
                  }
                   ?>
                    <div class="col-lg-12 nahled">
                    <div class="col-md-12" style="margin-bottom: 20px">
                        <h1 class="page-header" style="margin-bottom: 0px"><?php echo $klient_info['nazev_firmy']; ?></h1>
                        <div class="col-md-2" style="margin: 0px;"><strong>Kód zákazníka</strong><br><?php echo $klient_info['kod_zakaznika']; ?></div>
                        <div class="bunka col-md-10">
                                  <div class="col-md-2">Stavební <i class="fa <?php echo ($klient_info['stavebni'] == 1)?"fa-check-circle":"fa-times-circle"; ?> fa-fw"></i></div>
                                  <div class="col-md-2">Obchodník <i class="fa <?php echo ($klient_info['obchodnik'] == 1)?"fa-check-circle":"fa-times-circle"; ?> fa-fw"></i></div>
                                  <div class="col-md-2">Živá <i class="fa <?php echo ($klient_info['ziva'] == 1)?"fa-check-circle":"fa-times-circle"; ?> fa-fw"></i></div>
                                  <div class="col-md-2">Wimag <i class="fa <?php echo ($klient_info['wimag'] == 1)?"fa-check-circle":"fa-times-circle"; ?> fa-fw"></i></div>
                                  <div class="col-md-2">Optimas <i class="fa <?php echo ($klient_info['optimas'] == 1)?"fa-check-circle":"fa-times-circle"; ?> fa-fw"></i></div>
                        </div>
                    </div>
              <!-- JEDNATELE -->
              <?php
                require 'model/jednatel.class.php';
                $jednatel       = new jednatel($mysqli);
                $jednatele_info  = $jednatel->getJednatelByKlient($klient_id,"*",0);

                foreach ($jednatele_info as $jednatel_info):
               ?>
                  	<div class="col-md-12" >
                      <div class="bunka col-md-1"><strong>Titul</strong><br><?php echo $jednatel_info['titul']; ?></div>
                  		<div class="bunka col-md-2"><strong>Jméno</strong><br><?php echo $jednatel_info['jmeno']; ?></div>
                      <div class="bunka col-md-2"><strong>Příjmení</strong><br><?php echo $jednatel_info['prijmeni']; ?></div>
                      <div class="bunka col-md-2"><strong>Funkce</strong><br><?php echo $jednatel_info['funkce']; ?></div>
                      <div class="bunka col-md-2"><strong>Mobil</strong><br><?php echo $jednatel_info['mobil']; ?></div>
                      <div class="bunka col-md-3"><strong>Email</strong><br><?php echo $jednatel_info['email']; ?></div>
                  	</div>
                <?php endforeach; ?>
                    <div class="col-md-7 spacer-top" >
                      <div class="bunka col-md-4">
                        <strong>Telefon</strong>
                        <div class="col-md-12"><?php echo $klient_info['telefon']; ?></div>
                      </div>
                      <div class="bunka col-md-4"><strong>E-mail</strong><br><a href="mailto:<?php echo $klient_info['email']; ?>"><?php echo $klient_info['email']; ?></a></div>
                      <div class="bunka col-md-4"><strong>WEB</strong><br><a href="http://<?php echo $klient_info['www']; ?>"><?php echo $klient_info['www']; ?></a></div>
                    </div>
                  	<div class="col-md-6">
                  		<div class="bunka col-md-12">
                        <strong>Adresa</strong><br>
                          <?php echo $klient_info['ulice']; ?> <br>
                  		    <?php echo $klient_info['psc']." ".$klient_info['mesto']; ?>  <br>
                          <?php echo $klient_info['zeme']; ?>
                      </div>
                      <div class="bunka col-md-12">
                        <strong>Zájem o starý stroj?</strong><br>
                        <span>
                          <?php
                            if ($klient_info['pouzitestroje'] != 0) {
                              echo "Ano";
                            } else {
                              echo "Ne";
                            }
                           ?>
                        <span>
                      </div>
                  	</div>
                    <div class="bunka col-md-6">
                        <strong>Poznámka</strong>
                        <form method="POST">
                        <textarea rows="7" style="width: 100%;" name="poznamka"><?php echo $klient_info['poznamka']; ?></textarea>
                    </div>
                    <div class="spacer-top col-md-12 text-right">
                      <button type="submit" class="btn btn-warning" name="ulozit_poznamku"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Uložit změny</button>
                    </form>
                      <a href="?page=edit_client&<?php echo "id=". $klient_id;?>" class="btn btn-warning text-right"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Upravit klienta</a>
                      <a href="?page=add_jednatel&<?php echo "id=". $klient_id;?>" class="btn btn-warning text-right"><i class="fa fa-user-plus" aria-hidden="true"></i> Přidat osobu</a>
                      <form method="POST" action="script/delete_klient.script.php" style="float: right; margin-left: 5px;" >
                        <input type="hidden" name="klient_id" value="<?php echo $klient_id; ?>" />
                        <input type="submit" class="btn btn-danger text-right" name="delete_klient"
                        onclick="return confirm('Opravdu chcete smazat klienta?')" value="Smazat klienta"/>
                      </form>
                    </div>
                    <div class="col-md-12 container">
                      <ul class="nav nav-pills nav-justified">
                        <li class="active"><a data-toggle="tab" href="#objednavky">Nabídky a objednávky</a></li>
                        <li><a data-toggle="tab" href="#jednani">Jednání</a></li>
                        <li><a data-toggle="tab" href="#stroje">Stroje</a></li>
                      </ul>

                      <div class="tab-content">
                        <div id="objednavky" class="tab-pane fade in active">
                          <div class="auta-vypis">
                              <!-- /.panel-heading -->
                              <div class="panel-body">
                                  <div class="table-responsive">
                                      <table class=" table table-striped table-bordered table-hover">
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
                                              require 'model/objednavka.class.php';
                                              require 'model/dopravce.class.php';

                                              $objednavka = new objednavka($mysqli);
                                              $dopravce   = new dopravce($mysqli);

                                              $objednavky_info = $objednavka->getObjednavkyByKlient($klient_id, "*", 0, "ORDER BY datumobjednavky DESC");
                                              foreach ($objednavky_info as $objednavka_info):
                                           ?>

                                              <tr onclick="window.document.location='?page=<?php echo ($objednavka_info['nabidka']==1)?"nabidka":"objednavka"; ?>&id=<?php echo $objednavka_info['id']; ?>';" <?php echo ($objednavka_info['datumvyrizeni'] == '0000-00-00')?"class=\"danger\"":""; ?> > <!-- pokud objednavka neni vyřízená přidá se třída .danger kvuli upozornění -->
                                                  <td><?php echo $objednavka_info['cislo_obj_nase']; ?></td>
                                                  <td><?php echo $objednavka_info['prijal']; ?></td>
                                                  <td><?php echo $objednavka_info['datumobjednavky']; ?></td>
                                                  <td><?php echo $objednavka_info['predmetobjednavky']; ?></td>
                                                  <td><?php echo ($objednavka_info['datumvyrizeni'] == '0000-00-00')?"":$objednavka_info['datumvyrizeni']; ?></td>
                                                  <td><?php echo ($objednavka_info['datumvyrizeni'] == '0000-00-00')?"Nevyřízeno":"Vyřízeno"; ?></td>
                                                  <td><?php echo $objednavka_info['cislo_obj_jejich']; ?></td>
                                                  <?php
                                                    $dopravce_info = $dopravce->getDopravceById($objednavka_info['jakvyridil']);
                                                   ?>
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
                        </div> <!-- lonec výpisu objednávek -->
<?php //require ('add_offer_from_client.php'); ?>
                      </div>

                        <div id="jednani" class="tab-pane fade">
                          <div class="auta-vypis">
                              <!-- /.panel-heading -->
                              <div class="panel-body">
                                  <div class="table-responsive">
                                      <table class=" table table-striped table-bordered table-hover">
                                          <thead>
                                              <tr>
                                                  <th>Datum jednání</th>
                                                  <th>Datum vyřízení</th>
                                                  <th>S kým</th>
                                                  <th>Kdo jednal</th>
                                                  <th>Kdo vyřídil</th>
                                                  <th>Předmět jednání</th>
                                              </tr>
                                          </thead>
                                          <tbody>

                                            <?php
                                                require 'model/jednani.class.php';

                                                $jednani = new jednani($mysqli);

                                                $jednani_info = $jednani->getJednaniByKlient($klient_id, "*", 0, "ORDER BY datumjednani DESC");
                                                foreach ($jednani_info as $jednani):
                                             ?>
                                                  <tr onclick="window.document.location='?page=jednani&id=<?php echo $jednani['id']; ?>';" <?php echo ($jednani['datumvyrizeni']=="0000-00-00")?"class=\"alert\"":""; ?>   >
                                                      <td><?php echo $jednani['datumjednani']; ?></td>
                                                      <td><?php echo ($jednani['datumvyrizeni']=="0000-00-00")?"":$jednani['datumvyrizeni']; ?></td>
                                                      <td><?php echo $jednani['skym']; ?></td>
                                                      <td><?php echo $jednani['kdojednal']; ?></td>
                                                      <td><?php echo $jednani['kdovyridil']; ?></td>
                                                      <td><?php echo $jednani['predmet_jednani']; ?></td>
                                                  </tr>
                                              <?php
                                                endforeach;
                                               ?>
                                          </tbody>
                                      </table>
                                  </div>
                                  <!-- /.table-responsive -->
                              </div>
                        </div>
<?php require ('add_jednani_from_client.php'); ?>
                      </div>
                        <div id="stroje" class="tab-pane fade">

                          <div class="auta-vypis">
                              <!-- /.panel-heading -->
                              <div class="panel-body">
                                  <div class="table-responsive">
                                      <table class=" table table-striped table-bordered table-hover">
                                          <thead>
                                              <tr>
                                                  <th>Výrobce</th>
                                                  <th>Typ</th>
                                                  <th>Výrobní číslo</th>
                                                  <th>Rok výroby</th>
                                                  <th>Poznámky</th>
                                                  <th>Stav</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                              require 'model/stroj.class.php';
                                              $stroj = new stroj($mysqli);

                                              $stroje_info = $stroj->getStrojeByKlient($klient_id, "*", 0);
                                              foreach($stroje_info as $stroj_info):
                                             ?>
                                                  <tr onclick="window.document.location='?page=nahled_stroje&id=<?php echo $stroj_info['id']; ?>';">
                                                      <td><?php echo $stroj_info['vyrobce']; ?></td>
                                                      <td><?php echo $stroj_info['typ']; ?></td>
                                                      <td><?php echo $stroj_info['vyrobnicislo']; ?></td>
                                                      <td><?php echo $stroj_info['rokvyroby']; ?></td>
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
                        </div>
                        <a href="?page=stroje" class="btn btn-info">Přidat stroj</a>
                      </div>
                    </div>

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
