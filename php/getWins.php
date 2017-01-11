<?php
    include("../php/sqlconnect.php");
    
    // Get the number of user wins from database
    $sql = $conn->prepare("SELECT Wins FROM Users WHERE ID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $wins = $result["Wins"];
    
    echo $wins;
?>