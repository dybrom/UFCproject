<?php
            
            


           
           $db = new PDO('mysql:host=localhost;dbname=wtprojekat', 'root', '');

           $xmldoc = new DomDocument();
           $xmldoc->load('fighters.xml');

           $xmldata = $xmldoc->getElementsByTagName('info');
           $xmlcount = $xmldata->length;

           echo '<a href="adminpage.php"> Back  <br/> </a>';

           for($i=0; $i<$xmlcount; $i++){
               $name = $xmldata->item($i)->getElementsByTagName('name')->item(0)->childNodes->item(0)->nodeValue;
               $country = $xmldata->item($i)->getElementsByTagName('country')->item(0)->childNodes->item(0)->nodeValue;
               $weightClass = $xmldata->item($i)->getElementsByTagName('weightClass')->item(0)->childNodes->item(0)->nodeValue;

               if($country=='Brasil') $country_id=1;
               else if($country=='USA') $country_id = 2;
               else if($country=='Ireland') $country_id = 3;
               else if($country=='Bosnia and Herzegovina') $country_id = 4;

               if($weightClass=='Strawweight') $weightClass_id=1;
               else if($weightClass=='Flyweight') $weightClass_id=2;
               else if($weightClass=='Bantamweight') $weightClass_id=3;
               else if($weightClass=='Featherweight') $weightClass_id=4;
               else if($weightClass=='Lightweight') $weightClass_id=5;
               else if($weightClass=='Welterweight') $weightClass_id=6;
               else if($weightClass=='Middleweight') $weightClass_id=7;
               else if($weightClass=='Lightheavyweight') $weightClass_id=8;
               else if($weightClass=='Heavyweight') $weightClass_id=9;
               

               
               $id=$i+1;

               $stmt = $db->prepare("insert into fighters(Name, Country, country_id, Weightclass, weightClass_id) values(?,?,?,?,?)");
               
               $stmt->bindParam(1,$name);
               $stmt->bindParam(2,$country);
               $stmt->bindParam(3,$country_id);
               $stmt->bindParam(4,$weightClass);
               $stmt->bindParam(5,$weightClass_id);

               $stmt->execute();

               printf($name. '<br/>');

           }

            echo '<br/>';

            $doc = new DomDocument();
            $doc->load('korisnici.xml');

            $data = $doc->getElementsByTagName('korisnik');
            $count = $data->length;


            for($j=0;$j<$count;$j++){
                $username = $data->item($j)->getElementsByTagName('username')->item(0)->childNodes->item(0)->nodeValue;
                $password1 = $data->item($j)->getElementsByTagName('password')->item(0)->childNodes->item(0)->nodeValue;


                $stmt1 = $db->prepare("insert into users(username, password) values(?,?)");
                $stmt1->bindParam(1, $username);
                $stmt1->bindParam(2, $password1);

                $stmt1->execute();

                printf($username . ' ' . $password1 . '<br/>' );

            }




        ?>