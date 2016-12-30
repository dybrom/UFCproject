<?php
    session_start();

    if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    die;
}
?>


<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  } else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","search.php?q="+str,true);
  xmlhttp.send();
}
</script>





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
            <div class="col-12 col-m-12">
                <form class="searchForm" onsubmit="return checkSearch()">
                    <div>
                    <label for="search">Search fighters: </label> <br>
                    <input type="text" name="search"  id="search"  placeholder="Search">
                    
                    <div id="search_error" class="val_error"></div>
                </div>
                <br>
                <input type="submit" value="search" class="btn" onclick="SaveSearch()" onkeyup="showResult(this.value)">
                <div id="livesearch"></div>
           
        
        </form>
    </div>
        </div>
   
        <div class="row">
            <div class="col-12">
                <p>The Ultimate Fighting Championship (UFC) is a mixed martial arts (MMA) promotion, founded in 1993 by Art Davie and Rorion Gracie. The organization was purchased from its parent company SEG in 2001 by Zuffa LLC, a promotional company owned by Las Vegas casino magnates, Jonny Moore and Frank Fertitta and managed by Dana White (current president of operations). Since its inception, and through its current Zuffa management, the UFC has remained one of the more dominant MMA promotions in the world, playing host to a wide field of MMA fighters.</p>

                <p>This list provides an up-to-date roster of all fighters currently competing under the UFC promotional banner. Fighters are organized by weight class and within their weight class by their number of appearances inside the UFC. Fighters with the same number of fights are listed in order of their number of wins. Fighters with the same UFC record are listed alphabetically.</p>

                <p>World Extreme Cagefighting (WEC) was purchased by Zuffa in 2006[and officially merged under the UFC brand on January 1, 2011. All former WEC fighters have had their WEC record listed in place of their UFC record, starting with WEC 25 (the first WEC event under Zuffa). These records have been, and will be, continued as former WEC fighters move on in the UFC.</p>

                <p>Strikeforce was purchased by Zuffa in 2011 and officially merged under the UFC brand on January 12, 2013. All former Strikeforce fighters have had their Strikeforce record listed in place of their UFC record, starting with Strikeforce Challengers: Wilcox vs. Damm (the first Strikeforce event under Zuffa). These records have been, and will be, continued as former Strikeforce fighters move on in the UFC.</p>

                <p>Each fight record has four categories: wins, losses, draws, and no-contests (NC). All fight records in this article are displayed in that order, with fights resulting in a no-contest listed in parentheses.</p>

                <p>The Ultimate Fighting Championship (UFC) is a mixed martial arts (MMA) promotion, founded in 1993 by Art Davie and Rorion Gracie. The organization was purchased from its parent company SEG in 2001 by Zuffa LLC, a promotional company owned by Las Vegas casino magnates, Jonny Moore and Frank Fertitta and managed by Dana White (current president of operations). Since its inception, and through its current Zuffa management, the UFC has remained one of the more dominant MMA promotions in the world, playing host to a wide field of MMA fighters.</p>
            </div>
        </div>
 
    </div>


 </div>
        
        
        <footer>
            ETF Sarajevo Web Tehnologije © All rights reserved
        </footer>


        
     
        <script src="ajax.js"></script>

        

</body>

</html>