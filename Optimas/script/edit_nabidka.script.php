<?php
/**
 * PHP script pro upravu objednavky jako nabidky v databázi z formulare
 */

 // die(var_dump($_POST));

if (isset($_POST['objednavka_edit'])) {

  require '../model/database.class.php';
  $mysqli = new database();

  require '../model/objednavka.class.php';
  $objednavka = new objednavka($mysqli);

  foreach ($_POST as $key => $value) {
    $$key = $value;
  }

$update_objednavka = array(
  'datumobjednavky'   => "{$datumobjednavky}",
  'prijal'            => "{$prijal}",
  'predmetobjednavky' => "{$predmetobjednavky}",
  'cislo_obj_nase'    => "{$cislo_obj_nase}",
  'sleva'             => "{$sleva}",
  'eur'               => "{$eur}",
  'poznamka'          => "{$poznamka}"
);

$where_objednavka = array('id' => $objednavka_id );
$updated_objednavka = $objednavka->editObjednavka($update_objednavka, $where_objednavka);

$delete_produkty = $objednavka->deleteAllProduktyByObj($objednavka_id);
if ($delete_produkty) {
  echo "vymazano!";
} else {
  echo "nevymazano :(";
}
echo "<br>";
foreach ($produkt_id as $key => $value) {
  //  $objednavka->addProduktToObj($objednavka_id, $value, $pocet[$key]);
//  echo "$objednavka_id, $value, {$pocet[$key]}";
  if ($objednavka->addProduktToObj($objednavka_id, $value, $pocet[$key]) == false) {
   die("Chyba!");
 } else {
   echo "pridano!<br>";
 }
}

if ($updated_objednavka != FALSE) {
  header("Location: ../?page=nabidka&id={$objednavka_id}");
} else {

  # error
}


}
 ?>
