<?php
    if (time() <= ($t + 60)) {
        /*
        -------------------------------------------------------------------------------------------------------
        This code will be executed when a user accepts a game request. I'm just putting this here so it exists.
        -------------------------------------------------------------------------------------------------------
        $sql = $conn->prepare("INSERT INTO Games (UserID,OpponentID) VALUES (?,?);");
        $sql->bind_param("ii",$userid,$opponentid);
        $s = "";
        $sql->execute();
        
        $gameid = $sql->insert_id();
        // Get id session ids of the users' login first
        session_id(md5($gameid);
        session_start();
        $_SESSION["gameid"] = $gameid;
        $_SESSION["userid"] = $userid;
        $_SESSION["opponentid"] = $opponentid;
        // I don't think this is insecure
        $_SESSION["userlogin"] = $userlogin;
        $_SESSION["opponentlogin"] = $opponentlogin;
        
        session_id(md5($userid));
        session_start();
        $_SESSION["gameid"] = $gameid;
        $_SESSION["abilities"] = $abilities;
        $_SESSION["health"] = $health;
        
        -----------------------------------------------
        This part is executed on the other user's side.
        -----------------------------------------------
        session_id(md5($userid));
        session_start();
        $_SESSION["gameid"] = $gameid;
        $_SESSION["abilities"] = $abilities;
        $_SESSION["health"] = $health;
        */
        
        session_id(md5($_SESSION["gameid"]));
        session_start();
        session_id(md5($_SESSION["userid"]));
        session_start();
        $_SESSION["health"] += $_SESSION["abilities"][$_POST["abilityID"]]["userHealth"];
        $opponentHealthEffect = $_SESSION["abilities"][$_POST["abilityID"]]["opponentHealth"];
        session_id(md5($_SESSION["gameid"]));
        session_start();
        session_id(md5($_SESSION["opponentid"]));
        session_start();
        $_SESSION["health"] += $opponentHealthEffect;
    }
?>