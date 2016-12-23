<?php
    session_start();
    
    if ($_GET["signout"] == "1") {
        session_unset();
        header("Location: index.php");
        exit;
    }
    
    if (!empty($_POST)){
        include ("../php/addClass.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            $page = "makeclass";
            include("../php/head.php");
        ?>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
        ?>

            <div class="page-header col-sm-offset-5">
                <h1>Make a Class</h1>
            </div>
            <form class="col-sm-4 col-sm-offset-4 signupForm" role="form" action="makeclass.php" method="post">
                <h3>Class Name</h3>
                <input type="text" name="className" id="className" required>
                <br>
                <br>
                <div class="form-group">
                <label for="sel1">Select Subject</label>
                <select class="form-control" id="subject">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
            <br>
            <input type="submit">
            <br>
        </form>
    </body>
</html>