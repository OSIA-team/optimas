 <div id="wrapper">
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Přidat auto do databáze </h1>
                        <form role="form" method="POST">
                        <div class="col-md-6 container">
                            <div class="form-group col-md-12">
                                <label>SPZ</label>
                                <input type="text" name="spz" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label>VIN</label>
                                <input type="text" name="vin" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label>STK</label>
                                <input type="text" name="STK" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Rok výroby</label>
                                <input type="email" name="rok" class="form-control">
                                <p class="help-block">např.: 2016</p>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Značka</label>
                                <input type="text" name="znacka" class="form-control">
                                <p class="help-block">Např.: Opel, Škoda,...</p>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Model</label>
                                <input type="text" name="model" class="form-control">
                                <p class="help-block">Nepoviné</p>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Olej</label>
                                <input type="text" name="olej" class="form-control">
                            </div>
                         </div> <!--/.col-md-6-->
                         <!-- panel napravo-->
                         <div class="col-md-6 container"> 
                            <h4 class="col-md-12">Motor </h4>
                            <div class="form-group col-md-12">
                                <label>Objem</label>
                                <input type="text" name="objem" class="form-control">
                            </div> 
                            <div class="form-group col-md-12">
                                <label>Kód</label>
                                <input type="text" name="kod" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Výkon</label>
                                <input type="text" name="vykon" class="form-control">
                            </div>
                             <div class="form-group col-md-12">
                                <label>Poznámky</label>
                                <textarea name="poznamky" class="form-control" rows="6"></textarea> 
                            </div>
                         </div>
                         <!-- /panel napravo-->
                         <div class="form-group col-md-12 text-right"><input type="submit" class="btn btn-green" value="Přidat auto"/></div>
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
