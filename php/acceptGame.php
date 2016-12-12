<?php
    include("../php/sqlconnect.php");
    
    $sql = $conn->prepare("UPDATE Games SET OpponentReady=1 WHERE ID=?;");
    $sql->bind_param("i",$gameid);
    $gameid = $_POST["request"];
    $sql->execute();
    
    $sql = $conn->prepare("SELECT UserID,OpponentID FROM Games WHERE ID=?;");
    $sql->bind_param("i",$gameid);
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    
    $opponentid = $result["OpponentID"];
    
    $sql = $conn->prepare("SELECT Health FROM Users WHERE ID=?;");
    $sql->bind_param("i",$userid);
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $health = $result["Health"];
    
    $sql = $conn->prepare("UPDATE Games SET UserHealth=? WHERE ID=?;");
    $sql->bind_param("ii",$health,$gameid);
    $sql->execute();
    
    $sql = $conn->prepare("SELECT Health FROM Users WHERE ID=?;");
    $sql->bind_param("i",$opponentid);
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $health = $result["Health"];
    
    $sql = $conn->prepare("UPDATE Games SET OpponentHealth=? WHERE ID=?;");
    $sql->bind_param("ii",$health,$gameid);
    $sql->execute();
?>