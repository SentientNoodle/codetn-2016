<?php
    include("../php/sqlconnect.php");
    
    // Selects the user information from the database
    $sql = $conn->prepare("SELECT Users.ID,FirstName,LastName FROM Users JOIN ClassesUsers ON ClassesUsers.UserID=Users.ID WHERE ClassesUsers.ClassID = ? AND Users.ID != ?;");
    $sql->bind_param("ii",$classid,$userid);
    $classid = $_GET["id"];
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    
    $users = '';
    
    while ($row = $result->fetch_assoc()) {
        $users .= '
            <button type="submit" class="button request" name="user" value="'.$row["ID"].'"><span>'.$row["FirstName"].' '.$row["LastName"].'</span></button>
        ';
    }
    
    echo '
        <form action="findgame.php?id='.$_GET["id"].'" method="post">
            '.$users.'
        </form>
    ';
?>