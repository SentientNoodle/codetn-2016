<?php
    include("../php/sqlconnect.php");
    
    // Get the number of user losses from database
    $sql = $conn->prepare("SELECT Losses FROM Users WHERE ID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $losses = $result["Losses"];
    
    echo $losses;
?>