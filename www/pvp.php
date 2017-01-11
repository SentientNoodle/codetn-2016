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
            $sql = $conn->prepare("SELECT Timer FROM Games WHERE ID=?;");
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
            
            if ($uhealth <= 0) {
                $sql = $conn->prepare("DELETE FROM Games WHERE ID=?;");
                $sql->bind_param("i",$gameid);
                $sql->execute();
                
                header("Location: lose.php");
                exit();
            } else if ($ohealth <= 0) {
                $sql = $conn->prepare("DELETE FROM Games WHERE ID=?;");
                $sql->bind_param("i",$gameid);
                $sql->execute();
                
                header("Location: win.php");
                exit();
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
        <?php echo "<h1>".$lastidused."</h1>"; ?>
        <div class="battleground col-xs-12">
            <div class="abilities col-md-6">
                <?php
                    include("../php/pvpGetOpponentAbilities.php");
                ?>
            </div>
            <div class="userbox col-md-6 container">
                <div class="character col-sm-6" id="pvpopponent"></div>
                <div class="stats col-sm-6">
                    <div class="statbar">
                        <div class="healthlvl" style="width:<?php echo $ohealth; ?>%;"><span class="badge">Health: <?php echo $ohealth; ?></span></div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="timer col-xs-12">
            <h2 id="timer"><?php echo $timer - time() + 60; ?></h2>
        </div>
        <div class="battleground col-xs-12">
            <div class="userbox col-md-6 container">
                <div class="character col-sm-6" id="pvpuser"></div>
                <div class="stats col-sm-6">
                    <div class="statbar">
                        <div class="healthlvl" style="width:<?php echo $uhealth; ?>%;"><span class="badge">Health: <?php echo $uhealth; ?></span></div>
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