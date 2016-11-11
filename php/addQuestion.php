<?php
    include("../php/sqlconnect.php");
    
    $sql = $conn->prepare("SELECT Subject FROM Classes WHERE ID=?;");
    $sql->bind_param("i",$classid);
    $classid = $_GET["id"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $subject = $result["Subject"];
    
    $sql = $conn->prepare("INSERT INTO Questions (Question,Subject,Answer,Choices) VALUES (?,?,?,?);");
    $sql->bind_param("ssss",$question,$subject,$answer,$choices);
    $question = htmlspecialchars($_POST["dqcustomquestion"]);
    $answer = htmlspecialchars($_POST["dqcustomanswer"]);
    $choices = htmlspecialchars(str_replace(',','&#44;',$_POST["0"])).','.htmlspecialchars(str_replace(',','&#44;',$_POST["1"])).','.htmlspecialchars(str_replace(',','&#44;',$_POST["2"])).','.htmlspecialchars(str_replace(',','&#44;',$_POST["3"]));
    $sql->execute();
    
    $_POST["question"] = $conn->insert_id;
    include("../php/setQuestion.php");
?>