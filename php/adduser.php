<?php
    // Connect to database
    include("../php/sqlconnect.php");
    
    $sid = $_POST["sid"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $isteacher = $_POST["isteacher"];
    
    // Never store plaintext passwords
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT, ["cost" => 10]);

    // Protect against sql injection by using prepared statements
    // Check if account with same student id already exists
    $sql = $conn->prepare("SELECT ID FROM Users WHERE SID=?");
    $sql->bind_param("s",$sid);
    $sql->execute();
    
    $result = $sql->get_result();
    if ($result->num_rows > 0) {
        $conn->close();
        header("Location: signup.php?exists=1");
        exit;
    } else {
        $sql = $conn->prepare("INSERT INTO Users (SID,Firstname,Lastname,Password,isTeacher,Currency) VALUES (?,?,?,?,?,?);");
        $sql->bind_param("ssssii",$sid,$firstname,$lastname,$password,$isteacher,$currency);
        if ($isteacher == 1) {
            $currency = 0;
        } else {
            $currency = 1500;
        }
        $sql->execute();
    }   
    
    // It's good practice to close the connection when done
    $conn->close();
?>