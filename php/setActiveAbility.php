<?php
    include("../php/sqlconnect.php");
    
    // Sets the selected ability active in the database if 4 abilities have not been set active
    $sql = $conn->prepare("SELECT ID FROM AbilitiesUsers WHERE UserID=? AND Active=1;");
    $sql->bind_param("i",$userid);
    $userid = $_SESSION["id"];
    $sql->execute();
    $sql->store_result();
    if ($sql->num_rows < 4) {
        $sql = $conn->prepare("UPDATE AbilitiesUsers SET Active=1 WHERE UserID=? AND AbilityID=? AND OnMarket=0;");
        $sql->bind_param("ii",$userid,$abilityid);
        $abilityid = $_POST["abilityid"];
        $sql->execute();
    }
?>