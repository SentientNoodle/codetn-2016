<?php
    include ("../php/sqlconnect.php");

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
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $buyerCurrency = $result["Currency"];
    
    if ($buyerCurrency >= $price or $sellerid == $userid) {
        // Select the seller's currency
        $sql = $conn->prepare("SELECT Currency FROM Users WHERE ID=?;");
        $sql->bind_param("i",$sellerid);
        $sql->execute();
        $result = $sql->get_result();
        $result = $result->fetch_assoc();
        $sellerCurrency = $result["Currency"];
    
        // Insert item into user's inventory
        $sql = $conn->prepare("INSERT INTO AbilitiesUsers(UserID,AbilityID,Supply,Active) VALUES(?,?,?,?);");
        $sql->bind_param("iiii",$userid, $abilityid, $supply, $active);
        $supply = 20;
        $active = 0;
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