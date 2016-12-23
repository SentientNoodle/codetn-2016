<?php
    include ("../php/sqlconnect.php");

    // Retreives User's Abililities
    $sql = $conn->prepare("SELECT AbilityID FROM AbilitiesUsers WHERE UserID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    $buyerOwnedAbilitiesIndex = 0;
    while ($row = $result->fetch_assoc()) {
        $buyerOwnedAbilities[$buyerOwnedAbilitiesIndex] = $row["AbilityID"];
        $buyerOwnedAbilitiesIndex++;
    }
    
    // Make array not null
    if (empty($buyerOwnedAbilities)) {
        $buyerOwnedAbilities[0] = -1;
    }

    // Select the seller and ability ids
    $sql = $conn->prepare("SELECT SellerID,AbilityID,Price FROM Market WHERE ID=?;");
    $sql->bind_param("i",$itemid);
    $itemid = $_POST["itemid"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $sellerid = $result["SellerID"];
    $abilityid = $result["AbilityID"];
    $price = $result["Price"];
    
    // Select the buyer's currency
    $sql = $conn->prepare("SELECT Currency FROM Users WHERE ID=?;");
    $sql->bind_param("i",$userid);
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $buyerCurrency = $result["Currency"];
    
    if ($buyerCurrency >= $price and $sellerid != $userid and !(in_array($abilityid, $buyerOwnedAbilities))) {
        
        // Select the seller's currency
        $sql = $conn->prepare("SELECT Currency FROM Users WHERE ID=?;");
        $sql->bind_param("i",$sellerid);
        $sql->execute();
        $result = $sql->get_result();
        $result = $result->fetch_assoc();
        $sellerCurrency = $result["Currency"];
    
        // Insert item into user's inventory
        $sql = $conn->prepare("INSERT INTO AbilitiesUsers(UserID,AbilityID,Supply,Active,OnMarket) VALUES(?,?,?,?,?);");
        $sql->bind_param("iiiii",$userid, $abilityid, $supply, $active,$onMarket);
        $supply = 20;
        $active = 0;
        $onMarket = 0;
        $sql->execute();
        
        // Update buyer currency
        $newBuyerCurrency = $buyerCurrency - $price;
        $sql = $conn->prepare("UPDATE Users SET Currency=? WHERE ID=?;");
        $sql->bind_param("ii",$newBuyerCurrency,$userid);
        $sql->execute();
        
        // Update seller currency
        $newSellerCurrency = $sellerCurrency + $price;
        $sql = $conn->prepare("UPDATE Users SET Currency=? WHERE ID=?;");
        $sql->bind_param("ii",$newSellerCurrency,$sellerid);
        $sql->execute();

        // Delete item from market
        $sql = $conn->prepare("DELETE FROM Market WHERE ID=?;");
        $sql->bind_param("i",$itemid);
        $sql->execute();
    
        // Delete item from seller
        $sql = $conn->prepare("DELETE FROM AbilitiesUsers WHERE UserID=? AND AbilityID=?;");
        $sql->bind_param("ii", $sellerid, $abilityid);
        $sql->execute();
    }
?>