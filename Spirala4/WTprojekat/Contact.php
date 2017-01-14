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
        <div class="row">
            <div class="col-6">
                <form class="contact_form" name="contact_form" onsubmit="return checkContact()" method="post">

                    <div>

                        <label for="name">Your name:</label><br />
                        <input type="text" name="name" id="name1" size="30">
                        <div id="name_error" class="val_error"></div>
 
                    </div>
                    <div>

                        <label for="email">Your email:</label><br />
                        <input type="text" name="email" id="email" size="30">
                        <div id="email_error" class="val_error"></div>

                    </div>
                    <div>

                        <label for="message">Your message:</label><br />
                        <textarea class="message" rows="7" cols="30" id="message"></textarea><br />
                        <div id="message_error" class="val_error"></div><br />

                    </div>

                    <input id="submit_button" type="submit" value="Send email" onClick="SaveContact()"/>

                </form>

            </div>
            
            <div class="contact-links">
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <p> You can contacts us also on :
                                <p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="https://www.facebook.com/UFC/"> Facebook </a><br /><br />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="https://www.instagram.com/ufc/"> Instagram </a><br /><br />
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row">
            
            <div class="col-2"> &nbsp;
            </div>
            <div class="col-8">
                <br> <br>
                


                    <p>
                           You can help improve This page by giving us feedback with any problems you're having on your computer.

                        Enter your name, email and message us about the bug you have discovered.
                        Add details, including steps to help us recreate the issue you're experiencing.
                    
                        To submit the report, click Send Email.
                        We appreciate your help! In most cases we won't be able to send you an individual response, but we'll investigate your report and use the information you provide to improve this page.
                        <br> <br>
                       

                        Development team 
                    </p>    
            </div>
            <div class="col-2">&nbsp;
            </div>
        </div>
        


    </div>


 </div>
        
        
        <footer>
            ETF Sarajevo Web Tehnologije © All rights reserved
        </footer>


        
     
        <script src="js/ajax.js"></script>

        

</body>

</html>


