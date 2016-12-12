<html>
    <head>
        <?php
            session_start();
            $page = "pvp";
            include("../php/head.php");
        ?>
        
        <title>CodeTN</title>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
        ?>
    
    <div class="Battleground">
            <div id="positionRightSide" style="float:right">
                <div id="gameOptions">
                    <button class="redButton" style="height:100%; width:49%"><p style="font-weight:bold;font-size:160%;margin-top:3%">PAUSE</p></button>
                    <button class="redButton" style="height:100%; width:49%"><p style="font-weight:bold;font-size:160%;margin-top:3%">CONCEDE</p></button>
                    <!--IF WANT TO ADD SETTINGS <button class="settingsButton"><p style="font-weight:bold;font-size:225%">⚙</p></button>-->
                </div>
                <div id="emotes" style="bottom:0">
                    <div class="emoteBubble" id="youEmoteBubble" style="transform:rotate(180deg);bottom:0;display:none">
                        <p id="emoteText"></p>
                    </div>
                    <button class="emoteButton" id="emoteEmotes" style="position:absolute;bottom:0;margin-left:25%;" onclick="emoteShow()"><p style="font-weight:bold;font-size:200%;">EMOTES</p></button>
                    <button class="emoteButton" id="emoteBack" style="position:absolute;bottom:0;margin-left:25%;display:none" onclick="emoteHide()"><p style="font-weight:bold;font-size:200%;">← BACK</p></button>
                    <button class="emoteButton" id="emoteHello" style="width:48.5%; float:left; margin-bottom:1%;display:none" onclick="emoteHello()"><p style="font-weight:bold;font-size:180%;">Hello</p></button>
                    <button class="emoteButton" id="emoteWellPlayed" style="width:48.5%; float:right; margin-bottom:1%;display:none" onclick="emoteWellPlayed()"><p style="font-weight:bold;font-size:180%;">WellPlayed</p></button>
                    <button class="emoteButton" id="emoteWow" style="width:48.5%; float:left; margin-bottom:1%;display:none" onclick="emoteWow()"><p style="font-weight:bold;font-size:180%;">Wow</p></button>
                    <button class="emoteButton" id="emoteHaha" style="width:48.5%; float:right; margin-bottom:1%;display:none" onclick="emoteHaha()"><p style="font-weight:bold;font-size:180%;">Haha</p></button>
                    <button class="emoteButton" id="emoteSorry" style="width:48.5%; float:left; margin-bottom:1%;display:none" onclick="emoteSorry()"><p style="font-weight:bold;font-size:180%;">Sorry</p></button>
                    <button class="emoteButton" id="emoteUhhhhh" style="width:48.5%; float:right; margin-bottom:1%;display:none" onclick="emoteUhhhhh()"><p style="font-weight:bold;font-size:180%;">Uhhhhh</p></button>
                    <button class="emoteButton" id="emoteOops" style="width:48.5%; float:left; margin-bottom:1%;display:none" onclick="emoteOops()"><p style="font-weight:bold;font-size:180%;">Oops</p></button>
                    <button class="emoteButton" id="emoteCustom" style="width:48.5%; float:right; margin-bottom:1%;display:none" onclick="emoteCustom()"><p style="font-weight:bold;font-size:180%;">[Custom]</p></button> <!-- FOR CUSTOM, EITHER THEY TYPE OUT THEIR OWN MESSAGE OR CAN PURCHASE/MAKEA CUSTOM SAYING AND GET IT APPROVED BY TEACHER/COMPUTER THAT CAN TELL IF ITS APPROPRAITE OR INAPPROPRIATE? --> 
                </div>
            </div>
            <div class="character" id="pvpopponent" style="background-size:100%85%"></div>
            <div class="stats">
                <div class="nameTag"><font size="5">NAME OF OPPONENT</font><!-- PHP GET NAME HERE --></div>
                <button class="redButton"><p style="font-weight:bold;font-size:180%;">MUTE</p></button>
                <div class="health"><p style="font-weight:bold;color:black;font-size:200%;">Health: <!-- PHP GET HEALTH HERE --> <font color="red">look at note in code 4 bar</font><!--I NEED HELP WITH THE BARS?! ARE WE GOING THROUGH WITH WHAT YOU MADE ISAAC? --></div>
                <div class="mana"><p style="font-weight:bold;color:black;font-size:200%;">Mana: <!-- PHP GET MANA HERE --> <font color="red">look at note in code 4 bar</font><!--I NEED HELP WITH THE BARS?! ARE WE GOING THROUGH WITH WHAT YOU MADE ISAAC? --></div>
                <div class="abilities">
                    <button class="ability" disabled>
                        <div class="abilityImage"><img src="../media/abilities/flame.png" width="100%" height="100%"></div>
                        <div class="abilityText"><!-- PHP GET ABILITIY'S DESCRIPTION HERE-->DESCRIPTION OF THE ABILITY</div>
                        <div class="abilityDamage"><!-- PHP GET ABILITY'S DAMAGE HERE -->150</div>
                        <div class="abilityUses"><!-- PHP GET ABILITY'S USES LEFT HERE --> <font color="orange">5</font>/10</div>
                    </button>
                    <button class="ability" disabled>
                        <div class="abilityImage"><img src="../media/abilities/lightning.png" width="100%" height="100%"></div>
                        <div class="abilityText"><!-- PHP GET ABILITIY'S DESCRIPTION HERE-->DESCRIPTION OF THE ABILITY</div>
                        <div class="abilityDamage"><!-- PHP GET ABILITY'S DAMAGE HERE -->9001</div>
                        <div class="abilityUses"><!-- PHP GET ABILITY'S USES LEFT HERE --> <font color="green">9000</font>/9000</div>
                    </button>
                    <button class="ability" disabled>
                        <div class="abilityImage"><img src="../media/abilities/flame.png" width="100%" height="100%"></div>
                        <div class="abilityText"><!-- PHP GET ABILITIY'S DESCRIPTION HERE-->DESCRIPTION OF THE ABILITY</div>
                        <div class="abilityDamage"><!-- PHP GET ABILITY'S DAMAGE HERE -->220</div>
                        <div class="abilityUses"><!-- PHP GET ABILITY'S USES LEFT HERE --> <font color="red">2</font>/5</div>
                    </button>
                    <button class="ability" disabled>
                        <div class="abilityImage"><img src="../media/abilities/lightning.png" width="100%" height="100%"></div>
                        <div class="abilityText"><!-- PHP GET ABILITIY'S DESCRIPTION HERE-->DESCRIPTION OF THE ABILITY</div>
                        <div class="abilityDamage"><!-- PHP GET ABILITY'S DAMAGE HERE -->1</div>
                        <div class="abilityUses"><!-- PHP GET ABILITY'S USES LEFT HERE --> <font color="">20</font>/20</div>
                    </button>
                </div>
            </div>
        </div> 
        
        <div class="Battleground">
            <div id="positionLeftSide" style="float:left">
                <div id="emotes" style="top:0">
                    <div class="emoteBubble" id="opponentEmoteBubble" style="top:0;display:none"><!-- OPPONENT EMOTE HERE --></div>
                </div>
            </div>
            <div class="character" id="pvpyou" style="float:right;background-size:100%80%"></div>
            <div class="stats" style="float:right;margin-right:.25%">
                <center><div class="nameTag"><font size="5">NAME OF YOU</font><!-- PHP GET NAME HERE --></div></center>
                <div class="health"><p style="font-weight:bold;color:black;font-size:200%;">Health: <!-- PHP GET HEALTH HERE --> <font color="red">look at note in code 4 bar</font><!--I NEED HELP WITH THE BARS?! ARE WE GOING THROUGH WITH WHAT YOU MADE ISAAC? --></div>
                <div class="mana"><p style="font-weight:bold;color:black;font-size:200%;">Mana: <!-- PHP GET MANA HERE --> <font color="red">look at note in code 4 bar</font><!--I NEED HELP WITH THE BARS?! ARE WE GOING THROUGH WITH WHAT YOU MADE ISAAC? --></div>
                <div class="abilities">
                    <button class="ability">
                        <div class="abilityImage"><img src="../media/abilities/flame.png" width="100%" height="100%"></div>
                        <div class="abilityText"><!-- PHP GET ABILITIY'S DESCRIPTION HERE-->DESCRIPTION OF THE ABILITY</div>
                        <div class="abilityDamage"><!-- PHP GET ABILITY'S DAMAGE HERE -->150</div>
                        <div class="abilityUses"><!-- PHP GET ABILITY'S USES LEFT HERE --> <font color="orange">5</font>/10</div>
                    </button>
                    <button class="ability">
                        <div class="abilityImage"><img src="../media/abilities/lightning.png" width="100%" height="100%"></div>
                        <div class="abilityText"><!-- PHP GET ABILITIY'S DESCRIPTION HERE-->DESCRIPTION OF THE ABILITY</div>
                        <div class="abilityDamage"><!-- PHP GET ABILITY'S DAMAGE HERE -->9001</div>
                        <div class="abilityUses"><!-- PHP GET ABILITY'S USES LEFT HERE --> <font color="green">9000</font>/9000</div>
                    </button>
                    <button class="ability">
                        <div class="abilityImage"><img src="../media/abilities/flame.png" width="100%" height="100%"></div>
                        <div class="abilityText"><!-- PHP GET ABILITIY'S DESCRIPTION HERE-->DESCRIPTION OF THE ABILITY</div>
                        <div class="abilityDamage"><!-- PHP GET ABILITY'S DAMAGE HERE -->220</div>
                        <div class="abilityUses"><!-- PHP GET ABILITY'S USES LEFT HERE --> <font color="red">2</font>/5</div>
                    </button>
                    <button class="ability">
                        <div class="abilityImage"><img src="../media/abilities/lightning.png" width="100%" height="100%"></div>
                        <div class="abilityText"><!-- PHP GET ABILITIY'S DESCRIPTION HERE-->DESCRIPTION OF THE ABILITY</div>
                        <div class="abilityDamage"><!-- PHP GET ABILITY'S DAMAGE HERE -->1</div>
                        <div class="abilityUses"><!-- PHP GET ABILITY'S USES LEFT HERE --> <font color="">20</font>/20</div>
                    </button>
                </div>
            </div>
        </div>
        
    </body>
</html>