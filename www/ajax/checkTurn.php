<?php
    session_start();
    include("../../php/sqlconnect.php");
    
    $sql = $conn->prepare("SELECT Turn,Timer,UserHealth,OpponentHealth,UserID,OpponentID FROM Games WHERE ID=?;");
    $sql->bind_param("i",$gameid);
    $gameid = $_SESSION["gameid"];
    $sql->execute();
    
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $turn = $result["Turn"];
    $timer = $result["Timer"];
    
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
    
    if ($timer - time() + 60 > 0) {
        if ($turn == $_SESSION["id"]) {
            echo "reload";
        } else {
            http_response_code(404);
        }
    } else {
        $sql = $conn->prepare("UPDATE Users SET Health=? WHERE ID=?;");
        $sql->bind_param("ii",$uhealth,$userid);
        $sql->execute();
        
        $sql = $conn->prepare("UPDATE Users SET Health=? WHERE ID=?;");
        $sql->bind_param("ii",$ohealth,$opponentid);
        $sql->execute();
        
        $sql = $conn->prepare("DELETE FROM Games WHERE ID=?;");
        $sql->bind_param("i",$gameid);
        $sql->execute();
        
        echo "redirect";
        exit();
    }
?>