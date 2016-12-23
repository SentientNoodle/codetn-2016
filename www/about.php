<?php
    session_start();
    
    if ($_GET["signout"] == "1") {
        session_unset();
        header("Location: index.php");
        exit;
    }
    
    $imagesabout = array("aboutback1.jpeg","aboutback2.jpg","aboutback3.jpeg");
    $nabout = rand(0, count($imagesabout) - 1);
?>

<!DOCTYPE html>
<html>
    <head>
        <?php
            $page = "about";
            include("../php/head.php");
        ?>
        <title>CodeTN</title>
        <style>
            body {
                background-image: url("../media/backgrounds/<?php echo $imagesabout[$nabout] ?>");
            }
        </style>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
        ?>
        
        <div id="positionall">
            <div class="sideBar" style="padding-right:.75%">
                <button class="button" style="vertical-align:middle" onclick="showAboutUs()"><p style="font-size:125%;font-weight:bold;color:black;"><span>ABOUT US </span> </button>
                <button class="button" style="vertical-align:middle" onclick="showAboutWeb()"><p style="font-size:125%;font-weight:bold;color:black;"><span>ABOUT "WEBSITE NAME HERE"</span> </button>
                <button class="button" style="vertical-align:middle" onclick="showFeatures()"><p style="font-size:125%;font-weight:bold;color:black;"><span>FEATURES OF "WEBSITE NAME HERE" </span> </button>
            </div>
            <div class="aboutThings">
                <!-- FEATURES -->
                <div id="positionFeatures" style="display:none">
                    <div class="features" style="margin-top:2%;">
                        <div class="aboutPicture" style="background-image:url('../media/features/pvpimage.png')"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">PVP COMBAT SYSTEM</p>
                            <p style="font-size:125%;font-weight:bold;color:white;text-align:center">Fight Other Students In A Fun Battle System</p>
                        </div>
                    </div>
                    <div class="features" style="margin-top:2%;">
                        <div class="aboutPicture" style="background-image:url('../media/features/peerinteractionimage.png')"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">PEER INTERACTION</p>
                            <p style="font-size:125%;font-weight:bold;color:white;text-align:center">Interact With Other Students Throught The Site</p>
                        </div>
                    </div>
                    <div class="features" style="margin-top:2%;">
                        <div class="aboutPicture" style="background-image:url('../media/features/marketimage.png');background-size:150%90%;background-position:50%65%"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">PLAYER MARKET SYSTEM</p>
                            <p style="font-size:125%;font-weight:bold;color:white;text-align:center">Buy And Sell To Peers On The Market</p>
                        </div>
                    </div>
                    <div class="features">
                        <div class="aboutPicture" style="background-image:url('../media/features/cosmeticsimage.png')"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">COSMETICS</p>
                            <p style="font-size:125%;font-weight:bold;color:white;text-align:center">Obtain Cosmetics To Make Your Character Look Nicer</p>
                        </div>
                    </div>
                    <div class="features">
                        <div class="aboutPicture" style="background-image:url('../media/features/inventoryimage.png')"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">INVENTORY</p>
                            <p style="font-size:125%;font-weight:bold;color:white;text-align:center">Hold Items That Boost Your Character</p>
                        </div>
                    </div>
                    <div class="features">
                        <div class="aboutPicture" style="background-image:url('../media/features/dailyquestion.png')"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">DAILY QUESTION</p>
                            <p style="font-size:125%;font-weight:bold;color:white;text-align:center">Answer A Daily Question For Rewards</p>
                        </div>
                    </div>
                    <div class="features">
                        <div class="aboutPicture" style="background-image:url('../media/features/classcompatimage.png')"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">COMPATIBLE WITH ANY CLASS</p>
                            <p style="font-size:125%;font-weight:bold;color:white;text-align:center">Use This Site For Any And All Classes</p>
                        </div>
                    </div>
                    <div class="features">
                        <div class="aboutPicture" style="background-image:url('../media/features/abilitiesimage.png')"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">ABILITIES</p>
                            <p style="font-size:125%;font-weight:bold;color:white;text-align:center">Use Abilities To Combat Other Players And Boost Your Strength</p>
                        </div>
                    </div>
                    <div class="features">
                        <div class="aboutPicture" style="background-image:url('../media/features/healthmanaimage.png')"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">MANA AND HEALTH SYSTEM</p>
                            <p style="font-size:125%;font-weight:bold;color:white;text-align:center">Use Mana And Health To Carry On Your Combat</p>
                        </div>
                    </div>
                </div>
                <!-- ABOUT WEB -->
                <div id="positionAboutWeb" style="display:none">
                    <div class="aboutWeb">
                        <p style="font-size:300%;color:white;margin-left:.5%;font-weight:bold;text-align:center;margin-top:5%">
                            "site name" is a site to promote the communication and interaction with a class and students, with an interactive market and a fun pvp.
                            Another feature is a clothes system, where a user may improve the way they look. Users may interact with other students for class reasons, 
                            such as study questions. They can then battle each other for fun, promoting interaction between students. Users interacting with the market
                            can learn skills with trading and money management.
                        </p>
                    </div>
                </div>
                <!-- ABOUT US -->
                <div id="positionAboutUs">
                    <div class="aboutUs" style="margin-left:5%;">
                        <div class="aboutPicture"><img src="../media/heads/isaac.png" width="100%" height="100%"></img></div>
                        <div class="aboutText">
                            <p style="font-weight:bold;font-size:175%;color:white" align="center">ISAAC</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Senior at Hardin Valley Academy</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Databased information, created main functions of the website, and taught.</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">PHP & SQL</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Back End Team</p>
                        </div>
                    </div>
                    <div class="aboutUs" style="margin-left:.5%;">
                        <div class="aboutPicture"><img src="../media/heads/bryson.png" width="100%" height="100%"></img></div>
                        <div class="aboutText">
                            <p style="font-weight:bold;font-size:175%;color:white" align="center">BRYSON</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Sophmore at Hardin Valley Academy</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Databased information and created main functions of the website.</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">PHP & SQL</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Back End Team</p>
                        </div>
                    </div>
                    <div class="aboutUs" style="margin-left:5%;">
                        <div class="aboutPicture"><img src="../media/heads/knox.png" width="100%" height="100%"></img></div>
                        <div class="aboutText">
                            <p style="font-weight:bold;font-size:175%;color:white" align="center">KNOX</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Sophmore at Hardin Valley Academy</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Helped with databasing information and problem solving.</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">PHP & SQL</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Back End Team</p>
                        </div>
                    </div>
                    <div class="aboutUs" style="margin-left:.5%;">
                        <div class="aboutPicture"><img src="../media/heads/jovi.png" width="100%" height="100%"></img></div>
                        <div class="aboutText">
                            <p style="font-weight:bold;font-size:175%;color:white" align="center">JOVI</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Freshman at Hardin Valley Academy</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Created the pages of the website.</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">HTML, CSS, & JavaScript</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Front End Team</p>
                        </div>
                    </div>
                    <div class="aboutUs" style="margin-left:5%;">
                        <div class="aboutPicture"><img src="../media/heads/jack.png" width="100%" height="100%"></img></div>
                        <div class="aboutText">
                            <p style="font-weight:bold;font-size:175%;color:white" align="center">JACK</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Senior at Hardin Valley Academy</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Helped create pages and problem solving.</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">HTML & CSS</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Front End Team</p>
                        </div>
                    </div>
                    <div class="aboutUs" style="margin-left:.5%;">
                        <div class="aboutPicture"><img src="../media/heads/andrew.png" width="100%" height="100%"></img></div>
                        <div class="aboutText">
                            <p style="font-weight:bold;font-size:175%;color:white" align="center">ANDREW</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Freshman at Hardin Valley Academy</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Found pictures and learned.</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">HTML</p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Front End Team</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>