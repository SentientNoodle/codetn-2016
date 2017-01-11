<?php
    header("Refresh: 10;url=index.php");
?>
<html>
    <head>
        <title>CodeTN</title>
        <?php
            include("../php/head.php");
        ?>
    </head>
    <body class="win-body">
        <div class="container" id="youWin" style="color:lime;font-weight:bold;font-size:200%" align="center"></div>
        <div id="fireworkExplosionField">
            <div class="fireworkExplosionStage3" id="fireworkExplosionStage3">
                <div class="fireworkExplosionStage2" id="fireworkExplosionStage2">
                    <div class="fireworkExplosionStage1" id="fireworkExplosionStage1">
                    </div>
                </div>
            </div>
        </div>
        <div id="fireworkField">
            <div class="firework" id="firework1"></div>
            <div class="firework" id="firework2"></div>
            <div class="firework" id="firework3"></div>
            <div class="firework" id="firework4"></div>
        </div>
        
        <script type="text/javascript">
            firework4();
        </script>
    </body>
</html>