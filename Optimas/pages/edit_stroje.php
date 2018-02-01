<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#zakaznik").change(function(){
      if($('#zakaznik').val() == ''){
            $('#zakaznik-id').removeAttr("value"); //a nastaví id na prazdno
            alert('Stroj nyní nemá přiřazeného zákazníka');
        }
    });
});

</script>
<?php
//
//editace stroje
//
require 'model/stroj.class.php';
require 'model/klient.class.php';


$stroj_id = $_GET['id'];

$klient     = new klient($mysqli);
$stroj      = new stroj($mysqli);

$stroj_info = $stroj->getStroj($stroj_id);

if ($stroj_info['klient_id'] != NULL) {
  $klient_info = $klient->getKlient($stroj_info['klient_id']);
  $nazev_firmy = "value=\"{$klient_info['nazev_firmy']}\" ";
  $klient_id   = "value=\"{$klient_info['id']}\" ";
} else {
  $nazev_firmy = "";
  $klient_id   = "";
}


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
               <h1 class="page-header">Editace stroje <?php echo $stroj_info['vyrobce']." ".$stroj_info['typ']; ?></h1>
               <form method="post" id="edit_stroje" action="script/edit_stroj.script.php" >
                 <div class="form-group col-md-12">
                   <label for="zakaznik">Zákazník</label>
                    <input type="text" class="form-control" id="zakaznik" placeholder="začněte psát název firmy" <?php echo $nazev_firmy; ?> />
                    <input type="hidden" name="klient_id" id="zakaznik-id" <?php echo $klient_id; ?> />
                 </div>
                 <div class="form-group col-md-4">
                   <label for="vyrobce">Výrobce</label>
                   <input type="text" class="form-control" name="vyrobce" id="vyrobce" value="<?php echo $stroj_info['vyrobce']; ?>">
                 </div>
                  <div class="form-group col-md-4">
                    <label for="typ">Typ</label>
                    <input type="text" name="typ" class="form-control" id="typ" value="<?php echo $stroj_info['typ']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="vyrovnicislo">Výrobní číslo</label>
                    <input type="text" name="vyrobnicislo" class="form-control" id="vyrobnicislo" value="<?php echo $stroj_info['vyrobnicislo']; ?>">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="rokvyroby">Rok výroby</label>
                    <input type="number" name="rokvyroby" class="form-control" id="rokvyroby" value="<?php echo $stroj_info['rokvyroby']; ?>">
                  </div>

                    <div class="form-group col-md-4">
                      <label for="stav">Stav</label>
                      <select class="form-control" name="stav" class="form-control" id="stav">
                        <option value="Volné" <?php echo ($stroj_info['stav'] == "Volné")?"selected":""; ?> >Volné</option>
                        <option value="Pronajaté" <?php echo ($stroj_info['stav'] == "Pronajaté")?"selected":""; ?> >Pronajeté</option>
                        <option value="Prodané" <?php echo ($stroj_info['stav'] == "Prodané")?"selected":""; ?> >Prodané</option>
                      </select>
                    </div>

                    <div class="form-group col-md-12">
                      <label for="poznamka">Poznámky</label>
                      <textarea rows="8" name="poznamka" id="poznamka" style="width: 100%;max-width: 100%"><?php echo $stroj_info['poznamka']; ?></textarea>
                    </div>

                   <div class="col-md-12">
                     <input type="hidden" name="stroj_id" value="<?php echo $stroj_id; ?>" />
                       <button type="submit" class="btn btn-warning" name="edit_stroj" value="edit_stroj" ><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Uložit změny</button>
                  </div>
              </form>


                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery-1.7.1.min.js"></script>
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/script.js"></script>
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
        //zde se musí vypsat všechny firmy
        //label bude nazev firmy
        //value bude id
?>
</script>
<?php

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
