<?php
//
//editace objednávky
//
require 'model/jednani.class.php';
require 'model/klient.class.php';

$jednani_id = $_GET['id'];

$jednani      = new jednani($mysqli);
$klient       = new klient($mysqli);

$jednani_info = $jednani->getJednani($jednani_id);
$klient_info  = $klient->getKlient($jednani_info['klient_id']);


?>
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 nahled">
                        <h1 class="page-header spacer-top">Editace jednání</h1>
                        	<div class="col-md-12 spacer-top">
                          <form method="post" action="script/edit_jednani.script.php">
	                      		<div class="bunka col-md-4"><strong>Zákazník</strong><br><?php echo $klient_info['nazev_firmy']; ?></div>
	                      		<div class="bunka col-md-4"><strong>Kód Zákazníka</strong><br><?php echo $klient_info['kod_zakaznika']; ?></div>
                            <div class="form-group col-md-4">
                              <label for="kdojednal">S kým</label>
                               <input type="text" name="skym" class="form-control" id="kdojednal" Value="<?php echo $jednani_info['skym']; ?>" />
                            </div>
                            <div class="form-group col-md-4">
                              <label for="nasecisloobjednavky">Datum jednání</label>
                               <input type="date" name="datumjednani" class="form-control" id="zakaznik" value="<?php echo $jednani_info['datumjednani']; ?>"/>
                            </div>
                            <div class="form-group col-md-3">
                              <label for="kdojednal">Kdo jednal</label>
                               <input type="text" name="kdojednal" class="form-control" id="kdojednal" Value="<?php echo $jednani_info['kdojednal']; ?>" />
                            </div>
	                      	 </div>
	                      	<div class="col-md-12">
                            <div class="form-group col-md-4">
                              <label for="nasecisloobjednavky">Datum vyřízení</label>
                               <input type="date" name="datumvyrizeni" class="form-control" id="zakaznik" value="<?php echo ($jednani_info['datumvyrizeni']=="0000-00-00")?"":$jednani_info['datumvyrizeni']; ?>"/>
                            </div>
                            <div class="form-group col-md-3">
                              <label for="kdojednal">Kdo vyřídil</label>
                               <input type="text" name="kdovyridil" class="form-control" id="kdojednal" Value="<?php echo $jednani_info['kdovyridil']; ?>" />
                            </div>
                          </div>
	                      	<div class="spacer-top col-md-12" style="margin-top: 30px">
                            <div class="form-group col-md-6">
                              <label for="datumvyrizeni">Předmět jednání</label>
                              <textarea name="predmet_jednani" rows="8" style="width: 100%;max-width: 100%"><?php echo $jednani_info['predmet_jednani']; ?></textarea>
                            </div>
	                      	</div>
                          <div class="spacer-top col-md-12">
                              <input type="hidden" name="jednani_id" value="<?php echo $jednani_id; ?>" />
                            <div class="col-md-12 text-right">
                            <button class="btn btn-warning" name="edit_jednani" value="edit_jednani"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Uložit změny</button>
                          </div>
                          </div>
                        </form>
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
