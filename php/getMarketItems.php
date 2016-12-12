<?php
    include("../php/sqlconnect.php");
    
    //Retrieves data from Market table 
    $sql = $conn->prepare("SELECT Market.ID,Price,FirstName,LastName,Name,Description FROM Market JOIN Users ON Users.ID=Market.SellerID JOIN Abilities ON Abilities.ID=Market.AbilityID WHERE ClassID=? AND SellerID!=?;");
    $sql->bind_param("ii",$classid,$userid);
    $classid = $_GET["id"];
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    
    //Formatting to display items
    $items = "";
    while ($row = $result->fetch_assoc()) {
        $items .= '
            <div class="marketentry">
                <h2>'.$row["Name"]." - ".$row["Price"].'</h2>
                <h3>'.$row["FirstName"]." ".$row["LastName"].'</h3>
                <p>'.$row["Description"].'</p>
                <form action="market.php?id='.$_GET["id"].'" method="post">
                    <input type="hidden" name="itemid" value="'.$row["ID"].'">
                    <input type="submit" value="BUY"> 
                </form>
            </div>
        ';
    }
    
    //Displaying of said formatting of said items
    echo $items;
?>