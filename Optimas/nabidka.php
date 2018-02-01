<?php


$objednavka_id = $_GET['id'];


require 'model/database.class.php';
require 'model/objednavka.class.php';
// require 'model/klient.class.php';

$mysqli     = new database();
$objednavka = new objednavka($mysqli);

$objednavka_info  = $objednavka->getObjednavka($objednavka_id);
$produkty_info    = $objednavka->getProduktyByObj($objednavka_id);

$cena_celkem = 0;
$mena = ($objednavka_info['eur'] == 1)?"&euro;":"Kč";
$cena = ($objednavka_info['eur'] == 1)?"cena_eur":"cena";

$html = "
<!DOCTYPE html>
<html>
  <head>
    <meta charset=\"utf-8\">
    <title>Nabídka O170003</title>
    <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"shortcut icon\" href=\"favicon.ico\" type=\"image/x-icon\">


      <!-- jQuery -->
    <script src=\"bower_components/jquery/dist/jquery.min.js\"></script>
    <!-- Bootstrap Core CSS -->
    <link href=\"bower_components/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">

    <!-- Custom Fonts -->
    <link href=\"bower_components/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">

    <link href=\"bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css\" rel=\"stylesheet\">

    <!-- DataTables Responsive CSS -->
    <link href=\"bower_components/datatables-responsive/css/responsive.dataTables.css\" rel=\"stylesheet\">

    </head>
    <style>
    @page {
        size: 21cm 29.7cm;
        margin: 10mm 0mm 30mm 0mm; /* change the margins as you want them to be. */
    }
    .stranka{
      width: 100%;
      color: grey;
    }

    .hlavicka{
      text-align: right;
      margin-top: 0px;
    }
    title{
      display: none;
    }
    .title{
      text-align:center;
      font-size: 20px;
      font-weight: bold;
      color: black;
      margin: 50px 0 5px;
      border-bottom: 2px solid black;
    }

    .podtitulek{
      text-align: right;
      font-weight: bold;
      padding-right: 10mm;
      font-size: 3mm;
      color: grey;
      margin-bottom: 80px;
  }
  table{
    width: 100%;
    border: 2px solid black;
  }
  th{
    text-align: center;
    background: #dadada;
    padding: 20px 0;
    border: 1px solid black;
    color: black;
  }
  td{
    padding: 5px 10px;
    border: 1px solid black;
    color: black;
  }

  .orange{
    background: orange;
  }

  .bold-font{
    font-weight: bold;
  }
  .normal-font{
    font-weight: normal;
  }
  .right{
    text-align: right;
  }
  tr:nth-child(even) {
    font-weight: bold;
}

.poznamky{
  margin-top: 50px;
  margin-bottom: 100px;
  color: black;

}

.zpracoval{
  border-bottom: 1px solid black;
  color: black;
  font-weight: bold;
  padding-bottom: 5px;
}



