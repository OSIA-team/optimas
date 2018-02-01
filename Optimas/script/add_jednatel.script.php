<?php
/**
 * PHP skript pro přidání jednatele do databáze z formulare
 */

if (isset($_POST['pridat_jednatele'])) {

 require '../model/database.class.php';
 $mysqli = new database();

 require '../model/jednatel.class.php';
 $jednatel = new jednatel($mysqli);

 foreach ($_POST as $key => $value) {
   $$key = $value;
 }

$insert_jednatel = array(
  'titul'     => "{$titul}",
  'jmeno'     => "{$jmeno}",
  'prijmeni'  => "{$prijmeni}",
  'mobil'     => "{$mobil}",
  'email'     => "{$email}",
  'funkce'    => "{$funkce}",
  'klient_id' => $klient_id
);

    $jednatel_id = $jednatel->addJednatel($insert_jednatel);
    if ($jednatel_id != FALSE) {
      header("Location: ../?page=nahled_klient&id={$klient_id}");
    } else {
      # error
    }


}


 ?>
