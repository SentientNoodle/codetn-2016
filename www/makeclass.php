<?php
    session_start();
    
    if ($_GET["signout"] == "1") {
        session_unset();
        header("Location: index.php");
        exit;
    }
    
    if (!empty($_POST)){
        include ("../php/addClass.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            $page = "makeclass";
            include("../php/head.php");
        ?>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
            
            include("../php/getSubjects.php");
        ?>
    </body>
</html>