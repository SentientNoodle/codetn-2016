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
        <p style="margin-left:1%; font-size:115%">Contact us at <a href="mailto:FlavortownCodeTN@gmail.com?Subject=Hello%20Flavortown%20team,%20I%20found%20a%20bug" target="_top">FlavortownCodeTN@gmail.com</a></p>
        <p style="margin-left:1%">[We will try to get back to you as soon as possible]</p>
        
    </body>
</html>