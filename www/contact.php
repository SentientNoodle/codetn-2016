<?php
    session_start();
    
    include("../php/sqlconnect.php");
    
    if ($_GET["signout"] == "1") {
        session_unset();
        header("Location: index.php");
        exit;
    }
    
    // Randomly select background image
    $imagescontact = array("contactback1.jpg");
    $ncontact = rand(0, count($imagescontact) - 1);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            $page = "contact";
            include("../php/head.php");
        ?>
        <title>CodeTN</title>
        <style>
            body {
                background-image: url("../media/backgrounds/<?php echo $imagescontact[$ncontact] ?>");
            }
        </style>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
        ?>
        
        <h1 style="font-weight:bold;color:white" align="center" >CONTACT US</h1>
  
  
  
    </body>
</html>