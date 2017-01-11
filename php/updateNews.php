<?php
    include("../php/sqlconnect.php");
    
    // Updates the news based on what the news is set to in the database
    $sql = $conn->prepare("UPDATE Classes SET News=? WHERE ID=?");
    $sql->bind_param("si", $news, $classid);
    $news = $_POST["news"];
    $classid = $_GET["id"];
    $sql->execute();
?>