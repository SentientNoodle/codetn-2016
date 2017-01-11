<?php
    include("../php/sqlconnect.php");
    
    // Add game to database
    $sql = $conn->prepare("INSERT INTO Games (UserID,OpponentID) VALUES (?,?);");
    $sql->bind_param("ii",$userid,$opponentid);
    $userid = $_SESSION["id"];
    $opponentid = $_POST["user"];
    $sql->execute();
?>