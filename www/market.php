<?php
    session_start();
    
    include("../php/sqlconnect.php");
    
    // Resets session if the user is not signed in
    if ($_GET["signout"] == "1") {
        session_unset();
        header("Location: index.php");
        exit;
    }
    
    // Includes pages needed to buy/sell on market if user is signed in
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
        <title>Market</title>
       
                       <style>
            body {
                background-image: url("../media/shards_pattern.jpg");
            }
        </style>

    </head>
    <body>
        <?php
            include("../php/navbar.php");   //imports navbar
        ?>

<!--============================================================================market=page=interface================================================================================================-->
    <div class="container-fluid text-center">
        <div class="row content">

<!------------------------------------------------------------------------------market items, sell an ite, and your current market items buttons------------------------------------------------------->
            <div class="col-xs-12 col-md-3 sidenav">
                <button class="button" style="vertical-align:middle" onclick="showMarket()">    <span>Market Items</span>              </button> <!-- button for market items -->
                <button class="button" style="vertical-align:middle" onclick="showSellItems()"> <span>Sell An Item</span>              </button> <!-- button for sell an item -->
                <button class="button" style="vertical-align:middle" onclick="showActive()">    <span>Your Current Market Items</span> </button> <!-- button for your current market items -->

<!------------------------------------------------------------------------------market-logo------------------------------------------------------------------------------------------------------------>
                    <img src="../media/buttons/marketimage.png" style="width:40%;height:40%;margin-top:5%"> </img> <!-- import market logo image -->
                    <p id="marketMoneyText" align="center"><!-- AMOUNT OF MONEY HERE -->$<?php include("../php/getUserCurrency.php"); ?></p> 
                </div>
                
                <!-- Mobile Version "side bar" for about buttons -->
                <nav class="navbar navbar-inverse hidden-md hidden-lg">

                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand"><p id="marketType">ERROR: about information type is not selected</p></a>
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#marketNavBar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>  
                            </button>
                        </div>
                        <div class="navbar-collapse collapse" id="marketNavBar">
                            <button class="button" style="vertical-align:middle" onclick="showMarket()"><span>Market Items</span></button>
                            <button class="button" style="vertical-align:middle" onclick="showSellItems()"><span>Sell An Item</span></button>
                            <button class="button" style="vertical-align:middle" onclick="showActive()"><span>Your Current Market Items</span></button>
                            
                            <img src="../media/buttons/marketimage.png" style="width:40%;height:40%;margin-top:5%"></img>
                            <p id="marketMoneyText" style="color:white" align="center"><!-- AMOUNT OF MONEY HERE -->$<?php include("../php/getUserCurrency.php"); ?></p>
                        </div>
                    </div>
                </nav> <!-- navbar navbar-inverse hidden-md hidden-lg line: -->
                
                <div class="col-xs-12 col-md-9 marketBackground" id="marketitems">
                    <?php
                        include("../php/getMarketItems.php");
                    ?>
                </div>
                <!-- This is the code you need for inventory Jack... -->
                <div class="col-xs-12 col-md-9 marketBackground" id="inventoryitems">
                    <?php
                        include("../php/getUserAbilities.php");
                    ?>
                </div>
                <!-- ............................................... -->
                <div class="col-xs-12 col-md-9 marketBackground" id="marketactive">
                    <?php
                        include("../php/getUserMarketItems.php");
                    ?>
                </div>
            </div> <!-- row content line: -->
        </div> <!-- container-fluid text-center line: -->


    
    <script type="text/javascript">
        showMarket();
    </script>
        
    </body>
</html>