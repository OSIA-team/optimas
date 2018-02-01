<?php


//require 'src/BittrDbug.php';
/**
 * @param error handle type
 * @param theme name (bittr|default|yola). Themes can be configures in theme.json
 * @param lines of code to cover before and after the error.
 */
// new BittrDbug(BittrDbug::PRETTIFY, 'yola', 20);
#This should be implemented before any other script execution except your autoloader(if using one).
//use Dbug\BittrDbug;
// new BittrDbug(BittrDbug::PRETTIFY, 'yola', 20);
//new BittrDbug(function (\Throwable $e) {
//    var_dump($e->getMessage());
//});
#This should be implemented before any other script execution except your autoloader(if using one).




/**
 * @file index.php
 */
 session_start();
 /**
  * Check if user is logged in
  */
 if (!isset($_SESSION['user'])) {
 	header('Location: login.php');
 }


// Constanty pro tridu database
define( 'DISPLAY_DEBUG', false );
define( 'SEND_ERRORS_TO', 'k.kosut@gmail.com' );
// require database class
require 'model/database.class.php';
$mysqli = new database();

 /**
  * Page determination
  */
    if(!isset($_GET['page'])){
        $stranka = "uvod";
    }
    else{
        $stranka = $_GET['page'];
    }

  require "pages/head.php";
  if($stranka !== "login"){
    require "pages/nav.php";
  }


  switch ($stranka) {
      case 'uvod':
            require "pages/uvod.php";
          break;

      case 'login':
            require "pages/login.php";
          break;

     case 'add_client': //přidat klienta
                require "pages/add_client.php";
              break;

    case 'add_jednatel': //přidat klienta
               require "pages/add_jednatel.php";
             break;

      case 'nahled_klient': //nahled klientu
            require "pages/nahled_klienta.php";
          break;

  case 'edit_client': //vypis všech klientu
         require "pages/edit_client.php";
       break;

     case 'klienti': //vypis všech klientu
            require "pages/klienti.php";
          break;

    case 'nabidky': //vypis všech nabídek
                       require "pages/vypis_nabidek.php";
                     break;
     case 'nabidka': //nahled konkretni nabidky
                        require "pages/nahled_nabidky.php";
                      break;
   case 'nova_nabidka': //vypis všech nabídek
                      require "pages/add_nabidka_from_nav.php";
                    break;

  case 'edit_nabidky': //editace nabidky
                   require "pages/edit_nabidky.php";
                 break;

     case 'objednavka': //nahled konkrteni objednavky dle GET id v URL
            require "pages/nahled_objednavky.php";
          break;

    case 'nova_objednavka': //přidani nove objednavky z odkazu v menu
                 require "pages/add_offer_from_nav.php";
               break;

   case 'edit_objednavka': //editace existujicí objednavky
                require "pages/edit_objednavky.php";
              break;

  case 'objednavky': //vypis vyrizených existujicích objednavek
               require "pages/vypis_objednavky.php";
             break;

 case 'nevyrizene_objednavky':  //vypis nevyrizených existujicích objednavek
              require "pages/vypis_objednavky_nevyrizene.php";
            break;

  case 'jednani': //nahled konkrteniho jednani
               require "pages/nahled_jednani.php";
             break;

  case 'vypisJednani': //vypis všech jednání v DB
              require "pages/jednani.php";
            break;

case 'nevyrizene_jednani': //vypis nevyřizených jednání v DB
            require "pages/nevyrizene_jednani.php";
          break;

  case 'add_jednani': //vypis všech jednání v DB
              require "pages/add_jednani_from_nav.php";
            break;

  case 'edit_jednani': //vypis všech jednání v DB
              require "pages/edit_jednani.php";
            break;

  case 'stroje': //vypis všech sroju v DB
              require "pages/vypis_stroje.php";
            break;

  case 'novy_stroj': //přidání nového stroje do DB
              require "pages/add_stroj.php";
            break;

  case 'nahled_stroje': //nahled stroje
              require "pages/nahled_stroje.php";
            break;

case 'edit_stroje': //editace stroje
            require "pages/edit_stroje.php";
          break;

case 'add_dopravce': //editace stroje
            require "pages/add_dopravce.php";
        break;

case 'add_produkt': //editace stroje
            require "pages/add_produkt.php";
          break;

case 'sestavy': //editace stroje
            require "pages/sestavy.php";
          break;

  }





  require "pages/footer.php";
?>
