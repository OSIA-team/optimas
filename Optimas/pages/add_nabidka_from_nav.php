
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
             <div class="col-lg-12 spacer-top">
               <h1 class="page-header">Nová nabídka</h1>
               <form method="POST" id="add_nabidka" action="script/add_offer.script.php">
                 <div class="form-group col-md-12" action="script/add_offer.script.php">
                   <label for="nasecisloobjednavky">Zákazník</label>
                    <input type="text" class="form-control" name="zakaznik_name" id="zakaznik" placeholder="začněte psát název firmy" />
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
                      <input type="date" name="datumobjednavky" class="form-control" id="datumobjednavky" value="<?php echo date("Y-m-d"); ?>">
                    </div>

                    <div class="form-group col-md-3">
                      <label for="objednavkuprijal">Nabídku vystavil</label>
                      <input type="text" name="prijal" class="form-control" id="objednavkuprijal" placeholder="Kotol">
                    </div>
                    <div class="form-group col-md-1">
                      <label for="mena">Měna</label>
                      <select class="form-control" name="eur" id="mena">
                        <option value="0">CZK</option>
                        <option value="1">EURO</option>
                      </select>
                    </div>
                    <div class="form-group col-md-5">
                      <label for="poznamkatitulek">Úvodní poznámka k nabídce</label>
                      <textarea rows="2" name="poznamka" style="width: 100%;max-width: 100%"></textarea>
                      <p class="help-block"><span class="badge">?</span> V nabídce se zobrazí před seznamem položek</p>
                      <label for="predmetobjednavky">Poznámky k objednávce</label>
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
                          <td><input type="text" class="form-control produkt" id="customFieldValue" name="katalogCislo[]" value="" placeholder="Input Value" /><input type="hidden" class="form-control idecko" id="customFieldId" name="produkt_id[]" value="" /></td>
                          <td ><input type="text" class="form-control produkt_nazev" id="customFieldName" name="customFielName[]" value="" placeholder="Input Name" /></td>
                          <td><input type="text" class="form-control produkt_cena" id="customFieldprize" name="customFieldprize[]" value="" placeholder="Input prize" disabled /></td>
                          <td ><input type="text" class="form-control mnozstvi" id="customFieldValue" name="pocet[]" value="" placeholder="Input Count" /></td>
                          <td class="radek_cena">0</td>
                          <td> <a href="javascript:void(0);" class="remCF btn btn-danger">X</a></td>
                        </tr>
                      </table>
                      <div style="padding-left:5px;"><a href="javascript:void(0);" class="addCF btn btn-info">Přidat položku</a></div>
                      <br>
                        <div class="form-group col-md-3 spacer-top">
                          <label for="sleva">Sleva za nabídku (%)</label>
                          <input type="text" name="sleva" class="form-control" id="sleva">
                        </div>

                      <div class="col-md-11 spacer-top"><span class="pull-right"><b>Celkem za nabídku </b> <span id="SumaNabidka">0</span></span></div>
                    </div>
                  </div>
                   <div class="col-md-12 spacer-top">
                       <button type="submit" name="pridat_objednavku" class="btn btn-success">Přidat nabídku</button>
                  </div>

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
    <script type="text/javascript">
    var sum = 0;
    var sleva = $("#sleva").val();
    var mena = $("#mena").val();
  //    alert(mena);
      $( "#mena" ).change(function() {
        var mena = $("#mena").val();
      //  alert("mena je ted v: " +mena);
      });

    $('.radek_cena').each(function() {
       sum += Number($(this).text());
    });
    sleva = (sum/100)*sleva;
    sum = sum - sleva;
    $("#SumaNabidka").text(sum);
    </script>
    <script type="text/javascript"> //script pro generovaání formuláře položek
    $(document).ready(function(){
      var sum = 0; //pro sečtení všech řádků
      var x=1; // pro počítání produktu
      var mena = $("#mena").val();
    //    alert(mena);
        $( "#mena" ).change(function() {
          var mena = $("#mena").val();
        //  alert("mena je ted v: " +mena);
        });

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
         prizeEUR:"<?php echo $produkt_info['cena_eur']; ?>",
         id:"<?php echo $produkt_info['id']; ?>"
       },
          <?php endforeach; ?>
       {
     }
     ];




  	$(".addCF").click(function(){
      x++;
  		$("#customFields").append('<tr><td><input type="text" class="form-control produkt" id="customFieldValue" name="katalogCislo[]" value="" placeholder="Input Value" /><input type="hidden" class="form-control idecko" id="customFieldId" name="produkt_id[]" value="" /></td><td><input type="text" class="form-control produkt_nazev" id="customFieldName" name="customFieldName[]" value="" placeholder="Input Name" /></td><td><input type="text" class="form-control produkt_cena" id="customFieldprize" name="customFieldprize[]" value="" placeholder="Input prize" disabled /></td><td><input type="text" class="form-control mnozstvi" id="customFieldValue" name="pocet[]" value="" placeholder="Input Count" /></td><td class="radek_cena">0</td><td><a href="javascript:void(0);" class="remCF btn btn-danger">X</a></td></tr>'
        );
      $("#customFields").find(".produkt").last().autocomplete({
        minLength: 0,
        source: datas,
        select: function (event, ui) {
           var posledni= $("#table").find(".produkt").last();
            var mena = $("#mena").val();
             posledni.val(ui.item.value);
              $("#customFields").find(".produkt").last().val(ui.item.value);
              $("#customFields").find(".idecko").last().val(ui.item.id);
              $("#customFields").find(".produkt_nazev").last().val(ui.item.name);
              if(mena == "0"){
                $("#customFields").find(".produkt_cena").last().val(ui.item.prize);
              }else{
                $("#customFields").find(".produkt_cena").last().val(ui.item.prizeEUR);
              }
             return false;
        }
      });

      $('.mnozstvi').on('change', function() {
         $cena = 1;
         var sum = 0;
         var sleva = $("#sleva").val();
         $mnozstvi = this.value;
         $cena = $("#customFields").find(".produkt_cena").last().val();
         $("#customFields").find(".radek_cena").last().text($mnozstvi*$cena);

         $('.radek_cena').each(function() {

            sum += Number($(this).text());
        });
        sleva = (sum/100)*sleva;
        sum = sum - sleva;
        $("#SumaNabidka").text(sum);
      })
  	});

    $(".produkt").autocomplete({
      minLength: 0,
      source: datas,
      select: function (event, ui) {
         var posledni= $("#customFields").find(".produkt").last();
         var mena = $("#mena").val();
           posledni.val(ui.item.value);
           $("#customFields").find(".idecko").last().val(ui.item.id);
           $("#customFields").find(".produkt_nazev").last().val(ui.item.name);
           if(mena == "0"){
             $("#customFields").find(".produkt_cena").last().val(ui.item.prize);
           }else{
             $("#customFields").find(".produkt_cena").last().val(ui.item.prizeEUR);
           }

          return false;
      }

    });

      $("#customFields").on('click','.remCF',function(){
        var sleva=$("#sleva").val();
        $(this).parent().parent().remove();
        $('.radek_cena').each(function() {
           sum += Number($(this).text());
        });
        sleva = (sum/100)*sleva;
        sum = sum - sleva;
        $("#SumaNabidka").text(sum);
      });


    });
    </script>
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/script.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="dist/js/sb-admin-2.js"></script>

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
<script type="text/javascript">
$(document).ready(function($) {

  $('[data-toggle="tooltip"]').tooltip()

  $('.mnozstvi').on('change', function() {
     $cena = 1;
     var sum = 0;
     var sleva = $("#sleva").val();
     $mnozstvi = this.value;
     $cena = $("#customFields").find(".produkt_cena").last().val();
     $("#customFields").find(".radek_cena").last().text($mnozstvi*$cena);

     $('.radek_cena').each(function() {
        sum += Number($(this).text());
    });
    sleva = (sum/100)*sleva;
    sum = sum - sleva;
    $("#SumaNabidka").text(sum);
  })

  $("#sleva").on('change', function(){
    var sleva = $("#sleva").val();
    var sum = 0;
    alert("zmenil se sleva na "+ sleva);
     $('.radek_cena').each(function() {
        sum += Number($(this).text());
      });

      sleva = (sum/100)*sleva;
      sum = sum - sleva;
    $("#SumaNabidka").text(sum);

  })
});
</script>
