<?php
    include("../php/sqlconnect.php");
    
    if ($_SESSION["isTeacher"] == 0) {
        $sql = $conn->prepare("SELECT Classes.News FROM Classes JOIN ClassesUsers ON Classes.ID=ClassesUsers.ClassID WHERE ClassesUsers.UserID=? AND ClassesUsers.ClassID=?");
        $sql->bind_param("ii", $userid, $classid);
        $userid = $_SESSION["id"];
        $classid = $_GET["id"];
    } else {
        $sql = $conn->prepare("SELECT News FROM Classes WHERE Teacher=?");
        $sql->bind_param("i", $userid);
        $userid = $_SESSION["id"];
    }
    
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    
    if ($_SESSION["isTeacher"] == 0) {
        echo '<pre>'.$result["News"].'</pre>';
    } else {
        echo '
            <form action="class.php?id='.$_GET["id"].'" method="post">
                <textarea cols="100%" rows="5" name="news">'.htmlspecialchars($result["News"]).'</textarea>
                <br>
                <br>
                <input type="submit" value="Update">
            </form>
        ';
    }
?>
