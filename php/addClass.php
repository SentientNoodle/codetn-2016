<?php
    include("../php/sqlconnect.php");
    
    $className = $_POST["className"];
    $subject = $_POST["subject"];
    
    // Insert class and its properties into database
    $sql = $conn->prepare("INSERT INTO Classes (Name,Teacher,Subject) VALUES (?,?,?);");
    $sql->bind_param("sis", $className, $teacherid, $subject);
    $teacherid = $_SESSION["id"];
    $sql->execute();
    
    $id = $sql->insert_id;
    $code = substr(md5($id),0,6);
    
    $sql = $conn->prepare("UPDATE Classes SET Code=? WHERE ID=?;");
    $sql->bind_param("si",$code,$id);
    $sql->execute();
    
    header("Location: class.php?id=".$id);
?>