<?php
    if (!empty($_POST)) {
        include("../php/adduser.php");
        // Redirect user to sign in page after 5 seconds
        header("Refresh: 3;url=signin.php");
    } else {
        // Redirect user to homepage if they came here via hyperlink
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <h1>Success!</h1>
        <h2>You successfully signed up.</h2>
        <p>You should be redirected to the sign in page shortly.
If you are not, <a href="signin.php">click here</a>. 
        </p>
    </body>
</html>