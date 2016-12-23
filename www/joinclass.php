<?php
    session_start();
    
    if ($_GET["signout"] == "1") {
        session_unset();
        header("Location: index.php");
        exit;
    }
    
    $codeerror = "";
    if (!empty($_POST)) {
        include ("../php/checkClassCode.php");
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
            <h1>Join a Class</h1>
        </div>
        <form class="col-sm-4 col-sm-offset-4 signupForm" role="form" action="joinclass.php" method="post">
            <h3>Enter the Class Code</h3>
            <?php echo $errorcode; ?>
            <input type="text" name="classCode" id="classCode" required>
            <br>
            <br>
            <input type="submit">
            <br>
        </form>
    </body>
</html>