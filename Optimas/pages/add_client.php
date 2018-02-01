 <div id="wrapper">
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Přidat zákazníka do databáze </h1>
                        <form role="form" id="add-client-form" method="POST" action="script/add_client.script.php">
                        <div class="col-md-6">
                            <div class="form-group col-md-8">
                                <label>Název firmy</label>
                                <input type="text" id="nazev_firmy" name="nazev_firmy" class="form-control">
                            </div>
  
                            <div class="form-group col-md-12">
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" name="stavebni" value="1"> Stavební
                              </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox2" name="obchodnik" value="1"> Obchnodník
                              </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" name="ziva" value="1"> Živá
                              </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox4" name="wimag" value="1"> Wimag
                              </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox5" name="optimas" value="1"> Optimas
                              </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="ZajemoStroj" name="pouzitestroje" value="ojetina"> <b>Zájem o použitý stroj</b>
                             </label>
                          </div>
                          <div class="spacer-top"></div>
                            <div class="form-group col-md-12">
                                <label>Ulice a č.p.</label>
                                <input type="text" name="ulice" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Město</label>
                                <input type="text" name="mesto" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>PSČ</label>
                                <input type="text" name="psc" class="form-control">
                            </div>
                            <div class="form-group col-md-5">
                                <label>Stát</label>
                                <select name="zeme" class="form-control">
                                  <option value="ČR">Česká republika</option>
                                  <option value="SR">Slovensko</option>
                                </select>
                            </div>
                          </div>

                          <div class="col-md-6">
                              <div class="col-md-12"></div>
                              <div class="form-group col-md-6">
                                  <label>Telefon</label>
                                  <input type="text" name="telefon" class="form-control">
                              </div>
                              <div class="form-group col-md-6">
                                  <label>Fax</label>
                                  <input type="text" name="fax" class="form-control">
                              </div>
                              <div class="form-group col-md-6">
                                  <label>Email</label>
                                  <input type="text" name="email" class="form-control">
                              </div>
                              <div class="form-group col-md-6">
                                  <label>Web</label>
                                  <input type="text" name="www" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                 <input type="submit" name="pridat_klienta" class="btn btn-warning" value="Přidat"/>
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
    <script src="js/jquery-1.7.1.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/script.js"></script>
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
            //
            //checking empty inputs
            //
               addEventListener('load', prettyPrint, false);
                $(document).ready(function(){
                $('pre').addClass('prettyprint linenums');
                  });

        });

    </script>
