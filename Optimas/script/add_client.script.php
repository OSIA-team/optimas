<?php
/**
 * PHP script pro přidání klienta do databáze z formulare
 */

if (isset($_POST['pridat_klienta'])) {

  require '../model/database.class.php';
  $mysqli = new database();

  require '../model/klient.class.php';
  $klient = new klient($mysqli);

  foreach ($_POST as $key => $value) {
    $$key = $value;
  }

// TRUE nebo FALSE hodnota
$stavebni         = (!isset($stavebni)) ? 0 : 1 ;
$obchodnik        = (!isset($obchodnik)) ? 0 : 1 ;
$ziva             = (!isset($ziva)) ? 0 : 1 ;
$wimag            = (!isset($wimag)) ? 0 : 1 ;
$optimas          = (!isset($optimas)) ? 0 : 1 ;
$pouzitestroje    = (!isset($pouzitestroje)) ? 0 : 1 ;
$kod_zakaznika    = (!isset($kod_zakaznika)) ? '0000' : $kod_zakaznika;

$insert_klient = array(
  'kod_zakaznika' => $kod_zakaznika,
  'nazev_firmy'   => "{$nazev_firmy}",
  'zeme'          => "{$zeme}",
  'ulice'         => "{$ulice}",
  'mesto'         => "{$mesto}",
  'psc'           => "{$psc}",
  'telefon'       => "{$telefon}",
  'fax'           => "{$fax}",
  'email'         => "{$email}",
  'www'           => "{$www}",
  'wimag'         => $wimag,
  'optimas'       => $optimas,
  'ziva'          => $ziva,
  'stavebni'      => $stavebni,
  'obchodnik'     => $obchodnik,
  'pouzitestroje' => $pouzitestroje
);


$klient_id = $klient->addKlient($insert_klient);
if ($klient_id != FALSE) {
  header("Location: ../?page=add_jednatel&id={$klient_id}");
} else {
  # error
}


}
 ?>
