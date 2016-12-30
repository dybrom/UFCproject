<?php
require('pdf/fpdf.php');

function e($str) {
  return htmlspecialchars($str);
}

class PDF extends FPDF
{
  // Page header
  function Header()
  {
      // Logo
      $this->Image('images/UFC205.jpg',10,6,30);
      // Arial bold 15
      $this->SetFont('Times','B',15);
      // Background color
      $this->SetFillColor(200,220,255);
      // Move to the right
      $this->Cell(80);
      // Title
      $this->Cell(30,10,'Izvjestaj',1,0,'C');
      // Line break
      $this->Ln(20);
  }

  // Page footer
  function Footer()
  {
      // Position at 1.5 cm from bottom
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Times','I',10);
      // Page number
      $this->Cell(0,10,'Stranica '.$this->PageNo().'/{nb}',0,0,'C');
  }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
///POdaci
$broj=simplexml_load_file('fighters.xml');

$pdf->Cell(0,10,'',0,1);

$pdf->SetFont('Times','B',13);
$pdf->Cell(0,10,'Current Fighters:',0,1);

$pdf->SetFont('Times','',12);
for($i = 0; $i < count($broj); $i++){
   $name =$broj->info[$i]->name;
   $country =$broj->info[$i]->country;
   $weightClass=$broj->info[$i]->weightClass;
   $n=$i+1;
   $red=''.$n.': '.(string)e($name).'  is from '.(string)e($country).' and fighting in '.(string)e($weightClass).' division';
   $pdf->Cell(0,10,$red,0,1);
}
$pdf->Cell(0,10,'',0,1);




$users=simplexml_load_file('korisnici.xml');
$ukupno=count($users->user);

$pdf->SetFont('Times','B',13);
$pdf->Cell(0,10,'Registered users:',0,1);

$pdf->SetFont('Times','',12);
for($i = 0; $i < count($users->korisnik); $i++){
    $name = $users->korisnik[$i]->username;
    $password = $users->korisnik[$i]->password;
    $n=$i+1;
    $red=''.$n.': Username: '.(string)e($name).' password: '.(string)e($password). '';
    $pdf->Cell(0,10,$red,0,1);
}

$pdf->Output('izvjestaj.pdf','D');
header("Content-Disposition: attachment; filename='izvjestaj.pdf'");
header("Content-Length: " . filesize(izvjestaj.pdf));
header("Content-Type: application/octet-stream;");

?>
