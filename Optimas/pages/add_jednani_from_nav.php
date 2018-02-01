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
           <div class="col-lg-12 spacer-top">
             <h1 class="page-header">Nové jednání</h1>
             <form method="POST" id="add_jednani" action="script/add_jednani.script.php">
               <div class="form-group col-md-12">
                 <label for="nasecisloobjednavky">Zákazník</label>
                  <input type="text" class="form-control" name="zakaznik" id="zakaznik" placeholder="začněte psát název firmy" />
                  <input type="hidden" name="klient_id" id="zakaznik-id" />
               </div>
               <div class="form-group col-md-4">
                 <label for="datumobjednavky">Datum jednání</label>
                 <input type="date" name="datumjednani" class="form-control" id="datumobjednavky">
               </div>
                <div class="form-group col-md-4">
                  <label for="nasecisloobjednavky">Kdo jednal</label>
                  <input type="text" name="kdojednal" class="form-control" id="nasecisloobjednavky" placeholder="Martin">
                </div>
                <div class="form-group col-md-4">
                  <label for="datumobjednavky">S kým</label>
                  <input type="text" name="skym" class="form-control" id="datumobjednavky">
                </div>

                <div class="form-group col-md-4">
                  <label for="datumobjednavky">Datum vyřízení</label>
                  <input type="date" name="datumvyrizeni" class="form-control" id="datumobjednavky">
                </div>

                  <div class="form-group col-md-4">
                    <label for="klientcisloobjednavky">Kdo vyřídil</label>
                    <input type="text" name="kdovyridil" class="form-control" id="klientcisloobjednavky" placeholder="Martin">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="datumvyrizeni">Předmět jednání</label>
                    <textarea rows="8" name="predmet_jednani" style="width: 100%;max-width: 100%"></textarea>
                  </div>

                 <div class="col-md-12">
                     <button type="submit" name="pridat_jednani" class="btn btn-success">Přidat jednani</button>
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
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
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
