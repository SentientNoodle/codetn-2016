<?php
    // Called from page in www folder
    include("../php/sqlconnect.php");
    
    $sql = $conn->prepare("SELECT Password FROM Users WHERE ID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $password = $result["Password"];
    
    // Encrypts and sets new password, writing over the old one in the database
    if (password_verify($_POST["nowpassword"], $password)) {
        $sql = $conn->prepare("UPDATE Users SET Password=? WHERE ID=?;");
        $sql->bind_param("si",$newpassword,$userid);
        $newpassword = password_hash($_POST["newpassword"], PASSWORD_BCRYPT, ["cost" => 10]);
        $sql->execute();
        header("Location: index.php");
    } else {
        $incorrect = true;
    }
?>