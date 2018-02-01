<?php
//
//nahled jednani
//
require 'model/klient.class.php';
require 'model/jednani.class.php';

$jednani_id = $_GET['id'];

$jednani  = new jednani($mysqli);


if (@isset($_GET['delete']) AND $_GET['delete']== true) {
  $delete_jednani = $jednani->deleteJednani($jednani_id);
  if ($delete_jednani) {

  } else {
    echo "error";
  }

} else {
  $delete_jednani = FALSE;

  $klient   = new klient($mysqli);

  $jednani_info = $jednani->getJednani($jednani_id);
  $klient_info  = $klient->getKlient($jednani_info['klient_id']);

}
?>
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 nahled">
                      <div class="">
                        <a href="?page=add_jednani"class="btn btn-warning"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Nové jendání</a>
                      </div>
                      <?php if ($delete_jednani): ?>
                          <div class="alert alert-danger" role="alert">Jednání neexistuje</div>
                      <?php
                            die();
                            endif;
                       ?>
                        <h1 class="page-header spacer-top">Náhled jednání</h1>
                        	<div class="col-md-12 spacer-top">
	                      		<div class="bunka col-md-4"><strong>Zákazník</strong><br><a href="?page=nahled_klient&id=<?php echo $klient_info['id']; ?>"><?php echo $klient_info['nazev_firmy']; ?></a></div>
	                      		<div class="bunka col-md-8"><strong>Kód Zákazníka</strong><br><?php echo $klient_info['kod_zakaznika']; ?></div>
                            <div class="bunka col-md-3"><strong>Datum jednání</strong><br><?php echo $jednani_info['datumjednani']; ?></div>
                            <div class="bunka col-md-3"><strong>Kdo jednal</strong><br><?php echo $jednani_info['kdojednal']; ?></div>
                            <div class="bunka col-md-6"><strong>S kým</strong><br><?php echo $jednani_info['skym']; ?></div>
	                      		<div class="bunka col-md-3"><strong>Datum vyřízení</strong><br><?php echo ($jednani_info['datumvyrizeni']=="0000-00-00")?"":$jednani_info['datumvyrizeni']; ?></div>
	                      		<div class="bunka col-md-3"><strong>Objednavku vyřídil</strong><br><?php echo $jednani_info['kdovyridil']; ?></div>
	                      	 	</div>

	                      	<div class="spacer-top col-md-12" style="margin-top: 30px">
	                      		<div class="col-md-6"><strong>Předmět jednani</strong><br>
                              <p>
                                <?php echo $jednani_info['predmet_jednani']; ?>
                              </p>
                            </div>
	                      	</div>
                          <div class="spacer-top col-md-12">
                            <div class="col-md-6">
                            <a href="?page=edit_jednani&id=<?php echo $jednani_info['id']; ?>"class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editovat jednani</a>
                            <a href="?page=jednani&id=<?php echo $jednani_id; ?>&delete=true"class="btn btn-danger" onclick="return confirm('Opravdu chcete smazat toto jednání?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Smazat jednání</a>
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
