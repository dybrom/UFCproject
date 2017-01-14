<?php


session_start();

    
        
        
$db = new PDO('mysql:host=localhost;dbname=wtprojekat', 'arif', 'arif');



function e($str)
{
    return htmlspecialchars($str);
}

if (isset($_SESSION['username'])) {
    header('Location: index.php');
    die;
}

$error = false;
$errors = array();


    $rezultat=$db->query("select id,username,password from users");
   
    $users=[];
    foreach ($rezultat as $korisnik) {
      $user = new stdClass;
      $user->id=$korisnik['id'];
      $user->username=$korisnik['username'];
      $user->password=$korisnik['password'];
      

      array_push($users, $user);
}


if(isset($_POST['Login'])){
    $username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
    $password = $_POST['password'];
    foreach ($users as $korisnik) {
        if ($korisnik->username == $username && $korisnik->password == $password) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
            die;
        }
    }
    $error = true;
}

if(isset($_POST['Register'])){
    $Rusername = preg_replace('/[^A-Za-z]/', '', $_POST['Rusername']);
    $Remail = $_POST['Remail'];
    $Rpassword = $_POST['Rpassword'];
    $Rpassword1 = $_POST['Rpassword1'];
    if($Rusername==''){
        $errors[] = 'Username is blank';
    }
   
    if($Rpassword=='' || $Rpassword1 == ''){
        $errors[] = 'Passwords are blank';
    }
    if($Rpassword != $Rpassword1){
        $errors[] = 'Passwords do not match';
    }
    if(count($errors) == 0) {

                    $stmt=$db->prepare("insert into users(username,password) values(?,?)");
                    $stmt->bindParam(1,$Rusername);
                    $stmt->bindParam(2,$Rpassword);

          $stmt->execute();
      
        header('Location: Login.php');
        die;
    }
}

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

    echo "Succesfull conection to database";


        ?>
        <div class="row">
              <div class="col-6 col-m-6" id="login">
                       <form class="login"  name="login" onsubmit="return checkLogin()" method="post" action="">
                            <div>
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" placeholder="Username">
                            <div id="username_error" class = "val_error"></div>
                        </div>
                        <div>
                             <label for="password">Password</label>
                            <input type="password" name ="password" id="password" placeholder="Password">
                            <div id="password_error" class = "val_error"></div>
                            </div>
                            <?php
                                if($error){
                                    echo '<p>Invalid username and/or password</p>';
                                }
                            ?>
                            <input type="submit" value="Login" class="btn" name="Login" onClick="SaveForm()">
                            
                           
                        </form>
                    </div>
                    <div class="col-6">
                        <form class="Register"  name="register" onsubmit="return checkRegister()" method="post" action="">
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
                            <label for="username">Username</label> 
                            <input type="text" name="Rusername" id="Rusername" placeholder="username">
                            <div id="Rusername_error" class = "val_error"></div>
                        </div>
                         
                        <div>
                            <label for="Rpassword">Password</label>
                            <input type="password" name="Rpassword" id="Rpassword" placeholder="password">
                            <div id="Rpassword_error" class = "val_error"></div>
                        </div>
                        <div>
                             <label for="Rpassword1">Confirm Password</label>
                            <input type="password" name ="Rpassword1" id="Rpassword1" placeholder="Confirm Password">
                            <div id="Rpassword1_error" class = "val_error"></div>
                            </div>
                            <input type="submit" value="Register" class="btn" name="Register" >
                            
                           
                        </form>


                    </div>
        </div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

        


      
 </div>
        
        
        <footer>
            ETF Sarajevo Web Tehnologije © All rights reserved
        </footer>


        
     
        <script src="js/ajax.js"></script>

        

</body>

</html>