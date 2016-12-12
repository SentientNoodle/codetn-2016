<?php
    include("../php/sqlconnect.php");
    
    //Base code to get data from phpMyAdmin
    $sql = $conn->prepare("SELECT Answered FROM ClassesUsers WHERE UserID=? AND ClassID=?;");
    $sql->bind_param("ii",$userid,$classid);
    $userid = $_SESSION["id"];
    $classid = $_GET["id"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $answered = $result["Answered"];
    
    $sql = $conn->prepare("SELECT Currency FROM Users WHERE ID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $currency = $result["Currency"];
    
    if ($answered == 0) {
        
        //Code if user has not answered the question since the last reset
        $sql = $conn->prepare("UPDATE ClassesUsers SET Answered=1 WHERE UserID=?;");
        $sql->bind_param("i",$userid);
        $sql->execute();
        
        $sql = $conn->prepare("SELECT Questions.Answer FROM Questions JOIN Classes ON Questions.ID=Classes.Question WHERE Classes.ID=?;");
        $sql->bind_param("i", $classid);
        $sql->execute();
        $result = $sql->get_result();
        $result = $result->fetch_assoc();
        $answer =  $result["Answer"];
        
        if(gettype($_POST["dqanswer"]) != "string") {
            foreach ($_POST["dqanswer"] as $userAnswerSequence) {
                $userAnswers .= $userAnswerSequence;
            }
        } else {
            $userAnswers = $_POST["dqanswer"];
        }
        
        if ($answer === $userAnswers) {
        
            //Code to reward the user with currecny for correctly answering the question
            $newCurrency = $currency + 5;
            $sql = $conn->prepare("UPDATE Users SET Currency=? WHERE ID=?;");
            $sql->bind_param("ii", $newCurrency, $userid);
            $sql->execute();
            $qOutput = 'Correct!<br>You got 5 stuff!';
        } else {
        
            //Punish user with demotivational comments for failing to complete a basic task
            $qOutput = 'Incorrect!<br>You\'re a bad person!';
        }
    } else {
    
        //Keep user from repetitively answering questions
        $qOutput = 'You already answered this question!';
    }
?>