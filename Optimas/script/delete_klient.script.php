<?php

echo "start";

if ($_POST['delete_klient']) {
  echo "if tlacitko";

    $klient_id = $_POST['klient_id'];

    require '../model/klient.class.php';
    require '../model/database.class.php';

    $mysqli = new database();
    $klient = new klient($mysqli);

    $deleted = $klient->deleteKlient($klient_id);

    if ($deleted != false) {
      header("location: ../index.php");
    } else {
      echo "error";
    }


}


 ?>
