<?php
    include("../php/sqlconnect.php");
    
    // Get abilities to display on inventory.php
    $sql = $conn->prepare("SELECT Abilities.ID,Supply,Active,Name,Description FROM Abilities JOIN AbilitiesUsers ON Abilities.ID=AbilitiesUsers.AbilityID WHERE AbilitiesUsers.UserID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    
    $abilities = "";
    while ($row = $result->fetch_assoc()) {
        $abilities .= '
            <div class="col-sm-4">
                <div class="panel panel-orange">
                    <div class="panel-heading">'.$row["Name"].'</div>
                    <div class="panel-body" style="height:100px;overflow-y:auto;color:black;">'.$row["Description"].'</div>
                    <div class="panel-footer" style="color:black;" >'.$row["Supply"].'<br> 
                    </div>
                </div>
            </div>
        ';
    }
    
    echo $abilities;
?>