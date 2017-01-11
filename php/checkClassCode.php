<?php
    include("../php/sqlconnect.php");
    
    $code = $_POST["classCode"];
    
    // Checks if code exists
    $sql = $conn->prepare("SELECT ID FROM Classes WHERE Code=?;");
    $sql->bind_param("s", $code);
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $classid = $result["ID"];
    
    $sql = $conn->prepare("SELECT ID FROM Classes WHERE Code=?;");
    $sql->bind_param("s",$code);
    $sql->execute();
    $sql->store_result();
    $rows = $sql->num_rows;
    
    // If code exists, adds User to class in the database
    if ($rows > 0) {
        $sql = $conn->prepare("INSERT INTO ClassesUsers (Answered,UserID,ClassID) VALUES (?,?,?);");
        $sql->bind_param("iii", $answered, $userid, $classid);
        $answered = 0;
        $userid = $_SESSION["id"];
        $sql->execute();
        
        header("Location: class.php?id=".$classid);
        exit;
    } else {
        // Alert user
        $codeerror = "There's no class with this code!";
    }
?>