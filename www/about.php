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
                        <div class="aboutPicture" id="aboutpvp"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">PVP COMBAT SYSTEM</p>
                        </div>
                    </div>
                    <div class="features" style="margin-top:2%;">
                        <div class="aboutPicture">NEED PIC</div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">TRADE SYSTEM<!-- Do we have a trade system? --></p>
                        </div>
                    </div>
                    <div class="features" style="margin-top:2%;">
                        <div class="aboutPicture">NEED PIC</div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">PLAYER MARKET SYSTEM</p>
                        </div>
                    </div>
                    <div class="features">
                        <div class="aboutPicture"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">COSMETICS</p>
                        </div>
                    </div>
                    <div class="features">
                        <div class="aboutPicture"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">INVENTORY</p>
                        </div>
                    </div>
                    <div class="features">
                        <div class="aboutPicture"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">DAILY QUESTION</p>
                        </div>
                    </div>
                    <div class="features">
                        <div class="aboutPicture"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">JOIN A CLASS</p>
                        </div>
                    </div>
                    <div class="features">
                        <div class="aboutPicture"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">ABILITIES</p>
                        </div>
                    </div>
                    <div class="features">
                        <div class="aboutPicture"></div>
                        <div class="aboutText">
                            <p style="font-size:150%;font-weight:bold;color:white;text-align:center">MANA AND HEALTH SYSTEM</p>
                        </div>
                    </div>
                </div>
                <!-- ABOUT WEB -->
                <div id="positionAboutWeb" style="display:none">
                    <div class="aboutWeb">
                        <p style="font-size:150%;color:white;margin-left:1%">THIS WEBSITE IS ABOUT STUFF AND BLAH AND YEAH</p>
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
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Wait, who's andrew</p></p>
                            <p style="font-size:150%;color:white;margin-left:1%" align="center">Kid does so little we don't even know him?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>