<?php
    include("../php/sqlconnect.php");
    
    // Selects and displays the user's currency from database
    $sql = $conn->prepare("SELECT Currency FROM Users WHERE ID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    
    echo $result["Currency"];
?>