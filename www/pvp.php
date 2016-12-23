<html>
    <head>
        <?php
            session_start();
            $page = "pvp";
            include("../php/head.php");
            
            if (!empty($_POST)) {
                include("../php/pvp.php");
            }
            
            include("../php/sqlconnect.php");
            $sql = $conn->prepare("SELECT Timer,UserHealth,OpponentHealth FROM Games WHERE ID=?;");
            $sql->bind_param("i",$gameid);
            $gameid = $_SESSION["gameid"];
            $sql->execute();
            $result = $sql->get_result();
            $result = $result->fetch_assoc();
            $timer = $result["Timer"];
            
            if (empty($timer)) {
                header("Location: index.php");
                exit();
            }
            
            $sql = $conn->prepare("SELECT UserID,OpponentID,UserHealth,OpponentHealth FROM Games WHERE ID=?;");
            $sql->bind_param("i",$gameid);
            $sql->execute();
            $result = $sql->get_result();
            $result = $result->fetch_assoc();
            
            if ($_SESSION["id"] == $result["UserID"]) {
                $userid = $result["UserID"];
                $opponentid = $result["OpponentID"];
                
                $uhealth = $result["UserHealth"];
                $ohealth = $result["OpponentHealth"];
            } else {
                $userid = $result["OpponentID"];
                $opponentid = $result["UserID"];
                
                $uhealth = $result["OpponentHealth"];
                $ohealth = $result["UserHealth"];
            }
        ?>
        
        <title>CodeTN</title>
        <style>
            body {
                background-image: url("../media/backgrounds/pvpback1.jpg");
            }
        </style>
        <script type="text/javascript">
            <?php
                if (empty($_GET["reload"])) {
                    echo 'checkTurn();';
                }
                echo 'var startTime = '.$timer.';';
            ?>
            
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(); 
                setTimeout(function(){document.body.scrollTop = document.body.scrollHeight;},100);
            });
        </script>
    </head>
    <body class="pvp-body" onload="timer(document.getElementById('timer'));">
        <?php
            include("../php/navbar.php");
        ?>
        <div class="battleground col-xs-12">
            <!--<div id="positionRightSide" style="float:right">-->
            <!--    <div id="gameOptions">-->
            <!--        <button class="redButton" style="height:100%; width:49%"><p style="font-weight:bold;font-size:160%;margin-top:3%">PAUSE</p></button>-->
            <!--        <button class="redButton" style="height:100%; width:49%"><p style="font-weight:bold;font-size:160%;margin-top:3%">CONCEDE</p></button>-->
                    <!--IF WANT TO ADD SETTINGS <button class="settingsButton"><p style="font-weight:bold;font-size:225%">⚙</p></button>-->
            <!--    </div>-->
            <!--    <div id="emotes" style="bottom:0">-->
            <!--        <div class="emoteBubble" id="youEmoteBubble" style="transform:rotate(180deg);bottom:0;display:none">-->
            <!--            <p id="emoteText"></p>-->
            <!--        </div>-->
            <!--        <button class="emoteButton" id="emoteEmotes" style="position:absolute;bottom:0;margin-left:25%;" onclick="emoteShow()"><p style="font-weight:bold;font-size:200%;">EMOTES</p></button>-->
            <!--        <button class="emoteButton" id="emoteBack" style="position:absolute;bottom:0;margin-left:25%;display:none" onclick="emoteHide()"><p style="font-weight:bold;font-size:200%;">← BACK</p></button>-->
            <!--        <button class="emoteButton" id="emoteHello" style="width:48.5%; float:left; margin-bottom:1%;display:none" onclick="emoteHello()"><p style="font-weight:bold;font-size:180%;">Hello</p></button>-->
            <!--        <button class="emoteButton" id="emoteWellPlayed" style="width:48.5%; float:right; margin-bottom:1%;display:none" onclick="emoteWellPlayed()"><p style="font-weight:bold;font-size:180%;">WellPlayed</p></button>-->
            <!--        <button class="emoteButton" id="emoteWow" style="width:48.5%; float:left; margin-bottom:1%;display:none" onclick="emoteWow()"><p style="font-weight:bold;font-size:180%;">Wow</p></button>-->
            <!--        <button class="emoteButton" id="emoteHaha" style="width:48.5%; float:right; margin-bottom:1%;display:none" onclick="emoteHaha()"><p style="font-weight:bold;font-size:180%;">Haha</p></button>-->
            <!--        <button class="emoteButton" id="emoteSorry" style="width:48.5%; float:left; margin-bottom:1%;display:none" onclick="emoteSorry()"><p style="font-weight:bold;font-size:180%;">Sorry</p></button>-->
            <!--        <button class="emoteButton" id="emoteUhhhhh" style="width:48.5%; float:right; margin-bottom:1%;display:none" onclick="emoteUhhhhh()"><p style="font-weight:bold;font-size:180%;">Uhhhhh</p></button>-->
            <!--        <button class="emoteButton" id="emoteOops" style="width:48.5%; float:left; margin-bottom:1%;display:none" onclick="emoteOops()"><p style="font-weight:bold;font-size:180%;">Oops</p></button>-->
            <!--        <button class="emoteButton" id="emoteCustom" style="width:48.5%; float:right; margin-bottom:1%;display:none" onclick="emoteCustom()"><p style="font-weight:bold;font-size:180%;">[Custom]</p></button> <!-- FOR CUSTOM, EITHER THEY TYPE OUT THEIR OWN MESSAGE OR CAN PURCHASE/MAKEA CUSTOM SAYING AND GET IT APPROVED BY TEACHER/COMPUTER THAT CAN TELL IF ITS APPROPRAITE OR INAPPROPRIATE? -->
            <!--    </div>-->
            <!--</div>-->
            
            <div class="abilities col-md-6">
                <?php
                    include("../php/pvpGetOpponentAbilities.php");
                ?>
            </div>
            <div class="userbox col-md-6 container">
                <div class="character col-sm-6" id="pvpopponent"></div>
                <div class="stats col-sm-6">
                    <!--<div class="nameTag"><font size="5">NAME OF OPPONENT</font></div>-->
                    <!--<button class="redButton"><p style="font-weight:bold;font-size:180%;">MUTE</p></button>-->
                    <div class="statbar">
                        <div class="healthlvl" style="width:<?php echo $ohealth; ?>%;"><span class="badge">Health: <?php echo $ohealth; ?></span></div>
                    </div>
                    <div class="statbar">
                        <div class="manalvl" style="width:100%"><span class="badge">Mana: 100</span></div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="timer col-xs-12">
            <h2 id="timer"><?php echo $timer - time() + 60; ?></h2>
        </div>
        <div class="battleground col-xs-12">
            <!--<div id="positionLeftSide" style="float:left">-->
            <!--    <div id="emotes" style="top:0">-->
            <!--        <div class="emoteBubble" id="opponentEmoteBubble" style="top:0;display:none"><!-- OPPONENT EMOTE HERE -->
            <!--    </div>-->
            <!--</div>-->
            <div class="userbox col-md-6 container">
                <div class="character col-sm-6" id="pvpuser"></div>
                <div class="stats col-sm-6">
                    <!--<div class="nameTag"><font size="5">NAME OF OPPONENT</font></div>-->
                    <!--<button class="redButton"><p style="font-weight:bold;font-size:180%;">MUTE</p></button>-->
                    <div class="statbar">
                        <div class="healthlvl" style="width:<?php echo $uhealth; ?>%;"><span class="badge">Health: <?php echo $uhealth; ?></span></div>
                    </div>
                    <div class="statbar">
                        <div class="manalvl" style="width:100%;"><span class="badge">Mana: 100</span></div>
                    </div>
                </div>
            </div>
            <div class="abilities col-md-6">
                <form action="pvp.php" method="post">
                    <?php
                        include("../php/pvpGetUserAbilities.php");
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>