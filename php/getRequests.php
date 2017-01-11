<?php
    include("../php/sqlconnect.php");
    
    // Gets requests
    $sql = $conn->prepare("SELECT Games.ID,FirstName,LastName FROM Games JOIN Users ON Users.ID=Games.UserID WHERE Games.OpponentID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    
    $requests = '';
    while ($row = $result->fetch_assoc()) {
        $requests .= '
        <div class="request-panel">
            <div class="panel panel-orange">
                <div class="panel-heading" style="height:60px;;">'.$row["FirstName"]." ".$row["LastName"].'</div>
                <div class="panel-footer">
                
                    <form action="findgame.php?id='.$_GET["id"].'" method="post">
                        <input type="hidden" name="accept" value="'.$row["ID"].'">
                        <input type="submit" class="request-accept" value="ACCEPT">
                    </form>
                    <br>
                    <form action="findgame.php?id='.$_GET["id"].'" method="post">
                        <input type="hidden" name="decline" value="'.$row["ID"].'">
                        <input type="submit" class="request-decline" value="DECLINE">
                    </form>
                </div>
            </div>
        </div>
        ';
    }
    
    echo $requests;
?>