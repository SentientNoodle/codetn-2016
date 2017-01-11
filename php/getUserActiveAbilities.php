<?php
    include("../php/sqlconnect.php");
    
    // Selects the user's active abilities from the database
    $sql = $conn->prepare("SELECT Abilities.ID,Supply,Name,Description FROM Abilities JOIN AbilitiesUsers ON Abilities.ID=AbilitiesUsers.AbilityID WHERE AbilitiesUsers.UserID=? AND AbilitiesUsers.Active=?;");
    $sql->bind_param("ii",$userid,$active);
    $userid = $_SESSION["id"];
    $active = 1;
    $sql->execute();
    $result = $sql->get_result();
    
    $abilities = "";
    while ($row = $result->fetch_assoc()) {
        $abilities .= '
            <div class="activeAbilities-slot">
                <h4>'.$row["Name"].'</h4>
                <p>'.$row["Description"].'</p>
                <span class="badge">'.$row["Supply"].'</span>
            </div>
        ';
    }
    
    echo $abilities;
?>