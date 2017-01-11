<?php
    session_start();
    include("../../php/sqlconnect.php");
    
    // Get turn and timer
    $sql = $conn->prepare("SELECT Turn,Timer,UserHealth,OpponentHealth,UserID,OpponentID FROM Games WHERE ID=?;");
    $sql->bind_param("i",$gameid);
    $gameid = $_SESSION["gameid"];
    $sql->execute();
    
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $turn = $result["Turn"];
    $timer = $result["Timer"];
    
    // Check if user is gameuser or gameopponent
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
    
    // Check if time ran out
    if ($timer - time() + 60 > 0) {
        // Check turn
        if ($turn == $_SESSION["id"] or $turn == null) {
            echo "reload";
        } else {
            http_response_code(404);
        }
    } else {
        // End game
        $sql = $conn->prepare("UPDATE Users SET Health=100 WHERE ID=?;");
        $sql->bind_param("i",$userid);
        $sql->execute();
        
        $sql = $conn->prepare("UPDATE Users SET Health=100 WHERE ID=?;");
        $sql->bind_param("i",$opponentid);
        $sql->execute();
        
        $sql = $conn->prepare("DELETE FROM Games WHERE ID=?;");
        $sql->bind_param("i",$gameid);
        $sql->execute();
        
        echo "redirect";
        exit();
    }
?>