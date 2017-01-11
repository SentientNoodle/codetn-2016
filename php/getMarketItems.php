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
            <div class="col-sm-4">
                <div class="panel panel-orange">
                    <div class="panel-heading">'.$row["Name"].'</div>
                    <div class="panel-body" style="height:100px;overflow-y:auto;">'.$row["Description"].'</div>
                    <div class="panel-footer">'.$row["FirstName"]." ".$row["LastName"].'<br>'.$row["Price"].'<br> 
                        <form action="market.php?id='.$_GET["id"].'" method="post">
                            <input type="hidden" name="itemid" value="'.$row["ID"].'">
                            <input type="submit" value="BUY"> 
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
    
    //Displaying of said formatting of said items
    echo $items;
?>