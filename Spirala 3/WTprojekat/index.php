<?php
    session_start();

    if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    die;
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
    

    <h2>Welcome, <?php echo $_SESSION['username']; ?> </h2>
    

    <?php
        if($_SESSION['username']=='arif'){
           echo '<a href="adminpage.php">Admin Page</a>';
        }
    ?>
        <div class="home_user">
            <div class=row>
                <div class="col-3">
                    <a href="Index.php">
                        <img src="images/ufc_logo.png" >
                    </a>
                </div>
                <div class="col-3">
                    <a href="logout.php"> Logout </a>
                </div>
                 <div class="col-3">
                    <a href="csv.php"> CSV download </a>
                </div>
                <div class="col-3">
                    <a href="pdf.php"> PDF download </a>
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
    
    <div id="content" class="content">

    
        
    
  
        <div class="headline">
        <div class="row">
            <div class="col-12">
        <h1>Upcoming events</h1>
    </div>
</div>
    </div>

    <div class="MCGALV">
    <div class="row">
        <div class="col-6 col-m-12">
        
            
            <img src="images/UFC205.jpg">
 
         </div>
        <div class="col-6 col-m-12">
            <h2>UFC 205 : Mcgregor vs Alvarez</h2>
            <p>This event will be the first UFC event hosted in New York City. It will also be the first UFC event hosted in the State of New York after the longtime professional MMA ban was revoked in early 2016. To this point, UFC 7 was the only event contested in the state, taking place in September 1995 at Buffalo.</p>

            <p>Date : November 12, 2016</p>

            <p>Venue : Madison Square Garden</p>

            <p>City : New York City, New York</p>
        </div>
        </div>
    </div>

         <div class="CORJOH">
        <div class="row">
        <div class="col-6 col-m-12">
        
            
            <img src="images/UFC206.jpg">
             </div>
         
        <div class="col-6 col-m-12">
            
            <h2>UFC 206 : Cormier vs Johnson 2</h2>
            <p>A UFC Light Heavyweight Championship rematch between the current champion Daniel Cormier and Anthony Johnson is expected to headline the event. The pairing met previously in May of 2015 at UFC 187 with Cormier winning the fight (and the vacant title) via submission in the third round.</p>

            <p>Date : December 10, 2016</p>

            <p>Venue : Air Canada Centre</p>

            <p>City : Toronto, Ontario, Canada</p>
        </div>
        </div>
    </div>

 <div class="NUNROU">
        <div class="row">
        <div class="col-6 col-m-12">
        
             
            <img src="images/UFC_207.jpg">
             
         </div>
        <div class="col-6 col-m-12">
            <h2>UFC 206 : Nunes vs Rousey</h2>
            <p>The event is expected to be headlined by a UFC Women's Bantamweight Championship bout between current champion Amanda Nunes and former champion Ronda Rousey.</p>

            <p>Date : December 30, 2016</p>

            <p>Venue : T-Mobile Arena</p>

            <p>City : Las Vegas, Nevada</p>
        </div>
        </div>
    </div>

        

        



      

        </div>
        
        
        <footer>
            ETF Sarajevo Web Tehnologije © All rights reserved
        </footer>


        
     
        <script src="js/ajax.js"></script>
        <script src="ajax.js"></script>

        

        

</body>

</html>