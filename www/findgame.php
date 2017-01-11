<!DOCTYPE HTML>
<html>
    <head>
        <?php
            session_start();
            
            $page = "findgame";
            include("../php/head.php");
            //Code for finding games, see acceptGame.php and sendGame.php respectively 
            if (!empty($_POST["accept"])) {
                include("../php/acceptGame.php");
            } else if (!empty($_POST["decline"])) {
                include("../php/declineGame.php");
            } else if (!empty($_POST["user"])) {
                include("../php/sendGame.php");
            } else if (!empty($_POST["activeabilityid"])) {
                include("../php/unsetActiveAbility.php");
            } else if (!empty($_POST["abilityid"])) {
                include("../php/setActiveAbility.php");
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
    <body class="findgame-body">
        <?php
            include("../php/navbar.php");
        ?>
        <div class="positionall">
            <div class="ability-select col-md-6">
                <div class="findgame-active-abilities">
                    <h3 style="color:white;">Active Abilities</h3>
                    <?php
                        include("../php/getFindgameActiveAbilities.php");
                    ?>
                </div>
                <hr>
                <div class="findgame-abilities">
                    <h3 style="color:white;">Abilities</h3>
                    <?php
                        include("../php/getFindgameAbilities.php");
                    ?>
                </div>
            </div>
            <div class="battle col-md-6">
                <div class="battlerequests">
                    <button class="button" id="backbutton" onclick="showRequestBattleMain()"><span>← BACK</span></button>
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
                    <button class="button" id="requestabattlebutton" onclick="showRequestABattle()"><span>REQUEST A BATTLE</span></button>
                    <button class="button" id="battlenotificationsbutton" onclick="showBattleNotifications()"><span>BATTLE REQUESTS</span></button>
                </div>
            </div>
        </div>
    </body>
</html>