<?php
    include("../php/sqlconnect.php");
    
    // Select all the items a user has on the market from the database
    $sql = $conn->prepare("SELECT Price,FirstName,LastName,Name,Description FROM Market JOIN Users ON Users.ID=Market.SellerID JOIN Abilities ON Abilities.ID=Market.AbilityID WHERE ClassID=? AND SellerID=?;");
    $sql->bind_param("ii",$classid,$userid);
    $classid = $_GET["id"];
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    
    $items = "";
    while ($row = $result->fetch_assoc()) {
        $items .= '
            <div class="col-sm-4">
                <div class="panel panel-orange">
                    <div class="panel-heading">'.$row["Name"].'</div>
                    <div class="panel-body" style="height:100px;overflow-y:auto;">'.$row["Description"].'</div>
                    <div class="panel-footer">'.$row["Price"].'</div>
                </div>
            </div>
        ';
    }
    
    echo $items;
?>