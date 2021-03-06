<?php
    include("../php/sqlconnect.php");
    
    // Selects all active abilities from the database for a user
    $sql = $conn->prepare("SELECT AbilityID,Name,Description,UHealth,OHealth FROM AbilitiesUsers JOIN Abilities ON AbilitiesUsers.AbilityID=Abilities.ID WHERE UserID=? AND Active=1;");
    $sql->bind_param("i", $userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    
    $abilities = "";
    while ($row = $result->fetch_assoc()) {
        $abilities .= '
            <button type="submit" class="ability col-xs-3" name="ability" value="'.$row["AbilityID"].'" data-toggle="tooltip" data-placement="top" title="'.$row["Name"].':&#13;&#10;'.$row["Description"].'" onclick="submit();">
                <div class="abilityImage"><img src="../media/abilities/lightning.png" width="100%" height="auto"></div>
                <div class="abilityText"><h4>'.$row["Name"].'</h4></div>
                <div class="abilityDamage">'.$row["UHealth"].' | '.$row["OHealth"].'</div>
            </button>
        ';
    }
    
    echo $abilities;
?>