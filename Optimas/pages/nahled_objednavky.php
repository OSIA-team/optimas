<?php
//nahled s vypisem klienta
require 'model/objednavka.class.php';
$objednavka_id = $_GET['id'];
$objednavka = new objednavka($mysqli);


if (@isset($_GET['delete']) AND $_GET['delete']== true) {
  $delete_objednavka = $objednavka->deleteObjednavka($objednavka_id);
  if ($delete_objednavka) {

  } else {
    echo "error";
  }

} else {
  $delete_objednavka = FALSE;

  require 'model/klient.class.php';
  require 'model/dopravce.class.php';


  $klient     = new klient($mysqli);
  $dopravce   = new dopravce($mysqli);


  $objednavka_info  = $objednavka->getObjednavka($objednavka_id);
  // Cena celkem a filter na cenu eura nebo czk :)
  $cena         = ($objednavka_info['eur'] == 1)?'cena_eur':'cena';
  $cena_celkem  = 0;


  $klient_info      = $klient->getKlient($objednavka_info['klient_id']);
  $dopravce_info    = $dopravce->getDopravceById($objednavka_info['jakvyridil']);

}

?>

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 nahled">
                    <?php if ($delete_objednavka): ?>
                        <div class="alert alert-danger" role="alert">Objednávka neexistuje</div>
                    <?php
                          die();
                          endif;
                     ?>
                        <h1 class="page-header spacer-top">Náhled objednavky <?php echo $objednavka_info['cislo_obj_nase']; ?></h1>
                        	<div class="col-md-12 spacer-top">
	                      		<div class="bunka col-md-4"><strong>Zákazník</strong><br><a href="?page=nahled_klient&id=<?php echo $klient_info['id'] ?>"><?php echo $klient_info['nazev_firmy']; ?></a></div>
	                      		<div class="bunka col-md-4"><strong>Kód Zákazníka</strong><br><?php echo $klient_info['kod_zakaznika']; ?></div>
                            <div class="bunka col-md-4"><strong>Číslo objednávky zákazníka</strong><br><?php echo $objednavka_info['cislo_obj_jejich']; ?></div>
	                      		<div class="bunka col-md-4"><strong>Datum objednávky</strong><br><strong><?php echo $objednavka_info['datumobjednavky']; ?></strong></div>
	                      		<div class="bunka col-md-8"><strong>Objednavku přijal</strong><br><?php echo $objednavka_info['prijal']; ?></div>
	                      	 	</div>
	                      	<div class="col-md-12">
                            <div class="bunka col-md-4"><strong>Datum vyřízení</strong><br><?php echo ($objednavka_info['datumvyrizeni'] == '0000-00-00')?"":$objednavka_info['datumvyrizeni']; ?></div>
	                      		<div class="bunka col-md-4"><strong>Objednavku vyřídil</strong><br><?php echo ($objednavka_info['vyridil'] == '')?"":$objednavka_info['vyridil']; ?></div>
	                      		<div class="bunka col-md-4"><strong>Způsob vyřízení</strong><br><?php echo $dopravce_info['nazev']; ?></div>
	                      	</div>
	                      	<div class="spacer-top col-md-5" style="margin-top: 30px">
	                      		<div class="col-md-6"><strong>Předmět objednávky</strong><br>
                              <p>
                                <?php echo $objednavka_info['predmetobjednavky']; ?>
                              </p>
                            </div>
	                      	</div>
                          <div class="col-md-7 nabidka spacer top" style="margin-top: 30px;">
                            <table class="form-table col-md-12 .table-striped">
                              <title>Předmět objednavky</title>
                              <?php
                                $produkty_info = $objednavka->getProduktyByObj($objednavka_id);
                              ?>
                              <tr><th>Katalog. číslo</th><th>Název produktu</th><th>Cena za kus</th><th>Množství</th><th>Celkem</th></tr>
                              <?php
                                foreach($produkty_info as $produkt_info):
                               ?>
                                    <tr>
                                        <td><?php echo $produkt_info['katalog_id']; ?></td><td><?php echo $produkt_info['nazevproduktu']; ?></td>
                                        <td><?php echo $produkt_info[$cena]; ?></td><td><?php echo $produkt_info['kolik']; ?></td>
                                        <td><?php echo $produkt_info[$cena]*$produkt_info['kolik']; ?></td>
                                    </tr>
                              <?php
                                $cena_celkem = $cena_celkem+($produkt_info[$cena]*$produkt_info['kolik']);
                                endforeach;
                               ?>
                                  <tr>
                                    <td colspan="5">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="5">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" class="text-right"><b>Sleva </b></td><td colspan="2" class="text-center"><b><?php echo $objednavka_info['sleva']; ?> <span> % </span></b></td>
                                  </tr>
                                  <tr>
                                    <?php
                                       $sleva        = ($cena_celkem/100)*$objednavka_info['sleva'];
                                       $cena_celkem  = $cena_celkem-$sleva;
                                       $cena_celkem  = floatval($cena_celkem);
                                     ?>
                                    <td colspan="3" class="text-right"><b>Celkem za objednávku </b></td><td colspan="2" class="text-center"><b><?php echo $cena_celkem; ?>
                                      <span> <?php echo ($objednavka_info['eur'] == 1)?"EUR":"CZK"; ?> </span></b></td>
                                  </tr>
                            </table>
                          </div>
                          <div class="spacer-top col-md-12">
                            <div class="col-md-6">
                              <a href="faktura.php?id=<?php echo $objednavka_id; ?>" target="_blank" class="btn btn-warning disabled"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span> Generovat fakturu</a>
                            </div>
                            <div class="col-md-6 text-right">
                            <a href="?page=edit_objednavka&id=<?php echo $objednavka_id; ?>"class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editovat objednavku</a>
                            <a href="?page=objednavka&id=<?php echo $objednavka_id; ?>&delete=true"class="btn btn-danger" onclick="return confirm('Opravdu chcete smazat tuto objednavku?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Smazat objednávku</a>
                          </div>
                          </div>
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
