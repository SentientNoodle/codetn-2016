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
        // Alert user that that student id already exists
        header("Location: signup.php?exists=1");
        exit();
    } else {
        // Add user to database
        $sql = $conn->prepare("INSERT INTO Users (SID,Firstname,Lastname,Password,isTeacher,Currency) VALUES (?,?,?,?,?,?);");
        $sql->bind_param("ssssii",$sid,$firstname,$lastname,$password,$isteacher,$currency);
        if ($isteacher == 1) {
            $currency = 0;
        } else {
            $currency = 1500;
        }
        $sql->execute();
        
        $sql = $conn->prepare("SELECT ID FROM Users WHERE SID=?;");
        $sql->bind_param("s",$sid);
        $sql->execute();
        $result = $sql->get_result();
        $result = $result->fetch_assoc();
        $userid = $result["ID"];
        
        // Set session variables so we don't have to pull from the database too often
        $_SESSION["id"] = $userid;
        $_SESSION["sid"] = $sid;
        $_SESSION["isTeacher"] = $isteacher;
        $_SESSION["firstname"] = $firstname;
        $_SESSION["lastname"] = $lastname;
        
        // Gives the new user a free ability to start their adventure
        $sql = $conn->prepare("INSERT INTO AbilitiesUsers (UserID,AbilityID,Supply,Active,OnMarket) VALUES (?,?,?,?,?);");
        $sql->bind_param("iiiii", $userid, $AbilityID, $Supply, $Active, $OnMarket);
        $AbilityID = 2;
        $Supply = 1;
        $Active = 1;
        $OnMarket = 0; 
        $sql->execute();
    }   
    
    $conn->close();
?>