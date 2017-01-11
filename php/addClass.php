<?php
    include("../php/sqlconnect.php");
    
    // Set the class name and subject based on what the teacher inputed
    $className = $_POST["className"];
    $subject = $_POST["subjectCustom"].$_POST["subjectSelect"];
    
    // Insert class and its properties into database
    $sql = $conn->prepare("INSERT INTO Classes (Name,Teacher,Subject) VALUES (?,?,?);");
    $sql->bind_param("sis", $className, $teacherid, $subject);
    $teacherid = $_SESSION["id"];
    $sql->execute();
    
    // Generates class code and puts it in the database
    $id = $sql->insert_id;
    $code = substr(md5($id),0,6);
    
    // Sets the class code in the database
    $sql = $conn->prepare("UPDATE Classes SET Code=? WHERE ID=?;");
    $sql->bind_param("si",$code,$id);
    $sql->execute();
    
    header("Location: class.php?id=".$id);
?>