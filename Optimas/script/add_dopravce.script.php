<?php
/**
 * PHP skript pro přidání dopravce do databáze z formulare
 */


if (isset($_POST['pridat_dopravce'])) {


 require '../model/database.class.php';
 $mysqli = new database();

 require '../model/dopravce.class.php';
 $dopravce = new dopravce($mysqli);

 foreach ($_POST as $key => $value) {
   $$key = $value;
 }


$insert_dopravce = array(
 'nazev' => "{$nazev}"
);

  $result = $dopravce->addDopravce($insert_dopravce);
  if ($result != false) {
    header("Location: ../?page=add_dopravce&status=ok");
  } else {
  //  die();
    header("Location: ../?page=add_dopravce&status=false");
  }


 }

 ?>
