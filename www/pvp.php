<html>
    <head>
        <?php
            $page = "pvp";
            include("../php/head.php");
        ?>
        <script src="js/node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js"></script>
        <script src="js/nodeClient.js"></script>
        <title>CodeTN</title>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
        ?>
        <div id="ground">
            <div class="hud col-xs-12" id="opponentDisplay">
                <ul class="bars list-group col-sm-4">
                    <li class="list-group-item">
                        <div class="progress">
                            <div class="health progress-bar" role="progressbar" aria-valuenow="<?php echo $opponentHealth ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="badge">Health: <?php echo $opponentHealth ?></span>
                    </li>
                </ul>
                <div class="body col-sm-4">
                    <img class="img-responsive" src="http://vignette3.wikia.nocookie.net/doblaje/images/b/b2/Image_(2).png/revision/latest?cb=20140802075015&path-prefix=es">
                </div>
                <ul class="abilities list-inline col-sm-4">
                    <li class="ability col-xs-3">Fire</li>
                    <li class="ability col-xs-3">Water</li>
                    <li class="ability col-xs-3">Earth</li>
                    <li class="ability col-xs-3">BBQ Sauce</li>
                </ul>
            </div>
            
            <div class="hud col-xs-12" id="userDisplay">
                <form id="abilityForm">
                    <ul class="abilities list-inline col-sm-4">
                        <li class="ability col-xs-3"><button type="submit" name="ability" value="0" onclick="send(0);">Fire</button></li>
                        <li class="ability col-xs-3"><button type="submit" name="ability" value="1" onclick="send(1);">Water</button></li>
                        <li class="ability col-xs-3"><button type="submit" name="ability" value="2" onclick="send(2);">Earth</button></li>
                        <li class="ability col-xs-3"><button type="submit" name="ability" value="3" onclick="send(3);">BBQ Sauce</button></li>
                    </ul>
                </form>
                <div class="body col-sm-4">
                    <img class="img-responsive" src="http://vignette3.wikia.nocookie.net/doblaje/images/b/b2/Image_(2).png/revision/latest?cb=20140802075015&path-prefix=es">
                </div>
                <ul class="bars list-group col-sm-4">
                    <li class="list-group-item">
                        <div class="progress">
                            <div class="health progress-bar" role="progressbar" aria-valuenow="<?php echo $userHealth ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="badge">Health: <?php echo $userHealth ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>