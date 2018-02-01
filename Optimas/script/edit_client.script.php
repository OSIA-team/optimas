<?php
/**
 * PHP script pro upravu klienta v databázi z formulare
 */

if (isset($_POST['Editovat'])) {

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


$update_klient = array(
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

$where_klient = array('id' => $klient_id );


$updated = $klient->editKlient($update_klient, $where_klient);
if ($updated != FALSE) {
  header("Location: ../?page=nahled_klient&id={$klient_id}");
} else {
  # error
}


}
 ?>
