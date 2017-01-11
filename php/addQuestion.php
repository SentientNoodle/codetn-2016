<?php
    // Create questions and stores questions in the database

    include("../php/sqlconnect.php");
    
    $sql = $conn->prepare("SELECT Subject FROM Classes WHERE ID=?;");
    $sql->bind_param("i",$classid);
    $classid = $_GET["id"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $subject = $result["Subject"];
    
    // Adds newly created questions into the questions table of the database 
    $sql = $conn->prepare("INSERT INTO Questions (Question,Subject,Answer,Choices) VALUES (?,?,?,?);");
    $sql->bind_param("ssss",$question,$subject,$answer,$choices);
    $question = htmlspecialchars($_POST["dqcustomquestion"]);
    
    // Highlights correct answers green
    if (!empty($_POST["dqcustomanswer"])) {
        foreach($_POST["dqcustomanswer"] as $answerSequence) {
            $answer .= $answerSequence;
        }
    }
    
    // The choices are stored in the database comma delimited.
    // Here we're escaping any commas or special characters that would other mess up the processing
    $choices = htmlspecialchars(str_replace(',','&#44;',$_POST["0"])).','.htmlspecialchars(str_replace(',','&#44;',$_POST["1"])).','.htmlspecialchars(str_replace(',','&#44;',$_POST["2"])).','.htmlspecialchars(str_replace(',','&#44;',$_POST["3"]));
    $sql->execute();
    
    $_POST["question"] = $conn->insert_id;
    include("../php/setQuestion.php");
?>