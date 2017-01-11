<?php
    include("../php/sqlconnect.php");
    
    // Get username
    $sql = $conn->prepare("SELECT Firstname,Lastname FROM Users WHERE ID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $username = $result["Firstname"]." ".$result["Lastname"];
    
    echo $username;
?>