<!DOCTYPE HTML>
<html>
    <head>
        <?php
            $page = "findgame";
            include("../php/head.php");
            
            if (!empty($_POST["request"])) {
                // include("../php/acceptGame.php");
            } else if (!empty($_POST["user"])) {
                include("../php/sendGame.php");
            }
        ?>
        <title>Find a Game</title>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
        ?>
        
        <div class="pvpbanner"></div>
        
        <div class="requests col-sm-7">
            <form action="findgame.php" method="post">
                <button type="submit" class="request" name="request" value="13"><span>Isaac Sikkema</span></button>
            </form>
        </div>
        <div class="users col-sm-5">
            <form action="findgame.php" method="post">
                <button type="submit" class="request" name="user" value="13"><span>Isaac Sikkema</span></button>
            </form>
        </div>
    </body>
</html>