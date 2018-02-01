<?php
/**
 * PHP skript pro přidání produkt do databáze z formulare
 */


if (isset($_POST['pridat_produkt'])) {


 require '../model/database.class.php';
 $mysqli = new database();

 require '../model/produkt.class.php';
 $produkt = new produkt($mysqli);

 foreach ($_POST as $key => $value) {
   $$key = $value;
 }


$insert_produkt = array(
 'nazevproduktu'  => "{$nazev_produktu}",
 'katalog_id'     => "{$kod_produktu}",
 'cena'           => "{$cena}",
 'cena_eur'       => "{$cena_eur}"
);

  $result = $produkt->addProdukt($insert_produkt);
  if ($result != false) {
    header("Location: ../?page=add_produkt&status=ok");
  } else {
  //  die();
    header("Location: ../?page=add_produkt&status=false");
  }


 }

 ?>
