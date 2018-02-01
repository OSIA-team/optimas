<?php
/**
 * PHP skript pro přidání objednavky do databáze z formulare
 */



if (isset($_POST['pridat_objednavku'])) {

/*  $home = $_POST['katalogCislo'];
  foreach($home as $value) {
      echo $value.'<br />';
  }*/


 require '../model/database.class.php';
 $mysqli = new database();

 require '../model/objednavka.class.php';
 $objednavka = new objednavka($mysqli);

 foreach ($_POST as $key => $value) {
   $$key = $value;
 }


$insert_objednavka = array(
  'datumobjednavky'   => "{$datumobjednavky}",
  'prijal'            => "{$prijal}",
  'predmetobjednavky' => "{$predmetobjednavky}",
  'cislo_obj_nase'    => "{$cislo_obj_nase}",
  'sleva'             => "{$sleva}",
//  'sleva'             => "$sleva",
  'eur'               => "{$eur}",
  'poznamka'          => "{$poznamka}",
  'klient_id'         => $klient_id
);

// die(var_dump($produkt_id));
$objednavka_id = $objednavka->addObjednavka($insert_objednavka);

// die("objednavka");

foreach ($produkt_id as $key => $value) {
  //  $objednavka->addProduktToObj($objednavka_id, $value, $pocet[$key]);
//  echo "$objednavka_id, $value, {$pocet[$key]}";
  if ($objednavka->addProduktToObj($objednavka_id, $value, $pocet[$key]) == false) {
   die("Chyba!");
  }
}



/*
'vyridil'           => "{$vyridil}",
*/


//  $objednavka_id = $objednavka->addObjednavka($insert_objednavka);
  if ($objednavka_id != false) {
    header("Location: ../?page=nabidka&id={$objednavka_id}");
  } else {
    # error
  }


 }

 ?>
