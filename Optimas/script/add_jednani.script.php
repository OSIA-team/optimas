<?php
/**
 * PHP skript pro přidání jednání do databáze z formulare
 */

 if (isset($_POST['pridat_jednani'])) {

  require '../model/database.class.php';
  $mysqli = new database();

  require '../model/jednani.class.php';
  $jednani = new jednani($mysqli);

  foreach ($_POST as $key => $value) {
    $$key = $value;
  }

  $insert_jednani = array(
    'datumjednani'    => "{$datumjednani}",
    'datumvyrizeni'   => "{$datumvyrizeni}",
    'kdojednal'       => "{$kdojednal}",
    'kdovyridil'      => "{$kdovyridil}",
    'predmet_jednani' => "{$predmet_jednani}",
    'klient_id'       => $klient_id,
    'skym'            => "{$skym}"
  );

      $jednani_id = $jednani->addJednani($insert_jednani);
      if ($jednani_id != FALSE) {
        header("Location: ../?page=jednani&id={$jednani_id}");
      } else {
        # error
      }


}





 ?>
