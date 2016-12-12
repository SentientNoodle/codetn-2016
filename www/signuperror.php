<?php
    session_start(); // This must be at the beginning of the file.
    
    if (isset($_SESSION["sid"])) {
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            $page = "signup";
            include("../php/head.php");
        ?>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
            
            if (!empty($_GET["exists"])) {
                $exists = true;
            }
        ?>
        
        <h2 style="font-weight:bold; margin-left:1%">TROUBLESHOOTING</h1>
        <p style="margin-left:1%; font-size:115%">POSSBILE PROBLEM/SOLUTION</p>
        <p style="margin-left:1%; font-size:115%">POSIBILE PROBLESKADA/SOLODJA 2</p>
        <p style="margin-left:1%; font-size:115%">POSSIBLE PROBLEM/NOITULOS 3</p>
        <p style="margin-left:1%; font-size:115%">PROBLEM SOLUTION/POSSIBLE 4</p>
        <p style="margin-left:1%; font-size:115%">POSSIBLE POSSIBLE/POSSIBLE 5</p>
        <p style="margin-left:1%; font-size:115%">POSSOSOADKSAD SADSOADA/DSADASDASODA 6</p>
        
        <h2 style="font-weight:bold; margin-left:1%">STILL NOT WORKING?</h2>
        <p style="margin-left:1%; font-size:115%">Contact us at EMAIL HERE</p>
        
    </body>
</html>