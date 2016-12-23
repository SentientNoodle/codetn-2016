<?php
    include("../php/sqlconnect.php");
    
    $sql = $conn->prepare("SELECT Abilities.ID,Supply,Active,Name,Description FROM Abilities JOIN AbilitiesUsers ON Abilities.ID=AbilitiesUsers.AbilityID WHERE AbilitiesUsers.UserID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    
    $abilities = "";
    while ($row = $result->fetch_assoc()) {
        $abilities .= '
            <div class="inventory-slot">
                <h4>'.$row["Name"].'</h4>
                <p>'.$row["Description"].'</p>
                <span class="badge">'.$row["Supply"].'</span>
            </div>
        ';
    }
    
    echo $abilities;
?>