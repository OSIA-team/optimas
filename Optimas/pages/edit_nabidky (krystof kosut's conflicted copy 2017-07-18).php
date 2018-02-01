<?php
//
//editace objednávky
//
require 'model/objednavka.class.php';
require 'model/klient.class.php';
require 'model/dopravce.class.php';

$objednavka = new objednavka($mysqli);
$klient     = new klient($mysqli);
$dopravce   = new dopravce($mysqli);

$objednavka_id = $_GET['id'];

$objednavka_info          = $objednavka->getObjednavka($objednavka_id);
$klient_info              = $klient->getKlient($objednavka_info['klient_id']);
$dopravci_info            = $dopravce->getAllDopravce();
$dopravce_selected_info   = $dopravce->getDopravceById($objednavka_info['jakvyridil']);
$produkty_info            = $objednavka->getProduktyByObj($objednavka_id);

?>

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 nahled">
                        <h1 class="page-header spacer-top">Editace nabídky <?php echo $objednavka_info['cislo_obj_nase']; ?></h1>

                          <form method="POST" action="script/edit_nabidka.script.php">
	                      		<div class="bunka col-md-4"><strong>Zákazník</strong><br><?php echo $klient_info['nazev_firmy']; ?></div>
	                      		<div class="bunka col-md-4"><strong>Kód Zákazníka</strong><br><?php echo $klient_info['kod_zakaznika']; ?></div>
                            <div class="form-group col-md-4">
                              <label for="nasecisloobjednavky">Naše číslo nabídky</label>
                               <input type="text" name="cislo_obj_nase" class="form-control" id="objednavka klient" Value="<?php echo $objednavka_info['cislo_obj_nase']; ?>" />
                            </div>
                            <div class="form-group col-md-4">
                              <label for="nasecisloobjednavky">Datum nabídky</label>
                               <input type="date" name="datumobjednavky" class="form-control" id="zakaznik" value="<?php echo $objednavka_info['datumobjednavky']; ?>"/>
                            </div>
                            <div class="col-md-4">
                              <label for="objednavkupřijal">Nabídku vystavil</label>
                             <input type="text" name="prijal" class="form-control" id="objednavkuprijal" Value="<?php echo $objednavka_info['prijal']; ?>" />
                           </div>
                           <div class="col-md-12 spacer-top">

                           </div>
                           <div class="form-group col-md-5">
                              <label for="datumvyrizeni">Poznámky k objednávce</label>
                              <textarea name="predmetobjednavky" rows="8" style="width: 100%;max-width: 100%"><?php echo $objednavka_info['predmetobjednavky']; ?></textarea>
                          </div>
	                      	 <div class="col-md-7 polozky_seznam">
                            <div class="col-md-12">
                              <label for="customFields">Položky</label>
                              <table class="form-table col-md-12 .table-striped table-condensed " id="customFields">
                                <tr>
                                  <th class="col-md-2">katalogové číslo</th>
                                  <th class="col-md-4">název produktu</th>
                                  <th class="col-md-2">cena za kus</th>
                                  <th class="col-md-2">množství</th>
                                  <th class="col-md-1">celkem</th>
                                  <th class="col-md-1"></th>
                                </tr>
                                <?php
                                  foreach ($produkty_info as $produkt_info):
                                 ?>
                                    <tr>
                                      <td><input type="text" class="form-control produkt" id="customFieldValue" name="customFieldValue[]" value="<?php echo $produkt_info['katalog_id']; ?>" placeholder="Input Value" />
                                      <input type="hidden" class="form-control idecko" id="customFieldValue" name="produkt_id[]" value="<?php echo $produkt_info['id']; ?>" /></td>
                                      <td ><input type="text" class="form-control produkt_nazev" id="customFieldName" name="customFielName[1]" value="<?php echo $produkt_info['nazevproduktu']; ?>" placeholder="Input Name" /></td>
                                      <td><input type="text" class="form-control produkt_cena" id="customFieldprize" name="customFieldprize[1]" value="<?php echo $produkt_info['cena']; ?>" placeholder="Input prize" disabled /></td>
                                      <td ><input type="text" class="form-control" id="customFieldValue" name="pocet[]" value="<?php echo $produkt_info['kolik']; ?>" placeholder="Input Count" /></td>
                                      <td class="radek_cena"><?php echo $produkt_info['cena']*$produkt_info['kolik']; ?></td>
                                      <td> <a href="javascript:void(0);" class="remCF btn btn-danger">X</a></td>
                                    </tr>
                                <?php
                                endforeach;
                                 ?>
                              </table>
                              <div style="padding-left:5px;"><a href="javascript:void(0);" class="addCF btn btn-info">Přidat položku</a></div>
                              <div class="col-md-11 spacer-top"><span class="pull-right"><b>Celkem za nabídku </b> <span id="SumaNabidka">0</span></span></div>
                            </div>
                          </div>
                          <div class="spacer-top col-md-12">

                            <div class="col-md-12 text-right">
                              <input type="hidden" name="objednavka_id" value="<?php echo $objednavka_id ?>" />
                             <button name="objednavka_edit" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editovat nabídku</button>
                          </div>
                      </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript"> //script pro generovaání formuláře položek
    $(document).ready(function(){
      var sum = 0; //pro sečtení všech řádků
      var x=1; // pro počítání produktu
      var datas = [
        <?php
          require 'model/produkt.class.php';
          $produkt = new produkt($mysqli);

          $produkty_info = $produkt->getAllProdukt();

          foreach ($produkty_info as $produkt_info):

         ?>
       {
         value: "<?php echo $produkt_info['katalog_id']; ?>",
         name:"<?php echo $produkt_info['nazevproduktu']; ?>",
         prize:"<?php echo $produkt_info['cena']; ?>",
         id:"<?php echo $produkt_info['id']; ?>"
       },
          <?php endforeach; ?>
       {
     }
     ];


  	$(".addCF").click(function(){
      x++;
  		$("#customFields").append('<tr><td><input type="text" class="form-control produkt" id="customFieldValue" name="katalogCislo[]" value="" placeholder="Input Value" /><input type="hidden" class="form-control idecko" id="customFieldId" name="produkt_id[]" value="" /></td><td><input type="text" class="form-control produkt_nazev" id="customFieldName" name="customFieldName[]" value="" placeholder="Input Name" /></td><td><input type="text" class="form-control produkt_cena" id="customFieldprize" name="customFieldprize[]" value="" placeholder="Input prize" disabled /></td><td><input type="text" class="form-control" id="customFieldValue" name="pocet[]" value="" placeholder="Input Count" /></td><td class="radek_cena">55554</td><td><a href="javascript:void(0);" class="remCF btn btn-danger">X</a></td></tr>'
        );
      $("#customFields").find(".produkt").last().autocomplete({
        minLength: 0,
        source: datas,
        select: function (event, ui) {
           var posledni= $("#table").find(".produkt").last();
             posledni.val(ui.item.value);
              $("#customFields").find(".produkt").last().val(ui.item.value);
              $("#customFields").find(".idecko").last().val(ui.item.id);
             $("#customFields").find(".produkt_nazev").last().val(ui.item.name);
              $("#customFields").find(".produkt_cena").last().val(ui.item.prize);
             return false;
        }
      });
  	});

    $(".produkt").autocomplete({
      minLength: 0,
      source: datas,
      select: function (event, ui) {
         var posledni= $("#customFields").find(".produkt").last();
           posledni.val(ui.item.value);
           $("#customFields").find(".idecko").last().val(ui.item.id);
           $("#customFields").find(".produkt_nazev").last().val(ui.item.name);
           $("#customFields").find(".produkt_cena").last().val(ui.item.prize);

          return false;
      }
    });

      $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().remove();

      });


    });
    </script>
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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

<?php
require 'model/klient.class.php';
$klient       = new klient($mysqli);
$klient_info  = $klient->getKlienti();
        //zde se musí vypsat všechny firmy
        //label bude nazev firmy
        //value bude id?>
<script>
        $(function () {
  var zakaznici = [

    <?php foreach($klient_info as $row): ?>
    {
      value: "<?php echo $row['id']; ?>",
      label: "<?php echo $row['nazev_firmy']; ?>"
  },
  <?php endforeach; ?>
  {
}
];

  $("#zakaznik").autocomplete({
      minLength: 0,
      source: zakaznici,
      focus: function (event, ui) {
          $("#zakaznik").val(ui.item.label);
          return false;
      },
      select: function (event, ui) {
          $("#zakaznik").val(ui.item.label);
          $("#zakaznik-id").val(ui.item.value);

          return false;
      }
  })

});
</script>
