<?php
    session_start();
    $userid = $_SESSION["id"];
    $gameid = $_SESSION["gameid"];
    
    include("../php/sqlconnect.php");
    
    $sql = $conn->prepare("SELECT Turn FROM Games WHERE ID=?;");
    $sql->bind_param("i",$gameid);
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $turn = $result["Turn"];
    
    if ($turn == $userid) {
        $sql = $conn->prepare("SELECT UserID,OpponentID,UserHealth,OpponentHealth FROM Games WHERE ID=?;");
        $sql->bind_param("i",$gameid);
        $sql->execute();
        $result = $sql->get_result();
        $result = $result->fetch_assoc();
        
        if ($_SESSION["id"] == $result["UserID"]) {
            $userid = $result["UserID"];
            $opponentid = $result["OpponentID"];
            
            $uhealth = $result["UserHealth"];
            $ohealth = $result["OpponentHealth"];
        } else {
            $userid = $result["OpponentID"];
            $opponentid = $result["UserID"];
            
            $uhealth = $result["OpponentHealth"];
            $ohealth = $result["UserHealth"];
        }
        
        $sql = $conn->prepare("SELECT Abilities.ID,UHealth,OHealth FROM Abilities JOIN AbilitiesUsers ON AbilitiesUsers.AbilityID=Abilities.ID WHERE UserID=? AND Active=1;");
        $sql->bind_param("i",$userid);
        $sql->execute();
        $result = $sql->get_result();
        while ($row = $result->fetch_assoc()) {
            if ($row["ID"] == $_POST["ability"]) {
                break;
            }
        }
        
        $uhealthchange = $row["UHealth"];
        $ohealthchange = $row["OHealth"];
        
        $uhealth = $uhealth + $uhealthchange;
        $ohealth = $ohealth + $ohealthchange;
        
        $sql = $conn->prepare("UPDATE Games SET UserHealth=?,OpponentHealth=? WHERE ID=?;");
        $sql->bind_param("iii",$uhealth,$ohealth,$gameid);
        $sql->execute();
        
        if ($ohealth <= 0 or $uhealth <= 0) {
            $sql = $conn->prepare("UPDATE Users SET Health=? WHERE ID=?;");
            $sql->bind_param("ii",$uhealth,$userid);
            $sql->execute();
            
            $sql->bind_param("ii",$ohealth,$opponentid);
            $sql->execute();
            
            $sql = $conn->prepare("DELETE FROM Games WHERE ID=?;");
            $sql->bind_param("i",$gameid);
            $sql->execute();
            
            header("Location: index.php");
            exit;
        } else {
            $sql = $conn->prepare("UPDATE Games SET Turn=?,Timer=? WHERE ID=?;");
            $sql->bind_param("iii",$opponentid,$timer,$gameid);
            $timer = time();
            $sql->execute();
        }
    }
?>