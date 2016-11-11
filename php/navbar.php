<?php
    /*
        Any css you want to apply to the navbar must be written in global.css
        ---------------------------------------------------------------------
    */

    // Highlights correct tab in navbar
    $pages = array("","",""); // # of items in array must = # of tabs in nav
    if ($page == "index") {
        $pages[0] = ' class="active"';
    } elseif ($page == "class") {
        $pages[1] = ' class="active"';
    }elseif ($page == "about") {
        $pages[2] = ' class="active"';
    } elseif ($page == "contact") {
        $pages[3] = ' class="active"';
    }

    function userData($location) {
        if ($location == "userbox") {
            if (empty($_SESSION["sid"])) {
                return ' 
                    <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Sign Up</a></li>
                    <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Sign In</a></li>
                ';
            } else {
                return '
                    <li><a href="#">'.$_SESSION["firstname"].' '.$_SESSION["lastname"].'</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Settings</a></li>
                            <li id="signout"><a href="index.php?signout=1"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Sign Out</a></li> 
                        </ul>
                    </li>
                ';
            }
        } else if ($location == "classes") {
            if (empty($_SESSION["sid"])) {
                return '';
            } else {
                include("../php/sqlconnect.php");
                
                if ($_SESSION["isTeacher"] == 0) {
                    $sql = $conn->prepare("SELECT Classes.Name,Classes.ID FROM Classes JOIN ClassesUsers ON Classes.ID=ClassesUsers.ClassID WHERE ClassesUsers.UserID=?");
                } else {
                    $sql = $conn->prepare("SELECT Name,ID FROM Classes WHERE Teacher=?");
                }
                $sql->bind_param("i",$id);
                $id = $_SESSION["id"];
                $sql->execute();
                $result = $sql->get_result();
                if ($result->num_rows > 0) {
                    $classes = '';
                    while ($row = $result->fetch_assoc()) {
                        $classes .= '
                            <li><a href="class.php?id='.$row["ID"].'">'.$row["Name"].'</a></li>
                        ';
                    }
                }
                
                return '
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Classes<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            '.
                            $classes
                            .'
                        </ul>
                    </li>';
            }
        }
    }

    echo '
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#colNav">
                        <span class="glyphicon glyphicon-menu-hamburger"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">We need a name for this site still</a>
                </div>
                <div class="collapse navbar-collapse" id="colNav">
                    <ul class="nav navbar-nav">
                        <li'.$pages[0].'><a href="index.php">Home</a></li>
                            '.userData("classes").'
                        <li'.$pages[2].'><a href="about.php">About</a></li>
                        <li'.$pages[3].'><a href="http://www.guyfieri.com">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right" id="userbox">
                        '.userData("userbox").'
                    </ul>
                </div>
            </div>
        </nav>
        ';
?>