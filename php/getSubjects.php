<?php
    include("../php/sqlconnect.php");
    
    // Selects distinct subjects from the database to be placed on the drop down menu for the teacher to select
    // along with the option to create a new subject
    $sql = $conn->prepare("SELECT DISTINCT Subject FROM Classes;");
    $userid = $_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    
    $options = "";
    
    while ($row = $result->fetch_assoc()) {
        $options .= '<option>'.$row["Subject"].'</option>';
    }
    
    echo
    '
        <div class="page-header col-sm-offset-5">
            <h1>Make a Class</h1>
        </div>
        <form class="col-sm-4 col-sm-offset-4 signupForm" role="form" action="makeclass.php" method="post">
            <h3>Class Name</h3>
            <input type="text" name="className" id="className" required>
            <br>
            <br>
            <div class="form-group">
            <label for="sel1">Select A Subject</label>
            <select class="form-control" name= "subjectSelect" id="subjectSelect">
                <option></option>
                '.$options.'
            </select>
            </div>
            <h3>Or Add A New Subject</h3>
            <input type="text" name="subjectCustom" id="subjectCustom">
            <br>
            <br>
            <input type="submit">
            <br>
        </form>
    ';
?>