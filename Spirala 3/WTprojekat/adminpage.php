<?php


    $errors = array();
    $errors1 = array();
    session_start();
    if(!file_exists('' . $_SESSION['username'] . '.xml')){
        header('Location: login.php');
        die;
    }
    if($_SESSION['username']!= 'arif'){
        header('Location: Index.php');
        die;
    }

    if(isset($_POST['Add'])){
        $xml = new DomDocument("1.0", "UTF-8");
        $xml->load('fighters.xml');

        $Fname = $_POST['Fname'];
        
        $Country = $_POST['Country'];
        $Wclass = $_POST['Wclass'];

        if($Fname==''){
        $errors[] = 'name is blank';
    }
    if($Country==''){
        $errors[] = 'Country is blank';
    }
    if($Wclass==''){
        $errors[] = 'Weight class is blank';
    }


        if(count($errors)==0) {
        $rootTag = $xml->getElementsByTagName("root")->item(0);

        $infoTag = $xml->createElement("info");
            $nameTag = $xml->createElement("name", e($Fname));
            
            $countryTag = $xml->createElement("country", e($Country));
            $WclassTag = $xml->createElement("weightClass", e($Wclass));

            $infoTag->appendChild($nameTag);
            
            $infoTag->appendChild($countryTag);
            $infoTag->appendChild($WclassTag);

            $rootTag->appendChild($infoTag);

            $xml->save('fighters.xml');


        }
            }

            if(isset($_POST['Delete'])){
                    $xml = new DomDocument("1.0", "UTF-8");
                    $xml->load('fighters.xml');

                    $Fname = $_POST['Dname'];
                    

                    $xpath = new DOMXPATH($xml);

                    foreach($xpath->query("/root/info[name='$Fname']") as $node){
                        $node->parentNode->removeChild($node);

                    }

                    $xml->formatoutput = true;
                $xml->save('fighters.xml');
            }

            if(isset($_POST['Modify'])){
                $Mname = $_POST['Mname'];
        
                $MCountry = $_POST['MCountry'];
                $MWclass = $_POST['MWclass'];

                $xml = simplexml_load_file('fighters.xml');

                        if($Mname==''){
                            $errors1[] = 'name is blank';

    }
                    if($MCountry==''){
                        $errors1[] = 'Country is blank';
    }
                    if($MWclass==''){
                        $errors1[] = 'Weight class is blank';
    }
                    if(count($errors1)==0) {
                    $k = null;
                    foreach ($xml as $korisnik) {
                        if($korisnik->name == $_POST['Mname']){
                            $k = $korisnik;
                            break;
                        }

                    }
                    if($k===null){
                        echo 'Ne postoji taj fighter';
                        die;
                    }
                    $k->country = e($MCountry);
                    $k->weightClass = e($MWclass);
                    file_put_contents('fighters.xml', $xml->asXML());
                }

            }
            // $k = null;
// foreach ($xml as $korisnik) {
//     if ($korisnik->username == 'test') {
//         $k = $korisnik;
//         break;
//     }
// }

// if ($k === null) {
//     echo 'Nema korisnika.';
// }

// $k->username = 'novi';

// file_put_contents('korisnici.xml', $xml->asXML());




?>


  

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>

        <script src="js/validacija.js" id="skripta"></script>
         <script src="js/carousel.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="app.css">
    <title>WT PROJEKAT</title>
</head>

<body onload="load()">
    
        <div class="home_user">
            <div class=row>
                <div class="col-4 col-m-6">
                    <a href="Index.php">
                        <img src="images/ufc_logo.png" >
                    </a>
                </div>
                </div>
                    
                   </div> 
  
   <div class = "navigation">
    <div class="row">
        <div class="col-13 col-m-6">
        <a class="nav-Prva" href="Index.php"  > Home </a>
        </div>
        <div class="col-13 col-m-6">
        <a class="nav-Prva" href="Events.php" > Events </a>
        </div>
        <div class="col-13 col-m-6">
        <a class="nav-Prva" href="Fighters.php" > Fighters </a>
        </div>
        <div class="col-13 col-m-6">
        <a class="nav-Prva" href="Contact.php" > Contact </a>
        </div>
        <div class="col-13 col-m-12">
        <a class="nav-Prva" href="login.php" > Login / Register</a>
        </div>
   
    </div>
