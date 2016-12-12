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
        <div class="indexbanner" align="center">
            <div class="indexbannerstuff" style="background-image:url('http://www.biteclubeats.com/wp-content/uploads/2016/06/sippingonsauce.jpg');border:3px solid black;height:95%;margin-top:.5%"></div>
            <div class="indexbannerstuff">
                <h1 style="font-weight:bold;color:black;text-align:center;vertical-align:middle;line-height:100px">WELCOME TO</h1>
                <h2 style="font-weight:bold;color:black;text-align:center;vertical-align:middle">FLAVOR TOWN</h2>
            </div>
            <div class="indexbannerstuff" style="background-image:url('http://www.biteclubeats.com/wp-content/uploads/2016/06/sippingonsauce.jpg');border:3px solid black;height:95%;margin-top:.5%"></div>
        </div>
        
        <div class="indexslideshow" style="margin-left:auto;margin-right:auto;margin-top:.5%" align="center">
            <div class="indexslideshowentry">
                <div id="indexsse1" style="display:inline-block">
                    <p style="font-weight:bold;font-size:150%;color:white;text-align:center">WELCOME TO [WEBSITE NAME HERE]</p>
                    <p style="font-weight:bold;color:white">DESCRIPTION OF THE WEBSITE</p>
                </div>
                <div id="indexsse2" style="display:none">
                    <p style="font-weight:bold;font-size:150%;color:white;text-align:center">WHAT DOES [WEBSITE NAME HERE] PROVIDE?</p>
                    <p style="font-weight:bold;color:white">FEATURES</p>
                </div>
                <div id="indexsse3" style="display:none">
                    <p style="font-weight:bold;font-size:150%;color:white;text-align:center">CUSTOMIZE YOUR CHARACTER, EARN MONEY,
                    SELL AND BUY ITEMS, AND FIGHT TO THE DEATH!</p>
                    <p style="font-weight:bold;color:white">PICTURE OF CUSTOMIZE CHARACTER, EARNING MONEY, SELL BUY ITEM, AND FIGHT :P</p>
                </div>
            </div>
            <div class="indexslideshowbutton">
                <button onclick="indexsse1()"><span class="dot"></span></button>
                <button onclick="indexsse2()"><span class="dot"></span></button>
                <button onclick="indexsse3()"><span class="dot"></span></button>
            </div>
        </div>
        <script>startAutoIndexSlide();</script>
    </body>
</html>