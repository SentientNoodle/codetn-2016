<?php
    session_start();

    if (!empty($_POST)) {
       include("../php/adduser.php");
    // Redirect user to home page after 3 seconds
       header("Refresh: 3;url=index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CodeTN</title>
    </head>
    <body>
        <div class="container" align="center">
            <h1>YOU HAVE SUCCESSFULLY SIGNED UP!</h1>
            <br>
            <h2>You should be redirected to the home page shortly. If it takes longer than 3 seconds, <a href="index.php">click here</a></h2>
        </div>
    </body>
</html>