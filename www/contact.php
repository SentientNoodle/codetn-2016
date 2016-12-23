<?php
    session_start();
    
    include("../php/sqlconnect.php");
    
    if ($_GET["signout"] == "1") {
        session_unset();
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            $page = "contact";
            include("../php/head.php");
        ?>
        <title>CodeTN</title>
        <style>
            body {
                background-image: url("http://bgfons.com/upload/paper_texture3887.jpg");
                background-size: 100% 100%;
            }
        </style>
    </head>
    <body>
        <?php
            include("../php/navbar.php");
        ?>
        <div class="container text-center" id="contactinfo">
            <h1 id="contacttext">CONTACT</h1>
            <h4 id="contacttext">The best way to contact us is via email.</h4>
            <br>
            <h4 id="contacttext">Team's Email: <a href="mailto:FlavortownCodeTN@gmail.com?Subject=Hello%20Flavortown%20team,%20I%20found%20a%20bug" target="_top">FlavortownCodeTN@gmail.com</a></h4>
            <br>
            <h4 id="contacttext">Follow us on Twitter</h4> <a href="https://twitter.com/FlavortownCodeT"><img border="0" alt="W3Schools" src="https://www.seeklogo.net/wp-content/uploads/2015/09/twitter-square-logo.png" width="100" height="100"></a>
        </div>
    </body>
</html>