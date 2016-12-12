<?php
    session_start();
    include("../../php/sqlconnect.php");
    
    $sql = $conn->prepare("SELECT ID FROM Games WHERE UserID=? AND OpponentReady=1 LIMIT 1;");
    $userid = $_SESSION["id"];
    $sql->bind_param("i",$userid);
    $sql->execute();
    $rows = $sql;
    $rows->store_result();
    $rows = $rows->num_rows;
    if ($rows > 0) {
        $sql->bind_result($ids);
        $sql->fetch();
        $gameid = $ids;
        include("../../php/startGameUser.php");
        http_response_code(200);
    } else {
        $sql = $conn->prepare("SELECT ID FROM Games WHERE OpponentID=? AND UserReady=1 LIMIT 1;");
        $sql->bind_param("i",$userid);
        $sql->execute();
        $rows = $sql;
        $rows->store_result();
        $rows = $rows->num_rows;
        if ($rows > 0) {
            $sql->bind_result($ids);
            $sql->fetch();
            $gameid = $ids;
            include("../../php/startGameOpponent.php");
            http_response_code(200);
        } else {
            http_response_code(404);
        }
    }
?>