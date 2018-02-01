
      <!-- Trigger the modal with a button -->
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Nová nabídka</button>

      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" style="width: 90%">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Nová nabídka</h4>
              <?php

              //  var_dump($klient_info);

               ?>
            </div>
            <div class="modal-body">
                 <!-- přidání objednávky-->
                 <form method="POST" action="script/add_offer.script.php">
                      <div class="form-group col-md-12">
                        <label for="klientlabel">Klient</label>
                        <div>
                          <?php echo $klient_info['nazev_firmy']; ?>
                        </div>
                        <input type="hidden" name="klient_id" value="<?php echo $klient_id; ?>" />
                      </div>

                      <div class="form-group col-md-3">
                        <label for="nasecisloobjednavky">Naše číslo nabídky</label>
                        <input type="text" name="cislo_obj_nase" class="form-control" id="nasecisloobjednavky" value="<?php echo $objednavka->generateCisloObjednavky(); ?>">
                      </div>

                      <div class="form-group col-md-3">
                        <label for="datumobjednavky">Datum objednávky</label>
                        <input type="date" name="datumobjednavky" class="form-control" id="datumobjednavky" value="<?php echo date("Y-m-d"); ?>">
                      </div>

                      <div class="form-group col-md-3">
                        <label for="objednavkuprijal">Nabídku vystavil</label>
                        <input type="text" name="prijal" class="form-control" id="objednavkuprijal" placeholder="Kotol">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="datumvyrizeni">Poznámky k objednávce</label>
                        <textarea rows="8" name="predmetobjednavky" style="width: 100%;max-width: 100%"></textarea>
                      </div>

                      <div class="form-group col-md-3">
                        <label for="Dopravce">Dopravce</label>
                        <select name="jakvyridil" class="form-control" id="Dopravce">
                          <?php
                            $dopravce = new dopravce($mysqli);
                            $dopravci_info  = $dopravce->getAllDopravce();

                            foreach ($dopravci_info as $dopravce_info):
                             ?>
                            <option value="<?php echo $dopravce_info['id']; ?>"><?php echo $dopravce_info['nazev'] ?></option>
                          <?php endforeach; ?>
                        </select>

                      </div>

                    <!--
                      <div class="form-group col-md-3">
                        <label for="datumvyrizeni">Datum vyřízení</label>
                        <input type="date" name="datumvyrizeni" class="form-control" id="datumvyrizeni">
                      </div>
                    -->

                     <div class="col-md-12">
                         <input type="submit" name="pridat_objednavku" value="Přidat objednávku" class="btn btn-success" />
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
</div>
<!-- /.col-lg-12 -->
