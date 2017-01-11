<?php
    include("../php/sqlconnect.php");
    
    // Selects the all of user's abilities from the database
    $sql = $conn->prepare("SELECT Abilities.ID,Supply,Active,Name,Description,OnMarket FROM Abilities JOIN AbilitiesUsers ON Abilities.ID=AbilitiesUsers.AbilityID WHERE AbilitiesUsers.UserID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    
    $abilities = "";
    while ($row = $result->fetch_assoc()) {
        if ($row["OnMarket"] == 0) {
            $abilities .= '
                <div class="col-sm-4">
                    <div class="panel panel-orange">
                        <div class="panel-heading">'.$row["Name"].'</div>
                        <div class="panel-body" style="height:100px;overflow-y:auto;">'.$row["Description"].'</div>
                        <div class="panel-footer">'.$row["Supply"].'<br> 
                            <form action="market.php?id='.$_GET["id"].'" method="post">
                                <input type="hidden" name="abilityid" value="'.$row["ID"].'">
                                $<input type="number" name="price" id="price" required>
                                <input type="submit" value="SELL">
                            </form>
                        </div>
                    </div>
                </div>
            ';
        }
    }
    
    echo $abilities;
?>