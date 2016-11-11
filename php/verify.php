<?php
    include("../php/sqlconnect.php");
    
    $sql = $conn->prepare("SELECT Password,Firstname,Lastname,ID,isTeacher FROM Users WHERE SID=?;");
    $sql->bind_param("s",$sid);
    
    $sid = $_POST["sid"];
    
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    
    $password = $result["Password"];
    $firstname = $result["Firstname"];
    $lastname = $result["Lastname"];
    $id = $result["ID"];
    $isteacher = $result["isTeacher"];
    
    $conn->close();
    
    if (password_verify($_POST["password"], $password) == 1) {
        // Set session variables to keep user logged in and so we don't need to pull from the db so often
        $_SESSION["id"] = $id;
        $_SESSION["sid"] = $sid;
        $_SESSION["isTeacher"] = $isteacher;
        $_SESSION["firstname"] = $firstname;
        $_SESSION["lastname"] = $lastname;
        
        $incorrect = false;
    } else {
        $incorrect = true;
    }
?>