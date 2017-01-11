<?php
    include("../php/sqlconnect.php");
    
    // Get the user's current shirt set in the database
    $sql = $conn->prepare("SELECT Shirt FROM Users WHERE ID=?;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $userShirtNumber = $result["Shirt"];
    
    // Show that shirt on the inventory page
    echo '<img src="media/skins/'.$userShirtNumber.'.png" class="activeShirt">';
?>