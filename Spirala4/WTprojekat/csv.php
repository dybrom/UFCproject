<?php
function e($str) {
	return htmlspecialchars($str);
}

$db = new PDO('mysql:host=localhost;dbname=wtprojekat', 'root', '');


$csv = '';

 $rezultat=$db->query("select Name,Country,Weightclass from fighters");
   
    $fighters=[];
    foreach ($rezultat as $korisnik) {
      $fighter = new stdClass;
      $fighter->Name=$korisnik['Name'];
      $fighter->Country=$korisnik['Country'];
      $fighter->Weightclass=$korisnik['Weightclass'];
      

      array_push($fighters, $fighter);
}
foreach ($fighters as $info) {
	$csv .= $info->Name . ',' . $info->Country . $info->Weightclass . "\n";
}

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename=fighters.csv');

echo $csv;