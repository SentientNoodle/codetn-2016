<?php
    include("../php/sqlconnect.php");
    
    $gameid = $_POST["decline"];
    
    // Deletes the declined game
    $sql = $conn->prepare("DELETE FROM Games WHERE ID=?;");
    $sql->bind_param("i",$gameid);
    $sql->execute();
    $result = $sql->get_result();
?>