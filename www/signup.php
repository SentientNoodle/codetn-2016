<?php
    session_start(); // This must be at the beginning of the file.
    
    if (isset($_SESSION["sid"])) {
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            $page = "signup";
            include("../php/head.php");
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script> <!-- Password strength checker -->
        <script src="js/signup.js"></script>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
            
            if (!empty($_GET["exists"])) {
                $exists = true;
            }
        ?>
        <!-- I'm just making a skeleton here as a foundation. The html boys should make it look prettier. -->
        <div class="page-header">
            <h1>Sign Up</h1>
        </div>
        <form role="form" action="success.php" method="post" onsubmit="return validate();">
            <h3>Student ID</h3>
            <input type="text" name="sid" id="sid" required>
            <?php
                if ($exists) {
                    echo '
                        <h4 style="color:red;">An account with this Student ID already exists!</h4>
                    ';
                }
            ?>
            <h3>First name</h3>
            <input type="text" name="firstname" id="firstname" required>
            <h3>Last name</h3>
            <input type="text" name="lastname" id="lastname" required>
            <h3>Password</h3>
            <div class="row">
                <input class="col-sm-2" type="password" name="password" id="password" onchange="validate();" onkeyup="getPassStrength();" placeholder="Make sure to choose a secure password" required>
                <div class="displayBox col-sm-2">
                    <meter id="strengthMeter" max="4" style="display:none;"></meter>
                    <p id="strengthText"></p>
                </div>
            </div>
            <h3>Confirm Password</h3>
            <input type="password" name="password2" id="password2" onkeyup="validate();" required>
            <br>
            <br>
            <div class="input-group">
                <input type="radio" name="isteacher" id="student" value="0">Student
                <input type="radio" name="isteacher" id="teacher" value="1">Teacher
            </div>
            <br>
            <input type="submit">
        </form>
    </body>
</html>