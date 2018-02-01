<div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <div class="row">
             <div class="col-lg-12 spacer-top">
               <h1 class="page-header">Nová nabídka</h1>
               <form method="POST" action="script/add_offer.script.php">
                 <div class="form-group col-md-12">
                   <label for="nasecisloobjednavky">Zákazník</label>
                    <input type="text" class="form-control" name="zakaznik-name" id="zakaznik" placeholder="začněte psát název firmy" />
                    <input type="hidden" name="klient_id" id="zakaznik-id" />
                 </div>
                    <?php
                      require 'model/objednavka.class.php';

                      $objednavka = new objednavka($mysqli);
                     ?>
                    <div class="form-group col-md-3">
                      <label for="nasecisloobjednavky">Naše číslo nabídky</label>
                      <input type="text" name="cislo_obj_nase" class="form-control" id="nasecisloobjednavky" value="<?php echo $objednavka->generateCisloObjednavky(); ?>">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="datumobjednavky">Datum nabídky</label>
                      <input type="date" name="datumobjednavky" class="form-control" id="datumobjednavky">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="objednavkuprijal">Nabídku vystavil</label>
                      <input type="text" name="prijal" class="form-control" id="objednavkuprijal" placeholder="Kotol">
                    </div>
                  <?php /* ?> <div class="form-group col-md-3">
                      <label for="Dopravce">Dopravce</label>
                      <select class="form-control" name="jakvyridil" id="Dopravce">
                        <?php
                       require 'model/dopravce.class.php';
                        $dopravce       = new dopravce($mysqli);
                        $dopravci_info  = $dopravce->getAllDopravce();

                        foreach ($dopravci_info as $dopravce_info):
                         ?>
                        <option value="<?php echo $dopravce_info['id']; ?>"><?php echo $dopravce_info['nazev'] ?></option>
                      <?php endforeach; */ ?>
                      </select>
                    </div>
                    <div class="form-group col-md-5">
                      <label for="datumvyrizeni">Poznámky k objednávce</label>
                      <textarea rows="5" name="predmetobjednavky" style="width: 100%;max-width: 100%"></textarea>
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
                      	<tr>
                      		<td><input type="text" class="form-control produkt" id="customFieldValue" name="customFieldValue[]" value="" placeholder="Input Value" /></td>
                          <td><input type="text" class="form-control idecko" id="customFieldId" name="customFieldId[]" value="" /></td>
                          <td ><input type="text" class="form-control produkt_nazev" id="customFieldName" name="customFielName[1]" value="" placeholder="Input Name" /></td>
                          <td><input type="text" class="form-control produkt_cena" id="customFieldprize" name="customFieldprize[1]" value="" placeholder="Input prize" disabled /></td>
                          <td ><input type="text" class="form-control" id="customFieldValue" name="customFieldcount[1]" value="" placeholder="Input Count" /></td>
                          <td class="radek_cena">55554</td>
                          <td> <a href="javascript:void(0);" class="remCF btn btn-danger">X</a></td>
                      	</tr>
                      </table>
                      <div style="padding-left:5px;"><a href="javascript:void(0);" class="addCF btn btn-info">Přidat položku</a></div>
                      <div class="col-md-11 spacer-top"><span class="pull-right"><b>Celkem za nabídku </b> <span id="SumaNabidka">0</span></span></div>
                    </div>
                  </div>
                   <div class="col-md-12 spacer-top">
                       <button type="submit" name="pridat_objednavku" class="btn btn-success">Přidat nabídku</button>
                  </div>
                  <input type="checkbox" name="vehicle" value="Bike" checked> I have a bike<br>
<input type="checkbox" name="vehicle" value="Car" checked> I have a car<br>
              </form>


                </div>
                <!-- /.col-lg-12 -->
            </div>
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
         id:"<?php echo $produkt_info['id']; ?>",
         prize:"<?php echo $produkt_info['cena']; ?>"

       },
          <?php endforeach; ?>
       {
     }
     ];


  	$(".addCF").click(function(){
  		$("#customFields").append('<tr><td><input type="text" class="form-control produkt" id="customFieldValue" name="customFieldValue[]" value="" placeholder="Input Value" /></td><td><input type="text" class="form-control produkt_nazev" id="customFieldName" name="customFieldName[]" value="" placeholder="Input Name" /></td><td><input type="text" class="form-control produkt_cena" id="customFieldprize" name="customFieldprize[]" value="" placeholder="Input prize" disabled /></td><td><input type="text" class="form-control" id="customFieldValue" name="customFieldcount[]" value="" placeholder="Input Count" /></td><td class="radek_cena">55554</td><td><a href="javascript:void(0);" class="remCF btn btn-danger">X</a></td></tr>'
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
        <script src="bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


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
  .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<div>" + item.value + "<br>" + item.label + "</div>" )
        .appendTo( ul );
    };
});
</script>
<!-- Metis Menu Plugin JavaScript -->
<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
