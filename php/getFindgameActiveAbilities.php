<?php
    include("../php/sqlconnect.php");
    
    // Get active abilities to display on findgame.php
    $sql = $conn->prepare("SELECT Abilities.ID,Supply,Active,Name,Description FROM Abilities JOIN AbilitiesUsers ON Abilities.ID=AbilitiesUsers.AbilityID WHERE AbilitiesUsers.UserID=? AND Active=1;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    
    $abilities = "";
    while ($row = $result->fetch_assoc()) {
        $abilities .= '
            <div class="findgame-active-ability">
                <div class="panel panel-orange">
                    <div class="panel-heading" style="height:60px;">'.$row["Name"].'</div>
                    <div class="panel-body" style="height:100px;overflow-y:auto;">'.$row["Description"].'</div>
                    <div class="panel-footer">
                        <form action="findgame.php?id='.$_GET["id"].'" method="post">
                            <input type="hidden" name="activeabilityid" value="'.$row["ID"].'">
                            <input type="submit" value="REMOVE">
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
    
    echo $abilities;
?>