<?php
    include("../php/sqlconnect.php");

    // Deactivates the selected ability in the database
    $sql = $conn->prepare("UPDATE AbilitiesUsers SET Active=0 WHERE UserID=? AND AbilityID=?;");
    $sql->bind_param("ii",$userid,$abilityid);
    $userid = $_SESSION["id"];
    $abilityid = $_POST["activeabilityid"];
    $sql->execute();
?>