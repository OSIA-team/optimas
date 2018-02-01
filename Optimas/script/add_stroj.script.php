<?php
/**
 * PHP skript pro přidání stroje do databáze z formulare
 */

echo "start";

if (isset($_POST['pridat_stroj'])) {

echo "pokracujem";

 require '../model/database.class.php';
 $mysqli = new database();

 require '../model/stroj.class.php';
 $stroj = new stroj($mysqli);

 foreach ($_POST as $key => $value) {
   $$key = $value;
 }


$insert_stroj = array(
  'vyrobce'       => "{$vyrobce}",
  'typ'           => "{$typ}",
  'vyrobnicislo'  => "{$vyrobnicislo}",
  'rokvyroby'     => $rokvyroby,
  'poznamka'      => "{$poznamka}",
);

/*
'vyridil'           => "{$vyridil}",
*/


  $stroj_id = $stroj->addStroj($insert_stroj);
  if ($stroj_id != false) {
    header("Location: ../?page=nahled_stroje&id={$stroj_id}");
  } else {
    # error
  }


 }

 ?>
