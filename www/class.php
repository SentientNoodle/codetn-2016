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
        <!-- Set selected background image -->
        <style>
            body {
                background-image: url("../media/backgrounds/<?php echo $imagesclass[$nclass] ?>");
            }
            @media screen and (max-width: 985px) { /* Fixed the media problem :P */
                .positionline {
                    display: none;
                }
                .newsbackground {
                    width: 98%;
                }
                .dailyquestionbackground {
                    width: 98%;
                }
                .sidebarhide {
                    display: inline;
                }
            }
        </style>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
        ?>
        
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="pvp.php"><button class="button" style="vertical-align:middle"><img src="media/buttons/pvpimage.png" height="80" width="80"></img><br><span>PVP</span></button></a>
        <a href="market.php"><button class="button" style="vertical-align:middle"><img src="media/buttons/marketimage.png" height="80" width="110"><span>MARKET</span></button></a>
        <a href="inventory.php"><button class="button" style="vertical-align:middle" onclick="inventory.php"><img src="media/buttons/inventoryimage.png" height="80" width="70"><span>INVENTORY</span></button></a>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    
    </body>
        
        <div class="positionall">
            <div class="positionline">
                <div class="positionbuttons">
                     <a href="findgame.php"><button class="button" style="vertical-align:middle"><img src="media/buttons/pvpimage.png" height="80" width="110"></img><span>PVP</span></button></a>
                     <a href="market.php"><button class="button" style="vertical-align:middle"><img src="media/buttons/marketimage.png" height="80" width="110"><span>MARKET</span></button></a>
                     <a href="inventory.php"><button class="button" style="vertical-align:middle"><img src="media/buttons/inventoryimage.png" height="80" width="70"><span>INVENTORY</span></button></a>
                </div>
            </div>
            <div class="sidebarhide"><a onclick="openNav()"><span class="sidenavarrow">❮</span></a></div>
            <div class="dailyquestionbackground">
                <p class="dailyquestiontitle" align="left">DAILY QUESTION</p>
                <div class="dailyquestionanswerbackground">
                    <?php include("../php/getQuestion.php"); ?>
                </div>
                
                <!-- TEXT ANSWER -->
                <!-- <div class="dailyquestionanswerbackground">
                    <textarea id="dqtextanswer" placeholder="Your answer here..."></textarea>
                    <button type="button" onclick="<!-- Do something here after submitted --> <!-- ">Submit Answer</button>
                    </div> --> <!-- This is text answer box -->
                
                <!-- LETTER ANSWER -->    
                <!-- <div class="dailyquestionanswerbackground" id="dqletteranswerbackground">
                <form> <!-- Do something after submitted in form... form action = etc etc -->
                    <!-- A <input type="checkbox" name="dqletteranswer" value="A"> <!-- Possible Answer goes here --><br>
                    <!-- B <input type="radio" name="dqletteranswer" value="B"> <!-- Possible Answer goes here --><br>
                    <!-- C <input type="radio" name="dqletteranswer" value="C"> <!-- Possible Answer goes here --><br>
                    <!-- D <input type="radio" name="dqletteranswer" value="D"> <!-- Possible Answer goes here --><br>
                    <!-- <br><input type="submit" value="Submit Answer">
                </form>
                </div> -->
                
                <!-- LETTEREXPLAIN ANSWER -->
                <!-- <div id="dqletteranswerbackgroundle">
                    <!-- A <input type="radio" name="dqletteranswer" value="A"> <!-- Possible Answer goes here --><br>
                    <!-- B <input type="radio" name="dqletteranswer" value="B"> <!-- Possible Answer goes here --><br>
                    <!-- C <input type="radio" name="dqletteranswer" value="C"> <!-- Possible Answer goes here --><br>
                    <!-- D <input type="radio" name="dqletteranswer" value="D"> <!-- Possible Answer goes here --><br>
                    <!-- <div id="dqexplainanswerbackgroundle">
                        <textarea placeholder="Explain your answer here..."></textarea>
                        <button type="button" onclick="<!-- Do something here after submitted --> <!-- ">Submit Answer</button>
                    </div>
                </div> -->
                
            </div>
            <div class="newsbackground">
                <div class="newsentrybackground">
                    <p class="newstitle" align="center">NEWS</p>
                    <?php include("../php/getNews.php"); ?>
                </div>
            </div>
        </div>
        
        
        
    </body>
</html>
