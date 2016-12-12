<?php
    include("../php/sqlconnect.php");
    
    $sql = $conn->prepare("SELECT Price,FirstName,LastName,Name,Description FROM Market JOIN Users ON Users.ID=Market.SellerID JOIN Abilities ON Abilities.ID=Market.AbilityID WHERE ClassID=? AND SellerID=?;");
    $sql->bind_param("ii",$classid,$userid);
    $classid = $_GET["id"];
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    
    $items = "";
    while ($row = $result->fetch_assoc()) {
        $items .= '
            <div class="marketentry">
                <h2>'.$row["Name"]." - ".$row["Price"].'</h2>
                <h3>'.$row["FirstName"]." ".$row["LastName"].'</h3>
                <p>'.$row["Description"].'</p>
            </div>
        ';
    }
    
    echo $items;
?>