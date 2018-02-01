<?php
//
//přidání stroje
//
?>
<body>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <div class="row">
             <div class="col-lg-6 spacer-top">
               <h1 class="page-header">Přidat nový stroj</h1>
               <form method="POST" id="add_stroj" action="script/add_stroj.script.php">
                <!-- <div class="form-group col-md-12">
                   <label for="nasecisloobjednavky">Zákazník</label>
                    <input type="text" class="form-control" id="zakaznik" placeholder="začněte psát název firmy" />
                    <input type="hidden" id="zakaznik-id" />
                 </div> -->
                 <div class="form-group col-md-4">
                   <label for="vyrobce">Výrobce</label>
                   <input type="text" name="vyrobce" class="form-control" name="vyrobce" id="vyrobce" placeholder="Optimas">
                 </div>
                  <div class="form-group col-md-4">
                    <label for="typ">Typ</label>
                    <input type="text" name="typ" class="form-control" id="typ" placeholder="H99">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="vyrovnicislo">Výrobní číslo</label>
                    <input type="text" name="vyrobnicislo" class="form-control" id="vyrobnicislo" placeholder="201UJ7524685">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="rokvyroby">Rok výroby</label>
                    <input type="number" name="rokvyroby" class="form-control" id="rokvyroby" placeholder="2016">
                  </div>

                    <!--<div class="form-group col-md-4">
                      <label for="stav">Stav</label>
                      <select class="form-control" class="form-control" id="stav" placeholder="2456">
                        <option value="Pronajaté">Pronajeté</option>
                        <option value="Prodané">Prodané</option>
                      </select>
                    </div>-->

                    <div class="form-group col-md-12">
                      <label for="datumvyrizeni">Poznámky</label>
                      <textarea name="poznamka" rows="8" style="width: 100%;max-width: 100%"></textarea>
                    </div>

                   <div class="col-md-12">
                       <button type="submit" name="pridat_stroj" value="pridat_stroj" class="btn btn-success">Přidat nový stroj</button>
                  </div>
              </form>


                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
     <script src="js/jquery-1.7.1.min.js"></script>
     <script src="//code.jquery.com/jquery-1.12.4.js"></script>
     <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- jQuery -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
                <!-- Metis Menu Plugin JavaScript -->
        <script src="js/jquery.validate.js"></script>
        <script src="js/script.js"></script>
        <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="dist/js/sb-admin-2.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->

<?php
        //zde se musí vypsat všechny firmy
        //label bude nazev firmy
        //value bude id
?>
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
.data("autocomplete")._renderItem = function (ul, item) {
return $("<li>")
.data("item.autocomplete", item)
.append("<a>" + item.label + "<br>" + item.desc + "</a>")
.appendTo(ul);
};
});
  </script>
