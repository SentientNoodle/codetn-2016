<?php
    include("../php/sqlconnect.php");
    
    // Insert item and its properties into database
    $sql = $conn->prepare("INSERT INTO Market (ClassID, AbilityID, SellerID, Price) VALUES (?, ?, ?, ?);");
    $sql->bind_param("iiii", $classid, $abilityid, $sellerid, $price);
    $classid = $_GET["id"];
    $sellerid = $_SESSION["id"];
    $abilityid = $_POST["abilityid"];
    $price = $_POST["price"];
    $sql->execute();
?>