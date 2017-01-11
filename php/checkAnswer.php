<?php
    include("../php/sqlconnect.php");
    
    // Selects data from database for use in the rest of the document
    $sql = $conn->prepare("SELECT Answered FROM ClassesUsers WHERE UserID=? AND ClassID=?;");
    $sql->bind_param("ii",$userid,$classid);
    $userid = $_SESSION["id"];
    $classid = $_GET["id"];
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $answered = $result["Answered"];
    
    $sql = $conn->prepare("SELECT Currency FROM Users WHERE ID=?;");
    $sql->bind_param("i",$userid);
    $sql->execute();
    $result = $sql->get_result();
    $result = $result->fetch_assoc();
    $currency = $result["Currency"];
    
    if ($answered == 0) {
        // Record the question as answered
        $sql = $conn->prepare("UPDATE ClassesUsers SET Answered=1 WHERE UserID=?;");
        $sql->bind_param("i",$userid);
        $sql->execute();
        
        // Get answers
        $sql = $conn->prepare("SELECT Questions.Answer FROM Questions JOIN Classes ON Questions.ID=Classes.Question WHERE Classes.ID=?;");
        $sql->bind_param("i", $classid);
        $sql->execute();
        $result = $sql->get_result();
        $result = $result->fetch_assoc();
        $answer =  $result["Answer"];
        
        // Get what the user answered
        if(gettype($_POST["dqanswer"]) != "string") {
            foreach ($_POST["dqanswer"] as $userAnswerSequence) {
                $userAnswers .= $userAnswerSequence;
            }
        } else {
            $userAnswers = $_POST["dqanswer"];
        }
        
        // Check answer
        if ($answer === $userAnswers) {
            // Sometimes give user an ability
            $rareDropProbability = rand(0,50);
            $commonDropProbability = rand(0,20);
            // 1/50 chance
            if ($rareDropProbability == 4) {
                // Check if they already have that ability
                $sql = $conn->prepare("SELECT ID FROM AbilitiesUsers WHERE UserID=? AND AbilityID=?;");
                $sql->bind_param("ii",$userid,$abilityid);
                $abilityid = rand(3,7);
                $sql->execute();
                $sql->store_result();
                $rows = $sql->num_rows;
                
                if ($rows == 0) {
                    // Insert item into user's inventory
                    $sql = $conn->prepare("INSERT INTO AbilitiesUsers(UserID,AbilityID,Supply,Active,OnMarket) VALUES(?,?,?,?,?);");
                    $sql->bind_param("iiiii",$userid, $abilityid, $supply, $active, $onMarket);
                    $supply = 1;
                    $active = 0;
                    $onMarket = 0;
                    $sql->execute();
                } else {
                    // Add one to user's inventory supply
                    $sql = $conn->prepare("SELECT Supply FROM AbilitiesUsers WHERE UserID=? AND AbilityID=?;");
                    $sql->bind_param("ii",$userid, $abilityid);
                    $sql->execute();
                    $result = $sql->get_result();
                    $result = $result->fetch_assoc();
                    $userAbilitySupply = $result["Supply"] + 1;
                    
                    // Update seller's supply
                    $sql = $conn->prepare("UPDATE AbilitiesUsers SET Supply=? WHERE UserID=? AND AbilityID=?;");
                    $sql->bind_param("iii",$userAbilitySupply,$userid,$abilityid);
                    $sql->execute();
                }
                
                $qOutput = 'Correct!<br>You got a rare drop!';
            
            // 1/25 chance
            } else if ($commonDropProbability == 4) {
                // Check if they already have that ability
                $sql = $conn->prepare("SELECT ID FROM AbilitiesUsers WHERE UserID=? AND AbilityID=?;");
                $sql->bind_param("ii",$userid,$abilityid);
                $abilityid = rand(1,2);
                $sql->execute();
                $sql->store_result();
                $rows = $sql->num_rows;
                    
                if ($rows == 0) {
                    // Insert item into user's inventory
                    $sql = $conn->prepare("INSERT INTO AbilitiesUsers(UserID,AbilityID,Supply,Active,OnMarket) VALUES(?,?,?,?,?);");
                    $sql->bind_param("iiiii",$userid, $abilityid, $supply, $active, $onMarket);
                    $supply = 1;
                    $active = 0;
                    $onMarket = 0;
                    $sql->execute();
                } else {
                    // Add one item to user's inventory
                    $sql = $conn->prepare("SELECT Supply FROM AbilitiesUsers WHERE UserID=? AND AbilityID=?;");
                    $sql->bind_param("ii",$userid, $abilityid);
                    $sql->execute();
                    $result = $sql->get_result();
                    $result = $result->fetch_assoc();
                    $userAbilitySupply = $result["Supply"] + 1;
                    
                    // Update seller's supply
                    $sql = $conn->prepare("UPDATE AbilitiesUsers SET Supply=? WHERE UserID=? AND AbilityID=?;");
                    $sql->bind_param("iii",$userAbilitySupply,$userid,$abilityid);
                    $sql->execute();
                }
                
                $qOutput = 'Correct!<br>You got a common drop!';
                
            } else {
                // Rewards user by adding stuff to their user in the database
                $newCurrency = $currency + 100;
                $sql = $conn->prepare("UPDATE Users SET Currency=? WHERE ID=?;");
                $sql->bind_param("ii", $newCurrency, $userid);
                $sql->execute();
                $qOutput = 'Correct!<br>You got $100!';
            }
            
        } else {
            $qOutput = 'Incorrect!<br>Try again next time.';
        }
    } else {
        // Keep user from repetitively answering questions
        $qOutput = 'You\'ve already answered this question!';
    }
?>