.zapati{
  padding: 15px 0px;
  margin-top: 30px;
  text-align: center;
  font-weight: bold;
  border-top: 3px solid black;
}
    </style>
  </head>
  <body style=\"size: 21cm 29.7cm; margin: 10mm 0mm 30mm 0mm; border: none;\">
      <div class=\"stranka\" style=\"margin: 0px; margin-top: -30px; border: none;\">
          <table style=\"border: none;\">
            <tr style=\"border: none;\">
              <td  style=\"border: none;\"></td>
              <td style=\"text-align: center; border: none;\">   <img src=\"pict/38logo.jpg\" alt=\"logo optimas\" height=\"30\"> </td>
              <td style=\"text-align: right; border:none; padding: 5px;\">  <img src=\"pict/optimas_logo.png\" alt=\"logo optimas\" height=\"25\"> </td>
            </tr>
          </table>
          <br><br>
          <div style=\"text-align:center;font-size: 20px; font-weight: bold; color: black; margin-bottom: -30mm; border-bottom: 1px solid black\">
              Nabídka {$objednavka_info['cislo_obj_nase']}
          </div>
          <div style=\"text-align: right; padding-right: 10mm; font-size: 8px; margin-bottom: 80px; color: black;\">
              Nabídka ze dne ".date("j. n. Y").", platí 31 dní, ceny jsou uvedené v Kč bez DPH a dopravy
          </div>
          <br>
          <div>
          </div>
          <div>
            {$objednavka_info['poznamka']}
          </div>
          <table style=\"margin-top: 1000px; position: relative; top: 100mm; border: 1px solid black; \">
            <tr style=\"padding: 30px;\">
              <th style=\"background-color: rgb(191, 191, 191);  padding: 30mm; border: 1px solid black;color: black; font-weight:bold; width: 10%; \">Kat. č.</th>
              <th style=\"background-color: rgb(191, 191, 191);  padding: 30px; border: 1px solid black;color: black; font-weight:bold; width: 42%;\">Popis</th>
              <th style=\"background-color: rgb(191, 191, 191);  padding: 30px; border: 1px solid black;color: black; font-weight:bold; \">Cena/kus</th>
              <th style=\"background-color: rgb(191, 191, 191);  padding: 30px; border: 1px solid black;color: black; font-weight:bold; width: 8%; \">Počet</th>
              <th style=\"background-color: rgb(191, 191, 191);  padding: 30px; border: 1px solid black;color: black; font-weight:bold; \">Cena</th>
            </tr>";
                foreach ($produkty_info as $produkt_info) {
                  $html .= "<tr>";
                  $html .= "<td class=\"normal-font\" style=\"text-align: center; font-weight normal; border: 0.px solid black;\">".$produkt_info['katalog_id']."</td>";
                  $html .= "<td style=\"background-color: rgb(255, 153, 0); border: 0.px solid black;\" class=\"orange\">".$produkt_info['nazevproduktu']."</td>";
                  $html .= "<td class=\"right normal-font\" style=\"text-align: center; border: 0.px solid black;\">".number_format($produkt_info[$cena], 2, ',', ' ')." $mena</td>";
                  $html .= "<td class=\"right normal-font\" style=\"text-align: center; border: 0.px solid black;\">".$produkt_info['kolik']."</td>";
                  $html .= "<td class=\"right normal-font\" style=\"text-align: right; border: 0.px solid black;\">".number_format($produkt_info[$cena]*$produkt_info['kolik'], 2, ',', ' ')." $mena</td>";
                  $html .= "</tr>";
                  $cena_celkem = $cena_celkem+($produkt_info[$cena]*$produkt_info['kolik']);
                }
            $html .= "</table><br><br><table  style=\"text-align: center; border: 1px solid black;\">
                    <tr><td colspan=\"4\"  style=\"text-align: left; border: 0.px solid black; font-weight: bold;\">Sleva za nabídku (%)</td><td  style=\"text-align: right; border: 0.px solid black; font-weight: bold;\">".$objednavka_info['sleva']." %</td></tr>";
                    $sleva        = ($cena_celkem/100)*$objednavka_info['sleva'];
                    $cena_celkem  = $cena_celkem-$sleva;
                    $cena_celkem  = floatval($cena_celkem);

            $html .="<tr><td colspan=\"4\"  style=\"text-align: left; border: 0.px solid black; font-weight: bold;\">Celkem za nabídku po slevě (bez DPH)</td><td class=\"right bold-font\">".number_format($cena_celkem, 2, ',', ' ')." $mena</td></tr>
          </table><br>

          <div class=\"poznamky\">".$objednavka_info['predmetobjednavky']."</div>
          <div></div>
          <div class=\"zpracoval\"> Zpracoval: ".$objednavka_info['prijal'].", tel: 776 003 929
          </div>
          <br>

        <footer style=\"color: black\">
            <img src=\"pict/logopaving.png\" alt=\"logo paving\" height=\"25\"><br> <strong style=\"color: black\">tb paving specialist s.r.o.</strong><br><span style=\"color: black\">výhradní zastoupení Optimas pro ČR a Slovensko<br><br>Zahradnická 223/6<br>603 00  Brno</span>

            <div style=\"color: black\" >tel: +420 544 526 400<br>info@paving.cz<br>www.optimas.cz
            </div>
          <div style=\" background:orange; \" style=\" background-color: rgb(247, 150, 70); width: 100%; text-align:center; font-weight: bold; color: black; border: 2px solid black;\"><br>
            wwww.optimas.cz/shop
            <br>
          </div>
        </footer>
      </div>
  </body>
</html>
";


require "public/tcpdf.php";
// require 'public/config/tcpdf_config.php';

// echo mb_detect_encoding($html);
// create new PDF document

// Custom footer
class MYPDF extends TCPDF {

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('freesans', 'I', 8);
        // Page number
        $this->Cell(0, 10, "Zpracováno systémem od OSIA www.osia.cz", 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);

// set font
$pdf->SetFont('freesans', '', 10);

// add a page
$pdf->AddPage();

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($objednavka_info['cislo_obj_nase'].'.pdf', 'I');


// echo $html;

 ?>
