<?php
    session_start();
    $userid = $_SESSION["id"];
    $gameid = $_SESSION["gameid"];
    
    include("../php/sqlconnect.php");
    
    // Get turn
    $sql = $conn->prepare("SELECT Turn FROM Games WHERE ID=?;");
    $sql->bind_param("i",$gameid);
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $turn = $result["Turn"];
    
    if ($turn == $userid) {
        $sql = $conn->prepare("SELECT UserID,OpponentID,UserHealth,OpponentHealth FROM Games WHERE ID=?;");
        $sql->bind_param("i",$gameid);
        $sql->execute();
        $result = $sql->get_result();
        $result = $result->fetch_assoc();
        $gameuser = $result["UserID"];
        
        // Check if user is gameuser or gameopponent
        if ($_SESSION["id"] == $result["UserID"]) {
            $userid = $result["UserID"];
            $opponentid = $result["OpponentID"];
            
            $uhealth = $result["UserHealth"];
            $ohealth = $result["OpponentHealth"];
        } else {
            $userid = $result["OpponentID"];
            $opponentid = $result["UserID"];
            
            $uhealth = $result["OpponentHealth"];
            $ohealth = $result["UserHealth"];
        }
        
        // Checks if ability used is owned
        $sql = $conn->prepare("SELECT Abilities.ID,UHealth,OHealth FROM Abilities JOIN AbilitiesUsers ON AbilitiesUsers.AbilityID=Abilities.ID WHERE UserID=? AND Active=1;");
        $sql->bind_param("i",$userid);
        $sql->execute();
        $result = $sql->get_result();
        while ($row = $result->fetch_assoc()) {
            if ($row["ID"] == $_POST["ability"]) {
                $lastidused = $row["ID"];
                break;
            }
        }
        
        $uhealthchange = $row["UHealth"];
        $ohealthchange = $row["OHealth"];
        
        $uhealth = $uhealth + $uhealthchange;
        $ohealth = $ohealth + $ohealthchange;
        
        // Updates health
        $sql = $conn->prepare("UPDATE Games SET UserHealth=?,OpponentHealth=? WHERE ID=?;");
        if ($_SESSION["id"] == $gameuser) {
            $sql->bind_param("iii",$uhealth,$ohealth,$gameid);
        } else {
            $sql->bind_param("iii",$ohealth,$uhealth,$gameid);
        }
        $sql->execute();
        
        // Checks for any losses
        if ($ohealth <= 0 or $uhealth <= 0) {
            $sql = $conn->prepare("UPDATE Users SET Health=? WHERE ID=?;");
            $sql->bind_param("ii",$uhealth,$userid);
            $sql->execute();
            
            $sql->bind_param("ii",$ohealth,$opponentid);
            $sql->execute();
            
            // Win loss tracker for the user
            $sql = $conn->prepare("SELECT Wins,Losses FROM Users WHERE ID=?;");
            $sql->bind_param("i", $userid);
            $sql->execute();
            $result = $sql->get_result();
            $result = $result->fetch_assoc();
            
            if ($ohealth <= 0) {
                $wins = $result["Wins"] + 1;
                $losses = $result["Losses"];
            }
            
            if ($uhealth <= 0) {
                $wins = $result["Wins"];
                $losses = $result["Losses"] + 1;
            }
            
            $sql = $conn->prepare("UPDATE Users SET Wins=?,Losses=? WHERE ID=?;");
            $sql->bind_param("iii",$wins,$losses,$userid);
            $sql->execute();
            
            // Win loss tracker for the opponent
            $sql = $conn->prepare("SELECT Wins,Losses FROM Users WHERE ID=?;");
            $sql->bind_param("i", $opponentid);
            $sql->execute();
            $result = $sql->get_result();
            $result = $result->fetch_assoc();
            
            if ($ohealth <= 0) {
                $wins = $result["Wins"];
                $losses = $result["Losses"] + 1;
            }
            
            if ($uhealth <= 0) {
                $wins = $result["Wins"] + 1;
                $losses = $result["Losses"];
            }
            
            $sql = $conn->prepare("UPDATE Users SET Wins=?,Losses=? WHERE ID=?;");
            $sql->bind_param("iii",$wins,$losses,$opponentid);
            $sql->execute();
            
            // Reset health
            $sql = $conn->prepare("UPDATE Users SET Health=? WHERE ID=?;");
            $sql->bind_param("ii",$fullHealth,$userid);
            $fullHealth = 100;
            $sql->execute();
            
            $sql = $conn->prepare("UPDATE Users SET Health=? WHERE ID=?;");
            $sql->bind_param("ii",$fullHealth,$opponentid);
            $sql->execute();
            
            // Let opponent know the game is over
            $sql = $conn->prepare("UPDATE Games SET Turn=? WHERE ID=?;");
            $sql->bind_param("ii",$turn,$gameid);
            $turn = null;
            $sql->execute();
            
            // Redirect
            if ($uhealth <= 0) {
                header("Location: lose.php");
                exit();
            } else if ($ohealth <= 0) {
                header("Location: win.php");
                exit();
            }
        } else {
            // Set turn and timer
            $sql = $conn->prepare("UPDATE Games SET Turn=?,Timer=? WHERE ID=?;");
            $sql->bind_param("iii",$opponentid,$timer,$gameid);
            $timer = time();
            $sql->execute();
        }
    }
?>