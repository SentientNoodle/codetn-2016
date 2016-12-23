<?php
    session_start();
    
    if ($_GET["signout"] == "1") {
        session_unset();
        header("Location: index.php");
        exit;
    }
    
    // Randomly select background image
    /*$settingsimages = array("","","");
    $settingsn = rand(0, count($settingsimages) - 1);*/
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            $page = "index";
            include("../php/head.php");
        ?>
        <title>CodeTN</title>
        <!-- Set selected background image -->
        <!--<style>
            body {
                background-image:url("../media/backgrounds/<?php echo $settingsimages[$settingsn] ?>");
            }
        </style>-->
    </head>
    <body>
        <?php
            include("../php/navbar.php");
        ?>
        <h1 style="font-weight:bold;text-align:center">User Settings</h1>
    </body>
</html>