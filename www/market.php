<?php
    session_start();
    
    include("../php/sqlconnect.php");
    
    if ($_GET["signout"] == "1") {
        session_unset();
        header("Location: index.php");
        exit;
    }
    
    if (!empty($_POST["abilityid"])) {
        include("../php/addItemToMarket.php");
    } elseif (!empty($_POST["itemid"])) {
        include("../php/buyItemFromMarket.php");
    }
    
    /*// Randomly select background image
    $imagesmarket = array(/*images here*//*);
    $nmarket = rand(0, count($imagesmarket) - 1);*/
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            $page = "market";
            include("../php/head.php");
        ?>
        <title>CodeTN</title>
        <style>
            /*body {
                background-image: url("../media/backgrounds/<?php echo $imagesmarket[$nmarket] ?>");
            }*/
            #characterbackground {
                background-image: url("../media/character.png");
            }
        </style>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
        ?>
        <div class="positionmarket" style="margin:auto">
            <div class="positionmarketitems">
                
                <div class="marketitemsbackground" id="marketitems" style="display:inline-block">
                    <?php
                        include("../php/getMarketItems.php");
                    ?>
                </div>
                
                <div class="marketactivebackground" id="marketactive" style="display:none">
                    <h2 style="text-align:center;font-weight:bold;color:white">Your Active Items On The Market</h2>
                    <button class="positionpage" style="margin-left:21%">←</button>
                    <p style="display:inline-block; margin-left:20%"><font color="white"><b>PAGE <!-- CURRENT PAGE # HERE -->0/0<!-- TOTAL PAGE # HERE --></b></font></p>
                    <button style="margin-left:20%; background-color:silver; color:black; font-weight:bold;">→</button>
                    <div class="marketitemsbackground" style="display:inline-block;height:86.5%;width:99%">
                        <?php
                            include("../php/getUserMarketItems.php");
                        ?>
                    </div>
                </div>
                
                <div id="stuffbackground" style="width:68.65%;height:100%;display:none">
                    <div class="stuffsidebar" style="width:35%">
                            <button class="button" style="vertical-align:middle" onclick="showItems()"><img src="media/buttons/itemsimage.png" height="100" width="140"></img><br><span>ITEMS</span></button>
                            <button class="button" style="vertical-align:middle" onclick="showAbilities()"><img src="media/buttons/abilitiesimage.png" height="100" width="140"></img><br><span>ABILITIES</span></button>
                            <button class="button" style="vertical-align:middle" onclick="showClothes()"><img src="media/buttons/clothesimage.png" height="100" width="100"></img><br><span>CLOTHES</span></button>
                        </div>
                    <button class="positionpage">←</button>
                    <p style="display:inline-block; margin-left:12%"><font color="white"><b>PAGE <!-- CURRENT PAGE # HERE -->0/0<!-- TOTAL PAGE # HERE --></b></font></p>
                    <button style="margin-left:12%; background-color:silver; color:black; font-weight:bold;">→</button>
                    <div class="slotbackground" style="width:60%">
                        <?php
                            include("../php/getUserAbilities.php");
                        ?>
                    </div>
                </div>
                
                <div class="marketbuttonsbackground">
                    <button class="button" style="vertical-align:middle" onclick="showMarket()"><img></img><br><span>MARKET</span></button>
                    <button class="button" style="vertical-align:middle" onclick="showSellItems()"><img></img><br><span>SELL AN ITEM</span></button>
                    <button class="button" style="vertical-align:middle" onclick="showActive()"><img></img><br><span>YOUR MARKET ITEMS</span></button>
                </div>
            </div>
            <div class="marketstatsbackground">
                <div class="marketstats">
                    <img src="../media/buttons/marketimage.png" style="width:40%;height:40%;margin-top:30%;display:inline-block;margin-left:30.5%"></img><p style="font-size:200%;font-weight:bold;color:white;" align="center"><!-- AMOUNT OF MONEY HERE -->$<?php include("../php/getUserCurrency.php"); ?></p>
                </div>
                <div id="characterbackground" style="width:100%; height:70%; margin-left:0%">
                    <div class="hat">
                        <!-- HAT HERE -->
                    </div>
                    <div class="shirt">
                        <!-- SHIRT HERE -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>