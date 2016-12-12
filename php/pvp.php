<?php
    session_start();
    $userid = $_SESSION["id"];
    // GET OPPONENT ID
    $sql = $conn->prepare("SELECT OpponentID FROM;");
    //if (time() <= ($t + 60)) {
        $sql = $conn->prepare("SELECT Abilities.ID,UHealth,OHealth FROM Abilities JOIN AbilitiesUsers ON AbilitiesUsers.AbilityID=Abilities.ID WHERE UserID=? AND Active=1;");
        $sql->bind_param("i",$userid);
        $sql->execute();
        $result = $sql->get_result();
        
        while ($row = $result->fetch_assoc()) {
            if ($row["ID"] == $_POST["ability"]) {
                break;
            }
        }
        
        $UHealth = $row["UHealth"];
        $Ohealth = $row["OHealth"];
        
        $sql = $conn->prepare("UPDATE Users SET Health=? WHERE ID=?;");
        $sql->bind_param("ii",$UHealth,$userid);
        $sql->execute();
        
        $sql = $conn->prepare("UPDATE Users SET Health=? WHERE ID=?;");
        $sql->bind_param("ii",$OHealth,$opponentid);
        $sql->execute();
    //}
?>