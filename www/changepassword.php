<?php
    session_start();
    
    if (empty($_SESSION["id"])) {
        header("Location: index.php");
    }
    
    if (!empty($_POST)) {
        include("../php/changepassword.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            include("../php/head.php");
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script> <!-- Password strength checker -->
        <title>CodeTN</title>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
        ?>
        <div class="page-header">
            <h1 style="text-align:center">Change Password</h1>
        </div>
        <?php
            if ($incorrect) {
                echo "<h3 style='color:red;' align='center'>Incorrect password</h3>";
            }
        ?>
        <form style="text-align:center" role="form" action="changepassword.php" method="post" onsubmit="return validateChanged();">
            <div class="col-sm-4 col-sm-offset-4">
                <h3 style="text-align:center;">Current Password</h3>
                <input type="password" name="nowpassword" id="nowpassword" required>
                <h3 style="text-align:center">New Password</h3>
                <input type="password" name="newpassword" id="newpassword" onchange="validateChanged();" onkeyup="getChangedPassStrength();" required>
                <div class="passStrengthBox">
                    <meter id="strengthMeter" max="4" style="display:none;"></meter>
                    <p id="strengthText"></p>
                </div>
                <h3  style="text-align:center">Confirm New Password</h3>
                <input type="password" name="confirmnewpassword" id="confirmnewpassword" onkeyup="validateChanged();" required>
                <br>
                <br>
                <input type="submit">
            </div>
        </form>
    </body>
</html>