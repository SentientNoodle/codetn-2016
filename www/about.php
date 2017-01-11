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
            @media (max-width: 990px) {
                #aboutButtonText {
                    font-size: 75%;
                }
                #aboutWebText {
                    font-size: 175%;
                }
            }  
        </style>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
        ?>
        
        <!-- Bootstrap Container for Page -->
        <div class="container-fluid">
            <!-- Side bar for about buttons -->
            <div class="col-md-3 sidenav hidden-xs hidden-sm">
                <button class="button" style="vertical-align:middle" onclick="showAboutUs()"><p id="aboutButtonText"><span>ABOUT US</span></button>
                <button class="button" style="vertical-align:middle" onclick="showAboutWeb()"><p id="aboutButtonText"><span>ABOUT "SCHOLARLY FISTICUFFS"</span></button>
                <button class="button" style="vertical-align:middle" onclick="showFeatures()"><p id="aboutButtonText"><span>FEATURES OF "SCHOLARLY FISTICUFFS"</span></button>
            </div>
            <!-- Mobile Version "side bar" for about buttons -->
            <nav class="navbar navbar-inverse hidden-md hidden-lg">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand"><p id="aboutType">ERROR: about information type is not selected</p></a>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#aboutNavBar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>  
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="aboutNavBar">
                        <button class="button" style="vertical-align:middle" onclick="showAboutUs()"><p id="aboutButtonText"><span>ABOUT US</span></button>
                        <button class="button" style="vertical-align:middle" onclick="showAboutWeb()"><p id="aboutButtonText"><span>ABOUT "SCHOLARLY FISTICUFFS"</span></button>
                        <button class="button" style="vertical-align:middle" onclick="showFeatures()"><p id="aboutButtonText"><span>FEATURES OF "SCHOLARLY FISTICUFFS"</span></button>
                    </div>
                </div>
            </nav>
            
            <!-- Information -->
            
            <!-- About Us -->
            <div class="col-xs-12 col-md-9" id="aboutUs">
                <!-- 3 per row for col-md and up version -->
                <div class="row hidden-xs hidden-sm">
                    <!-- Isaac -->
                    <div class="col-md-4">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">Isaac Sikkema</p></div>
                        <div class="panel-body"><img src="../media/heads/isaac.png" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer">
                            <p id="aboutUsText">
                                Senior at Hardin Valley Academy<br>
                                Back End Team
                            </p>
                        </div>
                        </div>
                    </div>
                    <!-- Bryson -->
                    <div class="col-md-4">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">Bryson Gullett</p></div>
                        <div class="panel-body"><img src="../media/heads/bryson.png" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer">
                            <p id="aboutUsText">
                                Sophmore at Hardin Valley Academy<br>
                                Back End Team
                            </p>
                        </div>
                        </div>
                    </div>
                    <!-- Knox -->
                    <div class="col-md-4">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">Knox Crichton</p></div>
                        <div class="panel-body"><img src="../media/heads/knox.png" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer">
                            <p id="aboutUsText">
                                Sophmore at Hardin Valley Academy<br>
                                Back End Team
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row hidden-xs hidden-sm">
                    <!-- Jovi -->
                    <div class="col-md-4">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">Jovi Yoshioka</p></div>
                        <div class="panel-body"><img src="../media/heads/jovi.png" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer">
                            <p id="aboutUsText">
                                Freshman at Hardin Valley Academy<br>
                                Front End Team
                            </p>
                        </div>
                        </div>
                    </div>
                    <!-- Jack -->
                    <div class="col-md-4">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">Jack Anderson</p></div>
                        <div class="panel-body"><img src="../media/heads/jack.png" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer">
                            <p id="aboutUsText">
                                Senior at Hardin Valley Academy<br>
                                Front End Team
                            </p>
                        </div>
                        </div>
                    </div>
                    <!-- Andrew -->
                    <div class="col-md-4">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">Andrew Anderson</p></div>
                        <div class="panel-body"><img src="../media/heads/andrew.jpg" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer">
                            <p id="aboutUsText">
                                Freshman at Hardin Valley Academy<br>
                                Front End Team
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- 2 per row for col-sm version -->
                <div class="row hidden-xs hidden-md hidden-lg">
                    <!-- Isaac -->
                    <div class="col-sm-6">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">Isaac Sikkema</p></div>
                        <div class="panel-body"><img src="../media/heads/isaac.png" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer">
                            <p id="aboutUsText">
                                Senior at Hardin Valley Academy<br>
                                Back End Team
                            </p>
                        </div>
                        </div>
                    </div>
                    <!-- Bryson -->
                    <div class="col-sm-6">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">Bryson Gullett</p></div>
                        <div class="panel-body"><img src="../media/heads/bryson.png" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer">
                            <p id="aboutUsText">
                                Sophmore at Hardin Valley Academy<br>
                                Back End Team
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row hidden-xs hidden-md hidden-lg">
                    <!-- Knox -->
                    <div class="col-sm-6">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">Knox Crichton</p></div>
                        <div class="panel-body"><img src="../media/heads/knox.png" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer">
                            <p id="aboutUsText">
                                Sophmore at Hardin Valley Academy<br>
                                Back End Team
                            </p>
                        </div>
                        </div>
                    </div>
                    <!-- Jovi -->
                    <div class="col-sm-6">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">Jovi Yoshioka</p></div>
                        <div class="panel-body"><img src="../media/heads/jovi.png" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer">
                            <p id="aboutUsText">
                                Freshman at Hardin Valley Academy<br>
                                Front End Team
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row hidden-xs hidden-md hidden-lg">
                    <!-- Jack -->
                    <div class="col-sm-6">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">Jack Anderson</p></div>
                        <div class="panel-body"><img src="../media/heads/jack.png" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer">
                            <p id="aboutUsText">
                                Senior at Hardin Valley Academy<br>
                                Front End Team
                            </p>
                        </div>
                        </div>
                    </div>
                    <!-- Andrew -->
                    <div class="col-sm-6">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">Andrew Anderson</p></div>
                        <div class="panel-body"><img src="../media/heads/andrew.jpg" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer">
                            <p id="aboutUsText">
                                Freshman at Hardin Valley Academy<br>
                                Front End Team
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- 1 per row for col-xs version + click to view -->
                <!-- tip to reveal feature -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg" style="background-color:white;border:3px solid black">
                    <p id="aboutUsText">Click a name to reveal information!</p>
                </div>
                <br><br><br><br>
                <!-- Isaac -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-orange">
                        <button class="panel-heading" type="button" class="navbar-toggle" style="width:100%" data-toggle="collapse" data-target=".aboutPanel10"><p id="aboutUsText">Isaac Sikkema</p></button>
                        <div class="panel-body aboutPanel10 collapse"><img src="../media/heads/isaac.png" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer aboutPanel10 collapse">
                            <p id="aboutUsText">
                                Senior at Hardin Valley Academy<br>
                                Back End Team
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Bryson -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-orange">
                        <button class="panel-heading" type="button" class="navbar-toggle" style="width:100%" data-toggle="collapse" data-target=".aboutPanel11"><p id="aboutUsText">Bryson Gullett</p></button>
                        <div class="panel-body aboutPanel11 collapse"><img src="../media/heads/bryson.png" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer aboutPanel11 collapse">
                            <p id="aboutUsText">
                                Sophmore at Hardin Valley Academy<br>
                                Back End Team
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Knox -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-orange">
                        <button class="panel-heading" type="button" class="navbar-toggle" style="width:100%" data-toggle="collapse" data-target=".aboutPanel12"><p id="aboutUsText">Knox Crichton</p></button>
                        <div class="panel-body aboutPanel12 collapse"><img src="../media/heads/knox.png" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer aboutPanel12 collapse">
                            <p id="aboutUsText">
                                Sophmore at Hardin Valley Academy<br>
                                Back End Team
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Jovi -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-orange">
                        <button class="panel-heading" type="button" class="navbar-toggle" style="width:100%" data-toggle="collapse" data-target=".aboutPanel13"><p id="aboutUsText">Jovi Yoshioka</p></button>
                        <div class="panel-body aboutPanel13 collapse"><img src="../media/heads/jovi.png" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer aboutPanel13 collapse">
                            <p id="aboutUsText">
                                Freshman at Hardin Valley Academy<br>
                                Front End Team
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Jack -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-orange">
                        <button class="panel-heading" type="button" class="navbar-toggle" style="width:100%" data-toggle="collapse" data-target=".aboutPanel14"><p id="aboutUsText">Jack Anderson</p></button>
                        <div class="panel-body aboutPanel14 collapse"><img src="../media/heads/jack.png" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer aboutPanel14 collapse">
                            <p id="aboutUsText">
                                Senior at Hardin Valley Academy<br>
                                Front End Team
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Andrew -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-orange">
                        <button class="panel-heading" type="button" class="navbar-toggle" style="width:100%" data-toggle="collapse" data-target=".aboutPanel15"><p id="aboutUsText">Andrew Anderson</p></button>
                        <div class="panel-body aboutPanel15 collapse"><img src="../media/heads/andrew.jpg" class="img-responsive" style="width:50%;margin:auto;"></div>
                        <div class="panel-footer aboutPanel15 collapse">
                            <p id="aboutUsText">
                                Freshman at Hardin Valley Academy<br>
                                Front End Team
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- About Website -->
            <div class="col-xm-12 col-md-9" id="aboutWeb" style="background-color:white;border:3px solid black;">
                <p id="aboutWebText">
                    Scholarly Fisticuffs is a revolutionary online class enviroment that makes learning fun for everyone.
                    Scholarly Fisticuffs works with any class to turn typically mundane activities like a daily bellringer into great ways to earn items towards an enjoyable online PvP experience that adds great competition to the classroom.
                    A variety of abilities that are obtained through a user controlled market system, are included to keep students entertained throughout an entire class.
                    Scholarly Fisticuffs makes students happy while providing teachers with an easy to maintain classroom system.
                    </p>
            </div>
                
            <!-- Features -->
            <div class="col-xs-12 col-md-9" id="aboutFeatures">
                <!-- 3 per row for col-md and up version -->
                <div class="row hidden-xs hidden-sm">
                    <div class="col-md-4">
                        <!-- pvp combat system -->
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">PVP COMBAT SYSTEM</p></div>
                        <div class="panel-body"><img src="../media/features/pvpimage.png" class="img-responsive" style="width:80%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Fight Other Students In A Fun Battle System</p></div>
                        </div>
                    </div>
                    <!-- peer interaction -->
                    <div class="col-md-4">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">PEER INTERACTION</p></div>
                        <div class="panel-body"><img src="../media/features/peerinteractionimage.png" class="img-responsive" style="width:100%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Interact With Other Students Throught Different Features Of The Website</p></div>
                        </div>
                    </div>
                    <!-- player market system -->
                    <div class="col-md-4">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">PLAYER MARKET SYSTEM</p></div>
                        <div class="panel-body"><img src="../media/features/marketimage.png" class="img-responsive" style="width:100%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Buy And Sell To Peers On The Market</p></div>
                        </div>
                    </div>
                </div>
                <div class="row hidden-xs hidden-sm">
                    <!-- cosmetics -->
                    <div class="col-md-4">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">COSMETICS</p></div>
                        <div class="panel-body"><img src="../media/features/cosmeticsimage.png" class="img-responsive" style="width:63%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Obtain Cosmetics To Make Your Character Look Nicer</p></div>
                        </div>
                    </div>
                    <!-- inventory -->
                    <div class="col-md-4">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">INVENTORY</p></div>
                        <div class="panel-body"><img src="../media/features/inventoryimage.png" class="img-responsive" style="width:65%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Hold Items That Boost Your Character</p></div>
                        </div>
                    </div>
                    <!-- daily q -->
                    <div class="col-md-4">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">DAILY QUESTION</p></div>
                        <div class="panel-body"><img src="../media/features/dailyquestion.png" class="img-responsive" style="width:60%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Answer A Daily Question For Rewards</p></div>
                        </div>
                    </div>
                </div>
                <div class="row hidden-xs hidden-sm">
                    <!-- compat with any class -->
                    <div class="col-md-4">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">COMPATIBLE WITH ANY CLASS</p></div>
                        <div class="panel-body"><img src="../media/features/classcompatimage.png" class="img-responsive" style="width:60%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Use This Site For Any And All Classes</p></div>
                        </div>
                    </div>
                    <!-- abilities -->
                    <div class="col-md-4">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">ABILITIES</p></div>
                        <div class="panel-body"><img src="../media/features/abilitiesimage.png" class="img-responsive" style="width:60%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Use Abilities To Combat Other Players And Boost Your Strength</p></div>
                        </div>
                    </div>
                    <!-- mana and health system -->
                    <div class="col-md-4">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">MANA AND HEALTH SYSTEM</p></div>
                        <div class="panel-body"><img src="../media/features/healthmanaimage.png" class="img-responsive" style="width:60%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Use Mana And Health To Carry On Your Combat</p></div>
                        </div>
                    </div>
                </div>
                <!-- 2 per row for col-sm version -->
                <div class="row hidden-xs hidden-md hidden-lg">
                    <!-- pvp combat system -->
                    <div class="col-sm-6">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">PVP COMBAT SYSTEM</p></div>
                        <div class="panel-body"><img src="../media/features/pvpimage.png" class="img-responsive" style="width:80%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Fight Other Students In A Fun Battle System</p></div>
                        </div>
                    </div>
                    <!-- peer interaction -->
                    <div class="col-sm-6">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">PEER INTERACTION</p></div>
                        <div class="panel-body"><img src="../media/features/peerinteractionimage.png" class="img-responsive" style="width:100%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Interact With Other Students Throught Different Features Of The Website</p></div>
                        </div>
                    </div>
                </div>
                <div class="row hidden-xs hidden-md hidden-lg">
                    <!-- player market system -->
                    <div class="col-sm-6">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">PLAYER MARKET SYSTEM</p></div>
                        <div class="panel-body"><img src="../media/features/marketimage.png" class="img-responsive" style="width:100%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Buy And Sell To Peers On The Market</p></div>
                        </div>
                    </div>
                    <!-- cosmetics -->
                    <div class="col-sm-6">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">COSMETICS</p></div>
                        <div class="panel-body"><img src="../media/features/cosmeticsimage.png" class="img-responsive" style="width:63%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Obtain Cosmetics To Make Your Character Look Nicer</p></div>
                        </div>
                    </div>
                </div>
                <div class="row hidden-xs hidden-md hidden-lg">
                    <!-- inventory -->
                    <div class="col-sm-6">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">INVENTORY</p></div>
                        <div class="panel-body"><img src="../media/features/inventoryimage.png" class="img-responsive" style="width:65%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Hold Items That Boost Your Character</p></div>
                        </div>
                    </div>
                    <!-- daily q -->
                    <div class="col-sm-6">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">DAILY QUESTION</p></div>
                        <div class="panel-body"><img src="../media/features/dailyquestion.png" class="img-responsive" style="width:60%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Answer A Daily Question For Rewards</p></div>
                        </div>
                    </div>
                </div>
                <div class="row hidden-xs hidden-md hidden-lg">
                    <!-- compat with any class-->
                    <div class="col-sm-6">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">COMPATIBLE WITH ANY CLASS</p></div>
                        <div class="panel-body"><img src="../media/features/classcompatimage.png" class="img-responsive" style="width:60%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Use This Site For Any And All Classes</p></div>
                        </div>
                    </div>
                    <!-- abilities -->
                    <div class="col-sm-6">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">ABILITIES</p></div>
                        <div class="panel-body"><img src="../media/features/abilitiesimage.png" class="img-responsive" style="width:60%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Use Abilities To Combat Other Players And Boost Your Strength</p></div>
                        </div>
                    </div>
                </div>
                <div class="row hidden-xs hidden-md hidden-lg">
                    <!-- mana and health system -->
                    <div class="col-sm-6">
                        <div class="panel panel-orange">
                        <div class="panel-heading"><p id="featureText">MANA AND HEALTH SYSTEM</p></div>
                        <div class="panel-body"><img src="../media/features/healthmanaimage.png" class="img-responsive" style="width:60%;margin:auto;"></div>
                        <div class="panel-footer"><p id="featureText">Use Mana And Health To Carry On Your Combat</p></div>
                        </div>
                    </div>
                </div>
                <!-- 1 per row for col-xs version + click to view -->
                <!-- tip to reveal feature -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg" style="background-color:white;border:3px solid black">
                    <p id="featureText">Click a feature to reveal information!</p>
                </div>
                <br><br><br><br>
                <!-- pvp combat system -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-orange">
                    <button class="panel-heading" type="button" class="navbar-toggle" style="width:100%" data-toggle="collapse" data-target=".aboutPanel1"><p id="featureText">PVP COMBAT SYSTEM</p></button>
                    <div class="panel-body aboutPanel1 collapse"><img src="../media/features/pvpimage.png" class="img-responsive" style="width:80%;margin:auto;"></div>
                    <div class="panel-footer aboutPanel1 collapse"><p id="featureText">Fight Other Students In A Fun Battle System</p></div>
                    </div>
                </div>
                <!-- peer interaction -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-orange">
                    <button class="panel-heading" type="button" class="navbar-toggle" style="width:100%" data-toggle="collapse" data-target=".aboutPanel2"><p id="featureText">PEER INTERACTION</p></button>
                    <div class="panel-body aboutPanel2 collapse"><img src="../media/features/peerinteractionimage.png" class="img-responsive" style="width:100%;margin:auto;"></div>
                    <div class="panel-footer aboutPanel2 collapse"><p id="featureText">Interact With Other Students Throught Different Features Of The Website</p></div>
                    </div>
                </div>
                <!-- player market system -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-orange">
                    <button class="panel-heading" type="button" class="navbar-toggle" style="width:100%" data-toggle="collapse" data-target=".aboutPanel3"><p id="featureText">PLAYER MARKET SYSTEM</p></button>
                    <div class="panel-body aboutPanel3 collapse"><img src="../media/features/marketimage.png" class="img-responsive" style="width:100%;margin:auto;"></div>
                    <div class="panel-footer aboutPanel3 collapse"><p id="featureText">Buy And Sell To Peers On The Market</p></div>
                    </div>
                </div>
                <!--cosmetics -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-orange">
                    <button class="panel-heading" type="button" class="navbar-toggle" style="width:100%" data-toggle="collapse" data-target=".aboutPanel4"><p id="featureText">COSMETICS</p></button>
                    <div class="panel-body aboutPanel4 collapse"><img src="../media/features/cosmeticsimage.png" class="img-responsive" style="width:63%;margin:auto;"></div>
                    <div class="panel-footer aboutPanel4 collapse"><p id="featureText">Obtain Cosmetics To Make Your Character Look Nicer</p></div>
                    </div>
                </div>
                <!-- inventory -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-orange">
                    <button class="panel-heading" type="button" class="navbar-toggle" style="width:100%" data-toggle="collapse" data-target=".aboutPanel5"><p id="featureText">INVENTORY</p></button>
                    <div class="panel-body aboutPanel5 collapse"><img src="../media/features/inventoryimage.png" class="img-responsive" style="width:65%;margin:auto;"></div>
                    <div class="panel-footer aboutPanel5 collapse"><p id="featureText">Hold Items That Boost Your Character</p></div>
                    </div>
                </div>
                <!-- daily q -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-orange">
                    <button class="panel-heading" type="button" class="navbar-toggle" style="width:100%" data-toggle="collapse" data-target=".aboutPanel6"><p id="featureText">DAILY QUESTION</p></button>
                    <div class="panel-body aboutPanel6 collapse"><img src="../media/features/dailyquestion.png" class="img-responsive" style="width:60%;margin:auto;"></div>
                    <div class="panel-footer aboutPanel6 collapse"><p id="featureText">Answer A Daily Question For Rewards</p></div>
                    </div>
                </div>
                <!-- compat with any class -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-orange">
                    <button class="panel-heading" type="button" class="navbar-toggle" style="width:100%" data-toggle="collapse" data-target=".aboutPanel7"><p id="featureText">COMPATIBLE WITH ANY CLASS</p></button>
                    <div class="panel-body aboutPanel7 collapse"><img src="../media/features/classcompatimage.png" class="img-responsive" style="width:60%;margin:auto;"></div>
                    <div class="panel-footer aboutPanel7 collapse"><p id="featureText">Use This Site For Any And All Classes</p></div>
                    </div>
                </div>
                <!-- abilities -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-orange">
                    <button class="panel-heading" type="button" class="navbar-toggle" style="width:100%" data-toggle="collapse" data-target=".aboutPanel8"><p id="featureText">ABILITIES</p></button>
                    <div class="panel-body aboutPanel8 collapse"><img src="../media/features/abilitiesimage.png" class="img-responsive" style="width:60%;margin:auto;"></div>
                    <div class="panel-footer aboutPanel8 collapse"><p id="featureText">Use Abilities To Combat Other Players And Boost Your Strength</p></div>
                    </div>
                </div>
                <!-- mana and health system -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-orange">
                    <button class="panel-heading" type="button" class="navbar-toggle" style="width:100%" data-toggle="collapse" data-target=".aboutPanel9"><p id="featureText">MANA AND HEALTH SYSTEM</p></button>
                    <div class="panel-body aboutPanel9 collapse"><img src="../media/features/healthmanaimage.png" class="img-responsive" style="width:60%;margin:auto;"></div>
                    <div class="panel-footer aboutPanel9 collapse"><p id="featureText">Use Mana And Health To Carry On Your Combat</p></div>
                    </div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            showAboutUs();
        </script>
        
    </body>
</html>