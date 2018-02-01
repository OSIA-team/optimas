<?php
echo "start";

if (isset($_POST['edit_jednani'])) {

    require '../model/database.class.php';
    $mysqli = new database();

    require '../model/jednani.class.php';
    $jednani = new jednani($mysqli);

    foreach ($_POST as $key => $value) {
      $$key = $value;
    }

    $update_jednani = array(
      'datumjednani'    => "{$datumjednani}",
      'datumvyrizeni'   => "{$datumvyrizeni}",
      'kdojednal'       => "{$kdojednal}",
      'kdovyridil'      => "{$kdovyridil}",
      'predmet_jednani' => "{$predmet_jednani}",
      'skym'            => "{$skym}"
    );

    $where_jednani = array ('id' => $jednani_id);

        $updated = $jednani->editJednani($update_jednani, $where_jednani);
        if ($updated != FALSE) {
          header("Location: ../?page=jednani&id={$jednani_id}");
        } else {
          # error
        }
}
 ?>
