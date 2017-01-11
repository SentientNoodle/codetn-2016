<?php
    session_start();
    
    include("../php/sqlconnect.php");
    
    if ($_GET["signout"] == "1") {
        session_unset();
        header("Location: index.php");
        exit;
    }
    
    if (!empty($_POST)) {
        include("../php/setUserCurrentClothing.php");
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
        
        <title>Inventory</title>
        

        <link rel="stylesheet" type="text/css" href="global.css">


        <style>
            body {
                background-image: url("../media/shards_pattern.jpg");
            }
        </style>
    </head>
    
<body>
    
<?php
    include("../php/navbar.php");
?>

<div class="container-fluid">
    <div class="row content">
        <!-- Character and character stats for md and lg bootstrap version -->
        <div class="col-md-3 characterBackground hidden-xs hidden-sm">
            <?php include("../php/getUserCurrentClothing.php") ?>
        </div>
        <div class="col-md-8 col-md-offset-1 userInfo hidden-xs hidden-sm" style="padding-left:3%">
            <div class="row">
                <p> <font color="white" size="5.5"> <b><?php include("../php/getUsername.php"); ?></b></font></p>
        <!----------------------------------------------------display-battle-info------------------------------------------------------------------------------------------------------------------------------>
                <p> <font color="white" size="3"> <b>Battle Wins: <?php include("../php/getWins.php"); ?></b></p>
                <p> <font color="white" size="3"> <b>Battle Losses: <?php include("../php/getLosses.php"); ?></b></p>
                <p> <font color="white" size="3"> <b>Win Percentage: <?php include("../php/getWinPercentage.php"); ?>%</b></p>
            </div>
            <div class="row">
        <!--__________________________________________________User_abilities_being_used______________________________________________________________________________________________________________________-->
                <p><font color="white" size="3"><b>Abilities Being Used:</b></p>
                <div class="row">
                    <?php
                        include("../php/getInventoryActiveAbilities.php");   //import-active-abilities
                    ?>
                </div>
            </div>  <!-- row line end line 76 -->
        </div>
        <!-- Character and character stats for xs and sm bootstrap version -->
        <div class="col-xs-10 col-xs-offset-1 characterBackground hidden-md hidden-lg">
            
            <?php include("../php/getUserCurrentClothing.php" ) ?>
            </div>
        </div>
    </div>
    <div class="row content" style="margin-top:1%">
        <nav class="navbar navbar-inverse hidden-md hidden-lg" style="margin-top:1%">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand"><p>Your Stats</p></a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#inventoryStatsNavBar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>  
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="inventoryStatsNavBar">
                    <p> <font color="white" size="5.5"> <br class="hidden-xs visible-sm hidden-md hidden-lg"><br class="hidden-xs visible-sm hidden-md hidden-lg"> <b><?php include("../php/getUsername.php"); ?></b> <!-- GET USERNAME HERE --> </font></p>
                    <p> <font color="white" size="3"> <b>Battle Wins: <?php include("../php/getWins.php"); ?></b></p>
                    <p> <font color="white" size="3"> <b>Battle Losses: <?php include("../php/getLosses.php"); ?></b></p>
                    <p> <font color="white" size="3"> <b>Win Percentage: <?php include("../php/getWinPercentage.php"); ?>%</b></p>
                    <a class="hidden-xs"> <font color="white" size="3"> <b>Abilities Being Used:</b></font></a>
                    <button type="button" class="navbar-toggle button hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#inventoryActiveAbilities">Abilities Being Used</button>
                    <div class="collapse navbar-collapse" id="inventoryActiveAbilities">
                        <?php
                            include("../php/getInventoryActiveAbilitiesMobile.php");   //import-active-abilities
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="row content" style="margin-top:1%">
        <!-- Side bar for abilities, items, clothes button md and lg version -->
        <div class="col-md-3 sidenav hidden-xs hidden-sm">
            <button class="button" style="vertical-align:middle" onclick="showAbilitiesItems()"><span>Abilities & Items</span></button>
            <button class="button" style="vertical-align:middle" onclick="showClothes()"><span>Clothes</span></button>
        </div>
        <!-- Nav bar for mobile version -->
        <nav class="navbar navbar-inverse hidden-md hidden-lg">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand"><p id="inventoryType">ERROR: about information type is not selected</p></a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#inventoryNavBar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>  
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="inventoryNavBar">
                    <button class="button" style="vertical-align:middle" onclick="showAbilitiesItems()"><span>Abilities & Items</span></button>
                    <button class="button" style="vertical-align:middle" onclick="showClothes()"><span>Clothes</span></button>
                </div>
            </div>
        </nav>
        <div class="col-md-9" id="inventoryAbilitiesItems">
            <?php
                include("../php/getInventoryAbilities.php");
            ?>
        </div>
        <div class="col-md-9" id="inventoryClothes">
            <?php
            include("../php/getClothes.php");
            ?>
        </div>
    </div>
</div> 

<script type="text/javascript">
    showAbilitiesItems();
</script>



    </body>
</html>