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
    
    // Disables any active items that are being sold
    $sql = $conn->prepare("UPDATE AbilitiesUsers SET Active=0 WHERE UserID=? AND AbilityID=?;");
    $sql->bind_param("ii",$sellerid,$abilityid);
    $sql->execute();
    
    // Get supply
    $sql = $conn->prepare("SELECT Supply FROM AbilitiesUsers WHERE UserID=? AND AbilityID=?;");
    $sql->bind_param("ii",$sellerid,$abilityid);
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $sellerAbilitySupply = $result["Supply"];
        
    // Delete item from seller if it is their last of that item
    if ($sellerAbilitySupply == 1) {
        // Do not show item as available to sell if the seller only had 1 of the item left
        $sql = $conn->prepare("UPDATE AbilitiesUsers SET OnMarket=1 WHERE UserID=? AND AbilityID=?;");
        $sql->bind_param("ii",$sellerid,$abilityid);
        $sql->execute();
    } else {
        // Remove one item from user's inventory
        $sql = $conn->prepare("SELECT Supply FROM AbilitiesUsers WHERE UserID=? AND AbilityID=?;");
        $sql->bind_param("ii",$sellerid, $abilityid);
        $sql->execute();
        $result = $sql->get_result();
        $result = $result->fetch_assoc();
        $sellerAbilitySupply = $result["Supply"] - 1;
        
        // Update seller's supply
        $sql = $conn->prepare("UPDATE AbilitiesUsers SET Supply=? WHERE UserID=? AND AbilityID=?;");
        $sql->bind_param("iii",$sellerAbilitySupply,$sellerid,$abilityid);
        $sql->execute();
    }
?>