<!DOCTYPE HTML>
<html>
    <head>
        <?php
            session_start();
            
            $page = "findgame";
            include("../php/head.php");
            //Code for finding games, see acceptGame.php and sendGame.php respectively 
            if (!empty($_POST["request"])) {
                include("../php/acceptGame.php");
            } else if (!empty($_POST["user"])) {
                include("../php/sendGame.php");
            }
            
            $imagesfindgame = array("findgameback1.jpg","findgameback2.jpg","findgameback3.jpg");
            $nfindgame = rand(0, count($imagesfindgame) - 1);
        ?>
        
        <title>Find A Game</title>
        
        <style>
            body {
                background-image: url("../media/backgrounds/<?php echo $imagesfindgame[$nfindgame] ?>");
            }
        </style>
        <script type="text/javascript">
            check();
        </script>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
        ?>
        
        <div class="pvpbanner"></div>
        
        <div class="positionall">
            <div class="positionrandombattle">
                <p style="text-align:center"><font color="black" size="50"><b>Random Battle</b></font></p>
                <div class="randombattle">
                    <a href="pvp.php"><button class="button" style="vertical-align:middle"><img src="media/buttons/pvpimage.png" height="70" width="90"></img>QUEUE UP<span><img src="media/buttons/pvpimage.png" height="70" width="90"></img></span></button></a>
                    <p style="margin-left:1%"><font color="white" size="5"><b># Of People In Queue: <!-- Get # of people in queue here --></b></font></p>
                    <p style="margin-left:1%"><font color="white" size="5"><b>Estimated Time: <!-- Get estimated time it will take to get in queue --></b></font></p>
                </div>
            </div>
            <div class="character">
            </div>
            <div class="positionbattlerequests">
                <p style="text-align:center"><font color="black" size="50"><b>Battle Request</b></font></p>
                <div class="battlerequests">
                    <button class="button" style="vertical-align:middle; display:none" id="backbutton" onclick="showRequestBattleMain()"><span>← BACK</span></button>
                    <div class="users">
                        <?php
                            include("../php/getUsers.php");
                        ?>  
                    </div>
                    <div class="requests">
                        <?php
                            include("../php/getRequests.php");
                        ?>
                    </div>
                    <button class="button" style="vertical-align:middle" id="requestabattlebutton" onclick="showRequestABattle()"><span>REQUEST A BATTLE</span></button>
                    <button class="button" style="vertical-align:middle" id="battlenotificationsbutton" onclick="showBattleNotifications()"><span>BATTLE NOTIFICATIONS</span></button>
                </div>
            </div>
        </div>
    </body>
</html>