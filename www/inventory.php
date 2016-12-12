<?php
    session_start();
    
    include("../php/sqlconnect.php");
    
    if ($_GET["signout"] == "1") {
        session_unset();
        header("Location: index.php");
        exit;
    }
    
    // Randomly select background image
    $imagesinv = array("inventoryback1.jpeg","inventoryback2.jpeg","inventoryback3.jpeg");
    $ninv = rand(0, count($imagesinv) - 1);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            $page = "inventory";
            include("../php/head.php");
        ?>
        
        <title>CodeTN</title>
        

        <link rel="stylesheet" type="text/css" href="global.css">


        <style>
            body {
                background-image: url("../media/backgrounds/<?php echo $imagesinv[$ninv] ?>");
            }
            @media screen and (min-width: 1370px) {
                .inventorybackground {
                    width: 59%;
                }
                #userinfo {
                    display: inline-block !important;
                    height: 49.5%;
                }
                #stuffbackground {
                    display: inline-block !important;
                    height: 49.5%;
                }
                #characterbackground {
                    display: inline-block !important;
                    width: 30%;
                    margin-left: 4%;
                }
                .stuffsidebar {
                    display: inline-block;
                }
                .slotbackground {
                    width: 74%;
                    margin-right: 1%;
                }
                .positionpage {
                    margin-left: 9%;
                }
                .slot {
                    height: 35%;

                }
            }
            @media screen and (max-width: 1370px) {
                .sidebar {
                    display: inline-block;
                }
                .inventorybackground {
                    width: 56%;
                }
                .stuffsidebar {
                    display: none;
                }
                .slotbackground {
                    width: 98%;
                    margin-left: 1%;
                    margin-right: 1%;
                    width: 75%;
                }
                #userinfo {
                    display: none;
                    height: 100%;
                }
                #stuffbackground {
                    display: none;
                    height: 100%;
                }
                #characterbackground {
                    width: 40%;
                    margin-left: 10%;
                    display: none;
                }
                .positionpage {
                    margin-left: 18%;
                }
                .slot {
                    height: 25%;
                    width: 25%;

                }
            }
            @media screen and (max-width: 760px) {
                .sidebar {
                    display: none;
                }
                .stuffsidebar {
                    display: none;
                }
                .sidenavarrowhide {
                    display: inline-block;
                }
                .inventorybackground {
                    width: 100%;
                }
                .slotbackground {
                    width: 98%;
                    margin-left: 1%;
                }
                #userinfo {
                    height: 100%;
                    width: 95%;
                    margin-left: 4.5%;
                }
                #stuffbackground {
                    height: 100%;
                    width: 95%;
                    margin-left: 4.5%;
                }
                #characterbackground {
                    width: 80%;
                    background-size: 350px 430px;
                    margin-left: 10%;
                    background-position: 50% 80%;
                    display: none;
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
            <button class="button" style="vertical-align:middle" onclick="showCharacter()"><img src="media/buttons/characterimage.png" height="90" width="80"></img><br><span>CHARACTER</span></button>
            <button class="button" style="vertical-align:middle" onclick="showStats()"><img src="media/buttons/statsimage.png" height="80" width="80"></img><br><span>STATS</span></button>
            <button class="button" style="vertical-align:middle" onclick="showStuff()"><img src="media/buttons/stuffimage.png" height="90" width="130"></img><br><span>STUFF</span></button>
        </div>
    </body>
        
        <div class="positionall">
            <div class="sidebar">
                <button class="button" style="vertical-align:middle" onclick="showCharacter()"><img src="media/buttons/characterimage.png" height="90" width="80"></img><br><span>CHARACTER</span></button>
                <button class="button" style="vertical-align:middle" onclick="showStats()"><img src="media/buttons/statsimage.png" height="80" width="80"></img><br><span>STATS</span></button>
                <button class="button" style="vertical-align:middle" onclick="showStuff()"><img src="media/buttons/stuffimage.png" height="110" width="130"></img><br><span>STUFF</span></button>
            </div>
            <div class="sidenavarrowhide"><a onclick="openNav()"><span class="sidenavarrow">❯</span></a></div>
            <div id="characterbackground">
                <div class="positionclothes">
                    <div class="hat" style="background-image:url('PHP GET HAT HERE')"></div>
                    <div class="shirt" style="background-image:url('PHP GET HAT HERE')"></div>
                </div>
            </div>
            <div class="inventorybackground">
                
                <div id="userinfo">
                    <div class="positioninfocol">
                        <p style="margin-left:1%"><font color="white" size="5.5"><b>USERNAME HERE<!-- GET USERNAME HERE --></b></font></p>
                    
                        <p style="margin-left:2%"><font color="white" size="3"><b>Health:</b> <!-- Get health here --></font></p>
                            <div class="progress" style="margin-left:1%">
                                <div class="health progress-bar" role="progressbar" aria-valuenow="<?php echo $userHealth ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        
                        <p style="margin-left:2%"><font color="white" size="3"><b>Mana:</b> <!-- Get mana here --></font></p>
                            <div class="progress" style="margin-left:1%">
                                <div class="mana progress-bar" role="progressbar" aria-valuenow="<?php ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        <p style="margin-left:2%"><font color="white" size="3"><b>Battle Wins:</b> <!-- # of battles won here --></p>
                        <p style="margin-left:2%; margin-top:3%"><font color="white" size="3"><b>Tournament Wins:</b> <!-- # of tournaments won here --></p>    
                    </div> 
                    <div class="positioninfocol">
                        <div class="abilitiesbeingused">
                            <p style="margin-left:2%; margin-top:10%"><font color="white" size="3"><b>Abilities Being Used:</b> </p>
                            <div class="slot" style="margin-left:1%; margin-right:1%; width:28%; height:85%; vertical-align:top; margin-bottom:1%">
                            </div>
                            <div class="slot" style="margin-right:1%; width:28%; height:85%; vertical-align:top;">
                            </div>
                            <br>
                            <div class="slot" style="margin-right:1%; width:28%; height:85%; vertical-align:top;">
                            </div>
                            <div class="slot" style="margin-right:1%; width:28%; height:85%; vertical-align:top;">
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div id="stuffbackground">
                    <div class="stuffsidebar">
                            <button class="button" style="vertical-align:middle" onclick="showItems()"><img src="media/buttons/itemsimage.png" height="100" width="140"></img><br><span>ITEMS</span></button>
                            <button class="button" style="vertical-align:middle" onclick="showAbilities()"><img src="media/buttons/abilitiesimage.png" height="100" width="140"></img><br><span>ABILITIES</span></button>
                            <button class="button" style="vertical-align:middle" onclick="showClothes()"><img src="media/buttons/clothesimage.png" height="100" width="100"></img><br><span>CLOTHES</span></button>
                        </div>
                    <button class="positionpage">←</button>
                    <p style="display:inline-block; margin-left:19%"><font color="white"><b>PAGE <!-- CURRENT PAGE # HERE -->0/0<!-- TOTAL PAGE # HERE --></b></font></p>
                    <button style="margin-left:19%; background-color:silver; color:black; font-weight:bold;">→</button>
                    <div class="slotbackground">
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                        <div class="slot">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </body>
</html>