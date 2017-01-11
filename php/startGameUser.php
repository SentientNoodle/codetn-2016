<?php
    include("../../php/sqlconnect.php");
    
    // Get opponent id
    $sql = $conn->prepare("SELECT OpponentID FROM Games WHERE ID=? LIMIT 1;");
    $sql->bind_param("i",$gameid);
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    
    $opponentid = $result["OpponentID"];
    
    // Set user as ready
    $sql = $conn->prepare("UPDATE Games SET UserReady=1,Turn=?,Timer=? WHERE ID=?;");
    $sql->bind_param("iii",$userid,$timer,$gameid);
    $userid = $_SESSION["id"];
    $timer = time();
    $sql->execute();
    
    $_SESSION["gameid"] = $gameid;
?>