<?php
    session_start();
    
    if ($_GET["signout"] == "1") {
        session_unset();
        header("Location: index.php");
        exit;
    }
    
    // Randomly select background image
    $images = array("indexback1.jpg","indexback2.jpeg","indexback3.jpeg");
    $n = rand(0, count($images) - 1);
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
        <style>
            body {
                background-image: url("../media/backgrounds/<?php echo $images[$n] ?>");
            }
        </style>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
        ?>
        <div class="jumbotron container">
            <div class="col-xs-9">
                <h1>Welcome</h1>
                <p>to flavortown</p>
            </div>
            <div class="col-xs-3">
                <img src="http://www.biteclubeats.com/wp-content/uploads/2016/06/sippingonsauce.jpg" class="img-responsive">
            </div>
        </div>
    </body>
</html>