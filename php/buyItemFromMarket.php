<?php
    include ("../php/sqlconnect.php");

    // Retreives user's abililities from database
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
    
    // See if the buyer can afford the market item and the user is not buying his or her own item
    if ($buyerCurrency >= $price and $sellerid != $userid) {
        
        // Select the seller's currency
        $sql = $conn->prepare("SELECT Currency FROM Users WHERE ID=?;");
        $sql->bind_param("i",$sellerid);
        $sql->execute();
        $result = $sql->get_result();
        $result = $result->fetch_assoc();
        $sellerCurrency = $result["Currency"];
        
        // Checks the database to see if the buyer already has the item
        $sql = $conn->prepare("SELECT ID FROM AbilitiesUsers WHERE UserID=? AND AbilityID=?;");
        $sql->bind_param("ii",$userid,$abilityid);
        $sql->execute();
        $sql->store_result();
        $rows = $sql->num_rows;
        
        if ($rows == 0) {
            // Insert item into user's inventory
            $sql = $conn->prepare("INSERT INTO AbilitiesUsers(UserID,AbilityID,Supply,Active,OnMarket) VALUES(?,?,?,?,?);");
            $sql->bind_param("iiiii",$userid, $abilityid, $supply, $active, $onMarket);
            $supply = 1;
            $active = 0;
            $onMarket = 0;
            $sql->execute();
        } else {
            // Insert item into user's inventory (by adding to the supply of it)
            $sql = $conn->prepare("SELECT Supply FROM AbilitiesUsers WHERE UserID=? AND AbilityID=?;");
            $sql->bind_param("ii",$userid, $abilityid);
            $sql->execute();
            $result = $sql->get_result();
            $result = $result->fetch_assoc();
            $newBuyerAbilitySupply = $result["Supply"] + 1;
            
            // Update user's supply
            $sql = $conn->prepare("UPDATE AbilitiesUsers SET Supply=? WHERE UserID=? AND AbilityID=?;");
            $sql->bind_param("iii",$newBuyerAbilitySupply, $userid, $abilityid);
            $sql->execute();
        }
        
        // Update buyer currency
        $newBuyerCurrency = $buyerCurrency - $price;
        $sql = $conn->prepare("UPDATE Users SET Currency=? WHERE ID=?;");
        $sql->bind_param("ii",$newBuyerCurrency, $userid);
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
        
        // Get supply
        $sql = $conn->prepare("SELECT Supply FROM AbilitiesUsers WHERE UserID=? AND AbilityID=?;");
        $sql->bind_param("ii",$sellerid,$abilityid);
        $sql->execute();
        $result = $sql->get_result();
        $result = $result->fetch_assoc();
        $sellerAbilitySupply = $result["Supply"];
        
        // Delete item from seller if it is his or her last of that item
        if ($sellerAbilitySupply == 1) {
            // Delete item from seller
            $sql = $conn->prepare("DELETE FROM AbilitiesUsers WHERE UserID=? AND AbilityID=?;");
            $sql->bind_param("ii", $sellerid, $abilityid);
            $sql->execute();
        }
    }
?>