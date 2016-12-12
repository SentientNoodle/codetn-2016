<?php
    include("../php/sqlconnect.php");
    
    $sql = $conn->prepare("SELECT AbilitiesUsers.ID,Supply,Active,Name,Description FROM Abilities JOIN AbilitiesUsers ON Abilities.ID=AbilitiesUsers.AbilityID WHERE AbilitiesUsers.UserID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    
    $abilities = "";
    while ($row = $result->fetch_assoc()) {
        $abilities .= '
            <div class="market-slot">
                <h4>'.$row["Name"].'</h4>
                <p>'.$row["Description"].'</p>
                <span class="badge">'.$row["Supply"].'</span>
                <form action="market.php?id='.$_GET["id"].'" method="post">
                    <input type="hidden" name="abilityid" value="'.$row["ID"].'">
                    $<input type="number" name="price" id="price" required>
                    <input type="submit" value="SELL">
                </form>
            </div>
        ';
    }
    
    echo $abilities;
?>