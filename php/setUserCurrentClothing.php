<?php
    include("../php/sqlconnect.php");
    
    // Set the user's current clothing based off the piece of clothing the user chose
    $sql = $conn->prepare("UPDATE Users SET Shirt=? WHERE ID=?;");
    $sql->bind_param("ii",$shirtid, $userid);
    $shirtid = $_POST["shirtID"];
    $userid = $_SESSION["id"];
    $sql->execute();
?>