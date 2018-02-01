<?php
//nahled s vypisem klienta
?>

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 nahled">
                        <h1 class="page-header">Náhled auta</h1>
	                      	<div class="col-md-6">
	                      		<div class="bunka col-md-6"><strong>SPZ</strong><br>4B0 1234</div>
	                      		<div class="bunka col-md-6"><strong>VIN</strong><br>12345678901234567</div>
	                      		<div class="bunka col-md-6"><strong>STK</strong><br><strong class="green-font">2016</strong></div>
	                      		<div class="bunka col-md-6"><strong>Rok výroby</strong><br>1990</div>
	                      	 	</div>
	                      	<div class="col-md-6">
	               				<div class="bunka col-md-4"><strong>Značka</strong><br>Opel</div>
	                      		<div class="bunka col-md-4"><strong>Model</strong><br>Astra</div>
	                      		<div class="bunka col-md-4"><strong>Olej</strong><br>2015</div>
	                      		<div class="bunka col-md-4"><strong>Objem</strong><br>4l</div>
                      			<div class="bunka col-md-4"><strong>Kód</strong><br>18293B73</div>
                      			<div class="bunka col-md-4"><strong>Výkon</strong><br>3600 W</div>
	                      	</div>
	                      	<div class="bunka col-md-12">
	                      		<div class="col-md-6"><strong>Poznámka</strong><br>Lorem ipsum dolor sit amet, color fun fixum kramen</div>
	                      	</div>
	                      		
		                <div class="col-md-12 auta-vypis">
                        <h4>Auto patří klientovi</h4>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class=" table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Jméno</th>
                                            <th>Přijmení</th>
                                            <th>Telefon</th>
                                            <th>E-mail</th>
                                            <th>Město</th>
                                            <th>Ulice</th>
                                            <th>PSČ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr onclick="window.document.location='?p=nahled_klienta&id=1';">
                                            <td>Patrik</td>
                                            <td>Šafář</td>
                                            <td>736289288</td>
                                            <td>safarpatrik@seznam.cz</td>
                                            <td>Brno</td>
                                            <td>palackého třída 55</td>
                                            <td>612 00</td>
                                        </tr>
                              
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                   
		                    </div><!-- Auta vypis -->

                        
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

    