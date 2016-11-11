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
            <h1>Sign in</h1>
        </div>
        <?php
            // Small things like this don't need their own file
            if ($incorrect) {
                echo "<h3 style='color:red;'>Incorrect username or password</h3>";
            }
        ?>
        <form role="form" action="signin.php" method="post">
            <h3>Student ID</h3>
            <input type="text" name="sid" id= "sid" required>
            <h3>Password</h3>
            <input type="password" name="password" id= "password" required>
            <br>
            <br>
            <input type="submit">
        </form>
    </body>
</html>