<?php
    include("../php/sqlconnect.php");
    
    // Insert item and its properties into database
    $sql = $conn->prepare("INSERT INTO Market (ClassID, AbilityID, SellerID, Price) VALUES (?, ?, ?, ?);");
    $sql->bind_param("iiii", $classid, $abilityid, $sellerid, $price);
    $classid = $_GET["id"];
    $abilityid = intval($_POST["abilityid"]);
    $sellerid = $_SESSION["id"];
    $price = $_POST["price"];
    $sql->execute();
    
    $sql = $conn->prepare("UPDATE AbilitiesUsers SET OnMarket=1 WHERE UserID=? AND AbilityID=?;");
    $sql->bind_param("ii",$userid,$abilityid);
    $userid = $_SESSION["id"];
    $sql->execute();
?>