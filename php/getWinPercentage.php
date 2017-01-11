<?php
    include("../php/sqlconnect.php");
    
    // Get the number of user wins and losses from database
    $sql = $conn->prepare("SELECT Wins,Losses FROM Users WHERE ID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $wins = $result["Wins"];
    $losses = $result["Losses"];
    
    // Calculate the win percentage based off the number of user wins and losses
    if ($wins + $losses == 0) {
        $winLossPercentage = 0;
    } else {
        $winLossPercentage = floatval($wins) / ($wins + $losses);
    }
    
    echo round($winLossPercentage*100, 2);
?>