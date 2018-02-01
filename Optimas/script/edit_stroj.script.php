<?php
/**
 * PHP skript pro úpravu stroje v databáze z formulare
 */

echo "start";

if (isset($_POST['edit_stroj'])) {

echo "pokracujem";

 require '../model/database.class.php';
 $mysqli = new database();

 require '../model/stroj.class.php';
 $stroj = new stroj($mysqli);

 foreach ($_POST as $key => $value) {
   $$key = $value;
 }


$update_stroj = array(
  'vyrobce'       => "{$vyrobce}",
  'typ'           => "{$typ}",
  'vyrobnicislo'  => "{$vyrobnicislo}",
  'rokvyroby'     => $rokvyroby,
  'poznamka'      => "{$poznamka}",
  'stav'          => "{$stav}",
  'klient_id'     => $klient_id
);

$where_stroj = array('id' => $stroj_id );


$updated = $stroj->editStroj($update_stroj, $where_stroj);
if ($updated != FALSE) {
  header("Location: ../?page=nahled_stroje&id={$stroj_id}");
} else {
  # error
}


 }

 ?>
