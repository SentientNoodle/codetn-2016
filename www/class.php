<?php
    session_start();
    
    if (empty($_SESSION["id"])) {
        header("Location: index.php");
        exit;
    }
    
    $imagesclass = array("classback1.jpg","classback2.jpeg","classback3.jpg");
    $nclass = rand(0, count($imagesclass) - 1);
    
    if ($_SESSION["isTeacher"] == 0) {
        if (!empty($_POST)) {
            include("../php/checkAnswer.php");
        }
    } else {
        if (!empty($_POST["question"]) and ($_POST["question"] != "custom" or $_POST["question"] != "select")) {
            include("../php/setQuestion.php");
        } else if (!empty($_POST["dqcustomquestion"])) {
            include("../php/addQuestion.php"); 
        } else if (!empty($_POST["news"])) {
            include("../php/updateNews.php");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            $page = "class"; 
            include("../php/head.php");
        ?>
        <title>Class</title>
        <link rel="stylesheet" type="text/css" href="global.css">
                <style>
            body {
                background-image: url("../media/shards_pattern.jpg");
            }
        </style>
    </head>
    <body class="class-body">
        <?php
            include("../php/navbar.php");
        ?>
        <div class="class-main col-md-9">
            <div class="dailyquestionbackground">
                <h3 class="dailyquestiontitle">DAILY QUESTION</h3>
                <div class="dailyquestionanswerbackground">
                    <?php include("../php/getQuestion.php"); ?>
                </div>
            </div>
            <br>
            <div class="newsbackground">
                <div class="newsentrybackground">
                    <h3 class="newstitle">NEWS</h3>
                    <?php include("../php/getNews.php"); ?>
                </div>
            </div>
        </div>
        <div class="sidebarhide">
            <a onclick="toggleNav()">
                <span class="sidenavarrow" id="arrow">❮</span>
            </a>
        </div>
        <div class="class-buttons col-md-3">
            <a href="findgame.php?id=<?php echo $_GET["id"]; ?>"><button class="button"><img src="media/buttons/pvpimage.png" height="80" width="80"></img><br><span>PVP</span></button></a>
            <a href="market.php?id=<?php echo $_GET["id"]; ?>"><button class="button"><img src="media/buttons/marketimage.png" height="80" width="110"><span>MARKET</span></button></a>
            <a href="inventory.php?id=<?php echo $_GET["id"]; ?>"><button class="button"><img src="media/buttons/inventoryimage.png" height="80" width="70"><span>INVENTORY</span></button></a>
        </div>
        <div id="sidenav" class="class-sidenav">
            <a href="findgame.php?id=<?php echo $_GET["id"]; ?>"><button class="button"><img src="media/buttons/pvpimage.png" height="80" width="80"></img><br><span>PVP</span></button></a>
            <a href="market.php?id=<?php echo $_GET["id"]; ?>"><button class="button"><img src="media/buttons/marketimage.png" height="80" width="110"><span>MARKET</span></button></a>
            <a href="inventory.php?id=<?php echo $_GET["id"]; ?>"><button class="button"><img src="media/buttons/inventoryimage.png" height="80" width="70"><span>INVENTORY</span></button></a>
        </div>
    </body>
</html>
