<?php


    $errors = array();
    $errors1 = array();
    session_start();
    $db = new PDO('mysql:host=localhost;dbname=wtprojekat', 'arif', 'arif');
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
    else if($Wclass!='Strawweight' && $Wclass!='Flyweight' && $Wclass!='Bantamweight' && $Wclass!='Featherweight' && $Wclass!='Lightweight' && $Wclass!='Welterweight'
         && $Wclass!='Middleweight' && $Wclass!='Light Heavyweight' && $Wclass!='Heavyweight'){
        $errors[] = 'Weight class does not exist!';
    }

           $nRows = $db->query('select count(*) from fighters')->fetchColumn(); 
           

        if(count($errors)==0) {

             if($Country=='Brasil') $country_id=1;
                else if($Country=='USA') $country_id = 2;
                else if($Country=='Ireland') $country_id = 3;
                else if($Country=='Bosnia and Herzegovina') $country_id = 4;

                if($Wclass=='Strawweight') $weightClass_id=1;
                else if($Wclass=='Flyweight') $weightClass_id=2;
                else if($Wclass=='Bantamweight') $weightClass_id=3;
                else if($Wclass=='Featherweight') $weightClass_id=4;
                else if($Wclass=='Lightweight') $weightClass_id=5;
                else if($Wclass=='Welterweight') $weightClass_id=6;
                else if($Wclass=='Middleweight') $weightClass_id=7;
                else if($Wclass=='Lightheavyweight') $weightClass_id=8;
                else if($Wclass=='Heavyweight') $weightClass_id=9;

                


                

                
                $stmt = $db->prepare("insert into fighters(Name, Country, country_id, Weightclass, weightClass_id) values(?,?,?,?,?)");
                
                $stmt->bindParam(1,$Fname);
                $stmt->bindParam(2,$Country);
                $stmt->bindParam(3,$country_id);
                $stmt->bindParam(4,$Wclass);
                $stmt->bindParam(5,$weightClass_id);

                $stmt->execute();


        }
            }

            if(isset($_POST['Delete'])){
                   

                    $Dname = $_POST['Dname'];
                    $sql = "DELETE FROM `fighters` WHERE `Name` = '$Dname'";
                    $query = $db->prepare( $sql );
                    $query->execute();
                 


                  
            }

            if(isset($_POST['Modify'])){
                $Mname = $_POST['Mname'];
        
                $MCountry = $_POST['MCountry'];
                $MWclass = $_POST['MWclass'];

                

                        if($Mname==''){
                            $errors1[] = 'name is blank';

    }
                    if($MCountry==''){
                        $errors1[] = 'Country is blank';
    }
                    if($MWclass==''){
                        $errors1[] = 'Weight class is blank';
    }
    if($MWclass!='Strawweight' && $MWclass!='Flyweight' && $MWclass!='Bantamweight' && $MWclass!='Featherweight' && $MWclass!='Lightweight' && $MWclass!='Welterweight'
         && $MWclass!='Middleweight' && $MWclass!='Lightheavyweight' && $MWclass!='Heavyweight'){
        $errors[] = 'Weight class does not exist!';
    }



                    if(count($errors1)==0) {

                    $sql = "UPDATE fighters  SET Country=?, Weightclass=? WHERE Name=?";
                    $query = $db->prepare( $sql );
                    $query->execute(array($MCountry,$MWclass,$Mname));

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

        <?php
        
         $db_host = "localhost";
             $db_username = "root";
    $db_pass = "";
    $db_name = "wtprojekat";

    @mysql_connect("$db_host", "$db_username", "$db_pass") or die ("Could not connect to MySQL");
    @mysql_select_db("$db_name") or die("No database");

    echo "Succesfull conection to database </br>";

  

 



        ?>

        <a href="xmlToSql.php">XML to SQL</a>


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
<?php



    $getUsers = $db->prepare("SELECT * FROM fighters ORDER BY id ASC");
$getUsers->fetchAll();
$getUsers->execute();
if(count($getUsers) > 0){
    while($user = $getUsers->fetch()){
        
        echo '<tr>';
    echo '<td>' .  $user['Name'] . '</td>';
    echo '<td>' . $user['Country'] .  '</td>';
    echo '<td>' . $user['Weightclass'] . '</td>';
    echo '</tr>';
}
    }


?>
</table>
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