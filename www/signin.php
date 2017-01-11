<?php
    session_start();
    
    if (!empty($_POST)) {
        include("../php/verify.php");
    }
    
    if (isset($_SESSION["sid"])) {
        // Redirects user if signed in
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            $page = "signin";
            include("../php/head.php");
        ?>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
        ?>
        <div class="page-header">
            <h1 style="text-align:center">Sign in</h1>
        </div>
        <?php
            // Small things like this don't need their own file
            if ($incorrect) {
                echo "<h3 style='color:red;' align='center'>Incorrect username or password</h3>";
            }
        ?>
        <form style="text-align:center" role="form" action="signin.php" method="post">
            <h3 style="text-align:center;">Student ID</h3>
            <input type="text" name="sid" id= "sid" required>
            <h3  style="text-align:center">Password</h3>
            <input type="password" name="password" id= "password" required>
            <br>
            <br>
            <input type="submit">
            <br>
            <br>
            <a href="signup.php">Don't have an account? Sign Up!</a>
        </form>
    </body>
</html>