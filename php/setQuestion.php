<?php
    include("../php/sqlconnect.php");
    
    $sql = $conn->prepare("UPDATE Classes SET Question=? WHERE ID=?");
    $sql->bind_param("ii",$qid,$classid);
    $qid = $_POST["question"];
    $classid = $_GET["id"];
    $sql->execute();
    
    $sql = $conn->prepare("UPDATE ClassesUsers SET Answered=0 WHERE ClassID=?;");
    $sql->bind_param("i",$classid);
    $sql->execute();
?>