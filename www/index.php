<?php
    session_start();
    
    if ($_GET["signout"] == "1") {
        session_unset();
        header("Location: index.php");
        exit;
    }
    
    // Randomly select background image
    $images = array("indexback1.jpg","indexback2.jpeg","indexback3.jpeg");
    $n = rand(0, count($images) - 1);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            $page = "index";
            include("../php/head.php");
        ?>
        <title>CodeTN</title>
        <!-- Set selected background image -->
        <style>
            body {
                background-image: url("../media/backgrounds/<?php echo $images[$n] ?>");
            }
        </style>
    </head>
    <body>
    <?php
        include("../php/navbar.php");
    ?>
        
    <div class="jumbotron">
        <div class="container text-center">
            <h1 style="font-weight:bold">[WEBSITE NAME]</h1>
        </div>
    </div>
        
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="panel panel-orange">
                    <div class="panel-heading">
                        <div id="slideName">null</div>
                    </div>
                    <div class="panel-body" style="height:450px;overflow-y:auto;">
                        <div id="slideInfo">null</div>
                        <!-- Info -->
                        <p id="slideInfo1" style="display:none">
                            "site name" is a site to promote the communication and interaction with a class and students, with an interactive market and a fun pvp.
                            Another feature is a clothes system, where a user may improve the way they look. Users may interact with other students for class reasons, 
                            such as study questions. They can then battle each other for fun, promoting interaction between students. Users interacting with the market
                            can learn skills with trading and money management.
                        </p>
                        <p id="slideInfo2" style="display:none">
                            <b>PVP COMBAT SYSTEM</b><br>
                            Fight Other Students In A Fun Battle System<br><br>
                            <b>PEER INTERACTIVE ATMOSPHERE</b><br>
                            Interact With Other Students Throught The Site<br><br>
                            <b>PLAYER MARKET SYSTEM</b><br>
                            Buy And Sell To Peers On The Market<br><br>
                            <b>INVENTORY SYSTEM</b><br>
                            Hold Items That Boost Your Character's Power And Look<br><br>
                            <b>COMPATIBLITY WITH ANY AND ALL CLASSES</b><br>
                            Use This Site For Any Type Of Class You Have
                            </p>
                        <p id="slideInfo3" style="display:none">
                            Sign up now to create a class if you're a teacher or to join a class if your a student!
                            Get ahead when you can, your classmates may already have an account so hurry!
                        </p>
                    </div>
                    <div class="panel-footer" align="center">
                        <a onclick="indexsse1();indexsseextended=1;"><span id="dot1" class="dot"></span></a>
                        <a onclick="indexsse2();indexsseextended=1;"><span id="dot2" class="dot"></span></a>
                        <a onclick="indexsse3();indexsseextended=1;"><span id="dot3" class="dot"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
            var indexsse = 1;
            var slideShowTimer = 5000;
            var indexsseextended = 0;
            autoIndexSlide();
    </script>
    
    </body>
</html>