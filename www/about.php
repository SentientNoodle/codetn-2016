<?php
    session_start();
    
    if ($_GET["signout"] == "1") {
        session_unset();
        header("Location: index.php");
        exit;
    }
    
    $imagesabout = array("aboutback1.jpeg","aboutback2.jpg","aboutback3.jpeg");
    $nabout = rand(0, count($imagesabout) - 1);
?>

<!DOCTYPE html>
<html>
    <head>
        <?php
            $page = "about";
            include("../php/head.php");
        ?>
        <title>CodeTN</title>
        <style>
            body {
                background-image: url("../media/backgrounds/<?php echo $imagesabout[$nabout] ?>");
            }
            @media screen and (max-width: 1015px) { /* Fixed the media problem :P */
                .buttonline {
                    display: none;
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
        
        <div class="right">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <button class="button" style="vertical-align:middle"><span>ABOUT "WEBSITE NAME HERE"</span></button>
            <button class="button" style="vertical-align:middle"><span>FEATURES</span></button>
            <button class="button" style="vertical-align:middle"><span>ABOUT US</span></button>
        </div>

        <script>
            function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            }
        </script>
        
        <!--<div class="positionall">
            <div class="positionfeatures">
                <div class="featuresheader"><p align="center"><font size="10"><b>FEATURES</b></font></p></div>
                <div class="features" id="marginfeatures">
                </div>
                <div class="features" id="marginfeatures">
                </div>
                <div class="features">
                </div>
                <div class="features">
                </div>
            </div>
            <div class="about">
                
            </div>    
        </div> -->
        
        <div class="positionall">
            <div class="buttonline">
                <div class="buttonposition">
                    <button class="button" style="vertical-align:middle"><span>ABOUT "WEBSITE NAME HERE"</span></button>
                    <button class="button" style="vertical-align:middle"><span>FEATURES</span></button>
                    <button class="button" style="vertical-align:middle"><span>ABOUT US</span></button>
                </div>
            </div>
        </div>
        <div class="sidebarhide"><a onclick="openNav()"><span class="sidenavarrow">❯</span></a></div>
        
    </body>
</html>