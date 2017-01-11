<?php
    include("../php/sqlconnect.php");
    
    // Sets the question for the class based on what the teacher sets the question to
    $sql = $conn->prepare("UPDATE Classes SET Question=? WHERE ID=?");
    $sql->bind_param("ii",$qid,$classid);
    $qid = $_POST["question"];
    $classid = $_GET["id"];
    $sql->execute();
    
    // Makes everyone in the class not have answered the question
    $sql = $conn->prepare("UPDATE ClassesUsers SET Answered=0 WHERE ClassID=?;");
    $sql->bind_param("i",$classid);
    $sql->execute();
?>