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
                </div>
                <div class="form-group col-md-4">
                  <label for="datumobjednavky">Datum jednání</label>
                  <input type="date" name="datumjednani" class="form-control" id="datumobjednavky">
                </div>
                <div class="form-group col-md-4">
                  <label for="skym">S kým</label>
                  <input type="text" name="" class="form-control" id="skym">
                </div>
                <div class="form-group col-md-4">
                  <label for="Kdojednal">Kdo jednal</label>
                  <input type="text" class="form-control" id="kdojednal">
                </div>
                <div class="form-group col-md-4">
                  <label for="datumvyrizeni">Datum vyřízení</label>
                  <input type="date" class="form-control" id="datumvyrizeni">
                </div>
                <div class="form-group col-md-4">
                  <label for="Kdovyridil">Kdo vyřídil</label>
                  <input type="text" class="form-control" id="kdovyridil">
                </div>
                <div class="form-group col-md-6">
                  <label for="datumvyrizeni">Předmět jednání</label>
                  <textarea rows="8" style="width: 100%;max-width: 100%"></textarea>
                </div>
                <input type="hidden" name="klient_id" value="<?php echo $klient_id; ?>" />

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
