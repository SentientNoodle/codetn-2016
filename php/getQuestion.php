 <?php
    include("../php/sqlconnect.php");
    
    if ($_SESSION["isTeacher"] == 0) {
       
        //Code for the student to answer questions set by the teacher
        $sql = $conn->prepare("SELECT Question FROM Classes WHERE ID=?;");
        $sql->bind_param("i",$classid);
        $classid = $_GET["id"];
        $sql->execute();
        $result = $sql->get_result();
        $result = $result->fetch_assoc();
        
        if ($result["Question"] != "") {
            $sql = $conn->prepare("SELECT Answered FROM ClassesUsers WHERE UserID=? AND ClassID=?;");
            $sql->bind_param("ii",$userid,$classid);
            $userid = $_SESSION["id"];
    
            $sql->execute();
            $result = $sql->get_result();
            $result = $result->fetch_assoc();
            
            if ($result["Answered"] == 0) {
            
            //Code for the actuall answering of the question
                $sql = $conn->prepare("SELECT Questions.Question,Choices,Answer FROM Questions JOIN Classes ON Questions.ID=Classes.Question WHERE Classes.ID=?;");
                $sql->bind_param("i", $classid);
                $sql->execute();
                $result = $sql->get_result();
                $result = $result->fetch_assoc();
                $question = $result["Question"];
                $choices = explode(",",$result["Choices"]);
                $_SESSION["answers"] = $result["Answer"];
                
                echo $question;
                echo "<br>";
                
                $answerLength = strlen($_SESSION["answers"]);
            
                //Code to determine if answer is to have single or multiple correct answers
                if ($answerLength == 1) {
                    $isRadioButton = 1;
                } else {
                    $isRadioButton = 0;
                }
                
                if ($isRadioButton == 0) {
                    
                    //Code to answer a question with multiple correct answers
                    echo '
                        <form action="class.php?id='.$classid.'" method="post">
                            <div class="input-group">
                                <input type="checkbox" name="dqanswer[]" value="0">'.str_replace('&amp;#44;',',',$choices[0]).'<br>
                                <input type="checkbox" name="dqanswer[]" value="1">'.str_replace('&amp;#44;',',',$choices[1]).'<br>
                                <input type="checkbox" name="dqanswer[]" value="2">'.str_replace('&amp;#44;',',',$choices[2]).'<br>
                                <input type="checkbox" name="dqanswer[]" value="3">'.str_replace('&amp;#44;',',',$choices[3]).'<br>
                            </div>
                            <input type="submit">
                        </form>
                    ';
                } else if ($isRadioButton == 1) {
                    
                    //Code to answer a question with one correct answers
                    echo '
                        <form action="class.php?id='.$classid.'" method="post">
                            <div class="input-group">
                                <input type="radio" name="dqanswer" value="0">'.str_replace('&amp;#44;',',',$choices[0]).'<br>
                                <input type="radio" name="dqanswer" value="1">'.str_replace('&amp;#44;',',',$choices[1]).'<br>
                                <input type="radio" name="dqanswer" value="2">'.str_replace('&amp;#44;',',',$choices[2]).'<br>
                                <input type="radio" name="dqanswer" value="3">'.str_replace('&amp;#44;',',',$choices[3]).'<br>
                            </div>
                            <input type="submit">
                        </form>
                    ';
                }
        
        //Code for if question is not to be answered    
            } else {
                if (empty($qOutput)) {
                    $qOutput = 'You already answered this question!';
                }
                
                echo $qOutput;
            }
        } else {
            $qOutput = 'No question has been set yet!';
            
            echo $qOutput;
        }
    
    //Code for teacher to set question    
    } else {
        
        //Code for teacher to create their own question
        if ($_POST["question"] != "custom") {
            $sql = $conn->prepare("SELECT Questions.Question,Choices,Answer,Questions.ID FROM Questions JOIN Classes ON Questions.Subject=Classes.Subject WHERE Classes.ID=? ORDER BY rand();");
            $sql->bind_param("i", $classid);
            $classid = $_GET["id"];
            $sql->execute();
            $result = $sql->get_result();
            
            $qlist = '';
            while ($row = $result->fetch_assoc()) {
                $choices = explode(",",$row["Choices"]);
                
                if (strlen($row["Answer"] > 1)) {
                    $answersArray = str_split($row["Answer"]);
                    for ($answersIndex = 0; $answersIndex < count($answersArray); $answersIndex++) {
                        $answerNumber = (int)$answersArray[$answersIndex];
                        $choices[$answerNumber] = '<em style="color:green;">'.$choices[$answerNumber].'</em>';
                    }
                } else {
                    $choices[$row["Answer"]] = '<em style="color:green;">'.$choices[$row["Answer"]].'</em>';
                }
            
                $qlist .= '
                    <div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#questions" href="#'.$row["ID"].'">
                            <h4 class="panel-title">
                                '.$row["Question"].'
                            </h4>
                        </div>
                        <div id="'.$row["ID"].'" class="panel-collapse collapse">
                            <div class="panel-body">
                                <h4>'.$row["Question"].'</h4>
                                <p>'.str_replace('&amp;#44;',',',$choices[0]).'<br>'.str_replace('&amp;#44;',',',$choices[1]).'<br>'.str_replace('&amp;#44;',',',$choices[2]).'<br>'.str_replace('&amp;#44;',',',$choices[3]).'</p>
                                <button type="submit" name="question" value="'.$row["ID"].'">Ask</button>
                            </div>
                        </div>
                    </div>
                ';
            }
            
            echo '
                <form action="class.php?id='.$classid.'" method="post">
                    <button type="submit" name="question" value="custom">Ask your own</button>
                    <div class="panel-group" id="questions">
                        '.$qlist.'
                    </div>
                </form>
            ';
        
        //Code for teacher to select an existing question
        } else {
            echo '
                <form action="class.php?id='.$_GET["id"].'" method="post">
                    <button type="submit" name="question" value="select">Back</button>
                    <textarea name="dqcustomquestion" rows="3" cols="100%" placeholder="Type your question here"></textarea>
                    Type answer choices and select correct answer:
                    <br>
                    <input type="checkbox" name="dqcustomanswer[]" value="0"> Option 1: <input type="text" name="0">
                    <br>
                    <input type="checkbox" name="dqcustomanswer[]" value="1"> Option 2: <input type="text" name="1">
                    <br>
                    <input type="checkbox" name="dqcustomanswer[]" value="2"> Option 3: <input type="text" name="2">
                    <br>
                    <input type="checkbox" name="dqcustomanswer[]" value="3"> Option 4: <input type="text" name="3">
                    <br>
                    <input type="submit" value="Submit">
                </form>
            ';
            
        }
    }
?>