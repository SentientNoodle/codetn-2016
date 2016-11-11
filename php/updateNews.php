<?php
    include("../php/sqlconnect.php");
    
    $sql = $conn->prepare("UPDATE Classes SET News=? WHERE ID=?");
    $sql->bind_param("si", $news, $classid);
    $news = $_POST["news"];
    $classid = $_GET["id"];
    $sql->execute();
?>