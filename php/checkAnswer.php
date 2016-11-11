<?php
    include("../php/sqlconnect.php");

    $sql = $conn->prepare("SELECT Answered FROM ClassesUsers WHERE UserID=? AND ClassID=?;");
    $sql->bind_param("ii",$userid,$classid);
    $userid = $_SESSION["id"];
    $classid = $_GET["id"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    
    $sql = $conn->prepare("SELECT Currency FROM Users WHERE ID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $currency = $result["Currency"];
    
    if ($result["Answered"] == 0) {
        $sql = $conn->prepare("UPDATE ClassesUsers SET Answered=1 WHERE UserID=? AND ClassID=?;");
        $sql->bind_param("ii", $userid, $classid);
        $sql->execute();
        
        if ($_POST["dqanswer"] == $_SESSION["q-answer"]) {
            // Give them stuff
            $newCurrency = $currency + 5;
            $sql = $conn->prepare("UPDATE Users SET Currency=? WHERE ID=?;");
            $sql->bind_param("ii", $newCurrency, $userid);
            $sql->execute();
            $qOutput = 'Correct!<br>You got 5 stuff!';
        } else {
            $qOutput = 'Incorrect!<br>You\'re a bad person!';
        }
    } else {
        $qOutput = 'You already answered this question!';
    }
?>