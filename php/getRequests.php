<?php
    include("../php/sqlconnect.php");
    
    $sql = $conn->prepare("SELECT Games.ID,FirstName,LastName FROM Games JOIN Users ON Users.ID=Games.UserID WHERE Games.OpponentID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    //Code to request a match for a user
    $requests = '';
    while ($row = $result->fetch_assoc()) {
        $requests .= '
            <button type="submit" class="request" name="request" value="'.$row["ID"].'"><span>'.$row["FirstName"].' '.$row["LastName"].'</span></button>
        ';
    }
    
    echo '
        <form action="findgame.php?id='.$_GET["id"].'" method="post">
            '.$requests.'
        </form>
    ';
?>