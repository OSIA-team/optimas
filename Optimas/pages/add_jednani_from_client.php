<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myJednani">Nové jednání s klientem
</button>

<!-- Modal -->
<div class="modal fade" id="myJednani" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nové jednání s klientem</h4>
      </div>
      <div class="modal-body">
           <!-- přidání objednávky-->

           <form method="POST" action="script/add_jednani.script.php">
                <div class="form-group col-md-12">
                  <label for="klientlabel">Klient</label>
                  <div><?php echo $klient_info['nazev_firmy']; ?></div>
                  <input type="hidden" name="klient_id" value="<?php echo $klient_info['id']; ?>" />
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
                     <input type="text" name="kdovyridil" class="form-control" id="klientcisloobjednavky" placeholder="2456">
                   </div>

                   <div class="form-group col-md-6">
                     <label for="datumvyrizeni">Předmět jednání</label>
                     <textarea rows="8" name="predmet_jednani" style="width: 100%;max-width: 100%"></textarea>
                   </div>

                  <div class="col-md-12">
                      <button type="submit" name="pridat_jednani" class="btn btn-success">Přidat jednani</button>
                 </div>
             </form>

      <div style="clear: both"></div>
           <!-- END: přidání objednávky-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zavřít</button>
      </div>
    </div>
  </div>
</div>
