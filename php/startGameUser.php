<?php
    include("../../php/sqlconnect.php");
    
    $sql = $conn->prepare("SELECT OpponentID FROM Games WHERE ID=? LIMIT 1;");
    $sql->bind_param("i",$gameid);
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    
    $opponentid = $result["OpponentID"];
    
    $sql = $conn->prepare("UPDATE Games SET UserReady=1 WHERE ID=?;");
    $sql->bind_param("i",$gameid);
    $sql->execute();
    
    $_SESSION["gameid"] = $gameid;
?>