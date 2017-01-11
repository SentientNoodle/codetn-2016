<html>
    <head>
        
    </head>
    <body>
        <?php
            include("../php/sqlconnect.php");
            $sql = $conn->prepare("SELECT Abilities.ID,UHealth,OHealth FROM Abilities JOIN AbilitiesUsers ON AbilitiesUsers.AbilityID=Abilities.ID WHERE UserID=? AND Active=1;");
            $sql->bind_param("i",$userid);
            $userid = 13;
            $sql->execute();
            $result = $sql->get_result();
            while ($row = $result->fetch_assoc()) {
                if ($row["ID"] == 4) {
                    break;
                }
            }
            echo "<h1>".$row["ID"]."</h1>";
        ?>
    </body>
</html>