</div>
    <div class="content">
        <h1>Add or Remove fighters on the roaster</h1>
    <div class="row">
        <div class="col-4">
            <h2>Add Fighters</h2>
                            <form class="Add" method="post" action="adminpage.php">

                                   <?php
                                if(count($errors)>0) {
                                    echo '<ul>';
                                        foreach ($errors as $e) {
                                           echo '<li>' . $e . '</li>';
                                        }
                                    echo '</ul>';
                                }
                            ?>
                            
                                <div>
                                    <label for="Fname">Name</label> 
                                    <input type="text" name="Fname" id="Fname" placeholder="Enter name">
                            
                                </div>
                              
                        <div>
                            <label for="Country">Country</label>
                            <input type="text" name="Country" id="Country" placeholder="Enter Country">
                            
                        </div>
                        <div>
                             <label for="Wclass">Weight Class</label>
                            <input type="text" name ="Wclass" id="Wclass" placeholder="Enter Weight Class">
                            </div>
                            <input type="submit" value="Add" class="btn" name="Add" >
                            
                           
                        </form>
        </div>
        <div class="col-4">
            <h2>Delete Fighters</h2>
            <form class="Delete" method="post" action="adminpage.php">
                            
                            <div>
                            <label for="Dname">Name</label> 
                            <input type="text" name="Dname" id="Dname" placeholder="Enter name">
                            </div>
                           
                     
                            <input type="submit" value="Delete" class="btn" name="Delete" >
                            
                           
                        </form>
        </div>
        <div class="col-4">
                            <h2>Modify Fighters</h2>
                            <form class="Modify" method="post" action="adminpage.php">

                                   <?php
                                if(count($errors1)>0) {
                                    echo '<ul>';
                                        foreach ($errors1 as $e) {
                                           echo '<li>' . $e . '</li>';
                                        }
                                    echo '</ul>';
                                }
                            ?>
                            
                                <div>
                                    <label for="Mname">Name</label> 
                                    <input type="text" name="Mname" id="Mname" placeholder="Enter name">
                            
                                </div>
                              
                        <div>
                            <label for="Country">Country</label>
                            <input type="text" name="MCountry" id="MCountry" placeholder="Enter Country">
                            
                        </div>
                        <div>
                             <label for="Wclass">Weight Class</label>
                            <input type="text" name ="MWclass" id="MWclass" placeholder="Enter Weight Class">
                            </div>
                            <input type="submit" value="Modify" class="btn" name="Modify" >
                            
                           
                        </form>
        </div>

    </div>


<div class="row">
    <div class="col-6">
    <?php

    $xml = simplexml_load_file('fighters.xml');
    ?>
    <table>
<tr>
        <th>Name</th>
        <th>Country</th>
        <th>Weightclass</th>
</tr>
192.168.1.102
<?php
foreach ($xml as $korisnik) {
    echo '<tr>';
    echo '<td>' . e($korisnik->name) . '</td>';
    echo '<td>' . e($korisnik->country) . '</td>';
    echo '<td>' . e($korisnik->weightClass) . '</td>';
    echo '</tr>';
}

    ?>
    </div>

    <div class="col-6">
<?php
function e($str)
{
    return htmlspecialchars($str);
}
$xml = simplexml_load_file('korisnici.xml');
?>
<table >
<tr>
        <th>Username</th>
        <th>Password</th>
</tr>
<?php
foreach ($xml as $korisnik) {
    echo '<tr>';
    echo '<td>' . e($korisnik->username) . '</td>';
    echo '<td>' . e($korisnik->password) . '</td>';
    echo '</tr>';
}
?>

    </table>
</div>

</div>

</div>

</div>


 <footer class="adminFooter">
            ETF Sarajevo Web Tehnologije © All rights reserved
        </footer>

        </body>
        </html>