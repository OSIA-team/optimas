<?php
/*
 * LOGIC GOES HERE
 */

// Cookies
session_start();
if (isset($_SESSION['user'])) {
    header("location: index.php");
}


// Connection to database
$server   = "localhost";
$user     = "root";
$password = "";
$database = "optimas";

// Create connection
$connection = new mysqli($server, $user, $password, $database);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$connection->set_charset("utf8");

// If user want to login (form sent)
if (isset($_POST['submit'])) {
  $username = stripslashes($_POST['username']);
  $password = stripslashes($_POST['password']);

  $password_hash = crypt($password,'$2a$07$optimas$');

  $query = "SELECT password FROM user WHERE username='{$username}'";


  if($stmt = $connection->query($query)){
    // $stmt->fetch_row();
    while($row = $stmt->fetch_row()) {
      if ($row[0] == $password_hash) {
        $_SESSION["user"] = $user;
        header("location: index.php");
      }
    }

    //var_dump($stmt);


  }


}
/**
 * BLOWFISH ENCRYPT
 * crypt('password','$2a$07$sillysaltcentrumsluzeb$');
 */





 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Optimas - přihlášení uživatele</title>


  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/login.css">


</head>

<body>
    <div class="wrapper">
    <form class="form-signin" method="post">
      <h2 class="form-signin-heading">Přihlaste se</h2>
      <input type="text" class="form-control" name="username" placeholder="Přihlašovací jméno" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Heslo" required=""/>

      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Přihlásit</button>
    </form>
  </div>


</body>
</html>
